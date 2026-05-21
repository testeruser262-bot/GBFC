<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    public function index()
    {
        $data = DB::table('tb_club_players')
            ->where('status', 'Active')
            ->orderBy('playerId', 'DESC')
            ->get();

        return view('admin.players.index', compact('data'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'first_name'     => 'required|string|max:100',
            'last_name'      => 'required|string|max:100',
            'email'          => 'required',
            'phone'          => 'required|digits:10',
            'dob'            => 'required|date',
            'gender'         => 'required',
            'parent_name'    => 'required|string|max:100',
            'parent_contact' => 'required|digits:10',
            'address'        => 'required|string',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        ]);

        $imageName = null;

        // IMAGE UPLOAD

        if ($request->hasFile('image')) {
            $image           = $request->file('image');
            $imageName       = time() . '_' . $image->getClientOriginalName();
            $destinationPath = public_path('uploads/players');
            if (! file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
            $image->move($destinationPath, $imageName);
        }

        try {

            DB::table('tb_club_players')->insert([
                'firstName'     => $request->first_name,
                'lastName'      => $request->last_name,
                'email'         => $request->email,
                'phone'         => $request->phone,
                'dob'           => $request->dob,
                'gender'        => $request->gender,
                'parentName'    => $request->parent_name,
                'parentContact' => $request->parent_contact,
                'address'       => $request->address,
                'image'         => $imageName,
                'status'        => 'Active',
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);

        } catch (\Exception $e) {

            dd($e->getMessage());

        }

        return redirect('/admin/players')
            ->with('success', 'Player created successfully')
            ->with('class', 'alert-success');
    }

    public function edit($id)
    {
        $player = DB::table('tb_club_players')
            ->where('playerId', $id)
            ->first();

        return view('admin.players.edit', compact('player'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name'     => 'required|string|max:100',
            'last_name'      => 'required|string|max:100',
            'email'          => 'required',
            'phone'          => 'required|digits:10',
            'dob'            => 'required|date',
            'gender'         => 'required',
            'parent_name'    => 'required|string|max:100',
            'parent_contact' => 'required|digits:10',
            'address'        => 'required|string',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        try {

            $player = DB::table('tb_club_players')
                ->where('playerId', $id)
                ->first();

            if (! $player) {
                return redirect('/admin/players')
                    ->with('error', 'Player not found');
            }

            $imageName = $player->image;

            // IMAGE UPLOAD
            if ($request->hasFile('image')) {

                $destinationPath = public_path('uploads/players');

                // delete old image
                if ($player->image && file_exists($destinationPath . '/' . $player->image)) {
                    unlink($destinationPath . '/' . $player->image);
                }

                // create folder if not exists
                if (! file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }

                $image     = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move($destinationPath, $imageName);
            }

            DB::table('tb_club_players')
                ->where('playerId', $id)
                ->update([
                    'firstName'     => $request->first_name,
                    'lastName'      => $request->last_name,
                    'email'         => $request->email,
                    'phone'         => $request->phone,
                    'dob'           => $request->dob,
                    'gender'        => $request->gender,
                    'parentName'    => $request->parent_name,
                    'parentContact' => $request->parent_contact,
                    'address'       => $request->address,
                    'image'         => $imageName,
                    'updated_at'    => now(),
                ]);

            return redirect('/admin/players')
                ->with('success', 'Player updated successfully')
                ->with('class', 'alert-success');

        } catch (\Exception $e) {

            return redirect('/admin/players')
                ->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        DB::table('tb_club_players')
            ->where('playerId', $id)
            ->update([
                'status'     => 'Inactive',
                'updated_at' => now(),
            ]);

        return redirect('/admin/players')
            ->with('success', 'Player deactivated successfully')
            ->with('class', 'alert-danger');
    }
}

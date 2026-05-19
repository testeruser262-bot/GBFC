<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    public function index()
    {
        $data = DB::table('tb_players')
            ->where('status', 'Active')
            ->orderBy('playerId', 'DESC')
            ->get();

        return view('admin.players.index', compact('data'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email',
            'phone'      => 'required',
            'dob'        => 'required',
            'gender'     => 'required',
        ]);

        DB::table('tb_players')->insert([

            'firstName'  => $request->first_name,
            'lastName'   => $request->last_name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'dob'        => $request->dob,
            'gender'     => $request->gender,
            'created_at' => now(),
            'updated_at' => now(),
            'status'     => 'Active',

        ]);

        return redirect('/players')
            ->with('success', 'Player created successfully')
            ->with('class', 'alert-success');
    }

    public function edit($id)
    {
        $player = DB::table('tb_players')
            ->where('playerId', $id)
            ->first();

        return view('admin.players.edit', compact('player'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([

            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email',
            'phone'      => 'required',
            'dob'        => 'required',
            'gender'     => 'required',

        ]);

        DB::table('tb_players')
            ->where('playerId', $id)
            ->update([

                'firstName'  => $request->first_name,
                'lastName'   => $request->last_name,
                'email'      => $request->email,
                'phone'      => $request->phone,
                'dob'        => $request->dob,
                'gender'     => $request->gender,
                'updated_at' => now(),

            ]);

        return redirect('/players')
            ->with('success', 'Player updated successfully')
            ->with('class', 'alert-success');
    }

    public function destroy($id)
    {
        DB::table('tb_players')
            ->where('playerId', $id)
            ->update([
                'status'     => 'Inactive',
                'updated_at' => now(),
            ]);

        return redirect('/players')
            ->with('success', 'Player deactivated successfully')
            ->with('class', 'alert-danger');
    }
}

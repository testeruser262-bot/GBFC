<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SportController extends Controller
{
    public function index()
    {
        $data = DB::table('tb_sports')
            ->where('status', 'Active')
            ->orderBy('sportId', 'DESC')
            ->get();

        return view('admin.sports.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sportName' => 'required|string|max:255',
        ]);

        DB::table('tb_sports')->insert([
            'sportName'  => trim($request->sportName),
            'status'     => 'Active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/sports')
            ->with('success', 'Sport created successfully')
            ->with('class', 'alert-success');
    }

    public function edit($id)
    {
        $sport = DB::table('tb_sports')
            ->where('sportId', $id)
            ->first();

        return view('admin.sports.edit', compact('sport'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'sportName' => 'required|string|max:255',
        ]);

        DB::table('tb_sports')
            ->where('sportId', $id)
            ->update([
                'sportName'  => trim($request->sportName),
                'updated_at' => now(),
            ]);

        return redirect('/sports')
            ->with('success', 'Sport updated successfully')
            ->with('class', 'alert-success');
    }

    public function destroy($id)
    {
        DB::table('tb_sports')
            ->where('sportId', $id)
            ->update([
                'status'     => 'Inactive',
                'updated_at' => now(),
            ]);

        return redirect('/sports')
            ->with('success', 'Player deactivated successfully')
            ->with('class', 'alert-danger');
    }

}

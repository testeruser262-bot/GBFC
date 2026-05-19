<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    public function index()
    {
        $data = DB::table('tb_teams')
            ->where('status', 'Active')
            ->orderBy('teamId', 'DESC')
            ->get();

        return view('admin.team.index', compact('data'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'team_name'   => 'required|string|max:255',
            'age_group'   => 'required',
            'gender'      => 'required',
            'status'      => 'required',
            'description' => 'nullable|string',
        ]);

        DB::table('tb_teams')->insert([
            'teamName'    => $request->team_name,
            'ageGroup'    => $request->age_group,
            'description' => $request->description,
            'gender'      => $request->gender,
            'status'      => $request->status,
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);

        return redirect('/teams')
            ->with('success', 'Team created successfully')
            ->with('class', 'alert-success');
    }

    public function edit($id)
    {
        $team = DB::table('tb_teams')
            ->where('teamId', $id)
            ->first();

        return view('admin.team.edit', compact('team'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'team_name'   => 'required|string|max:255',
            'age_group'   => 'required',
            'gender'      => 'required',
            'status'      => 'required',
            'description' => 'nullable|string',
        ]);

        DB::table('tb_teams')
            ->where('teamId', $id)
            ->update([
                'teamName'    => $request->team_name,
                'ageGroup'    => $request->age_group,
                'gender'      => $request->gender,
                'status'      => $request->status,
                'description' => $request->description,
                'updated_at'  => now(),
            ]);

        return redirect('/teams')
            ->with('success', 'Team updated successfully')
            ->with('class', 'alert-success');
    }

    public function destroy($id)
    {
        DB::table('tb_teams')
            ->where('teamId', $id)
            ->update([
                'status'     => 'Inactive',
                'updated_at' => now(),
            ]);

        return redirect('/teams')
            ->with('success', 'Player deactivated successfully')
            ->with('class', 'alert-danger');
    }
}

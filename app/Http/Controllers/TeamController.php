<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    public function index()
    {
        $data = DB::table('tb_club_teams')
            ->where('status', 'Active')
            ->orderBy('teamId', 'DESC')
            ->get();

        return view('admin.team.index', compact('data'));
    }

    public function create()
    {
        $sports = DB::table('tb_club_sports')
            ->where('status', 'Active')
            ->orderBy('sportId', 'DESC')
            ->get();

        return view('admin.team.create', compact('sports'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'team_name'   => 'required|string|max:255',
            'age_group'   => 'required',
            'gender'      => 'required',
            'sportId'     => 'required',
            'description' => 'nullable|string',
        ]);

        DB::table('tb_club_teams')->insert([
            'teamName'    => $request->team_name,
            'ageGroup'    => $request->age_group,
            'description' => $request->description,
            'gender'      => $request->gender,
            'sportId'     => $request->sportId,
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);

        return redirect('/admin/teams')
            ->with('success', 'Team created successfully')
            ->with('class', 'alert-success');
    }

    public function edit($id)
    {
        $team = DB::table('tb_club_teams')
            ->where('teamId', $id)
            ->first();

        $sports = DB::table('tb_club_sports')
            ->where('status', 'Active')
            ->get();

        return view('admin.team.edit', compact('team', 'sports'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'team_name'   => 'required|string|max:255',
            'age_group'   => 'required',
            'gender'      => 'required',
            'sportId'     => 'required',
            'description' => 'nullable|string',
        ]);

        DB::table('tb_club_teams')
            ->where('teamId', $id)
            ->update([
                'teamName'    => $request->team_name,
                'ageGroup'    => $request->age_group,
                'gender'      => $request->gender,
                'sportId'     => $request->sportId,
                'description' => $request->description,
                'updated_at'  => now(),
            ]);

        return redirect('/admin/teams')
            ->with('success', 'Team updated successfully')
            ->with('class', 'alert-success');
    }

    public function destroy($id)
    {
        DB::table('tb_club_teams')
            ->where('teamId', $id)
            ->update([
                'status'     => 'Inactive',
                'updated_at' => now(),
            ]);

        return redirect('/admin/teams')
            ->with('success', 'Player deactivated successfully')
            ->with('class', 'alert-danger');
    }
}

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

    // public function allPlayers($id)
    // {

    //     $players = DB::table('tb_club_players')
    //         ->where('status', 'Active')
    //         ->orderBy('playerId', 'DESC')
    //         ->get();

    //     return view('admin.team.view', compact('players'));
    // }

    public function addPlayers(Request $request, $id)
    {

        $request->validate([
            'players' => 'required|array',
        ]);

        foreach ($request->players as $playerId) {

            DB::table('tb_club_player_team_rel')->insert([
                'teamId'     => $id,
                'playerId'   => $playerId,
                'created_at' => now(),
                'updated_at' => now(),
                'status'     => 'Active',
            ]);
        }

        return back()->with('success', 'Players added successfully!');
    }

    public function teamPlayer($id)
    {
        // Players already in team
        $teamPlayers = DB::table('tb_club_player_team_rel as rel')
            ->join('tb_club_players as p', 'p.playerId', '=', 'rel.playerId')
            ->where('rel.teamId', $id)
            ->select(
                'p.playerId',
                'p.firstName',
                'p.lastName',
                'p.email',
                'p.dob',
                'rel.id as rel_id'
            )
            ->get();

        // All active players (for dropdown)
        $players = DB::table('tb_club_players')
            ->where('status', 'Active')
            ->orderBy('playerId', 'DESC')
            ->get();

        $events = DB::table('tb_club_event')
            ->orderBy('eventId', 'DESC')
            ->get();

        return view('admin.team.view', compact('teamPlayers', 'players', 'events'));
    }

    public function removePlayer($id)
    {
        DB::table('tb_club_player_team_rel')
            ->where('id', $id)
            ->delete();

        return back()->with('success', 'Player removed successfully!');
    }
}

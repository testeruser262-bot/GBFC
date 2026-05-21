<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    // Show create form
    public function create()
    {
        return view('admin.event.create');
    }

    // Store event
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'event_name'  => 'required|string|max:255',
            'location'    => 'required|string|max:255',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after:start_date',
            'description' => 'required|string',
        ]);

        // Insert data
        DB::table('tb_club_event')->insert([
            'name'        => $request->event_name,
            'location'    => $request->location,
            'startDate'   => $request->start_date,
            'endDate'     => $request->end_date,
            'description' => $request->description,
            'created_at'  => now(),
            'updated_at'  => now(),
            'status'      => 'Active',
        ]);

        return redirect()->route('event.index')
            ->with('success', 'Event created successfully!')
            ->with('class', 'alert-success');
    }

    // List events (optional)
    public function index()
    {
        $events = DB::table('tb_club_event')
            ->orderBy('eventId', 'DESC')
            ->get();

        return view('admin.event.index', compact('events'));
    }

    public function edit($id)
    {
        $event = DB::table('tb_club_event')
            ->where('eventId', $id)
            ->first();

        return view('admin.event.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'event_name'  => 'required|string|max:255',
            'location'    => 'required|string|max:255',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after:start_date',
            'description' => 'required|string',
        ]);

        DB::table('tb_club_event')
            ->where('eventId', $id)
            ->update([
                'name'        => $request->event_name,
                'location'    => $request->location,
                'startDate'   => $request->start_date,
                'endDate'     => $request->end_date,
                'description' => $request->description,
                'updated_at'  => now(),
            ]);

        return redirect()->route('event.index')
            ->with('success', 'Event updated successfully!')
            ->with('class', 'alert-success');
    }

    public function delete($id)
    {
        DB::table('tb_club_event')
            ->where('eventId', $id)
            ->delete();

        return redirect()->route('event.index')
            ->with('success', 'Event deleted successfully')
            ->with('class', 'alert-danger');

    }
}

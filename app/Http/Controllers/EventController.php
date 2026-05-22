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

    public function store(Request $request)
    {
        try {

            $request->validate([
                'event_name'  => 'required|string|max:255',
                'category'    => 'required|string|max:255',
                'location'    => 'required|string|max:255',
                'start_date'  => 'required|date',
                'pay_later'   => 'required|in:0,1',
                'end_date'    => 'required|date|after:start_date',
                'description' => 'required|string',
                'event_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            ]);

            $imageName  = null;
            $folderPath = public_path('uploads/event-images');

            if (! file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }

            if ($request->hasFile('event_image')) {
                $image     = $request->file('event_image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move($folderPath, $imageName);
            }

            // INSERT
            $insert = DB::table('tb_club_event')->insert([
                'name'        => $request->event_name,
                'category'    => $request->category,
                'location'    => $request->location,
                'startDate'   => $request->start_date,
                'endDate'     => $request->end_date,
                'payLater'    => $request->pay_later,
                'description' => $request->description,
                'image'       => $imageName,
                'created_at'  => now(),
                'updated_at'  => now(),
                'status'      => 'Active',
            ]);

            return redirect()->route('event.index')
                ->with('success', 'Event created successfully!')
                ->with('class', 'alert-success');

        } catch (\Exception $e) {

            dd($e->getMessage());
        }
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
        try {

            // VALIDATION
            $request->validate([
                'event_name'  => 'required|string|max:255',
                'location'    => 'required|string|max:255',
                'category'    => 'required|string|max:255',
                'start_date'  => 'required|date',
                'pay_later'   => 'required|in:0,1',
                'end_date'    => 'required|date|after:start_date',
                'description' => 'required|string',
                'event_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            ]);

            // GET OLD EVENT
            $event = DB::table('tb_club_event')
                ->where('eventId', $id)
                ->first();

            $imageName = $event->image ?? null;

            if ($request->hasFile('event_image')) {

                $folderPath = public_path('uploads/event-images');

                if (! file_exists($folderPath)) {
                    mkdir($folderPath, 0777, true);
                }

                if (! empty($event->image) && file_exists($folderPath . '/' . $event->image)) {
                    unlink($folderPath . '/' . $event->image);
                }

                $image     = $request->file('event_image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move($folderPath, $imageName);
            }

            // UPDATE EVENT
            DB::table('tb_club_event')
                ->where('eventId', $id)
                ->update([
                    'name'        => $request->event_name,
                    'location'    => $request->location,
                    'category'    => $request->category,
                    'startDate'   => $request->start_date,
                    'endDate'     => $request->end_date,
                    'payLater'    => $request->pay_later,
                    'description' => $request->description,
                    'image'       => $imageName,
                    'updated_at'  => now(),
                ]);

            return redirect()->route('event.index')
                ->with('success', 'Event updated successfully!')
                ->with('class', 'alert-success');

        } catch (\Exception $e) {

            return redirect()->back()
                ->with('error', $e->getMessage())
                ->withInput();
        }
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

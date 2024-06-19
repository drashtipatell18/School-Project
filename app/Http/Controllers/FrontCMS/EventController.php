<?php

namespace App\Http\Controllers\FrontCMS;
use App\Http\Controllers\Controller;
use App\Models\FrontCMS\Event;

use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function events()
    {
        $events = Event::all();
        return view('frontcms.view_event',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function eventCreate()
    {
        return view('frontcms.create_event');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function eventInsert(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'venue' => 'required',
            'startdate' => 'required|date',
            'enddate' => 'required|date', 
        ]);
        $fileName = '';
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('events', $fileName);
        }

        $event = Event::create([
            'title'           => $request->input('title'),
            'venue'           => $request->input('venue'),
            'startdate'       => $request->input('startdate'),
            'enddate'         => $request->input('enddate'), 
            'description'     => $request->input('description'), 
            'image'           => $fileName, 
        ]);

        return redirect()->route('events');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function eventEdit($id)
    {
        $events = Event::find($id);
        return view('frontcms.create_event', compact('events'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function eventUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'venue' => 'required',
            'startdate' => 'required|date',
            'enddate' => 'required|date', 
        ]);

        $events = Event::find($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $filename);
    
            // Update user's image information in the database
            $events->image = isset($filename) ? $filename : null;
        }

        // Update a new ItemStock record
        $events->update([
            'title'           => $request->input('title'),
            'venue'           => $request->input('venue'),
            'startdate'       => $request->input('startdate'),
            'enddate'         => $request->input('enddate'), 
            'description'     => $request->input('description'), 
        ]);
    
        return redirect()->route('events');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function eventDestroy($id)
    {
        $events = Event::find($id);
        $events->delete();
        return redirect()->back();
    }
}

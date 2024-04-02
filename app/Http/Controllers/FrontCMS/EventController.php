<?php

namespace App\Http\Controllers\FrontCMS;
use App\Http\Controllers\Controller;
use App\Models\FrontCMS\Event;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'description' => 'required',
            'image' => 'required',
        ]);
        $fileName = '';
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $storedPath = $image->storeAs('public/events', $fileName); 
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
            'category' => 'required',
            'item' => 'required',
            'supplier' => 'required',
            'store' => 'required', 
            'quantity' => 'required|numeric', 
            'price' => 'required|numeric', 
            'date' => 'required|date', 
            'description' => 'required', 
        ]);

        $events = Event::find($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('events', $filename, 'public');

            // Delete the old file if it exists
            if ($events->image) {
                Storage::disk('public')->delete('events/' . $events->image);
            }

            // Update the attach_document field with the new filename
            $events->image = $filename;
        }

        // Update a new ItemStock record
        $events->update([
           'category'        => $request->input('category'),
            'item'           => $request->input('item'),
            'supplier'       => $request->input('supplier'),
            'store'          => $request->input('store'), 
            'quantity'       => $request->input('quantity'), 
            'price'          => $request->input('price'), 
            'date'           => $request->input('date'), 
            'description'    => $request->input('description'), 
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        $events = event::all()->sortBy('sequence');
        return view("admin.event.events",compact("events"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new event;

        $event->title = $request->title;
        $event->description = $request->description;
        $event->type = $request->type;
          $max_order = event::max('sequence');
            if($max_order){$event->sequence = ++$max_order;}
            else{$event->sequence = 01;}

        // Get feature image
        $file = $request->file('image');
        $destinationPath = 'images/events/';
        $event->image = $file->getClientOriginalName();
        $file->move($destinationPath,$file->getClientOriginalName());

        $event->location = $request->location;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->save();
        return redirect()->route('events.index')->with('success','Event created successfully!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = event::where('id', $id)->first();
        return view('admin.event.edit', compact("event"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = event::find($id);

        $event->title = $request->title;
        $event->description = $request->description;
        $event->type = $request->type;
        
        // Get feature image
        $file = $request->file('image');
        if(empty($file)){
           $event->image = $request->old_img; 
        }else{
            $destinationPath = 'images/events/';
            $event->image = $file->getClientOriginalName();
            $file->move($destinationPath,$file->getClientOriginalName());
        }
        // print_r($file);die;
        $event->location = $request->location;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->update();
        return redirect()->route('events.index')->with('success','Event updated successfully!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = event::find($id);
        $event->delete();
        return back()->with('success','Item deleted successfully!');
    }
    public function sort_event(Request $request){
        // return $request;
        $events = $request->data;
        $i = 0;
        foreach ($events as  $id) {
            $event = event::find($id);
            $event->sequence  = $i;
            $event->update();
            $i++;
        }
    }
}

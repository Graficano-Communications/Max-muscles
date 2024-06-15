<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class OurteamController extends Controller
{ public function __construct()
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
        $ourteams = Team::all()->sortBy('sequence');
        return view('admin.ourteam.ourteam',compact("ourteams"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ourteam.create');
    }

    /**
     * Store a newly created  resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response 
     */
    public  function store(Request $request)
    { 
        
        $our_team = new Team;

        $our_team->name = $request->name; 
        $max_order = Team::max('sequence');
        if($max_order){$our_team->sequence = ++$max_order;}
        else{$our_team->sequence = 01;}
        // Get feature image.
        $file = $request->file('image'); 
        $destinationPath = 'images/ourteam';
        $our_team->image = $file->getClientOriginalName();
        $file->move($destinationPath,$file->getClientOriginalName());
        $our_team->designation=$request->designation;
         
        $our_team->save();
          
        return redirect()->route('ourteam.index')->with('success','Record created successfully!');
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
        $ourteam = Team::where('id', $id)->first();
        return view('admin.ourteam.edit',compact("ourteam"));
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
        $our_team = Team::find($id);

        $our_team->name = $request->name; 
        
        $file = $request->file('image');
        if(empty($file)){
           $our_team->image = $request->old_img; 
        }else{
            $destinationPath = 'images/ourteam';
            $our_team->image = $file->getClientOriginalName();
            $file->move($destinationPath,$file->getClientOriginalName());
        }

        $our_team->designation = $request->designation;

        $our_team->update();
        return redirect()->route('ourteam.index')->with('success','Record of employer updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ourteam = Team::find($id);
        $ourteam->delete();
        return back()->with('success','Record of employer deleted successfully!');
    }
    public function sort_ourteam(Request $request){
        $our_team = $request->data;
        $i = 0;
        foreach ($our_team as  $id) {
            $ourteam = Team::find($id);
            $ourteam->sequence  = $i;
            $ourteam->update();
            $i++;
        }
    }
}

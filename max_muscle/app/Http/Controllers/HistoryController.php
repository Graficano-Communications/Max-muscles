<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\history;

class HistoryController extends Controller
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
         $historys = history::all()->sortBy('sequence');
        return view('admin.history.history',compact("historys"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.history.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $history = new history;
 
        
        $history->year = $request->year; 
        $history->title = $request->title; 
        $history->description = $request->editor1;

        $max_order = history::max('sequence');
        if($max_order){$history->sequence = ++$max_order;}
        else{$history->sequence = 01;}

          // $lid = history::all()->count();
          // $lid = $lid + 1;

    
        
        
        $history->save();
          
        return redirect()->route('history.index')->with('success','history created successfully!');
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
        $historys = history::where('id', $id)->first();
        return view('admin.history.edit',compact("historys"));
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
        $history = history::find($id);  
        $history->year = $request->year;
        $history->title = $request->title; 

          
        $history->description = $request->editor1;
         

        $history->update();
        return redirect()->route('history.index')->with('success','history updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $history = history::find($id);
        $history->delete();
        return back()->with('success','history deleted successfully!');
    }

    public function sort_history(Request $request){
        $historys = $request->data;
        $i = 0;
        foreach ($historys as  $id) {
            $history = history::find($id);
            $history->sequence  = $i;
            $history->update();
            $i++;
        }
    }
}

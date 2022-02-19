<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::get();
        // dd($schedules);
        return view('back.pages.schedule.index',compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.schedule.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

   
    public function store(Request $request)
    {
        $todayDate = date('m/d/Y');
        $request->validate( [
            'date' => 'required|date|after:t'.$todayDate
        ]);
    

        $schedule = new schedule(); 
        $schedule->date = request('date');
        $schedule->time = request('time');

        $schedule->status = 0 ;

        $schedule->save();
        return redirect()->route('schedule.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(schedule $schedule)
    {
        $schedule = schedule::find($schedule->id);
        return view('back.pages.schedule.edit',compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, schedule $schedule)
    {



        $schedule = schedule::find($schedule->id);       
        // $schedule->date = request('date');
        // $schedule->time = request('time');

        $schedule->status = request('status');
        
        $schedule->save();
        return redirect()->route('schedule.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(schedule $schedule)
    {
        schedule::find($schedule->id)->delete();
        return redirect()->back();
    }
}

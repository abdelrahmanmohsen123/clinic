<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use App\Models\Patient;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Validation\Rule;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visits = Visit::get();
        $patients = Patient::get();
        $schedules = Schedule::get();

        // dd($visits);
        return view('back.pages.visit.index',compact('visits','patients','schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = Patient::get();  
        $schedules = Schedule::where('status',0)->get();
      
        return view('back.pages.visit.create',compact('patients','schedules'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

   
    public function store(Request $request)
    {

        $request->validate([

            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'visit_type' => 'required',
            'patient_id' => 'required|exists:patients,id',
            'schedule_id' => 'required|exists:schedules,id'
        ]);

        $visit = new Visit(); 
        $visit->price = request('price');
        $visit->visit_type = request('visit_type');
        $visit->patient_id = request('patient_id');
        $visit->schedule_id = request('schedule_id');

        $schedule = Schedule::find($visit->schedule_id);
        $schedule->status = 1; 
        $schedule->save();
       
        $visit->save();
        return redirect()->route('visit.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function show(Visit $visit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function edit(Visit $visit)
    {
        $visit = Visit::find($visit->id);
        $schedules = Schedule::where('status',0);
        $patients = Patient::get();        
        return view('back.pages.visit.edit',compact('visit','patients','schedules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visit $visit)
    {
        $request->validate([
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'visit_type' => 'required',
            'patient_id' => 'required|exists:patients,id',
            'schedule_id' => 'required|exists:schedules,id'
        ]);
        $visit = Visit::find($visit->id);       
        $visit->price = request('price');
        $visit->visit_type = request('visit_type');
        $visit->patient_id = request('patient_id');
        $visit->schedule_id = request('schedule_id');

        $schedule = Schedule::find($visit->schedule_id);
        $schedule->status = 1; 
        $schedule->save();
        
        $visit->save();
        return redirect()->route('visit.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visit $visit)
    {
        Visit::find($visit->id)->delete();
        return redirect()->back();
    }
}

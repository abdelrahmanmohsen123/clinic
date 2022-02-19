<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::get();
        // dd($patients);
        return view('back.pages.patient.index',compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.patient.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

   
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'age' => ['required'],
            'phone' => ['required', 'unique:patients', 'max:11','min:11']]);

        $patient = new patient(); 
        $patient->name = request('name');
        $patient->age = request('age');
        $patient->phone = request('phone');

       
        $patient->save();
        return redirect()->route('patient.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        $patient = patient::find($patient->id);
        return view('back.pages.patient.edit',compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, patient $patient)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'age' => ['required'],
            'phone' => ['required', 'unique:patients', 'max:11','min:11']]);

        $patient = patient::find($patient->id);       
        $patient->name = request('name');
        $patient->age = request('age');
        $patient->phone = request('phone');
        
        $patient->save();
        return redirect()->route('patient.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(patient $patient)
    {
        patient::find($patient->id)->delete();
        return redirect()->back();
    }
}

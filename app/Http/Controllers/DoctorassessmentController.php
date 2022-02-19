<?php

namespace App\Http\Controllers;

use App\Models\Doctorassessment;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;


class DoctorassessmentController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assessments = Doctorassessment::get();
        $patients = Patient::get();
        // dd($assessments);
        return view('back.pages.assessment.index',compact('assessments','patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = Patient::get();        
        return view('back.pages.assessment.create',compact('patients'));

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
            'diagnose' => 'required|min:3|max:1000',
            'prescription' => 'required|min:3|max:1000',
            'lab_test' => 'required|min:3|max:1000',
            'other_procedure' => 'max:1000',
            'patient_id' => 'required|exists:patients,id'
        ]);

        $assessment = new Doctorassessment(); 
        $assessment->diagnose = request('diagnose');
        $assessment->prescription = request('prescription');
        $assessment->lab_test = request('lab_test');
        $assessment->other_procedure = request('other_procedure');
        $assessment->patient_id = request('patient_id');

       
        $assessment->save();
        return redirect()->route('assessment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function show(Doctorassessment $assessment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctorassessment $assessment)
    {
        $assessment = Doctorassessment::find($assessment->id);
        $patients = Patient::get();        
        return view('back.pages.assessment.edit',compact('assessment','patients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctorassessment $assessment)
    {
        $request->validate([
            'diagnose' => 'required|min:3|max:1000',
            'prescription' => 'required|min:3|max:1000',
            'lab_test' => 'required|min:3|max:1000',
            'other_procedure' => 'max:1000',
            'patient_id' => 'required|exists:patients,id'
        ]);





        $assessment = Doctorassessment::find($assessment->id);       
        $assessment->diagnose = request('diagnose');
        $assessment->prescription = request('prescription');
        $assessment->lab_test = request('lab_test');
        $assessment->other_procedure = request('other_procedure');
        $assessment->patient_id = request('patient_id');

        
        $assessment->save();
        return redirect()->route('assessment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctorassessment $assessment)
    {
        Doctorassessment::find($assessment->id)->delete();
        return redirect()->back();
    }
}

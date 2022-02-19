<?php

namespace App\Http\Controllers;

use App\Models\Procedure;
use Illuminate\Http\Request;

class ProcedureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $procedures = Procedure::get();
        // dd($procedures);
        return view('back.pages.procedure.index',compact('procedures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.procedure.create');

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
            "name" =>" required",
            "price" =>" required|regex:/^\d+(\.\d{1,2})?$/",
        ]);

        $procedure = new procedure(); 
        $procedure->name = request('name');
        $procedure->price = request('price');

       
        $procedure->save();
        return redirect()->route('procedure.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\procedure  $procedure
     * @return \Illuminate\Http\Response
     */
    public function show(procedure $procedure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\procedure  $procedure
     * @return \Illuminate\Http\Response
     */
    public function edit(procedure $procedure)
    {
        $procedure = Procedure::find($procedure->id);
        return view('back.pages.procedure.edit',compact('procedure'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\procedure  $procedure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, procedure $procedure)
    {
        $request->validate([
            "name" =>" required",
            "price" =>" required|regex:/^\d+(\.\d{1,2})?$/",
        ]);

        $procedure = Procedure::find($procedure->id);       
        $procedure->name = request('name');
        $procedure->price = request('price');
        
        $procedure->save();
        return redirect()->route('procedure.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\procedure  $procedure
     * @return \Illuminate\Http\Response
     */
    public function destroy(procedure $procedure)
    {
        procedure::find($procedure->id)->delete();
        return redirect()->back();
    }
}

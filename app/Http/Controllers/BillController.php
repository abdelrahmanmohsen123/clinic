<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillProcedure;
use App\Models\Patient;
use App\Models\Procedure;
use App\Models\Visit;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = Bill::all();
        return view('back.pages.bill.index', compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = Patient::all();
        $procedures = Procedure::all();
        $visits = Visit::all();
        return view('back.pages.bill.create', compact('patients', 'visits', 'procedures'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        // $this->validate($request, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'age' => ['required'],
        //     'phone' => ['required', 'unique:patients', 'max:11','min:11']]);
        $bill = new bill();
        $bill->save();     
        foreach ($request->procedures as $procedure) {
                BillProcedure::create([
                    'bill_id' => $bill->id,
                    'procedure_id' => $procedure
                ]); 
        }
        $visit = Visit::find(request('visit_id'));
        $price_examination =$visit->price;

         $priceallprocedure=0;
        foreach($bill->procedures as $procedure){
            $priceallprocedure += $procedure->price;
        }
        


        $bill->visit_id = request('visit_id');
        $bill->patient_id = request('patient_id');
        $bill->total_price = $priceallprocedure + $price_examination;
        $bill->save();
    


        






        return redirect()->route('bill.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(bill $bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bill = bill::find($id);
 
        $patients = Patient::all();
        $procedures = BillProcedure::all();
        $procedures2 = Procedure::all();

        $visits = Visit::all();

        return view('back.pages.bill.edit', compact('bill', 'procedures','procedures2', 'visits', 'patients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bill = bill::findOrFail($id);

        BillProcedure::where('bill_id', $bill->id)->delete();

        foreach ($request->procedures as $procedure) {
            BillProcedure::create([
                'bill_id' => $bill->id,
                'procedure_id' => $procedure
            ]);
        }
        $visit = Visit::find(request('visit_id'));
        $price_examination =$visit->price;

         $priceallprocedure=0;
        foreach($bill->procedures as $procedure){
            $priceallprocedure += $procedure->price;
        }


        $bill->visit_id = request('visit_id');
        $bill->patient_id = request('patient_id');
        $bill->total_price = $priceallprocedure + $price_examination;
        $bill->save();
        return redirect()->route('bill.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        bill::find($id)->delete();
        return redirect()->back();
    }
}

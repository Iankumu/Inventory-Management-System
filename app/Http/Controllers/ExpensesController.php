<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expenses;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses=Expenses::paginate(5);
        return view('expenses.expenses')->with('expenses',$expenses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expenses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
        'Expense'=>'required',
        'Amount'=>'required',
        ]);

        $expenses=new Expenses;
        $expenses->Expense=$request->input('Expense');
        $expenses->Amount=$request->input('Amount');
        $expenses->save();
        return redirect('/Expenses')->with('success','Expense added');
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
        $expenses=Expenses::find($id);
        return view('expenses.edit')->with('expenses',$expenses);
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
        $this->validate($request,[
            'Expense'=>'required',
            'Amount'=>'required',
            ]);
    
            $expenses=Expenses::find($id);
            $expenses->Expense=$request->input('Expense');
            $expenses->Amount=$request->input('Amount');
            $expenses->save();
            return redirect('/Expenses')->with('success','Expense updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expenses=Expenses::find($id);
        $expenses->delete();
        return redirect('Expenses')->with('success','Expense removed');
    }
}

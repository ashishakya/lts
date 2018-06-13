<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Loan\CreateLoanRequest;
use App\Loan;

class LoansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $loans = Loan::all();
        return view('loan.index',compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('loan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLoanRequest $request)
    {
        
        Loan::create($request->all());
        return redirect('/loans');
        //echo $request->type . ' ' . $request->rate;
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
        $clients = Loan::find($id)->clients;
       

        $loan = Loan::find($id);
        return view('loan.show',compact('loan','clients'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       // $loan = Loan::find($id);
        //return view('loan.edit');
        $loan = Loan::find($id);
        return view('loan.edit',compact('loan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateLoanRequest $request, $id)
    {
        //
        Loan::find($id)->update($request->all());
        return redirect('/loans');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Loan::find($id)->delete();
        return redirect('/loans');
    }
}

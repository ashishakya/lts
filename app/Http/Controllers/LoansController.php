<?php

namespace App\Http\Controllers;

use App\Client;
use App\Loan;
use App\Type;
use Illuminate\Http\Request;

class LoansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $loan, $client, $type;

    public function __construct(Loan $loan, Client $client, Type $type)
    {
        $this->loan   = $loan;
        $this->client = $client;
        $this->type   = $type;
    }

    public function index(Request $request)
    {

        $attribute = $request->all();
        if ( (!($request->has('loanView'))) || ($attribute['loanView'] == 0) ) {
            $loans = $this->loan->with(['clients', 'types', 'payments'])->orderBy('id', 'asc')->get();

        } elseif ( $attribute['loanView'] == 1 ) {
            $loans = $this->loan->with(['clients', 'types', 'payments'])->where('loan_clear', '=', 0)->orderBy('id', 'asc')->get();


        } elseif ( $attribute['loanView'] == 2 ) {
            $loans = $this->loan->with(['clients', 'types', 'payments'])->where('loan_clear', '=', 1)->orderBy('id', 'asc')->get();

        }

        return view('loan.index', compact('loans'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $clients     = $this->client->orderBy('id', 'asc')->get();
        $bindContact = $clients->map(
            function ($client) {
                $client['name_contact'] = $client->name.' | '.$client->contact;

                return $client;
            }
        )->pluck('name_contact', 'id');

        $types = $this->type->all()->pluck('name', 'id');

        return view('loan.create', compact('bindContact', 'types'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    // Request---->client_id | type_id | amount
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'amount' => 'required|numeric|min:1000',
            ]
        );

        $type_id    = $request->type_id;
        $attributes = $request->all();

        $interest               = $this->type::find($type_id)->rate;
        $attributes['interest'] = $interest;

        $this->loan->create($attributes);

        return redirect()->route('loans.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    // retrieve loan/s of specific client | comes from clients.show
    public function show($id)
    {
        $client = $this->client->with(['loans'])->find($id);

        return view('loan.show', compact('client'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function getPaymentsByLoanId($id)
    {
        $loan = $this->loan->with(['payments', 'types', 'clients'])->find($id);

        return view('loan.custom', compact('loan'));

    }
}

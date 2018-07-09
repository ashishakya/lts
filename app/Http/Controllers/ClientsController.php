<?php

namespace App\Http\Controllers;


use App\Exports\ClientsExport;
use App\Http\Requests\Client\CreateClientRequest;
use Illuminate\Http\Request;
use App\Client;
use Maatwebsite\Excel\Facades\Excel;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ( $request->has('parameter') )
        {
            $parameter = $request->parameter;
            $clients   = $this->client
                ->where('name', 'ILIKE', '%'.$parameter.'%')
                ->orwhere('address', 'ILIKE', '%'.$parameter.'%')
                ->orwhere('address', 'ILIKE', '%'.$parameter.'%')
                ->orwhere('contact', 'LIKE', '%'.$parameter.'%')
                ->orderBy('id', 'asc')
                ->get();
        }elseif ( $request->has('field', 'order') ){
            $field   = $request->field;
            $order   = $request->order;
            $clients = $this->client->orderBy($field, $order)->get();

        }else{
            $clients = $this->client->orderBy('id', 'asc')->get();
        }

        return view('client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateClientRequest $request)
    {
        $attributes = $request->all();
        $this->client->create($attributes);
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)   // Client::find($id)
    {
        //$client = $this->client->find($id);
        return view('client.show', compact('client'));
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
        $client = $this->client->find($id);
        return view('client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CreateClientRequest $request, $id)
    {
        $attributes = $request->all();
        $client     = $this->client->find($id);
        $client->update($attributes);
        return redirect()->route('clients.index');
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
        $this->client->find($id)->delete();
        return redirect()->route('clients.index');
    }

    public function exportExcel(){
        return Excel::download(new ClientsExport,'invoice.xlsx');
    }
}

<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	protected $client;

	public function __construct(Client $client) {
		$this->client = $client;
	}

	public function index() {
		//
		$clients = $this->client->orderBy('id', 'asc')->get();
		return view('client.index', compact('clients'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
		//return 'this is create method';
		return view('client.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
		$atrributes = $request->all();
		//Client::create($request->all);
		$this->client->create($atrributes);
		return redirect()->route('clients.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {

		//return 'this is show method of client';
		// $client = $this->client->find($id);
		// return view('client.show', compact('client'));
		// //return $client;

		$client = $this->client->find($id);
		return view('client.show', compact('client'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
		$client = $this->client->find($id);
		return view('client.edit', compact('client'));
		//return 'this is edit method';
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//

		$this->client->find($id)->update($request->all());
		return redirect()->route('clients.index');
		//return 'this is update method';
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
		$this->client->find($id)->delete();
		return redirect()->route('clients.index');
	}

}

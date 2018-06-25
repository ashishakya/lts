<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class TypesController extends Controller {

	protected $type;

	public function __construct(Type $type) {
		$this->type = $type;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$types = $this->type->orderBy('id', 'asc')->get();
		return view('type.index', compact('types'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('type.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		try {
			$attributes = $request->all();

			$this->type->create($attributes);

		} catch (\Exception $exception) {
			logger()->error($exception);

			return back()->withInput()->withError('Failed to create type.');
		}

		return redirect()->route('types.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {

		try {
			$type = $this->type->find($id);
		} catch (ModelNotFoundException $modelNotFoundException) {}
		return view('type.show', compact('type'));
	}

	/*
		 * Show the form for editing the specified resource.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
	*/
	public function edit($id) {
		//
		// return 'this is edit method';
		$type = $this->type->find($id);
		return view('type.edit', compact('type'));
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
		$attributes = $request->all();
		$type = $this->type->find($id);
		$type->update($attributes);
		return redirect('/types');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$this->type->find($id)->delete();
		return redirect('/types');
	}
}

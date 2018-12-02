<?php

namespace App\Http\Controllers;

use App\Http\Requests\Type\CreateTypeRequest;
use App\Lts\Services\TypeService;
use App\Type;
use Exception;
use Illuminate\Http\Request;

class TypesController extends Controller
{

    protected $type, $typeService;

    public function __construct(Type $type, TypeService $typeService)
    {
        $this->type        = $type;
        $this->typeService = $typeService;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* before
             **** look @ usage of type in constructor
             *
             * $types = $this->type->orderBy('id', 'asc')->get();
             return view('type.index', compact('types'));
         */


        $types = $this->typeService->getAll();

        return view('type.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTypeRequest $request)
    {   /*
            try {
                $attributes = $request->all();

                $this->type->create($attributes);

            } catch (Exception $exception) {
                logger()->error($exception);

                return back()->withInput()->withError('Failed to create type.');
            }

            return redirect()->route('types.index');
        */


        try {
            $attributes = $request->all();

            $this->typeService->store($attributes);

        } catch (Exception $exception) {
            logger()->error($exception);

            return back()->withInput()->withError('Failed to create type.');
        }
        flash()->info('Loan type is successfully stored.');
        return redirect()->route('types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   /*
            $type = $this->type->with(['loans'])->findOrFail($id);
            return view('type.show', compact('type'));
        */

        $type = $this->typeService->getLoansByTypeId($id);

        return view('type.show', compact('type'));

    }

    /*
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {   /*
            try {
                $this->authorize('update', Type::class);
            } catch (Exception $e) {
                flash()->warning('Alert: Unauthorised Access');

                return redirect()->route('types.index');
            }
            $type = $this->type->findOrFail($id);

            return view('type.edit', compact('type'));
        */

        try {
            $this->authorize('update', Type::class);
        } catch (Exception $e) {
            flash()->warning('Alert: Unauthorised Access');

            return redirect()->route('types.index');
        }
        $type = $this->typeService->getById($id);

        return view('type.edit', compact('type'));
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
        /*
            $attributes = $request->all();
            $type       = $this->type->findOrFail($id);
            $type->update($attributes);

            return redirect('/types');
        */

        $attributes = $request->all();

        try {
            $this->typeService->update($attributes, $id);
        } catch (Exception $e) {
            flash()->warning('Alert: Unable to update loan type');

            return redirect()->route('types.index');
        }
        flash()->info('Loan type is  successfully updated.');

        return redirect()->route('types.index');
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
        /*
            $this->type->findOrFail($id)->delete();

            return redirect()->route('types.index');
        */
        try {
            $this->typeService->delete($id);
        } catch (Exception $e) {
            flash()->warning('Alert: Unable to delete loan type');

            return redirect()->route('types.index');
        }
        flash()->info('Loan type is successfully deleted.');

        return redirect()->route('types.index');

    }
}

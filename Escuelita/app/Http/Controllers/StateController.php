<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class StateController extends Controller
{
   
    public function index()
    {
        $states = State::where('borrar', 1)->get();
        return view('state.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('state.create');
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
        {

        // @dd($request);
            $this->validate($request, [
                'estatus' => 'required'
            ]);
            
            
            $state = new State();
            $state->status = $request->input('estatus');
            $state->save();
            return redirect()->route('state.index')->with(array(
                'message' => 'El registro se ha echo correctamente'
            ));
            
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    {
        $state = State::findOrFail($id);
        return view('state.edit', array(
            'state'=>$state
        ));
     
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'state' => 'required'
        ]);
        
        $state = State::findOrFail($id);
        $state->status = $request->input('state');
        $state->save();
        return redirect()->route('state.index')->with(array(
            'message' => 'El registro se ha echo correctamente'
        ));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $state = State::findOrFail($id);
        $state->borrar = 0;
        $state->save();
        return redirect()->route('state.index')->with(array(
            'message' => 'El registro se ha echo correctamente'
        ));

    }
}

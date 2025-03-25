<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::all();
        return view('schedule.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('schedule.create');
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
        {
            $validated = $request->validate([
                'days' => 'required|string|max:255',
                'time_start' => 'required|date_format:H:i',
                'time_end' => 'required|date_format:H:i|after:time_start',
            ]);
        
            $validated['id_estado'] = $request->input('id_estado', 1);
            $schedule = new Schedule();        
            $schedule->days = $validated['days'];
            $schedule->time_start = $validated['time_start'];
            $schedule->time_end = $validated['time_end'];
            $schedule->id_estado = $validated['id_estado'];
            $schedule->save();
            return redirect()->back()->with('success', 'Hora creada con éxito.');
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('schedule.edit', array(
            'schedule'=>$schedule
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $validated = $request->validate([
            'days' => 'required|string|max:255',
            'time_start' => 'required|date_format:H:i',
            'time_end' => 'required|date_format:H:i|after:time_start',
        ]);
        
        $schedule = Schedule::findOrFail($id); 
        $schedule->days = $request->input('days');
        $schedule->time_start = $request->input('time_start');
        $schedule->time_end =$request->input('time_end');
        $schedule->save();
        return redirect()->route('horas.index')->with(array(
            'message' => 'El registro se ha echo correctamente'
        ));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

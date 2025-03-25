<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $students = Student::where('id_estado', '!=', 4)->get();
    return view('student.index', compact('students'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    public function imprimirPDF()
{
    $students = Student::where('id_estado', '!=', 4)->get();
    $pdf = \PDF::loadView('student.pdf', compact('students'));
    return $pdf->stream('lista_estudiantes.pdf');
}
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'lastnameM' => 'required|string|max:100',
            'birthday' => 'required|date',
            'placeBirth' => 'required|string|max:100',
            'CURP' => 'required|string|max:18|unique:students,CURP',
            'address' => 'required|string|max:100',
            'cp' => 'required|string|max:6',
            'municipality' => 'required|string|max:50',
            'phone' => 'required|string|max:30',
            'statusCivil' => 'required|string|max:50',
            'occupation' => 'required|string|max:100',
            'lastgrade' => 'required|string|max:50',
            'chronicDisease' => 'nullable|string|max:100',
            'nameDisease' => 'nullable|string|max:100',
            'phoneDisease' => 'nullable|string|max:30',
        ]);

        $student = new Student();
        $student->name = $request->input('name');
        $student->lastname = $request->input('lastname');
        $student->lastnameM = $request->input('lastnameM');
        $student->birthday = $request->input('birthday');
        $student->placeBirth = $request->input('placeBirth');
        $student->CURP = $request->input('CURP');
        $student->address = $request->input('address');
        $student->cp = $request->input('cp');
        $student->municipality = $request->input('municipality');
        $student->phone = $request->input('phone');
        $student->statusCivil = $request->input('statusCivil');
        $student->occupation = $request->input('occupation');
        $student->lastgrade = $request->input('lastgrade');
        $student->chronicDisease = $request->input('chronicDisease');
        $student->nameDisease = $request->input('nameDisease');
        $student->phoneDisease = $request->input('phoneDisease');
        $student->save();

        return redirect()->route('student.index')->with(['message' => 'El estudiante se ha registrado correctamente']);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


}

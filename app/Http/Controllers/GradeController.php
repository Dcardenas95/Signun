<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::paginate(10);
        return view('grades.index', [
            'grades' => $grades
        ]
    );
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validar los datos del formulario si es necesario
        $validatedData = $request->validate([
            'subject' => 'required|string|max:255',
            'nameTeacher' => 'required|string|max:255',
            'hour' => 'required|date_format:H:i',
            'credit' => 'required|integer',
        ]);
        
        $grade = new Grade();

        $grade->create([
            'subject' => $validatedData['subject'],
            'nameTeacher' => $validatedData['nameTeacher'],
            'hour' => $$validatedData['hour'],
            'credit' => $validatedData['credit'],
        ]);

        $respuesta = array(
            'message'      => "Asignatura creada Con exito",
            'status'      => 1,
        );

        return response()->json($respuesta);
       
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        return view( 'grades.edit', ['grade' => $grade]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grade $grade)
    {

        // Validar los datos del formulario si es necesario
        $validatedData = $request->validate([
            'subject' => 'required|string|max:255',
            'nameTeacher' => 'required|string|max:255',
            'hour' => 'required|date_format:H:i',
            'credit' => 'required|integer',
        ]);

        // // Actualizar los campos del modelo Grade con los datos validados
        $grade->subject = $validatedData['subject'];
        $grade->nameTeacher = $validatedData['nameTeacher'];
        $grade->hour = $validatedData['hour'];
        $grade->credit = $validatedData['credit'];

        // // Guardar el modelo actualizado en la base de datos
        $grade->save();

        // Devolver una respuesta JSON con un mensaje de éxito
        return Redirect::route('grades.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $grade)
    {
        $grade->delete();
        return Redirect::route('grades.index');
    }
}

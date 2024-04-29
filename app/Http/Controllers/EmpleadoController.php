<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados= Empleado::where("id_estado",1)->get();
        return view('empleado.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!Auth::check())
        {
            return redirect('/login');
        }

        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!Auth::check())
        {
            return redirect('/login');
        }
        $validatedData = $request->validate([
             'codigo_empleado' => 'required',
             'nombre' => 'required',
             'puesto' => 'required',
             'telefono' => 'required|numeric|min:8',
         ]);

         
        $registro= now();
        $empleados = new Empleado;
        $empleados-> codigo_empleado = $request->codigo_empleado;
        $empleados-> descripcion = $request->nombre;
        $empleados-> telefono = $request->telefono;
        $empleados-> puesto = $request->puesto;
        $empleados-> id_estado= 1;
        $empleados-> id_usuario= auth()->user()->id;
        $empleados-> registro= $registro;
        $empleados-> updated= $registro;
        $empleados->save();

        return redirect('/empleado/create')->with(['message' => 'Empleado Registrado con Exito.', 'alert' => 'alert-success']);
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
        if(!Auth::check())
        {
            return redirect('/login');
        }
        $empleado= Empleado::find($id);
        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(!Auth::check())
        {
            return redirect('/login');
        }
        $validatedData = $request->validate([
             'codigo_empleado' => 'required',
             'nombre' => 'required',
             'puesto' => 'required',
             'telefono' => 'required|numeric|min:8',
         ]);

        $empleados = Empleado::find($id);;
        $empleados-> codigo_empleado = $request->codigo_empleado;
        $empleados-> descripcion = $request->nombre;
        $empleados-> telefono = $request->telefono;
        $empleados-> puesto = $request->puesto;
        $empleados-> id_estado= 1;
        $empleados->save();

        return redirect("/empleado/$id/edit")->with(['message' => 'Empleado Editado con Exito!', 'alert' => 'alert-success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

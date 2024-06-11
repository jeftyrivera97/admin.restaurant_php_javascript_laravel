<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Update;
use App\Models\EmpleadoCategoria;
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
        $id_usuario= auth()->user()->id;
       
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

        $id_usuario= auth()->user()->id;
        $categorias = EmpleadoCategoria::where('id_estado',1)->get();

        return view('empleado.create', compact('id_usuario','categorias'));
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
             'id_categoria' => 'required',
             'telefono' => 'required|numeric|min:8',
         ]);

         
        $registro= now();
        $id_usuario= auth()->user()->id;
        

        $empleados = new Empleado;
        $empleados-> codigo_empleado = $request->codigo_empleado;
        $empleados-> descripcion = $request->nombre;
        $empleados-> telefono = $request->telefono;
        $empleados-> id_categoria = $request->id_categoria;
        $empleados-> id_estado= 1;
        $empleados-> id_empresa = 1;
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
        $id_usuario= auth()->user()->id;
        $id_usuario= auth()->user()->id;
        
        $categorias = EmpleadoCategoria::where('id_estado',1)->get();

      


        return view('empleado.edit', compact('empleado','id_usuario','categorias'));
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
             'id_categoria' => 'required',
             'telefono' => 'required|numeric|min:8',
         ]);
        $id_usuario= auth()->user()->id;
      

        $valor_inicial=  Empleado::where("id","$id")->get();
        $updated= now();

        $empleados = Empleado::find($id);
        $empleados-> codigo_empleado = $request->codigo_empleado;
        $empleados-> descripcion = $request->nombre;
        $empleados-> telefono = $request->telefono;
        $empleados-> id_categoria = $request->id_categoria;
        $empleados-> id_estado= 1;
        $empleados-> updated= $updated;
        $empleados->save();

        $valor_final= Empleado::where("id","$id")->get();

        $updates = new Update;
        $updates->tabla= "Empleados";
        $updates->codigo= $empleados->id;
        $updates->valor_inicial= $valor_inicial;
        $updates->valor_final=  $valor_final;
        $updates-> id_empresa =1;
        $updates-> id_usuario= auth()->user()->id;
        $updates-> fecha= $updated;
        $updates-> descripcion= "Empleado Modificado";
        $updates->save();

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

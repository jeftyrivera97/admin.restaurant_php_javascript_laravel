<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores= Proveedor::where("id_estado",1)->get();
        return view('proveedor.index', compact('proveedores'));
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

        return view('proveedor.create');
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
             'codigo_proveedor' => 'required',
             'descripcion' => 'required',
             'contacto' => 'required',
             'categoria' => 'required',
             'telefono' => 'required|numeric|min:8',
         ]);

        $proveedores = new Proveedor;
        $proveedores-> codigo_proveedor = $request->codigo_proveedor;
        $proveedores-> descripcion = $request->descripcion;
        $proveedores-> contacto = $request->contacto;
        $proveedores-> telefono = $request->telefono;
        $proveedores-> categoria = $request->categoria;
        $proveedores-> id_estado= 1;
        $proveedores->save();

        return redirect('/proveedor/create')->with(['message' => 'Proveedor Registrado con Exito.', 'alert' => 'alert-success']);
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
        $proveedor= Proveedor::find($id);
        return view('proveedor.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'codigo_proveedor' => 'required',
            'descripcion' => 'required',
            'contacto' => 'required',
            'categoria' => 'required',
            'telefono' => 'required|numeric|min:8',
        ]);

       $proveedores = Proveedor::find($id);
       $proveedores-> codigo_proveedor = $request->codigo_proveedor;
       $proveedores-> descripcion = $request->descripcion;
       $proveedores-> contacto = $request->contacto;
       $proveedores-> telefono = $request->telefono;
       $proveedores-> categoria = $request->categoria;
       $proveedores-> id_estado= 1;
       $proveedores->save();

       return redirect("/proveedor/$id/edit")->with(['message' => 'Proveedor Editado con Exito!', 'alert' => 'alert-success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Models\Update;
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
        
        if(!Auth::check())
        {
            return redirect('/login');
        }

        $id_usuario= auth()->user()->id;
        if($id_usuario==1 or $id_usuario==2 or $id_usuario==3 ){
            $id_empresa=1;
        }
        else if($id_usuario==4 or $id_usuario==5 or $id_usuario==6){
            $id_empresa=2;
        }
        
        $proveedores= Proveedor::where("id_estado",1)->where('id_empresa',$id_empresa)->get();
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

        $id_usuario= auth()->user()->id;

        return view('proveedor.create', compact("id_usuario"));
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

         $id_usuario= auth()->user()->id;
         if($id_usuario==1 or $id_usuario==2 or $id_usuario==3 ){
             $id_empresa=1;
         }
         else if($id_usuario==4 or $id_usuario==5 or $id_usuario==6){
             $id_empresa=2;
         }

        $registro= now();

        $proveedores = new Proveedor;
        $proveedores-> codigo_proveedor = $request->codigo_proveedor;
        $proveedores-> descripcion = $request->descripcion;
        $proveedores-> contacto = $request->contacto;
        $proveedores-> telefono = $request->telefono;
        $proveedores-> categoria = $request->categoria;
        $proveedores-> id_estado= 1;
        $proveedores-> id_empresa = $id_empresa;
        $proveedores-> id_usuario= auth()->user()->id;
        $proveedores-> registro= $registro;
        $proveedores-> updated= $registro;
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
        $id_usuario= auth()->user()->id;
        return view('proveedor.edit', compact('proveedor','id_usuario'));
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
        $id_usuario= auth()->user()->id;
        if($id_usuario==1 or $id_usuario==2 or $id_usuario==3 ){
            $id_empresa=1;
        }
        else if($id_usuario==4 or $id_usuario==5 or $id_usuario==6){
            $id_empresa=2;
        }

       $updated= now();

       $valor_inicial=  Proveedor::where("id","$id")->get();

       $proveedores = Proveedor::find($id);
       $proveedores-> codigo_proveedor = $request->codigo_proveedor;
       $proveedores-> descripcion = $request->descripcion;
       $proveedores-> contacto = $request->contacto;
       $proveedores-> telefono = $request->telefono;
       $proveedores-> categoria = $request->categoria;
       $proveedores-> id_estado= 1;
       $proveedores-> id_usuario= auth()->user()->id;
       $proveedores-> updated= $updated;
       $proveedores->save();

       $valor_final= Proveedor::where("id","$id")->get();
       $updates = new Update;
       $updates->tabla= "Proveedores";
       $updates->codigo= $proveedores->id;
       $updates->valor_inicial= $valor_inicial;
       $updates->valor_final=  $valor_final;
       $updates-> id_empresa = $id_empresa;
       $updates-> id_usuario= auth()->user()->id;
       $updates-> fecha= $updated;
       $updates-> descripcion= "Proveedor Modificado";
       $updates->save();


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

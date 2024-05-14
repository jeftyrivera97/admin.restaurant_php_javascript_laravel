<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Update;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id_usuario= auth()->user()->id;
        if($id_usuario==1 or $id_usuario==2 or $id_usuario==3 ){
            $id_empresa=1;
        }
        else if($id_usuario==4 or $id_usuario==5 or $id_usuario==6){
            $id_empresa=2;
        }

        $clientes= Cliente::where("id_estado",1)->where('id_empresa',$id_empresa)->get();
        return view('cliente.index', compact('clientes'));
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

        return view('cliente.create');
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
             'codigo_cliente' => 'required',
             'nombre' => 'required',
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

        $clientes = new Cliente;
        $clientes-> codigo_cliente = $request->codigo_cliente;
        $clientes-> descripcion = $request->nombre;
        $clientes-> telefono = $request->telefono;
        $clientes-> id_empresa=  $id_empresa;
        $clientes-> id_estado= 1;
        $clientes-> id_usuario= auth()->user()->id;
        $clientes-> registro= $registro;
        $clientes-> updated= $registro;
        $clientes->save();

        return redirect('/cliente/create')->with(['message' => 'Cliente Registrado con Exito.', 'alert' => 'alert-success']);
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
        $cliente= Cliente::find($id);
        return view('cliente.edit', compact('cliente'));
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
             'codigo_cliente' => 'required',
             'nombre' => 'required',
             'telefono' => 'required|numeric|min:8',
         ]);

        $updated= now();
        $valor_inicial=  Cliente::where("id","$id")->get();

        $id_usuario= auth()->user()->id;
        if($id_usuario==1 or $id_usuario==2 or $id_usuario==3 ){
            $id_empresa=1;
        }
        else if($id_usuario==4 or $id_usuario==5 or $id_usuario==6){
            $id_empresa=2;
        }

        $clientes = Cliente::find($id);
        $clientes-> codigo_cliente = $request->codigo_cliente;
        $clientes-> descripcion = $request->nombre;
        $clientes-> telefono = $request->telefono;
        $clientes-> id_estado= 1;
        $clientes-> updated= $updated;
        $clientes->save();

        $valor_final= Cliente::where("id","$id")->get();
        $updates = new Update;
        $updates-> fecha= $updated;
        $updates-> descripcion= "Cliente Modificado";
        $updates->tabla= "Clientes";
        $updates->codigo= $clientes->id;
        $updates->valor_inicial= $valor_inicial;
        $updates->valor_final=  $valor_final;
        $updates->id_empresa=  $id_empresa;
        $updates-> id_usuario= auth()->user()->id;
      
        $updates->save();

      


        return redirect("/cliente/$id/edit")->with(['message' => 'Cliente Editado con Exito!', 'alert' => 'alert-success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

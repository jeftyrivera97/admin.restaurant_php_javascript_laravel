<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\Models\Update;
use App\Models\ProductoCategoria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

class ProductoController extends Controller
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

        $mes= now()->format('F');
        $numMes = now()->format('m');
        $mes= $this->obtenerMes($numMes);
        $año = now()->format('y');
        $fecha_inicial="$año-$numMes-01";
        $fecha_final="$año-$numMes-31";
        $productos= Producto::where("id_estado",1)->where('id_empresa',$id_empresa)->get();
        return view('producto.index', compact('productos','mes','año'));
    }

    public static function obtenerMes($n){
        switch ($n) {
            case '01':
                $nombre="Enero";
                break;
                case '02':
                $nombre="Febrero";
                break;
                case '03':
                $nombre="Marzo";
                break;
                case '04':
                $nombre="Abril";
                break;
                case '05':
                $nombre="Mayo";
                break;
                case '06':
                $nombre="Junio";
                break;
                case '07':
                $nombre="Julio";
                break;
                case '08':
                $nombre="Agosto";
                break;
                case '09':
                $nombre="Septiembre";
                break;
                case '10':
                $nombre="Octubre";
                break;
                case '11':
                $nombre="Noviembre";
                break;
                case '12':
                $nombre="Diciembre";
                break;
            
            default:
                # code...
                break;
        }
        return $nombre;
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

        $categorias=ProductoCategoria::where('id_estado',1)->get();

        return view('producto.create',compact('categorias'));
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
             'codigo_producto' => 'required',
             'id_categoria' => 'required',
             'descripcion' => 'required',
             'stock' => 'required|numeric',
             'costo' => 'required|numeric',
         ]);

         $id_usuario= auth()->user()->id;
         if($id_usuario==1 or $id_usuario==2 or $id_usuario==3 ){
             $id_empresa=1;
         }
         else if($id_usuario==4 or $id_usuario==5 or $id_usuario==6){
             $id_empresa=2;
         }
         
        $registro= now();

        $productos = new Producto;
        $productos-> codigo_producto = $request->codigo_producto;
        $productos-> descripcion = $request->descripcion;
        $productos-> id_categoria = $request->id_categoria;
        $productos-> stock = $request->stock;
        $productos-> costo = $request->costo;
        $productos-> id_estado= 1;
        $productos-> id_empresa = $id_empresa;
        $productos-> id_usuario= auth()->user()->id;
        $productos-> registro= $registro;
        $productos-> updated= $registro;
        $productos->save();

        return redirect('/producto/create')->with(['message' => 'Producto Registrado con Exito.', 'alert' => 'alert-success']);
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
        $producto= Producto::where('id',$id)->first();
        $categorias = ProductoCategoria::where('id_estado',1)->get();
        return view('producto.edit', compact('categorias','producto','id'));
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
             'codigo_producto' => 'required',
             'id_categoria' => 'required',
             'descripcion' => 'required',
             'stock' => 'required|numeric',
             'costo' => 'required|numeric',
         ]);

         $id_usuario= auth()->user()->id;
         if($id_usuario==1 or $id_usuario==2 or $id_usuario==3 ){
             $id_empresa=1;
         }
         else if($id_usuario==4 or $id_usuario==5 or $id_usuario==6){
             $id_empresa=2;
         }
         
        $updated= now();
        $valor_inicial=  Producto::where("id","$id")->get();
        
        $productos = Producto::find($id);
        $productos-> codigo_producto = $request->codigo_producto;
        $productos-> descripcion = $request->descripcion;
        $productos-> id_categoria = $request->id_categoria;
        $productos-> stock = $request->stock;
        $productos-> costo = $request->costo;
        $productos-> id_estado= 1;
        $productos-> id_usuario= auth()->user()->id;
        $productos-> updated= $updated;
        $productos->save();

        $valor_final=  Producto::where("id","$id")->get();
        
        $updates = new Update;
        $updates->tabla= "Productos";
        $updates->codigo= $productos->id;
        $updates->valor_inicial= $valor_inicial;
        $updates->valor_final=  $valor_final;
        $updates-> id_empresa = $id_empresa;
        $updates-> id_usuario= auth()->user()->id;
        $updates-> registro= $updated;
        $updates->save();

        return redirect("/producto/$id/edit")->with(['message' => 'Producto Actualizado con Exito!', 'alert' => 'alert-success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

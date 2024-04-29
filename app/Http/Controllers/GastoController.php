<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use App\Models\GastoCategoria;
use App\Models\Update;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class GastoController extends Controller
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
        $mes= now()->format('F');
        $numMes = now()->format('m');
        $mes= $this->obtenerMes($numMes);
        $año = now()->format('y');
        $fecha_inicial="$año-$numMes-01";
        $fecha_final="$año-$numMes-31";
        $gastos=Gasto::where('fecha', '>=', $fecha_inicial)->where('fecha', '<=', $fecha_final)->where('id_categoria','!=', 1)->orderBy('fecha')->get();
        return view('gasto.index', compact('gastos','mes','año'));
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
        $categorias = GastoCategoria::where('id_estado',1)->get();
        return view('gasto.create', compact('categorias'));
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
        if(!Auth::check())
        {
            return redirect('/login');
        }
        $validatedData = $request->validate([
             'codigo_gasto' => 'required',
             'fecha' => 'required',
             'total' => 'required|numeric|min:1',
             'id_categoria' => 'required',
         ]);

         $registro= now();

        $gastos = new Gasto;
        $gastos-> codigo_gasto = $request->codigo_gasto;
        $gastos-> fecha = $request->fecha;
        $gastos-> descripcion = $request->descripcion;
        $gastos-> id_categoria = $request->id_categoria;
        $gastos-> total = $request->total;
        $gastos-> id_usuario= auth()->user()->id;
        $gastos-> registro= $registro;
        $gastos-> updated= $registro;
        $gastos->save();

        

        return redirect('/gasto/create')->with(['message' => 'Gasto Registrado con Exito.', 'alert' => 'alert-success']);
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
        $gasto= Gasto::where('id',$id)->first();
        $categorias = GastoCategoria::where('id_estado',1)->get();
        return view('gasto.edit', compact('categorias','gasto','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        if(!Auth::check())
        {
            return redirect('/login');
        }

        $validatedData = $request->validate([
            'codigo_gasto' => 'required',
            'fecha' => 'required',
            'total' => 'required|numeric|min:1',
            'id_categoria' => 'required',
         ]);

         $updated= now();
         $valor_inicial=  Gasto::where("id","$id")->get();

        $gastos =  Gasto::find($id);
        $gastos-> codigo_gasto = $request->id;
        $gastos-> fecha = $request->fecha;
        $gastos-> descripcion = $request->descripcion;
        $gastos-> id_categoria = $request->id_categoria;
        $gastos-> total = $request->total;
        $gastos-> id_usuario= auth()->user()->id;
        $gastos-> updated= $updated;
        $gastos->save();

        $valor_final=  Gasto::where("id","$id")->get();

        $updates = new Update;
        $updates->tabla= "Gastos";
        $updates->codigo= $request->id;
        $updates->valor_inicial= $valor_inicial;
        $updates->valor_final=  $valor_final;
        $updates-> id_usuario= auth()->user()->id;
        $updates-> registro= $updated;
        $updates->save();

        return redirect("/gasto/$id/edit")->with(['message' => 'Gasto Actualizado con Exito!', 'alert' => 'alert-success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

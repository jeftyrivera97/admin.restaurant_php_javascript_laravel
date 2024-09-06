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
        $id_usuario= auth()->user()->id;
    
        $mes= now()->format('F');
        $numMes = now()->format('m');
        $mes= $this->obtenerMes($numMes);
        $año = now()->format('y');
        
        if($numMes== 1){
            $numMesA=12;
            $añoA= $año-1;
        }else{
            $numMesA = $numMes-1;
            $añoA= $año;
        }

        $fecha_inicial="$año-$numMes-01";
        $fecha_final="$año-$numMes-31";
        $gastos=Gasto::where('fecha', '>=', $fecha_inicial)->where('fecha', '<=', $fecha_final)->where('id_categoria','!=', 1)->get();
        $registros= Gasto::where('fecha', '>=', "$año-01-01")->where('fecha', '<=', "$año-12-31")->orderBy('fecha')->get();

        $totalMes=  Gasto::where('fecha', '>=', $fecha_inicial)->where('fecha', '<=', $fecha_final)->sum('total');

        $gastosAnual=Gasto::where('fecha', '>=',"$año-01-01")->where('fecha', '<=', "$año-12-31")->sum('total');
        $gastosAnual = number_format($gastosAnual, 2);
        $gastosAnual= "L. $gastosAnual ";

        $mesAnterior=Gasto::where('fecha', '>=', "$añoA-$numMesA-01")->where('fecha', '<=', "$añoA-$numMesA-31")->sum('total');
        $mesAnterior = number_format($mesAnterior, 2);
        $mesAnterior= "L. $mesAnterior ";
        
        $promedioSemanal= $totalMes/4.5;
        $promedioSemanal = number_format($promedioSemanal, 2);
        $promedioSemanal= "L. $promedioSemanal ";
        $totalMes = number_format($totalMes, 2);
        $totalMes= "L. $totalMes ";

    
        return view('gasto.index', compact('gastos','mes','año','registros','gastosAnual','totalMes','promedioSemanal','mesAnterior'));
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
         $id_usuario= auth()->user()->id;
      

        $gastos = new Gasto;
        $gastos-> codigo_gasto = $request->codigo_gasto;
        $gastos-> fecha = $request->fecha;
        $gastos-> descripcion = $request->descripcion;
        $gastos-> id_categoria = $request->id_categoria;
        $gastos-> total = $request->total;
        $gastos-> id_empresa = 1;
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

         $id_usuario= auth()->user()->id;
      
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
        $updates-> id_empresa =1;
        $updates-> id_usuario= auth()->user()->id;
        $updates-> fecha= $updated;
        $updates-> descripcion= "Gasto Modificado";
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

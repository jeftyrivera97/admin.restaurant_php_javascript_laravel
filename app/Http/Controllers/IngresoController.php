<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use App\Models\Cliente;
use App\Models\Ingreso;
use App\Models\Update;
use App\Models\IngresoCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;


class IngresoController extends Controller
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
        $ingresos=Ingreso::where('fecha', '>=', $fecha_inicial)->where('fecha', '<=', $fecha_final)->get();
        $registros= Ingreso::where('fecha', '>=', "$año-01-01")->where('fecha', '<=', "$año-12-31")->orderBy('fecha')->get();

        $totalMes=  Ingreso::where('fecha', '>=', $fecha_inicial)->where('fecha', '<=', $fecha_final)->sum('total');

        $ingresosAnual=Ingreso::where('fecha', '>=',"$año-01-01")->where('fecha', '<=', "$año-12-31")->sum('total');
        $ingresosAnual = number_format($ingresosAnual, 2);
        $ingresosAnual= "L. $ingresosAnual ";

        $mesAnterior=Ingreso::where('fecha', '>=', "$añoA-$numMesA-01")->where('fecha', '<=', "$añoA-$numMesA-31")->sum('total');
        $mesAnterior = number_format($mesAnterior, 2);
        $mesAnterior= "L. $mesAnterior ";
        
        $promedioSemanal= $totalMes/4.5;
        $promedioSemanal = number_format($promedioSemanal, 2);
        $promedioSemanal= "L. $promedioSemanal ";
        $totalMes = number_format($totalMes, 2);
        $totalMes= "L. $totalMes ";

        return view('ingreso.index', compact('ingresos','mes','año','registros','ingresosAnual','totalMes','promedioSemanal','mesAnterior'));
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
        $id_usuario= auth()->user()->id;
        $categorias = IngresoCategoria::where('id_estado',1)->get();
       
        return view('ingreso.create', compact('categorias'));
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
             'descripcion' => 'required',
             'fecha' => 'required',
             'total' => 'required|numeric|min:1',
             'id_categoria' => 'required',
         ]);

         $id_usuario= auth()->user()->id;
        $registro= now();

        $ingresos = new Ingreso;
        $ingresos-> descripcion = $request->descripcion;
        $ingresos-> fecha = $request->fecha;
        $ingresos-> id_categoria = $request->id_categoria;
        $ingresos-> total = $request->total;
        $ingresos-> id_empresa = 1;
        $ingresos-> id_usuario= auth()->user()->id;
        $ingresos-> registro= $registro;
        $ingresos-> updated= $registro;
        $ingresos->save();

        return redirect('/ingreso/create')->with(['message' => 'Ingreso Registrado con Exito.', 'alert' => 'alert-success']);
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
    public function edit($id)
    {
        if(!Auth::check())
        {
            return redirect('/login');
        }
        $ingreso= Ingreso::find($id);
        $categorias = IngresoCategoria::where('id_estado',1)->get();
        return view('ingreso.edit', compact('categorias','id','ingreso'));
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
             'descripcion' => 'required',
             'fecha' => 'required',
             'total' => 'required|numeric|min:1',
             'id_categoria' => 'required',
         ]);

         $id_usuario= auth()->user()->id;
         
        $update= now();
        $valor_inicial=  Ingreso::where("id","$id")->get();

        $ingresos =  Ingreso::find($id);
        $ingresos-> descripcion = $request->descripcion;
        $ingresos-> fecha = $request->fecha;
        $ingresos-> id_categoria = $request->id_categoria;
        $ingresos-> total = $request->total;
        $ingresos-> id_usuario= auth()->user()->id;
        $ingresos-> updated= $update;
        $ingresos->save();

        $valor_final= Ingreso::where("id","$id")->get();

        $updates = new Update;
        $updates->tabla= "Ingresos";
        $updates->codigo= $ingresos->id;
        $updates->valor_inicial= $valor_inicial;
        $updates->valor_final=  $valor_final;
        $updates-> id_empresa = 1;
        $updates-> id_usuario= auth()->user()->id;
        $updates-> fecha= $updated;
        $updates-> descripcion= "Ingreso Modificado";
        $updates->save();

        return redirect("/ingreso/$id/edit")->with(['message' => 'Ingreso Editado con Exito!', 'alert' => 'alert-success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use App\Models\Cliente;
use App\Models\Venta;
use App\Models\VentaCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;


class VentaController extends Controller
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
        $ventas=Venta::where('fecha', '>=', $fecha_inicial)->where('fecha', '<=', $fecha_final)->orderBy('fecha')->get();
        return view('venta.index', compact('ventas','mes','año'));
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

        $ingresos = new Ingreso;
        $ingresos-> descripcion = $request->descripcion;
        $ingresos-> fecha = $request->fecha;
        $ingresos-> fechaHora = $request->fecha;
        $ingresos-> id_categoria = $request->id_categoria;
        $ingresos-> total = $request->total;
        $ingresos-> id_usuario= auth()->user()->id;
        $ingresos->save();

        return redirect('/ingreso/create')->with(['message' => 'Ingreso Registrado con Exito.', 'alert' => 'alert-success']);
    }

    public function createPintado()
    {
        if(!Auth::check())
        {
            return redirect('/login');
        }
        $categorias = IngresoCategoria::where('id_estado',1)->get();
        $servicios = Servicio::where('id_estado',1)->get();
        $clientes = Cliente::where('id_estado',1)->get();
        $autos = Auto::where('id_estado',1)->get();

        return view('ingreso.createPintado', compact('categorias','servicios','clientes','autos'));
    }

    public function storePintado(Request $request)
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

        $ingresos = new Ingreso;
        $ingresos-> descripcion = $request->descripcion;
        $ingresos-> fecha = $request->fecha;
        $ingresos-> fechaHora = $request->fecha;
        $ingresos-> id_categoria = $request->id_categoria;
        $ingresos-> total = $request->total;
        $ingresos-> id_usuario= auth()->user()->id;
        $ingresos->save();

        $pintados= new Pintado;
        $pintados-> fecha = $request-> fecha;
        $pintados-> id_cliente= $request-> id_cliente;
        $pintados-> fecha_ingreso= $request-> fecha;
        $pintados-> fecha_salida= $request-> fecha;
        $pintados-> id_auto= $request-> id_auto;
        $pintados-> color= $request-> color;
        $pintados-> año= $request-> año;
        $pintados-> placa= "Desconocido";
        $pintados-> id_servicio = $request->id_servicio;
        $pintados-> descripcion = $request-> descripcion;
        $pintados-> id_estado=4;
        $pintados-> id_usuario= auth()->user()->id;
        $pintados->save();


        $pintadoIngreso= new PintadoIngreso;
        $pintadoIngreso-> id_pintado= $pintados->id_pintado;
        $pintadoIngreso-> id_ingreso= $ingresos->id_ingreso;
        $pintadoIngreso->save();

        return redirect('/ingreso/pintado/create')->with(['message' => 'Ingreso Registrado con Exito!', 'alert' => 'alert-success']);
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

        $ingresos =  Ingreso::find($id);
        $ingresos-> descripcion = $request->descripcion;
        $ingresos-> fecha = $request->fecha;
        $ingresos-> fechaHora = $request->fecha;
        $ingresos-> id_categoria = $request->id_categoria;
        $ingresos-> total = $request->total;
        $ingresos-> id_usuario= auth()->user()->id;
        $ingresos->save();

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

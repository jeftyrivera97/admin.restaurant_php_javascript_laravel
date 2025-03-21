<?php

namespace App\Http\Controllers;

use App\Models\Planilla;
use App\Models\Empleado;
use App\Models\Gasto;
use App\Models\Update;
use App\Models\GastoPlanilla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;

class PlanillaController extends Controller
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
        $id_empresa=1;

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
        
        $planillas=Planilla::where('fecha', '>=', $fecha_inicial)->where('fecha', '<=', $fecha_final)->get();
        $registros= Planilla::where('fecha', '>=', "$año-01-01")->where('fecha', '<=', "$año-12-31")->orderBy('fecha')->get();

        $totalMes=  Planilla::where('fecha', '>=', $fecha_inicial)->where('fecha', '<=', $fecha_final)->sum('total');

        $planillasAnual=Planilla::where('fecha', '>=',"$año-01-01")->where('fecha', '<=', "$año-12-31")->sum('total');
        $planillasAnual = number_format($planillasAnual, 2);
        $planillasAnual= "L. $planillasAnual ";

        $mesAnterior=Gasto::where('fecha', '>=', "$añoA-$numMesA-01")->where('fecha', '<=', "$añoA-$numMesA-31")->sum('total');
        $mesAnterior = number_format($mesAnterior, 2);
        $mesAnterior= "L. $mesAnterior ";
        
        $promedioSemanal= $totalMes/4.5;
        $promedioSemanal = number_format($promedioSemanal, 2);
        $promedioSemanal= "L. $promedioSemanal ";
        $totalMes = number_format($totalMes, 2);
        $totalMes= "L. $totalMes ";

        $planillaEmpleados=[];
        $empleados= Empleado::where('id_empresa',$id_empresa)->get();
        $contador= count($empleados);

        for($i=0; $i<$contador; $i++)
        {
           $id= $empleados[$i]->id;
           $d= $empleados[$i]->descripcion;

           $total= Planilla::where('fecha', '>=', $fecha_inicial)->where('fecha', '<=', $fecha_final)->where('id_empresa',$id_empresa)->sum('total');
           if($totalPlanilla= Planilla::where('fecha', '>=', $fecha_inicial)->where('fecha', '<=', $fecha_final)->where('id_empleado',$id)->where('id_empresa',$id_empresa)->sum('total')){
            $p= ($totalPlanilla*100)/$total;
            $p = number_format($p, 2, '.', '');
            $descripcion= "$d | $p%";
            $planillaEmpleados[$i] = Arr::add(['descripcion' => $descripcion], 'total', $totalPlanilla);
           }
        }
        $columns = array_column($planillaEmpleados, 'total');
        array_multisort($columns, SORT_DESC, $planillaEmpleados);


        return view('planilla.index', compact('planillas','mes','año','registros','planillasAnual','totalMes','promedioSemanal','mesAnterior','planillaEmpleados'));

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
        $empleados=Empleado::where('id_estado','1')->get();
        return view('planilla.create', compact('empleados'));
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
             'id_empleado' => 'required',
             'descripcion' => 'required',
             'fecha' => 'required',
             'total' => 'required|numeric|min:1',
         ]);

        $id_usuario= auth()->user()->id;

        $empleadoID=  $request->id_empleado;
        $empleados =  Empleado::find($empleadoID);
        $nombre= $empleados->descripcion;
        $codigo_empleado= $empleados->codigo_empleado;

        $descripcion= "Pago de Planila a $nombre";


        $registro= now();
        $planillas = new Planilla;
        $planillas-> id_empleado = $request->id_empleado;
        $planillas-> fecha = $request->fecha;
        $planillas-> descripcion = $request->descripcion;
        $planillas-> total = $request->total;
        $planillas-> id_empresa = 1;
        $planillas-> id_usuario= auth()->user()->id;
        $planillas-> registro= $registro;
        $planillas-> updated= $registro;
        $planillas->save();

        $gastos = new Gasto;
        $gastos-> codigo_gasto = 1;
        $gastos-> fecha = $request->fecha;
        $gastos-> descripcion = $descripcion;
        $gastos-> id_categoria = 1;
        $gastos-> total = $request->total;
        $gastos-> id_empresa = 1;
        $gastos-> id_usuario= auth()->user()->id;
        $gastos-> registro= $registro;
        $gastos-> updated= $registro;
        $gastos->save();

        $gastos_planillas= new GastoPlanilla;
        $gastos_planillas-> id_gasto= $gastos->id;
        $gastos_planillas-> id_planilla= $planillas->id;
        $gastos_planillas-> id_empresa = 1;
        $gastos_planillas->save();



        return redirect('/planilla/create')->with(['message' => 'Pago de Planilla Registrado con Exito.', 'alert' => 'alert-success']);
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
        $planilla= Planilla::where('id',$id)->first();
        $id_usuario= auth()->user()->id;
        $empleados = Empleado::where('id_estado',1)->get();
        return view('planilla.edit', compact('empleados','planilla','id','id_usuario'));
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
            'id_empleado' => 'required',
            'descripcion' => 'required',
            'fecha' => 'required',
            'total' => 'required|numeric|min:1',
        ]);

        $id_usuario= auth()->user()->id;
         $updated= now();
         $valor_inicialP=  Planilla::where("id","$id")->get();

         $empleadoID=  $request->id_empleado;
         $empleados =  Empleado::find($empleadoID);
         $nombre= $empleados->descripcion;
         $codigo_empleado= $empleados->codigo_empleado;
 
         $descripcion= "Pago de Planila a $nombre";
 
 
         $planillas =  Planilla::find($id);
         $planillas-> id_empleado = $request->id_empleado;
         $planillas-> fecha = $request->fecha;
         $planillas-> descripcion = $request->descripcion;
         $planillas-> total = $request->total;
         $planillas-> id_usuario= auth()->user()->id;
         $planillas-> updated= $updated;
         $planillas->save();

         $valor_finalP=  Planilla::where("id","$id")->get();
         $id_planilla= $planillas->id;

        $gasto_planilla= GastoPlanilla::where("id_planilla","$id_planilla")->first();
        $id_gasto= $gasto_planilla-> id_gasto;

        $valor_inicialG=  Gasto::where("id","$id_gasto")->get();

        $gastos =  Gasto::find($id_gasto);
        $gastos-> codigo_gasto = 1;
        $gastos-> fecha = $request->fecha;
        $gastos-> descripcion = $descripcion;
        $gastos-> id_categoria = 1;
        $gastos-> total = $request->total;
        $gastos-> id_usuario= auth()->user()->id;
        $gastos-> updated= $updated;
        $gastos->save();

        $valor_finalG= Gasto::where("id","$id_gasto")->get();

        $updates = new Update;
        $updates->tabla= "Gastos";
        $updates->codigo= $id_gasto;
        $updates->valor_inicial= $valor_inicialG;
        $updates->valor_final=  $valor_finalG;
        $updates-> id_empresa = 1;
        $updates-> id_usuario= auth()->user()->id;
        $updates-> fecha= $updated;
        $updates-> descripcion= "Gasto Modificado";
        $updates->save();

        $updates = new Update;
        $updates->tabla= "Planillas";
        $updates->codigo= $id_planilla;
        $updates->valor_inicial= $valor_inicialP;
        $updates->valor_final=  $valor_finalP;
        $updates-> id_empresa = 1;
        $updates-> id_usuario= auth()->user()->id;
        $updates-> fecha= $updated;
        $updates-> descripcion= "Planilla Modificada";
        $updates->save();

        return redirect("/planilla/$id/edit")->with(['message' => 'Planilla Actualizada con Exito!', 'alert' => 'alert-success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

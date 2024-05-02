<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Proveedor;
use App\Models\Update;
use App\Models\CompraCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;


class CompraController extends Controller
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
        $n;
        
        $compras=Compra::where('fecha', '>=', $fecha_inicial)->where('fecha', '<=', $fecha_final)->where('id_empresa',$id_empresa)->get();
        return view('compra.index', compact('compras','mes','año'));
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
        $proveedores=Proveedor::where('id_estado','1')->get();
        $categorias = CompraCategoria::where('id_estado',1)->get();
        return view('compra.create', compact('proveedores','categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        if(!Auth::check())
        {
            return redirect('/login');
        }
        $validated = $request->validate([
             'codigo_compra' => 'required',
             'fecha' => 'required',
             'total' => 'required|numeric|min:1',
             'id_proveedor' => 'required',
             'id_tipo_cuenta' => 'required|numeric',
         ]);
         $id_usuario= auth()->user()->id;
        if($id_usuario==1 or $id_usuario==2 or $id_usuario==3 ){
            $id_empresa=1;
        }
        else if($id_usuario==4 or $id_usuario==5 or $id_usuario==6){
            $id_empresa=2;
        }

         $gravado15= $request->gravado15;
         $gravado18= $request->gravado18;
         $impuesto15= $request->isv15;
         $impuesto18= $request->isv18;
         $excento= $request->excento;
         $exonerado= $request->exonerado;
         $total= $request->total;

         if($gravado15==""){$gravado15=0;}
         if($gravado18==""){$gravado18=0;}
         if($impuesto15==""){$impuesto15=0;}
         if($impuesto18==""){$impuesto18=0;}
         if($excento==""){$excento=0;}
         if($exonerado==""){$exonerado=0;}

         $totalImpuestos= $gravado15+$gravado18+$impuesto15+$impuesto18+$excento+$exonerado;

         if($total<$totalImpuestos){
            return redirect("/compra/$id/edit")->with(['validacionTotal' => 'Valor del Total Erroneo.', 'alert' => 'alert-danger']);
         }
         if($totalImpuestos!=$total){
            return redirect('/compra/create')->with(['validacionTotal' => 'Valores de Impuestos Erroneos.', 'alert' => 'alert-danger']);
         }
   
        

         $registro= now();
         $tipoC= $request->id_tipo_cuenta;
    
        if($tipoC==1){
            $tipo_cuenta=1;
            $estado_cuenta=1;

            $compras = new Compra;
            $compras-> codigo_compra = $request->codigo_compra;
            $compras-> fecha = $request->fecha;
            $compras-> id_categoria = $request->id_categoria;
            $compras-> id_proveedor = $request->id_proveedor;
            $compras-> id_tipo_cuenta  = $tipo_cuenta;
            $compras-> id_estado_cuenta = $estado_cuenta;
            $compras-> gravado15 = $gravado15;
            $compras-> gravado18 = $gravado18;
            $compras-> impuesto15 = $impuesto15;
            $compras-> impuesto18 = $impuesto18;
            $compras-> excento = $excento;
            $compras-> exonerado = $exonerado;
            $compras-> total = $total;
            $compras-> id_empresa = $id_empresa;
            $compras-> id_usuario= auth()->user()->id;
            $compras-> registro= $registro;
            $compras-> updated= $registro;
            $compras->save();
    
            return redirect('/compra/create')->with(['message' => 'Compra Registrada con Exito.', 'alert' => 'alert-success']);

        }
        elseif($tipoC==2){
            $tipo_cuenta=2;
            $estado_cuenta=2;

            $compras = new Compra;
            $compras-> codigo_compra = $request->codigo_compra;
            $compras-> fecha = $request->fecha;
            $compras-> id_categoria = $request->id_categoria;
            $compras-> id_proveedor = $request->id_proveedor;
            $compras-> id_tipo_cuenta  = $tipo_cuenta;
            $compras-> id_estado_cuenta = $estado_cuenta;
            $compras-> fecha_pago = $request->fechaPago;;
            $compras-> gravado15 = $gravado15;
            $compras-> gravado18 = $gravado18;
            $compras-> impuesto15 = $impuesto15;
            $compras-> impuesto18 = $impuesto18;
            $compras-> excento = $excento;
            $compras-> exonerado = $exonerado;
            $compras-> total = $total;
            $compras-> id_empresa = $id_empresa;
            $compras-> id_usuario= auth()->user()->id;
            $compras-> registro= $registro;
            $compras-> updated= $registro;
            $compras->save();
    
            return redirect('/compra/create')->with(['message' => 'Compra Registrada con Exito.', 'alert' => 'alert-success']);
        }

      

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
        $compra= Compra::find($id);
        $proveedores=Proveedor::where('id_estado','1')->get();
        $categorias = CompraCategoria::where('id_estado',1)->get();
        return view('compra.edit', compact('proveedores','categorias','compra','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id): RedirectResponse
    {
        if(!Auth::check())
        {
            return redirect('/login');
        }

        $validated = $request->validate([
            'codigo_compra' => 'required',
            'fecha' => 'required',
            'total' => 'required|numeric|min:1',
            'id_proveedor' => 'required',
            'id_tipo_cuenta' => 'required|numeric',
        ]);

        $id_usuario= auth()->user()->id;
        if($id_usuario==1 or $id_usuario==2 or $id_usuario==3 ){
            $id_empresa=1;
        }
        else if($id_usuario==4 or $id_usuario==5 or $id_usuario==6){
            $id_empresa=2;
        }
         $gravado15= $request->gravado15;
         $gravado18= $request->gravado18;
         $impuesto15= $request->isv15;
         $impuesto18= $request->isv18;
         $excento= $request->excento;
         $exonerado= $request->exonerado;
         $total= $request->total;

         if($gravado15==""){$gravado15=0;}
         if($gravado18==""){$gravado18=0;}
         if($impuesto15==""){$impuesto15=0;}
         if($impuesto18==""){$impuesto18=0;}
         if($excento==""){$excento=0;}
         if($exonerado==""){$exonerado=0;}

         $totalImpuestos= $gravado15+$gravado18+$impuesto15+$impuesto18+$excento+$exonerado;

         if($total<$totalImpuestos){
            return redirect("/compra/$id/edit")->with(['validacionTotal' => 'Valor del Total Erroneo.', 'alert' => 'alert-danger']);
         }
         if($totalImpuestos!=$total){
            return redirect("/compra/$id/edit")->with(['validacionTotal' => 'Valores de Impuestos Erroneos.', 'alert' => 'alert-danger']);
         }
   

         $updated= now();
         $tipoC= $request->id_tipo_cuenta;
    
        if($tipoC==1){
            $tipo_cuenta=1;
            $estado_cuenta=1;

            $valor_inicial=  Compra::where("id","$id")->get();
            

            $compras =  Compra::find($id);
            $compras-> codigo_compra = $request->codigo_compra;
            $compras-> fecha = $request->fecha;
            $compras-> id_categoria = $request->id_categoria;
            $compras-> id_proveedor = $request->id_proveedor;
            $compras-> id_tipo_cuenta  = $request->id_tipo_cuenta;
            $compras-> id_estado_cuenta = $estado_cuenta;
            $compras-> gravado15 = $gravado15;
            $compras-> gravado18 = $gravado18;
            $compras-> impuesto15 = $impuesto15;
            $compras-> impuesto18 = $impuesto18;
            $compras-> excento = $excento;
            $compras-> exonerado = $exonerado;
            $compras-> total = $total;
            $compras-> id_usuario= auth()->user()->id;
            $compras-> updated= $updated;
            $compras->save();

            $valor_final=  Compra::where("id","$id")->get();

            $updates = new Update;
            $updates->tabla= "Compras";
            $updates->codigo= $compras->id;
            $updates->valor_inicial= $valor_inicial;
            $updates->valor_final=  $valor_final;
            $updates-> id_empresa = $id_empresa;
            $updates-> id_usuario= auth()->user()->id;
            $updates-> registro= $updated;
            $updates->save();

            return redirect("/compra/$id/edit")->with(['message' => 'Compra Actualizada con Exito.', 'alert' => 'alert-success']);

        }
        elseif($tipoC==2){
            $tipo_cuenta=2;
            $estado_cuenta=2;
          
            $compras =  Compra::find($id);
            $compras-> codigo_compra = $request->codigo_compra;
            $compras-> fecha = $request->fecha;
            $compras-> id_categoria = $request->id_categoria;
            $compras-> id_proveedor = $request->id_proveedor;
            $compras-> id_tipo_cuenta  = $request->id_tipo_cuenta;
            $compras-> id_estado_cuenta = $estado_cuenta;
            $compras-> fecha_pago = $request->fechaPago;;
            $compras-> gravado15 = $gravado15;
            $compras-> gravado18 = $gravado18;
            $compras-> impuesto15 = $impuesto15;
            $compras-> impuesto18 = $impuesto18;
            $compras-> excento = $excento;
            $compras-> exonerado = $exonerado;
            $compras-> total = $total;
            $compras-> id_usuario= auth()->user()->id;
            $compras-> updated= $updated;
            $compras->save();

            $valor_final=  Compra::where("id","$id")->get();

            $updates = new Update;
            $updates->tabla= "Compras";
            $updates->codigo= $compras->id;
            $updates->valor_inicial= $valor_inicial;
            $updates->valor_final=  $valor_final;
            $updates-> id_empresa = $id_empresa;
            $updates-> id_usuario= auth()->user()->id;
            $updates-> registro= $updated;
            $updates->save();
    
            return redirect("/compra/$id/edit")->with(['message' => 'Compra Actualizada con Exito.', 'alert' => 'alert-success']);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

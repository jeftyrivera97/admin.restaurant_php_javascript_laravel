<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ingreso;
use App\Models\Compra;
use App\Models\Gasto;
use App\Models\Planilla;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function show(): View
    {
        $mes= now()->format('F');
        $numMes = now()->format('m');
        $mes= $this->obtenerMes($numMes);
        $año = now()->format('y');
        
        $fecha_inicial="$año-$numMes-01";
        $fecha_final="$año-$numMes-31";

        $ingresosMes=Ingreso::where('fecha', '>=', $fecha_inicial)->where('fecha', '<=', $fecha_final)->sum('total');
        $comprasMes=Compra::where('fecha', '>=', $fecha_inicial)->where('fecha', '<=', $fecha_final)->sum('total');
        $gastosMes=Gasto::where('fecha', '>=', $fecha_inicial)->where('fecha', '<=', $fecha_final)->sum('total');
        $planillasMes=Planilla::where('fecha', '>=', $fecha_inicial)->where('fecha', '<=', $fecha_final)->sum('total');

        $ingresosAnual=Ingreso::where('fecha', '>=',"$año-01-01")->where('fecha', '<=', "$año-12-31")->sum('total');
        $comprasAnual=Compra::where('fecha', '>=',  "$año-01-01")->where('fecha', '<=', "$año-12-31")->sum('total');
        $gastosAnual=Gasto::where('fecha', '>=',  "$año-01-01")->where('fecha', '<=', "$año-12-31")->sum('total');
        $planillasAnual=Planilla::where('fecha', '>=',  "$año-01-01")->where('fecha', '<=', "$año-12-31")->sum('total');

        $egresosMes= $comprasMes+$gastosMes+$planillasMes;
        $egresosAnual= $comprasAnual+$gastosAnual+$planillasAnual;

        $balanceMes= $ingresosMes-$egresosMes;
        $balanceAnual = $ingresosAnual -$egresosAnual;

        if($egresosMes==0){$egresosMes=0.01;}
        if($ingresosMes==0){$ingresosMes=0.01;}

        $p=100;
        $pBalanceAnual= ($egresosAnual*$p)/$ingresosAnual;
        $pBalanceMes= ($egresosMes*$p)/$ingresosMes;

        $pBalanceMes = number_format($pBalanceMes, 2);
        $pBalanceAnual = number_format($pBalanceAnual, 2);

        if($balanceMes>0.1){
            $balanceMes = number_format($balanceMes, 2);
            $balanceMes= "L. $balanceMes +POSITIVO";
        }else{
            $balanceMes = number_format($balanceMes, 2);
            $balanceMes= "L. $balanceMes -NEGATIVO";
        }
        if($balanceAnual>0.1){
            $balanceAnual = number_format($balanceAnual, 2);
            $balanceAnual= "L. $balanceAnual +POSITIVO";
        }else{
            $balanceAnual = number_format($balanceAnual, 2);
            $balanceAnual= "L. $balanceAnual -NEGATIVO";
        }

        $ingresosMes = number_format($ingresosMes, 2);
        $comprasMes = number_format($comprasMes, 2);
        $gastosMes = number_format($gastosMes, 2);
        $planillasMes = number_format($planillasMes, 2);
        $ingresosAnual = number_format($ingresosAnual, 2);
        $comprasAnual = number_format($comprasAnual, 2);
        $gastosAnual = number_format($gastosAnual, 2);
        $planillasAnual = number_format($planillasAnual, 2);

        return view('dashboard', compact('comprasMes','mes','año','gastosMes','ingresosMes','planillasMes','comprasAnual', 
        'ingresosAnual', 'gastosAnual','planillasAnual','balanceMes','balanceAnual', 'pBalanceMes','pBalanceAnual'));

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
}

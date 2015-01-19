<?php
namespace SGRM;
use \BaseController, \View, \Input, \Redirect, \DB;

class RankingClientesController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |	Route::get('/', 'HomeController@showWelcome');
    |
    */

    public function getIndex(){
        $ponderacion = Ponderacion::whereEntidad('cliente')->first();

        $escala = array('0'=>0, '1'=>1, '2'=>2, '3'=>3, '4'=>5, '6'=>6, '7'=>7, '8'=>8, '9'=>9);

        return View::make('sgrm.ponderaciones.index_clientes')->with('ponderacion', $ponderacion)->with('escala', $escala);
    }

    public function postUpdate(){
        $ponderacion = Ponderacion::find(Input::get('id'));
        $ponderacion->condicion_1 = Input::get('condicion_1');
        $ponderacion->condicion_2 = Input::get('condicion_2');
        $ponderacion->save();

        $clientes = Cliente::all();

        foreach($clientes as $cliente){

            if($cliente->ranking()->count()>0){
                $ranking_cliente = RankingCliente::find($cliente->ranking->id);
                $ranking_cliente->valoracion = $ponderacion->condicion_1*round(rand(1000,10000000))+$ponderacion->condicion_2*round(rand(100,1000000));
                $ranking_cliente->save();
            }else{
                $ranking_cliente = new RankingCliente;
                $ranking_cliente->valoracion = $ponderacion->condicion_1*round(rand(1000,10000000))+$ponderacion->condicion_2*round(rand(100,1000000));
                $ranking_cliente->cliente_rut = $cliente->rut;
                $ranking_cliente->save();

            }

        }

        return self::getIndex();

    }

}
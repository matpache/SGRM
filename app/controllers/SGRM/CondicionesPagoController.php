<?php
namespace SGRM;
use \BaseController, \View, \Input, \Redirect, \DB;

class CondicionesPagoController extends BaseController {

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
        $condiciones_pago_act = CondicionPago::whereStatus('Activo')->orderBy('descripcion')->get();
        $condiciones_pago_inact = CondicionPago::whereStatus('Inactivo')->orderBy('descripcion')->get();

        return View::make('sgrm.condiciones_pago.index')
            ->with('condiciones_pago_act', $condiciones_pago_act)
            ->with('condiciones_pago_inact', $condiciones_pago_inact);
    }

    public function postCreate(){
        $condicion_pago = new CondicionPago;
        $condicion_pago->descripcion = Input::get('descripcion');
        $condicion_pago->status = 'Activo';
        $condicion_pago->save();

        return self::getIndex();
    }

    public function getEdit($condicion_pago_id){
        $condicion_pago = CondicionPago::find($condicion_pago_id);
        return View::make('sgrm.condiciones_pago.edit')->with('condicion_pago', $condicion_pago);
    }

    public function postEdit(){
        $id = Input::get('id');
        $condicion_pago = CondicionPago::find($id);
        $condicion_pago->descripcion = Input::get('descripcion');
        $condicion_pago->save();

        return self::getIndex();
    }

    public function getActive($condicion_pago_id){
        $condicion_pago = CondicionPago::find($condicion_pago_id);
        $condicion_pago->status = 'Activo';
        $condicion_pago->save();

        return self::getindex();
    }

    public function getDesactive($condicion_pago_id){
        $condicion_pago = CondicionPago::find($condicion_pago_id);
        $condicion_pago->status = 'Inactivo';
        $condicion_pago->save();

        return self::getindex();

    }

}
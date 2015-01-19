<?php
namespace SGRM;
use \BaseController, \View, \Input, \Redirect;

class CotizacionesComprasController extends BaseController {

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
        $cotizaciones_compra_act = CotizacionCompra::whereStatus('Activo')->orderBy('numero')->get();
        $cotizaciones_compra_inact = CotizacionCompra::whereStatus('Inactivo')->orderBy('numero')->get();

        return View::make('sgrm.cotizaciones_compra.index')
            ->with('cotizaciones_compra_act', $cotizaciones_compra_act)
            ->with('cotizaciones_compra_inact', $cotizaciones_compra_inact);
    }

    public function postCreate(){
        $cotizacion_compra = new CotizacionCompra;
        $cotizacion_compra->numero = Input::get('numero');
        $cotizacion_compra->fecha_emision = date("Y-m-d H:i:s");
        $cotizacion_compra->fecha_entrega = Input::get('fecha_entrega');
        $cotizacion_compra->status = 'Activo';
        $cotizacion_compra->save();

        return Redirect::action('SGRM\CotizacionesComprasController@getIndex');

    }

    public function getEdit($cotizacion_compra_id){
        $cotizacion_compra = CotizacionCompra::find($cotizacion_compra_id);

        return View::make('sgrm.cotizaciones_compra.edit')
            ->with('cotizacion_compra', $cotizacion_compra);
    }

    public function postEdit(){
        $cotizacion_compra_id = Input::get('cotizacion_compra_id');
        $cotizacion_compra = CotizacionCompra::find($cotizacion_compra_id);
        $cotizacion_compra->numero = Input::get('numero');
        $cotizacion_compra->fecha_entrega = Input::get('fecha_entrega');
        $cotizacion_compra->save();

        return Redirect::action('SGRM\CotizacionesComprasController@getIndex');
    }

    public function getCard($cotizacion_compra_id){
        $cotizacion_compra = CotizacionCompra::find($cotizacion_compra_id);

        return View::make('sgrm.cotizaciones_compra.card')
            ->with('cotizacion_compra', $cotizacion_compra);
    }

    public function getActive($cotizacion_compra_id){
        $country = CotizacionCompra::find($cotizacion_compra_id);
        $country->status = 'Activo';
        $country->save();

        return Redirect::back();
    }

    public function getDesactive($cotizacion_compra_id){
        $country = CotizacionCompra::find($cotizacion_compra_id);
        $country->status = 'Inactivo';
        $country->save();

        return Redirect::back();

    }

}

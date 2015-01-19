<?php
namespace SGRM;
use \BaseController, \View, \Input, \Redirect;

class CotizacionesVentasController extends BaseController {

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
        $cotizaciones_venta_act = CotizacionVenta::whereStatus('Activo')->orderBy('numero')->get();
        $cotizaciones_venta_inact = CotizacionVenta::whereStatus('Inactivo')->orderBy('numero')->get();

        return View::make('sgrm.cotizaciones_venta.index')
            ->with('cotizaciones_venta_act', $cotizaciones_venta_act)
            ->with('cotizaciones_venta_inact', $cotizaciones_venta_inact);
    }

    public function postCreate(){
        $cotizacion_venta = new CotizacionVenta;
        $cotizacion_venta->numero = Input::get('numero');
        $cotizacion_venta->fecha_emision = date("Y-m-d H:i:s");
        $cotizacion_venta->fecha_entrega = Input::get('fecha_entrega');
        $cotizacion_venta->status = 'Activo';
        $cotizacion_venta->save();

        return Redirect::action('SGRM\CotizacionesVentasController@getIndex');

    }

    public function getEdit($cotizacion_venta_id){
        $cotizacion_venta = CotizacionVenta::find($cotizacion_venta_id);

        return View::make('sgrm.cotizaciones_venta.edit')
            ->with('cotizacion_venta', $cotizacion_venta);
    }

    public function postEdit(){
        $cotizacion_venta_id = Input::get('cotizacion_venta_id');
        $cotizacion_venta = CotizacionVenta::find($cotizacion_venta_id);
        $cotizacion_venta->numero = Input::get('numero');
        $cotizacion_venta->fecha_entrega = Input::get('fecha_entrega');
        $cotizacion_venta->save();

        return Redirect::action('SGRM\CotizacionesVentasController@getIndex');
    }

    public function getCard($cotizacion_venta_id){
        $cotizacion_venta = CotizacionVenta::find($cotizacion_venta_id);

        return View::make('sgrm.cotizaciones_venta.card')
            ->with('cotizacion_venta', $cotizacion_venta);
    }

    public function getActive($cotizacion_venta_id){
        $country = CotizacionVenta::find($cotizacion_venta_id);
        $country->status = 'Activo';
        $country->save();

        return Redirect::back();
    }

    public function getDesactive($cotizacion_venta_id){
        $country = CotizacionVenta::find($cotizacion_venta_id);
        $country->status = 'Inactivo';
        $country->save();

        return Redirect::back();

    }

}

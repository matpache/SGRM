<?php
namespace SGRM;
use \BaseController, \View, \Input, \Redirect, \DB;

class DetalleCotizacionesComprasController extends BaseController {

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

    public function getIndex($cotizacion_compra_id){
        $detalle_cotizacion = DetalleProductoCotizacionCompra::whereCotizacionId($cotizacion_compra_id)->orderBy('id')->get();

        $productos_aux = DB::select("select producto.nombre,`producto`.`id`
                                    from `producto`
                                    left join `detalleproductocotizacioncompra`
                                      on `producto`.`id` = `detalleproductocotizacioncompra`.`producto_id`
                                      and `detalleproductocotizacioncompra`.`cotizacion_id` <> ".$cotizacion_compra_id."
                                    ");

        $productos_disponibles = array();

        foreach($productos_aux as $key => $aux):
            $productos_disponibles[$aux->id] = $aux->nombre;
        endforeach;

        return View::make('sgrm.detalle_cotizaciones_compras.index')
                    ->with('cotizacion_compra_id', $cotizacion_compra_id)
                    ->with('detalle_cotizacion', $detalle_cotizacion)
                    ->with('productos_disponibles', $productos_disponibles);
    }

    public function postAdd($cotizacion_compra_id){
        // return Input::all();
        $detalle_cotizacion = new DetalleProductoCotizacionCompra;
        $detalle_cotizacion->cotizacion_id = $cotizacion_compra_id;
        $detalle_cotizacion->producto_id = Input::get('producto_id');
        $detalle_cotizacion->cantidad = Input::get('cantidad');
        $detalle_cotizacion->precio_unitario = Input::get('precio_unitario');
        $detalle_cotizacion->descuento = Input::get('descuento');
        $detalle_cotizacion->save();

        return Redirect::action('SGRM\DetalleCotizacionesComprasController@getIndex', array($cotizacion_compra_id));
    }

    public function getDelete($detalle_cotizacion_compra_id){
        $detalle_cotizacion = DetalleProductoCotizacionCompra::find($contacto_cotizacion_compra_id);
        $cotizacion_compra_id = $detalle_cotizacion->cotizacion_compra_id;
        $detalle_cotizacion->delete();

        return Redirect::action('SGRM\DetalleCotizacionesComprasController@getIndex', array($cotizacion_compra_id));

    }

}

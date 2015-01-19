<?php
namespace SGRM;
use \BaseController, \View, \Input, \Redirect, \DB;

class DetalleCotizacionesVentasController extends BaseController {

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

    public function getIndex($cotizacion_venta_id){
        $detalle_cotizacion = DetalleProductoCotizacionVenta::whereCotizacionId($cotizacion_venta_id)->orderBy('id')->get();

        $productos_aux = DB::select("select producto.nombre,`producto`.`id`
                                    from `producto`
                                    left join `detalleproductocotizacionventa`
                                      on `producto`.`id` = `detalleproductocotizacionventa`.`producto_id`
                                      and `detalleproductocotizacionventa`.`cotizacion_id` <> ".$cotizacion_venta_id."
                                    ");

        $productos_disponibles = array();

        foreach($productos_aux as $key => $aux):
            $productos_disponibles[$aux->id] = $aux->nombre;
        endforeach;

        return View::make('sgrm.detalle_cotizaciones_ventas.index')
                    ->with('cotizacion_venta_id', $cotizacion_venta_id)
                    ->with('detalle_cotizacion', $detalle_cotizacion)
                    ->with('productos_disponibles', $productos_disponibles);
    }

    public function postAdd($cotizacion_venta_id){
        // return Input::all();
        $detalle_cotizacion = new DetalleProductoCotizacionVenta;
        $detalle_cotizacion->cotizacion_id = $cotizacion_venta_id;
        $detalle_cotizacion->producto_id = Input::get('producto_id');
        $detalle_cotizacion->cantidad = Input::get('cantidad');
        $detalle_cotizacion->precio_unitario = Input::get('precio_unitario');
        $detalle_cotizacion->descuento = Input::get('descuento');
        $detalle_cotizacion->save();

        return Redirect::action('SGRM\DetalleCotizacionesVentasController@getIndex', array($cotizacion_venta_id));
    }

    public function getDelete($detalle_cotizacion_venta_id){

        $detalle_cotizacion = DetalleProductoCotizacionVenta::find($contacto_cotizacion_venta_id);
        $cotizacion_venta_id = $detalle_cotizacion->cotizacion_venta_id;
        $detalle_cotizacion->delete();

        return Redirect::action('SGRM\DetalleCotizacionesVentasController@getIndex', array($cotizacion_venta_id));

    }

}

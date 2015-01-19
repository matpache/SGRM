<?php
namespace SGRM;
use \BaseController, \View, \Input, \Redirect;

class FacturasVentaController extends BaseController {

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
        $facturas_venta = FacturaVenta::whereStatus('Activo')->orderBy('fecha_emision')->get();

        $notas_venta = NotaVenta::whereStatus('Activo')->orderBy('id', 'DESC')->lists('id','id');
        $estados = Estado::whereStatus('Activo')->orderBy('id', 'DESC')->lists('nombre','id');
        $vendedores = Vendedor::whereStatus('Activo')->orderBy('rut')->lists('rut','id');
        $clientes = Cliente::whereStatus('Activo')->orderBy('rut')->lists('rut','id');

        return View::make('sgrm.facturas_venta.index')
            ->with('notas_venta', $notas_venta)
            ->with('facturas_venta', $facturas_venta)
            ->with('estados', $estados)
            ->with('vendedores', $vendedores)
            ->with('clientes', $clientes)
            ->with('facturas_venta', $facturas_venta);
    }

    public function postCreate(){
        $factura_venta = new FacturaVenta;
        $factura_venta->nota_venta_id = Input::get('nota_venta_id');
        $factura_venta->cliente_id = Input::get('cliente_id');
        $factura_venta->vendedor_id = Input::get('vendedor_id');
        $factura_venta->estado_id = Input::get('estado_id');
        $factura_venta->observacion = Input::get('observacion');
        $factura_venta->fecha_emision = date("Y-m-d H:i:s");
        $factura_venta->status = 'Activo';
        $factura_venta->save();

        return Redirect::action('SGRM\FacturasVentaController@getIndex');

    }

    public function getEdit($factura_venta_id){
        $factura_venta = FacturaVenta::find($factura_venta_id);

        $estados = Estado::whereStatus('Activo')->orderBy('id', 'DESC')->lists('nombre','id');
        $vendedores = Vendedor::whereStatus('Activo')->orderBy('rut')->lists('rut','id');
        $clientes = Cliente::whereStatus('Activo')->orderBy('rut')->lists('rut','id');

        return View::make('sgrm.facturas_venta.edit')
            ->with('estados', $estados)
            ->with('vendedores', $vendedores)
            ->with('clientes', $clientes)
            ->with('factura_venta', $factura_venta);
    }

    public function postEdit(){
        $factura_venta_id = Input::get('factura_venta_id');
        $factura_venta = FacturaVenta::find($factura_venta_id);
        $factura_venta->cliente_id = Input::get('cliente_id');
        $factura_venta->vendedor_id = Input::get('vendedor_id');
        $factura_venta->observacion = Input::get('observacion');
        $factura_venta->estado_id = Input::get('estado_id');
        $factura_venta->save();

        return Redirect::action('SGRM\FacturasVentaController@getIndex');
    }

    public function getCard($factura_venta_id){
        $factura_venta = FacturaVenta::find($factura_venta_id);

        return View::make('sgrm.facturas_venta.card')
            ->with('factura_venta', $factura_venta);
    }

    public function getActive($factura_venta_id){
        $country = FacturaVenta::find($factura_venta_id);
        $country->status = 'Activo';
        $country->save();

        return Redirect::back();
    }

    public function getDesactive($factura_venta_id){
        $country = FacturaVenta::find($factura_venta_id);
        $country->status = 'Inactivo';
        $country->save();

        return Redirect::back();

    }

}

<?php
namespace SGRM;
use \BaseController, \View, \Input, \Redirect;

class FacturasCompraController extends BaseController {

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
        $facturas_compra = FacturaCompra::whereStatus('Activo')->orderBy('fecha_emision')->get();

        $notas_venta = NotaVenta::whereStatus('Activo')->orderBy('id', 'DESC')->lists('id','id');
        $estados = Estado::whereStatus('Activo')->orderBy('id', 'DESC')->lists('nombre','id');
        $vendedores = Vendedor::whereStatus('Activo')->orderBy('rut')->lists('rut','id');
        $proveedores = Cliente::whereStatus('Activo')->orderBy('rut')->lists('rut','id');

        return View::make('sgrm.facturas_compra.index')
            ->with('notas_venta', $notas_venta)
            ->with('facturas_compra', $facturas_compra)
            ->with('estados', $estados)
            ->with('vendedores', $vendedores)
            ->with('proveedores', $proveedores)
            ->with('facturas_compra', $facturas_compra);
    }

    public function postCreate(){
        $factura_compra = new FacturaCompra;
        $factura_compra->nota_venta_id = Input::get('nota_venta_id');
        $factura_compra->proveedor_id = Input::get('proveedor_id');
        $factura_compra->vendedor_id = Input::get('vendedor_id');
        $factura_compra->estado_id = Input::get('estado_id');
        $factura_compra->observacion = Input::get('observacion');
        $factura_compra->fecha_emision = date("Y-m-d H:i:s");
        $factura_compra->status = 'Activo';
        $factura_compra->save();

        return Redirect::action('SGRM\FacturasCompraController@getIndex');

    }

    public function getEdit($factura_compra_id){
        $factura_compra = FacturaCompra::find($factura_compra_id);

        $estados = Estado::whereStatus('Activo')->orderBy('id', 'DESC')->lists('nombre','id');
        $vendedores = Vendedor::whereStatus('Activo')->orderBy('rut')->lists('rut','id');
        $proveedores = Cliente::whereStatus('Activo')->orderBy('rut')->lists('rut','id');

        return View::make('sgrm.facturas_compra.edit')
            ->with('estados', $estados)
            ->with('vendedores', $vendedores)
            ->with('proveedores', $proveedores)
            ->with('factura_compra', $factura_compra);
    }

    public function postEdit(){
        $factura_compra_id = Input::get('factura_compra_id');
        $factura_compra = FacturaCompra::find($factura_compra_id);
        $factura_compra->proveedor_id = Input::get('proveedor_id');
        $factura_compra->vendedor_id = Input::get('vendedor_id');
        $factura_compra->observacion = Input::get('observacion');
        $factura_compra->estado_id = Input::get('estado_id');
        $factura_compra->save();

        return Redirect::action('SGRM\FacturasCompraController@getIndex');
    }

    public function getCard($factura_compra_id){
        $factura_compra = FacturaCompra::find($factura_compra_id);

        return View::make('sgrm.facturas_compra.card')
            ->with('factura_compra', $factura_compra);
    }

    public function getActive($factura_compra_id){
        $country = FacturaCompra::find($factura_compra_id);
        $country->status = 'Activo';
        $country->save();

        return Redirect::back();
    }

    public function getDesactive($factura_compra_id){
        $country = FacturaCompra::find($factura_compra_id);
        $country->status = 'Inactivo';
        $country->save();

        return Redirect::back();

    }

}

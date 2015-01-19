<?php
namespace SGRM;
use \BaseController, \View, \Input, \Redirect;

class OrdenesCompraProveedorController extends BaseController {

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
        $ordenes_compra_proveedor_act = OrdenCompraProveedor::whereStatus('Activo')->orderBy('fecha_emision')->get();
        $ordenes_compra_proveedor_inact = OrdenCompraProveedor::whereStatus('Inactivo')->orderBy('fecha_emision')->get();

        $cotizaciones_compra = CotizacionCompra::whereStatus('Activo')->orderBy('numero', 'DESC')->lists('numero','id');
        $vendedores = Vendedor::whereStatus('Activo')->orderBy('rut')->lists('rut','id');
        $proveedores = Proveedor::whereStatus('Activo')->orderBy('rut')->lists('rut','id');

        return View::make('sgrm.ordenes_compra_empresa.index')
            ->with('cotizaciones_compra', $cotizaciones_compra)
            ->with('vendedores', $vendedores)
            ->with('proveedores', $proveedores)
            ->with('ordenes_compra_proveedor_act', $ordenes_compra_proveedor_act)
            ->with('ordenes_compra_proveedor_inact', $ordenes_compra_proveedor_inact);
    }

    public function postCreate(){
        $orden_compra_proveedor = new OrdenCompraProveedor;
        $orden_compra_proveedor->cotizacion_id = Input::get('cotizacion_id');
        $orden_compra_proveedor->proveedor_id = Input::get('proveedor_id');
        $orden_compra_proveedor->vendedor_id = Input::get('vendedor_id');
        $orden_compra_proveedor->fecha_emision = date("Y-m-d H:i:s");
        $orden_compra_proveedor->fecha_entrega = Input::get('fecha_entrega');
        $orden_compra_proveedor->status = 'Activo';
        $orden_compra_proveedor->save();

        return Redirect::action('SGRM\OrdenesCompraProveedorController@getIndex');

    }

    public function getEdit($orden_compra_proveedor_id){
        $orden_compra_proveedor = OrdenCompraProveedor::find($orden_compra_proveedor_id);

        $vendedores = Vendedor::whereStatus('Activo')->orderBy('rut')->lists('rut','id');
        $proveedores = Proveedor::whereStatus('Activo')->orderBy('rut')->lists('rut','id');

        return View::make('sgrm.ordenes_compra_empresa.edit')
            ->with('vendedores', $vendedores)
            ->with('proveedores', $proveedores)
            ->with('orden_compra_proveedor', $orden_compra_proveedor);
    }

    public function postEdit(){
        $orden_compra_proveedor_id = Input::get('orden_compra_proveedor_id');
        $orden_compra_proveedor = OrdenCompraProveedor::find($orden_compra_proveedor_id);
        $orden_compra_proveedor->proveedor_id = Input::get('proveedor_id');
        $orden_compra_proveedor->vendedor_id = Input::get('vendedor_id');
        $orden_compra_proveedor->fecha_entrega = Input::get('fecha_entrega');
        $orden_compra_proveedor->save();

        return Redirect::action('SGRM\OrdenesCompraProveedorController@getIndex');
    }

    public function getCard($orden_compra_empresa_id){
        $orden_compra_empresa = OrdenCompraProveedor::find($orden_compra_empresa_id);

        return View::make('sgrm.ordenes_compra_empresa.card')
            ->with('orden_compra_empresa', $orden_compra_empresa);
    }

    public function getActive($orden_compra_empresa_id){
        $country = OrdenCompraProveedor::find($orden_compra_empresa_id);
        $country->status = 'Activo';
        $country->save();

        return Redirect::back();
    }

    public function getDesactive($orden_compra_empresa_id){
        $country = OrdenCompraProveedor::find($orden_compra_empresa_id);
        $country->status = 'Inactivo';
        $country->save();

        return Redirect::back();

    }

}

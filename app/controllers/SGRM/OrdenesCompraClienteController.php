<?php
namespace SGRM;
use \BaseController, \View, \Input, \Redirect;

class OrdenesCompraClienteController extends BaseController {

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
        $ordenes_compra_cliente_act = OrdenCompraCliente::whereStatus('Activo')->orderBy('fecha_emision')->get();
        $ordenes_compra_cliente_inact = OrdenCompraCliente::whereStatus('Inactivo')->orderBy('fecha_emision')->get();

        $cotizaciones_venta = CotizacionVenta::whereStatus('Activo')->orderBy('numero', 'DESC')->lists('numero','id');
        $vendedores = Vendedor::whereStatus('Activo')->orderBy('rut')->lists('rut','id');
        $clientes = Cliente::whereStatus('Activo')->orderBy('rut')->lists('rut','id');

        return View::make('sgrm.ordenes_compra_cliente.index')
            ->with('cotizaciones_venta', $cotizaciones_venta)
            ->with('vendedores', $vendedores)
            ->with('clientes', $clientes)
            ->with('ordenes_compra_cliente_act', $ordenes_compra_cliente_act)
            ->with('ordenes_compra_cliente_inact', $ordenes_compra_cliente_inact);
    }

    public function postCreate(){
        $orden_compra_cliente = new OrdenCompraCliente;
        $orden_compra_cliente->cotizacion_id = Input::get('cotizacion_id');
        $orden_compra_cliente->cliente_id = Input::get('cliente_id');
        $orden_compra_cliente->vendedor_id = Input::get('vendedor_id');
        $orden_compra_cliente->fecha_emision = date("Y-m-d H:i:s");
        $orden_compra_cliente->fecha_entrega = Input::get('fecha_entrega');
        $orden_compra_cliente->status = 'Activo';
        $orden_compra_cliente->save();

        return Redirect::action('SGRM\OrdenesCompraClienteController@getIndex');

    }

    public function getEdit($orden_compra_cliente_id){
        $orden_compra_cliente = OrdenCompraCliente::find($orden_compra_cliente_id);

        $vendedores = Vendedor::whereStatus('Activo')->orderBy('rut')->lists('rut','id');
        $clientes = Cliente::whereStatus('Activo')->orderBy('rut')->lists('rut','id');

        return View::make('sgrm.ordenes_compra_cliente.edit')
            ->with('vendedores', $vendedores)
            ->with('clientes', $clientes)
            ->with('orden_compra_cliente', $orden_compra_cliente);
    }

    public function postEdit(){
        $orden_compra_cliente_id = Input::get('orden_compra_cliente_id');
        $orden_compra_cliente = OrdenCompraCliente::find($orden_compra_cliente_id);
        $orden_compra_cliente->cliente_id = Input::get('cliente_id');
        $orden_compra_cliente->vendedor_id = Input::get('vendedor_id');
        $orden_compra_cliente->fecha_entrega = Input::get('fecha_entrega');
        $orden_compra_cliente->save();

        return Redirect::action('SGRM\OrdenesCompraClienteController@getIndex');
    }

    public function getCard($orden_compra_cliente_id){
        $orden_compra_cliente = OrdenCompraCliente::find($orden_compra_cliente_id);

        return View::make('sgrm.ordenes_compra_cliente.card')
            ->with('orden_compra_cliente', $orden_compra_cliente);
    }

    public function getActive($orden_compra_cliente_id){
        $country = OrdenCompraCliente::find($orden_compra_cliente_id);
        $country->status = 'Activo';
        $country->save();

        return Redirect::back();
    }

    public function getDesactive($orden_compra_cliente_id){
        $country = OrdenCompraCliente::find($orden_compra_cliente_id);
        $country->status = 'Inactivo';
        $country->save();

        return Redirect::back();

    }

}

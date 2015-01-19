<?php
namespace SGRM;
use \BaseController, \View, \Input, \Redirect;

class NotasVentaController extends BaseController {

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
        $notas_venta = NotaVenta::whereStatus('Activo')->orderBy('fecha_emision')->get();

        $ordenes_compra_cliente = OrdenCompraCliente::whereStatus('Activo')->orderBy('id', 'DESC')->lists('id','id');
        $vendedores = Vendedor::whereStatus('Activo')->orderBy('rut')->lists('rut','id');
        $clientes = Cliente::whereStatus('Activo')->orderBy('rut')->lists('rut','id');

        return View::make('sgrm.notas_venta.index')
            ->with('ordenes_compra_cliente', $ordenes_compra_cliente)
            ->with('vendedores', $vendedores)
            ->with('clientes', $clientes)
            ->with('notas_venta', $notas_venta);
    }

    public function postCreate(){
        $nota_venta = new NotaVenta;
        $nota_venta->orden_compra_id = Input::get('orden_compra_id');
        $nota_venta->cliente_id = Input::get('cliente_id');
        $nota_venta->vendedor_id = Input::get('vendedor_id');
        $nota_venta->observacion = Input::get('observacion');
        $nota_venta->fecha_emision = date("Y-m-d H:i:s");
        $nota_venta->fecha_entrega_real = Input::get('fecha_entrega');
        $nota_venta->status = 'Activo';
        $nota_venta->save();

        return Redirect::action('SGRM\NotasVentaController@getIndex');

    }

    public function getEdit($nota_venta_id){
        $nota_venta = NotaVenta::find($nota_venta_id);

        $vendedores = Vendedor::whereStatus('Activo')->orderBy('rut')->lists('rut','id');
        $clientes = Cliente::whereStatus('Activo')->orderBy('rut')->lists('rut','id');

        return View::make('sgrm.notas_venta.edit')
            ->with('vendedores', $vendedores)
            ->with('clientes', $clientes)
            ->with('nota_venta', $nota_venta);
    }

    public function postEdit(){
        $nota_venta_id = Input::get('nota_venta_id');
        $nota_venta = NotaVenta::find($nota_venta_id);
        $nota_venta->cliente_id = Input::get('cliente_id');
        $nota_venta->vendedor_id = Input::get('vendedor_id');
        $nota_venta->observacion = Input::get('observacion');
        $nota_venta->fecha_entrega = Input::get('fecha_entrega');
        $nota_venta->save();

        return Redirect::action('SGRM\NotasVentaController@getIndex');
    }

    public function getCard($nota_venta_id){
        $nota_venta = NotaVenta::find($nota_venta_id);

        return View::make('sgrm.notas_venta.card')
            ->with('nota_venta', $nota_venta);
    }

    public function getActive($nota_venta_id){
        $country = NotaVenta::find($nota_venta_id);
        $country->status = 'Activo';
        $country->save();

        return Redirect::back();
    }

    public function getDesactive($nota_venta_id){
        $country = NotaVenta::find($nota_venta_id);
        $country->status = 'Inactivo';
        $country->save();

        return Redirect::back();

    }

}

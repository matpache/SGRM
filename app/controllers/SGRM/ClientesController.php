<?php
namespace SGRM;
use \BaseController, \View, \Input, \Redirect;

class ClientesController extends BaseController {

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
        $clientes_act = Cliente::whereStatus('Activo')->orderBy('nombre')->get();
        $clientes_inact = Cliente::whereStatus('Inactivo')->orderBy('nombre')->get();

        return View::make('sgrm.clientes.index')
                    ->with('clientes_act', $clientes_act)
                    ->with('clientes_inact', $clientes_inact);
    }

    public function postCreate(){
        $cliente = new Cliente;
        $cliente->nombre = Input::get('nombre');
        $cliente->rut = Input::get('rut');
        $cliente->razon_social = Input::get('razon_social');
        $cliente->direccion = Input::get('direccion');
        $cliente->codigo_area = Input::get('codigo_area');
        $cliente->telefono_fijo = Input::get('telefono_fijo');
        $cliente->sitio_web = Input::get('sitio_web');
        $cliente->correo = Input::get('correo');
        $cliente->status = 'Activo';
        $cliente->save();

        return Redirect::action('SGRM\ClientesController@getIndex');

    }

    public function getEdit($cliente_id){
        $cliente = Cliente::find($cliente_id);

        return View::make('sgrm.clientes.edit')
                    ->with('cliente', $cliente);
    }

    public function postEdit(){
        $cliente_id = Input::get('cliente_id');
        $cliente->nombre = Input::get('nombre');
        $cliente->rut = Input::get('rut');
        $cliente->razon_social = Input::get('razon_social');
        $cliente->direccion = Input::get('direccion');
        $cliente->codigo_area = Input::get('codigo_area');
        $cliente->telefono_fijo = Input::get('telefono_fijo');
        $cliente->sitio_web = Input::get('sitio_web');
        $cliente->correo = Input::get('correo');
        $cliente->save();

        return Redirect::action('SGRM\ClientesController@getIndex');
    }

    public function getCard($cliente_id){
        $cliente = Cliente::find($cliente_id);

        return View::make('sgrm.clientes.card')
                    ->with('cliente', $cliente);
    }

    public function getActive($cliente_id){
        $country = Cliente::find($cliente_id);
        $country->status = 'Activo';
        $country->save();

        return Redirect::back();
    }

    public function getDesactive($cliente_id){
        $country = Cliente::find($cliente_id);
        $country->status = 'Inactivo';
        $country->save();

        return Redirect::back();

    }

}

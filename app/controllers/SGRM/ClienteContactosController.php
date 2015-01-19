<?php
namespace SGRM;
use \BaseController, \View, \Input, \Redirect, \DB;

class ClienteContactosController extends BaseController {

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

    public function getIndex($cliente_id){
        $cliente_contactos = ContactoCliente::whereClienteId($cliente_id)->orderBy('id')->get();

        $contactos_aux = DB::select("select CONCAT(`nombre`,' ',`paterno`,' ', `materno`) AS `nombre_completo`,
                                                    `contacto`.`id`, `contactocliente`.`cliente_id`
                                            from `contacto`
                                            left join `contactocliente`
                                              on `contacto`.`id` = `contactocliente`.`contacto_id`
                                              and `contactocliente`.`cliente_id` <> ".$cliente_id."
                                            ");
        $contactos_disponibles = array();

        foreach($contactos_aux as $key => $aux):
            if($aux->cliente_id <> $cliente_id) $contactos_disponibles[$aux->id] = $aux->nombre_completo;
        endforeach;

        return View::make('sgrm.cliente_contactos.index')
                    ->with('cliente_id', $cliente_id)
                    ->with('cliente_contactos', $cliente_contactos)
                    ->with('contactos_disponibles', $contactos_disponibles);
    }

    public function postAdd($cliente_id){
        //return Input::all();
        $contactos = Input::get('contactos');
        foreach($contactos as $contacto):
            $contacto_cliente = new ContactoCliente;
            $contacto_cliente->contacto_id = $contacto;
            $contacto_cliente->cliente_id = $cliente_id;
            $contacto_cliente->save();
        endforeach;

        return Redirect::action('SGRM\ClienteContactosController@getIndex', array($cliente_id));
    }

    public function getDelete($contacto_cliente_id){

        $contacto_cliente = ContactoCliente::find($contacto_cliente_id);
        $cliente_id = $contacto_cliente->cliente_id;
        $contacto_cliente->delete();

        return Redirect::action('SGRM\ClienteContactosController@getIndex', array($cliente_id));

    }

}

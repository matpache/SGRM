<?php
namespace SGRM;
use \BaseController, \View, \Input, \Redirect, \DB;

class ProveedorContactosController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |   Route::get('/', 'HomeController@showWelcome');
    |
    */

    public function getIndex($proveedor_id){
        $proveedor_contactos = ContactoProveedor::whereProveedorId($proveedor_id)->orderBy('id')->get();

        $contactos_aux = DB::select("select CONCAT(`nombre`,' ',`paterno`,' ', `materno`) AS `nombre_completo`,
                                                    `contacto`.`id`, `contactoproveedor`.`proveedor_id`
                                            from `contacto`
                                            left join `contactoproveedor`
                                              on `contacto`.`id` = `contactoproveedor`.`contacto_id`
                                              and `contactoproveedor`.`proveedor_id` <> ".$proveedor_id."
                                            ");

        $contactos_disponibles = array();

        foreach($contactos_aux as $key => $aux):
            if($aux->proveedor_id != $proveedor_id) $contactos_disponibles[$aux->id] = $aux->nombre_completo;
        endforeach;

        return View::make('sgrm.proveedor_contactos.index')
                    ->with('proveedor_id', $proveedor_id)
                    ->with('proveedor_contactos', $proveedor_contactos)
                    ->with('contactos_disponibles', $contactos_disponibles);
    }

    public function postAdd($proveedor_id){
        //return Input::all();
        $contactos = Input::get('contactos');
        foreach($contactos as $contacto):
            $contacto_proveedor = new ContactoProveedor;
            $contacto_proveedor->contacto_id = $contacto;
            $contacto_proveedor->proveedor_id = $proveedor_id;
            $contacto_proveedor->save();
        endforeach;

        return Redirect::action('SGRM\ProveedorContactosController@getIndex', array($proveedor_id));
    }

    public function getDelete($contacto_proveedor_id){

        $contacto_proveedor = ContactoProveedor::find($contacto_proveedor_id);
        $proveedor_id = $contacto_proveedor->proveedor_id;
        $contacto_proveedor->delete();

        return Redirect::action('SGRM\ProveedorContactosController@getIndex', array($proveedor_id));

    }

}

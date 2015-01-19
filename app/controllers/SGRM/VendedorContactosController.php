<?php
namespace SGRM;
use \BaseController, \View, \Input, \Redirect, \DB;

class VendedorContactosController extends BaseController {

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

    public function getIndex($vendedor_rut){
        $vendedor_contactos_act = ContactoVendedor::whereRutAndStatus($vendedor_rut, 'Activo')->orderBy('contacto')->get();
        $vendedor_contactos_inact = ContactoVendedor::whereRutAndStatus($vendedor_rut, 'Inactivo')->orderBy('contacto')->get();

        return View::make('sgrm.vendedor_contactos.index')
                    ->with('vendedor_rut', $vendedor_rut)
                    ->with('vendedor_contactos_act', $vendedor_contactos_act)
                    ->with('vendedor_contactos_inact', $vendedor_contactos_inact);
    }

    public function postCreate($vendedor_rut){
        $vendedor_contacto = new ContactoVendedor;
        $vendedor_contacto->contacto = Input::get('contacto');
        $vendedor_contacto->rut = $vendedor_rut;
        $vendedor_contacto->status = 'Activo';
        $vendedor_contacto->save();

        return self::getIndex($vendedor_rut);
    }

    public function getEdit($vendedor_contacto_id){
        $vendedor_contacto = ContactoVendedor::find($vendedor_contacto_id);
        return View::make('sgrm.vendedor_contactos.edit')->with('vendedor_contacto', $vendedor_contacto);
    }

    public function postEdit(){
        $id = Input::get('id');
        $vendedor_contacto = ContactoVendedor::find($id);
        $vendedor_contacto->contacto = Input::get('contacto');
        $vendedor_contacto->save();

        $proveedor = Proveedor::where('rut','=',Input::get('rut'))->pluck('rut');
        //var_dump(Input::get('rut'));
        //echo "<pre>".print_r($proveedor,1)."</pre>";
        //die();
        return self::getIndex($proveedor);
    }

    public function getActive($vendedor_contacto_id){
        $vendedor_contacto = ContactoVendedor::find($vendedor_contacto_id);
        $vendedor_contacto->status = 'Activo';
        $vendedor_contacto->save();

        return self::getIndex($vendedor_contacto->rut);
    }

    public function getDesactive($vendedor_contacto_id){
        $vendedor_contacto = ContactoVendedor::find($vendedor_contacto_id);
        $vendedor_contacto->status = 'Inactivo';
        $vendedor_contacto->save();

        return self::getIndex($vendedor_contacto->rut);

    }

}

<?php
namespace SGRM;
use \BaseController, \View, \Input, \Redirect;

class ProveedoresController extends BaseController {

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

    public function getIndex(){
        $proveedores_act = Proveedor::whereStatus('Activo')->orderBy('nombre')->get();
        $proveedores_inact = Proveedor::whereStatus('Inactivo')->orderBy('nombre')->get();

        return View::make('sgrm.proveedores.index')
                    ->with('proveedores_act', $proveedores_act)
                    ->with('proveedores_inact', $proveedores_inact);
    }

    public function postCreate(){
        $proveedor = new Proveedor;
        $proveedor->nombre = Input::get('nombre');
        $proveedor->rut = Input::get('rut');
        $proveedor->razon_social = Input::get('razon_social');
        $proveedor->direccion = Input::get('direccion');
        $proveedor->codigo_area = Input::get('codigo_area');
        $proveedor->telefono_fijo = Input::get('telefono_fijo');
        $proveedor->sitio_web = Input::get('sitio_web');
        $proveedor->correo = Input::get('correo');
        $proveedor->status = 'Activo';
        $proveedor->save();

        return Redirect::action('SGRM\ProveedoresController@getIndex');

    }

    public function getEdit($proveedor_id){
        $proveedor = Proveedor::find($proveedor_id);

        return View::make('sgrm.proveedores.edit')
                    ->with('proveedor', $proveedor);
    }

    public function postEdit(){
        $proveedor_id = Input::get('proveedor_id');
        $proveedor = Proveedor::find($proveedor_id);
        $proveedor->nombre = Input::get('nombre');
        $proveedor->rut = Input::get('rut');
        $proveedor->razon_social = Input::get('razon_social');
        $proveedor->direccion = Input::get('direccion');
        $proveedor->codigo_area = Input::get('codigo_area');
        $proveedor->telefono_fijo = Input::get('telefono_fijo');
        $proveedor->sitio_web = Input::get('sitio_web');
        $proveedor->correo = Input::get('correo');
        $proveedor->save();

        return Redirect::action('SGRM\ProveedoresController@getIndex');
    }

    public function getCard($proveedor_id){
        $proveedor = Proveedor::find($proveedor_id);

        return View::make('sgrm.proveedores.card')
                    ->with('proveedor', $proveedor);
    }

    public function getActive($proveedor_id){
        $country = Proveedor::find($proveedor_id);
        $country->status = 'Activo';
        $country->save();

        return Redirect::back();
    }

    public function getDesactive($proveedor_id){
        $country = Proveedor::find($proveedor_id);
        $country->status = 'Inactivo';
        $country->save();

        return Redirect::back();

    }

}

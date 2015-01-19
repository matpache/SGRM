<?php
namespace SGRM;
use \BaseController, \View, \Input, \Redirect;

class VendedoresController extends BaseController {

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
        $vendedores_act = Vendedor::whereStatus('Activo')->orderBy('nombre')->get();
        $vendedores_inact = Vendedor::whereStatus('Inactivo')->orderBy('nombre')->get();

        return View::make('sgrm.vendedores.index')
                    ->with('vendedores_act', $vendedores_act)
                    ->with('vendedores_inact', $vendedores_inact);
    }

    public function postCreate(){
        $vendedor = new Vendedor;
        $vendedor->nombre = Input::get('nombre');
        $vendedor->paterno = Input::get('paterno');
        $vendedor->materno = Input::get('materno');
        $vendedor->rut = Input::get('rut');
        $vendedor->sexo = Input::get('sexo');
        $vendedor->cargo = Input::get('cargo');
        $vendedor->codigo_area = Input::get('codigo_area');
        $vendedor->telefono_fijo = Input::get('telefono_fijo');
        $vendedor->telefono_movil = Input::get('telefono_movil');
        $vendedor->correo = Input::get('correo');
        $vendedor->status = 'Activo';
        $vendedor->save();

        return Redirect::action('SGRM\VendedoresController@getIndex');

    }

    public function getEdit($vendedor_id){
        $vendedor = Vendedor::find($vendedor_id);

        return View::make('sgrm.vendedores.edit')
                    ->with('vendedor', $vendedor);
    }

    public function postEdit(){
        $vendedor_id = Input::get('vendedor_id');
        $vendedor = Vendedor::find($vendedor_id);
        $vendedor->nombre = Input::get('nombre');
        $vendedor->paterno = Input::get('paterno');
        $vendedor->materno = Input::get('materno');
        $vendedor->rut = Input::get('rut');
        $vendedor->sexo = Input::get('sexo');
        $vendedor->cargo = Input::get('cargo');
        $vendedor->codigo_area = Input::get('codigo_area');
        $vendedor->telefono_fijo = Input::get('telefono_fijo');
        $vendedor->telefono_movil = Input::get('telefono_movil');
        $vendedor->correo = Input::get('correo');        
        $vendedor->save();

        return Redirect::action('SGRM\VendedoresController@getIndex');
    }

    public function getActive($vendedor_id){
        $country = Vendedor::find($vendedor_id);
        $country->status = 'Activo';
        $country->save();

        return Redirect::back();
    }

    public function getDesactive($vendedor_id){
        $country = Vendedor::find($vendedor_id);
        $country->status = 'Inactivo';
        $country->save();

        return Redirect::back();

    }

}

<?php
namespace SGRM;
use \BaseController, \View, \Input, \Redirect;

class ContactosController extends BaseController {

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
        $contactos_act = Contacto::whereStatus('Activo')->orderBy('nombre')->get();
        $contactos_inact = Contacto::whereStatus('Inactivo')->orderBy('nombre')->get();

        return View::make('sgrm.contactos.index')
                    ->with('contactos_act', $contactos_act)
                    ->with('contactos_inact', $contactos_inact);
    }

    public function postCreate(){
        $contacto = new Contacto;
        $contacto->nombre = Input::get('nombre');
        $contacto->paterno = Input::get('paterno');
        $contacto->materno = Input::get('materno');
        $contacto->rut = Input::get('rut');
        $contacto->sexo = Input::get('sexo');
        $contacto->cargo = Input::get('cargo');
        $contacto->codigo_area = Input::get('codigo_area');
        $contacto->telefono_fijo = Input::get('telefono_fijo');
        $contacto->telefono_movil = Input::get('telefono_movil');
        $contacto->correo = Input::get('correo');
        $contacto->status = 'Activo';
        $contacto->save();

        return Redirect::action('SGRM\ContactosController@getIndex');

    }

    public function getEdit($contacto_id){
        $contacto = Contacto::find($contacto_id);

        return View::make('sgrm.contactos.edit')
                    ->with('contacto', $contacto);
    }

    public function postEdit(){
        $contacto_id = Input::get('contacto_id');
        $contacto = Contacto::find($contacto_id);
        $contacto->nombre = Input::get('nombre');
        $contacto->paterno = Input::get('paterno');
        $contacto->materno = Input::get('materno');
        $contacto->rut = Input::get('rut');
        $contacto->sexo = Input::get('sexo');
        $contacto->cargo = Input::get('cargo');
        $contacto->codigo_area = Input::get('codigo_area');
        $contacto->telefono_fijo = Input::get('telefono_fijo');
        $contacto->telefono_movil = Input::get('telefono_movil');
        $contacto->correo = Input::get('correo');        
        $contacto->save();

        return Redirect::action('SGRM\ContactosController@getIndex');
    }

    public function getActive($contacto_id){
        $country = Contacto::find($contacto_id);
        $country->status = 'Activo';
        $country->save();

        return Redirect::back();
    }

    public function getDesactive($contacto_id){
        $country = Contacto::find($contacto_id);
        $country->status = 'Inactivo';
        $country->save();

        return Redirect::back();

    }

}

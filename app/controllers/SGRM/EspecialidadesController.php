<?php
namespace SGRM;
use \BaseController, \View, \Input, \Redirect, \DB;

class EspecialidadesController extends BaseController {

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
        $especialidades_act = Especialidad::whereStatus('Activo')->orderBy('nombre')->get();
        $especialidades_inact = Especialidad::whereStatus('Inactivo')->orderBy('nombre')->get();

        return View::make('sgrm.especialidades.index')
            ->with('especialidades_act', $especialidades_act)
            ->with('especialidades_inact', $especialidades_inact);
    }

    public function postCreate(){
        $especialidad = new Especialidad;
        $especialidad->nombre = Input::get('nombre');
        $especialidad->descripcion = Input::get('descripcion');
        $especialidad->status = 'Activo';
        $especialidad->save();

        return self::getIndex();
    }

    public function getEdit($especialidad_id){
        $especialidad = Especialidad::find($especialidad_id);
        return View::make('sgrm.especialidades.edit')->with('especialidad', $especialidad);
    }

    public function postEdit(){
        $id = Input::get('id');
        $especialidad = Especialidad::find($id);
        $especialidad->nombre = Input::get('nombre');
        $especialidad->descripcion = Input::get('descripcion');
        $especialidad->save();

        return self::getIndex();
    }

    public function getActive($especialidad_id){
        $especialidad = Especialidad::find($especialidad_id);
        $especialidad->status = 'Activo';
        $especialidad->save();

        return self::getindex();
    }

    public function getDesactive($especialidad_id){
        $especialidad = Especialidad::find($especialidad_id);
        $especialidad->status = 'Inactivo';
        $especialidad->save();

        return self::getindex();

    }

}
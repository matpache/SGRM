<?php
namespace SGRM;
use \BaseController, \View, \Input, \Redirect, \DB;

class EstadosController extends BaseController {

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
        $estados_act = Estado::whereStatus('Activo')->orderBy('nombre')->get();
        $estados_inact = Estado::whereStatus('Inactivo')->orderBy('nombre')->get();

        return View::make('sgrm.estados.index')
            ->with('estados_act', $estados_act)
            ->with('estados_inact', $estados_inact);
    }

    public function postCreate(){
        $estado = new Estado;
        $estado->nombre = Input::get('nombre');
        $estado->descripcion = Input::get('descripcion');
        $estado->status = 'Activo';
        $estado->save();

        return self::getIndex();
    }

    public function getEdit($estado_id){
        $estado = Estado::find($estado_id);
        return View::make('sgrm.estados.edit')->with('estado', $estado);
    }

    public function postEdit(){
        $id = Input::get('id');
        $estado = Estado::find($id);
        $estado->nombre = Input::get('nombre');
        $estado->descripcion = Input::get('descripcion');
        $estado->save();

        return self::getIndex();
    }

    public function getActive($estado_id){
        $estado = Estado::find($estado_id);
        $estado->status = 'Activo';
        $estado->save();

        return self::getindex();
    }

    public function getDesactive($estado_id){
        $estado = Estado::find($estado_id);
        $estado->status = 'Inactivo';
        $estado->save();

        return self::getindex();

    }

}
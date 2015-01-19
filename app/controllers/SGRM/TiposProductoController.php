<?php
namespace SGRM;
use \BaseController, \View, \Input, \Redirect, \DB;

class TiposProductoController extends BaseController {

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
        $tipos_producto_act = TipoProducto::whereStatus('Activo')->orderBy('descripcion')->get();
        $tipos_producto_inact = TipoProducto::whereStatus('Inactivo')->orderBy('descripcion')->get();

        return View::make('sgrm.tipos_producto.index')
            ->with('tipos_producto_act', $tipos_producto_act)
            ->with('tipos_producto_inact', $tipos_producto_inact);
    }

    public function postCreate(){
        $tipo_producto = new TipoProducto;
        $tipo_producto->descripcion = Input::get('descripcion');
        $tipo_producto->status = 'Activo';
        $tipo_producto->save();

        return self::getIndex();
    }

    public function getEdit($tipo_producto_id){
        $tipo_producto = TipoProducto::find($tipo_producto_id);
        return View::make('sgrm.tipos_producto.edit')->with('tipo_producto', $tipo_producto);
    }

    public function postEdit(){
        $id = Input::get('id');
        $tipo_producto = TipoProducto::find($id);
        $tipo_producto->descripcion = Input::get('descripcion');
        $tipo_producto->save();

        return self::getIndex();
    }

    public function getActive($tipo_producto_id){
        $tipo_producto = TipoProducto::find($tipo_producto_id);
        $tipo_producto->status = 'Activo';
        $tipo_producto->save();

        return self::getindex();
    }

    public function getDesactive($tipo_producto_id){
        $tipo_producto = TipoProducto::find($tipo_producto_id);
        $tipo_producto->status = 'Inactivo';
        $tipo_producto->save();

        return self::getindex();

    }

}
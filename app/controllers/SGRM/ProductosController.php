<?php
namespace SGRM;
use \BaseController, \View, \Input, \Redirect, \DB;

class ProductosController extends BaseController {

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
        $productos_act = Producto::whereStatus('Activo')->orderBy('codigo')->get();
        $productos_inact = Producto::whereStatus('Inactivo')->orderBy('codigo')->get();

        $tipos_producto = TipoProducto::whereStatus('Activo')->orderBy('descripcion')->lists('descripcion', 'id');

        return View::make('sgrm.productos.index')
            ->with('productos_act', $productos_act)
            ->with('productos_inact', $productos_inact)
            ->with('tipos_producto', $tipos_producto);
    }

    public function postCreate(){
        $producto = new Producto;
        $producto->nombre = Input::get('nombre');
        $producto->descripcion = Input::get('descripcion');
        $producto->formato = Input::get('formato');
        $producto->codigo = Input::get('codigo');
        $producto->tipo_producto_id = Input::get('tipo_producto');
        $producto->precio_maximo = Input::get('precio_maximo');
        $producto->precio_minimo = Input::get('precio_minimo');
        $producto->status = 'Activo';
        $producto->save();

        return self::getIndex();
    }

    public function getEdit($producto_id){
        $producto = Producto::find($producto_id);
                $tipos_producto = TipoProducto::whereStatus('Activo')->orderBy('descripcion')->lists('descripcion', 'id');  
        return View::make('sgrm.productos.edit')->with('producto', $producto)->with('tipos_producto', $tipos_producto);
    }

    public function postEdit(){
        $id = Input::get('id');
        $producto = Producto::find($id);
        $producto->nombre = Input::get('nombre');
        $producto->descripcion = Input::get('descripcion');
        $producto->formato = Input::get('formato');
        $producto->codigo = Input::get('codigo');
        $producto->tipo_producto_id = Input::get('tipo_producto');
        $producto->precio_maximo = Input::get('precio_maximo');
        $producto->precio_minimo = Input::get('precio_minimo');
        $producto->save();

        return self::getIndex();
    }

    public function getActive($producto_id){
        $producto = Producto::find($producto_id);
        $producto->status = 'Activo';
        $producto->save();

        return self::getindex();
    }

    public function getDesactive($producto_id){
        $producto = Producto::find($producto_id);
        $producto->status = 'Inactivo';
        $producto->save();

        return self::getindex();

    }

}
<?php
namespace SGRM;
use \BaseController, \View, \Input, \Redirect, \DB;

class DocumentosPagoController extends BaseController {

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
        $documentos_pago_act = DocumentoPago::whereStatus('Activo')->orderBy('nombre')->get();
        $documentos_pago_inact = DocumentoPago::whereStatus('Inactivo')->orderBy('nombre')->get();

        return View::make('sgrm.documentos_pago.index')
            ->with('documentos_pago_act', $documentos_pago_act)
            ->with('documentos_pago_inact', $documentos_pago_inact);
    }

    public function postCreate(){
        $documento_pago = new DocumentoPago;
        $documento_pago->nombre = Input::get('nombre');
        $documento_pago->status = 'Activo';
        $documento_pago->save();

        return self::getIndex();
    }

    public function getEdit($documento_pago_id){
        $documento_pago = DocumentoPago::find($documento_pago_id);
        return View::make('sgrm.documentos_pago.edit')->with('documento_pago', $documento_pago);
    }

    public function postEdit(){
        $id = Input::get('id');
        $documento_pago = DocumentoPago::find($id);
        $documento_pago->nombre = Input::get('nombre');
        $documento_pago->save();

        return self::getIndex();
    }

    public function getActive($documento_pago_id){
        $documento_pago = DocumentoPago::find($documento_pago_id);
        $documento_pago->status = 'Activo';
        $documento_pago->save();

        return self::getindex();
    }

    public function getDesactive($documento_pago_id){
        $documento_pago = DocumentoPago::find($documento_pago_id);
        $documento_pago->status = 'Inactivo';
        $documento_pago->save();

        return self::getindex();

    }

}
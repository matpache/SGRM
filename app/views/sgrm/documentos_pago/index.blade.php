@extends('layout')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <a href="#dlgNewDocument" data-toggle='modal' class="btn btn-xs btn-default pull-right">Nueva <i class="fa fa-plus"></i></a>
        <h3 class="panel-title">
            <ul id="statusTab" class="nav nav-pills" role="tablist">
                <li class="active"><a href="#activos" role="tab" data-toggle="tab">Documentos Activos</a></li>
                <li><a href="#inactivos" role="tab" data-toggle="tab">Documento Inactivos</a></li>
            </ul>
        </h3>
    </div>
    <div class="panel-body">
    </div>
    <div class="tab-content">
        <div class="tab-pane active" id="activos">
            <table class="table">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($documentos_pago_act as $documento_pago_act)
                <tr>
                    <td>{{ $documento_pago_act->nombre }}</td>
                    <td>
                        <a class="btn btn-xs btn-default" href="{{ action('SGRM\DocumentosPagoController@getEdit', array($documento_pago_act->id)) }}"><i class="fa fa-edit"></i> Editar</a>
                        @if($documento_pago_act->status=='Activo')
                        <a href="{{ action('SGRM\DocumentosPagoController@getDesactive', array($documento_pago_act->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Desactivar</a>
                        @else
                        <a href="{{ action('SGRM\DocumentosPagoController@getActive', array($documento_pago_act->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-check"></i> Activar</a>
                        @endif
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane inactive" id="inactivos">
            <table class="table">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($documentos_pago_inact as $documento_pago_inact)
                <tr>
                    <td>{{ $documento_pago_inact->nombre }}</td>
                    <td>
                        <a class="btn btn-xs btn-default" href="{{ action('SGRM\DocumentosPagoController@getEdit', array($documento_pago_inact->id)) }}"><i class="fa fa-edit"></i> Editar</a>
                        @if($documento_pago_inact->status=='Activo')
                        <a href="{{ action('SGRM\DocumentosPagoController@getDesactive', array($documento_pago_inact->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Desactivar</a>
                        @else
                        <a href="{{ action('SGRM\DocumentosPagoController@getActive', array($documento_pago_inact->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-check"></i> Activar</a>
                        @endif
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="panel-footer">
            <a href="{{ action('SGRM\DocumentosPagoController@getIndex', array()) }}" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Volver</a>
            <!-- <a href="{{ URL::previous() }}" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Volver</a> -->
        </div>
    </div>

    <div class="modal fade" id="dlgNewDocument" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            {{ Form::open(array('action'=> array('SGRM\DocumentosPagoController@postCreate'))) }}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Nuevo Documento</h4>
                </div>
                <div class="modal-body">
                    {{ Form::label('nombre', 'Nombre') }}
                    {{ Form::text('nombre', '', array('class'=>'form-control')) }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar <i class="fa fa-times"></i></button>
                    <button type="submit" class="btn btn-primary">Crear <i class="fa fa-save"></i></button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>

    @stop
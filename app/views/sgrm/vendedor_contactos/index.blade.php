@extends('layout')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <a href="#dlgNewVendedor" data-toggle='modal' class="btn btn-xs btn-default pull-right">Nuevo <i class="fa fa-plus"></i></a>
        <h3 class="panel-title">
            <ul id="statusTab" class="nav nav-pills" role="tablist">
                <li class="active"><a href="#activos" role="tab" data-toggle="tab">Contactos Activos</a></li>
                <li><a href="#inactivos" role="tab" data-toggle="tab">Contactos Inactivos</a></li>
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
                    <th>Contacto</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($vendedor_contactos_act as $vendedor_contacto_act)
                <tr>
                    <td>{{ $vendedor_contacto_act->contacto }}</td>
                    <td>
                        <a class="btn btn-xs btn-default" href="{{ action('SGRM\VendedorContactosController@getEdit', array($vendedor_contacto_act->id)) }}"><i class="fa fa-edit"></i> Editar</a>
                        @if($vendedor_contacto_act->status=='Activo')
                            <a href="{{ action('SGRM\VendedorContactosController@getDesactive', array($vendedor_contacto_act->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Desactivar</a>
                        @else
                            <a href="{{ action('SGRM\VendedorContactosController@getActive', array($vendedor_contacto_act->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-check"></i> Activar</a>
                        @endif
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="inactivos">
            <table class="table">
                <thead>
                <tr>
                    <th>Ciudad</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($vendedor_contactos_inact as $vendedor_contacto_inact)
                <tr>
                    <td>{{ $vendedor_contacto_inact->contacto }}</td>
                    <td>
                        <a class="btn btn-xs btn-default" href="{{ action('SGRM\VendedorContactosController@getEdit', array($vendedor_contacto_inact->id)) }}"><i class="fa fa-edit"></i> Editar</a>
                        @if($vendedor_contacto_inact->status=='Activo')
                            <a href="{{ action('SGRM\VendedorContactosController@getDesactive', array($vendedor_contacto_inact->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Desactivar</a>
                        @else
                            <a href="{{ action('SGRM\VendedorContactosController@getActive', array($vendedor_contacto_inact->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-check"></i> Activar</a>
                        @endif
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="panel-footer">
            <a href="{{ action('SGRM\ProveedoresController@getIndex', array()) }}" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Volver</a>
            <!-- <a href="{{ URL::previous() }}" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Volver</a> -->
        </div>
    </div>

    <div class="modal fade" id="dlgNewVendedor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            {{ Form::open(array('action'=> array('SGRM\VendedorContactosController@postCreate', $vendedor_rut))) }}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Nuevo Contacto</h4>
                </div>
                <div class="modal-body">
                    {{ Form::label('contacto', 'Contacto') }}
                    {{ Form::text('contacto', '', array('class'=>'form-control')) }}
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
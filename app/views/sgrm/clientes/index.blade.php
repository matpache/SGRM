@extends('layout')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a href="#dlgNewCliente" data-toggle='modal' class="btn btn-xs btn-default pull-right">Nuevo <i class="fa fa-plus"></i></a>
            <ul id="statusTab" class="nav nav-pills" role="tablist">
                <li class="active"><a href="#activos" role="tab" data-toggle="tab">Clientes Activos</a></li>
                <li><a href="#inactivos" role="tab" data-toggle="tab">Clientes Inactivos</a></li>
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
                    <th>Rut</th>
                    <th>Nombre</th>
                    <th>Razón Social</th>
                    <th>Dirección</th>
                    <th>Teléfono Fijo</th>
                    <th>Correo</th>
                    <th>Sitio Web</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clientes_act as $cliente_act)
                <tr>
                    <td>{{ ($cliente_act->rut) ? $cliente_act->rut : '' }}</td>
                    <td>{{ $cliente_act->nombre }}</td>
                    <td>{{ $cliente_act->razon_social }}</td>
                    <td>{{ $cliente_act->direccion }}</td>
                    <td>{{ $cliente_act->telefono_fijo }}</td>
                    <td>{{ $cliente_act->correo }}</td>
                    <td>{{ $cliente_act->sitio_web }}</td>
                    <td>
                        <a class="btn btn-xs btn-default" href="{{ action('SGRM\ClientesController@getEdit', array($cliente_act->id)) }}"><i class="fa fa-edit"></i> Editar</a>
                        <a class="btn btn-xs btn-default" href="{{ action('SGRM\ClientesController@getCard', array($cliente_act->id)) }}"><i class="fa fa-eye"></i> Ver Ficha</a>
                        @if($cliente_act->status=='Activo')
                            <a href="{{ action('SGRM\ClientesController@getDesactive', array($cliente_act->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Desactivar</a>
                        @else
                            <a href="{{ action('SGRM\ClientesController@getActive', array($cliente_act->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-check"></i> Activar</a>
                        @endif
                        <a class="btn btn-xs btn-default" href="{{ action('SGRM\ClienteContactosController@getIndex', array($cliente_act->id)) }}"><i class="fa fa-plus"></i> Contactos</a>
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
                    <th>Rut</th>
                    <th>Nombre</th>
                    <th>Razón Social</th>
                    <th>Dirección</th>
                    <th>Teléfono Fijo</th>
                    <th>Correo</th>
                    <th>Sitio Web</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clientes_inact as $cliente_inact)
                <tr>
                    <td>{{ ($cliente_inact->rut) ? $cliente_inact->rut : '' }}</td>
                    <td>{{ $cliente_inact->nombre }}</td>
                    <td>{{ $cliente_inact->razon_social }}</td>
                    <td>{{ $cliente_inact->direccion }}</td>
                    <td>{{ $cliente_inact->telefono_fijo }}</td>
                    <td>{{ $cliente_inact->correo }}</td>
                    <td>{{ $cliente_inact->sitio_web }}</td>
                    <td>
                        <a class="btn btn-xs btn-default" href="{{ action('SGRM\ClientesController@getEdit', array($cliente_inact->id)) }}"><i class="fa fa-edit"></i> Editar</a>
                        <a class="btn btn-xs btn-default" href="{{ action('SGRM\ClientesController@getCard', array($cliente_inact->id)) }}"><i class="fa fa-eye"></i> Ver Ficha</a>
                        @if($cliente_inact->status=='Activo')
                            <a href="{{ action('SGRM\ClientesController@getDesactive', array($cliente_inact->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Desactivar</a>
                        @else
                            <a href="{{ action('SGRM\ClientesController@getActive', array($cliente_inact->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-check"></i> Activar</a>
                        @endif
                        <a class="btn btn-xs btn-default" href="{{ action('SGRM\ClienteContactosController@getIndex', array($cliente_inact->id)) }}"><i class="fa fa-plus"></i> Contactos</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="dlgNewCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        {{ Form::open(array('action'=>'SGRM\ClientesController@postCreate')) }}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Nuevo Cliente</h4>
            </div>
            <div class="modal-body">
                {{ Form::label('nombre', 'Nombre') }}
                {{ Form::text('nombre', '', array('class'=>'form-control')) }}
                {{ Form::label('rut', 'Rut') }}
                {{ Form::text('rut', '', array('class'=>'form-control')) }}
                {{ Form::label('razon_social', 'Razón Social') }}
                {{ Form::text('razon_social', '', array('class'=>'form-control')) }}
                {{ Form::label('direccion', 'Dirección') }}
                {{ Form::text('direccion', '', array('class'=>'form-control')) }}
                {{ Form::label('codigo_area', 'Código Área') }}
                {{ Form::text('codigo_area', '', array('class'=>'form-control')) }}
                {{ Form::label('telefono_fijo', 'Télefono Fijo') }}
                {{ Form::text('telefono_fijo', '', array('class'=>'form-control')) }}
                {{ Form::label('correo', 'Correo') }}
                {{ Form::text('correo', '', array('class'=>'form-control')) }}
                {{ Form::label('sitio_web', 'Sitio Web') }}
                {{ Form::text('sitio_web', '', array('class'=>'form-control')) }}

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
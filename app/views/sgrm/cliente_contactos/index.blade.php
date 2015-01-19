@extends('layout')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <a href="#dlgNewCity" data-toggle='modal' class="btn btn-xs btn-default pull-right">Agregar <i class="fa fa-plus"></i></a>
        <h3 class="panel-title">Contactos</h3>
    </div>
    <div class="panel-body">
    </div>
            <table class="table">
                <thead>
                <tr>
            <th>Nombre</th>
            <th>Rut</th>
            <th>Telefono Fijo</th>
            <th>Telefono Móvil</th>
            <th>Correo</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
        @foreach($cliente_contactos as $cliente_contacto)
                <tr>
            <td>{{ $cliente_contacto->contacto->nombre.' '.$cliente_contacto->contacto->paterno.' '.$cliente_contacto->contacto->materno }}</td>
            <td>{{ $cliente_contacto->contacto->rut }}</td>
            <td>{{ $cliente_contacto->contacto->codigo_area.'-'.$cliente_contacto->contacto->telefono_fijo }}</td>
            <td>{{ $cliente_contacto->contacto->codigo_area.'-'.$cliente_contacto->contacto->telefono_movil }}</td>
            <td>{{ $cliente_contacto->contacto->correo }}</td>
                    <td>
                <a href="{{ action('SGRM\ClienteContactosController@getDelete', array($cliente_contacto->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Eliminar</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>

        <div class="panel-footer">
        <a href="{{ URL::previous() }}" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Volver</a>
    </div>

    <div class="modal fade" id="dlgNewCity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            {{ Form::open(array('action'=> array('SGRM\ClienteContactosController@postAdd', $cliente_id))) }}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Agregar Contacto</h4>
                </div>
                <div class="modal-body">
                    {{ Form::label('contactos', 'Contactos') }}
                    {{ Form::select('contactos', $contactos_disponibles, '' , array('multiple'=>'multiple','name'=>'contactos[]', 'class'=>'form-control')) }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar <i class="fa fa-times"></i></button>
                    <button type="submit" class="btn btn-primary">Crear <i class="fa fa-save"></i></button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

@stop
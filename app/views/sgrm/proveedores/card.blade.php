@extends('layout')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            Ficha del Proveedor
        </h3>
    </div>
    <div class="panel-body row">
        <div class="form-group col-md-3">
            {{ Form::label('', 'Rut') }}
            <p class="help-block">{{ $proveedor->rut }}</p>
            {{ Form::label('', 'Nombre') }}
            <p class="help-block">{{ $proveedor->nombre }}</p>
        </div>
        <div class="col-md-9">
            <table class="table">
                <thead>
                {{ Form::label('', 'Contactos') }}<hr>
                <tr>
                    <th>Nombre</th>
                    <th>Rut</th>
                    <th>Telefono Fijo</th>
                    <th>Telefono Móvil</th>
                    <th>Correo</th>
                </tr>
                </thead>
                <tbody>
                @foreach($proveedor->contactos()->get() as $contacto)
                <tr>
                    <td>{{ $contacto->contacto->nombre.' '.$contacto->contacto->paterno.' '.$contacto->contacto->materno }}</td>
                    <td>{{ $contacto->contacto->rut }}</td>
                    <td>{{ $contacto->contacto->codigo_area.'-'.$contacto->contacto->telefono_fijo }}</td>
                    <td>{{ $contacto->contacto->codigo_area.'-'.$contacto->contacto->telefono_movil }}</td>
                    <td>{{ $contacto->contacto->correo }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="panel-footer">
        <a href="{{ URL::previous() }}" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Volver</a>
    </div>
</div>

@stop
@extends('layout')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            Ficha del Cliente
        </h3>
    </div>
    <div class="panel-body row">
        <div class="form-group col-md-3">
            <label>Rut</label>
            <p class="help-block">{{ $cliente->rut }}</p>
            <label>Nombre</label>
            <p class="help-block">{{ $cliente->nombre }}</p>
            <label>Razón Social</label>
            <p class="help-block">{{ $cliente->razon_social }}</p>
            <label>Dirección</label>
            <p class="help-block">{{ $cliente->direccion }}</p>
            <label>Teléfono</label>
            <p class="help-block">{{ $cliente->codigo_area.'-'.$cliente->telefono_fijo }}</p>
            <label>Correo</label>
            <p class="help-block">{{ $cliente->correo }}</p>
            <label>Sitio Web</label>
            <p class="help-block">{{ $cliente->sitio_web }}</p>
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
                @foreach($cliente->contactos()->get() as $contacto)
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
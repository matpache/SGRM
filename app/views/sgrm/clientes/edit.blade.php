@extends('layout')
@section('content')

{{ Form::open(array('action'=>'SGRM\ClientesController@postEdit')) }}
{{ Form::hidden('cliente_id', $cliente->id) }}
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            Editar Cliente {{ $cliente->nombre }}
        </h3>
    </div>
    <div class="panel-body">
        {{ Form::label('nombre', 'Nombre') }}
        {{ Form::text('nombre', $cliente->nombre, array('class'=>'form-control')) }}
        {{ Form::label('rut', 'Rut') }}
        {{ Form::text('rut', $cliente->rut, array('class'=>'form-control')) }}
        {{ Form::label('razon_social', 'Razón Social') }}
        {{ Form::text('razon_social', $cliente->razon_social, array('class'=>'form-control')) }}
        {{ Form::label('direccion', 'Dirección') }}
        {{ Form::text('direccion', $cliente->direccion, array('class'=>'form-control')) }}
        {{ Form::label('codigo_area', 'Código Área') }}
        {{ Form::text('codigo_area', $cliente->codigo_area, array('class'=>'form-control')) }}
        {{ Form::label('telefono_fijo', 'Télefono Fijo') }}
        {{ Form::text('telefono_fijo', $cliente->telefono_fijo, array('class'=>'form-control')) }}
        {{ Form::label('correo', 'Correo') }}
        {{ Form::text('correo', $cliente->correo, array('class'=>'form-control')) }}
        {{ Form::label('sitio_web', 'Sitio Web') }}
        {{ Form::text('sitio_web', $cliente->sitio_web, array('class'=>'form-control')) }}
    </div>
    <div class="panel-footer">
        <a href="{{ URL::previous() }}" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Volver</a>
        <button type="submit" class="btn btn-primary pull-right">Guardar Cambios <i class="fa fa-save"></i></button>
    </div>
</div>
{{ Form::close() }}

@stop
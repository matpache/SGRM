@extends('layout')
@section('content')

{{ Form::open(array('action'=>'SGRM\ContactosController@postEdit')) }}
{{ Form::hidden('contacto_id', $contacto->id) }}
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            Editar Contacto {{ $contacto->nombre }}
        </h3>
    </div>
    <div class="panel-body">
        {{ Form::label('nombre', 'Nombre') }}
        {{ Form::text('nombre', $contacto->nombre, array('class'=>'form-control', 'required'=>true)) }}
        {{ Form::label('paterno', 'Apellido Paterno') }}
        {{ Form::text('paterno', $contacto->paterno, array('class'=>'form-control', 'required'=>true)) }}
        {{ Form::label('materno', 'Apellido Materno') }}
        {{ Form::text('materno', $contacto->materno, array('class'=>'form-control', 'required'=>true)) }}
        {{ Form::label('rut', 'Rut') }}
        {{ Form::text('rut', $contacto->rut, array('class'=>'form-control', 'required'=>true)) }}
        {{ Form::label('sexo', 'Sexo') }}
        {{ Form::select('sexo', array('h' => 'Hombre', 'm' => 'Mujer'), $contacto->sexo, array('class'=>'form-control', 'required'=>true)) }}
        {{ Form::label('cargo', 'Cargo') }}
        {{ Form::text('cargo', $contacto->cargo, array('class'=>'form-control', 'required'=>true)) }}
        {{ Form::label('correo', 'Correo') }}
        {{ Form::text('correo', $contacto->correo, array('class'=>'form-control', 'required'=>true)) }}
        {{ Form::label('codigo_area', 'Código de Área') }}
        {{ Form::text('codigo_area', $contacto->codigo_area, array('class'=>'form-control', 'required'=>true)) }}
        {{ Form::label('telefono_fijo', 'Teléfono Fijo') }}
        {{ Form::text('telefono_fijo', $contacto->telefono_fijo, array('class'=>'form-control', 'required'=>true)) }}
        {{ Form::label('telefono_movil', 'Teléfono Móvil') }}
        {{ Form::text('telefono_movil', $contacto->telefono_movil, array('class'=>'form-control', 'required'=>true)) }}
    </div>
    <div class="panel-footer">
        <a href="{{ URL::previous() }}" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Volver</a>
        <button type="submit" class="btn btn-primary pull-right">Guardar Cambios <i class="fa fa-save"></i></button>
    </div>
</div>
{{ Form::close() }}

@stop
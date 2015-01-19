@extends('layout')
@section('content')

{{ Form::open(array('action'=>'SGRM\EspecialidadesController@postEdit')) }}
{{ Form::hidden('id', $especialidad->id) }}
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            Editar Especialidad {{ $especialidad->nombre }}
        </h3>
    </div>
    <div class="panel-body">
        {{ Form::label('nombre', 'Nombre') }}
        {{ Form::text('nombre', $especialidad->nombre, array('class'=>'form-control')) }}
        {{ Form::label('descripcion', 'Descripción') }}
        {{ Form::textarea('descripcion', $especialidad->descripcion, array('class'=>'form-control')) }}
    </div>
    <div class="panel-footer">
        <a href="{{ URL::previous() }}" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Volver</a>
        <button type="submit" class="btn btn-primary pull-right">Guardar Cambios <i class="fa fa-save"></i></button>
    </div>
</div>
{{ Form::close() }}

@stop
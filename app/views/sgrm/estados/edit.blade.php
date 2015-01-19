@extends('layout')
@section('content')

{{ Form::open(array('action'=>'SGRM\EstadosController@postEdit')) }}
{{ Form::hidden('id', $estado->id) }}
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            Editar Estado {{ $estado->nombre }}
        </h3>
    </div>
    <div class="panel-body">
        {{ Form::label('nombre', 'Nombre') }}
        {{ Form::text('nombre', $estado->nombre, array('class'=>'form-control')) }}
        {{ Form::label('descripcion', 'Descripción') }}
        {{ Form::textarea('descripcion', $estado->descripcion, array('class'=>'form-control')) }}
    </div>
    <div class="panel-footer">
        <a href="{{ URL::previous() }}" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Volver</a>
        <button type="submit" class="btn btn-primary pull-right">Guardar Cambios <i class="fa fa-save"></i></button>
    </div>
</div>
{{ Form::close() }}

@stop
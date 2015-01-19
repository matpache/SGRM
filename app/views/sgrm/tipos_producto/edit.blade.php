@extends('layout')
@section('content')

{{ Form::open(array('action'=>'SGRM\TiposProductoController@postEdit')) }}
{{ Form::hidden('id', $tipo_producto->id) }}
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            Editar Tipo de Producto {{ $tipo_producto->descripcion }}
        </h3>
    </div>
    <div class="panel-body">
        {{ Form::label('descripcion', 'Descripcion') }}
        {{ Form::textarea('descripcion', $tipo_producto->descripcion, array('class'=>'form-control')) }}
    </div>
    <div class="panel-footer">
        <a href="{{ URL::previous() }}" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Volver</a>
        <button type="submit" class="btn btn-primary pull-right">Guardar Cambios <i class="fa fa-save"></i></button>
    </div>
</div>
{{ Form::close() }}

@stop
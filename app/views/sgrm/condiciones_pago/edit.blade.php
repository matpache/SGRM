@extends('layout')
@section('content')

{{ Form::open(array('action'=>'SGRM\CondicionesPagoController@postEdit')) }}
{{ Form::hidden('id', $condicion_pago->id) }}
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            Editar Condición de Pago {{ $condicion_pago->descripcion }}
        </h3>
    </div>
    <div class="panel-body">
        {{ Form::label('descripcion', 'Descripcion') }}
        {{ Form::textarea('descripcion', $condicion_pago->descripcion, array('class'=>'form-control')) }}
    </div>
    <div class="panel-footer">
        <a href="{{ URL::previous() }}" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Volver</a>
        <button type="submit" class="btn btn-primary pull-right">Guardar Cambios <i class="fa fa-save"></i></button>
    </div>
</div>
{{ Form::close() }}

@stop
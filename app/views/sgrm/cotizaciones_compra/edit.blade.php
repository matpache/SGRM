@extends('layout')
@section('content')

{{ Form::open(array('action'=>'SGRM\CotizacionesComprasController@postEdit')) }}
{{ Form::hidden('cotizacion_compra_id', $cotizacion_compra->id) }}
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            Editar Cotización {{ $cotizacion_compra->numero }}
        </h3>
    </div>
    <div class="panel-body">
        {{ Form::label('numero', 'Número') }}
        {{ Form::text('numero', $cotizacion_compra->numero, array('class'=>'form-control')) }}
        {{ Form::label('fecha_entrega', 'Fecha de Entrega') }}
        {{ Form::text('fecha_entrega', $cotizacion_compra->fecha_entrega, array('class'=>'form-control')) }}
    </div>
    <div class="panel-footer">
        <a href="{{ URL::previous() }}" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Volver</a>
        <button type="submit" class="btn btn-primary pull-right">Guardar Cambios <i class="fa fa-save"></i></button>
    </div>
</div>
{{ Form::close() }}

@stop
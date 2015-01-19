@extends('layout')
@section('content')

{{ Form::open(array('action'=>'SGRM\NotasVentaController@postEdit')) }}
{{ Form::hidden('nota_venta_id', $nota_venta->id) }}
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            Editar Nota de Venta
        </h3>
    </div>
    <div class="panel-body">
        {{ Form::label('vendedor_id', 'Vendedor') }}
        {{ Form::select('vendedor_id', $vendedores, $nota_venta->vendedor_id, array('class'=>'form-control')) }}
        {{ Form::label('cliente_id', 'Cliente') }}
        {{ Form::select('cliente_id', $clientes, $nota_venta->cliente_id, array('class'=>'form-control')) }}
        {{ Form::label('fecha_entrega', 'Fecha de Entrega') }}
        {{ Form::text('fecha_entrega', $nota_venta->fecha_entrega_real, array('class'=>'form-control')) }}
        {{ Form::label('observacion', 'Observación') }}
        {{ Form::textarea('observacion', $nota_venta->observacion, array('class'=>'form-control')) }}

    </div>
    <div class="panel-footer">
        <a href="{{ URL::previous() }}" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Volver</a>
        <button type="submit" class="btn btn-primary pull-right">Guardar Cambios <i class="fa fa-save"></i></button>
    </div>
</div>
{{ Form::close() }}

@stop
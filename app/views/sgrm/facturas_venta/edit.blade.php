@extends('layout')
@section('content')

{{ Form::open(array('action'=>'SGRM\FacturasCompraController@postEdit')) }}
{{ Form::hidden('factura_venta_id', $factura_venta->id) }}
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            Editar Factura Venta
        </h3>
    </div>
    <div class="panel-body">
        {{ Form::label('vendedor_id', 'Vendedor') }}
        {{ Form::select('vendedor_id', $vendedores, $factura_venta->vendedor_id, array('class'=>'form-control')) }}
        {{ Form::label('cliente_id', 'Cliente') }}
        {{ Form::select('cliente_id', $clientes, $factura_venta->cliente_id, array('class'=>'form-control')) }}
        {{ Form::label('estado_id', 'Estados') }}
        {{ Form::select('estado_id', $estados, $factura_venta->estado_id, array('class'=>'form-control')) }}
        {{ Form::label('observacion', 'Observación') }}
        {{ Form::textarea('observacion', $factura_venta->observacion, array('class'=>'form-control')) }}

    </div>
    <div class="panel-footer">
        <a href="{{ URL::previous() }}" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Volver</a>
        <button type="submit" class="btn btn-primary pull-right">Guardar Cambios <i class="fa fa-save"></i></button>
    </div>
</div>
{{ Form::close() }}

@stop
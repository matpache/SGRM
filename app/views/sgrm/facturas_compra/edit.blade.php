@extends('layout')
@section('content')

{{ Form::open(array('action'=>'SGRM\FacturasCompraController@postEdit')) }}
{{ Form::hidden('factura_compra_id', $factura_compra->id) }}
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            Editar Factura Compra
        </h3>
    </div>
    <div class="panel-body">
        {{ Form::label('vendedor_id', 'Vendedor') }}
        {{ Form::select('vendedor_id', $vendedores, $factura_compra->vendedor_id, array('class'=>'form-control')) }}
        {{ Form::label('proveedor_id', 'Cliente') }}
        {{ Form::select('proveedor_id', $proveedores, $factura_compra->proveedor_id, array('class'=>'form-control')) }}
        {{ Form::label('estado_id', 'Estados') }}
        {{ Form::select('estado_id', $estados, $factura_compra->estado_id, array('class'=>'form-control')) }}
        {{ Form::label('observacion', 'Observación') }}
        {{ Form::textarea('observacion', $factura_compra->observacion, array('class'=>'form-control')) }}

    </div>
    <div class="panel-footer">
        <a href="{{ URL::previous() }}" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Volver</a>
        <button type="submit" class="btn btn-primary pull-right">Guardar Cambios <i class="fa fa-save"></i></button>
    </div>
</div>
{{ Form::close() }}

@stop
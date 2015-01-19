@extends('layout')
@section('content')

{{ Form::open(array('action'=>'SGRM\OrdenesCompraProveedorController@postEdit')) }}
{{ Form::hidden('orden_compra_proveedor_id', $orden_compra_proveedor->id) }}
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            Editar Orden de Compra
        </h3>
    </div>
    <div class="panel-body">
        {{ Form::label('vendedor_id', 'Vendedor') }}
        {{ Form::select('vendedor_id', $vendedores, $orden_compra_proveedor->vendedor_id, array('class'=>'form-control')) }}
        {{ Form::label('proveedor_id', 'Empresa') }}
        {{ Form::select('proveedor_id', $proveedores, $orden_compra_proveedor->proveedor_id, array('class'=>'form-control')) }}
        {{ Form::label('fecha_entrega', 'Fecha de Entrega') }}
        {{ Form::text('fecha_entrega', $orden_compra_proveedor->fecha_entrega, array('class'=>'form-control')) }}
    </div>
    <div class="panel-footer">
        <a href="{{ URL::previous() }}" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Volver</a>
        <button type="submit" class="btn btn-primary pull-right">Guardar Cambios <i class="fa fa-save"></i></button>
    </div>
</div>
{{ Form::close() }}

@stop
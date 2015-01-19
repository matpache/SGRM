@extends('layout')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a href="#dlgNewCotización" data-toggle='modal' class="btn btn-xs btn-default pull-right">Nuevo <i class="fa fa-plus"></i></a>
            Facturas Compra
        </h3>
    </div>
    <div class="panel-body">
        <table class="table">
            <thead>
            <tr>
                <th>Rut Vendedor</th>
                <th>Rut Empresa</th>
                <th>Fecha Emisión</th>
                <th>Estado</th>
                <th>Observacion</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($facturas_compra as $factura_compra)
            <tr>
                <td>{{ $factura_compra->vendedor->rut }}</td>
                <td>{{ $factura_compra->proveedor->rut }}</td>                
                <td>{{ $factura_compra->fecha_emision }}</td>
                <td>{{ $factura_compra->estado->nombre }}</td>
                <td>{{ $factura_compra->observacion }}</td>
                <td>
                    <a class="btn btn-xs btn-default" href="{{ action('SGRM\FacturasCompraController@getEdit', array($factura_compra->id)) }}"><i class="fa fa-edit"></i> Editar</a>
                    <a class="btn btn-xs btn-default" href="{{ action('SGRM\FacturasCompraController@getCard', array($factura_compra->id)) }}"><i class="fa fa-eye"></i> Ver Ficha</a>
                    @if($factura_compra->status=='Activo')
                        <a href="{{ action('SGRM\FacturasCompraController@getDesactive', array($factura_compra->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Desactivar</a>
                    @else
                        <a href="{{ action('SGRM\FacturasCompraController@getActive', array($factura_compra->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-check"></i> Activar</a>
                    @endif
                    {{-- <a class="btn btn-xs btn-default" href="{{ action('SGRM\DetalleFacturasCompraController@getIndex', array($factura_compra->id)) }}"><i class="fa fa-plus"></i> Detalles</a> --}}
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="dlgNewCotización" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        {{ Form::open(array('action'=>'SGRM\FacturasCompraController@postCreate')) }}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Nueva Factura Compra</h4>
            </div>
            <div class="modal-body">
                {{ Form::label('nota_venta_id', 'Nota de Venta') }}
                {{ Form::select('nota_venta_id', $notas_venta, '', array('class'=>'form-control')) }}
                {{ Form::label('vendedor_id', 'Vendedor') }}
                {{ Form::select('vendedor_id', $vendedores, '', array('class'=>'form-control')) }}
                {{ Form::label('proveedor_id', 'Proveedor') }}
                {{ Form::select('proveedor_id', $proveedores, '', array('class'=>'form-control')) }}
                {{ Form::label('estado_id', 'Estados') }}
                {{ Form::select('estado_id', $estados, '', array('class'=>'form-control')) }}
                {{ Form::label('observacion', 'Observación') }}
                {{ Form::textarea('observacion', '', array('class'=>'form-control')) }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar <i class="fa fa-times"></i></button>
                <button type="submit" class="btn btn-primary">Crear <i class="fa fa-save"></i></button>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>

@stop
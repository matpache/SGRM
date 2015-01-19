@extends('layout')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a href="#dlgNewCotización" data-toggle='modal' class="btn btn-xs btn-default pull-right">Nuevo <i class="fa fa-plus"></i></a>
            Facturas Venta
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
            @foreach($facturas_venta as $factura_venta)
            <tr>
                <td>{{ $factura_venta->vendedor->rut }}</td>
                <td>{{ $factura_venta->cliente->rut }}</td>                
                <td>{{ $factura_venta->fecha_emision }}</td>
                <td>{{ $factura_venta->estado->nombre }}</td>
                <td>{{ $factura_venta->observacion }}</td>
                <td>
                    <a class="btn btn-xs btn-default" href="{{ action('SGRM\FacturasVentaController@getEdit', array($factura_venta->id)) }}"><i class="fa fa-edit"></i> Editar</a>
                    <a class="btn btn-xs btn-default" href="{{ action('SGRM\FacturasVentaController@getCard', array($factura_venta->id)) }}"><i class="fa fa-eye"></i> Ver Ficha</a>
                    @if($factura_venta->status=='Activo')
                        <a href="{{ action('SGRM\FacturasVentaController@getDesactive', array($factura_venta->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Desactivar</a>
                    @else
                        <a href="{{ action('SGRM\FacturasVentaController@getActive', array($factura_venta->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-check"></i> Activar</a>
                    @endif
                    {{-- <a class="btn btn-xs btn-default" href="{{ action('SGRM\DetalleFacturasVentaController@getIndex', array($factura_venta->id)) }}"><i class="fa fa-plus"></i> Detalles</a> --}}
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="dlgNewCotización" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        {{ Form::open(array('action'=>'SGRM\FacturasVentaController@postCreate')) }}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Nueva Factura Venta</h4>
            </div>
            <div class="modal-body">
                {{ Form::label('nota_venta_id', 'Nota de Venta') }}
                {{ Form::select('nota_venta_id', $notas_venta, '', array('class'=>'form-control')) }}
                {{ Form::label('vendedor_id', 'Vendedor') }}
                {{ Form::select('vendedor_id', $vendedores, '', array('class'=>'form-control')) }}
                {{ Form::label('cliente_id', 'Proveedor') }}
                {{ Form::select('cliente_id', $clientes, '', array('class'=>'form-control')) }}
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
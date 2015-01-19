@extends('layout')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a href="#dlgNewCotización" data-toggle='modal' class="btn btn-xs btn-default pull-right">Nuevo <i class="fa fa-plus"></i></a>
            Notas de Venta
        </h3>
    </div>
    <div class="panel-body">
        <table class="table">
            <thead>
            <tr>
                <th>Número Orden Compra</th>
                <th>Rut Vendedor</th>
                <th>Rut Cliente</th>
                <th>Fecha Emisión</th>
                <th>Fecha Entrega</th>
                <th>Observacion</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($notas_venta as $nota_venta)
            <tr>
                <td>{{ $nota_venta->orden_compra_id }}</td>
                <td>{{ $nota_venta->vendedor->rut }}</td>
                <td>{{ $nota_venta->cliente->rut }}</td>
                <td>{{ $nota_venta->fecha_emision }}</td>
                <td>{{ $nota_venta->fecha_entrega_real }}</td>
                <td>{{ $nota_venta->observacion }}</td>
                <td>
                    <a class="btn btn-xs btn-default" href="{{ action('SGRM\NotasVentaController@getEdit', array($nota_venta->id)) }}"><i class="fa fa-edit"></i> Editar</a>
                    <a class="btn btn-xs btn-default" href="{{ action('SGRM\NotasVentaController@getCard', array($nota_venta->id)) }}"><i class="fa fa-eye"></i> Ver Ficha</a>
                    @if($nota_venta->status=='Activo')
                        <a href="{{ action('SGRM\NotasVentaController@getDesactive', array($nota_venta->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Desactivar</a>
                    @else
                        <a href="{{ action('SGRM\NotasVentaController@getActive', array($nota_venta->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-check"></i> Activar</a>
                    @endif
                    {{-- <a class="btn btn-xs btn-default" href="{{ action('SGRM\DetalleNotasVentaController@getIndex', array($nota_venta->id)) }}"><i class="fa fa-plus"></i> Detalles</a> --}}
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="dlgNewCotización" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        {{ Form::open(array('action'=>'SGRM\NotasVentaController@postCreate')) }}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Nueva Nota de Venta</h4>
            </div>
            <div class="modal-body">
                {{ Form::label('orden_compra_id', 'Orden Compra') }}
                {{ Form::select('orden_compra_id', $ordenes_compra_cliente, '', array('class'=>'form-control')) }}
                {{ Form::label('vendedor_id', 'Vendedor') }}
                {{ Form::select('vendedor_id', $vendedores, '', array('class'=>'form-control')) }}
                {{ Form::label('cliente_id', 'Cliente') }}
                {{ Form::select('cliente_id', $clientes, '', array('class'=>'form-control')) }}
                {{ Form::label('fecha_entrega', 'Fecha de Entrega') }}
                {{ Form::text('fecha_entrega', '', array('class'=>'form-control')) }}
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
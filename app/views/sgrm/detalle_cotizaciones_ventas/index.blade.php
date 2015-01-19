@extends('layout')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <a href="#dlgNewCity" data-toggle='modal' class="btn btn-xs btn-default pull-right">Agregar <i class="fa fa-plus"></i></a>
        <h3 class="panel-title">Detalle</h3>
    </div>
    <div class="panel-body">
    </div>
        <table class="table">
        <thead>
        <tr>
            <th>Cantidad</th>
            <th>Código</th>
            <th>Nombre</th>
            <th>Precio Unitario</th>
            <th>Descuento</th>
            <th>Acción</th>
        </tr>
        </thead>
        <tbody>
        @foreach($detalle_cotizacion as $detalle)
                <tr>
            <td>{{ $detalle->cantidad }}</td>
            <td>{{ $detalle->producto ? $detalle->producto->codigo : '' }}</td>
            <td>{{ $detalle->producto ? $detalle->producto->nombre : '' }}</td>
            <td>{{ $detalle->precio_unitario }}</td>
            <td>{{ $detalle->descuento }}</td>
                    <td>
                <a href="{{ action('SGRM\DetalleCotizacionesVentasController@getDelete', array($detalle->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Eliminar</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>   
        <div class="panel-footer">
        <a href="{{ URL::previous() }}" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Volver</a>
    </div>

    <div class="modal fade" id="dlgNewCity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            {{ Form::open(array('action'=> array('SGRM\DetalleCotizacionesVentasController@postAdd', $cotizacion_venta_id))) }}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Agregar Detalle</h4>
                </div>
                <div class="modal-body">
                    {{ Form::label('producto_id', 'Productos') }}
                    {{ Form::select('producto_id', $productos_disponibles, '' , array('class'=>'form-control')) }}
                    {{ Form::label('cantidad', 'Cantidad') }}
                    {{ Form::text('cantidad','' , array('class'=>'form-control')) }}
                    {{ Form::label('precio_unitario', 'Precio') }}
                    {{ Form::text('precio_unitario','' , array('class'=>'form-control')) }}
                    {{ Form::label('descuento', 'Descuento') }}
                    {{ Form::text('descuento','' , array('class'=>'form-control')) }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar <i class="fa fa-times"></i></button>
                    <button type="submit" class="btn btn-primary">Crear <i class="fa fa-save"></i></button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

@stop
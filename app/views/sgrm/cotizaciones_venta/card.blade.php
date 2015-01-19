@extends('layout')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
           Cotización Venta N° {{$cotizacion_venta->numero}}
        </h3>
    </div>
    <div class="panel-body row">
        <div class="form-group col-md-3">
            <label>Fecha de Emisión</label>
            <p class="help-block">{{ $cotizacion_venta->fecha_emision }}</p>
            <label>Fecha de Entrega</label>
            <p class="help-block">{{ $cotizacion_venta->fecha_entrega }}</p>
        </div>
        <div class="col-md-9">
            <table class="table">
                <thead>
                {{ Form::label('', 'Detalle') }}<hr>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Descuento</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cotizacion_venta->detalles()->get() as $detalle)
                <tr>
                    <td>{{ $detalle->producto->codigo }}</td>
                    <td>{{ $detalle->producto->nombre }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                    <td>{{ $detalle->precio_unitario }}</td>
                    <td>{{ $detalle->descuento }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="panel-footer">
        <a href="{{ URL::previous() }}" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Volver</a>
    </div>
</div>

@stop
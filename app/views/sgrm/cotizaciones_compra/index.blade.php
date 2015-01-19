@extends('layout')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a href="#dlgNewCotización" data-toggle='modal' class="btn btn-xs btn-default pull-right">Nuevo <i class="fa fa-plus"></i></a>
            <ul id="statusTab" class="nav nav-pills" role="tablist">
                <li class="active"><a href="#activos" role="tab" data-toggle="tab">Cotizaciones Compras Activos</a></li>
                <li><a href="#inactivos" role="tab" data-toggle="tab">Cotizaciones Compras Inactivos</a></li>
            </ul>
        </h3>
    </div>
    <div class="panel-body">
    </div>
    <div class="tab-content">
        <div class="tab-pane active" id="activos">
            <table class="table">
                <thead>
                <tr>
                    <th>Numero</th>
                    <th>Fecha Emisión</th>
                    <th>Fecha Entrega</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cotizaciones_compra_act as $cotizacion_compra_act)
                <tr>
                    <td>{{ $cotizacion_compra_act->numero }}</td>
                    <td>{{ $cotizacion_compra_act->fecha_emision }}</td>
                    <td>{{ $cotizacion_compra_act->fecha_entrega }}</td>
                    <td>
                        <a class="btn btn-xs btn-default" href="{{ action('SGRM\CotizacionesComprasController@getEdit', array($cotizacion_compra_act->id)) }}"><i class="fa fa-edit"></i> Editar</a>
                        <a class="btn btn-xs btn-default" href="{{ action('SGRM\CotizacionesComprasController@getCard', array($cotizacion_compra_act->id)) }}"><i class="fa fa-eye"></i> Ver Ficha</a>
                        @if($cotizacion_compra_act->status=='Activo')
                            <a href="{{ action('SGRM\CotizacionesComprasController@getDesactive', array($cotizacion_compra_act->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Desactivar</a>
                        @else
                            <a href="{{ action('SGRM\CotizacionesComprasController@getActive', array($cotizacion_compra_act->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-check"></i> Activar</a>
                        @endif
                        <a class="btn btn-xs btn-default" href="{{ action('SGRM\DetalleCotizacionesComprasController@getIndex', array($cotizacion_compra_act->id)) }}"><i class="fa fa-plus"></i> Detalles</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="inactivos">
            <table class="table">
                <thead>
                <tr>
                    <th>Numero</th>
                    <th>Fecha Emisión</th>
                    <th>Fecha Entrega</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cotizaciones_compra_inact as $cotizacion_compra_inact)
                <tr>
                    <td>{{ $cotizacion_compra_inact->numero }}</td>
                    <td>{{ $cotizacion_compra_inact->fecha_emision }}</td>
                    <td>{{ $cotizacion_compra_inact->fecha_entrega }}</td>
                    <td>
                        <a class="btn btn-xs btn-default" href="{{ action('SGRM\CotizacionesComprasController@getEdit', array($cotizacion_compra_inact->id)) }}"><i class="fa fa-edit"></i> Editar</a>
                        <a class="btn btn-xs btn-default" href="{{ action('SGRM\CotizacionesComprasController@getCard', array($cotizacion_compra_inact->id)) }}"><i class="fa fa-eye"></i> Ver Ficha</a>
                        @if($cotizacion_compra_inact->status=='Activo')
                            <a href="{{ action('SGRM\CotizacionesComprasController@getDesactive', array($cotizacion_compra_inact->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Desactivar</a>
                        @else
                            <a href="{{ action('SGRM\CotizacionesComprasController@getActive', array($cotizacion_compra_inact->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-check"></i> Activar</a>
                        @endif
                        <a class="btn btn-xs btn-default" href="{{ action('SGRM\DetalleCotizacionesComprasController@getIndex', array($cotizacion_compra_inact->id)) }}"><i class="fa fa-plus"></i> Detalles</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="dlgNewCotización" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        {{ Form::open(array('action'=>'SGRM\CotizacionesComprasController@postCreate')) }}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Nueva Cotización</h4>
            </div>
            <div class="modal-body">
                {{ Form::label('numero', 'Número') }}
                {{ Form::text('numero', '', array('class'=>'form-control')) }}
                {{ Form::label('fecha_entrega', 'Fecha de Entrega') }}
                {{ Form::text('fecha_entrega', '', array('class'=>'form-control')) }}
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
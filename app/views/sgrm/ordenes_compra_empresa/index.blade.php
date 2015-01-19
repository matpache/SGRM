@extends('layout')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a href="#dlgNewCotización" data-toggle='modal' class="btn btn-xs btn-default pull-right">Nuevo <i class="fa fa-plus"></i></a>
            <ul id="statusTab" class="nav nav-pills" role="tablist">
                <li class="active"><a href="#activos" role="tab" data-toggle="tab">Ordenes de Compra Empresas Activos</a></li>
                <li><a href="#inactivos" role="tab" data-toggle="tab">Ordenes de Compra Empresas Inactivos</a></li>
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
                    <th>Número Cotización</th>
                    <th>Rut Vendedor</th>
                    <th>Rut Empresa</th>
                    <th>Fecha Emisión</th>
                    <th>Fecha Entrega</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ordenes_compra_proveedor_act as $orden_compra_proveedor_act)
                <tr>
                    <td>{{ $orden_compra_proveedor_act->cotizacion->numero }}</td>
                    <td>{{ $orden_compra_proveedor_act->vendedor->rut }}</td>
                    <td>{{ $orden_compra_proveedor_act->proveedor->rut }}</td>
                    <td>{{ $orden_compra_proveedor_act->fecha_emision }}</td>
                    <td>{{ $orden_compra_proveedor_act->fecha_entrega }}</td>
                    <td>
                        <a class="btn btn-xs btn-default" href="{{ action('SGRM\OrdenesCompraProveedorController@getEdit', array($orden_compra_proveedor_act->id)) }}"><i class="fa fa-edit"></i> Editar</a>
                        <a class="btn btn-xs btn-default" href="{{ action('SGRM\OrdenesCompraProveedorController@getCard', array($orden_compra_proveedor_act->id)) }}"><i class="fa fa-eye"></i> Ver Ficha</a>
                        @if($orden_compra_proveedor_act->status=='Activo')
                            <a href="{{ action('SGRM\OrdenesCompraProveedorController@getDesactive', array($orden_compra_proveedor_act->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Desactivar</a>
                        @else
                            <a href="{{ action('SGRM\OrdenesCompraProveedorController@getActive', array($orden_compra_proveedor_act->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-check"></i> Activar</a>
                        @endif
                        {{-- <a class="btn btn-xs btn-default" href="{{ action('SGRM\DetalleOrdenesCompraProveedorController@getIndex', array($orden_compra_proveedor_act->id)) }}"><i class="fa fa-plus"></i> Detalles</a> --}}
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
                    <th>Número Cotización</th>
                    <th>Rut Vendedor</th>
                    <th>Rut Empresa</th>
                    <th>Fecha Emisión</th>
                    <th>Fecha Entrega</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ordenes_compra_proveedor_inact as $orden_compra_proveedor_inact)
                <tr>
                    <td>{{ $orden_compra_proveedor_inact->cotizacion->numero }}</td>
                    <td>{{ $orden_compra_proveedor_inact->vendedor->rut }}</td>
                    <td>{{ $orden_compra_proveedor_inact->proveedor->rut }}</td>
                    <td>{{ $orden_compra_proveedor_inact->fecha_emision }}</td>
                    <td>{{ $orden_compra_proveedor_inact->fecha_entrega }}</td>
                    <td>
                        <a class="btn btn-xs btn-default" href="{{ action('SGRM\OrdenesCompraProveedorController@getEdit', array($orden_compra_proveedor_inact->id)) }}"><i class="fa fa-edit"></i> Editar</a>
                        <a class="btn btn-xs btn-default" href="{{ action('SGRM\OrdenesCompraProveedorController@getCard', array($orden_compra_proveedor_inact->id)) }}"><i class="fa fa-eye"></i> Ver Ficha</a>
                        @if($orden_compra_proveedor_inact->status=='Activo')
                            <a href="{{ action('SGRM\OrdenesCompraProveedorController@getDesactive', array($orden_compra_proveedor_inact->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Desactivar</a>
                        @else
                            <a href="{{ action('SGRM\OrdenesCompraProveedorController@getActive', array($orden_compra_proveedor_inact->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-check"></i> Activar</a>
                        @endif
                        {{-- <a class="btn btn-xs btn-default" href="{{ action('SGRM\DetalleOrdenesCompraProveedorController@getIndex', array($orden_compra_proveedor_inact->id)) }}"><i class="fa fa-plus"></i> Detalles</a> --}}
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
        {{ Form::open(array('action'=>'SGRM\OrdenesCompraProveedorController@postCreate')) }}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Nueva Orden de Compra</h4>
            </div>
            <div class="modal-body">
                {{ Form::label('cotizacion_id', 'Cotización') }}
                {{ Form::select('cotizacion_id', $cotizaciones_compra, '', array('class'=>'form-control')) }}
                {{ Form::label('vendedor_id', 'Vendedor') }}
                {{ Form::select('vendedor_id', $vendedores, '', array('class'=>'form-control')) }}
                {{ Form::label('proveedor_id', 'Rut Empresa') }}
                {{ Form::select('proveedor_id', $proveedores, '', array('class'=>'form-control')) }}
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
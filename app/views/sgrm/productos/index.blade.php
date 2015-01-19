@extends('layout')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <a href="#dlgNewProducto" data-toggle='modal' class="btn btn-xs btn-default pull-right">Nueva <i class="fa fa-plus"></i></a>
        <h3 class="panel-title">
            <ul id="statusTab" class="nav nav-pills" role="tablist">
                <li class="active"><a href="#activos" role="tab" data-toggle="tab">Productos Activos</a></li>
                <li><a href="#inactivos" role="tab" data-toggle="tab">Productos Inactivos</a></li>
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
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Formato</th>
                    <th>Tipo de Producto</th>
                    <th>Precio Unitario Máximo Compra</th>
                    <th>Precio Unitario Minimo Venta</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($productos_act as $producto_act)
                <tr>
                    <td>{{ $producto_act->codigo }}</td>
                    <td>{{ $producto_act->nombre }}</td>
                    <td>{{ $producto_act->descripcion }}</td>
                    <td>{{ $producto_act->formato }}</td>
                    <td>{{ $producto_act->tipo_producto_id }}</td>
                    <td>{{ $producto_act->precio_maximo }}</td>
                    <td>{{ $producto_act->precio_minimo }}</td>
                    <td>
                        <a class="btn btn-xs btn-default" href="{{ action('SGRM\ProductosController@getEdit', array($producto_act->id)) }}"><i class="fa fa-edit"></i> Editar</a>
                        @if($producto_act->status=='Activo')
                        <a href="{{ action('SGRM\ProductosController@getDesactive', array($producto_act->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Desactivar</a>
                        @else
                        <a href="{{ action('SGRM\ProductosController@getActive', array($producto_act->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-check"></i> Activar</a>
                        @endif
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane inactive" id="inactivos">
            <table class="table">
                <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Formato</th>
                    <th>Tipo de Producto</th>
                    <th>Precio Unitario Máximo Compra</th>
                    <th>Precio Unitario Minimo Venta</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($productos_inact as $producto_inact)
                <tr>
                    <td>{{ $producto_inact->codigo }}</td>
                    <td>{{ $producto_inact->nombre }}</td>
                    <td>{{ $producto_inact->descripcion }}</td>
                    <td>{{ $producto_inact->formato }}</td>
                    <td>{{ $producto_inact->tipo_producto_id }}</td>
                    <td>{{ $producto_inact->precio_maximo }}</td>
                    <td>{{ $producto_inact->precio_minimo }}</td>
                    <td>
                        <a class="btn btn-xs btn-default" href="{{ action('SGRM\ProductosController@getEdit', array($producto_inact->id)) }}"><i class="fa fa-edit"></i> Editar</a>
                        @if($producto_inact->status=='Activo')
                        <a href="{{ action('SGRM\ProductosController@getDesactive', array($producto_inact->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Desactivar</a>
                        @else
                        <a href="{{ action('SGRM\ProductosController@getActive', array($producto_inact->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-check"></i> Activar</a>
                        @endif
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="panel-footer">
            <a href="{{ action('SGRM\ProductosController@getIndex', array()) }}" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Volver</a>
            <!-- <a href="{{ URL::previous() }}" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Volver</a> -->
        </div>
    </div>

    <div class="modal fade" id="dlgNewProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            {{ Form::open(array('action'=> array('SGRM\ProductosController@postCreate'))) }}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Nuevo Producto</h4>
                </div>
                <div class="modal-body">
                    {{ Form::label('codigo', 'Código') }}
                    {{ Form::text('codigo', '', array('class'=>'form-control', 'required'=>true)) }}
                    {{ Form::label('nombre', 'Nombre') }}
                    {{ Form::text('nombre', '', array('class'=>'form-control', 'required'=>true)) }}
                    {{ Form::label('descripcion', 'Descripción') }}
                    {{ Form::textarea('descripcion', '', array('class'=>'form-control', 'required'=>true)) }}
                    {{ Form::label('formato', 'Formato') }}
                    {{ Form::text('formato', '', array('class'=>'form-control')) }}
                    {{ Form::label('tipo_producto', 'Tipo de Producto') }}
                    {{ Form::select('tipo_producto', $tipos_producto, '', array('class'=>'form-control')) }}
                    {{ Form::label('precio_maximo', 'Precio Unitario Máximo Compra') }}
                    {{ Form::text('precio_maximo', '', array('class'=>'form-control')) }}
                    {{ Form::label('precio_minimo', 'Precio Unitario Minimo Venta') }}
                    {{ Form::text('precio_minimo', '', array('class'=>'form-control')) }}
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
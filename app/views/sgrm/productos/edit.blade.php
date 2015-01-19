@extends('layout')
@section('content')

{{ Form::open(array('action'=>'SGRM\ProductosController@postEdit')) }}
{{ Form::hidden('id', $producto->id) }}
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            Editar Producto {{ $producto->descripcion }}
        </h3>
    </div>
    <div class="panel-body">
        {{ Form::label('codigo', 'Código') }}
        {{ Form::text('codigo', $producto->codigo, array('class'=>'form-control', 'required'=>true)) }}
        {{ Form::label('nombre', 'Nombre') }}
        {{ Form::text('nombre', $producto->nombre, array('class'=>'form-control', 'required'=>true)) }}
        {{ Form::label('descripcion', 'Descripción') }}
        {{ Form::textarea('descripcion', $producto->descripcion, array('class'=>'form-control', 'required'=>true)) }}
        {{ Form::label('formato', 'Formato') }}
        {{ Form::text('formato', $producto->formato, array('class'=>'form-control')) }}
        {{ Form::label('tipo_producto', 'Tipo de Producto') }}
        {{ Form::select('tipo_producto', $tipos_producto, $producto->tipo_producto, array('class'=>'form-control')) }}
        {{ Form::label('precio_maximo', 'Precio Unitario Máximo Compra') }}
        {{ Form::text('precio_maximo', $producto->precio_maximo, array('class'=>'form-control')) }}
        {{ Form::label('precio_minimo', 'Precio Unitario Minimo Venta') }}
        {{ Form::text('precio_minimo', $producto->precio_minimo, array('class'=>'form-control')) }}
    </div>
    <div class="panel-footer">
        <a href="{{ URL::previous() }}" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Volver</a>
        <button type="submit" class="btn btn-primary pull-right">Guardar Cambios <i class="fa fa-save"></i></button>
    </div>
</div>
{{ Form::close() }}

@stop
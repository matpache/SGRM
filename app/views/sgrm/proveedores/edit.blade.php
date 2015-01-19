@extends('layout')
@section('content')

{{ Form::open(array('action'=>'SGRM\ProveedorController@postEdit')) }}
{{ Form::hidden('proveedor_id', $proveedor->id) }}
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            Editar Proveedor {{ $proveedor->nombre }}
        </h3>
    </div>
    <div class="panel-body">
        {{ Form::label('nombre', 'Nombre') }}
        {{ Form::text('nombre', $proveedor->nombre, array('class'=>'form-control')) }}
        <div class="row">
            <div class="col-md-4">
                {{ Form::label('rut', 'Rut') }}
                {{ Form::text('rut', $proveedor->rut, array('class'=>'form-control')) }}
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <a href="{{ URL::previous() }}" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Volver</a>
        <button type="submit" class="btn btn-primary pull-right">Guardar Cambios <i class="fa fa-save"></i></button>
    </div>
</div>
{{ Form::close() }}

@stop
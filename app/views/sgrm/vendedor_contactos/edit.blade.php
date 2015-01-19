@extends('layout')
@section('content')

{{ Form::open(array('action'=>'SGRM\ProveedorContactosController@postEdit')) }}
{{ Form::hidden('id', $proveedor_contacto->id) }}
{{ Form::hidden('rut', $proveedor_contacto->rut) }}
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            Editar Contacto
        </h3>
    </div>
    <div class="panel-body">
        {{ Form::label('contacto', 'Contacto') }}
        {{ Form::text('contacto', $proveedor_contacto->contacto, array('class'=>'form-control')) }}
    </div>
    <div class="panel-footer">
        <a href="{{ URL::previous() }}" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Volver</a>
        <button type="submit" class="btn btn-primary pull-right">Guardar Cambios <i class="fa fa-save"></i></button>
    </div>
</div>
{{ Form::close() }}

@stop
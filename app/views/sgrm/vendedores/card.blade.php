@extends('layout')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            Ficha del Vendedor
        </h3>
    </div>
    <div class="panel-body row">
        <div class="form-group col-md-3">
            {{ Form::label('', 'Rut') }}
            <p class="help-block">{{ $vendedor->rut }}</p>
            {{ Form::label('', 'Nombre') }}
            <p class="help-block">{{ $vendedor->nombre }}</p>
        </div>
        <div class="col-md-6">
            <table class="table">
                <thead>
                <tr>
                    <th>Contacto</th>
                </tr>
                </thead>
                <tbody>
                @foreach($vendedor->contactos()->get() as $contacto)
                <tr>
                    <td>{{ $contacto->contacto }}</td>
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
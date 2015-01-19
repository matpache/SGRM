@extends('layout')
@section('content')




        {{ Form::open(array('action'=>'SGRM\RankingClientesController@postUpdate')) }}
        {{ Form::hidden('id', $ponderacion->id) }}
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Actualizar cálculo de ponderación Ranking Clientes
                </h3>
            </div>
            <div class="panel-body">
                {{ Form::label('condicion_1', 'Total de Compras') }}
                {{ Form::select('condicion_1', $escala , $ponderacion->condicion_1, array('class'=>'form-control')) }}
                {{ Form::label('condicion_2', 'Total Dinero Compras') }}
                {{ Form::select('condicion_2', $escala , $ponderacion->condicion_2, array('class'=>'form-control')) }}
            </div>
            <div class="panel-footer">
                <a href="{{ URL::previous() }}" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Volver</a>
                <button type="submit" class="btn btn-primary pull-right">Guardar Cambios <i class="fa fa-save"></i></button>
            </div>
        </div>
        {{ Form::close() }}

    @stop
@extends('layout')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <a href="#dlgNewSpeciality" data-toggle='modal' class="btn btn-xs btn-default pull-right">Nueva <i class="fa fa-plus"></i></a>
        <h3 class="panel-title">
            <ul id="statusTab" class="nav nav-pills" role="tablist">
                <li class="active"><a href="#activos" role="tab" data-toggle="tab">Especialidades Activos</a></li>
                <li><a href="#inactivos" role="tab" data-toggle="tab">Especialidades Inactivos</a></li>
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
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($especialidades_act as $especialidad_act)
                <tr>
                    <td>{{ $especialidad_act->nombre }}</td>
                    <td>{{ $especialidad_act->descripcion }}</td>
                    <td>
                        <a class="btn btn-xs btn-default" href="{{ action('SGRM\EspecialidadesController@getEdit', array($especialidad_act->id)) }}"><i class="fa fa-edit"></i> Editar</a>
                        @if($especialidad_act->status=='Activo')
                        <a href="{{ action('SGRM\EspecialidadesController@getDesactive', array($especialidad_act->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Desactivar</a>
                        @else
                        <a href="{{ action('SGRM\EspecialidadesController@getActive', array($especialidad_act->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-check"></i> Activar</a>
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
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($especialidades_inact as $especialidad_inact)
                <tr>
                    <td>{{ $especialidad_inact->nombre }}</td>
                    <td>{{ $especialidad_inact->descripcion }}</td>
                    <td>
                        <a class="btn btn-xs btn-default" href="{{ action('SGRM\EspecialidadesController@getEdit', array($especialidad_inact->id)) }}"><i class="fa fa-edit"></i> Editar</a>
                        @if($especialidad_inact->status=='Activo')
                        <a href="{{ action('SGRM\EspecialidadesController@getDesactive', array($especialidad_inact->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Desactivar</a>
                        @else
                        <a href="{{ action('SGRM\EspecialidadesController@getActive', array($especialidad_inact->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-check"></i> Activar</a>
                        @endif
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="panel-footer">
            <a href="{{ action('SGRM\EspecialidadesController@getIndex', array()) }}" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Volver</a>
            <!-- <a href="{{ URL::previous() }}" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Volver</a> -->
        </div>
    </div>

    <div class="modal fade" id="dlgNewSpeciality" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            {{ Form::open(array('action'=> array('SGRM\EspecialidadesController@postCreate'))) }}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Nueva Especialidad</h4>
                </div>
                <div class="modal-body">
                    {{ Form::label('nombre', 'Nombre') }}
                    {{ Form::text('nombre', '', array('class'=>'form-control')) }}
                    {{ Form::label('descripcion', 'Descripción') }}
                    {{ Form::textarea('descripcion', '', array('class'=>'form-control')) }}
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
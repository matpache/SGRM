@extends('layout')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a href="#dlgNewContacto" data-toggle='modal' class="btn btn-xs btn-default pull-right">Nuevo <i class="fa fa-plus"></i></a>
            <ul id="statusTab" class="nav nav-pills" role="tablist">
                <li class="active"><a href="#activos" role="tab" data-toggle="tab">Contactos Activos</a></li>
                <li><a href="#inactivos" role="tab" data-toggle="tab">Contactos Inactivos</a></li>
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
                    <th>Rut</th>
                    <th>Nombre</th>
                    <th>Cargo</th>
                    <th>Teléfono Fijo</th>
                    <th>Teléfono Móvil</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contactos_act as $contacto_act)
                <tr>
                    <td>{{ ($contacto_act->rut) ? $contacto_act->rut : '' }}</td>
                    <td>{{ $contacto_act->nombre.' '.$contacto_act->paterno.' '.$contacto_act->materno }}</td>
                    <td>{{ $contacto_act->cargo }}</td>
                    <td>{{ $contacto_act->codigo_area.'-'.$contacto_act->telefono_fijo }}</td>
                    <td>{{ $contacto_act->codigo_area.'-'.$contacto_act->telefono_movil }}</td>
                    <td>
                        <a class="btn btn-xs btn-default" href="{{ action('SGRM\ContactosController@getEdit', array($contacto_act->id)) }}"><i class="fa fa-edit"></i> Editar</a>
                        @if($contacto_act->status=='Activo')
                            <a href="{{ action('SGRM\ContactosController@getDesactive', array($contacto_act->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Desactivar</a>
                        @else
                            <a href="{{ action('SGRM\ContactosController@getActive', array($contacto_act->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-check"></i> Activar</a>
                        @endif
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
                    <th>Rut</th>
                    <th>Nombre</th>
                    <th>Cargo</th>
                    <th>Teléfono Fijo</th>
                    <th>Teléfono Móvil</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contactos_inact as $contacto_inact)
                <tr>
                    <td>{{ ($contacto_inact->rut) ? $contacto_inact->rut : '' }}</td>
                    <td>{{ $contacto_inact->nombre.' '.$contacto_inact->paterno.' '.$contacto_inact->materno }}</td>
                    <td>{{ $contacto_inact->cargo }}</td>
                    <td>{{ $contacto_inact->codigo_area.'-'.$contacto_inact->telefono_fijo }}</td>
                    <td>{{ $contacto_inact->codigo_area.'-'.$contacto_inact->telefono_movil }}</td>
                    <td>
                        <a class="btn btn-xs btn-default" href="{{ action('SGRM\ContactosController@getEdit', array($contacto_inact->id)) }}"><i class="fa fa-edit"></i> Editar</a>
                        @if($contacto_inact->status=='Activo')
                            <a href="{{ action('SGRM\ContactosController@getDesactive', array($contacto_inact->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Desactivar</a>
                        @else
                            <a href="{{ action('SGRM\ContactosController@getActive', array($contacto_inact->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-check"></i> Activar</a>
                        @endif
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="dlgNewContacto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        {{ Form::open(array('action'=>'SGRM\ContactosController@postCreate')) }}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Nuevo Contacto</h4>
            </div>
            <div class="modal-body">
                {{ Form::label('nombre', 'Nombre') }}
                {{ Form::text('nombre', '', array('class'=>'form-control', 'required'=>true)) }}
                {{ Form::label('paterno', 'Apellido Paterno') }}
                {{ Form::text('paterno', '', array('class'=>'form-control', 'required'=>true)) }}
                {{ Form::label('materno', 'Apellido Materno') }}
                {{ Form::text('materno', '', array('class'=>'form-control', 'required'=>true)) }}
                {{ Form::label('rut', 'Rut') }}
                {{ Form::text('rut', '', array('class'=>'form-control', 'required'=>true)) }}
                {{ Form::label('sexo', 'Sexo') }}
                {{ Form::select('sexo', array('h' => 'Hombre', 'm' => 'Mujer'), '', array('class'=>'form-control', 'required'=>true)) }}
                {{ Form::label('cargo', 'Cargo') }}
                {{ Form::text('cargo', '', array('class'=>'form-control', 'required'=>true)) }}
                {{ Form::label('correo', 'Correo') }}
                {{ Form::text('correo', '', array('class'=>'form-control', 'required'=>true)) }}
                {{ Form::label('codigo_area', 'Código de Área') }}
                {{ Form::text('codigo_area', '', array('class'=>'form-control', 'required'=>true)) }}
                {{ Form::label('telefono_fijo', 'Teléfono Fijo') }}
                {{ Form::text('telefono_fijo', '', array('class'=>'form-control', 'required'=>true)) }}
                {{ Form::label('telefono_movil', 'Teléfono Móvil') }}
                {{ Form::text('telefono_movil', '', array('class'=>'form-control', 'required'=>true)) }}

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
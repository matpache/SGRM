@extends('layout')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a href="#dlgNewVendedor" data-toggle='modal' class="btn btn-xs btn-default pull-right">Nuevo <i class="fa fa-plus"></i></a>
            <ul id="statusTab" class="nav nav-pills" role="tablist">
                <li class="active"><a href="#activos" role="tab" data-toggle="tab">Vendedores Activos</a></li>
                <li><a href="#inactivos" role="tab" data-toggle="tab">Vendedores Inactivos</a></li>
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
                @foreach($vendedores_act as $vendedor_act)
                <tr>
                    <td>{{ ($vendedor_act->rut) ? $vendedor_act->rut : '' }}</td>
                    <td>{{ $vendedor_act->nombre.' '.$vendedor_act->paterno.' '.$vendedor_act->materno }}</td>
                    <td>{{ $vendedor_act->cargo }}</td>
                    <td>{{ $vendedor_act->codigo_area.'-'.$vendedor_act->telefono_fijo }}</td>
                    <td>{{ $vendedor_act->codigo_area.'-'.$vendedor_act->telefono_movil }}</td>
                    <td>
                        <a class="btn btn-xs btn-default" href="{{ action('SGRM\VendedoresController@getEdit', array($vendedor_act->id)) }}"><i class="fa fa-edit"></i> Editar</a>
                        @if($vendedor_act->status=='Activo')
                            <a href="{{ action('SGRM\VendedoresController@getDesactive', array($vendedor_act->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Desactivar</a>
                        @else
                            <a href="{{ action('SGRM\VendedoresController@getActive', array($vendedor_act->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-check"></i> Activar</a>
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
                @foreach($vendedores_inact as $vendedor_inact)
                <tr>
                    <td>{{ ($vendedor_inact->rut) ? $vendedor_inact->rut : '' }}</td>
                    <td>{{ $vendedor_inact->nombre.' '.$vendedor_inact->paterno.' '.$vendedor_inact->materno }}</td>
                    <td>{{ $vendedor_inact->cargo }}</td>
                    <td>{{ $vendedor_inact->codigo_area.'-'.$vendedor_inact->telefono_fijo }}</td>
                    <td>{{ $vendedor_inact->codigo_area.'-'.$vendedor_inact->telefono_movil }}</td>
                    <td>
                        <a class="btn btn-xs btn-default" href="{{ action('SGRM\VendedoresController@getEdit', array($vendedor_inact->id)) }}"><i class="fa fa-edit"></i> Editar</a>
                        @if($vendedor_inact->status=='Activo')
                            <a href="{{ action('SGRM\VendedoresController@getDesactive', array($vendedor_inact->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Desactivar</a>
                        @else
                            <a href="{{ action('SGRM\VendedoresController@getActive', array($vendedor_inact->id)) }}" class="btn btn-xs btn-default"><i class="fa fa-check"></i> Activar</a>
                        @endif
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="dlgNewVendedor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        {{ Form::open(array('action'=>'SGRM\VendedoresController@postCreate')) }}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Nuevo Vendedor</h4>
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
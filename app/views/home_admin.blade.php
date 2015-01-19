@extends('layout')
@section('content')

<p class="lead">Bienvenido al Sistema gestor de recursos para la Microempresa</p>
<hr>
<a data-toggle="collapse" data-target="#enrolled" style="cursor:pointer;">Facturas Pendientes({{ count($bills) }}) <i class="fa fa-arrow-down"></i></a>
<br><br>
<a data-toggle="collapse" data-target="#enrolled_2" style="cursor:pointer;">Cotizaciones Entrantes({{ count($cotizaciones) }}) <i class="fa fa-arrow-down"></i></a>
<br><br>
<div id="enrolled" class="collapse">
    <br><br>
    <table class="table">
        <thead>
        <tr>
            <th>Factura</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bills as $bill)
        <tr>
            <td>#{{ $bill->code }}</td>
            <td>
                <a class="btn btn-default btn-xs approved" href="#dlgApproved" data-toggle="modal" data-request="{{ $bill->id }}"><i class="fa fa-check"></i> Aprobar</a>
                <a class="btn btn-default btn-xs rejected" href="#dlgReject" data-toggle="modal" data-request="{{ $bill->id }}"><i class="fa fa-times"></i> Rechazar</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div id="enrolled_2" class="collapse">
    <table class="table">
        <thead>
        <tr>
            <th>Cotizaciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cotizaciones as $key => $cotizacion)
        <tr>
            <td>#{{ $key }}</td>
            <td>
                {{SGRM\Cliente::whereRut($cotizacion->cliente_rut)->pluck('nombre')}}
            </td>
            <td>
                <a class="btn btn-default btn-xs approved" href="#dlgApproved" data-toggle="modal" data-request="{{ $cotizacion->id }}"><i class="fa fa-search"></i> Revisar</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@stop
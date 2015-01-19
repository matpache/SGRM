<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema Gestor de Recursos para la Microempresa</title>
    <meta name="description" content="">
    <meta name="author" content="Sistema Gestor de Recursos para la Microempresa">

    <link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}">
    {{ HTML::style('assets/bootstrap/css/bootstrap.min.css') }}
    {{ HTML::style('assets/bootstrap/css/bootstrap-theme.min.css') }}
    {{ HTML::style('assets/font-awesome/css/font-awesome.min.css') }}
    {{ HTML::style('assets/datetimepicker/jquery.datetimepicker.css') }}
    {{ HTML::style('assets/datatables/css/jquery.dataTables.css') }}
    {{ HTML::style('assets/datatables/css/dataTables.bootstrap.css') }}
    {{ HTML::style('assets/select2/select2.css') }}
    {{ HTML::style('assets/select2/select2-bootstrap.css') }}
    {{ HTML::style('css/main.css') }}
</head>
<body>
<header class="well">
    <div class="row">
        <div class="col-md-3 brand">
            <a href="http://sgrm.loc:8891/">
                {{ HTML::image('img/sgrmLogo.png', 'LOGO SGRM', array('height'=>'80')) }}
            </a>
        </div>
        <div class="col-md-7">
            <br><br>
            <ul class="nav nav-pills pull-right">
                @include('partials.menu_admin')
            </ul>
        </div>
    </div>
</header>
<div class="container">
    @yield('content')
</div>

{{ HTML::script('assets/jquery-1.11.0.min.js') }}
{{ HTML::script('assets/jquery-ui/js/jquery-ui-1.10.4.custom.min.js') }}
{{ HTML::script('assets/bootstrap/js/bootstrap.min.js') }}
{{ HTML::script('assets/fullcalendar/fullcalendar.min.js') }}
{{ HTML::script('assets/select2/select2.min.js') }}
<script src="http://code.highcharts.com/highcharts.js"></script>
{{ HTML::script('assets/datetimepicker/jquery.datetimepicker.js') }}
{{ HTML::script('assets/datatables/js/jquery.dataTables.min.js') }}
{{ HTML::script('assets/datatables/js/dataTables.bootstrap.js') }}
{{ HTML::script('assets/jquery.numeric.js') }}
</body>
</html>
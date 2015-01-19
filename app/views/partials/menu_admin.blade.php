<li><a href="{{ action('SGRM\HomeController@getIndex') }}">Inicio</a></li>
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        Administración <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
        <li><a href=" ">Administradores</a></li>
        <li><a href="{{ action('SGRM\VendedoresController@getIndex') }}">Vendedores</a></li>
        <li class="divider"></li>
        <li><a href="{{ action('SGRM\ClientesController@getIndex') }}">Clientes</a></li>
        <li><a href="{{ action('SGRM\ProveedoresController@getIndex') }}">Proveedores</a></li>
        <li class="divider"></li>
        <li><a href="{{ action('SGRM\ContactosController@getIndex') }}">Contactos</a></li>
        <li class="divider"></li>
        <li><a href="{{ action('SGRM\EstadosController@getIndex') }}">Estados</a></li>
        <li><a href="{{ action('SGRM\EspecialidadesController@getIndex') }}">Especialidades</a></li>
        <li><a href="{{ action('SGRM\DocumentosPagoController@getIndex') }}">Documentos de Pago</a></li>
        <li><a href="{{ action('SGRM\CondicionesPagoController@getIndex') }}">Condiciones de Pago</a></li>
        <li class="divider"></li>
        <li><a href="{{ action('SGRM\ProductosController@getIndex') }}">Productos</a></li>
        <li><a href="{{ action('SGRM\TiposProductoController@getIndex') }}">Tipos de Producto</a></li>
    </ul>
</li>
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        Ventas <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
        <li><a href="{{ action('SGRM\CotizacionesComprasController@getIndex') }}">Adm. Cotizaciones Compra</a></li>
        <li><a href="{{ action('SGRM\CotizacionesVentasController@getIndex') }}">Adm. Cotizaciones Venta</a></li>
        <li class="divider"></li>
        <li><a href="{{ action('SGRM\OrdenesCompraClienteController@getIndex') }}">Adm. Ordenes de Compra Clientes</a></li>
        <li><a href="{{ action('SGRM\OrdenesCompraProveedorController@getIndex') }}">Adm. Ordenes de Compra Proveedores</a></li>
        <li class="divider"></li>
        <li><a href="{{ action('SGRM\NotasVentaController@getIndex') }}">Adm. Nota Venta</a></li>
        <li class="divider"></li>
        <li><a href="{{ action('SGRM\FacturasCompraController@getIndex') }}">Adm. Facturas Compras</a></li>
        <li><a href="{{ action('SGRM\FacturasVentaController@getIndex') }}">Adm. Facturas Ventas</a></li>
        <li class="divider"></li>
        <li><a href=" ">Facturas por cobrar</a></li>
        <li><a href=" ">Ingresar Factura</a></li>
        <li><a href=" ">Ingresar Producto</a></li>
    </ul>
</li>
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        Configurar <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
        <li><a href="{{ action('SGRM\RankingClientesController@getIndex') }}">Ranking Clientes</a></li>
    </ul>
</li>
<li><a href=" ">Informes</a></li>
<li><a href=" ">Salir</a></li>
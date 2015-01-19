<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Route::get('/', function() { return View::make('hello'); });

Route::get('/', array('uses' => 'SGRM\HomeController@getIndex'));

Route::controller('clientes', 'SGRM\ClientesController');
Route::controller('cliente_contactos', 'SGRM\ClienteContactosController');
Route::controller('proveedores', 'SGRM\ProveedoresController');
Route::controller('proveedor_contactos', 'SGRM\ProveedorContactosController');
Route::controller('vendedores', 'SGRM\VendedoresController');
Route::controller('vendedor_contactos', 'SGRM\VendedorContactosController');
Route::controller('estados', 'SGRM\EstadosController');
Route::controller('especialidades', 'SGRM\EspecialidadesController');
Route::controller('documentos_pago', 'SGRM\DocumentosPagoController');
Route::controller('condiciones_pago', 'SGRM\CondicionesPagoController');
Route::controller('productos', 'SGRM\ProductosController');
Route::controller('tipos_producto', 'SGRM\TiposProductoController');
Route::controller('ranking_clientes', 'SGRM\RankingClientesController');
Route::controller('contactos', 'SGRM\ContactosController');
Route::controller('cotizaciones_compra', 'SGRM\CotizacionesComprasController');
Route::controller('detalle_cotizacion_compra', 'SGRM\DetalleCotizacionesComprasController');
Route::controller('cotizaciones_venta', 'SGRM\CotizacionesVentasController');
Route::controller('detalle_cotizacion_venta', 'SGRM\DetalleCotizacionesVentasController');
Route::controller('orden_compra_cliente', 'SGRM\OrdenesCompraClienteController');
Route::controller('orden_compra_empresa', 'SGRM\OrdenesCompraProveedorController');
Route::controller('notas_venta', 'SGRM\NotasVentaController');
Route::controller('facturas_compra', 'SGRM\FacturasCompraController');
Route::controller('facturas_venta', 'SGRM\FacturasVentaController');
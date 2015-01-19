<?php
namespace SGRM;
use \Eloquent;

class OrdenCompraCliente extends Eloquent {
	protected $table = 'orden_compra_cliente';

    public function cotizacion(){return $this->belongsTo('SGRM\CotizacionVenta', 'cotizacion_id', 'id');}
    public function cliente(){return $this->belongsTo('SGRM\Cliente', 'cliente_id', 'id');}
    public function vendedor(){return $this->belongsTo('SGRM\Vendedor', 'vendedor_id', 'id');}

}
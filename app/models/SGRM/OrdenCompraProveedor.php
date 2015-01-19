<?php
namespace SGRM;
use \Eloquent;

class OrdenCompraProveedor extends Eloquent {
	protected $table = 'orden_compra_proveedor';

    public function cotizacion(){return $this->belongsTo('SGRM\CotizacionVenta', 'cotizacion_id', 'id');}
    public function proveedor(){return $this->belongsTo('SGRM\Proveedor', 'proveedor_id', 'id');}
    public function vendedor(){return $this->belongsTo('SGRM\Vendedor', 'vendedor_id', 'id');}

}
<?php
namespace SGRM;
use \Eloquent;

class DetalleProductoCotizacionCompra extends Eloquent {
	protected $table = 'detalleproductocotizacioncompra';

	public function producto(){return $this->belongsTo('SGRM\Producto', 'producto_id', 'id');}

}
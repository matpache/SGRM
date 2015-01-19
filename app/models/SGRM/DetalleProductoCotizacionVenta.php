<?php
namespace SGRM;
use \Eloquent;

class DetalleProductoCotizacionVenta extends Eloquent {
	protected $table = 'detalleproductocotizacionventa';

	public function producto(){return $this->belongsTo('SGRM\Producto', 'producto_id', 'id');}

}
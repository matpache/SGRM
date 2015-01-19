<?php
namespace SGRM;
use \Eloquent;

class CotizacionCompra extends Eloquent {
	protected $table = 'cotizacioncompra';
	public function detalles(){ return $this->hasMany('SGRM\DetalleProductoCotizacionCompra', 'cotizacion_id', 'id'); }

}
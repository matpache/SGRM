<?php
namespace SGRM;
use \Eloquent;

class CotizacionVenta extends Eloquent {
	protected $table = 'cotizacionventa';
	public function detalles(){ return $this->hasMany('SGRM\DetalleProductoCotizacionVenta', 'cotizacion_id', 'id'); }

}
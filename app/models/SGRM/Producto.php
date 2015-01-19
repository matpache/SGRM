<?php
namespace SGRM;
use \Eloquent;

class Producto extends Eloquent {
	protected $table = 'producto';

	public function tipo_producto(){return $this->belongsTo('SGRM\TipoProducto', 'codigoTipoProducto', 'id');}

}
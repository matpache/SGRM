<?php
namespace SGRM;
use \Eloquent;

class Proveedor extends Eloquent {
	protected $table = 'proveedor';

	public function contactos(){ return $this->hasMany('SGRM\ContactoProveedor', 'proveedor_id', 'id'); }

}
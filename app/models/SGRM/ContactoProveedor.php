<?php
namespace SGRM;
use \Eloquent;

class ContactoProveedor extends Eloquent {
	protected $table = 'contactoproveedor';

	public function proveedor(){return $this->belongsTo('SGRM\Proveedor', 'rut', 'rut');}

}
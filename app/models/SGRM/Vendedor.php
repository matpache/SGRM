<?php
namespace SGRM;
use \Eloquent;

class Vendedor extends Eloquent {
	protected $table = 'vendedor';

    public function contactos(){ return $this->hasMany('SGRM\ContactoVendedor', 'rut', 'rut'); }

}
<?php
namespace SGRM;
use \Eloquent;

class ContactoVendedor extends Eloquent {
	protected $table = 'contactovendedor';

    public function vendedor(){return $this->belongsTo('SGRM\Vendedor', 'rut', 'rut');}

}
<?php
namespace SGRM;
use \Eloquent;

class ContactoCliente extends Eloquent {
	protected $table = 'contactocliente';

    public function contacto(){return $this->belongsTo('SGRM\Contacto', 'contacto_id', 'id');}

}
<?php
namespace SGRM;
use \Eloquent;

class Cliente extends Eloquent {
	protected $table = 'cliente';

    public function contactos(){ return $this->hasMany('SGRM\ContactoCliente', 'cliente_id', 'id'); }
    public function ranking(){return $this->belongsTo('SGRM\RankingCliente', 'rut', 'cliente_rut');}

}
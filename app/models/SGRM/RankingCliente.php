<?php
namespace SGRM;
use \Eloquent;

class RankingCliente extends Eloquent {
	protected $table = 'rankingcliente';

    public function cliente(){return $this->belongsTo('SGRM\Cliente', 'rut', 'cliente_rut');}

}
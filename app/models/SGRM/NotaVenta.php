<?php
namespace SGRM;
use \Eloquent;

class NotaVenta extends Eloquent {
	protected $table = 'notaventa';

	public function orden_compra(){return $this->belongsTo('SGRM\OrdenCompraCliente', 'id', 'orden_compra_id');}
    public function cliente(){return $this->belongsTo('SGRM\Cliente', 'cliente_id', 'id');}
    public function vendedor(){return $this->belongsTo('SGRM\Vendedor', 'vendedor_id', 'id');}

}
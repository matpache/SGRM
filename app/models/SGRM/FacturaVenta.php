<?php
namespace SGRM;
use \Eloquent;

class FacturaVenta extends Eloquent {
	protected $table = 'facturaventa';

    public function nota_venta(){return $this->belongsTo('SGRM\NotaVenta', 'nota_venta_id', 'id');}
    public function cliente(){return $this->belongsTo('SGRM\Cliente', 'cliente_id', 'id');}
    public function vendedor(){return $this->belongsTo('SGRM\Vendedor', 'vendedor_id', 'id');}
    public function estado(){return $this->belongsTo('SGRM\Estado', 'estado_id', 'id');}

}
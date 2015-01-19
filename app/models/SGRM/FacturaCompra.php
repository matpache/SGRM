<?php
namespace SGRM;
use \Eloquent;

class FacturaCompra extends Eloquent {
	protected $table = 'facturacompra';

    public function nota_venta(){return $this->belongsTo('SGRM\NotaVenta', 'nota_venta_id', 'id');}
    public function proveedor(){return $this->belongsTo('SGRM\Proveedor', 'proveedor_id', 'id');}
    public function vendedor(){return $this->belongsTo('SGRM\Vendedor', 'vendedor_id', 'id');}
    public function estado(){return $this->belongsTo('SGRM\Estado', 'estado_id', 'id');}

}
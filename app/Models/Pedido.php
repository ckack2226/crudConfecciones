<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable =['cliente_id','fecha_del_pedido','fecha_del_entrega','descripcion_del_pedido','cantidad_del_pedido','Abonado','total_del_pedido','status'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;
    protected $fillable =['nombre_del_producto','descripcion','precio','cantidad_en_stock','product_image','status'];
}

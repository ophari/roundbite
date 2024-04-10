<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    protected $table = 'order_item';
    protected $primaryKey = 'order_item_id';
    protected $guarded = ['category_id', 'created_at', 'updated_at'];
}

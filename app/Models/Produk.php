<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $primaryKey = 'produk_id';
    protected $fillable = ['produk_name', 'deskripsi', 'price', 'category_id', 'image_url'];

    public $timestamps = false;
}

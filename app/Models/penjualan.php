<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penjualan extends Model
{
    protected $table = "penjualans";
    protected $primaryKey = "id";
    protected $fillable = ['id', 'product_name', 'quantity', 'price', 'sale_date', 'gambarJual'];

    

}
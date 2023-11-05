<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'category_id',
        'sub_category_id',
        'brand_id',
        'unit_id',
        'supplier_id',
        'product_image',
        'Product_code',
        'description',
        'buying_price',
        'selling_price',
        'sku',
        'qty',
        'status',
        
    ] ;
}

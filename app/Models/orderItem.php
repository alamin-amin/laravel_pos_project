<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderItem extends Model
{
    use HasFactory;
    // protected $fillable = ['palce_orders_id','products_id','product_name','qty'] ;
    protected $guarded = [];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class palceOrder extends Model
{
    use HasFactory;
   protected $fillable = ['product_id','order_customer_id','invoice_no','payment_type','total','sub_total','qty'] ;
    // protected $guarded = [];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}

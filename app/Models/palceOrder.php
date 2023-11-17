<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class palceOrder extends Model
{
    use HasFactory;
    // protected $fillable = ['customers_id','invoice_no','payment_type','total','sub_total'] ;
    protected $guarded = [];
}

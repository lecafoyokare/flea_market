<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_id',
        'item_img',
        'item_condition',
        'item_name',
        'item_brand',
        'item_description',
        'item_price',
        'sold'
    ];
}

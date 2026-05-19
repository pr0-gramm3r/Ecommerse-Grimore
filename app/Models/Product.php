<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'product_description',
        'product_keywords',
        'category_id',
        'season_id',
        'merchant_id',
        'product_image1',
        'product_image2',
        'product_image3',
        'product_image4',
        'product_price',
        'product_stock',
        'product_status',
    ];

    public function category(){
        
        return $this->belongsTo(Category::class);
    }
    public function season(){
        
        return $this->belongsTo(Season::class);
    }
}

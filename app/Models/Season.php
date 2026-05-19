<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $fillable = [
        'season_name'
        ];

        
    public function products(){

        return $this->hasMany(Product::class);
    }
}

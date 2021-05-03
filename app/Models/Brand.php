<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'id',
        'brand_name',
        'brand_image',
    ];
    public function setBrandImageAttribute($value){
        $this->attributes['brand_image'] = asset($value);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_desc',
        'price',
        'img',
    ];
    protected $with = ['category'];
    public function category()
    {
        //hasone, hasmany,belongsTo,belongsTomany
        return $this->belongsTo(category::class);
    }
}

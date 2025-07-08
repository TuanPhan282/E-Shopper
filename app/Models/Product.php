<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $fillable = ['name', 'description', 'price', 'id_category', 'id_brand', 'status', 'sale', 'company', 'images', 'detail', 'userId'];

    public $timestamps = true;
}

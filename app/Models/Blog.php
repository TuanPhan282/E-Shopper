<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';
    protected $fillable = ['id', 'title', 'image', 'description', 'content'];

    public $timestamps = true;
}

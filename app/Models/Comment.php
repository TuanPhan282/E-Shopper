<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $fillable = ['cmt', 'id_blog', 'id_user', 'avatar', 'name', 'level'];

    public $timestamps = true;
}

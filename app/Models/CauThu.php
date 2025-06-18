<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CauThu extends Model
{
    protected $table = 'cauthu';
    protected $fillable = ['name', 'phoneNumber', 'age'];

    public $timestamps = true;
}

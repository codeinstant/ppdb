<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persyaratan extends Model
{
    protected $table = 'persyaratan';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}

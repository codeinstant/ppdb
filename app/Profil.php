<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $table = 'profil';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}

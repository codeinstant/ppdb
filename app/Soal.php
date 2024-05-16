<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $table = 'soal_kuis';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class);
    }
}

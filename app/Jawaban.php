<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = 'jawaban_kuis';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function hasil_kuis()
    {
        return $this->hasMany(HasilKuis::class);
    }
    public function soal()
    {
        return $this->belongsTo(Soal::class);
    }
}

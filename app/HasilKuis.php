<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasilKuis extends Model
{
    protected $table = 'hasil_kuis';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function Jawaban()
    {
        return $this->belongsTo(Jawaban::class);
    }
    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    protected $table = 'pendaftar';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function penerimaan()
    {
        return $this->belongsTo(Penerimaan::class);
    }
    public function hasil_kuis()
    {
        return $this->hasMany(HasilKuis::class);
    }
}
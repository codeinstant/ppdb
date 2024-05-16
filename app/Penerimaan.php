<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penerimaan extends Model
{
    protected $table = 'penerimaan';
    protected $fillable = ['tahun_angkatan', 'gelombang', 'kuota', 'buka', 'tutup'];
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function pendaftar()
    {
        return $this->hasMany(Pendaftar::class);
    }
}

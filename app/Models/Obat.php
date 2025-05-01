<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obats';

    protected $fillable = [
        'nama_obat',
        'harga',
        'kemasan',
    ];

    public function detailPeriksa(){
        return $this->hasMany(Detail_periksa::class, 'id_obat');
    }
    public function periksas()
    {
        return $this->belongsToMany(Periksa::class, 'detail_periksas', 'id_obat', 'id_periksa')
                    ->withTimestamps();
    }
}

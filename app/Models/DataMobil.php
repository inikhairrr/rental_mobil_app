<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMobil extends Model
{
    use HasFactory;

    public $table = "data_mobil";

    protected $fillable = ['merek', 'model', 'nomor_plat', 'tarif_sewa', 'tersedia'];

    public function rentals()
    {
        return $this->hasMany(DataRental::class, 'mobil_id');
    }

}

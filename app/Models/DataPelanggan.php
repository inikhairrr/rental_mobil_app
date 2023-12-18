<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPelanggan extends Model
{
    use HasFactory;

    public $table = "data_pelanggan";

    protected $fillable = ['nama', 'alamat', 'nomor_telepon', 'nomor_sim'];
}

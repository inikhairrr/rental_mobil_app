<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataRental extends Model
{
    use HasFactory;

    public $table = "data_rental";

    protected $fillable = ['user_id', 'mobil_id', 'tanggal_mulai', 'tanggal_selesai', 'status'];
}

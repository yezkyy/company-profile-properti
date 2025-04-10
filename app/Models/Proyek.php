<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'lokasi', 'jumlah_unit', 'status', 'gambar'];

    public function units()
    {
        return $this->hasMany(Unit::class);
    }
}
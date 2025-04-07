<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = ['proyek_id', 'nama_unit', 'status'];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class);
    }
}

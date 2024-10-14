<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StuntingPengukuran extends Model
{
    use HasFactory;

    protected $table = 'stuntings_pengukuran';

    protected $guarded = [];

    public function stuntings()
    {
        return $this->hasOne(Stunting::class, 'NIK','STUNTINGS_ID');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnakAsuh extends Model
{
    use HasFactory;

    protected $table = 'anak_asuh';
    // protected $primaryKey = 'id';
    protected $guarded = [];
    // protected $fillable = [
    //     'BAPAKASUH_ID',
    //     'STUNTING_ID',
    // ];

    public function bapakasuh()
    {
        return $this->hasOne(BapakAsuh::class, 'id', 'BAPAKASUH_ID');
    }

    public function stunting()
    {
        return $this->hasOne(Stunting::class, 'id', 'STUNTING_ID');
    }

    


}

<?php

namespace App\Models;

use App\Models\StuntingPengukuran;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stunting extends Model
{
    use HasFactory;

    protected $table = 'stuntings';
    // protected $primaryKey = 'id';
    protected $guarded = [];

    public function bapakasuh()
    {
        return $this->hasOne(BapakAsuh::class,'id','BAPAKASUH_ID');
    }

    public function kabupatenkota()
    {
        return $this->hasOne(Kabupatenkota::class,'ID','KABUPATENKOTA_ID');
    }

    public function kecamatan()
    {
        return $this->hasOne(Kecamatan::class,'ID','KECAMATAN_ID');
    }

    public function puskesmas()
    {
        return $this->hasOne(Puskesmas::class,'id','PUSKESMAS_ID');
    }

    public function kelurahandesa()
    {
        return $this->hasOne(Kelurahandesa::class,'ID','KELURAHANDESA_ID');
    }

    // public function posyandu()
    // {
    //     return $this->hasOne(Posyandu::class, 'id', 'POSYANDU_ID');
    // }

    public static function getCountStunting($kecamatan)
    {
        return Stunting::where('kecamatan')
            ->where('kelurahandesa')
            ->select(DB::raw('count(id) AS data'))
            ->get();
    }

    public function countBentukIntervensi()
    {
        return $this->intervensiBPAS()->count();
    }

    public function countBentukIntervensiSpesifikDanSensitif()
    {
        return $this->intervensiBPAS()->whereIn('JENIS_INTERVENSI', [1,2])->count();
    }

    public function intervensiBPAS()
    {
        return $this->hasMany(IntervensiBPAS::class, 'STUNTING_ID', 'id');
    }

    public function intervensiNonBPAS()
    {
        return $this->hasMany(IntervensiNonBPAS::class, 'STUNTING_ID', 'id');
    }

    public function stuntingPengukuran()
    {
        return $this->hasMany(StuntingPengukuran::class, 'NIK','STUNTINGS_ID');
    }

    // Teknik Standar/Biasa
    // public function totalBelumDiberiIntervensi()
    // {
    //     return $this->hasMany(IntervensiBPAS::class)->where('KONFIRMASI', 'N')->count() +
    //         $this->hasMany(IntervensiNonBPAS::class)->where('KONFIRMASI', 'N')->count();
    // }
    // app/Models/Stunting.php

    // Teknik Eager Loading
    // public function totalBelumDiberiIntervensi()
    // {
    //     $stunting = self::with(['intervensiBPAS', 'intervensiNonBPAS'])->get();
    //     $total = 0;
    //     foreach ($stunting as $stun) {
    //         $total += $stun->intervensiBPAS->where('KONFIRMASI', 'N')->count() +
    //                 $stun->intervensiNonBPAS->where('KONFIRMASI', 'N')->count();
    //     }
    //     return $total;
    // }

    // Teknik Caching metode statis
    public static function totalBelumDiberiIntervensi()
    {
        $key = 'total_belum_diberi_intervensi';
        $total = Cache::remember($key, 60, function () {
            $stunting = self::with(['intervensiBPAS', 'intervensiNonBPAS'])->get();
            $total = 0;
            foreach ($stunting as $stun) {
                $total += $stun->intervensiBPAS->where('KONFIRMASI', 'N')->count() +
                        $stun->intervensiNonBPAS->where('KONFIRMASI', 'N')->count();
            }
            return $total;
        });
        return $total;
    }

    // Teknik Caching metode non statis
    // public static function wisudaStuntings()
    // {
    //     $key = 'wisuda_stuntings';
    //     $wisudaStuntings = Cache::remember($key, 60, function () {
    //         return self::all();
    //     });
    //     return $wisudaStuntings;
    // }

    public static function wisudaStunting()
    {
        $wisudaStuntings = Stunting::whereRaw('TIMESTAMPDIFF(YEAR, TGL_LAHIR, CURDATE()) >= 5');

        return $wisudaStuntings;
    }

}

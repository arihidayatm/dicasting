<?php

namespace App\Http\Controllers;

use App\Models\Stunting;
use Illuminate\Http\Request;
use IcehouseVentures\LaravelChartjs\Facades\Chartjs;

class DashboardController extends Controller
{
    public function index()
    {
        $chartLineStunting = $this->showChartLineStunting();
        return view('pages.dashboard', compact('chartLineStunting'));
    }

    public static function showChartLineStunting()
    {
        $chartLineStunting = Chartjs::build()
            ->name("LineStuntingChart")
            ->type("line")
            ->options([
                'elements' => [
                    'line' => [
                        'tension' => 0
                    ]
                ]
            ])
            ->size(["width" => 500, "height" => 200])
            ->labels(["Januari", "Februari", "Maret", "April", "Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"])
            ->datasets([
                [
                    "label" => "Jumlah Kasus",
                    // "backgroundColor" => '#36A2EB',
                    "borderColor" => '#9BD0F5',
                    "borderWidth" => 2,
                    // "data" => [20,22,23,23,24,24,23,22,]
                    "data" => [0,0,0,0,0,0,201,197,197]
                ],
                [
                    "label" => "Kasus Aktif",
                    // "backgroundColor" => '#FF6384',
                    "borderColor" => '#FF6384',
                    "borderWidth" => 2,
                    // "data" => [20,22,24,22,23,20,20,19,20]
                    "data" => [0,0,0,0,0,0,201,197,197]
                ],
                [
                    "label" => "Penyelesaian",
                    // "backgroundColor" => '#4BC0C0',
                    "borderColor" => '#4BC0C0',
                    "borderWidth" => 2,
                    // "data" => [21,23,24,23,21,22,20,21,21]
                    "data" => [0,0,0,0,0,0,0,20,0]
                ]
            ])
            ->options([
                'plugins' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Total Stunting'
                    ]
                ]
            ]);

        return $chartLineStunting;
    }

    public static function showChartStuntingKecamatan()
    {
        $chartStuntingKecamatan = Chartjs::build()
            ->name("stuntingKecamatanChart")
            ->type("bar")
            ->size(["width" => 500, "height" => 200])
            ->labels(["SILUNGKANG","LEMBAH SEGAR","BARANGIN","TALAWI"])
            ->datasets([
                [
                    "label" => "Laki-laki",
                    "backgroundColor" => '#36A2EB',
                    "borderColor" => '#9BD0F5',
                    "borderWidth" => 2,
                    "data" => [19, 28, 42, 35]
                ],
                [
                    "label" => "Perempuan",
                    "backgroundColor" => '#FF6384',
                    "borderColor" => '#FFB1C1',
                    "borderWidth" => 2,
                    "data" => [14, 26, 19, 14]
                ]
            ])
            ->options([
                'plugins' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Total Stunting Berdasarkan Kecamatan'
                    ]
                ]
            ]);

        return $chartStuntingKecamatan;
    }

    public static function showChartPieSexRatio()
    {
        $maleCount = Stunting::where("JENIS_KELAMIN", "L")->count();
        $femaleCount = Stunting::where("JENIS_KELAMIN", "P")->count();

        $chartPieSexRatio = Chartjs::build()
            ->name("PieSexRatioChart")
            ->type("pie")
            ->size(["width" => 250, "height" => 220])
            ->labels(["Laki-laki","Perempuan"])
            ->datasets([
                [
                    "label" => "Stunting",
                    // "backgroundColor" => ["rgba(54, 162, 235, 0.2)", "rgba(255, 99, 132, 0.2)"],
                    "backgroundColor" => ['rgb(255, 99, 132)', 'rgb(54, 162, 235)'],
                    // "borderColor" => ["rgba(54, 162, 235, 1)", "rgba(255, 99, 132, 1)"],
                    "borderColor" => ['rgba(255,255,255)'],
                    "borderWidth" => 2,
                    "data" => [$maleCount, $femaleCount]
                ],
            ])
            ->options([
                'plugins' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Stunting Berdasarkan Jenis Kelamin'
                    ]
                ]
            ]);

        // return view('pages.charts.stunting', compact('chartSexRatio'));
        return $chartPieSexRatio;
    }
}

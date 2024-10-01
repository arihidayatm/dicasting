<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use IcehouseVentures\LaravelChartjs\Facades\Chartjs;

class DashboardController extends Controller
{
    public function index()
    {
        $chartLineStunting = $this->showChartLineStunting();
        return view('pages.dashboard', compact('chartLineStunting'));
    }

    private function showChartLineStunting()
    {
        $chartLineStunting = Chartjs::build()
            ->name("LineStuntingChart")
            ->type("line")
            ->size(["width" => 500, "height" => 195])
            ->labels(["Januari", "Februari", "Maret", "April", "Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"])
            ->datasets([
                [
                    "label" => "Stunting",
                    "backgroundColor" => '#36A2EB',
                    "borderColor" => '#9BD0F5',
                    "borderWidth" => 2,
                    "data" => [20,22,23,23,24,24,23,22,23]
                ],
                [
                    "label" => "Resiko Stunting",
                    "backgroundColor" => '#FF6384',
                    "borderColor" => '#FF6384',
                    "borderWidth" => 2,
                    "data" => [20,22,24,22,23,20,20,19,20]
                ],
                [
                    "label" => "Resiko Stunting",
                    "backgroundColor" => '#4BC0C0',
                    "borderColor" => '#4BC0C0',
                    "borderWidth" => 2,
                    "data" => [21,23,24,23,21,22,20,21,21]
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
}

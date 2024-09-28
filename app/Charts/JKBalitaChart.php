<?php

namespace App\Charts;

use marineusde\LarapexCharts\Charts\DonutChart AS OriginalDonutChart;

class JKBalitaChart
{
    public function build(): OriginalDonutChart
    {
        return (new OriginalDonutChart)
            ->setTitle('Top 3 scorers of the team.')
            ->setSubtitle('Season 2021.')
            ->addData([20, 24, 30])
            ->setLabels(['Player 7', 'Player 10', 'Player 9']);
    }
}

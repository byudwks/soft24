<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Software;


class SoftOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            stat::make('Software', Software::count())
                ->icon('heroicon-o-computer-desktop')
        ];
    }
}

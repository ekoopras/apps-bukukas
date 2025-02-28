<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Pendapatan;
use App\Models\Pengeluaran;
use Illuminate\Support\Number;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {

        $pendapatan = Pendapatan::sum('nominal');
        $pengeluaran = Pengeluaran::sum('nominal');

        $formatNumber = function (int $number): string {
            if ($number < 1000) {
                return (string) Number::format($number);
            }

            if ($number < 1000000) {
                return Number::format($number);
            }

            return Number::format($number);
        };

        return [
            Stat::make('SALDO', 'Rp. ' . $formatNumber($pendapatan - $pengeluaran)),
            Stat::make('TOTAL PENDAPATAN', 'Rp. ' . $formatNumber($pendapatan)),
            Stat::make('TOTAL PENGELUARAN', 'Rp. ' . $formatNumber($pengeluaran)),
        ];
    }
}

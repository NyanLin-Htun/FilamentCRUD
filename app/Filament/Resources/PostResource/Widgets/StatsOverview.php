<?php

namespace App\Filament\Resources\PostResource\Widgets;

use App\Models\Post;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('All Post', Post::all()->count())
            ->description('32k increase')
            ->descriptionIcon('heroicon-s-trending-up')
            ->color('success'),
            Card::make('Bounce rate', '21%')
            ->description('7% increase')
            ->descriptionIcon('heroicon-s-trending-down')
            ->color('danger'),
            Card::make('Average time on page', '3:12')
            ->description('3% increase')
            ->descriptionIcon('heroicon-s-trending-up')
            ->color('success'),
    ];

    }
}

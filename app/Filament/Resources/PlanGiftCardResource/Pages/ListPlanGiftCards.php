<?php

namespace App\Filament\Resources\PlanGiftCardResource\Pages;

use App\Filament\Resources\PlanGiftCardResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPlanGiftCards extends ListRecords
{
    protected static string $resource = PlanGiftCardResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

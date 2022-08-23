<?php

namespace App\Filament\Resources\PlanGiftCodeResource\Pages;

use App\Filament\Resources\PlanGiftCodeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPlanGiftCodes extends ListRecords
{
    protected static string $resource = PlanGiftCodeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

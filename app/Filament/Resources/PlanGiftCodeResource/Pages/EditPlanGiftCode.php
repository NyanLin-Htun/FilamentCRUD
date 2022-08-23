<?php

namespace App\Filament\Resources\PlanGiftCodeResource\Pages;

use App\Filament\Resources\PlanGiftCodeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPlanGiftCode extends EditRecord
{
    protected static string $resource = PlanGiftCodeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}

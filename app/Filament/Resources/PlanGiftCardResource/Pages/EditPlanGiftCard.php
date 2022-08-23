<?php

namespace App\Filament\Resources\PlanGiftCardResource\Pages;

use App\Filament\Resources\PlanGiftCardResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPlanGiftCard extends EditRecord
{
    protected static string $resource = PlanGiftCardResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}

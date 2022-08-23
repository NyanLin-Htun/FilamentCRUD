<?php

namespace App\Filament\Resources\BankBranchResource\Pages;

use App\Filament\Resources\BankBranchResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBankBranch extends ViewRecord
{
    protected static string $resource = BankBranchResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}

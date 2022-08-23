<?php

namespace App\Filament\Resources\BankBranchResource\Pages;

use App\Filament\Resources\BankBranchResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBankBranch extends EditRecord
{
    protected static string $resource = BankBranchResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

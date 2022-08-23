<?php

namespace App\Filament\Resources\BankBranchResource\Pages;

use App\Filament\Resources\BankBranchResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBankBranches extends ListRecords
{
    protected static string $resource = BankBranchResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

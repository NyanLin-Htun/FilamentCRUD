<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BankBranchResource\Pages;
use App\Filament\Resources\BankBranchResource\RelationManagers;
use App\Models\BankBranch;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BankBranchResource extends Resource
{
    protected static ?string $model = BankBranch::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Bank Information';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\TextInput::make('bank_id')
                    ->required(),
                    Forms\Components\TextInput::make('branch_name')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('branch_address')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('fax')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('remark')
                        ->maxLength(255),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('bank.bank_name'),
                Tables\Columns\TextColumn::make('branch_name'),
                Tables\Columns\TextColumn::make('branch_address'),
                Tables\Columns\TextColumn::make('fax'),
                Tables\Columns\TextColumn::make('remark'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBankBranches::route('/'),
            'create' => Pages\CreateBankBranch::route('/create'),
            'view' => Pages\ViewBankBranch::route('/{record}'),
            'edit' => Pages\EditBankBranch::route('/{record}/edit'),
        ];
    }    
}

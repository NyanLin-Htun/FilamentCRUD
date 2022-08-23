<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\Bank;
use App\Models\BankBranch;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Wizard::make([
                        Wizard\Step::make('Order')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    // ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('email')
                                    ->email()
                                    // ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('password')
                                    ->password()
                                    // ->required()
                                    ->maxLength(255),
                            ]),
                        Wizard\Step::make('Delivery')
                            ->schema([
                                Forms\Components\TextInput::make('phone_number')
                                    ->tel(),
                                    // ->required(),
                                Forms\Components\TextInput::make('address')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('photo')
                                    // ->required()
                                    ->maxLength(255),
                            ]),
                        Wizard\Step::make('Bank')
                            ->schema([
                                Select::make('bank_id')
                                    ->label('Bank')
                                    ->reactive()
                                    ->options(Bank::all()->pluck('bank_name','id')->toArray())
                                    ->afterStateUpdated(fn (callable $set) => $set('bank_branch_id',null))
                                    ->required(),
                                Select::make('bank_branch_id')
                                            ->label('Bank Branch')
                                            ->options(function (callable $get){
                                                $bank = Bank::find($get('bank_id'));
                                                if(!$bank) {
                                                    return BankBranch::all()->pluck('branch_name','id');
                                                }
                                                return $bank->bankbranches->pluck('branch_name','id');
                                            })
                                            ->reactive()
                                            ->required(),
                                TextInput::make('bank_account_no')
                                            ->label('Bank Account')
                                            ->required(),
                            ]),
                    ]),
                ]),
                Card::make()->schema([
                    Repeater::make('bank information')
                    ->label('Bank Information')
                    ->relationship('bankaccount')
                        ->schema([
                            Select::make('bank_id')
                                    ->label('Bank')
                                    ->reactive()
                                    ->options(Bank::all()->pluck('bank_name','id')->toArray())
                                    ->afterStateUpdated(fn (callable $set) => $set('bank_branch_id',null))
                                    ->required(),
                            Select::make('bank_branch_id')
                                        ->label('Bank Branch')
                                        ->options(function (callable $get){
                                            $bank = Bank::find($get('bank_id'));
                                            if(!$bank) {
                                                return BankBranch::all()->pluck('branch_name','id');
                                            }
                                            return $bank->bankbranches->pluck('branch_name','id');
                                        })
                                        ->reactive()
                                        ->required(),
                            TextInput::make('bank_account_no')
                                        ->label('Bank Account')
                                        ->required(),
                        ])
                        // ->disableItemCreation()
                        // ->disableItemDeletion()
                        // ->disableItemMovement()
                        ->columns(2)
                ])
            ]); 
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('phone_number'),
                Tables\Columns\TextColumn::make('address'),
                Tables\Columns\TextColumn::make('photo'),
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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'view' => Pages\ViewEmployee::route('/{record}'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }    
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RapportResource\Pages;
use App\Filament\Resources\RapportResource\RelationManagers;
use App\Models\Rapport;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RapportResource extends Resource
{
    protected static ?string $model = Rapport::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('titre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('direction_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('montant')
                    ->required()
                    ->numeric()
                    ->default(0.00),
                Forms\Components\TextInput::make('periode')
                    ->required(),
                Forms\Components\DatePicker::make('date_rapport')
                    ->required(),
                Forms\Components\TextInput::make('fichier_pdf')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Textarea::make('resume')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('titre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('direction_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('montant')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('periode'),
                Tables\Columns\TextColumn::make('date_rapport')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fichier_pdf')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListRapports::route('/'),
            'create' => Pages\CreateRapport::route('/create'),
            'edit' => Pages\EditRapport::route('/{record}/edit'),
        ];
    }
}

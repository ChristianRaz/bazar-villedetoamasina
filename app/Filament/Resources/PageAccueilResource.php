<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageAccueilResource\Pages;
use App\Filament\Resources\PageAccueilResource\RelationManagers;
use App\Models\PageAccueil;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PageAccueilResource extends Resource
{
    protected static ?string $model = PageAccueil::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListPageAccueils::route('/'),
            'create' => Pages\CreatePageAccueil::route('/create'),
            'edit' => Pages\EditPageAccueil::route('/{record}/edit'),
        ];
    }
}

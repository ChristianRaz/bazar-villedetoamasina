<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UrgenceResource\Pages;
use App\Models\Urgence;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;

class UrgenceResource extends Resource
{
    protected static ?string $model = Urgence::class;
    protected static ?string $navigationIcon = 'heroicon-o-exclamation-triangle';
    protected static ?string $navigationGroup = 'Services Citoyens';
    protected static ?string $navigationLabel = 'Pharmacies de Garde';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Infos Urgence')
                ->schema([
                    TextInput::make('titre')->required()->default('LES PHARMACIES DE GARDE'),
                    TextInput::make('sous_titre')->default('DE GARDE DE LA SEMAINE'),
                    DatePicker::make('date_fin')->label('Valable jusqu\'au'),
                    TextInput::make('source')->label('Source'),
                    Toggle::make('is_active')->label('Afficher sur le site')->default(true),
                ])->columns(2),

            Repeater::make('items')
                ->label('Liste des points')
                ->schema([
                    TextInput::make('nom')->required()->placeholder('AVENIR'),
                    TextInput::make('adresse')->required()->placeholder('MAJUNGA BE...'),
                    Repeater::make('tels')
                        ->label('Téléphones')
                        ->schema([TextInput::make('tel')->tel()])
                        ->minItems(1)->maxItems(3)->grid(2),
                ])
                ->collapsible()
                ->itemLabel(fn (array $state): ?string => $state['nom'] ?? null)
                ->grid(1),
        ]);
    }

    public static function table(Table $table): Table // <-- IL MANQUAIT ÇA
    {
        return $table
            ->columns([
                TextColumn::make('titre')->searchable()->sortable(),
                TextColumn::make('date_fin')->date('d/m/Y')->label('Valable jusqu\'au'),
                IconColumn::make('is_active')->boolean()->label('Actif'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array // <-- ET ÇA
    {
        return [
            'index' => Pages\ListUrgences::route('/'),
            'create' => Pages\CreateUrgence::route('/create'),
            'edit' => Pages\EditUrgence::route('/{record}/edit'),
        ];
    }
}

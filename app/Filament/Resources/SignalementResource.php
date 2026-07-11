<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SignalementResource\Pages;
use App\Models\Signalement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;

class SignalementResource extends Resource
{
    protected static ?string $model = Signalement::class;
    protected static ?string $navigationIcon = 'heroicon-o-megaphone';
    protected static ?string $navigationGroup = 'Services Citoyens';
    protected static ?string $navigationLabel = 'Signalements';
    protected static ?string $modelLabel = 'Signalement';
    protected static ?string $pluralModelLabel = 'Signalements';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Infos du Signalement')
                    ->schema([
                        Forms\Components\TextInput::make('titre')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('quartier')
                            ->required(),
                        Forms\Components\FileUpload::make('photo')
                            ->image()
                            ->directory('signalements'),
                    ])->columns(2),

                Forms\Components\Section::make('Traitement')
                    ->schema([
                        Forms\Components\Select::make('statut')
                            ->options([
                                'nouveau' => 'Nouveau',
                                'en_cours' => 'En Cours',
                                'traite' => 'Traité',
                            ])
                            ->default('nouveau')
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('photo')
                    ->circular(),
                TextColumn::make('titre')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('quartier')
                    ->searchable(),
                BadgeColumn::make('statut')
                    ->colors([
                        'danger' => ['nouveau', 'Nouveau'],
                        'warning' => ['en_cours', 'En cours', 'En Cours'],
                        'success' => ['traite', 'Traité', 'Traite'],
                    ])
                    ->formatStateUsing(fn (string $state): string => match (strtolower(str_replace(' ', '_', $state))) {
                        'nouveau' => 'Nouveau',
                        'en_cours' => 'En Cours',
                        'traite' => 'Traité',
                        default => ucfirst($state),
                    }),
                TextColumn::make('created_at')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('statut')
                    ->options([
                        'nouveau' => 'Nouveau',
                        'en_cours' => 'En Cours',
                        'traite' => 'Traité',
                    ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSignalements::route('/'),
            'create' => Pages\CreateSignalement::route('/create'),
            'edit' => Pages\EditSignalement::route('/{record}/edit'),
        ];
    }
}

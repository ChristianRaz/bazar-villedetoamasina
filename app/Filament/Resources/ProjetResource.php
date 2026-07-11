<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjetResource\Pages;
use App\Models\Projet;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Forms\Components\FileUpload;

class ProjetResource extends Resource
{
    protected static ?string $model = Projet::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Projets';
    protected static ?string $modelLabel = 'Projet';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informations')
                    ->schema([
                        Forms\Components\TextInput::make('titre')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),

                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->disabled()
                            ->dehydrated()
                            ->unique(ignoreRecord: true),

                        Forms\Components\RichEditor::make('description')
                            ->required()
                            ->columnSpanFull(),
                    ])->columns(2),

                Forms\Components\Section::make('Médias & Suivi')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('Photos supplémentaires (carrousel)')
                            ->image()
                            ->multiple()
                            ->reorderable()
                            ->directory('projets')
                            ->imageEditor()
                            ->disk('public')
                            ->nullable()
                            ->columnSpanFull(),

                                        FileUpload::make('video')
                            ->label('Vidéo')
                            ->acceptedFileTypes(['video/mp4', 'video/*'])
                            ->maxSize(65536) // 64Mo max
                            ->directory('videos')
                            ->lazy()
                            ->preserveFilenames()
                            ->reorderable(false)
                            ->downloadable()
                            ->openable(),

                        Forms\Components\TextInput::make('video_url')
                            ->label('Lien vidéo')
                            ->url()
                            ->maxLength(255),

                        Forms\Components\Select::make('statut')
                            ->options([
                                'en_cours' => 'En cours',
                                'termine' => 'Terminé',
                                'suspendu' => 'Suspendu',
                            ])
                            ->default('en_cours')
                            ->required()
                            ->native(false),

                        Forms\Components\TextInput::make('progression')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(100)
                            ->suffix('%')
                            ->default(0)
                            ->required(),

                        Forms\Components\DatePicker::make('date_debut')
                            ->label('Date début'),

                        Forms\Components\DatePicker::make('date_fin')
                            ->label('Date fin')
                            ->after('date_debut'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->circular(),

                Tables\Columns\TextColumn::make('titre')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('statut')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'en_cours' => 'warning',
                        'termine' => 'success',
                        'suspendu' => 'danger',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'en_cours' => 'En cours',
                        'termine' => 'Terminé',
                        'suspendu' => 'Suspendu',
                    }),

                Tables\Columns\TextColumn::make('progression')
                    ->label('Avancement')
                    ->suffix('%')
                    ->sortable(),

                Tables\Columns\TextColumn::make('date_debut')
                    ->label('Début')
                    ->date('d/m/Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('date_fin')
                    ->label('Fin')
                    ->date('d/m/Y')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('statut')
                    ->options([
                        'en_cours' => 'En cours',
                        'termine' => 'Terminé',
                        'suspendu' => 'Suspendu',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjets::route('/'),
            'create' => Pages\CreateProjet::route('/create'),
            'edit' => Pages\EditProjet::route('/{record}/edit'),
        ];
    }
}

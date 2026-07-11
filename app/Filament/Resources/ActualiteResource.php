<?php
namespace App\Filament\Resources;

use App\Filament\Resources\ActualiteResource\Pages;
use App\Models\Actualite;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ActualiteResource extends Resource
{
    protected static ?string $model = Actualite::class;
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationLabel = 'Actualités';
    protected static ?string $modelLabel = 'Actualité';
    protected static ?string $pluralModelLabel = 'Actualités';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([

            Forms\Components\Section::make('Informations')
                ->schema([
                    Forms\Components\TextInput::make('titre')
                        ->label('Titre')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn ($state, callable $set) =>
                            $set('slug', Str::slug($state))),

                    Forms\Components\TextInput::make('slug')
                        ->required()
                        ->unique(ignoreRecord: true),

                    Forms\Components\RichEditor::make('contenu')
                        ->label('Contenu')
                        ->required()
                        ->columnSpanFull(),
                ])->columns(2),

            Forms\Components\Section::make('Médias')
                ->schema([
                    Forms\Components\FileUpload::make('image')
                        ->label('Image')
                        ->image()
                        ->directory('actualites')
                        ->disk('public')
                        ->nullable(),

                    Forms\Components\FileUpload::make('video')
                        ->label('Vidéo (fichier)')
                        ->acceptedFileTypes(['video/mp4', 'video/webm', 'video/ogg'])
                        ->directory('actualites/videos')
                        ->disk('public')
                        ->nullable(),

                    Forms\Components\TextInput::make('video_url')
                        ->label('URL Vidéo (YouTube/Vimeo)')
                        ->url()
                        ->nullable()
                        ->columnSpanFull(),
                ])->columns(2),

            Forms\Components\Section::make('Catégorie & Date')
                ->schema([
                    Forms\Components\Select::make('categorie')
                        ->label('Catégorie')
                        ->options([
                            'Travaux'        => 'Travaux',
                            'Environnement'  => 'Environnement',
                            'Digitalisation' => 'Digitalisation',
                            'Santé'          => 'Santé',
                            'Éducation'      => 'Éducation',
                            'Transport'      => 'Transport',
                            'Général'        => 'Général',
                        ])
                        ->required(),

                    Forms\Components\DatePicker::make('date_publication')
                        ->label('Date de publication'),
                ])->columns(2),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\ImageColumn::make('image')
                ->disk('public')
                ->width(80)
                ->height(50)
                ->defaultImageUrl(fn ($record) => $record->video ? asset('img/video-thumb.png') : null),

            Tables\Columns\TextColumn::make('titre')
                ->searchable()
                ->sortable()
                ->limit(40),

            Tables\Columns\BadgeColumn::make('categorie')
                ->colors([
                    'warning' => 'Travaux',
                    'success' => 'Environnement',
                    'primary' => 'Digitalisation',
                    'danger'  => 'Santé',
                    'gray'    => 'Général',
                ]),

            Tables\Columns\IconColumn::make('video')
                ->label('Vidéo ?')
                ->boolean()
                ->trueIcon('heroicon-o-film')
                ->falseIcon('heroicon-o-x-mark'),

            Tables\Columns\TextColumn::make('date_publication')
                ->label('Date')
                ->date('d/m/Y')
                ->sortable(),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Créé le')
                ->date('d/m/Y')
                ->sortable(),
        ])
        ->defaultSort('date_publication', 'desc')
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListActualites::route('/'),
            'create' => Pages\CreateActualite::route('/create'),
            'edit'   => Pages\EditActualite::route('/{record}/edit'),

        ];
    }
}

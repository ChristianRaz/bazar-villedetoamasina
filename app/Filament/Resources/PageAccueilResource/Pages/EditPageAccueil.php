<?php

namespace App\Filament\Resources\PageAccueilResource\Pages;

use App\Filament\Resources\PageAccueilResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPageAccueil extends EditRecord
{
    protected static string $resource = PageAccueilResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

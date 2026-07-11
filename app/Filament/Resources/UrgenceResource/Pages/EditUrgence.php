<?php

namespace App\Filament\Resources\UrgenceResource\Pages;

use App\Filament\Resources\UrgenceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUrgence extends EditRecord
{
    protected static string $resource = UrgenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

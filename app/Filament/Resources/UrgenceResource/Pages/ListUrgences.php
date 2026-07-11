<?php

namespace App\Filament\Resources\UrgenceResource\Pages;

use App\Filament\Resources\UrgenceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUrgences extends ListRecords
{
    protected static string $resource = UrgenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

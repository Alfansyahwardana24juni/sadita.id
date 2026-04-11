<?php

namespace App\Filament\Resources\DokterHewanResource\Pages;

use App\Filament\Resources\DokterHewanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDokterHewans extends ListRecords
{
    protected static string $resource = DokterHewanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\AdminKantorResource\Pages;

use App\Filament\Resources\AdminKantorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdminKantor extends EditRecord
{
    protected static string $resource = AdminKantorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\DetailCategoryResource\Pages;

use App\Filament\Resources\DetailCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDetailCategory extends EditRecord
{
    protected static string $resource = DetailCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

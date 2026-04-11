<?php

namespace App\Filament\Resources\DetailCategoryResource\Pages;

use App\Filament\Resources\DetailCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDetailCategories extends ListRecords
{
    protected static string $resource = DetailCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

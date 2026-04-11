<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryProductResource\Pages;
use App\Models\CategoryProduct;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CategoryProductResource extends Resource
{
    protected static ?string $model = CategoryProduct::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';
    protected static ?string $navigationLabel = 'Kategori Produk';
    protected static ?string $navigationGroup = 'Produk';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name_category')
                ->required()
                ->maxLength(255)
                ->label('Nama Kategori (Indonesia)'),

            Forms\Components\TextInput::make('name_category_en')
                ->required()
                ->maxLength(255)
                ->label('Nama Kategori (English)'),

            Forms\Components\FileUpload::make('img')
                ->image()
                ->directory('category-images')
                ->label('Gambar Kategori'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name_category')->label('Kategori (ID)')->searchable(),
            Tables\Columns\TextColumn::make('name_category_en')->label('Kategori (EN)')->searchable(),
            Tables\Columns\ImageColumn::make('img')->label('Gambar'),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\ViewAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategoryProducts::route('/'),
            'create' => Pages\CreateCategoryProduct::route('/create'),
            'edit' => Pages\EditCategoryProduct::route('/{record}/edit'),
        ];
    }
}

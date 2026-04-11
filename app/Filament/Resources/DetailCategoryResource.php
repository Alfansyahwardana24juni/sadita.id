<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DetailCategoryResource\Pages;
use App\Models\DetailCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class DetailCategoryResource extends Resource
{
    protected static ?string $model = DetailCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationLabel = 'Detail Produk';
    protected static ?string $navigationGroup = 'Produk';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('category_id')
                ->label('Kategori')
                ->relationship('category', 'name_category')
                ->searchable()
                ->required()
                ->unique(ignoreRecord: true),

            Forms\Components\TextInput::make('title')
                ->label('Judul (Indonesia)')
                ->required(),

            Forms\Components\TextInput::make('title_en')
                ->label('Judul (English)')
                ->required(),

            Forms\Components\FileUpload::make('img')
                ->label('Gambar Detail')
                ->image()
                ->directory('detail-category-images')
                ->required(),

            Forms\Components\Textarea::make('description')
                ->label('Deskripsi (Indonesia)')
                ->nullable()
                ->autosize(),

            Forms\Components\Textarea::make('description_en')
                ->label('Deskripsi (English)')
                ->nullable()
                ->autosize(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('category.name_category')->label('Kategori'),
            TextColumn::make('title')->label('Judul (ID)'),
            TextColumn::make('title_en')->label('Judul (EN)'),
            ImageColumn::make('img')->label('Gambar'),
        ])
        ->actions([
            Tables\Actions\ViewAction::make(),
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDetailCategories::route('/'),
            'create' => Pages\CreateDetailCategory::route('/create'),
            'edit' => Pages\EditDetailCategory::route('/{record}/edit'),
        ];
    }
}

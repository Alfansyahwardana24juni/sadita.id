<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\Textarea;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';
    protected static ?string $navigationLabel = 'Produk';
    protected static ?string $navigationGroup = 'Produk';
    protected static ?int $navigationSort = 4;

   public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\Select::make('detail_category_id')
                ->relationship('detailCategory', 'title')
                ->label('Detail Kategori')
                ->searchable()
                ->required(),

            Forms\Components\TextInput::make('name')
                ->label('Nama Produk (Indonesia)')
                ->required(),

            Forms\Components\TextInput::make('name_en')
                ->label('Nama Produk (English)')
                ->required(),

            Forms\Components\FileUpload::make('list_image')
                ->label('Gambar List')
                ->directory('products')
                ->image()
                ->maxSize(2048)
                ->required(),
Forms\Components\Toggle::make('aktif')
    ->label('Tampilkan Produk')
    ->default(true)
    ->required(),

            Forms\Components\Section::make('Gambar Produk - Bahasa Indonesia')
                ->schema([
                    Forms\Components\Grid::make(2)
                        ->schema([
                            Forms\Components\FileUpload::make('image_top')
                                ->label('Gambar Atas')
                                ->directory('products')
                                ->image()
                                ->maxSize(2048)
                                ->required(),

                            Textarea::make('alt_top')
                                ->label('Alt Gambar Atas'),
                        ]),

                    Forms\Components\Grid::make(2)
                        ->schema([
                            Forms\Components\FileUpload::make('image_bottom')
                                ->label('Gambar Bawah')
                                ->directory('products')
                                ->image()
                                ->maxSize(2048)
                                ->nullable(),

                            Textarea::make('alt_bottom')
                                ->label('Alt Gambar Bawah'),
                        ]),
                ]),

            Forms\Components\Section::make('Gambar Produk - English')
                ->schema([
                    Forms\Components\Grid::make(2)
                        ->schema([
                            Forms\Components\FileUpload::make('image_top_en')
                                ->label('Top Image')
                                ->directory('products')
                                ->image()
                                ->maxSize(2048)
                                ->required(),

                            Textarea::make('alt_top_en')
                                ->label('Alt Top Image'),
                        ]),

                    Forms\Components\Grid::make(2)
                        ->schema([
                            Forms\Components\FileUpload::make('image_bottom_en')
                                ->label('Bottom Image')
                                ->directory('products')
                                ->image()
                                ->maxSize(2048)
                                ->nullable(),

                            Textarea::make('alt_bottom_en')
                                ->label('Alt Bottom Image'),
                        ]),
                ]),
        ]);
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nama Produk')->searchable()->sortable(),
                ImageColumn::make('list_image')->label('Gambar List'),
                Tables\Columns\IconColumn::make('aktif')
    ->label('Status')
    ->boolean()
    ->sortable(),

                ImageColumn::make('image_top')->label('Gambar Atas'),
                ImageColumn::make('image_bottom')->label('Gambar Bawah'),
                TextColumn::make('detailCategory.title')->label('Detail Kategori'),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}

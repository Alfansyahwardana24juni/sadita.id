<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationLabel = 'Artikel';

protected static ?string $navigationGroup = 'Blogs';

    // Urutan menu di sidebar
    protected static ?int $navigationSort = 1;
        public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\TextInput::make('judul')
                ->label('Judul (Indonesia)')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('judul_en')
    ->label('Judul (English)')
    ->maxLength(255),
                Forms\Components\Hidden::make('slug'),
                Forms\Components\FileUpload::make('thumbnail')
                ->image()
                ->directory('articles')
                ->required(),
            Forms\Components\Select::make('category')
    ->options([
        'news' => 'News',
        'tips' => 'Tips',
    ])
    ->required(),
Forms\Components\TextInput::make('penulis')
    ->label('Penulis')
    ->required()
    ->maxLength(100),

            Forms\Components\DateTimePicker::make('tanggal_publikasi')
                ->required()
                ->default(now()),
            Forms\Components\RichEditor::make('konten')
                ->label('Konten (Indonesia)')
                ->required()
                ->columnSpanFull(),
                Forms\Components\RichEditor::make('konten_en')
    ->label('Konten (English)')
    ->columnSpanFull()
        ]);
}
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('thumbnail'),
                Tables\Columns\TextColumn::make('category') // Ganti ini
                    ->label('Category')
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_publikasi')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category') // Ganti ini
                    ->options([
                        'news' => 'News',
                        'tips' => 'Tips',
                    ])
                    ->label('Category'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
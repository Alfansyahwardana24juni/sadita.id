<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimoniResource\Pages;
use App\Filament\Resources\TestimoniResource\RelationManagers;
use App\Models\Testimoni;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;


class TestimoniResource extends Resource
{
    protected static ?string $model = Testimoni::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Blogs';

    public static function getNavigationLabel(): string
{
    return 'Testimoni';
}

    public static function form(Form $form): Form
{
    return $form->schema([
            // TextInput::make('nama')->required()->label('Nama Lengkap'),
            // TextInput::make('jabatan')->required()->label('Sebagai Apa'),
            
            // FileUpload::make('foto')
            // ->image()
            // ->directory('testimoni-foto')
            // ->maxSize(2048) // 2MB foto
            // ->getUploadedFileNameForStorageUsing(fn ($file) => $file->getClientOriginalName())
            // ->label('Foto Profil'),

        // FileUpload::make('video_file')
        //     ->label('Video Testimoni (Max 1GB)')
        //     ->directory('testimoni-video')
        //     ->maxSize(1024000) // Max 1GB dalam KB
        //     ->acceptedFileTypes(['video/mp4', 'video/mkv', 'video/avi', 'video/mov'])
        //     ->nullable(),

        TextInput::make('video_link')
            ->url()
            ->label('Link Video')
            ->required(),

    ]);
}

public static function table(Table $table): Table
{
    return $table
        ->columns([
            // TextColumn::make('nama')->sortable()->searchable(),
            // TextColumn::make('jabatan')->searchable(),
            // ImageColumn::make('foto')->label('Foto'),
            TextColumn::make('video')->label('Link')->limit(30),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ]);
}

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTestimonis::route('/'),
            'create' => Pages\CreateTestimoni::route('/create'),
            'edit' => Pages\EditTestimoni::route('/{record}/edit'),
        ];
    }
}

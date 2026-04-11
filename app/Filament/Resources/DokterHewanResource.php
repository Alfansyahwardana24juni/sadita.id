<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DokterHewanResource\Pages;
use App\Filament\Resources\DokterHewanResource\RelationManagers;
use App\Models\DokterHewan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DokterHewanResource extends Resource
{
    protected static ?string $model = DokterHewan::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';

    protected static ?string $navigationLabel = 'Dokter Hewan';

    protected static ?string $navigationGroup = 'Chat';

    // Urutan menu di sidebar
    protected static ?int $navigationSort = 1;
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('nama_dokter')
                ->required()
                ->maxLength(255)
                ->label('Nama Dokter'),
            Forms\Components\TextInput::make('pengalaman')
                ->required()
                ->maxLength(255)
                ->label('Pengalaman'),
            Forms\Components\TextInput::make('lokasi_praktik')
                ->required()
                ->maxLength(255)
                ->label('Lokasi Praktik'),
            Forms\Components\TextInput::make('nomor_telepon')
                ->required()
                ->maxLength(255)
                ->label('Nomor Telepon'),
            Forms\Components\FileUpload::make('img')
                ->image()
                ->directory('dokter-images')
                ->label('Foto Dokter'),
            Forms\Components\Textarea::make('default_message')
                ->label('Pesan Default WhatsApp')
                ->helperText('Pesan yang akan otomatis muncul di WhatsApp ketika user mengklik tombol Konsultasi Sekarang'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('nama_dokter')->label('Nama Dokter'),
            Tables\Columns\TextColumn::make('pengalaman')->label('Pengalaman'),
            Tables\Columns\TextColumn::make('lokasi_praktik')->label('Lokasi Praktik'),
            Tables\Columns\TextColumn::make('nomor_telepon')->label('Nomor Telepon'),
            Tables\Columns\ImageColumn::make('img')->label('Foto'),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListDokterHewans::route('/'),
            'create' => Pages\CreateDokterHewan::route('/create'),
            'edit' => Pages\EditDokterHewan::route('/{record}/edit'),
        ];
    }
}
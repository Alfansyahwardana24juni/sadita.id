<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdminKantorResource\Pages;
use App\Filament\Resources\AdminKantorResource\RelationManagers;
use App\Models\AdminKantor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdminKantorResource extends Resource
{
    protected static ?string $model = AdminKantor::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';
    
    protected static ?string $navigationLabel = 'Admin Kantor';

    protected static ?string $navigationGroup = 'Chat';

    // Urutan menu di sidebar
    protected static ?int $navigationSort = 2;
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('nama_admin')
                ->required()
                ->maxLength(255)
                ->label('Nama Admin'),
            Forms\Components\TextInput::make('hari_kerja')
                ->required()
                ->maxLength(255)
                ->label('Hari Kerja'),
            Forms\Components\TextInput::make('lokasi_admin')
                ->required()
                ->maxLength(255)
                ->label('Lokasi Admin'),
            Forms\Components\TextInput::make('nomor_telepon')
                ->required()
                ->maxLength(255)
                ->label('Nomor Telepon'),
            Forms\Components\FileUpload::make('img')
                ->image()
                ->directory('admin-images')
                ->label('Foto Admin'),
            Forms\Components\Textarea::make('default_message')
                ->label('Pesan Default WhatsApp')
                ->helperText('Pesan yang akan otomatis muncul di WhatsApp ketika user mengklik tombol Chat Sekarang'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('nama_admin')->label('Nama Admin'),
            Tables\Columns\TextColumn::make('hari_kerja')->label('Hari Kerja'),
            Tables\Columns\TextColumn::make('lokasi_admin')->label('Lokasi Admin'),
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
            'index' => Pages\ListAdminKantors::route('/'),
            'create' => Pages\CreateAdminKantor::route('/create'),
            'edit' => Pages\EditAdminKantor::route('/{record}/edit'),
        ];
    }
}
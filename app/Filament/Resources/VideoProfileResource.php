<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VideoProfileResource\Pages;
use App\Filament\Resources\VideoProfileResource\RelationManagers;
use App\Models\VideoProfile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VideoProfileResource extends Resource
{
    protected static ?string $model = VideoProfile::class;
    protected static ?string $navigationIcon = 'heroicon-o-video-camera';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('video_id')
                    ->label('Video YouTube Bahasa Indonesia')
                    ->required()
                    ->url(),

                Forms\Components\TextInput::make('video_en')
                    ->label('Video YouTube Bahasa Inggris')
                    ->required()
                    ->url(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('video_id')->label('Video ID'),
                Tables\Columns\TextColumn::make('video_en')->label('Video EN'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVideoProfiles::route('/'),
            'edit' => Pages\EditVideoProfile::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources\Etudiants;

use App\Filament\Resources\Etudiants\Pages\CreateEtudiant;
use App\Filament\Resources\Etudiants\Pages\EditEtudiant;
use App\Filament\Resources\Etudiants\Pages\ListEtudiants;
use App\Filament\Resources\Etudiants\Schemas\EtudiantForm;
use App\Filament\Resources\Etudiants\Tables\EtudiantsTable;
use Filament\Forms\Components\TextInput;
use App\Models\Etudiants;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class EtudiantResource extends Resource
{
    protected static ?string $model = Etudiants::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'etudiants';

    public static function form(Schema $schema): Schema
    {
        return  $schema 
       ->schema([
  TextInput::make('name')
    ->required(),
    TextInput::make('classe')
    ->required(),
       ]);
    }

    public static function table(Table $table): Table
    {
        return $table
       ->columns([
            TextColumn::make('name'),
            TextColumn::make('classe'),
       ]) ;
   
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
            'index' => ListEtudiants::route('/'),
            'create' => CreateEtudiant::route('/create'),
            'edit' => EditEtudiant::route('/{record}/edit'),
        ];
    }
}

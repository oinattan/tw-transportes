<?php

namespace App\Filament\Resources\Etapas;

use App\Filament\Resources\Etapas\Pages\CreateEtapa;
use App\Filament\Resources\Etapas\Pages\EditEtapa;
use App\Filament\Resources\Etapas\Pages\ListEtapas;
use App\Filament\Resources\Etapas\Pages\ViewEtapa;
use App\Filament\Resources\Etapas\Schemas\EtapaForm;
use App\Filament\Resources\Etapas\Schemas\EtapaInfolist;
use App\Filament\Resources\Etapas\Tables\EtapasTable;
use App\Models\Etapa;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EtapaResource extends Resource
{
    protected static ?string $model = Etapa::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Etapa';

    public static function form(Schema $schema): Schema
    {
        return EtapaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return EtapaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EtapasTable::configure($table);
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
            'index' => ListEtapas::route('/'),
            'create' => CreateEtapa::route('/create'),
            'view' => ViewEtapa::route('/{record}'),
            'edit' => EditEtapa::route('/{record}/edit'),
        ];
    }
}

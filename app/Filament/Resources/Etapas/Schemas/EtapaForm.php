<?php

namespace App\Filament\Resources\Etapas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EtapaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('description')
                    ->required(),
                TextInput::make('frete_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}

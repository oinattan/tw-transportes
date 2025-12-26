<?php

namespace App\Filament\Resources\Fretes\Pages;

use App\Filament\Resources\Fretes\FreteResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditFrete extends EditRecord
{
    protected static string $resource = FreteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}

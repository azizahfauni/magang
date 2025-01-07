<?php

namespace App\Filament\Resources\InputDataResource\Pages;

use App\Filament\Resources\InputDataResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInputData extends ListRecords
{
    protected static string $resource = InputDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

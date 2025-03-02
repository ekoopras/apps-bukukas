<?php

namespace App\Filament\Resources\JajanResource\Pages;

use App\Filament\Resources\JajanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJajans extends ListRecords
{
    protected static string $resource = JajanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

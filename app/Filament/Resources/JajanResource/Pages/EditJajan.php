<?php

namespace App\Filament\Resources\JajanResource\Pages;

use App\Filament\Resources\JajanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJajan extends EditRecord
{
    protected static string $resource = JajanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

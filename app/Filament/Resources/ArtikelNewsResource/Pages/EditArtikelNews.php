<?php

namespace App\Filament\Resources\ArtikelNewsResource\Pages;

use App\Filament\Resources\ArtikelNewsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditArtikelNews extends EditRecord
{
    protected static string $resource = ArtikelNewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\ArtikelNewsResource\Pages;

use App\Filament\Resources\ArtikelNewsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListArtikelNews extends ListRecords
{
    protected static string $resource = ArtikelNewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

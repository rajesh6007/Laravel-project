<?php

namespace App\Filament\Resources\Developers\Pages;

use App\Filament\Resources\Developers\DevelopersResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDevelopers extends ListRecords
{
    protected static string $resource = DevelopersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

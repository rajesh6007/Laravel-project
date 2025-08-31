<?php

namespace App\Filament\Resources\Developers\Pages;

use App\Filament\Resources\Developers\DevelopersResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDevelopers extends EditRecord
{
    protected static string $resource = DevelopersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

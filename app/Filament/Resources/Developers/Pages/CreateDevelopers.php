<?php

namespace App\Filament\Resources\Developers\Pages;

use App\Filament\Resources\Developers\DevelopersResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDevelopers extends CreateRecord
{
    protected static string $resource = DevelopersResource::class;
}

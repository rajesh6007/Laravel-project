<?php

namespace App\Filament\Resources\CustomerDetails\Pages;

use App\Filament\Resources\CustomerDetails\CustomerDetailsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCustomerDetails extends ListRecords
{
    protected static string $resource = CustomerDetailsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

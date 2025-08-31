<?php

namespace App\Filament\Resources\CustomerDetails\Pages;

use App\Filament\Resources\CustomerDetails\CustomerDetailsResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCustomerDetails extends EditRecord
{
    protected static string $resource = CustomerDetailsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

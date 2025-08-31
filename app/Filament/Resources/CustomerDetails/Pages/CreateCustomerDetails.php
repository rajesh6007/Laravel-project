<?php

namespace App\Filament\Resources\CustomerDetails\Pages;

use App\Filament\Resources\CustomerDetails\CustomerDetailsResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomerDetails extends CreateRecord
{
    protected static string $resource = CustomerDetailsResource::class;
}

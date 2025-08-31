<?php

namespace App\Filament\Resources\CustomerDetails;

use App\Filament\Resources\CustomerDetails\Pages\CreateCustomerDetails;
use App\Filament\Resources\CustomerDetails\Pages\EditCustomerDetails;
use App\Filament\Resources\CustomerDetails\Pages\ListCustomerDetails;
use App\Filament\Resources\CustomerDetails\Schemas\CustomerDetailsForm;
use App\Filament\Resources\CustomerDetails\Tables\CustomerDetailsTable;
use App\Models\CustomerDetails;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CustomerDetailsResource extends Resource
{
    protected static ?string $model = CustomerDetails::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Customer';

    public static function form(Schema $schema): Schema
    {
        return CustomerDetailsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CustomerDetailsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCustomerDetails::route('/'),
            'create' => CreateCustomerDetails::route('/create'),
            'edit' => EditCustomerDetails::route('/{record}/edit'),
        ];
    }
}

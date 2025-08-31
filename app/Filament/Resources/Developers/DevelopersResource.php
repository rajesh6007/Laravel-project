<?php

namespace App\Filament\Resources\Developers;

use App\Filament\Resources\Developers\Pages\CreateDevelopers;
use App\Filament\Resources\Developers\Pages\EditDevelopers;
use App\Filament\Resources\Developers\Pages\ListDevelopers;
use App\Filament\Resources\Developers\Schemas\DevelopersForm;
use App\Filament\Resources\Developers\Tables\DevelopersTable;
use App\Models\Developers;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DevelopersResource extends Resource
{
    protected static ?string $model = Developers::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Developers';

    protected static ?string $modelLabel = 'Developers Teams';

    protected static \UnitEnum|string|null $navigationGroup = 'Employee';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return DevelopersForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DevelopersTable::configure($table);
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
            'index' => ListDevelopers::route('/'),
            'create' => CreateDevelopers::route('/create'),
            'edit' => EditDevelopers::route('/{record}/edit'),
        ];
    }
}

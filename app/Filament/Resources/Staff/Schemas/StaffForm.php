<?php

namespace App\Filament\Resources\Staff\Schemas;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Random\Engine\Secure;

class StaffForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('User Details')
                    ->schema([
                        TextInput::make('fullname')->required(),
                        TextInput::make('middlename')->required(),
                        TextInput::make('lastname')->required(),
                    ])->columns(3),

                Section::make('Contact Details')
                    ->schema([
                        TextInput::make('email')
                            ->required()
                            ->email(),
                        TextInput::make('address')
                            ->required(),
                        TextInput::make('phoneno')
                            ->required()
                            ->columnSpanFull(),
                    ]),

                TextInput::make('password')
                    ->required()
                    ->password()

            ]);
    }
}

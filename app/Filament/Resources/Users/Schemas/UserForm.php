<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Enums\UserRole;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\CreateRecord;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->label('Correo')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true),
                Select::make('role')
                    ->label('Rol')
                    ->options(UserRole::options())
                    ->required()
                    ->native(false),
                TextInput::make('password')
                    ->label('Contraseña')
                    ->password()
                    ->revealable()
                    ->minLength(8)
                    ->dehydrated(fn (?string $state): bool => filled($state))
                    ->required(fn ($livewire): bool => $livewire instanceof CreateRecord),
                DateTimePicker::make('email_verified_at')
                    ->label('Correo verificado')
                    ->native(false),
            ]);
    }
}

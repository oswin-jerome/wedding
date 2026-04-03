<?php

namespace App\Filament\Resources\Wishes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class WishForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name'),
                Textarea::make('message')
                    ->columnSpanFull(),
                TextInput::make('project_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}

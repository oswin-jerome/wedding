<?php

namespace App\Filament\Resources\Projects\RelationManagers;

use App\Filament\Resources\Wishes\WishResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class WishesRelationManager extends RelationManager
{
    protected static string $relationship = 'wishes';

    protected static ?string $relatedResource = WishResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}

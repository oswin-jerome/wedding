<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('code')
                    ->unique("projects", "code", ignoreRecord: true)
                    ->required(),
                TextInput::make('name')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->required(),
                SpatieMediaLibraryFileUpload::make('project_files')
                    ->collection('project_files')
                    ->multiple()
                    ->reorderable()
                    ->downloadable()
                    ->openable()
                    ->imagePreviewHeight('150')
                    ->panelLayout('grid'),
            ]);
    }
}

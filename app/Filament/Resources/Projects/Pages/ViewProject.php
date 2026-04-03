<?php

namespace App\Filament\Resources\Projects\Pages;

use App\Filament\Resources\Projects\ProjectResource;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Resources\Pages\ViewRecord;

class ViewProject extends ViewRecord
{
    protected static string $resource = ProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            // Action::make('upload')
            //     ->label('Upload Media')
            //     ->icon('heroicon-o-arrow-up-tray')

            // ->form([
            //     SpatieMediaLibraryFileUpload::make('project_files')
            //         ->collection('project_files')
            //         ->multiple()
            //         ->appendFiles() // ⭐ IMPORTANT
            //         ->reorderable()
            //         ->downloadable()
            //         ->openable()
            //         ->panelLayout('grid'),
            // ])

            // ->action(function (array $data): void {


            //     $this->record->refresh();
            // }),
        ];
    }
}

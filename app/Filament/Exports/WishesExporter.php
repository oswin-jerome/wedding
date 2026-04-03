<?php

namespace App\Filament\Exports;

use App\Models\Wish;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class WishesExporter extends Exporter
{
    protected static ?string $model = Wish::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('name')
                ->label('Name'),
            ExportColumn::make('message')
                ->label('Message'),
            ExportColumn::make('project_id')
                ->label('Project ID'),
            ExportColumn::make('created_at')
                ->label('Created At'),
            ExportColumn::make('updated_at')
                ->label('Updated At'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        return __('filament-actions::export.notifications.completed.body', [
            'count' => $export->total_rows,
        ]);
    }

    public function getJobConnection(): ?string
    {
        // Run synchronously to avoid requiring the database notifications tables.
        return 'sync';
    }
}

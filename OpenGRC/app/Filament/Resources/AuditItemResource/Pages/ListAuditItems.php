<?php

namespace App\Filament\Resources\AuditItemResource\Pages;

use App\Filament\Resources\AuditItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAuditItems extends ListRecords
{
    protected static string $resource = AuditItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

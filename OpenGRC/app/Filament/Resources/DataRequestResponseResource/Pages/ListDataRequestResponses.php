<?php

namespace App\Filament\Resources\DataRequestResponseResource\Pages;

use App\Filament\Resources\DataRequestResponseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataRequestResponses extends ListRecords
{
    protected static string $resource = DataRequestResponseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\FileAttachmentResource\Pages;

use App\Filament\Resources\FileAttachmentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFileAttachment extends EditRecord
{
    protected static string $resource = FileAttachmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\ControlResource\Pages;

use App\Filament\Resources\ControlResource;
use App\Http\Controllers\AiController;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewControl extends ViewRecord
{
    protected static string $resource = ControlResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\Action::make('Get Suggestions')

                ->label('Get AI Suggestions')
                ->modal('get-suggestions')
                ->hidden(function () {
                    return setting('ai.enabled') != true;
                })
                ->closeModalByEscaping(true)
                ->modalSubmitAction(false)
                ->modalDescription(function ($record) {
                    return AiController::getControlSuggestions($record);
                }),
        ];
    }

    public function getTitle(): string
    {
        return 'Control';
    }
}

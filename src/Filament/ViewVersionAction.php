<?php

declare(strict_types=1);

namespace Indra\RevisorFilament\Filament;

use Filament\Actions\Action;
use Illuminate\Database\Eloquent\Model;
use Indra\Revisor\Contracts\HasRevisor;

class ViewVersionAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label('View')
            ->icon('heroicon-o-eye')
            ->url(function (Model & HasRevisor $record, ListVersions $livewire) {
                $resource = $livewire::getResource();
                $parent = $livewire->getRecord();

                return $resource::getUrl('view_version', [
                    'record' => $parent->getRouteKey(),
                    'version' => $record->getKey(),
                ]);
            });
    }

    public static function getDefaultName(): ?string
    {
        return 'view_version';
    }
}

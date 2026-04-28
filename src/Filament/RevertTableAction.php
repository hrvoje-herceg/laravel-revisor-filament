<?php

declare(strict_types=1);

namespace Indra\RevisorFilament\Filament;

use Filament\Actions\Action;
use Illuminate\Database\Eloquent\Model;
use Indra\Revisor\Contracts\HasRevisor;

class RevertTableAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label('Revert to this version')
            ->icon('heroicon-o-arrow-path')
            ->requiresConfirmation()
            ->hidden(fn (Model & HasRevisor $record) => (bool) $record->is_current)
            ->successNotificationTitle('Reverted successfully')
            ->action(function (Model & HasRevisor $record) {
                $record->revertDraftToThisVersion();
                $this->success();
            });
    }

    public static function getDefaultName(): ?string
    {
        return 'revert';
    }
}

<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\Invitation;
use Illuminate\Support\Str;

final class InvitationObserver
{
    public function creating(Invitation $invitation): void
    {
        $invitation->token ??= (string) Str::random(64);
        $invitation->invited_by ??= (int) auth()->id();
        $invitation->expires_at ??= now()->addDays(7);
    }
}

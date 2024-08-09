<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Auditoria;
use Carbon\Carbon;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        Auditoria::create([
            'user_id' => $event->user->id,
            'accion' => 'INICIO',
            'descripcion' => 'Inicio de sesión',
            'fecha' => Carbon::now(),
        ]);
    }
}

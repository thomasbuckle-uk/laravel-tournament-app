<?php

namespace App\Http\Controllers\Dashboard\Tournament;

use App\Http\Controllers\Controller;
use App\Models\Tournament;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Response;
use Laravel\Jetstream\Jetstream;

class Overview extends Controller
{
    public function show(Request $request): Response
    {

        $upcomingTournaments = Tournament::upcomingTournaments();



        return Jetstream::inertia()->render($request, 'Tournaments/Overview/Show', [
            'user' => $request->user(),
            'upcomingTournaments' => $upcomingTournaments,
            'availableRoles' => array_values(Jetstream::$roles),
            'availablePermissions' => Jetstream::$permissions,
            'defaultPermissions' => Jetstream::$defaultPermissions,
        ]);
    }
}

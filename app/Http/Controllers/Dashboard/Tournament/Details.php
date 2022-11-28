<?php

namespace App\Http\Controllers\Dashboard\Tournament;

use App\Http\Controllers\Controller;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;

class Details extends Controller
{

    public function show(Tournament $tournament, Request $request ) {

        return Jetstream::inertia()->render($request, 'Tournaments/Details/Show', [
            'user' => $request->user(),
            'tournament' => $tournament,
            'availableRoles' => array_values(Jetstream::$roles),
            'availablePermissions' => Jetstream::$permissions,
            'defaultPermissions' => Jetstream::$defaultPermissions,
        ]);
    }
}

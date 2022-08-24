<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Response;
use Laravel\Jetstream\Jetstream;
use Laravel\Jetstream\RedirectsActions;

class TeamDashController extends Controller
{
    use RedirectsActions;
    /**
     * @param Request $request
     * @param $teamId
     * @return Response
     */
    public function showOverview(Request $request, $teamId): Response
    {
        $team = Jetstream::newTeamModel()->findOrFail($teamId);
        Gate::authorize('view', $team);
        return Jetstream::inertia()->render($request, 'Teams/Show', [
            'team' => $team->load('owner', 'users', 'teamInvitations'),
            'availableRoles' => array_values(Jetstream::$roles),
            'availablePermissions' => Jetstream::$permissions,
            'defaultPermissions' => Jetstream::$defaultPermissions,
            'permissions' => [
                'canAddTeamMembers' => Gate::check('addTeamMember', $team),
                'canDeleteTeam' => Gate::check('delete', $team),
                'canRemoveTeamMembers' => Gate::check('removeTeamMember', $team),
                'canUpdateTeam' => Gate::check('update', $team),
            ],
        ]);
    }
}

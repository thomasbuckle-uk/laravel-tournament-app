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
     */
    public function showOverview(Request $request)
    {
        $team = Jetstream::newTeamModel()->findOrFail($request->user()->current_team_id);
        Gate::authorize('view', $team);

        return Jetstream::inertia()->render($request, 'Team/Overview/Show', [
            'user' => $request->user(),
            'team' => $team,
            'permissions' => [
                'canAddTeamMembers' => Gate::check('addTeamMember', $team),
                'canDeleteTeam' => Gate::check('delete', $team),
                'canRemoveTeamMembers' => Gate::check('removeTeamMember', $team),
                'canUpdateTeam' => Gate::check('update', $team),
            ],
            'availableRoles' => array_values(Jetstream::$roles),
            'availablePermissions' => Jetstream::$permissions,
            'defaultPermissions' => Jetstream::$defaultPermissions,
        ]);

    }

    /**
     * @param Request $request
     * @return Response
     */
    public function showSettings(Request $request): Response
    {
        $team = Jetstream::newTeamModel()->findOrFail($request->user()->current_team_id);
        Gate::authorize('view', $team);

        return Jetstream::inertia()->render($request, 'Team/Settings/Show', [
            'user' => $request->user(),
            'team' => $team,
            'permissions' => [
                'canAddTeamMembers' => Gate::check('addTeamMember', $team),
                'canDeleteTeam' => Gate::check('delete', $team),
                'canRemoveTeamMembers' => Gate::check('removeTeamMember', $team),
                'canUpdateTeam' => Gate::check('update', $team),
            ],
            'availableRoles' => array_values(Jetstream::$roles),
            'availablePermissions' => Jetstream::$permissions,
            'defaultPermissions' => Jetstream::$defaultPermissions,
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function showMembers(Request $request): Response
    {
        $team = Jetstream::newTeamModel()->findOrFail($request->user()->current_team_id);

        Gate::authorize('view', $team);

        return Jetstream::inertia()->render($request, 'Team/Members/Show', [
            'user' => $request->user(),
            'team' => $team->load('owner', 'users', 'teamInvitations'),
            'permissions' => [
                'canAddTeamMembers' => Gate::check('addTeamMember', $team),
                'canDeleteTeam' => Gate::check('delete', $team),
                'canRemoveTeamMembers' => Gate::check('removeTeamMember', $team),
                'canUpdateTeam' => Gate::check('update', $team),
            ],
            'availableRoles' => array_values(Jetstream::$roles),
            'availablePermissions' => Jetstream::$permissions,
            'defaultPermissions' => Jetstream::$defaultPermissions,
        ]);
    }

    public function showStats(Request $request)
    {
        $team = Jetstream::newTeamModel()->findOrFail($request->user()->current_team_id);
        Gate::authorize('view', $team);

        return Jetstream::inertia()->render($request, 'Team/Stats/Show', [
            'user' => $request->user(),
            'team' => $team,
            'permissions' => [
                'canAddTeamMembers' => Gate::check('addTeamMember', $team),
                'canDeleteTeam' => Gate::check('delete', $team),
                'canRemoveTeamMembers' => Gate::check('removeTeamMember', $team),
                'canUpdateTeam' => Gate::check('update', $team),
            ],
            'availableRoles' => array_values(Jetstream::$roles),
            'availablePermissions' => Jetstream::$permissions,
            'defaultPermissions' => Jetstream::$defaultPermissions,
        ]);
    }




}

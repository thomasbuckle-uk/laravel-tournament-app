<?php

namespace App\Actions\Jetstream;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Laravel\Jetstream\Jetstream;

class UpdateTeamProfileInformation
{
    /**
     * Validate and update Team profile information
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws AuthorizationException
     * @throws ValidationException
     */
    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {
        $user = $request->user();
        $team = Jetstream::newTeamModel()->findOrFail($user->current_team_id);

        Gate::forUser($user)->authorize('update', $team);

        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
        ])->validateWithBag('updateTeamName');

        $team->forceFill([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ])->save();

        return back(303);
    }
}

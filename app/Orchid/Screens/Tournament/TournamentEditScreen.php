<?php

namespace App\Orchid\Screens\Tournament;

use App\Models\Phase;
use App\Models\Tournament;
use App\Orchid\Layouts\System\Tournament\TournamentEditCheckinLayout;
use App\Orchid\Layouts\System\Tournament\TournamentEditContactLayout;
use App\Orchid\Layouts\System\Tournament\TournamentEditLayout;
use App\Orchid\Layouts\System\Tournament\TournamentEditRegistrationLayout;
use DateTime;
use DateTimeZone;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class TournamentEditScreen extends Screen
{

    public Tournament $tournament;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Tournament $tournament): iterable
    {
        # Return "Tournament" with its attached settings
        return [
            'tournament' => $tournament,
        ];
    }


    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->tournament->exists ? 'Edit Tournament' : 'Create Tournament';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Create a new Tournament or Edit an existing one';
    }

    /**
     * @return iterable|null
     */
    public function permission(): ?iterable
    {
        return ['platform.tournaments.create'];
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [


            Button::make(__('Save'))
                ->icon('check')
                ->method('save'),
        ];
    }

    /**
     * Views.
     *
     * @return Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [

            Layout::block(TournamentEditLayout::class)
                ->title(__('Tournament Basic Info'))
                ->description(__('Enter Basic Tournament Info Here')),

            Layout::block(TournamentEditRegistrationLayout::class)
                ->title('Tournament Registration Options')
                ->description(__('Settings to control or limit registration types')),

            Layout::block(TournamentEditCheckinLayout::class)
                ->title('Tournament Checkin Options')
                ->description(__('Settings that controls when participant Checkin opens and closes')),

            Layout::block(TournamentEditContactLayout::class)
                ->title('Tournament Contact Options'),
        ];
    }

    /**
     * @throws Exception
     */
    public function save(Tournament $tournament, Request $request): RedirectResponse
    {
        $tournament->fill($request->collect('tournament')->except(['prizes', 'platforms', 'check_in_participant_start_time', 'check_in_participant_end_time', 'timezone'])->toArray())
            ->fill([
                'prizes' => json_encode($request->input('tournament.prizes')),
                'platforms' => json_encode($request->input('tournament.platforms')),
                'check_in_participant_start_time' => new DateTime($request->input('tournament.check_in_participant_start_time'), new DateTimeZone('America/New_York')),
                'check_in_participant_end_time' => new DateTime($request->input('tournament.check_in_participant_end_time'), new DateTimeZone('America/New_York')),
                'timezone' => 'America/New_York'
            ])
            ->save();

        return redirect()->route('platform.tournaments');
    }

}

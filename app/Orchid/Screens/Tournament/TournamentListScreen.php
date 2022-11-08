<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Tournament;

use App\Models\Tournament;
use App\Orchid\Layouts\System\Tournament\TournamentListLayout;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;

class TournamentListScreen extends Screen
{


    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        # Return all "Phases" with their attached settings
        return [
            'tournament' => Tournament::paginate(),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Tournaments';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'All Active Tournaments';
    }

    /**
     * @return iterable|null
     */
    public function permission(): ?iterable
    {
        return [
            'platform.tournaments',
        ];
    }
    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make(__('Add'))
                ->icon('plus')
                ->route('platform.tournaments.create'),
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

            TournamentListLayout::class,
        ];
    }
}

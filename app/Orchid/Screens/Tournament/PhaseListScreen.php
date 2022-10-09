<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Tournament;

use App\Models\Phase;
use App\Orchid\Layouts\System\Phase\PhaseListLayout;
use App\Orchid\Layouts\User\UserFiltersLayout;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;

class PhaseListScreen extends Screen
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
            'phase' => Phase::paginate(),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Phases';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'All Available Tournament Phases';
    }

    /**
     * @return iterable|null
     */
    public function permission(): ?iterable
    {
        return [
            'platform.systems.phases',
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
                ->route('platform.systems.phases.create'),
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

            PhaseListLayout::class,
        ];
    }
}

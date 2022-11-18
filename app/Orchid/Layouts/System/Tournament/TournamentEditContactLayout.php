<?php

namespace App\Orchid\Layouts\System\Tournament;

use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class TournamentEditContactLayout extends Rows
{

    protected function fields(): array
    {

        return [

            Input::make('tournament.contact_email')
                ->type('email')
            ->title(__('Contact Email for Tournament Support')),

            Input::make('tournament.discord_url')
                ->type('url')
                ->title(__('Discord Server of Tournament')),

            Input::make('tournament.website_url')
                ->type('url')
                ->title(__('Tournament Host Website')),
        ];
    }
}

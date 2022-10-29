<?php

namespace App\Orchid\Screens\Game;

use App\Models\Game;
use App\Orchid\Layouts\System\Game\GameEditLayout;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class GameEditScreen extends Screen
{
    /**
     * @var Game
     */
    public Game $game;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Game $game): iterable
    {
        return [
            'game' => $game,
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->game->exists ? 'Edit Game' : 'Create Game';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Create and Edit Games that we are able to run Tournaments for. Read Docs for more info';
    }

    /**
     * @return iterable|null
     */
    public function permission(): ?iterable
    {
        return [
            'platform.systems.games',
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

            Button::make(__('Remove'))
                ->icon('trash')
                ->confirm(__('Once the Game is deleted, all of its resources and data will be permanently deleted. Before deleting, please ensure this Game is not being used. DEV TODO - Apply disable button + soft delete'))
                ->method('remove')
                ->canSee($this->game->exists),

            Button::make(__('Save'))
                ->icon('check')
                ->method('save'),
        ];
    }

    public function layout(): iterable
    {
        if ($this->game->exists) {
            return [
                Layout::block(GameEditLayout::class)
                    ->title(__('Phase Information'))
                    ->description(__('Enter Game information here'))
                    ->commands(
                        Button::make(__('Save Info'))
                            ->type(Color::DEFAULT())
                            ->icon('check')
                            ->canSee($this->game->exists)
                            ->method('saveInfo')
                    )
            ];
        }
        return [
            Layout::block(GameEditLayout::class)
                ->title(__('Game Information'))
                ->description(__('Enter Game information here')),
        ];

    }


    public function save(Game $game, Request $request): RedirectResponse
    {
        $game->fill($request->collect('game')->toArray())
            ->save();
        Toast::info(__('Game was saved.'));
        return redirect()->route('platform.systems.games');
    }

    public function saveInfo(Game $game, Request $request)
    {
        $game->fill($request->collect('game')->toArray())
            ->save();
        Toast::info(__('Game was saved.'));
    }
}

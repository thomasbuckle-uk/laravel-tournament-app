<?php

declare(strict_types=1);

namespace App\Orchid;

use App\Models\User;
use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Orchid\Support\Color;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * @param Dashboard $dashboard
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);
        Dashboard::useModel(
            \Orchid\Platform\Models\User::class,
            User::class
        );


    }

    /**
     * @return Menu[]
     */
    public function registerMainMenu(): array
    {
        return [

            Menu::make('Platform Configuration')
                ->icon('arrow-down')
                ->list([
                    Menu::make(__('Phases'))
                        ->icon('wrench')
                        ->route('platform.systems.phases')
                        ->permission('platform.systems.phases'),
                    Menu::make(__('Games'))
                        ->icon('wrench')
                        ->route('platform.systems.games')
                        ->permission('platform.systems.games'),
                ]),

            Menu::make(__('Tournaments'))
                ->icon('wrench')
            ->route('platform.tournaments')
            ->permission('platform.tournaments'),

            Menu::make(__('Users'))
                ->icon('user')
                ->route('platform.systems.users')
                ->permission('platform.systems.users')
                ->title(__('Access rights')),

            Menu::make(__('Roles'))
                ->icon('lock')
                ->route('platform.systems.roles')
                ->permission('platform.systems.roles'),


        ];
    }

    /**
     * @return Menu[]
     */
    public function registerProfileMenu(): array
    {
        return [
            Menu::make('Profile')
                ->route('platform.profile')
                ->icon('user'),
        ];
    }

    /**
     * @return ItemPermission[]
     */
    public function registerPermissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users')),
            ItemPermission::group(__('Tournaments'))
                ->addPermission('platform.tournaments', __('Tournaments'))
                ->addPermission('platform.tournaments.create', __('Create Tournaments'))
                ->addPermission('platform.tournaments.edit', __('Edit Tournaments')),
        ];
    }
}

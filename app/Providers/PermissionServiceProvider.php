<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Dashboard $dashboard): void
    {
        $permissions = ItemPermission::group('Platform Configuration')
            ->addPermission('platform.systems.phases', 'Tournaments');

        $dashboard->registerPermissions($permissions);
    }
}

<?php

namespace App\Providers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\ServiceProvider;

class SchemaBlueprintServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        Blueprint::macro('auditable', function () {
            $this->foreignId('user_id')->constrained('users');
        });
        Blueprint::macro('dropAuditable', function () {
            $this->dropColumn(['user_id']);
        });
        Blueprint::macro('auditableWithNullable', function () {
            $this->foreignId('user_id')->nullable()->constrained('users');
        });
        Blueprint::macro('dropAuditable', function () {
            $this->dropColumn(['user_id']);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

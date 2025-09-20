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
            $this->foreignId('created_by')->constrained('users');
        });
        Blueprint::macro('dropAuditable', function () {
            $this->dropColumn(['created_by']);
        });
        Blueprint::macro('auditableWithNullable', function () {
            $this->foreignId('created_by')->nullable()->constrained('users');
        });
        Blueprint::macro('dropAuditable', function () {
            $this->dropColumn(['created_by']);
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

<?php
namespace App\Providers;
use App\Models\Service;
use App\Policies\ServicePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Service::class => ServicePolicy::class,
    ];
    public function boot(): void
    {
    }
}
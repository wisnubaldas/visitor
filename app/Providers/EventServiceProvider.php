<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Models\PintuMasuk;
use App\Observers\PintuMasukObserver;
use App\Models\PintuKeluar;
use App\Observers\PintuKeluarObserver;
class EventServiceProvider extends ServiceProvider
{
    
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        PintuMasuk::observe(PintuMasukObserver::class);
        PintuKeluar::observe(PintuKeluarObserver::class);
    }
}

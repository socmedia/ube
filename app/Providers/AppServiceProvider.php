<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // $contact = ContactsAttribute::orderBy('id')->get()->toArray();

        // $instagram = count($contact) > 0 ? $contact[0] : null;
        // $email = count($contact) > 1 ? $contact[1] : null;
        // $phone_1 = count($contact) > 2 ? $contact[2] : null;
        // $maps = count($contact) > 3 ? $contact[3] : null;
        // $address = count($contact) > 4 ? $contact[4] : null;
        // $phone_2 = count($contact) > 5 ? $contact[5] : null;
        // $whatsapp = count($contact) > 6 ? $contact[6] : null;
        // $catalogue = count($contact) > 7 ? $contact[7] : null;
        // $facebook = count($contact) > 8 ? $contact[8] : null;

        // $igTemp = explode('/', $instagram['value']);
        // $instagramValue = [
        //     'url' => $instagram ? $instagram['value'] : null,
        //     'account' => '@' . end($igTemp),
        // ];

        // $fbTemp = explode('/', $facebook['value']);
        // $facebookValue = [
        //     'url' => $facebook ? $facebook['value'] : null,
        //     'account' => '@' . end($fbTemp),
        // ];

        // view()->share('instagram_url', $instagramValue['url']);
        // view()->share('instagram_account', $instagramValue['account']);
        // view()->share('facebook_url', $facebookValue['url']);
        // view()->share('facebook_account', $facebookValue['account']);
        // view()->share('email', $email ? $email['value'] : null);
        // view()->share('phone_1', $phone_1 ? $phone_1['value'] : null);
        // view()->share('phone_2', $phone_2 ? $phone_2['value'] : null);
        // view()->share('maps', $maps ? $maps['value'] : null);
        // view()->share('address', $address ? $address['value'] : null);
        // view()->share('whatsapp', $whatsapp ? $whatsapp['value'] : null);
        // view()->share('catalogue', $catalogue ? $catalogue['value'] : null);
    }
}
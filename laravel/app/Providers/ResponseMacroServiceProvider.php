<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('success', function (string $view, array $data = []) {
            return view($view)->with($data);
        });

        /**
         * $data = ↓
         * errors
         *  key: [value]
         */
        Response::macro('fail', function (array $data = []) {
            return redirect()->with($data);
        });
    }
}

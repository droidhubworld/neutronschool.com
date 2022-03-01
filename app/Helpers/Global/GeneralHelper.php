<?php

if (! function_exists('app_name')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function app_name()
    {
        return config('app.name');
    }
}

if (! function_exists('gravatar')) {
    /**
     * Access the gravatar helper.
     */
    function gravatar()
    {
        return app('gravatar');
    }
}

if (! function_exists('home_route')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function home_route()
    {
        //dd(auth()->user()->hasRole('Executive'));
        if (auth()->check()) {
            // if (auth()->user()->can('view backend')) {
            //     return 'admin.dashboard';
            // }

            if (auth()->user()->hasRole('Administrator')) {
                return 'admin.dashboard';
            }
            if (auth()->user()->hasRole('Trainer')) {
                return 'trainer.dashboard';
            }

            return 'frontend.user.dashboard';

        }

        return 'frontend.auth.login';
    }
}

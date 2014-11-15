<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/15/2014
     * Time: 1:11 PM
     */

    namespace AppartmentManager\ServiceProviders;


    use Illuminate\Support\ServiceProvider;

    class EventsServiceProvider extends ServiceProvider
    {

        /**
         * Register the service provider.
         *
         * @return void
         */
        public function register()
        {
            \Event::subscribe('AppartmentManager\EventListeners\ComplaintsEventListener');
        }
    }
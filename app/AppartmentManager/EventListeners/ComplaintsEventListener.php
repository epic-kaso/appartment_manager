<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/15/2014
     * Time: 1:00 PM
     */

    namespace AppartmentManager\EventListeners;


    use AppartmentManager\Events\TenantCreatesComplaint;

    class ComplaintsEventListener
    {
        public function onTenantCreatesComplaint($event)
        {
            dd('event called');
        }

        public function subscribe($events)
        {
            $events->listen(
                TenantCreatesComplaint::class,
                'AppartmentManager\EventListeners\ComplaintsEventListener@onTenantCreatesComplaint'
            );
        }
    }
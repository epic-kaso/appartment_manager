<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/15/2014
     * Time: 7:44 AM
     */

    namespace AppartmentManager\Filters\Tenant;


    use AppartmentManager\Repository\Admin\TenantRepository;

    class TenantFilter
    {


        /**
         * @var TenantRepository
         */
        private $tenantRepository;

        function __construct(TenantRepository $tenantRepository)
        {
            $this->tenantRepository = $tenantRepository;
        }

        public function filter()
        {
            if (!$this->tenantRepository->getCurrentTenant()) {
                if (\Request::ajax()) {
                    return \Response::make('Unauthorized', 401);
                } else {
                    return \Redirect::action('AppartmentManager\Controllers\Tenant\Auth\AuthController@getLogin');
                }
            }
        }
    }
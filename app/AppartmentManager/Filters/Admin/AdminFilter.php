<?php namespace AppartmentManager\Filters\Admin;

use AppartmentManager\Repository\Admin\AdminRepository;

/**
 * Created by PhpStorm.
 * User: kaso
 * Date: 11/15/2014
 * Time: 1:20 PM
 */
class AdminFilter
{


    /**
     * @var AdminRepository
     */
    private $adminRepository;

    function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function filter()
    {
        if (!$this->adminRepository->getCurrentAdmin()) {
            if (\Request::ajax()) {
                return \Response::make('Unauthorized', 401);
            } else {
                return \Redirect::action('AppartmentManager\Controllers\Admin\Auth\AuthController@getLogin');
            }
        }
    }
}
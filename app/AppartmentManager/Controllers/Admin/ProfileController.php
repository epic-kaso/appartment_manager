<?php namespace AppartmentManager\Controllers\Admin;

use AppartmentManager\Controllers\BaseController;
use AppartmentManager\Repository\Admin\AdminRepository;

class ProfileController extends BaseController
{

    /**
     */
    private $adminRepository;

    function __construct(AdminRepository $adminRepository)
    {
        $this->beforeFilter('admin_auth');

        $this->adminRepository = $adminRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        $admin = $this->adminRepository->getCurrentAdmin();

        return \View::make('admin.profile.show', compact('admin'))
            ->with('message', \Session::get('message'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function getEdit()
    {
        $admin = $this->adminRepository->getCurrentAdmin();

        return \View::make('admin.profile.edit', compact('admin'))
            ->with('message', \Session::get('message'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @return Response
     */
    public function putUpdate()
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @return Response
     */
    public function postDestroy()
    {
        //
    }


}

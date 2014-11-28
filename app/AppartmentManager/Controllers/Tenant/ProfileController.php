<?php namespace AppartmentManager\Controllers\Tenant;

use AppartmentManager\Controllers\BaseController;
use AppartmentManager\Repository\Admin\TenantRepository;

class ProfileController extends BaseController
{

    /**
     * @var TenantRepository
     */
    private $tenantRepository;

    function __construct(TenantRepository $tenantRepository)
    {
        $this->beforeFilter('tenant_auth');
        $this->tenantRepository = $tenantRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        $tenant = $this->tenantRepository->getCurrentTenant();

        return \View::make('tenant.profile.show', compact('tenant'))
            ->with('message', \Session::get('message'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function getEdit()
    {
        $tenant = $this->tenantRepository->getCurrentTenant();

        return \View::make('tenant.profile.edit', compact('tenant'))
            ->with('message', \Session::get('message'));;
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

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
    public function index()
    {
        $tenant = $this->tenantRepository->getCurrentTenant();

        return \View::make('tenant.profile.show', compact('tenant'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit()
    {
        $tenant = $this->tenantRepository->getCurrentTenant();

        return \View::make('tenant.profile.edit', compact('tenant'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @return Response
     */
    public function update()
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @return Response
     */
    public function destroy()
    {
        //
    }


}

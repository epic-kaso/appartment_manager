<?php namespace AppartmentManager\Controllers\Tenant;

use AppartmentManager\Controllers\BaseController;
use AppartmentManager\Repository\Admin\TenantRepository;

class DashboardController extends BaseController
{

    /**
     * @var TenantRepository
     */
    private $tenantRepository;

    function __construct(TenantRepository $tenantRepository)
    {
        $this->tenantRepository = $tenantRepository;
        $this->beforeFilter('tenant_auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tenant = $this->tenantRepository->getCurrentTenant();

        return \View::make('tenant.dashboard', compact('tenant'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


}

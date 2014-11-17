<?php namespace AppartmentManager\Controllers\Admin;

use AppartmentManager\Controllers\BaseController;
use AppartmentManager\Repository\Admin\AdminRepository;
use AppartmentManager\Repository\Admin\TenantRepository;

class DashboardController extends BaseController
{

    /**
     * @var TenantRepository
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
    public function index()
    {
        $admin = $this->adminRepository->getCurrentAdmin();

        return \View::make('admin.dashboard', compact('admin'));
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

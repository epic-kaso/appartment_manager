<?php namespace AppartmentManager\Controllers\Admin;

use AppartmentManager\Commands\Admin\TenantCommand;
use AppartmentManager\Controllers\BaseController;
use AppartmentManager\Repository\Admin\AdminRepository;
use AppartmentManager\Repository\Admin\AppartmentRepository;
use AppartmentManager\Repository\Admin\TenantRepository;
use AppartmentManager\RequestValidators\Admin\TenantValidator;

class TenantController extends BaseController
{

    /**
     * @var TenantRepository
     */
    private $tenantRepository;
    /**
     * @var AppartmentRepository
     */
    private $appartmentRepository;
    /**
     * @var TenantValidator
     */
    private $tenantValidator;
    /**
     * @var TenantCommand
     */
    private $tenantCommand;
    /**
     * @var AdminRepository
     */
    private $adminRepository;

    function __construct(
        TenantRepository $tenantRepository,
        AppartmentRepository $appartmentRepository,
        TenantValidator $tenantValidator,
        TenantCommand $tenantCommand,
        AdminRepository $adminRepository
    )
    {
        $this->tenantRepository = $tenantRepository;
        $this->appartmentRepository = $appartmentRepository;
        $this->tenantValidator = $tenantValidator;
        $this->tenantCommand = $tenantCommand;
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
        $tenants = $this->tenantRepository->all();
        $admin = $this->adminRepository->getCurrentAdmin();

        return \View::make('admin.tenant.index', compact('tenants', 'admin'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $admin = $this->adminRepository->getCurrentAdmin();
        $appartments = $this->appartmentRepository->getVacantAppartmentsList('appartment_id', 'id');

        return \View::make('admin.tenant.create', compact('appartments', 'admin'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $data = \Input::only(['last_name', 'first_name', 'email', 'phone', 'appartment_id', 'password', 'password_confirmation']);

        $validation = $this->tenantValidator->validate($data);

        if ($validation->fails()) {
            return \Redirect::back()->withInput()->withErrors($validation);
        }

        unset($data['password_confirmation']);

        $this->tenantCommand->execute($data);

        return \Redirect::route('tenant.index')->withMessage('Created Successfully');

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

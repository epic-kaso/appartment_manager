<?php namespace AppartmentManager\Controllers\Admin;

use AppartmentManager\Commands\Admin\ComplaintsCategoryCommand;
use AppartmentManager\Controllers\BaseController;
use AppartmentManager\Repository\Admin\AdminRepository;
use AppartmentManager\Repository\Admin\ComplaintsCategoryRepository;
use AppartmentManager\RequestValidators\Admin\ComplaintsCategoryValidator;

class ComplaintsCategoryController extends BaseController
{
    /**
     * @var ComplaintsCategoryRepository
     */
    private $complaintsCategoryRepository;
    /**
     * @var AdminRepository
     */
    private $adminRepository;
    /**
     * @var ComplaintsCategoryValidator
     */
    private $categoryValidator;
    /**
     * @var ComplaintsCategoryCommand
     */
    private $complaintsCategoryCommand;

    function __construct(
        ComplaintsCategoryRepository $complaintsCategoryRepository,
        ComplaintsCategoryCommand $complaintsCategoryCommand,
        ComplaintsCategoryValidator $categoryValidator,
        AdminRepository $adminRepository
    )
    {
        $this->complaintsCategoryRepository = $complaintsCategoryRepository;
        $this->adminRepository = $adminRepository;
        $this->categoryValidator = $categoryValidator;
        $this->complaintsCategoryCommand = $complaintsCategoryCommand;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = $this->complaintsCategoryRepository->all();

        return \View::make('admin.complaints.category.index', compact('categories'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $admins = $this->adminRepository->getAdminsAsList('email', 'id', TRUE);

        return \View::make('admin.complaints.category.create', compact('admins'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $data = \Input::only(['name', 'description', 'admin_id']);
        $validation = $this->categoryValidator->validate($data);

        if ($validation->fails()) {
            return \Redirect::back()->withInput()->withErrors($validation);
        }

        $this->complaintsCategoryCommand->execute($data);

        return \Redirect::route('complaints.category.index')
            ->withMessage('Created Successfully');

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
        $admins = $this->adminRepository->getAdminsAsList('email', 'id', TRUE);
        $complaint = $this->complaintsCategoryRepository->read($id);

        return \View::make('admin.complaints.category.edit', compact('admins', 'complaint'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {

        $data = \Input::only(['name', 'description', 'admin_id']);
        $this->categoryValidator->setEditValidation();

        $validation = $this->categoryValidator->validate($data);

        if ($validation->fails()) {
            return \Redirect::back()->withInput()->withErrors($validation);
        }

        $this->complaintsCategoryRepository->update($id, $data);

        return \Redirect::route('complaints.category.index')
            ->withMessage('Updated Successfully');

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

<?php namespace AppartmentManager\Controllers\Admin;

use AppartmentManager\Commands\Admin\AppartmentCommand;
use AppartmentManager\Controllers\BaseController;
use AppartmentManager\Repository\Admin\AdminRepository;
use AppartmentManager\Repository\Admin\AppartmentRepository;
use AppartmentManager\RequestValidators\Admin\AppartmentValidator;

class AppartmentController extends BaseController
{


    /**
     * @var AppartmentCommand
     */
    private $appartmentCommand;
    /**
     * @var AppartmentValidator
     */
    private $appartmentValidator;
    /**
     * @var AppartmentRepository
     */
    private $appartmentRepository;
    /**
     * @var AdminRepository
     */
    private $adminRepository;

    /**
     * @param AppartmentCommand $appartmentCommand
     * @param AppartmentValidator $appartmentValidator
     * @param AppartmentRepository $appartmentRepository
     * @param AdminRepository $adminRepository
     */
    function __construct(
        AppartmentCommand $appartmentCommand,
        AppartmentValidator $appartmentValidator,
        AppartmentRepository $appartmentRepository,
        AdminRepository $adminRepository
    )
    {
        $this->beforeFilter('admin_auth');

        $this->appartmentCommand = $appartmentCommand;
        $this->appartmentValidator = $appartmentValidator;
        $this->appartmentRepository = $appartmentRepository;
        $this->adminRepository = $adminRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex($slug = NULL)
    {
        //dd($slug);
        $limit = \Input::get('size', 20);
        $blocks = $this->appartmentRepository->blocks();
        $admin = $this->adminRepository->getCurrentAdmin();

        $appartments =
            empty($slug) ?
                $this->appartmentRepository->all($limit) :
                $this->appartmentRepository->allForSlug($slug, $limit);

        return \View::make('admin.appartment.index', compact('appartments', 'admin', 'blocks'))
            ->with('message', \Session::get('message'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
        $admin = $this->adminRepository->getCurrentAdmin();

        return \View::make('admin.appartment.create', compact('admin'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate()
    {
        $data = \Input::only(['block_name', 'block_size', 'unit_prefix']);

        $validation = $this->appartmentValidator->validate($data);

        if ($validation->fails()) {
            return \Redirect::back()->withInput()->withErrors($validation);
        }

        $this->appartmentCommand->execute($data);

        return \Redirect::action('AppartmentManager\Controllers\Admin\AppartmentController@getIndex')->withMessage('Created Successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function getShow($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function getEdit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function postUpdate($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function postDestroy($id)
    {
        $this->appartmentRepository->delete($id);

        return \Redirect::action('AppartmentManager\Controllers\Admin\AppartmentController@getIndex')->withMessage('Deleted Successfully');
    }


}

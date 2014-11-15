<?php namespace AppartmentManager\Controllers\Admin;

use AppartmentManager\Commands\Admin\AppartmentCommand;
use AppartmentManager\Controllers\BaseController;
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
     * @param AppartmentCommand $appartmentCommand
     * @param AppartmentValidator $appartmentValidator
     * @param AppartmentRepository $appartmentRepository
     */
    function __construct(
        AppartmentCommand $appartmentCommand,
        AppartmentValidator $appartmentValidator,
        AppartmentRepository $appartmentRepository
    )
    {
        $this->appartmentCommand = $appartmentCommand;
        $this->appartmentValidator = $appartmentValidator;
        $this->appartmentRepository = $appartmentRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $limit = \Input::get('size', 20);
        $appartments = $this->appartmentRepository->all($limit);

        return \View::make('admin.appartment.index', compact('appartments'))
            ->with('message', \Session::get('message'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return \View::make('admin.appartment.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $data = \Input::only(['block_name', 'block_size']);
        $validation = $this->appartmentValidator->validate($data);

        if ($validation->fails()) {
            return \Redirect::back()->withInput()->withErrors($validation);
        }

        $this->appartmentCommand->execute($data);

        return \Redirect::route('appartment.index')->withMessage('Created Successfully');
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

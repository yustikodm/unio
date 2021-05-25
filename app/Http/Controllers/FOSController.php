<?php

namespace App\Http\Controllers;

use App\DataTables\FOSDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateFOSRequest;
use App\Http\Requests\UpdateFOSRequest;
use App\Repositories\FOSRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class FOSController extends AppBaseController
{
    /** @var  FOSRepository */
    private $fOSRepository;

    public function __construct(FOSRepository $fOSRepo)
    {
        $this->fOSRepository = $fOSRepo;
    }

    /**
     * Display a listing of the FOS.
     *
     * @param FOSDataTable $fOSDataTable
     * @return Response
     */
    public function index(FOSDataTable $fOSDataTable)
    {
        return $fOSDataTable->render('f_o_s.index');
    }

    /**
     * Show the form for creating a new FOS.
     *
     * @return Response
     */
    public function create()
    {
        return view('f_o_s.create');
    }

    /**
     * Store a newly created FOS in storage.
     *
     * @param CreateFOSRequest $request
     *
     * @return Response
     */
    public function store(CreateFOSRequest $request)
    {
        $input = $request->all();

        $fOS = $this->fOSRepository->create($input);

        Flash::success('F O S saved successfully.');

        return redirect(route('fOS.index'));
    }

    /**
     * Display the specified FOS.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fOS = $this->fOSRepository->find($id);

        if (empty($fOS)) {
            Flash::error('F O S not found');

            return redirect(route('fOS.index'));
        }

        return view('f_o_s.show')->with('fOS', $fOS);
    }

    /**
     * Show the form for editing the specified FOS.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $fOS = $this->fOSRepository->find($id);

        if (empty($fOS)) {
            Flash::error('F O S not found');

            return redirect(route('fOS.index'));
        }

        return view('f_o_s.edit')->with('fOS', $fOS);
    }

    /**
     * Update the specified FOS in storage.
     *
     * @param  int              $id
     * @param UpdateFOSRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFOSRequest $request)
    {
        $fOS = $this->fOSRepository->find($id);

        if (empty($fOS)) {
            Flash::error('F O S not found');

            return redirect(route('fOS.index'));
        }

        $fOS = $this->fOSRepository->update($request->all(), $id);

        Flash::success('F O S updated successfully.');

        return redirect(route('fOS.index'));
    }

    /**
     * Remove the specified FOS from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fOS = $this->fOSRepository->find($id);

        if (empty($fOS)) {
            Flash::error('F O S not found');

            return redirect(route('fOS.index'));
        }

        $this->fOSRepository->delete($id);

        Flash::success('F O S deleted successfully.');

        return redirect(route('fOS.index'));
    }
}

<?php

namespace App\Http\Controllers;

use App\DataTables\TipeParameterDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTipeParameterRequest;
use App\Http\Requests\UpdateTipeParameterRequest;
use App\Repositories\TipeParameterRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TipeParameterController extends AppBaseController
{
    /** @var  TipeParameterRepository */
    private $tipeParameterRepository;

    public function __construct(TipeParameterRepository $tipeParameterRepo)
    {
        $this->tipeParameterRepository = $tipeParameterRepo;
    }

    /**
     * Display a listing of the TipeParameter.
     *
     * @param TipeParameterDataTable $tipeParameterDataTable
     * @return Response
     */
    public function index(TipeParameterDataTable $tipeParameterDataTable)
    {
        return $tipeParameterDataTable->render('tipe_parameter.index');
    }

    /**
     * Show the form for creating a new TipeParameter.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipe_parameter.create');
    }

    /**
     * Store a newly created TipeParameter in storage.
     *
     * @param CreateTipeParameterRequest $request
     *
     * @return Response
     */
    public function store(CreateTipeParameterRequest $request)
    {
        $input = $request->all();

        $tipeParameter = $this->tipeParameterRepository->create($input);

        Flash::success('Tipe Parameter saved successfully.');

        return redirect(route('tipeParameter.index'));
    }

    /**
     * Display the specified TipeParameter.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipeParameter = $this->tipeParameterRepository->find($id);

        if (empty($tipeParameter)) {
            Flash::error('Tipe Parameter not found');

            return redirect(route('tipeParameter.index'));
        }

        return view('tipe_parameter.show')->with('tipeParameter', $tipeParameter);
    }

    /**
     * Show the form for editing the specified TipeParameter.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipeParameter = $this->tipeParameterRepository->find($id);

        if (empty($tipeParameter)) {
            Flash::error('Tipe Parameter not found');

            return redirect(route('tipeParameter.index'));
        }

        return view('tipe_parameter.edit')->with('tipeParameter', $tipeParameter);
    }

    /**
     * Update the specified TipeParameter in storage.
     *
     * @param  int              $id
     * @param UpdateTipeParameterRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipeParameterRequest $request)
    {
        $tipeParameter = $this->tipeParameterRepository->find($id);

        if (empty($tipeParameter)) {
            Flash::error('Tipe Parameter not found');

            return redirect(route('tipeParameter.index'));
        }

        $tipeParameter = $this->tipeParameterRepository->update($request->all(), $id);

        Flash::success('Tipe Parameter updated successfully.');

        return redirect(route('tipeParameter.index'));
    }

    /**
     * Remove the specified TipeParameter from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipeParameter = $this->tipeParameterRepository->find($id);

        if (empty($tipeParameter)) {
            Flash::error('Tipe Parameter not found');

            return redirect(route('tipeParameter.index'));
        }

        $this->tipeParameterRepository->delete($id);

        Flash::success('Tipe Parameter deleted successfully.');

        return redirect(route('tipeParameter.index'));
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateJabatanAPIRequest;
use App\Http\Requests\API\UpdateJabatanAPIRequest;
use App\Models\Jabatan;
use App\Repositories\JabatanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class JabatanController
 * @package App\Http\Controllers\API
 */

class JabatanAPIController extends AppBaseController
{
    /** @var  JabatanRepository */
    private $jabatanRepository;

    public function __construct(JabatanRepository $jabatanRepo)
    {
        $this->jabatanRepository = $jabatanRepo;
    }

    /**
     * Display a listing of the Jabatan.
     * GET|HEAD /jabatan
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $jabatan = $this->jabatanRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($jabatan->toArray(), 'Jabatan retrieved successfully');
    }

    /**
     * Store a newly created Jabatan in storage.
     * POST /jabatan
     *
     * @param CreateJabatanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateJabatanAPIRequest $request)
    {
        $input = $request->all();

        $jabatan = $this->jabatanRepository->create($input);

        return $this->sendResponse($jabatan->toArray(), 'Jabatan saved successfully');
    }

    /**
     * Display the specified Jabatan.
     * GET|HEAD /jabatan/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Jabatan $jabatan */
        $jabatan = $this->jabatanRepository->find($id);

        if (empty($jabatan)) {
            return $this->sendError('Jabatan not found');
        }

        return $this->sendResponse($jabatan->toArray(), 'Jabatan retrieved successfully');
    }

    /**
     * Update the specified Jabatan in storage.
     * PUT/PATCH /jabatan/{id}
     *
     * @param int $id
     * @param UpdateJabatanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJabatanAPIRequest $request)
    {
        $input = $request->all();

        /** @var Jabatan $jabatan */
        $jabatan = $this->jabatanRepository->find($id);

        if (empty($jabatan)) {
            return $this->sendError('Jabatan not found');
        }

        $jabatan = $this->jabatanRepository->update($input, $id);

        return $this->sendResponse($jabatan->toArray(), 'Jabatan updated successfully');
    }

    /**
     * Remove the specified Jabatan from storage.
     * DELETE /jabatan/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Jabatan $jabatan */
        $jabatan = $this->jabatanRepository->find($id);

        if (empty($jabatan)) {
            return $this->sendError('Jabatan not found');
        }

        $jabatan->delete();

        return $this->sendSuccess('Jabatan deleted successfully');
    }
}

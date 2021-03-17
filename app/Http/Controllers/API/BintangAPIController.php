<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBintangAPIRequest;
use App\Http\Requests\API\UpdateBintangAPIRequest;
use App\Models\Bintang;
use App\Repositories\BintangRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BintangController
 * @package App\Http\Controllers\API
 */

class BintangAPIController extends AppBaseController
{
    /** @var  BintangRepository */
    private $bintangRepository;

    public function __construct(BintangRepository $bintangRepo)
    {
        $this->bintangRepository = $bintangRepo;
    }

    /**
     * Display a listing of the Bintang.
     * GET|HEAD /bintang
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $bintang = $this->bintangRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($bintang->toArray(), 'Bintang retrieved successfully');
    }

    /**
     * Store a newly created Bintang in storage.
     * POST /bintang
     *
     * @param CreateBintangAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBintangAPIRequest $request)
    {
        $input = $request->all();

        $bintang = $this->bintangRepository->create($input);

        return $this->sendResponse($bintang->toArray(), 'Bintang saved successfully');
    }

    /**
     * Display the specified Bintang.
     * GET|HEAD /bintang/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Bintang $bintang */
        $bintang = $this->bintangRepository->find($id);

        if (empty($bintang)) {
            return $this->sendError('Bintang not found');
        }

        return $this->sendResponse($bintang->toArray(), 'Bintang retrieved successfully');
    }

    /**
     * Update the specified Bintang in storage.
     * PUT/PATCH /bintang/{id}
     *
     * @param int $id
     * @param UpdateBintangAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBintangAPIRequest $request)
    {
        $input = $request->all();

        /** @var Bintang $bintang */
        $bintang = $this->bintangRepository->find($id);

        if (empty($bintang)) {
            return $this->sendError('Bintang not found');
        }

        $bintang = $this->bintangRepository->update($input, $id);

        return $this->sendResponse($bintang->toArray(), 'Bintang updated successfully');
    }

    /**
     * Remove the specified Bintang from storage.
     * DELETE /bintang/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Bintang $bintang */
        $bintang = $this->bintangRepository->find($id);

        if (empty($bintang)) {
            return $this->sendError('Bintang not found');
        }

        $bintang->delete();

        return $this->sendSuccess('Bintang deleted successfully');
    }
}

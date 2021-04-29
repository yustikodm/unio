<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTopupPackageAPIRequest;
use App\Http\Requests\API\UpdateTopupPackageAPIRequest;
use App\Models\TopupPackage;
use App\Repositories\TopupPackageRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\TopupPackageResource;
use Response;

/**
 * Class TopupPackageController
 * @package App\Http\Controllers\API
 */

class TopupPackageAPIController extends AppBaseController
{
    /** @var  TopupPackageRepository */
    private $topupPackageRepository;

    public function __construct(TopupPackageRepository $topupPackageRepo)
    {
        $this->topupPackageRepository = $topupPackageRepo;
    }

    /**
     * Display a listing of the TopupPackage.
     * GET|HEAD /topupPackages
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $topupPackages = $this->topupPackageRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(TopupPackageResource::collection($topupPackages), 'Topup Packages retrieved successfully');
    }

    /**
     * Store a newly created TopupPackage in storage.
     * POST /topupPackages
     *
     * @param CreateTopupPackageAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTopupPackageAPIRequest $request)
    {
        $input = $request->only([
            'code',
            'name',
            'description',
            'amount',
            'due_date',
            'status'
        ]);

        $topupPackage = $this->topupPackageRepository->create($input);

        return $this->sendResponse(new TopupPackageResource($topupPackage), 'Topup Package saved successfully');
    }

    /**
     * Display the specified TopupPackage.
     * GET|HEAD /topupPackages/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TopupPackage $topupPackage */
        $topupPackage = $this->topupPackageRepository->find($id);

        if (empty($topupPackage)) {
            return $this->sendError('Topup Package not found');
        }

        return $this->sendResponse(new TopupPackageResource($topupPackage), 'Topup Package retrieved successfully');
    }

    /**
     * Update the specified TopupPackage in storage.
     * PUT/PATCH /topupPackages/{id}
     *
     * @param int $id
     * @param UpdateTopupPackageAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTopupPackageAPIRequest $request)
    {
        $input = $request->only([
            'code',
            'name',
            'description',
            'amount',
            'due_date',
            'status'
        ]);

        /** @var TopupPackage $topupPackage */
        $topupPackage = $this->topupPackageRepository->find($id);

        if (empty($topupPackage)) {
            return $this->sendError('Topup Package not found');
        }

        $topupPackage = $this->topupPackageRepository->update($input, $id);

        return $this->sendResponse(new TopupPackageResource($topupPackage), 'TopupPackage updated successfully');
    }

    /**
     * Remove the specified TopupPackage from storage.
     * DELETE /topupPackages/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TopupPackage $topupPackage */
        $topupPackage = $this->topupPackageRepository->find($id);

        if (empty($topupPackage)) {
            return $this->sendError('Topup Package not found');
        }

        $topupPackage->delete();

        return $this->sendSuccess('Topup Package deleted successfully');
    }
}

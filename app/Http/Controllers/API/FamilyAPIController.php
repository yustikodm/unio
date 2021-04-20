<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFamilyAPIRequest;
use App\Http\Requests\API\UpdateFamilyAPIRequest;
use App\Models\Family;
use App\Repositories\FamilyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\FamilyResource;
use Response;

/**
 * Class FamilyController
 * @package App\Http\Controllers\API
 */

class FamilyAPIController extends AppBaseController
{
    /** @var  FamilyRepository */
    private $familyRepository;

    public function __construct(FamilyRepository $familyRepo)
    {
        $this->familyRepository = $familyRepo;
    }

    /**
     * Display a listing of the Family.
     * GET|HEAD /families
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $families = $this->familyRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(FamilyResource::collection($families), 'Families retrieved successfully');
    }

    /**
     * Store a newly created Family in storage.
     * POST /families
     *
     * @param CreateFamilyAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFamilyAPIRequest $request)
    {
        $input = $request->only([
            'parent_user',
            'child_user',
            'family_as',
            'family_verified_at',
        ]);

        $family = $this->familyRepository->create($input);

        return $this->sendResponse(new FamilyResource($family), 'Family saved successfully');
    }

    /**
     * Display the specified Family.
     * GET|HEAD /families/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Family $family */
        $family = $this->familyRepository->find($id);

        if (empty($family)) {
            return $this->sendError('Family not found');
        }

        return $this->sendResponse(new FamilyResource($family), 'Family retrieved successfully');
    }

    /**
     * Update the specified Family in storage.
     * PUT/PATCH /families/{id}
     *
     * @param int $id
     * @param UpdateFamilyAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFamilyAPIRequest $request)
    {
        $input = $request->only([
            'parent_user',
            'child_user',
            'family_as',
            'family_verified_at',
        ]);

        /** @var Family $family */
        $family = $this->familyRepository->find($id);

        if (empty($family)) {
            return $this->sendError('Family not found');
        }

        $family = $this->familyRepository->update($input, $id);

        return $this->sendResponse(new FamilyResource($family), 'Family updated successfully');
    }

    /**
     * Remove the specified Family from storage.
     * DELETE /families/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Family $family */
        $family = $this->familyRepository->find($id);

        if (empty($family)) {
            return $this->sendError('Family not found');
        }

        $family->delete();

        return $this->sendSuccess('Family deleted successfully');
    }
}

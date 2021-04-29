<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFamilyAPIRequest;
use App\Http\Requests\API\UpdateFamilyAPIRequest;
use App\Repositories\FamilyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\FamilyResource;

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
    public function index()
    {
        $families = $this->familyRepository->paginate(15);

        return $this->sendResponse($families, 'Families retrieved successfully');
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

        if (!in_array($input['family_as'], ['parent', 'child'])) {
            $input['family_as'] = 'child';
        }

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
        $family = $this->familyRepository->find($id);

        if (empty($family)) {
            return $this->sendError('Family not found');
        }

        $input = $request->only([
            'parent_user',
            'child_user',
            'family_as',
            'family_verified_at',
        ]);

        if (!in_array($input['family_as'], ['parent', 'child'])) {
            $input['family_as'] = 'child';
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

    public function familyList($parentId)
    {
        $families = $this->familyRepository->getFamilyList($parentId);

        if (empty($families)) {
            return $this->sendError('Family not found');
        }

        return $this->sendResponse(FamilyResource::collection($families), 'Family list retrieved successfully');
    }

}

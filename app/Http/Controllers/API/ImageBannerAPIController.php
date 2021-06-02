<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateImageBannerAPIRequest;
use App\Http\Requests\API\UpdateImageBannerAPIRequest;
use App\Models\ImageBanner;
use App\Repositories\ImageBannerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ImageBannerResource;
use Response;

/**
 * Class ImageBannerController
 * @package App\Http\Controllers\API
 */

class ImageBannerAPIController extends AppBaseController
{
    /** @var  ImageBannerRepository */
    private $imageBannerRepository;

    public function __construct(ImageBannerRepository $imageBannerRepo)
    {
        $this->imageBannerRepository = $imageBannerRepo;
    }

    /**
     * Display a listing of the ImageBanner.
     * GET|HEAD /imageBanner
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $imageBanner = $this->imageBannerRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(ImageBannerResource::collection($imageBanner), 'Image Banner retrieved successfully');
    }

    /**
     * Store a newly created ImageBanner in storage.
     * POST /imageBanner
     *
     * @param CreateImageBannerAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateImageBannerAPIRequest $request)
    {
        $input = $request->all();

        $imageBanner = $this->imageBannerRepository->create($input);

        return $this->sendResponse(new ImageBannerResource($imageBanner), 'Image Banner saved successfully');
    }

    /**
     * Display the specified ImageBanner.
     * GET|HEAD /imageBanner/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ImageBanner $imageBanner */
        $imageBanner = $this->imageBannerRepository->find($id);

        if (empty($imageBanner)) {
            return $this->sendError('Image Banner not found');
        }

        return $this->sendResponse(new ImageBannerResource($imageBanner), 'Image Banner retrieved successfully');
    }

    /**
     * Update the specified ImageBanner in storage.
     * PUT/PATCH /imageBanner/{id}
     *
     * @param int $id
     * @param UpdateImageBannerAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateImageBannerAPIRequest $request)
    {
        $input = $request->all();

        /** @var ImageBanner $imageBanner */
        $imageBanner = $this->imageBannerRepository->find($id);

        if (empty($imageBanner)) {
            return $this->sendError('Image Banner not found');
        }

        $imageBanner = $this->imageBannerRepository->update($input, $id);

        return $this->sendResponse(new ImageBannerResource($imageBanner), 'ImageBanner updated successfully');
    }

    /**
     * Remove the specified ImageBanner from storage.
     * DELETE /imageBanner/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ImageBanner $imageBanner */
        $imageBanner = $this->imageBannerRepository->find($id);

        if (empty($imageBanner)) {
            return $this->sendError('Image Banner not found');
        }

        $imageBanner->delete();

        return $this->sendSuccess('Image Banner deleted successfully');
    }
}

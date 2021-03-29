<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBoardingHouseAPIRequest;
use App\Http\Requests\API\UpdateBoardingHouseAPIRequest;
use App\Models\BoardingHouse;
use App\Repositories\BoardingHouseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\BoardingHouseResource;
use Response;

/**
 * Class BoardingHouseController
 * @package App\Http\Controllers\API
 */

class BoardingHouseAPIController extends AppBaseController
{
    /** @var  BoardingHouseRepository */
    private $boardingHouseRepository;

    public function __construct(BoardingHouseRepository $boardingHouseRepo)
    {
        $this->boardingHouseRepository = $boardingHouseRepo;
    }

    /**
     * Display a listing of the BoardingHouse.
     * GET|HEAD /boardingHouses
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $boardingHouses = $this->boardingHouseRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(BoardingHouseResource::collection($boardingHouses), 'Boarding Houses retrieved successfully');
    }

    /**
     * Store a newly created BoardingHouse in storage.
     * POST /boardingHouses
     *
     * @param CreateBoardingHouseAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBoardingHouseAPIRequest $request)
    {
        $input = $request->only([
            'country_id',
            'state_id',
            'district_id',
            'currency_id',
            'name',
            'description',
            'price',
            'address',
            'phone',
            'picture'
        ]);

        $boardingHouse = $this->boardingHouseRepository->create($input);

        return $this->sendResponse(new BoardingHouseResource($boardingHouse), 'Boarding House saved successfully');
    }

    /**
     * Display the specified BoardingHouse.
     * GET|HEAD /boardingHouses/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BoardingHouse $boardingHouse */
        $boardingHouse = $this->boardingHouseRepository->find($id);

        if (empty($boardingHouse)) {
            return $this->sendError('Boarding House not found');
        }

        return $this->sendResponse(new BoardingHouseResource($boardingHouse), 'Boarding House retrieved successfully');
    }

    /**
     * Update the specified BoardingHouse in storage.
     * PUT/PATCH /boardingHouses/{id}
     *
     * @param int $id
     * @param UpdateBoardingHouseAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBoardingHouseAPIRequest $request)
    {
        $input = $request->only([
            'country_id',
            'state_id',
            'district_id',
            'currency_id',
            'name',
            'description',
            'price',
            'address',
            'phone',
            'picture'
        ]);

        /** @var BoardingHouse $boardingHouse */
        $boardingHouse = $this->boardingHouseRepository->find($id);

        if (empty($boardingHouse)) {
            return $this->sendError('Boarding House not found');
        }

        $boardingHouse = $this->boardingHouseRepository->update($input, $id);

        return $this->sendResponse(new BoardingHouseResource($boardingHouse), 'BoardingHouse updated successfully');
    }

    /**
     * Remove the specified BoardingHouse from storage.
     * DELETE /boardingHouses/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BoardingHouse $boardingHouse */
        $boardingHouse = $this->boardingHouseRepository->find($id);

        if (empty($boardingHouse)) {
            return $this->sendError('Boarding House not found');
        }

        $boardingHouse->delete();

        return $this->sendSuccess('Boarding House deleted successfully');
    }
}

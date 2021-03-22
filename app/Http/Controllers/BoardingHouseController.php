<?php

namespace App\Http\Controllers;

use App\DataTables\BoardingHouseDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBoardingHouseRequest;
use App\Http\Requests\UpdateBoardingHouseRequest;
use App\Repositories\BoardingHouseRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BoardingHouseController extends AppBaseController
{
    /** @var  BoardingHouseRepository */
    private $boardingHouseRepository;

    public function __construct(BoardingHouseRepository $boardingHouseRepo)
    {
        $this->boardingHouseRepository = $boardingHouseRepo;
    }

    /**
     * Display a listing of the BoardingHouse.
     *
     * @param BoardingHouseDataTable $boardingHouseDataTable
     * @return Response
     */
    public function index(BoardingHouseDataTable $boardingHouseDataTable)
    {
        return $boardingHouseDataTable->render('boarding_houses.index');
    }

    /**
     * Show the form for creating a new BoardingHouse.
     *
     * @return Response
     */
    public function create()
    {
        return view('boarding_houses.create');
    }

    /**
     * Store a newly created BoardingHouse in storage.
     *
     * @param CreateBoardingHouseRequest $request
     *
     * @return Response
     */
    public function store(CreateBoardingHouseRequest $request)
    {
        $input = $request->all();

        $boardingHouse = $this->boardingHouseRepository->create($input);

        Flash::success('Boarding House saved successfully.');

        return redirect(route('boardingHouses.index'));
    }

    /**
     * Display the specified BoardingHouse.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $boardingHouse = $this->boardingHouseRepository->find($id);

        if (empty($boardingHouse)) {
            Flash::error('Boarding House not found');

            return redirect(route('boardingHouses.index'));
        }

        return view('boarding_houses.show')->with('boardingHouse', $boardingHouse);
    }

    /**
     * Show the form for editing the specified BoardingHouse.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $boardingHouse = $this->boardingHouseRepository->find($id);

        if (empty($boardingHouse)) {
            Flash::error('Boarding House not found');

            return redirect(route('boardingHouses.index'));
        }

        return view('boarding_houses.edit')->with('boardingHouse', $boardingHouse);
    }

    /**
     * Update the specified BoardingHouse in storage.
     *
     * @param  int              $id
     * @param UpdateBoardingHouseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBoardingHouseRequest $request)
    {
        $boardingHouse = $this->boardingHouseRepository->find($id);

        if (empty($boardingHouse)) {
            Flash::error('Boarding House not found');

            return redirect(route('boardingHouses.index'));
        }

        $boardingHouse = $this->boardingHouseRepository->update($request->all(), $id);

        Flash::success('Boarding House updated successfully.');

        return redirect(route('boardingHouses.index'));
    }

    /**
     * Remove the specified BoardingHouse from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $boardingHouse = $this->boardingHouseRepository->find($id);

        if (empty($boardingHouse)) {
            Flash::error('Boarding House not found');

            return redirect(route('boardingHouses.index'));
        }

        $this->boardingHouseRepository->delete($id);

        Flash::success('Boarding House deleted successfully.');

        return redirect(route('boardingHouses.index'));
    }
}

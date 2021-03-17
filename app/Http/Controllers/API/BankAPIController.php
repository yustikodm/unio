<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBankAPIRequest;
use App\Http\Requests\API\UpdateBankAPIRequest;
use App\Models\Bank;
use App\Repositories\BankRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BankController
 * @package App\Http\Controllers\API
 */

class BankAPIController extends AppBaseController
{
    /** @var  BankRepository */
    private $bankRepository;

    public function __construct(BankRepository $bankRepo)
    {
        $this->bankRepository = $bankRepo;
    }

    /**
     * Display a listing of the Bank.
     * GET|HEAD /bank
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $bank = $this->bankRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($bank->toArray(), 'Bank retrieved successfully');
    }

    /**
     * Store a newly created Bank in storage.
     * POST /bank
     *
     * @param CreateBankAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBankAPIRequest $request)
    {
        $input = $request->all();

        $bank = $this->bankRepository->create($input);

        return $this->sendResponse($bank->toArray(), 'Bank saved successfully');
    }

    /**
     * Display the specified Bank.
     * GET|HEAD /bank/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Bank $bank */
        $bank = $this->bankRepository->find($id);

        if (empty($bank)) {
            return $this->sendError('Bank not found');
        }

        return $this->sendResponse($bank->toArray(), 'Bank retrieved successfully');
    }

    /**
     * Update the specified Bank in storage.
     * PUT/PATCH /bank/{id}
     *
     * @param int $id
     * @param UpdateBankAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBankAPIRequest $request)
    {
        $input = $request->all();

        /** @var Bank $bank */
        $bank = $this->bankRepository->find($id);

        if (empty($bank)) {
            return $this->sendError('Bank not found');
        }

        $bank = $this->bankRepository->update($input, $id);

        return $this->sendResponse($bank->toArray(), 'Bank updated successfully');
    }

    /**
     * Remove the specified Bank from storage.
     * DELETE /bank/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Bank $bank */
        $bank = $this->bankRepository->find($id);

        if (empty($bank)) {
            return $this->sendError('Bank not found');
        }

        $bank->delete();

        return $this->sendSuccess('Bank deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePrinterAPIRequest;
use App\Http\Requests\API\UpdatePrinterAPIRequest;
use App\Models\Printer;
use App\Repositories\PrinterRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PrinterController
 * @package App\Http\Controllers\API
 */

class PrinterAPIController extends AppBaseController
{
    /** @var  PrinterRepository */
    private $printerRepository;

    public function __construct(PrinterRepository $printerRepo)
    {
        $this->printerRepository = $printerRepo;
    }

    /**
     * Display a listing of the Printer.
     * GET|HEAD /printer
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $printer = $this->printerRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($printer->toArray(), 'Printer retrieved successfully');
    }

    /**
     * Store a newly created Printer in storage.
     * POST /printer
     *
     * @param CreatePrinterAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePrinterAPIRequest $request)
    {
        $input = $request->all();

        $printer = $this->printerRepository->create($input);

        return $this->sendResponse($printer->toArray(), 'Printer saved successfully');
    }

    /**
     * Display the specified Printer.
     * GET|HEAD /printer/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Printer $printer */
        $printer = $this->printerRepository->find($id);

        if (empty($printer)) {
            return $this->sendError('Printer not found');
        }

        return $this->sendResponse($printer->toArray(), 'Printer retrieved successfully');
    }

    /**
     * Update the specified Printer in storage.
     * PUT/PATCH /printer/{id}
     *
     * @param int $id
     * @param UpdatePrinterAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePrinterAPIRequest $request)
    {
        $input = $request->all();

        /** @var Printer $printer */
        $printer = $this->printerRepository->find($id);

        if (empty($printer)) {
            return $this->sendError('Printer not found');
        }

        $printer = $this->printerRepository->update($input, $id);

        return $this->sendResponse($printer->toArray(), 'Printer updated successfully');
    }

    /**
     * Remove the specified Printer from storage.
     * DELETE /printer/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Printer $printer */
        $printer = $this->printerRepository->find($id);

        if (empty($printer)) {
            return $this->sendError('Printer not found');
        }

        $printer->delete();

        return $this->sendSuccess('Printer deleted successfully');
    }
}

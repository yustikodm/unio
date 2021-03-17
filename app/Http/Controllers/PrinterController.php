<?php

namespace App\Http\Controllers;

use App\DataTables\PrinterDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePrinterRequest;
use App\Http\Requests\UpdatePrinterRequest;
use App\Repositories\PrinterRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PrinterController extends AppBaseController
{
    /** @var  PrinterRepository */
    private $printerRepository;

    public function __construct(PrinterRepository $printerRepo)
    {
        $this->printerRepository = $printerRepo;
    }

    /**
     * Display a listing of the Printer.
     *
     * @param PrinterDataTable $printerDataTable
     * @return Response
     */
    public function index(PrinterDataTable $printerDataTable)
    {
        return $printerDataTable->render('printer.index');
    }

    /**
     * Show the form for creating a new Printer.
     *
     * @return Response
     */
    public function create()
    {
        return view('printer.create');
    }

    /**
     * Store a newly created Printer in storage.
     *
     * @param CreatePrinterRequest $request
     *
     * @return Response
     */
    public function store(CreatePrinterRequest $request)
    {
        $input = $request->all();        

        if($input['default'] == 1){
            $defaultBefore = $this->printerRepository->allQuery(['default' => 1])->first();
            if(!empty($defaultBefore)){
                $this->printerRepository->update(['default' => 0], $defaultBefore->id);
            }
        }

        $printer = $this->printerRepository->create($input);

        Flash::success('Printer saved successfully.');

        return redirect(route('printer.index'));
    }

    /**
     * Display the specified Printer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $printer = $this->printerRepository->find($id);

        if (empty($printer)) {
            Flash::error('Printer not found');

            return redirect(route('printer.index'));
        }

        return view('printer.show')->with('printer', $printer);
    }

    /**
     * Show the form for editing the specified Printer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $printer = $this->printerRepository->find($id);

        if (empty($printer)) {
            Flash::error('Printer not found');

            return redirect(route('printer.index'));
        }

        return view('printer.edit')->with('printer', $printer);
    }

    /**
     * Update the specified Printer in storage.
     *
     * @param  int              $id
     * @param UpdatePrinterRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePrinterRequest $request)
    {
        $printer = $this->printerRepository->find($id);

        if (empty($printer)) {
            Flash::error('Printer not found');

            return redirect(route('printer.index'));
        }

        $input = $request->all();

        if($input['default'] == 1){
            $defaultBefore = $this->printerRepository->allQuery(['default' => 1])->first();
            if(!empty($defaultBefore)){
                $this->printerRepository->update(['default' => 0], $defaultBefore->id);
            }
        }

        $printer = $this->printerRepository->update($input, $id);

        Flash::success('Printer updated successfully.');

        return redirect(route('printer.index'));
    }

    /**
     * Remove the specified Printer from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $printer = $this->printerRepository->find($id);

        if (empty($printer)) {
            Flash::error('Printer not found');

            return redirect(route('printer.index'));
        }

        $this->printerRepository->delete($id);

        Flash::success('Printer deleted successfully.');

        return redirect(route('printer.index'));
    }
}

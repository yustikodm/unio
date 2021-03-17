<?php

namespace App\Http\Controllers;

use App\DataTables\VendorServiceDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateVendorServiceRequest;
use App\Http\Requests\UpdateVendorServiceRequest;
use App\Repositories\VendorServiceRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class VendorServiceController extends AppBaseController
{
    /** @var  VendorServiceRepository */
    private $vendorServiceRepository;

    public function __construct(VendorServiceRepository $vendorServiceRepo)
    {
        $this->vendorServiceRepository = $vendorServiceRepo;
    }

    /**
     * Display a listing of the VendorService.
     *
     * @param VendorServiceDataTable $vendorServiceDataTable
     * @return Response
     */
    public function index(VendorServiceDataTable $vendorServiceDataTable)
    {
        return $vendorServiceDataTable->render('vendor_services.index');
    }

    /**
     * Show the form for creating a new VendorService.
     *
     * @return Response
     */
    public function create()
    {
        return view('vendor_services.create');
    }

    /**
     * Store a newly created VendorService in storage.
     *
     * @param CreateVendorServiceRequest $request
     *
     * @return Response
     */
    public function store(CreateVendorServiceRequest $request)
    {
        $input = $request->all();

        $vendorService = $this->vendorServiceRepository->create($input);

        Flash::success('Vendor Service saved successfully.');

        return redirect(route('vendorServices.index'));
    }

    /**
     * Display the specified VendorService.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vendorService = $this->vendorServiceRepository->find($id);

        if (empty($vendorService)) {
            Flash::error('Vendor Service not found');

            return redirect(route('vendorServices.index'));
        }

        return view('vendor_services.show')->with('vendorService', $vendorService);
    }

    /**
     * Show the form for editing the specified VendorService.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vendorService = $this->vendorServiceRepository->find($id);

        if (empty($vendorService)) {
            Flash::error('Vendor Service not found');

            return redirect(route('vendorServices.index'));
        }

        return view('vendor_services.edit')->with('vendorService', $vendorService);
    }

    /**
     * Update the specified VendorService in storage.
     *
     * @param  int              $id
     * @param UpdateVendorServiceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVendorServiceRequest $request)
    {
        $vendorService = $this->vendorServiceRepository->find($id);

        if (empty($vendorService)) {
            Flash::error('Vendor Service not found');

            return redirect(route('vendorServices.index'));
        }

        $vendorService = $this->vendorServiceRepository->update($request->all(), $id);

        Flash::success('Vendor Service updated successfully.');

        return redirect(route('vendorServices.index'));
    }

    /**
     * Remove the specified VendorService from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vendorService = $this->vendorServiceRepository->find($id);

        if (empty($vendorService)) {
            Flash::error('Vendor Service not found');

            return redirect(route('vendorServices.index'));
        }

        $this->vendorServiceRepository->delete($id);

        Flash::success('Vendor Service deleted successfully.');

        return redirect(route('vendorServices.index'));
    }
}

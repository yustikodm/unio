<?php

namespace App\Http\Controllers;

use App\DataTables\VendorEmployeeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateVendorEmployeeRequest;
use App\Http\Requests\UpdateVendorEmployeeRequest;
use App\Repositories\VendorEmployeeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class VendorEmployeeController extends AppBaseController
{
    /** @var  VendorEmployeeRepository */
    private $vendorEmployeeRepository;

    public function __construct(VendorEmployeeRepository $vendorEmployeeRepo)
    {
        $this->vendorEmployeeRepository = $vendorEmployeeRepo;
    }

    /**
     * Display a listing of the VendorEmployee.
     *
     * @param VendorEmployeeDataTable $vendorEmployeeDataTable
     * @return Response
     */
    public function index(VendorEmployeeDataTable $vendorEmployeeDataTable)
    {
        return $vendorEmployeeDataTable->render('vendor_employees.index');
    }

    /**
     * Show the form for creating a new VendorEmployee.
     *
     * @return Response
     */
    public function create()
    {
        return view('vendor_employees.create');
    }

    /**
     * Store a newly created VendorEmployee in storage.
     *
     * @param CreateVendorEmployeeRequest $request
     *
     * @return Response
     */
    public function store(CreateVendorEmployeeRequest $request)
    {
        $input = $request->all();

        $vendorEmployee = $this->vendorEmployeeRepository->create($input);

        Flash::success('Vendor Employee saved successfully.');

        return redirect(route('vendor-employees.index'));
    }

    /**
     * Display the specified VendorEmployee.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vendorEmployee = $this->vendorEmployeeRepository->find($id);

        if (empty($vendorEmployee)) {
            Flash::error('Vendor Employee not found');

            return redirect(route('vendor-employees.index'));
        }

        return view('vendor_employees.show')->with('vendorEmployee', $vendorEmployee);
    }

    /**
     * Show the form for editing the specified VendorEmployee.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vendorEmployee = $this->vendorEmployeeRepository->find($id);

        if (empty($vendorEmployee)) {
            Flash::error('Vendor Employee not found');

            return redirect(route('vendor-employees.index'));
        }

        return view('vendor_employees.edit')->with('vendorEmployee', $vendorEmployee);
    }

    /**
     * Update the specified VendorEmployee in storage.
     *
     * @param  int              $id
     * @param UpdateVendorEmployeeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVendorEmployeeRequest $request)
    {
        $vendorEmployee = $this->vendorEmployeeRepository->find($id);

        if (empty($vendorEmployee)) {
            Flash::error('Vendor Employee not found');

            return redirect(route('vendor-employees.index'));
        }

        $vendorEmployee = $this->vendorEmployeeRepository->update($request->all(), $id);

        Flash::success('Vendor Employee updated successfully.');

        return redirect(route('vendor-employees.index'));
    }

    /**
     * Remove the specified VendorEmployee from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vendorEmployee = $this->vendorEmployeeRepository->find($id);

        if (empty($vendorEmployee)) {
            Flash::error('Vendor Employee not found');

            return redirect(route('vendor-employees.index'));
        }

        $this->vendorEmployeeRepository->delete($id);

        Flash::success('Vendor Employee deleted successfully.');

        return redirect(route('vendor-employees.index'));
    }
}

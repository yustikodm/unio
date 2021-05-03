<?php

namespace App\Http\Controllers;

use App\DataTables\TopupPackageDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTopupPackageRequest;
use App\Http\Requests\UpdateTopupPackageRequest;
use App\Repositories\TopupPackageRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;

class TopupPackageController extends AppBaseController
{
    /** @var  TopupPackageRepository */
    private $topupPackageRepository;

    public function __construct(TopupPackageRepository $topupPackageRepo)
    {
        $this->topupPackageRepository = $topupPackageRepo;
    }

    /**
     * Display a listing of the TopupPackage.
     *
     * @param TopupPackageDataTable $topupPackageDataTable
     * @return Response
     */
    public function index(TopupPackageDataTable $topupPackageDataTable)
    {
        return $topupPackageDataTable->render('topup_packages.index');
    }

    /**
     * Show the form for creating a new TopupPackage.
     *
     * @return Response
     */
    public function create()
    {
        return view('topup_packages.create');
    }

    /**
     * Store a newly created TopupPackage in storage.
     *
     * @param CreateTopupPackageRequest $request
     *
     * @return Response
     */
    public function store(CreateTopupPackageRequest $request)
    {
        $input = $request->only([
            'code',
            'name',
            'description',
            'amount',
            'due_date',
            'status'
        ]);

        $topupPackage = $this->topupPackageRepository->create($input);

        Flash::success('Topup Package saved successfully.');

        return redirect(route('topup-packages.index'));
    }

    /**
     * Display the specified TopupPackage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $topupPackage = $this->topupPackageRepository->find($id);

        if (empty($topupPackage)) {
            Flash::error('Topup Package not found');

            return redirect(route('topup-packages.index'));
        }

        return view('topup_packages.show')->with('topupPackage', $topupPackage);
    }

    /**
     * Show the form for editing the specified TopupPackage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $topupPackage = $this->topupPackageRepository->find($id);

        if (empty($topupPackage)) {
            Flash::error('Topup Package not found');

            return redirect(route('topup-packages.index'));
        }

        return view('topup_packages.edit')->with('topupPackage', $topupPackage);
    }

    /**
     * Update the specified TopupPackage in storage.
     *
     * @param  int              $id
     * @param UpdateTopupPackageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTopupPackageRequest $request)
    {
        $topupPackage = $this->topupPackageRepository->find($id);

        if (empty($topupPackage)) {
            Flash::error('Topup Package not found');

            return redirect(route('topup-packages.index'));
        }

        $input = $request->only([
            'code',
            'name',
            'description',
            'amount',
            'due_date',
            'status'
        ]);

        $topupPackage = $this->topupPackageRepository->update($input, $id);

        Flash::success('Topup Package updated successfully.');

        return redirect(route('topup-packages.index'));
    }

    /**
     * Remove the specified TopupPackage from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $topupPackage = $this->topupPackageRepository->find($id);

        if (empty($topupPackage)) {
            Flash::error('Topup Package not found');

            return redirect(route('topup-packages.index'));
        }

        $this->topupPackageRepository->delete($id);

        Flash::success('Topup Package deleted successfully.');

        return redirect(route('topup-packages.index'));
    }
}

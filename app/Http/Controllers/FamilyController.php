<?php

namespace App\Http\Controllers;

use App\DataTables\FamilyDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateFamilyRequest;
use App\Http\Requests\UpdateFamilyRequest;
use App\Repositories\FamilyRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;

class FamilyController extends AppBaseController
{
    /** @var  FamilyRepository */
    private $familyRepository;

    public function __construct(FamilyRepository $familyRepo)
    {
        $this->familyRepository = $familyRepo;
    }

    /**
     * Display a listing of the Family.
     *
     * @param FamilyDataTable $familyDataTable
     * @return Response
     */
    public function index(FamilyDataTable $familyDataTable)
    {
        return $familyDataTable->render('families.index');
    }

    /**
     * Show the form for creating a new Family.
     *
     * @return Response
     */
    public function create()
    {
        return view('families.create');
    }

    /**
     * Store a newly created Family in storage.
     *
     * @param CreateFamilyRequest $request
     *
     * @return Response
     */
    public function store(CreateFamilyRequest $request)
    {
        $input = $request->only([
            'parent_user',
            'child_user',
            'family_as',
            'family_verified_at',
        ]);

        $family = $this->familyRepository->create($input);

        Flash::success('Family saved successfully.');

        return redirect(route('families.index'));
    }

    /**
     * Display the specified Family.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $family = $this->familyRepository->find($id);

        if (empty($family)) {
            Flash::error('Family not found');

            return redirect(route('families.index'));
        }

        return view('families.show')->with('family', $family);
    }

    /**
     * Show the form for editing the specified Family.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $family = $this->familyRepository->find($id);

        if (empty($family)) {
            Flash::error('Family not found');

            return redirect(route('families.index'));
        }

        return view('families.edit')->with('family', $family);
    }

    /**
     * Update the specified Family in storage.
     *
     * @param  int              $id
     * @param UpdateFamilyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFamilyRequest $request)
    {
        $family = $this->familyRepository->find($id);

        if (empty($family)) {
            Flash::error('Family not found');

            return redirect(route('families.index'));
        }

        $input = $request->only([
            'parent_user',
            'child_user',
            'family_as',
            'family_verified_at',
        ]);

        $family = $this->familyRepository->update($input, $id);

        Flash::success('Family updated successfully.');

        return redirect(route('families.index'));
    }

    /**
     * Remove the specified Family from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $family = $this->familyRepository->find($id);

        if (empty($family)) {
            Flash::error('Family not found');

            return redirect(route('families.index'));
        }

        $this->familyRepository->delete($id);

        Flash::success('Family deleted successfully.');

        return redirect(route('families.index'));
    }
}

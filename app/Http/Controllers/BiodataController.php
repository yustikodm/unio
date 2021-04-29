<?php

namespace App\Http\Controllers;

use App\DataTables\BiodataDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBiodataRequest;
use App\Http\Requests\UpdateBiodataRequest;
use App\Repositories\BiodataRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;

class BiodataController extends AppBaseController
{
  /** @var  BiodataRepository */
  private $biodataRepository;

  public function __construct(BiodataRepository $biodataRepo)
  {
    $this->biodataRepository = $biodataRepo;
  }

  /**
   * Display a listing of the Biodata.
   *
   * @param BiodataDataTable $biodataDataTable
   * @return Response
   */
  public function index(BiodataDataTable $biodataDataTable)
  {
    return $biodataDataTable->render('biodata.index');
  }

  /**
   * Show the form for creating a new Biodata.
   *
   * @return Response
   */
  public function create()
  {
    return view('biodata.create');
  }

  /**
   * Store a newly created Biodata in storage.
   *
   * @param CreateBiodataRequest $request
   *
   * @return Response
   */
  public function store(CreateBiodataRequest $request)
  {
    $input = $request->only([
        'user_id',
        'fullname',
        'address',
        'gender',
        'picture',
        'school_origin',
        'graduation_year',
        'birth_place',
        'birth_date',
        'identity_number',
        'religion',
    ]);

    $biodata = $this->biodataRepository->create($input);

    Flash::success('Biodata saved successfully.');

    return redirect(route('biodata.index'));
  }

  /**
   * Display the specified Biodata.
   *
   * @param  int $id
   *
   * @return Response
   */
  public function show($id)
  {
    $biodata = $this->biodataRepository->find($id);

    if (empty($biodata)) {
      Flash::error('Biodata not found');

      return redirect(route('biodata.index'));
    }

    return view('biodata.show')->with('biodata', $biodata);
  }

  /**
   * Show the form for editing the specified Biodata.
   *
   * @param  int $id
   *
   * @return Response
   */
  public function edit($id)
  {
    $biodata = $this->biodataRepository->find($id);

    if (empty($biodata)) {
      Flash::error('Biodata not found');

      return redirect(route('biodata.index'));
    }

    return view('biodata.edit')->with('biodata', $biodata);
  }

  /**
   * Update the specified Biodata in storage.
   *
   * @param  int              $id
   * @param UpdateBiodataRequest $request
   *
   * @return Response
   */
  public function update($id, UpdateBiodataRequest $request)
  {
    $biodata = $this->biodataRepository->find($id);

    if (empty($biodata)) {
      Flash::error('Biodata not found');

      return redirect(route('biodata.index'));
    }

    $input = $request->only([
        'user_id',
        'fullname',
        'address',
        'gender',
        'picture',
        'school_origin',
        'graduation_year',
        'birth_place',
        'birth_date',
        'identity_number',
        'religion',
    ]);

    $biodata = $this->biodataRepository->update($input, $id);

    Flash::success('Biodata updated successfully.');

    return redirect(route('biodata.index'));
  }

  /**
   * Remove the specified Biodata from storage.
   *
   * @param  int $id
   *
   * @return Response
   */
  public function destroy($id)
  {
    $biodata = $this->biodataRepository->find($id);

    if (empty($biodata)) {
      Flash::error('Biodata not found');

      return redirect(route('biodata.index'));
    }

    $this->biodataRepository->delete($id);

    Flash::success('Biodata deleted successfully.');

    return redirect(route('biodata.index'));
  }
}

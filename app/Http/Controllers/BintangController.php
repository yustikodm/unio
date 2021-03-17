<?php

namespace App\Http\Controllers;

use App\DataTables\BintangDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBintangRequest;
use App\Http\Requests\UpdateBintangRequest;
use App\Repositories\BintangRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BintangController extends AppBaseController
{
    /** @var  BintangRepository */
    private $bintangRepository;

    public function __construct(BintangRepository $bintangRepo)
    {
        $this->bintangRepository = $bintangRepo;
    }

    /**
     * Display a listing of the Bintang.
     *
     * @param BintangDataTable $bintangDataTable
     * @return Response
     */
    public function index(BintangDataTable $bintangDataTable)
    {
        return $bintangDataTable->render('bintang.index');
    }

    /**
     * Show the form for creating a new Bintang.
     *
     * @return Response
     */
    public function create()
    {
        return view('bintang.create');
    }

    /**
     * Store a newly created Bintang in storage.
     *
     * @param CreateBintangRequest $request
     *
     * @return Response
     */
    public function store(CreateBintangRequest $request)
    {
        $input = $request->all();

        $bintang = $this->bintangRepository->create($input);

        Flash::success('Bintang saved successfully.');

        return redirect(route('bintang.index'));
    }

    /**
     * Display the specified Bintang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bintang = $this->bintangRepository->find($id);

        if (empty($bintang)) {
            Flash::error('Bintang not found');

            return redirect(route('bintang.index'));
        }

        return view('bintang.show')->with('bintang', $bintang);
    }

    /**
     * Show the form for editing the specified Bintang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bintang = $this->bintangRepository->find($id);

        if (empty($bintang)) {
            Flash::error('Bintang not found');

            return redirect(route('bintang.index'));
        }

        return view('bintang.edit')->with('bintang', $bintang);
    }

    /**
     * Update the specified Bintang in storage.
     *
     * @param  int              $id
     * @param UpdateBintangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBintangRequest $request)
    {
        $bintang = $this->bintangRepository->find($id);

        if (empty($bintang)) {
            Flash::error('Bintang not found');

            return redirect(route('bintang.index'));
        }

        $bintang = $this->bintangRepository->update($request->all(), $id);

        Flash::success('Bintang updated successfully.');

        return redirect(route('bintang.index'));
    }

    /**
     * Remove the specified Bintang from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bintang = $this->bintangRepository->find($id);

        if (empty($bintang)) {
            Flash::error('Bintang not found');

            return redirect(route('bintang.index'));
        }

        $this->bintangRepository->delete($id);

        Flash::success('Bintang deleted successfully.');

        return redirect(route('bintang.index'));
    }
}

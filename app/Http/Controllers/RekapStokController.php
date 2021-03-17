<?php

namespace App\Http\Controllers;

use App\DataTables\RekapStokDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateRekapStokRequest;
use App\Http\Requests\UpdateRekapStokRequest;
use App\Repositories\RekapStokRepository;
use Illuminate\Support\Facades\DB;
use App\Models\RekapStok;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request;
use App\Exports\RekapStokExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class RekapStokController extends AppBaseController
{
    /** @var  RekapStokRepository */
    private $rekapStokRepository;

    public function __construct(RekapStokRepository $rekapStokRepo)
    {
        $this->rekapStokRepository = $rekapStokRepo;
    }

    /**
     * Display a listing of the RekapStok.
     *
     * @param RekapStokDataTable $rekapStokDataTable
     * @return Response
     */
    public function index(Request $request)
    {        
        $data = [];      
        if((!empty($request->input('f')) && !empty($request->input('t')) )){
            $data['rekap'] = $this->rekapStokRepository->get($request->input('f'), $request->input('t'));                              
        }        
        return view('rekap_stok.rekap', $data);
        // return $rekapStokDataTable->render('rekap_stok.index');
    }

    public function exportRekapStok(Request $request)
    {
        // $timestamp = Carbon::now()->format('dmYHis');        
        $timestamp = $request->input('f')." - ". $request->input('t');
        if((!empty($request->input('f')) && !empty($request->input('t')) )){   
            $data = $this->rekapStokRepository->get($request->input('f'), $request->input('t'));                                               
            return Excel::download(new RekapStokExport($data), 'rekapstok_' . $timestamp . '.xlsx');      
          }
    }

    /**
     * Show the form for creating a new RekapStok.
     *
     * @return Response
     */
    public function create()
    {
        return view('rekap_stok.create');
    }

    /**
     * Store a newly created RekapStok in storage.
     *
     * @param CreateRekapStokRequest $request
     *
     * @return Response
     */
    public function store(CreateRekapStokRequest $request)
    {
        $input = $request->all();

        $rekapStok = $this->rekapStokRepository->create($input);

        Flash::success('Rekap Stok saved successfully.');

        return redirect(route('rekapStok.index'));
    }

    /**
     * Display the specified RekapStok.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $rekapStok = $this->rekapStokRepository->find($id);

        if (empty($rekapStok)) {
            Flash::error('Rekap Stok not found');

            return redirect(route('rekapStok.index'));
        }

        return view('rekap_stok.show')->with('rekapStok', $rekapStok);
    }

    /**
     * Show the form for editing the specified RekapStok.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $rekapStok = $this->rekapStokRepository->find($id);

        if (empty($rekapStok)) {
            Flash::error('Rekap Stok not found');

            return redirect(route('rekapStok.index'));
        }

        return view('rekap_stok.edit')->with('rekapStok', $rekapStok);
    }

    /**
     * Update the specified RekapStok in storage.
     *
     * @param  int              $id
     * @param UpdateRekapStokRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRekapStokRequest $request)
    {
        $rekapStok = $this->rekapStokRepository->find($id);

        if (empty($rekapStok)) {
            Flash::error('Rekap Stok not found');

            return redirect(route('rekapStok.index'));
        }

        $rekapStok = $this->rekapStokRepository->update($request->all(), $id);

        Flash::success('Rekap Stok updated successfully.');

        return redirect(route('rekapStok.index'));
    }

    /**
     * Remove the specified RekapStok from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $rekapStok = $this->rekapStokRepository->find($id);

        if (empty($rekapStok)) {
            Flash::error('Rekap Stok not found');

            return redirect(route('rekapStok.index'));
        }

        $this->rekapStokRepository->delete($id);

        Flash::success('Rekap Stok deleted successfully.');

        return redirect(route('rekapStok.index'));
    }
}

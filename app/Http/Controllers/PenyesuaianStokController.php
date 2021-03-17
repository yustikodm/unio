<?php

namespace App\Http\Controllers;

use App\DataTables\PenyesuaianStokDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePenyesuaianStokRequest;
use App\Http\Requests\UpdatePenyesuaianStokRequest;
use App\Repositories\PenyesuaianStokRepository;
use App\Repositories\KartuStokPenyesuaianRepository;
use App\Repositories\StokRepository;
use App\Repositories\BarangPenyesuaianRepository;
use App\Repositories\RekapStokRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PenyesuaianStokController extends AppBaseController
{
    /** @var  PenyesuaianStokRepository */
    private $penyesuaianStokRepository;
    private $kartuStokPenyesuaianRepository;
    private $stokRepository;
    private $barangPenyesuaianRepository;
    private $rekapStokRepository;

    public function __construct(
            PenyesuaianStokRepository $penyesuaianStokRepo,
            KartuStokPenyesuaianRepository $kartuStokPenyesuaianRepo,
            StokRepository $stokRepo,
            BarangPenyesuaianRepository $barangPenyesuaianRepo,
            RekapStokRepository $rekapStokRepo
        )
    {
        $this->penyesuaianStokRepository = $penyesuaianStokRepo;
        $this->stokRepository = $stokRepo;
        $this->kartuStokPenyesuaianRepository = $kartuStokPenyesuaianRepo;
        $this->barangPenyesuaianRepository = $barangPenyesuaianRepo;
        $this->rekapStokRepository = $rekapStokRepo;
    }

    /**
     * Display a listing of the PenyesuaianStok.
     *
     * @param PenyesuaianStokDataTable $penyesuaianStokDataTable
     * @return Response
     */
    public function index(PenyesuaianStokDataTable $penyesuaianStokDataTable)
    {
        return $penyesuaianStokDataTable->render('penyesuaian_stok.index');
    }

    /**
     * Show the form for creating a new PenyesuaianStok.
     *
     * @return Response
     */
    public function create()
    {
        return view('penyesuaian_stok.create');
    }

    /**
     * Store a newly created PenyesuaianStok in storage.
     *
     * @param CreatePenyesuaianStokRequest $request
     *
     * @return Response
     */
    public function store(CreatePenyesuaianStokRequest $request)
    {
        $input = $request->all();

        $dataPenyesuianStok = $this->penyesuaianStokRepository->getLastestData();

        if(!empty($dataPenyesuianStok)){
            $lastKode = explode('-', $dataPenyesuianStok->kode);
            if($lastKode[1] == date('ym')){
                $noUrut = intval($lastKode[2]) + 1;
                $no = str_pad($noUrut,4,"0",STR_PAD_LEFT);
                $input['kode'] = 'PS-'.date('ym').'-'.$no;
            }else{
                $input['kode'] = 'PS-'.date('ym').'-0000';
            }
        }else{
            $input['kode'] = 'PS-'.date('ym').'-0000';
        }

        $input['tanggal'] = date("Y-m-d");

        $penyesuaianStok = $this->penyesuaianStokRepository->create($input);

        $kartuStok = [];
        foreach ($input['barang_penyesuaian'] as $index => $barang) {
            $jumlahBarang = $input['jumlah_barang_penyesuaian'][$index];
            $id_barang = $input['barang_penyesuaian'][$index];
            $stokDatabase = $input['stokDatabase'][$index];
            $stokLapangan = $input['stokLapangan'][$index];
            $tipe = $input['tipe'][$index];

            $this->barangPenyesuaianRepository->create([
                'penyesuaian_stok_id' => $penyesuaianStok->id,
                'barang_id' => $id_barang,
                'stok_database' => $stokDatabase,
                'stok_lapangan' => $stokLapangan,
                'tipe' => $tipe,
                'jumlah' => $jumlahBarang,
            ]);
            if($tipe == 'Keluar'){
                $stok_akhir = intval($stokDatabase) - intval($jumlahBarang);
                $this->kartuStokPenyesuaianRepository->create([
                    'barang_id' => $id_barang,
                    'penyesuaian_id' => $penyesuaianStok->id,
                    'stok_awal' => $stokDatabase,
                    'masuk' => 0,
                    'keluar' => $jumlahBarang,
                    'stok_akhir' => $stok_akhir,
                    'tanggal' => date("Y-m-d H:i:s")
                ]);
                $this->rekapStokRepository->create([
                    'barang_id' => $id_barang,
                    'stok_awal' => $stokDatabase,
                    'masuk' => 0,
                    'keluar' => $jumlahBarang,
                    'stok_akhir' => $stok_akhir,
                ]);
            }else if($tipe == 'Masuk'){
                $stok_akhir = intval($stokDatabase) + intval($jumlahBarang);
                $this->kartuStokPenyesuaianRepository->create([
                    'barang_id' => $id_barang,
                    'penyesuaian_id' => $penyesuaianStok->id,
                    'stok_awal' => $stokDatabase,
                    'masuk' => $jumlahBarang,
                    'keluar' => 0,
                    'stok_akhir' => $stok_akhir,
                    'tanggal' => date("Y-m-d H:i:s")
                ]);
                $this->rekapStokRepository->create([
                    'barang_id' => $id_barang,
                    'stok_awal' => $stokDatabase,
                    'masuk' => $jumlahBarang,
                    'keluar' => 0,
                    'stok_akhir' => $stok_akhir,
                ]);
            }

            $this->stokRepository->update(array('stok' => $stok_akhir), $id_barang);
        }

        // $this->kartuStokPenyesuaianRepository->create($kartuStok);

        Flash::success('Penyesuaian Stok saved successfully.');

        return redirect(route('penyesuaianStok.index'));
    }

    /**
     * Display the specified PenyesuaianStok.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $data['penyesuaianStok'] = $this->penyesuaianStokRepository->find($id);
        $data['barangPenyesuaian'] = $this->barangPenyesuaianRepository->getBarangPenyesuaian($id);
        if (empty($data['penyesuaianStok'])) {
            Flash::error('Penyesuaian Stok not found');

            return redirect(route('penyesuaianStok.index'));
        }

        return view('penyesuaian_stok.show', $data);
    }

    /**
     * Show the form for editing the specified PenyesuaianStok.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $penyesuaianStok = $this->penyesuaianStokRepository->find($id);

        if (empty($penyesuaianStok)) {
            Flash::error('Penyesuaian Stok not found');

            return redirect(route('penyesuaianStok.index'));
        }

        return view('penyesuaian_stok.edit')->with('penyesuaianStok', $penyesuaianStok);
    }

    /**
     * Update the specified PenyesuaianStok in storage.
     *
     * @param  int              $id
     * @param UpdatePenyesuaianStokRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePenyesuaianStokRequest $request)
    {
        $penyesuaianStok = $this->penyesuaianStokRepository->find($id);



        if (empty($penyesuaianStok)) {
            Flash::error('Penyesuaian Stok not found');

            return redirect(route('penyesuaianStok.index'));
        }

        $penyesuaianStok = $this->penyesuaianStokRepository->update($request->all(), $id);

        Flash::success('Penyesuaian Stok updated successfully.');

        return redirect(route('penyesuaianStok.index'));
    }

    /**
     * Remove the specified PenyesuaianStok from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $penyesuaianStok = $this->penyesuaianStokRepository->find($id);

        if (empty($penyesuaianStok)) {
            Flash::error('Penyesuaian Stok not found');

            return redirect(route('penyesuaianStok.index'));
        }

        $this->penyesuaianStokRepository->delete($id);

        Flash::success('Penyesuaian Stok deleted successfully.');

        return redirect(route('penyesuaianStok.index'));
    }
}

<?php

namespace App\Http\Controllers;

use App\DataTables\PromoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePromoRequest;
use App\Http\Requests\UpdatePromoRequest;
use App\Repositories\PromoRepository;
use App\Repositories\BarangPromoRepository;
use App\Repositories\BarangRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PromoController extends AppBaseController
{
    /** @var  PromoRepository */
    private $promoRepository;
    private $barangPromoRepository;

    public function __construct(PromoRepository $promoRepo, BarangPromoRepository $barangPromoRepo, BarangRepository $barangRepo)
    {
        $this->promoRepository = $promoRepo;
        $this->barangPromoRepository = $barangPromoRepo;
        $this->barangRepository = $barangRepo;
    }

    /**
     * Display a listing of the Promo.
     *
     * @param PromoDataTable $promoDataTable
     * @return Response
     */
    public function index(PromoDataTable $promoDataTable)
    {
        return $promoDataTable->render('promo.index');
    }

    /**
     * Show the form for creating a new Promo.
     *
     * @return Response
     */
    public function create()
    {
        return view('promo.create');
    }

    /**
     * Store a newly created Promo in storage.
     *
     * @param CreatePromoRequest $request
     *
     * @return Response
     */
    public function store(CreatePromoRequest $request)
    {
        $input = $request->all();

        $lastRow = $this->promoRepository->allQuery()->orderBy('created_at', 'desc')->first();

        if(empty($lastRow)){
            $input['kode'] = "PKT-".date("ym").'-0000';
        }else{
            $kode = explode('-', $lastRow->kode);
            if(count($kode) == 3){
                if($kode[1] == date("ym")){
                    $no = intval($kode[2]) + 1;
                    $noUrut = str_pad($no,4,"0", STR_PAD_LEFT);
                    $input['kode'] = "PKT-".date("ym").'-'.$noUrut;
                }else{
                  $input['kode'] = "PKT-".date("ym").'-0000';
                }
            }else{
                $input['kode'] = "PKT-".date("ym").'-0000';
            }
        }

        $promo = $this->promoRepository->create($input);

        foreach ($input['barang_promo'] as $index => $id_barang) {
            $barang = $this->barangRepository->getStokHarga($id_barang)->first();

            $jumlahBarang = $input['jumlah_barang_promo'][$index];

            $this->barangPromoRepository->create([
                'promo_id' => $promo->id,
                'barang_id' => $barang->id,
                'jumlah' => $jumlahBarang,
            ]);
        }

        Flash::success('Paket saved successfully.');

        return redirect(route('promo.index'));
    }

    /**
     * Display the specified Promo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $data['promo'] = $this->promoRepository->getPromoDetail($id);
        $data['barang_promo'] = $this->barangPromoRepository->getBarangPromoByPromoId($id);

        if (empty($data['promo'])) {
            Flash::error('Paket not found');

            return redirect(route('promo.index'));
        }

        return view('promo.show', $data);
    }

    /**
     * Show the form for editing the specified Promo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $data['promo'] = $this->promoRepository->find($id);
        $data['promo']->barang_nama = $this->barangRepository->find($data['promo']->barang_id);
        $data['barang_promo'] = $this->barangPromoRepository->getBarangPromoByPromoId($id);

        if (empty($data['promo'])) {
            Flash::error('Paket not found');

            return redirect(route('promo.index'));
        }

        return view('promo.edit', $data);
    }

    /**
     * Update the specified Promo in storage.
     *
     * @param  int              $id
     * @param UpdatePromoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePromoRequest $request)
    {
        $promo = $this->promoRepository->find($id);

        $hapusBarangPromo = $this->barangPromoRepository->deleteByPromoId($id);

        if (empty($promo)) {
            Flash::error('Paket not found');

            return redirect(route('promo.index'));
        }

        $input = $request->all();

        foreach ($input['barang_promo'] as $index => $id_barang) {
            $barang = $this->barangRepository->getStokHarga($id_barang)->first();

            $jumlahBarang = $input['jumlah_barang_promo'][$index];

            $this->barangPromoRepository->create([
                'promo_id' => $promo->id,
                'barang_id' => $barang->id,
                'jumlah' => $jumlahBarang,
            ]);
        }

        $promo = $this->promoRepository->update($request->all(), $id);

        Flash::success('Paket updated successfully.');

        return redirect(route('promo.index'));
    }

    /**
     * Remove the specified Promo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $promo = $this->promoRepository->find($id);

        if (empty($promo)) {
            Flash::error('Paket not found');

            return redirect(route('promo.index'));
        }

        $this->promoRepository->delete($id);

        Flash::success('Paket deleted successfully.');

        return redirect(route('promo.index'));
    }
}

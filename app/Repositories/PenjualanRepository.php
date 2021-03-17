<?php

namespace App\Repositories;

use App\Models\Penjualan;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class PenjualanRepository
 * @package App\Repositories
 * @version October 21, 2020, 8:11 am UTC
*/

class PenjualanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode',
        'pelanggan_id',
        'mitra_id',
        'ppn',
        'diskon',
        'total',
        'bayar',
        'metode_pembayaran_id',
        'bank_id',
        'nama_rekening',
        'nomor_rekening'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Penjualan::class;
    }

    public function getWithWhere($where = [])
    {
        $query = Penjualan::join('pelanggan', 'penjualan.pelanggan_id', '=', 'pelanggan.id')
                          ->leftJoin('voucher', 'voucher.id', '=', 'penjualan.voucher_id')
                          ->leftJoin('pegawai', 'pegawai.id', '=', 'penjualan.pegawai_id')
                          ->select('penjualan.*', 'pelanggan.nama as pelanggan_nama', 'voucher.kode as kode_voucher', 'voucher.tipe as tipe_voucher','pegawai.nama as pegawai_nama')
                          ->orderBy('penjualan.created_at', "DESC");

        if (count($where)) {
            foreach ($where as $key => $value) {
                $query->where($key, $value);
            }
        }

        return $query;
    }

    public function getPenjualan($status = null, $dateFrom = null, $dateTo = null)
    {
        if (Auth::user()->hasRole('admin')) {
            if($status != null && $dateFrom != null && $dateTo != null){
                if($status == 'Semua'){
                    return Penjualan::join('pelanggan', 'penjualan.pelanggan_id', '=', 'pelanggan.id')
                            ->leftJoin('voucher', 'voucher.id', '=', 'penjualan.voucher_id')
                            ->select('penjualan.*', 'pelanggan.nama as pelanggan_nama', 'voucher.kode as kode_voucher')
                            ->whereBetween('penjualan.created_at', [ $dateFrom." 00:00:00", $dateTo." 23:59:59" ])
                            ->get();
                }else{
                    return Penjualan::join('pelanggan', 'penjualan.pelanggan_id', '=', 'pelanggan.id')
                            ->leftJoin('voucher', 'voucher.id', '=', 'penjualan.voucher_id')
                            ->select('penjualan.*', 'pelanggan.nama as pelanggan_nama', 'voucher.kode as kode_voucher')
                            ->whereBetween('penjualan.created_at', [ $dateFrom." 00:00:00", $dateTo." 23:59:59" ])
                            ->where('penjualan.status', $status)
                            ->get();
                }
            }
        } else if (Auth::user()->hasRole('mitra')) {
            if($status != null && $dateFrom != null && $dateTo != null){
                if($status == 'Semua'){
                    return Penjualan::join('pelanggan', 'penjualan.pelanggan_id', '=', 'pelanggan.id')
                                ->join('mitra', 'mitra.id', '=', 'penjualan.mitra_id')
                                ->leftJoin('voucher', 'voucher.id', '=', 'penjualan.voucher_id')
                                ->select('penjualan.*', 'pelanggan.nama as pelanggan_nama', 'voucher.kode as kode_voucher')
                                ->whereBetween('penjualan.created_at', [ $dateFrom." 00:00:00", $dateTo." 23:59:59" ])
                                ->where('mitra.user_id', Auth::user()->id)
                                ->get();
                }else{
                    return Penjualan::join('pelanggan', 'penjualan.pelanggan_id', '=', 'pelanggan.id')
                                ->join('mitra', 'mitra.id', '=', 'penjualan.mitra_id')
                                ->leftJoin('voucher', 'voucher.id', '=', 'penjualan.voucher_id')
                                ->select('penjualan.*', 'pelanggan.nama as pelanggan_nama', 'voucher.kode as kode_voucher')
                                ->whereBetween('penjualan.created_at', [ $dateFrom." 00:00:00", $dateTo." 23:59:59" ])
                                ->where('mitra.user_id', Auth::user()->id)
                                ->where('penjualan.status', $status)
                                ->get();
                }
            }
        } else {
            if($status != null && $dateFrom != null && $dateTo != null){
                if($status == 'Semua'){
                    return Penjualan::join('pelanggan', 'penjualan.pelanggan_id', '=', 'pelanggan.id')
                            ->leftJoin('voucher', 'voucher.id', '=', 'penjualan.voucher_id')
                            ->select('penjualan.*', 'pelanggan.nama as pelanggan_nama', 'voucher.kode as kode_voucher')
                            ->whereBetween('penjualan.created_at', [ $dateFrom." 00:00:00", $dateTo." 23:59:59" ])
                            ->get();
                }else{
                    return Penjualan::join('pelanggan', 'penjualan.pelanggan_id', '=', 'pelanggan.id')
                            ->leftJoin('voucher', 'voucher.id', '=', 'penjualan.voucher_id')
                            ->select('penjualan.*', 'pelanggan.nama as pelanggan_nama', 'voucher.kode as kode_voucher')
                            ->whereBetween('penjualan.created_at', [ $dateFrom." 00:00:00", $dateTo." 23:59:59" ])
                            ->where('penjualan.status', $status)
                            ->get();
                }
            }
        }
    }

    public function getForDashboard($year = null)
    {
        if($year == null){
            $yearS = date('Y');
        }else{
            $yearS = $year;
        }
        return Penjualan::selectRaw('MONTH(created_at) as bulan, sum(total) as total, count(*) as transaksi')
                        ->whereYear('created_at', '=', $yearS)
                        ->groupBy(DB::raw('MONTH(created_at)'))
                        ->get();

    }

    public function getForExport($year)
    {
        $dataPenjualan = Penjualan::selectRaw('MONTH(created_at) as bulan, sum(total) as total, count(*) as transaksi')
                        ->whereYear('created_at', '=', $year)
                        ->groupBy(DB::raw('MONTH(created_at)'))
                        ->get();
        $no = 1;
        foreach ($dataPenjualan as $index => $row) {
            $month_num = $row->bulan;
            $namaBulan = date("F", mktime(0, 0, 0, $month_num, 10));

            $object = (object)null;
            $object->no = $no;
            $object->bulan = $namaBulan;
            $object->total = $row->total;
            $object->transaksi = $row->transaksi;
            $dataPenjualan[$index] = $object;
            $no++;
        }

        return $dataPenjualan;
    }

    public function getPenjualanMitra($id)
    {
        return Penjualan::join('mitra', 'mitra.id', '=', 'penjualan.mitra_id')
                        ->where('penjualan.mitra_id', $id)
                        ->orWhere('penjualan.pelanggan_id', 'mitra.pelanggan_id')
                        ->get();
    }
}

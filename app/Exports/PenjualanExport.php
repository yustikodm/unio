<?php

namespace App\Exports;

use App\Models\Penjualan;
use App\Models\Pelanggan;
use App\Models\Mitra;
use App\Models\MetodePembayaran;
use App\Models\Bank;
use App\Models\Voucher;
use App\Models\Pegawai;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;


class PenjualanExport implements FromQuery, WithHeadings, WithMapping, WithColumnFormatting, ShouldAutoSize
{

    public function __construct($status, $date_from, $date_to)
    {
        $this->status = $status;
        $this->date_from = $date_from;
        $this->date_to = $date_to;
    }

    public function query()
    {
        if (Auth::user()->hasRole('admin')) {
            if ($this->status == 'Semua') {
                return Penjualan::query()
                    ->where('created_at', '>=', $this->date_from)
                    ->where('created_at', '<=', $this->date_to . ' 23:59:59');
            } else {
                return Penjualan::query()
                    ->where('status', '=', $this->status)
                    ->where('created_at', '>=', $this->date_from)
                    ->where('created_at', '<=', $this->date_to . ' 23:59:59');
            }
        } else if (Auth::user()->hasRole('mitra')) {
            if ($this->status == 'Semua'){
                return Penjualan::query()
                    ->join('mitra', 'mitra.id', '=', 'penjualan.mitra_id')
                    ->select('penjualan.*')
                    ->where('penjualan.created_at', '>=', $this->date_from)
                    ->where('penjualan.created_at', '<=', $this->date_to . ' 23:59:59')
                    ->where('mitra.user_id', Auth::user()->id);
            } else {
                return Penjualan::query()
                    ->join('mitra', 'mitra.id', '=', 'penjualan.mitra_id')
                    ->select('penjualan.*')
                    ->where('penjualan.status', '=', $this->status)
                    ->where('penjualan.created_at', '>=', $this->date_from)
                    ->where('penjualan.created_at', '<=', $this->date_to . ' 23:59:59')
                    ->where('mitra.user_id', Auth::user()->id);
            }
        } else {
            if ($this->status == 'Semua') {
                return Penjualan::query()
                    ->where('created_at', '>=', $this->date_from)
                    ->where('created_at', '<=', $this->date_to . ' 23:59:59');
            } else {
                return Penjualan::query()
                    ->where('status', '=', $this->status)
                    ->where('created_at', '>=', $this->date_from)
                    ->where('created_at', '<=', $this->date_to . ' 23:59:59');
            }
        }
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Penjualan::all();
    // }

    public function headings(): array
    {
        // $columns = Schema::getColumnListing('penjualan');

        // return $columns;

        return [
            'id',
            'kode',
            'pelanggan',
            'mitra',
            'pegawai',
            'ppn',
            'voucher',
            'diskon_voucher',
            'diskon_mitra',
            'ongkir',
            'bonus',
            'grand_total',
            'total',
            'bayar',
            'kembali',
            'metode_pembayaran',
            'bank',
            'nama_rekening',
            'nomor_rekening',
            'status',
            'keterangan',
            'created_at',
            'updated_at',
            'deleted_at'
        ];
    }

    public function columnFormats(): array
    {
        return [
            'I' => NumberFormat::FORMAT_NUMBER,
            'J' => NumberFormat::FORMAT_NUMBER,
            'K' => NumberFormat::FORMAT_NUMBER,
            'M' => NumberFormat::FORMAT_TEXT,
            'S' => NumberFormat::FORMAT_TEXT
        ];
    }

    public function map($penjualan): array
    {
        // Pelanggan
        $pelanggan = Pelanggan::find($penjualan->pelanggan_id);
        if (!empty($pelanggan)) {
            $pelanggan = $pelanggan->nama;
        } else {
            $pelanggan = '';
        }

        // Mitra
        $mitra = Mitra::find($penjualan->mitra_id);
        if (!empty($mitra)) {
            $mitra = Pelanggan::find($mitra->pelanggan_id);

            if (!empty($mitra)) {
                $mitra = $mitra->nama;
            } else {
                $mitra = '';
            }
        } else {
            $mitra = '';
        }

        // Metode Pembayaran
        $voucher = Voucher::find($penjualan->voucher_id);
        if (!empty($voucher)) {
            $voucher = $voucher->kode;
        } else {
            $voucher = '';
        }

        $metodePembayaran = MetodePembayaran::find($penjualan->metode_pembayaran_id);
        if (!empty($metodePembayaran)) {
            $metodePembayaran = $metodePembayaran->nama;
        } else {
            $metodePembayaran = '';
        }

        // Bank
        $bank = Bank::find($penjualan->bank_id);
        if (!empty($bank)) {
            $bank = $bank->nama;
        } else {
            $bank = '';
        }

        // pegawai
        $pegawai = Pegawai::find($penjualan->pegawai_id);
        if (!empty($pegawai)) {
            $pegawai = $pegawai->nama;
        } else {
            $pegawai = '';
        }

        return [
            $penjualan->id,
            $penjualan->kode,
            $pelanggan,
            $mitra,
            $pegawai,
            $penjualan->ppn,
            $voucher,
            $penjualan->diskon_voucher,
            $penjualan->diskon_mitra,
            $penjualan->ongkir,
            $penjualan->bonus,
            $penjualan->grand_total,
            $penjualan->total,
            $penjualan->bayar,
            $penjualan->kembali,
            $metodePembayaran,
            $bank,
            $penjualan->nama_rekening,
            $penjualan->nomor_rekening,
            $penjualan->status,
            $penjualan->keterangan,
            $penjualan->created_at,
            $penjualan->updated_at,
            $penjualan->deleted_at
        ];

    }
}

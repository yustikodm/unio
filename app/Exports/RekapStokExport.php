<?php

namespace App\Exports;

use App\Models\RekapStok;
use App\Models\Barang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
// use Maatwebsite\Excel\Concerns\WithColumnFormatting;
// use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Illuminate\Support\Facades\Schema;

class RekapStokExport implements WithHeadings, WithMapping, ShouldAutoSize, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {        
        return $this->data;        
    }
    
    // public function collection()
    // {
    //     return RekapStok::all();
    // }    

    public function headings(): array
    {
        // $columns = Schema::getColumnListing('rekap_stok');

        // return $columns;
        return [
        	'No',
        	'Barang',
        	'Stok Awal',
        	'Masuk',
        	'Keluar',
        	'Stok Akhir'
        ];
    }

    public function map($rekap): array
    {        

        // barang
        $barang = Barang::find($rekap->barang_id);
        if (!empty($barang)) {
            $barang = $barang->nama;
        } else {
            $barang = '';
        }       

        return [
            $rekap->id,
            $barang,
            $rekap->stok_awal,
            ($rekap->masuk == 0) ? "0" : $rekap->masuk,
            ($rekap->keluar == 0) ? "0" : $rekap->keluar,
            $rekap->stok_akhir,
        ];     

    }
}

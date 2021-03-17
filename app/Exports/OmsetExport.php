<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
// use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
// use Maatwebsite\Excel\Concerns\FromQuery;
use Illuminate\Support\Facades\Schema;

class OmsetExport implements WithHeadings, WithMapping, WithColumnFormatting, ShouldAutoSize, FromCollection
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

    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_NUMBER,            
        ];
    }

    public function headings(): array
    {
        return [
            'No',
            'Bulan',
            'Total',
            'Jumlah Transaksi'
        ];
    }

    public function map($penjualan): array
    {         

        return [            
            $penjualan->no,
            $penjualan->bulan,
            $penjualan->total,
            $penjualan->transaksi
        ];     

    }
}

<?php

namespace App\Exports;

use App\Models\MutasiKas;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class KasExport implements FromQuery, WithHeadings, WithMapping, WithColumnFormatting, ShouldAutoSize
{
    public function __construct($tipe,$date_from, $date_to)
    {
        $this->tipe = $tipe;
        $this->date_from = $date_from;
        $this->date_to = $date_to;
    }

    public function query()
    {
        if($this->tipe == "Semua"){
            return MutasiKas::query()                    
                    ->where('created_at', '>=', $this->date_from)
                    ->where('created_at', '<=', $this->date_to . ' 23:59:59');      
        }else{
            return MutasiKas::query()                    
                    ->where('tipe', $this->tipe)
                    ->where('created_at', '>=', $this->date_from)
                    ->where('created_at', '<=', $this->date_to . ' 23:59:59');      
        }            
    }

    public function headings(): array
    {        
        return [
            'Id',
            'Kode',
            'Tipe',
            'Keterangan',
            'Jumlah'
        ];
    }

    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_NUMBER,

        ];
    }

    public function map($kas): array
    {       
        return [
            $kas->id,
            $kas->kode,
            $kas->tipe,
            $kas->keterangan,            
            $kas->jumlah,            
        ];             
    }
}

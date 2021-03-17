<!DOCTYPE html>
<html>
    <head>
        <title>PRINT STRUK</title>
    </head>
    <style>
    *{
        font-size: 7pt;
        font-weight: bold;
    }
    #wrapper{
        height: 210mm;
        width: 63mm;
    }
    @media print {
        @page {
            size: 63mm 210mm;
            margin: 0mm;
            font-size: 8pt;
        }
        html,body{
            width: 63mm;
            height: 210mm;
            margin: none;
        }
    }
    table tr td{
        padding-bottom: 5px;
    }
    </style>
    <body>
        <div id="wrapper">
            <div id="invoice_head">
                <table style="width:100%; border-spacing:0;">
                    <tr>
                        <th colspan="3" style="text-align: center; padding-bottom: 10px; font-size: 16px;">
                            Sodermee
                        </th>
                    </tr>
                    <tr>
                        <td style=" font-weight: bold;">
                            Kode Penjualan
                        </td>
                        <td style="text-align:right;">
                            :
                        </td>
                        <td>
                            {{ $penjualan->kode }}
                        </td>
                    </tr>
                    <tr>
                        <td style=" font-weight: bold;">
                            Tanggal,Waktu
                        </td>
                        <td style="text-align:right;">
                            :
                        </td>
                        <td>
                            {{ date('d F Y H:i', strtotime($penjualan->created_at)) }}
                        </td>
                    </tr>
                    <tr>
                        <td style=" font-weight: bold;">
                            Admin
                        </td>
                        <td style="text-align:right;">
                            :
                        </td>
                        <td>
                            {{ $penjualan->pegawai_nama }}
                        </td>
                    </tr>
                    <tr>
                        <td style=" font-weight: bold;">
                        @if(empty($penjualan->mitra_id))
                            Nama Pelanggan
                        @else
                            Nama Mitra
                        @endif
                        </td>
                        <td style="text-align:right;">
                            :
                        </td>
                        <td>
                            {{ $penjualan->pelanggan_nama }}
                        </td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 2px dashed black;" colspan="3"></td>
                    </tr>
                </table>
            </div>

            <table class="heading" style="width:100%;">
                <tr>
                    <td>
                        Barang
                    </td>
                </tr>
                <tr>
                    <td style="border-bottom: 2px dashed black;" colspan="3"></td>
                </tr>
            </table>

            <table style="width:100%;">
                @foreach($barangPenjualanReguler as $row)
                    <tr>
                        <td colspan="4">- {{  strtoupper($row->nama) }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Rp. {{ number_format($row->harga) }}</td>
                        <td>{{ $row->jumlah }}</td>
                        <td>Rp. {{ number_format($row->subtotal) }}</td>
                    </tr>
                @endforeach
                @foreach($barangPenjualanPaket as $row)
                    <tr>
                        <td colspan="4">- {{  strtoupper($row->nama) }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Rp. {{ number_format($row->harga) }}</td>
                        <td>{{ $row->jumlah }}</td>
                        <td>Rp. {{ number_format($row->subtotal) }}</td>
                    </tr>
                    @foreach($row->data_paket as $paket)
                        <tr>
                            <td></td>
                            <td colspan="3">-- {{ strtoupper($paket->nama) }}  {{ $paket->jumlah }}x</td>
                        </tr>
                    @endforeach
                @endforeach
                <tr>
                    <td style="border-bottom: 2px dashed black;" colspan="4"></td>
                </tr>
            </table>

            <table style="width: 100%;">
                <tr>
                    <td style="padding-bottom: 14px;">
                        TOTAL AWAL
                    </td>
                    <td>
                        :
                    </td>
                    <td></td>
                    <td>
                        - Rp. {{number_format($penjualan->grand_total)}}
                    </td>
                </tr>
                <tr>
                    <td rowspan="2" style="padding-bottom: 14px;">
                        DISKON
                    </td>
                    <td>
                        :
                    </td>
                    <td></td>
                    <td>
                        - Rp. {{number_format($penjualan->diskonRupiah)}}
                    </td>
                </tr>
                <tr>
                    <td>
                        :
                    </td>
                    <td></td>
                    <td>
                        - {{$penjualan->diskonPersen}}%
                    </td>
                </tr>
                <tr>
                    <td>
                        ONGKIR
                    </td>
                    <td>
                        :
                    </td>
                    <td></td>
                    <td>
                        Rp. {{ number_format($penjualan->ongkir) }}
                    </td>
                </tr>
                @if(!empty($penjualan->bonus))
                    <tr>
                        <td>
                            BONUS
                        </td>
                        <td>
                            :
                        </td>
                        <td></td>
                        <td>
                            Rp. {{ number_format($penjualan->bonus) }}
                        </td>
                    </tr>
                @endif
                <tr>
                    <td>
                        PPN
                    </td>
                    <td>
                        :
                    </td>
                    <td></td>
                    <td>
                        {{ $penjualan->ppn }}%
                    </td>
                </tr>
                <tr>
                    <td>
                        TOTAL AKHIR
                    </td>
                    <td>
                        :
                    </td>
                    <td></td>
                    <td>
                        Rp. {{ number_format($penjualan->total) }}
                    </td>
                </tr>
                <tr>
                    <td>
                        BAYAR
                    </td>
                    <td>
                        :
                    </td>
                    <td></td>
                    <td>
                        Rp. {{ number_format($penjualan->bayar) }}
                    </td>
                </tr>
                <tr>
                    <td style="border-bottom: 2px dashed black;" colspan="4"></td>
                </tr>
            </table>

            <table style="width:100%; border-spacing:0; margin-top: 10px;">
                <tr>
                    <td colspan="3" style="text-align: center; font-size: 16px;">
                        <img src="{{ asset('logo.png') }}" style="width: 64%;" alt="">
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: center; font-size: 14px;">
                        Sodermee
                    </td>
                </tr>
            </table>
        </div>
    </body>
    <script>
        window.onload = () => {
            // window.print()
        }
    </script>
</html>

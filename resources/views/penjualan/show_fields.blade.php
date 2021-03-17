<div class="col-md-3">
    <!-- Kode Field -->
    <div class="form-group">
        {!! Form::label('kode', 'Kode:') !!}
        <p>{{ $penjualan->kode }}</p>
    </div>

    <!-- Pelanggan Id Field -->
    <div class="form-group">
        {!! Form::label('pelanggan_id', 'Nama Pelanggan:') !!}
        <p>{{ $penjualan->nama_pelanggan }}</p>
    </div>
    <!-- Ppn Field -->
    <div class="form-group">
        {!! Form::label('ppn', 'Ppn:') !!}
        <p>{{ $penjualan->ppn }}%</p>
    </div>
    <!-- Ppn Field -->
    <div class="form-group">
        {!! Form::label('ongkir', 'Ongkir:') !!}
        <p>Rp. {{ number_format($penjualan->ongkir) }}</p>
    </div>
</div>
<div class="col-md-3">
    <!-- Diskon Field -->
    <div class="form-group">
        {!! Form::label('diskon', 'Voucher Diskon:') !!}
        <p>{{ $penjualan->kode_voucher }}</p>
    </div>

    <div class="form-group">
        {!! Form::label('diskon', 'Diskon Voucher:') !!}
        <p>{{ $penjualan->diskon_voucher }}%</p>
    </div>

    <div class="form-group">
        {!! Form::label('diskon', 'Diskon Mitra:') !!}
        <p>{{ $penjualan->diskon_mitra }}%</p>
    </div>
    
    <!-- Created At Field -->
    <div class="form-group">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{{ $penjualan->created_at }}</p>
    </div>
    
</div>

<div class="col-md-3">
    <!-- Total Field -->
    <div class="form-group">
        {!! Form::label('total', 'Total:') !!}
        <p>Rp. {{ number_format($penjualan->total) }}</p>
    </div>

    <!-- Bayar Field -->
    <div class="form-group">
        {!! Form::label('bayar', 'Bayar:') !!}
        <p>Rp. {{ number_format($penjualan->bayar) }}</p>
    </div>

    {{-- Metode Pembayaran --}}
    <div class="form-group">
        {!! Form::label('metode_pembayaran_id', 'Metode Pembayaran:') !!}
        <p>{{ $penjualan->nama_metode_pembayaran }}</p>
    </div>

    <div class="form-group">
        {!! Form::label('updated_at', 'Updated At:') !!}
        <p>{{ $penjualan->updated_at }}</p>
    </div>
</div>

<div class="col-md-3">
    {{-- Bank --}}
    <div class="form-group">
        {!! Form::label('bank_id', 'Bank:') !!}
        <p>{{ $penjualan->nama_bank }}</p>
    </div>

    {{-- Nama Rekening --}}
    <div class="form-group">
        {!! Form::label('nama_rekening', 'Nama Rekening:') !!}
        <p>{{ $penjualan->nama_rekening }}</p>
    </div>

    {{-- Nomor Rekening --}}
    <div class="form-group">
        {!! Form::label('nomor_rekening', 'Nomor Rekening:') !!}
        <p>{{ $penjualan->nomor_rekening }}</p>
    </div>
</div>  



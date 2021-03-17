<div class="row">
    <div class="col-md-8">
        <!-- Nama Field -->
        <div class="form-group">
            {!! Form::label('nama', 'Nama:') !!}
            <p>{{ $promo->nama_barang }}</p>
        </div>

        <!-- Tanggal Mulai Field
        <div class="form-group">
            {!! Form::label('tanggal_mulai', 'Tanggal Mulai:') !!}
            <p>{{ $promo->tanggal_mulai }}</p>
        </div>

        Tanggal Berakhir Field
        <div class="form-group">
            {!! Form::label('tanggal_berakhir', 'Tanggal Berakhir:') !!}
            <p>{{ $promo->tanggal_berakhir }}</p>
        </div> -->

        <!-- Created At Field -->
        <div class="form-group">
            {!! Form::label('created_at', 'Created At:') !!}
            <p>{{ $promo->created_at }}</p>
        </div>

        <!-- Updated At Field -->
        <div class="form-group">
            {!! Form::label('updated_at', 'Updated At:') !!}
            <p>{{ $promo->updated_at }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="box box-warning bg-warning">
          <div class="box-header with-border" style="background: #f39c12; color: #fff;">
            <h3 class="box-title">Barang Paket</h3>
            <br>
            <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" style="color: #fff;" data-widget="collapse">
              <i class="fa fa-minus text-white"></i>
            </button>
            </div>
            <strong>
              @if(count($barang_promo) > 0)
                <span class="badge pull-left" style="background: #39484c;">
                  Total harga :
                  <?php
                    $total_harga = 0;
                    foreach($barang_promo as $row){
                      $total_harga = $total_harga + ($row->harga * $row->jumlah);
                    }
                    echo "Rp. ".number_format($total_harga);
                  ?>
                </span><br>
                <span class="badge pull-left" style="background: #39484c;">
                  <?php
                    $total_barang = 0;
                    foreach($barang_promo as $row){
                      $total_barang = $total_barang + $row->jumlah;
                    }
                    echo $total_barang;
                  ?>
                  <!-- <?= count($barang_promo) ?> Barang -->
                </span>
              @endif
            </strong>
          </div>
          <div class="box-body" style="padding: 0px;">
            <ul class="list-group">
              <div  style="height: 400px; overflow: auto;">
              @if(count($barang_promo) > 0)
                @foreach($barang_promo as $row)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  {!! Form::label('namabarang', 'Nama Barang:') !!} {{ $row->nama }}
                  <br>
                  {!! Form::label('harga', 'Harga Barang:') !!} {{ "Rp. ".number_format($row->harga) }}
                  <!-- {{ $row->nama }}     -->
                  <br>
                  {!! Form::label('jumlah', 'Jumlah:') !!} {{ $row->jumlah }}
                  <!-- <br> -->
                  <!-- {!! Form::label('jumlah', 'Jumlah Kurang:') !!} {{ $row->jumlah_kurang }} -->
                  <!-- <span class="badge" style="background-color: #f39c12; color: #000;"></span> -->
                </li>
                @endforeach
                @else
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                      <center>Tidak ada Barang</center>
                  </li>
                @endif
              </div>
            </ul>
          </div>
        </div>
    </div>
</div>


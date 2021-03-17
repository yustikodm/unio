<div class="box box-warning bg-warning">
  <div class="box-header with-border" style="background: #f39c12; color: #fff;">
    <h3 class="box-title">Barang Terima</h3>
    <br>
    <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" style="color: #fff;" data-widget="collapse">
      <i class="fa fa-minus text-white"></i>
    </button>
    </div>
    <strong>
      @if(count($barangTerima) > 0)          
        <span class="badge pull-left" style="background: #39484c;">
          Total harga :
          <?php 
            $total_harga = 0; 
            foreach($barangTerima as $row){
              $total_harga = $total_harga + ($row->harga * $row->jumlah_kurang);
            }
            echo "Rp. ".number_format($total_harga);            
          ?>          
        </span><br>
        <span class="badge pull-left" style="background: #39484c;">
          <?php 
            $total_barang = 0; 
            foreach($barangTerima as $row){
              $total_barang = $total_barang + $row->jumlah;
            }
            echo $total_barang;            
          ?>
          <!-- <?= count($barangTerima) ?> Barang -->
          Barang
        </span>
      @endif
    </strong> 
  </div>
  <div class="box-body" style="padding: 0px;">        
    <ul class="list-group">    
      <div  style="height: 400px; overflow: auto;">
      @if(count($barangTerima) > 0)  
        @foreach($barangTerima as $row)
        <li class="list-group-item d-flex justify-content-between align-items-center">
          {!! Form::label('namabarang', 'Nama Barang:') !!} {{ $row->nama }} 
          <br>
          {!! Form::label('harga', 'Harga Barang:') !!} Rp. {{ number_format($row->harga) }}    
          <!-- {{ $row->nama }}     -->
          <!-- <br>
          {!! Form::label('jumlah', 'Jumlah:') !!} {{ $row->jumlah }} -->
          <br>
          {!! Form::label('jumlah', 'Jumlah Terima:') !!} {{ $row->jumlah }}
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
<ul class="list-group">    
   <li class="list-group-item" style="background-color: #f39c12; color: #fff;">
    <strong>List Barang</strong>
    <strong>
      @if(count($detailPurchaseOrder) > 0)          
        <span class="badge pull-right" style="background: #39484c; margin-left: 5px;">
          Total harga :
          <?php 
            $total_harga = 0; 
            foreach($detailPurchaseOrder as $row){
              $total_harga = $total_harga + ($row->harga * $row->jumlah_kurang);
            }
            echo "Rp. ".number_format($total_harga);            
          ?>          
        </span>
        <span class="badge pull-right" style="background: #39484c;">
          <?php 
            $total_barang = 0; 
            foreach($detailPurchaseOrder as $row){
              $total_barang = $total_barang + $row->jumlah_kurang;
            }
            echo $total_barang;            
          ?>
          <!-- <?= count($detailPurchaseOrder) ?> Barang -->
          Barang
        </span>
      @endif
    </strong>
  </li>
  <div  style="height: 400px; overflow: auto;">
    @if(count($detailPurchaseOrder) > 0)  
      @foreach($detailPurchaseOrder as $row)
      <li class="list-group-item d-flex justify-content-between align-items-center">
        {!! Form::label('namabarang', 'Nama Barang:') !!} {{ $row->nama }} 
        <br>
        {!! Form::label('harga', 'Harga Barang:') !!} {{ "Rp. ".number_format($row->harga) }}    
        <!-- {{ $row->nama }}     -->
        <br>
        {!! Form::label('Jumlah', 'Jumlah:') !!} {{ $row->jumlah }}
        <br>
        {!! Form::label('Jumlah', 'Jumlah Kurang:') !!} {{ $row->jumlah_kurang }}
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
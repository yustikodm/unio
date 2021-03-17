<div class="box box-warning bg-warning ">
 <div class="box-header with-border" style="background: #f39c12; color: #fff;">
  <h3 class="box-title">Barang Penjualan Paket</h3>
  <br>
  <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" style="color: #fff;" data-widget="collapse">
      <i class="fa fa-minus text-white"></i>
    </button>
  </div>   
  <!-- /.box-tools -->
  </div>
  <!-- /.box-header -->
  <div class="box-body" style="padding: 0px;"> 
  <table class="table table-hover table-striped table-borderd">
      <thead>
        <tr>
          <th>Nama Barang</th>
          <th>Harga </th>
          <th>Jumlah</th>
        </tr>
      </thead>
      <tbody>
        @if(count($barangPenjualanPaket) > 0)  
          @foreach($barangPenjualanPaket as $row)
          <tr>
            <td> <strong>{{ $row->nama }}</strong></td>
            <td>Rp. {{ number_format($row->harga) }}</td>
            <td>{{ $row->jumlah }}</td>
          </tr>

          @foreach($row->data_paket as $bp)
          <tr>
            <td colspan="2"> - {{ $bp->nama }}</td>            
            <td>{{ $bp->jumlah }}</td>
          </tr>
          @endforeach 

          @endforeach
        @else
          <tr>
            <td colspan="3" align="center"> Tidak ada barang</td>
          </tr>
        @endif
      </tbody>
    </table>
  </div>
</div>
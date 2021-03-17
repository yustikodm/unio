<div class="container-fluid">
  <div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="box box-warning bg-warning">
        <div class="box-header with-border" style="background: #f39c12; color: #fff;">
          <h3 class="box-title">List Barang</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" style="color: #fff;" data-widget="collapse">
              <i class="fa fa-minus text-white"></i>
            </button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">        
          <div class="overlay" style="display: none;">
            <i class="fa fa-refresh fa-spin"></i>
          </div>
          <table class="table table-bordered table-striped table-hover" id="tableViewBarangKB">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Jumlah Kirim</th>
                <th scope="col">Jumlah Kurang</th>
                <th><input type="checkbox" class="checkBarangAll">Pilih Semua</th>
              </tr>
            </thead>
            <tbody class="blistkb">    
              <?php $totaljumlah = 0; $totalharga = 0; ?>          
                @foreach($barang as $row)                    
                    <tr>
                      <td scope="col">{{ $loop->iteration }}</td>
                      <td scope="col">{{$row->nama}}</td>
                      <td scope="col">Rp. {{number_format($row->harga)}}</td>
                      <td scope="col">{{$row->jumlah}}</td>
                      @if($row->checked)
                      <td scope="col"> 
                        <input type="number" min="1" style="width: 90px;" class="form-control jumlahKirimBarang text-center input" data-id="{{ $row->barang_id }}" value="{{ $row->jumlah_kurang }}"> 
                      </td>
                      <td scope="col" class="checkBarang-{{$row->barang_id}}" >{{$row->jumlah - $row->jumlah_kurang}}</td>                      
                        <td scope="col"><input type="checkbox" class="checkBarang" checked data-id="{{$row->barang_id}}"></td>
                        <?php $totaljumlah = $totaljumlah + $row->jumlah_kurang; ?>               
                        <?php $totalharga = $totalharga + $row->jumlah_kurang * $row->harga; ?>
                      @else
                      <td scope="col"> 
                        <input type="number" min="1" style="width: 90px;" disabled class="form-control jumlahKirimBarang text-center input" data-id="{{ $row->barang_id }}" value="{{ $row->jumlah_kurang }}"> 
                      </td>
                      <td scope="col" class="checkBarang-{{$row->barang_id}}" ></td>                      
                        <td scope="col"><input type="checkbox" class="checkBarang" data-id="{{$row->barang_id}}"></td>
                      @endif
                    </tr>     
                                                  
              @endforeach
              <tr>                      
                <th scope="col" colspan="3" style="text-align: right;">Total :</th>
                <td scope="col" class="totaljumlah">{{$totaljumlah}}</td>
                <td scope="col" class="totalharga">Rp. {{number_format($totalharga)}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      <!-- /.box-body -->
    </div>  
   </div> 
  </div>
</div>
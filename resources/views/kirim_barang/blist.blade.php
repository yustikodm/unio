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
                <th>Jumlah Kirim</th>              
                <th>Jumlah Kurang</th>              
                <th><input type="checkbox" class="checkBarangAll">Pilih Semua</th>
              </tr>
            </thead>
            <tbody class="blistkb">
              <tr>
                <th scope="row" colspan="6">Tidak Ada Barang</th>
              </tr>                   
            </tbody>
          </table>
        </div>
      <!-- /.box-body -->
    </div>  
   </div> 
  </div>
</div>
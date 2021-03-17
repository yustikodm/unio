<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 15px;">            
            {!! Form::label('', 'Nama Barang:') !!}
            <!-- <div class="input-group"> -->
              {!! Form::select('', $barangItems, null, ['class' => 'select2 form-control blistpo']) !!}                               
                <button class="btn btn-block btn-primary btnaddb pull-right" type="button" data-id="1" style="margin-top: 10px; margin-bottom: 10px;">
                    <i class="fa fa-plus"></i> Tambah Barang
                </button>              
            <!-- </div> -->
        </div>        
    </div>       
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="overlay" style="display: none;">
            <i class="fa fa-refresh fa-spin"></i>
          </div>
          <div class="table-responsive box box-warning">                    
              <table class="table table-bordered table-striped table-hover" id="tableViewBarangKB">
                <thead>                
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Jumlah</th>
                    <th>Aksi</th>
                  </tr>              
                </thead>
                <tbody class="box-barang">                                                    
                    <tr>
                        <th scope="col" colspan="6">Tidak ada barang</th>                   
                    </tr>  
                </tbody>
                <!-- <tfoot>
                    <tr>                      
                        <th scope="col" colspan="4" style="text-align: right;">Total :</th>
                        <td scope="col" class="totaljumlah"></td>
                        <td scope="col" class="totalharga">Rp. 0</td>
                    </tr>    
                </tfoot> -->
              </table>
          </div>
        </div>
    </div>
</div>

<div class="container-fluid" id="box-barang">
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
            <div class="table-responsive box box-warning">                    
              <table class="table table-bordered table-striped table-hover" id="tableViewBarangKB">
                <thead>                
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Jumlah</th>
                    <th>Aksi</th>
                  </tr>              
                </thead>
                <tbody class="box-barang">
                    <?php $no = 1; ?>
                    @foreach($detailPurchaseOrder as $row)                                                    
                        <tr data-barang="{{ $row->id }}">
                            <td scope="col">#</td>
                            <td scope="col"> {{ $row->nama }}</td>
                            <td scope="col">Rp. {{ number_format($row->harga) }}</td>
                            <td scope="col" data-stok="{{ $row->id }}">{{ $row->stok }}</td>
                            <td scope="col">
                                <input type="number" min="1" style="width: 90px;" class="form-control text-center inpsb sb-{{ $row->id }}" data-id="{{ $row->id }}" value="{{ $row->jumlah }}"> 
                            </td>                     
                            <td scope="col">
                                <button type="button" class="btn btn-danger btndelbarang" data-id="{{ $row->id }}">
                                    <i class="fa fa-close"></i>
                                </button>
                            </td>
                        </tr>
                    <?php $no++; ?>
                    @endforeach  
                </tbody>
              </table>
          </div>
        </div>
    </div>
</div>      
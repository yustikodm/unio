@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Paket
        </h1>
   </section>   
   <div class="content">
        @include('adminlte-templates::common.errors')
          {!! Form::model($promo, ['route' => ['promo.update', $promo->id], 'method' => 'patch']) !!}
            <div class="box box-primary">
                <div class="box-body">
                    <div class="row">
                        @include('promo.fields')                        
                    </div>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="col-md-12">
                        <h4 class="title">Barang Dalam Paket</h4>
                    </div>
                </div>
                <div class="box-header with-border">
                    <div class="row">
                       <div class="col-sm-12">
                            <div class="col-sm-6">
                                {!! Form::select('barang', $barangItems, null, ['class' => 'select2 form-control']) !!}
                            </div>
                            <div class="col-sm-2">
                                {!! Form::number('jumlah_barang', null, ['class' => 'form-control', 'placeholder' => 'Jumlah']) !!}
                            </div>                        
                            <div class="col-sm-4">
                                <button id="add_barang_button" class="btn btn-success" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">

                        <div class="col-sm-12">
                            <table class="table table-striped">
                                <thead>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Subtotal</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>                                  
                                  <?php $hargaTotal = 0;  ?>
                                  @foreach ($barang_promo as $row)
                                    <tr class='id_barang_{{$row->barang_id}}'>                                    
                                        <td> {{ $row->nama }} </td>
                                        <td>Rp {{ number_format($row->harga) }} </td>
                                        <td class='jumlah'> {{ $row->jumlah }} </td>
                                        <td>Rp. <span> {{ number_format($row->harga * $row->jumlah) }} </span></td>
                                        <td>
                                            <button class='barang_delete btn btn-danger btn-xs' type='button'>
                                                <i class='fa fa-times' aria-hidden='true'></i>
                                            </button>
                                        </td>
                                        <input name='barang_promo[]' type='hidden' value='{{ $row->barang_id }}'>
                                        <input name='jumlah_barang_promo[]' type='hidden' value=' {{ $row->jumlah }} '> 
                                    </tr>
                                    <?php $hargaTotal += $row->harga * $row->jumlah;  ?>
                                  @endforeach
                                </tbody>
                                <thead>
                                    <th></th>
                                    <th></th>
                                    <th>Subtotal</th>
                                    <th>Rp. <span class="subtotal">{{ number_format($hargaTotal) }}</span></th>
                                    <th></th>
                                </thead>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-body">
                    <div class="row">
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary', 'id' => 'btnEditPromo']) !!}
                            <a href="{{ route('promo.index') }}" class="btn btn-default">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
        <script>
        $(document).ready(function () {
            $(function () {
                function checkStock() {                    
                    console.log('z: ' + statusStok);                    
                    // return 0;
                };


                var subtotal = "{{ $hargaTotal }}";
                // console.log(parseInt(subtotal))
                // var grand_total = 0;

                function addBarang() {
                    $.ajax({
                        type: 'GET',
                        url: "{!! url("api/stokHarga") !!}/" + $("[name='barang']").val(),
                        success: function (result) {
                            if ($.isEmptyObject(result.data)) {
                                console.log('empty');
                            } else {
                                var response = result.data[0];
                                var harga = response.harga;
                                var jumlah = isNaN(parseInt($("[name='jumlah_barang']").val())) ? 0 : parseInt($("[name='jumlah_barang']").val());

                                if ($('.id_barang_' + response.id).length == 0) {
                                    $('tbody').append(
                                        "<tr class='id_barang_" + response.id + "'>" +
                                            "<td>" + response.nama +"</td>" +
                                            "<td>" + formatRupiah(harga, "Rp. ") + "</td>" +
                                            "<td class='jumlah'>" + jumlah + "</td>" +
                                            "<td>Rp. <span>" + formatRupiah(harga * jumlah) + "</span></td>" +
                                            "<td>" +
                                                "<button class='barang_delete btn btn-danger btn-xs' type='button'>" +
                                                    "<i class='fa fa-times' aria-hidden='true'></i>" +
                                                "</button>" +
                                            "</td>" +
                                            "<input name='barang_promo[]' type='hidden' value='" + response.id + "'>" +
                                            "<input name='jumlah_barang_promo[]' type='hidden' value='" + jumlah + "'>" +
                                        "</tr>"
                                    );

                                    subtotal = parseInt(subtotal) + parseInt(harga) * parseInt(jumlah);
                                    $('.subtotal').html(formatRupiah(subtotal));

                                    // var ppn = $("[name='ppn']").val();
                                    // var diskon = $("[name='diskon']").val();

                                    // var setelah_diskon = subtotal - (diskon / 100 * subtotal)
                                    // var setelah_ppn = (ppn / 100 * setelah_diskon) + setelah_diskon;
                                    // grand_total = setelah_ppn;

                                    // $(".grand_total").html(setelah_ppn);
                                    // $("[name='total']").val(setelah_ppn);
                                } else {
                                    var jumlah_barang = parseInt($('.id_barang_' + response.id).children().eq(2).html());
                                    var hasil = jumlah_barang + jumlah;
                                    var subtotal_barang = harga * hasil;

                                    $('.id_barang_' + response.id).children().eq(2).html(hasil);
                                    $('.id_barang_' + response.id).children().eq(3).html('Rp. <span>' + formatRupiah(subtotal_barang) + '</span>');
                                    $('.id_barang_' + response.id).children().eq(6).val(hasil);

                                    subtotal = parseInt(subtotal) + parseInt(jumlah) * parseInt(harga);
                                    $('.subtotal').html(formatRupiah(subtotal));

                                    // var ppn = $("[name='ppn']").val();
                                    // var diskon = $("[name='diskon']").val();

                                    // var setelah_diskon = subtotal - (diskon / 100 * subtotal)
                                    // var setelah_ppn = (ppn / 100 * setelah_diskon) + setelah_diskon;
                                    // grand_total = setelah_ppn;
                                    
                                    // $(".grand_total").html(setelah_ppn);
                                    // $("[name='total']").val(setelah_ppn);
                                }
                            }
                            
                        },
                        error: function (err) {
                            
                        }
                    });
                }

                $('#add_barang_button').click(function () {
                    var statusStok = 1;
                    var jumlah = isNaN(parseInt($("[name='jumlah_barang']").val())) ? 0 : parseInt($("[name='jumlah_barang']").val());
                    
                    $.ajax({
                        type: 'GET',
                        url: "{!! url("api/stok") !!}/" + $("[name='barang']").val(),
                        success: function (result) {
                            var stok = result.data.stok;

                            if ($.isEmptyObject(result.data)) {
                                swal("Maaf, Terjadi Kesalahan.", "Gagal mendapatkan data stok barang.", "error");
                            } else {
                                if (stok == 0) {
                                    swal("Peringatan!", "Stok barang habis.", "warning");
                                } else if ((stok - jumlah) < 0) {
                                    swal("Peringatan!", "Stok barang tidak cukup.", "warning");
                                } else {
                                    addBarang();
                                }
                            }
                        },
                        error: function (err) {
                            
                        }
                    });
                });

                $("tbody").on('click', '.barang_delete', function () {
                    subtotal -= parseInt($(this).parent().siblings().eq(3).children().html().replace(/[^0-9]/g,''));
                    $('.subtotal').html(formatRupiah(subtotal));
                    $(this).parent().parent().remove();

                    var ppn = $("[name='ppn']").val();
                    var diskon = $("[name='diskon']").val();

                    var setelah_diskon = subtotal - (diskon / 100 * subtotal)
                    var setelah_ppn = (ppn / 100 * setelah_diskon) + setelah_diskon;
                    grand_total = setelah_ppn;
                    
                    $(".grand_total").html(setelah_ppn);
                    $("[name='total']").val(setelah_ppn);
                });                               
            });
        });
    </script>
   
@endsection
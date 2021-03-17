@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Laporan Omset</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="col-md-12">
                    <h4>Filter</h4>
                </div>
            </div>
            <div class="box-body">                                                   
                <form action="" method="get">                     
	                 <div class="form-group col-md-6">   
	                    <label>Tahun :</label>
	                    <input name="startYear" id="startYear" <?= (Request::get('startYear') !== '') ? 'value="'.Request::get('startYear').'"' : '' ?> class="form-control datePicker" name="f" required="">                     
	                </div>                                                                          
            </div>
            <div class="box-footer">
                <div class="col-md-12">
                     @if(isset($penjualan))
                        @if(count($penjualan) != 0)                       
                         <a target="_blank" href="exportLaporanOmset?year={{ Request::get('startYear') }}" class="btn btn-warning pull-right"  style="margin-right: 5px;">
                            Export
                         </a>                                        
                        @endif
                    @endif
                     <a href="laporanOmset" class="btn btn-danger pull-right"  style="margin-right: 5px;">
                         Reset
                     </a>
                     <button class="btn btn-primary pull-right" id="btnFilter"  style="margin-right: 5px;">
                         Cari
                     </button>
                    </form>                     
                </div>
            </div>
        </div>

        @if(isset($penjualan))
            <div class="box box-primary">
                <div class="box-header">
                    <div class="col-md-12">   
                        <h4>Omset Dalam Tahun {{ Request::get('startYear') }} </h4>
                        <h4>Omset : Rp. {{number_format($omset)}}</h4>
                        <h4>Jumlah Transaksi : {{$transaksi}}</h4>
                    </div>
                </div>  
                <div class="box-body">
               		<div class="row">
               			<div class="col-md-4 list-group">
               				<div class="list-group-item">
               					<h4>Januari</h4>               					
               					@foreach($penjualan as $m)
               						@if($m['bulan'] == "January")
               							{{ "Rp. ".number_format($m['total']) }} 
               							<br>
               							{{ "Jumlah Transaksi ".$m['transaksi'] }}              						
               						@endif
               					@endforeach
               				</div>
               				<div class="list-group-item">
               					<h4>Februari</h4>
               					@foreach($penjualan as $m)
               						@if($m['bulan'] == "February")
               							{{ "Rp. ".number_format($m['total']) }}
               							<br>
               							{{ "Jumlah Transaksi ".$m['transaksi'] }}
               						@endif
               					@endforeach
               				</div>
               				<div class="list-group-item">
               					<h4>Maret</h4>
               					@foreach($penjualan as $m)
               						@if($m['bulan'] == "March")
               							{{ "Rp. ".number_format($m['total']) }}
               							<br>
               							{{ "Jumlah Transaksi ".$m['transaksi'] }}
               						@endif
               					@endforeach
               				</div>
               				<div class="list-group-item">
               					<h4>April</h4>
               					@foreach($penjualan as $m)
               						@if($m['bulan'] == "April")
               							{{ "Rp. ".number_format($m['total']) }}
               							<br>
               							{{ "Jumlah Transaksi ".$m['transaksi'] }}
               						@endif
               					@endforeach
               				</div>
               			</div>	
               			<div class="col-md-4 list-group">
               				<div class="list-group-item">
               					<h4>Mei</h4>
               					@foreach($penjualan as $m)
               						@if($m['bulan'] == "May")
               							{{ "Rp. ".number_format($m['total']) }}
               							<br>
               							{{ "Jumlah Transaksi ".$m['transaksi'] }}
               						@endif
               					@endforeach
               				</div>
               				<div class="list-group-item">
               					<h4>Juni</h4>
               					@foreach($penjualan as $m)
               						@if($m['bulan'] == "June")
               							{{ "Rp. ".number_format($m['total']) }}
               							<br>
               							{{ "Jumlah Transaksi ".$m['transaksi'] }}
               						@endif
               					@endforeach
               				</div>
               				<div class="list-group-item">
               					<h4>Juli</h4>
               					@foreach($penjualan as $m)
               						@if($m['bulan'] == "July")
               							{{ "Rp. ".number_format($m['total']) }}
               							<br>
               							{{ "Jumlah Transaksi ".$m['transaksi'] }}
               						@endif
               					@endforeach
               				</div>
               				<div class="list-group-item">
               					<h4>Agustus</h4>
               					@foreach($penjualan as $m)
               						@if($m['bulan'] == "August")
               							{{ "Rp. ".number_format($m['total']) }}
               							<br>
               							{{ "Jumlah Transaksi ".$m['transaksi'] }}
               						@endif
               					@endforeach
               				</div>
               			</div>	
               			<div class="col-md-4 list-group">
               				<div class="list-group-item">
               					<h4>September</h4>
               					@foreach($penjualan as $m)
               						@if($m['bulan'] == "September")
               							{{ "Rp. ".number_format($m['total']) }}
               							<br>
               							{{ "Jumlah Transaksi ".$m['transaksi'] }}
               						@endif
               					@endforeach
               				</div>
               				<div class="list-group-item">
               					<h4>Oktober</h4>
               					@foreach($penjualan as $m)
               						@if($m['bulan'] == "October")
               							{{ "Rp. ".number_format($m['total']) }}
               							<br>
               							{{ "Jumlah Transaksi ".$m['transaksi'] }}
               						@endif
               					@endforeach
               				</div>
               				<div class="list-group-item">
               					<h4>Nopember</h4>
               					@foreach($penjualan as $m)
               						@if($m['bulan'] == "November")
               							{{ "Rp. ".number_format($m['total']) }}
               							<br>
               							{{ "Jumlah Transaksi ".$m['transaksi'] }}
               						@endif
               					@endforeach
               				</div>
               				<div class="list-group-item">
               					<h4>Desember</h4>
               					@foreach($penjualan as $m)
               						@if($m['bulan'] == "December")
               							{{ "Rp. ".number_format($m['total']) }}
               							<br>
               							{{ "Jumlah Transaksi ".$m['transaksi'] }}
               						@endif
               					@endforeach
               				</div>
               			</div>	
               		</div>              
                </div>      
            </div>
        @endif
    </div>  
    <script>
    	$('.datePicker').datepicker({
    		format: "yyyy",
		    weekStart: 1,
		    orientation: "bottom",
		    keyboardNavigation: false,
		    viewMode: "years",
		    minViewMode: "years"   	
    	});        
    </script>  
@endsection


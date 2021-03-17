@extends('layouts.app')
@section('content')
    <!-- <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{ Auth::user()->image_path }}" alt="" class="user-image">
                        <span class="pr-3 align-middle">{!! Auth::user()->name !!}</span>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
<section class="content-header">
    <h1>
        Profile Mitra
    </h1>
</section>
<section class="content">
     <div class="row">
        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ Auth::user()->image_path }}" alt="User profile picture">

              <h3 class="profile-username text-center">{!! Auth::user()->name !!}</h3>

              <p class="text-muted text-center">{{ $level->nama }}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Transaksi</b> <a class="pull-right">{{ count($penjualan) }}</a>
                </li>
                <li class="list-group-item">
                  <b>Referral</b> <a class="pull-right">{{ count($referral) }}</a>
                </li>
                <li class="list-group-item">
                  <b>Poin</b> <a class="pull-right">{{ (!empty($poin->poin)) ? $poin->poin : 'Belum punya poin' }}</a>
                </li>
                <li class="list-group-item">
                  <b>Bintang</b> <a class="pull-right">{{ (!empty($bintang->bintang)) ? $bintang->bintang : 'Belum punya bintang' }}</a>
                </li>
                <li class="list-group-item">
                  <b>Bonus</b> <a class="pull-right">{{ (!empty($bonus->bonus)) ? "Rp. ".number_format($bonus->bonus) : 'Belum Punya Bonus' }}</a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Data Mitra</a></li>
              <li><a href="#pelanggan" data-toggle="tab">Data Pelanggan</a></li>
              <li><a href="#user" data-toggle="tab">Data Pengguna</a></li>
              <!-- <li><a href="#bintang" data-toggle="tab">History Bintang</a></li>
              <li><a href="#bonus" data-toggle="tab">History Bonus</a></li>
              <li><a href="#poin" data-toggle="tab">History Poin</a></li> -->
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('kode', 'Kode:') !!}
                            <p>{{ $mitra->kode }}</p>
                        </div>

                        <div class="form-group">
                            {!! Form::label('created_at', 'Dibuat pada Tanggal:') !!}
                            <p>{{ $mitra->created_at }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('kode', 'Tanggal Mulai:') !!}
                            <p>{{ $mitra->tanggal_mulai }}</p>
                        </div>

                        <div class="form-group">
                            {!! Form::label('created_at', 'Tanggal Akhir:') !!}
                            <p>{{ $mitra->tanggal_akhir }}</p>
                        </div>
                    </div>
                </div>
              </div>
              <div class="tab-pane" id="pelanggan">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('kode', 'Nama:') !!}
                            <p>{{ $pelanggan->nama }}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('created_at', 'Nomor KTP:') !!}
                            <p>{{ $pelanggan->nomor_ktp }}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('created_at', 'Jenis Kelamin:') !!}
                            <p>{{ $pelanggan->jenis_kelamin }}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('created_at', 'Telepon:') !!}
                            <p>{{ $pelanggan->telepon }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('kode', 'Kode:') !!}
                            <p>{{ $pelanggan->kode }}</p>
                        </div>

                        <div class="form-group">
                            {!! Form::label('kode', 'Tanggal Lahir:') !!}
                            <p>{{ $pelanggan->tanggal_lahir }}</p>
                        </div>

                        <div class="form-group">
                            {!! Form::label('created_at', 'Alamat:') !!}
                            <p>{{ $pelanggan->alamat }}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('created_at', 'HP:') !!}
                            <p>{{ $pelanggan->hp }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('kode', 'Pekerjaan:') !!}
                            <p>{{ $pelanggan->pekerjaan }}</p>
                        </div>

                        <div class="form-group">
                            {!! Form::label('kode', 'Kota:') !!}
                            <p>{{ $pelanggan->kota }}</p>
                        </div>

                        <div class="form-group">
                            {!! Form::label('created_at', 'Dibuat pada Tanggal:') !!}
                            <p>{{ $pelanggan->created_at }}</p>
                        </div>
                    </div>
                </div>
              </div>
              <div class="tab-pane" id="user">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('kode', 'Nama:') !!}
                            <p>{{ $user->name }}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('created_at', 'Email:') !!}
                            <p>{{ $user->email }}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('kode', 'Dibuat pada Tanggal:') !!}
                            <p>{{ $user->created_at }}</p>
                        </div>
                        <div class="form-group">
                            <a href="{{ route('users.edit', $user->id) }}" class='btn btn-primary btn-sm'>
                                <i class="fa fa-fw fa-edit"></i> Ubah
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('Phone', 'Phone:') !!}
                            <p>{{ $user->phone }}</p>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  </div>
</section>
@endsection

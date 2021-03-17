<div class="box box-primary">
    <div class="box-header with-border">
        <div class="col-sm-12">
            <h4>Data</h4>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <!-- Kode Field -->
            <!-- <div class="form-group col-sm-6">
                {!! Form::label('kode', 'Kode:') !!}
                {!! Form::text('kode', null, ['class' => 'form-control']) !!}
            </div> -->

            <!-- Pelanggan Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('pelanggan_id', 'Pelanggan:') !!}
                @if(Request::is('mitra/*/edit'))
                    {!! Form::text('pelanggan_id', $mitra->nama, ['class' => 'form-control', 'readonly' => 'true']) !!}
                @else
                    {!! Form::select('pelanggan_id', $pelangganItems, null, ['class' => 'select2 form-control']) !!}
                @endif
            </div>

            <!-- Level Mitra Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('level_mitra_id', 'Level:') !!}
                {!! Form::select('level_mitra_id', $levelMitraItems, null, ['class' => 'select2 form-control']) !!}
            </div>

            <!-- Referral Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('pelanggan_id', 'Referral:') !!}
                @if(Request::is('mitra/*/edit'))
                    {!! Form::text('referral_id', $mitra->referral_nama, ['class' => 'form-control', 'readonly' => 'true']) !!}
                @else
                    {!! Form::select('referral_id', $mitraItems, null, ['class' => 'select2 form-control', 'placeholder' => '']) !!}
                @endif
            </div>

            <!-- Tanggal Mulai Field -->
            @if(Request::is('mitra/*/edit'))
                <div class="form-group col-sm-6">
                    {!! Form::label('tanggal_mulai', 'Tanggal Mulai:') !!}
                    {!! Form::date('tanggal_mulai', $mitra->tanggal_mulai, ['class' => 'form-control','id'=>'tanggal_mulai']) !!}
                </div>
            @else
                <div class="form-group col-sm-6">
                    {!! Form::label('tanggal_mulai', 'Tanggal Mulai:') !!}
                    {!! Form::date('tanggal_mulai', null, ['class' => 'form-control','id'=>'tanggal_mulai']) !!}
                </div>
            @endif

            @push('scripts')
                <script type="text/javascript">
                    $('#tanggal_mulai').datetimepicker({
                        format: 'YYYY-MM-DD HH:mm:ss',
                        useCurrent: false
                    })
                </script>
            @endpush

            <!-- Tanggal Akhir Field -->
            @if(Request::is('mitra/*/edit'))
                <div class="form-group col-sm-6">
                    {!! Form::label('tanggal_akhir', 'Tanggal Akhir:') !!}
                    {!! Form::date('tanggal_akhir', $mitra->tanggal_akhir, ['class' => 'form-control','id'=>'tanggal_akhir']) !!}
                </div>
            @else
                <div class="form-group col-sm-6">
                    {!! Form::label('tanggal_akhir', 'Tanggal Akhir:') !!}
                    {!! Form::date('tanggal_akhir', null, ['class' => 'form-control','id'=>'tanggal_akhir']) !!}
                </div>
            @endif

            @push('scripts')
                <script type="text/javascript">
                    $('#tanggal_akhir').datetimepicker({
                        format: 'YYYY-MM-DD HH:mm:ss',
                        useCurrent: false
                    })
                </script>
            @endpush

            @if(Request::is('mitra/*/edit'))
                <!-- Submit Field -->
                <div class="form-group col-sm-12">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ route('mitra.index') }}" class="btn btn-default">Cancel</a>
                </div>
            @endif
        </div>
    </div>
</div>

@if(Request::is('mitra/*/edit'))

@else
<div class="box box-primary">
    <div class="box-header with-border">
        <div class="col-sm-12">
            <h4>Akun</h4>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <!-- Name Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('name', 'Name:') !!}<span class="required">*</span>
                @if(Request::is('mitra/*/edit'))
                    {!! Form::text('name', $user->name, ['id'=>'name', 'class' => 'form-control', 'required']) !!}
                @else
                    {!! Form::text('name', null, ['id'=>'name', 'class' => 'form-control', 'required']) !!}
                @endif
            </div>
            <!-- Email Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('email', 'Email:') !!}<span class="required">*</span>
                @if(Request::is('mitra/*/edit'))
                    {!! Form::email('email', $user->email, ['id'=>'email', 'class' => 'form-control', 'required']) !!}
                @else
                    {!! Form::email('email', null, ['id'=>'email', 'class' => 'form-control', 'required']) !!}
                @endif
            </div>

           
            <!-- Password Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('password', 'New Password:') !!}<span class="required confirm-pwd">*</span>
                <input class="form-control input-group__addon" id="pfNewPassword" type="password"
                       name="password" required>
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('password_confirmation', 'Confirm Password:') !!}<span
                        class="required confirm-pwd">*</span>
                <input class="form-control input-group__addon" id="pfNewConfirmPassword" type="password"
                       name="password_confirmation" required>
            </div>
        </div>

        <!-- Submit Field -->
        <div class="form-group col-sm-12">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('mitra.index') }}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>
@endif

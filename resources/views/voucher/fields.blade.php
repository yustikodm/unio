<!-- Kode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kode', 'Kode:') !!}
    {!! Form::text('kode', null, ['class' => 'form-control']) !!}
</div>

<!-- Kadaluarsa Field -->
@if(Request::is('voucher/*/edit'))
<div class="form-group col-sm-6">
    {!! Form::label('kadaluarsa', 'Kadaluarsa:') !!}
    {!! Form::date('kadaluarsa', $voucher->kadaluarsa, ['class' => 'form-control','id'=>'kadaluarsa']) !!}
</div>
@else
<div class="form-group col-sm-6">
    {!! Form::label('kadaluarsa', 'Kadaluarsa:') !!}
    {!! Form::date('kadaluarsa', null, ['class' => 'form-control','id'=>'kadaluarsa']) !!}
</div>
@endif

@if(Request::is('voucher/*/edit'))
<div class="form-group col-sm-6">
    {!! Form::label('jabatan_id', 'Untuk Jabatan:') !!}
    {!! Form::select('jabatan_id', $jabatan ,$voucher->jabatan_id, ['class' => 'select2 form-control','id'=>'kadaluarsa']) !!}
</div>
@else
<div class="form-group col-sm-6">
    {!! Form::label('jabatan_id', 'Untuk Jabatan:') !!}
    {!! Form::select('jabatan_id', $jabatan ,null, ['class' => 'select2 form-control','id'=>'kadaluarsa']) !!}
</div>
@endif


@push('scripts')
    <script type="text/javascript">
        $('#kadaluarsa').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Diskon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('diskon', 'Diskon:') !!}
    <!-- <div class="input-group"> -->
        {!! Form::number('diskon', null, ['class' => 'form-control']) !!}
        <!-- <span class="input-group-addon">%</span> -->
    <!-- </div> -->
</div>

<!-- Diskon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipe', 'Tipe:') !!}
        @if(Request::is('voucher/*/edit'))
            <div class="form-check">
                <input {{ ($voucher->tipe == "rupiah")? 'checked'  : ''}}  class="form-check-input" type="radio" name="tipe" id="rupiah" value="rupiah" required>
                <label class="form-check-label" for="rupiah">
                    Rupiah
                </label>
            </div>
            <div class="form-check">
                <input {{ ($voucher->tipe == "persen")? 'checked'  : ''}} class="form-check-input" type="radio" name="tipe" id="persen" value="persen" required>
                <label class="form-check-label" for="persen">
                    Persen
                </label>
            </div>
        @else
            <div class="form-check">
                <input class="form-check-input" type="radio" name="tipe" id="rupiah" value="rupiah" required>
                <label class="form-check-label" for="rupiah">
                    Rupiah
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="tipe" id="persen" value="persen" required>
                <label class="form-check-label" for="persen">
                    Persen
                </label>
            </div>
        @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('voucher.index') }}" class="btn btn-default">Cancel</a>
</div>

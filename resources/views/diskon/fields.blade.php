<!-- Barang Id Field -->
@if(Request::is('diskon/*/edit'))
<div class="form-group col-sm-6">
    {!! Form::label('barang_id', 'Barang:') !!}
    {!! Form::select('barang_id', $barangItems, null, ['class' => 'select2 form-control', 'disabled' => 'true']) !!}
</div>
@else
<div class="form-group col-sm-6">
    {!! Form::label('barang_id', 'Barang:') !!}
    {!! Form::select('barang_id', $barangItems, null, ['class' => 'select2 form-control']) !!}
</div>
@endif

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
    @if(Request::is('diskon/*/edit'))             
        <div class="form-check">
            <input {{ ($diskon->tipe == "rupiah")? 'checked'  : ''}}  class="form-check-input" type="radio" name="tipe" id="rupiah" value="rupiah" required>
            <label class="form-check-label" for="rupiah">
                Rupiah
            </label>
        </div>
        <div class="form-check">
            <input {{ ($diskon->tipe == "persen")? 'checked'  : ''}} class="form-check-input" type="radio" name="tipe" id="persen" value="persen" required>
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
    <a href="{{ route('diskon.index') }}" class="btn btn-default">Cancel</a>
</div>

<div class='btn-group'>
    <a href="{{ route('penerimaanRetur.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
@if($status == 'Open' || $status == 'open')
    <a href="{{ route('penerimaanRetur.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
{!! Form::open(['route' => ['penerimaanRetur.destroy', $id], 'method' => 'delete', 'style' => 'display: inline;']) !!}
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
{!! Form::close() !!}
{!! Form::open(['route' => ['updatePenerimaan', $id], 'method' => 'post', 'style' => 'display: inline;']) !!}
    {!! Form::button('<i class="glyphicon glyphicon-time"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-info btn-xs',
        'onclick' => "return confirm('Apakah anda yakin untuk menerima retur barang?')"
    ]) !!}
{!! Form::close() !!}
@else
    <button class="btn btn-xs btn-success" disabled>
        <i class="glyphicon glyphicon-check"></i>
    </button>
@endif
</div>

<div class='btn-group'>

    <a href="{{ route('kirimBarang.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @if($status == 'Open' || $status == 'open')
    <a href="{{ route('kirimBarang.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
{!! Form::open(['route' => ['kirimBarang.destroy', $id], 'method' => 'delete', 'style' => 'display: inline-block']) !!}
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
{!! Form::close() !!}    
{!! Form::open(['route' => ['updateKirimBarang', $id], 'method' => 'post', 'style' => 'display: inline-block']) !!}
    {!! Form::button('<i class="glyphicon glyphicon-time"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-info btn-xs',
        'onclick' => "return confirm('Yakin Kirim Barang?')"
    ]) !!}
{!! Form::close() !!}
    @else
        <button class="btn btn-success btn-xs" disabled>
            <i class="glyphicon glyphicon-check"></i>
        </button>
    @endif    
</div>
 
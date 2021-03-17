<div class='btn-group'>
    <a href="{{ route('penyesuaianStok.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <!-- <a href="{{ route('penyesuaianStok.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
{!! Form::open(['route' => ['penyesuaianStok.destroy', $id], 'method' => 'delete', 'style' => 'display: inline']) !!}
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
{!! Form::close() !!}
{!! Form::open(['route' => ['updatePenyesuaian', $id], 'method' => 'post', 'style' => 'display: inline']) !!}
    {!! Form::button('<i class="glyphicon glyphicon-time"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-info btn-xs',
        'onclick' => "return confirm('Apakah anda yakin Menyesuaikan?')"
    ]) !!}
{!! Form::close() !!} -->

</div>

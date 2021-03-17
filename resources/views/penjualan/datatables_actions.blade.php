<!-- {!! Form::open(['route' => ['penjualan.destroy', $id], 'method' => 'delete']) !!} -->
<div class='btn-group'>
    <a href="{{ route('penjualan.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @if($status == "Dibayar")
        <a href="{{ route('printPopUp', $id) }}" target="_blank" class='btn btn-info btn-xs' onclick="return confirm('Are you sure?')">
            <i class="fa fa-print"></i>
        </a>
    @endif
    <!-- <a href="{{ route('penjualan.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a> -->
    <!-- {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!} -->
</div>
<!-- {!! Form::close() !!} -->

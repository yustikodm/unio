@if($status == 'open' || $status == 'Open')
{!! Form::open(['route' => ['purchaseOrder.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('purchaseOrder.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <a href="{{ route('purchaseOrder.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
{!! Form::close() !!}
{!! Form::open(['route' => ['updatePurchaseOrder', $id], 'method' => 'post', 'style' => 'display: inline-block']) !!}
    {!! Form::button('<i class="glyphicon glyphicon-time"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-info btn-xs',
        'onclick' => "return confirm('Yakin untuk di Proses?')"
    ]) !!}
{!! Form::close() !!}
</div>
@else
<div class='btn-group'>
    <a href="{{ route('purchaseOrder.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <button class="btn btn-success btn-xs" disabled>
            <i class="glyphicon glyphicon-check"></i>
        </button>
</div>
@endif
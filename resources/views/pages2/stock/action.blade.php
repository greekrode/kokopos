<a href="{{ route('stock.edit', $stocks->id) }}" class="btn btn-md btn-primary"><i class="mdi mdi-pencil"></i> Edit</a>
<form action="{{ route('reset_stock.reset', $stocks->id)}}" method="post" style="display: inline-block">
    @csrf
    @method('POST')
    <button class="btn btn-md btn-danger" type="submit" onclick="if (!confirm('Are you sure you want to reset this?')) { return false }"><i class="mdi mdi-delete"> Reset</i></button>
</form>

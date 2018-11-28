<a href="{{ route('sales.edit', $sales->id) }}" class="btn btn-md btn-primary"><i class="mdi mdi-pencil"></i> Edit</a>
<form action="{{ route('sales.destroy', $sales->id)}}" method="post" style="display: inline-block">
    @csrf
    @method('DELETE')
    <button class="btn btn-md btn-danger" type="submit" onclick="if (!confirm('Are you sure you want to delete this?')) { return false }"><i class="mdi mdi-delete"> Delete</i></button>
</form>

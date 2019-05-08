<a href="{{ route('sales.show', $sales->id) }}" class="btn btn-md btn-warning"><i class="mdi mdi-eye"></i> Show</a>
@if (Auth::user()->role === 'user')
    <a href="{{ route('delete.sales', $sales->id) }}" class="btn btn-md btn-danger"><i class="mdi mdi-delete"></i> Delete</a>
@else
    <form action="{{ route('sales.destroy', $sales->id)}}" method="post" style="display: inline-block">
        @csrf
        @method('DELETE')
        <button class="btn btn-md btn-danger" type="submit" onclick="if (!confirm('Are you sure you want to delete this?')) { return false }"><i class="mdi mdi-delete"> Delete</i></button>
    </form>
@endif


<a href="{{ route('product.edit', $products->products_id) }}" class="btn btn-md btn-primary"><i class="mdi mdi-pencil"></i> Edit</a>
<form action="{{ route('product.destroy', $products->products_id)}}" method="post" style="display: inline-block">
    @csrf
    @method('DELETE')
    <button class="btn btn-md btn-danger" type="submit" onclick="if (!confirm('Are you sure you want to delete this?')) { return false }"><i class="mdi mdi-delete"> Delete</i></button>
</form>

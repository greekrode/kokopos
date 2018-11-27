<a href="{{ route('category.edit', $categories->id) }}" class="btn btn-md btn-primary"><i class="mdi mdi-pencil"></i> Edit</a>
<form action="{{ route('category.destroy', $categories->id)}}" method="post" style="display: inline-block">
    @csrf
    @method('DELETE')
    <button class="btn btn-md btn-danger" type="submit"><i class="mdi mdi-delete"> Delete</i></button>
</form>

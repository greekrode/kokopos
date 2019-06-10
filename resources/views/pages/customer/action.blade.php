<a href="{{ route('customer.edit', $customers->id) }}" class="btn btn-md btn-primary"><i class="mdi mdi-pencil"></i> Edit</a>
<form action="{{ route('customer.destroy', $customers->id)}}" method="post" style="display: inline-block">
    @csrf
    @method('DELETE')
    <button class="btn btn-md btn-danger" type="submit" onclick="if (!confirm('Apakah anda yakin untuk menghapusnya?')) { return false }"><i class="mdi mdi-delete"> Hapus</i></button>
</form>

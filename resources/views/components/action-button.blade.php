<div class="d-flex justify-content-end gap-2">
    @isset($showRoute)
        <a href="{{$showRoute}}" class="btn btn-secondary">Show Detail</a>
    @endisset

    @isset($editRoute)
        <a href="{{$editRoute}}" class="btn btn-warning" id="editButton">Edit Data</a>
    @endisset
    @isset($deleteRoute)
        <form action="{{$deleteRoute}}" method="post" class="d-inline">
            @method('delete')
            @csrf

            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Yakin Menghapus Data???')">Delete</button>
        </form>
    @endisset
</div>

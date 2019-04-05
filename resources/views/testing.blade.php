<h1>Teting gan</h1>

<form action="{{url('/testing/upload')}}" enctype="multipart/form-data" method="post">
    @csrf
    <input type="file" name="gambar" id="">
    <input type="submit" value="Simpan">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</form>
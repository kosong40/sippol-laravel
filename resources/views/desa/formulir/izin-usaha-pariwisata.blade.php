<div class="box box-solid box-warning">
    <div class="box-header">
        Pilih SubLayanan
    </div>
    <div class="box-body">
        @foreach ($sublayanan as $item )
            <a href="{{url('desa/formulir/'.$pelayanan->slug.'/'.$item->slug)}}" class="btn btn-primary text-center">{{$item->subpelayanan}}</a>
        @endforeach
    </div>
</div>

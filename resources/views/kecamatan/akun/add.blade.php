<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Akun {{$data['nama_daerah']}}</h4>
        </div>
        <div class="modal-body">
            <form action="{{route('AddAdminDesa')}}" method="POST">
                <div class="form-group">
                    <label for="" class="label-control">Username</label>
                    <input type="text" value="Admin{{$data['nama_daerah']}}" readonly name="username" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="label-control">Nama Admin</label>
                    <input type="text" value="" name="nama" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="label-control">Kontak Admin</label>
                    <input type="text" value="" name="kontak" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="label-control">Email Admin</label>
                    <input type="email" value="" name="email" id="" class="form-control">
                </div>
                @csrf
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </form>
        </div>
    </div>
</div> 
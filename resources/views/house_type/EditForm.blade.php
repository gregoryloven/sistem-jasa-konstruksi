<form role="form" method='POST' action="{{ route('house_type.update', ['house_type' => $data->id]) }}" enctype="multipart/form-data">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Ubah Tipe</h4>
    </div>
    <div class="modal-body">
        @csrf
        @method('PUT')
        <div class="form-body">
            <div class="form-group">
                <label>Nama</label>
                <input type="hidden" class="form-control" value="{{$data->id}}" id='id' name='id'>
                <input type="text" class="form-control" value="{{$data->nama}}" id='nama' name='nama' required>
            </div>
            <div class="form-group">
                <label>Foto</label>
                <input type="file" value="{{$data->foto}}" name="foto" class="form-control" id="foto" placeholder="Foto" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                <img id="output" src="{{asset('foto/'.$data->foto)}}" width="200px" height="200px">
            </div>
        </div>
    </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-primary">Save</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
  </div>
</form>
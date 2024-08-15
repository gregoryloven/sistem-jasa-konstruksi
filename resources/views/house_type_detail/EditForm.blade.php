<form role="form" method='POST' action="{{ route('house_type_detail.update', ['house_type_detail' => $data->id]) }}" enctype="multipart/form-data">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Ubah Tipe</h4>
    </div>
    <div class="modal-body">
        @csrf
        @method('PUT')
        <div class="form-body">
            <div class="form-group">
                <label>Tipe Rumah</label>
                <select class="form-control" id='house_type_id' name='house_type_id' required>
                    <option value="{{ $data->house_type_id }}">{{ $data->house_type->nama }}</option>
                        @foreach($house_type as $h)
                            <option value="{{ $h->id }}">{{ $h->nama }}</option>
                        @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Harga (Rp.)</label>
                <input type="text" class="form-control input-harga" value="{{ number_format($data->harga, 0, ',', '.') }}" id='harga' name='harga' required>
            </div>
        </div>
    </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-primary">Save</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
  </div>
</form>

<script>
    $(document).ready(function() {
        $(".input-harga").on("input", function() {
            let inputValue = $(this).val();

            inputValue = inputValue.replace(/[^0-9]/g, '');

            let formattedValue = formatNumber(inputValue);

            $(this).val(formattedValue);
        });

        function formatNumber(number) {
            return new Intl.NumberFormat('id-ID').format(number);
        }
    });
</script>
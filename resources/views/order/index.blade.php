@extends('layouts_enduser.index')

@section('content')

    <div class="ltn__checkout-area mb-105">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__checkout-inner">
                        <div class="ltn__checkout-single-content mt-50">
                            <h4 class="title-2">Formulir Pemesanan</h4>
                            <div class="ltn__checkout-single-content-info">
                                <form action="#" >
                                    <h6></h6>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-item input-item-name ltn__custom-icon">
                                                <input type="text" name="nama" placeholder="Nama Lengkap">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-item">
                                                <select class="nice-select" id='pekerjaan' name='pekerjaan'>
                                                    <option disabled selected>Pekerjaan</option>
                                                    <option>Wiraswasta</option>
                                                    <option>Swasta</option>
                                                    <option>Wirausaha</option>
                                                    <option>PNS</option>
                                                    <option>Pensiunan</option>
                                                    <option>Lainnya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-item input-item-phone ltn__custom-icon">
                                                <input type="text" name="telepon" placeholder="Telepon">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-item">
                                                <select class="nice-select" id='house_type_id' name='house_type_id'>
                                                    <option value="" disabled selected>Pilih Tipe Rumah</option>
                                                    @foreach($house_type as $h)
                                                        <option value="{{ $h->id }}">{{ $h->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>   
                                        <div class="col-md-6">
                                            <div class="input-item">
                                                <select class="nice-select" id="contractor_id" name="contractor_id">
                                                    <option value="" disabled selected>Pilih Kontraktor</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 d-flex justify-content-end">
                                            <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Place order</button>
                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('javascript')


<script>
    $(document).ready(function() {
        $('#house_type_id').change(function() {
            var houseTypeId = $(this).val();
            if (houseTypeId) {
                $.ajax({
                    url: '/get-contractors/' + houseTypeId,
                    type: 'GET',
                    success: function(data) {
                        console.log(data); // Debug: lihat data yang diterima
                        var contractorSelect = $('#contractor_id');

                        contractorSelect.empty(); // Kosongkan dropdown sebelum menambahkan data
                        contractorSelect.append('<option value="" disabled selected>Pilih Kontraktor</option>');

                        // Cek apakah ada data kontraktor
                        if (data.contractors.length > 0) {
                            $.each(data.contractors, function(key, contractor) {
                                var formattedPrice = formatRupiah(contractor.harga); // Format harga ke Rupiah
                                contractorSelect.append('<option value="' + contractor.contractor_id + '">' + contractor.nama + ' (Rp. ' + formattedPrice + ')' + '</option>');
                            });
                        } else {
                            contractorSelect.append('<option value="" disabled>Tidak ada kontraktor</option>');
                        }

                        // Refresh nice-select to apply changes if you are using it
                        contractorSelect.niceSelect('update');
                    },
                    error: function(xhr) {
                        console.log('Error:', xhr.responseText);
                        $('#contractor_id').empty().append('<option value="" disabled>Error memuat data kontraktor</option>');
                        contractorSelect.niceSelect('update'); // Refresh nice-select on error
                    }
                });
            } else {
                $('#contractor_id').empty().append('<option value="" disabled selected>Pilih Kontraktor</option>');
                $('#contractor_id').niceSelect('update'); // Refresh nice-select if no houseTypeId
            }
        });

        // Fungsi untuk memformat angka ke Rupiah
        function formatRupiah(angka) {
            return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
    });
</script>



@endsection







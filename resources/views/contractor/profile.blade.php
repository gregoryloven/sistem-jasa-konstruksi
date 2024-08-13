@extends('layouts_admin.admin')

@push('css')
<style>
    #myTable td {text-align: center; vertical-align: middle;}
</style>
@endpush

@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Profile</h1>
            </div>
            <div class="section-body">
            <h2 class="section-title">Hi, {{Auth()->user()->name}}</h2>
            <p class="section-lead">
                Change information about yourself on this page.
            </p>

            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <form id="profileForm" method="post" action="{{ route('contractor.update', $contractor->id) }}" class="needs-validation" novalidate="" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Edit Profile</h4>
                        @if ($contractor->status == -1)
                            <span class="badge badge-info">
                                <i class="fas fa-info-circle"></i> Not Verified
                            </span>
                        @elseif ($contractor->status == 0)
                            <span class="badge badge-danger">
                                <i class="fas fa-times-circle"></i> Failed
                            </span>
                        @elseif ($contractor->status == 1)
                            <span class="badge badge-warning">
                                <i class="fas fa-hourglass-half"></i> Pending
                            </span>
                        @elseif ($contractor->status == 2)
                            <span class="badge badge-success">
                                <i class="fas fa-check-circle"></i> Approved
                            </span>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="row">                               
                            <div class="form-group col-md-7 col-12">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" value="{{ $contractor->nama }}" required>
                            </div>
                            <div class="form-group col-md-5 col-12">
                                <label>Telepon</label>
                                <input type="tel" name="telepon" class="form-control" value="{{ $contractor->telepon }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-7 col-12">
                                <label>Nama Perusahaan</label>
                                <input type="text" name="perusahaan" class="form-control" value="{{ $contractor->perusahaan }}" required>
                            </div>
                            <div class="form-group col-md-5 col-12">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $contractor->user->email }}" required readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                            <label>Alamat</label>
                                <textarea name="alamat" class="form-control summernote-simple" style="height: 100px;" required>{{ $contractor->alamat }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <label>Tanda Daftar Perusahaan</label>
                                    <input type="file" value="" name="tdp" class="form-control" id="tdp" placeholder="Foto" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" required>
                                    <img id="output" src="{{asset('foto/'.$contractor->tdp)}}" width="200px" height="200px">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                    </form>
                </div>
            </div>


            </div>
        </section>
    </div>

@endsection

@section('javascript')
<script>

    document.addEventListener('DOMContentLoaded', function () {
        var form = document.getElementById('profileForm');
        var status = {{ $contractor->status }};  // Mengambil status dari Blade template
        var fileInput = document.getElementById('tdp');
        
        form.addEventListener('submit', function (e) {
            var fileExists = fileInput.files.length > 0;

            // Jika status adalah 2 (Approved) dan file ada
            if (status === 2) {
                if (fileExists) {
                    e.preventDefault();  // Mencegah pengiriman form otomatis
                    
                    Swal.fire({
                        title: 'Apakah Anda Yakin?',
                        text: "Status saat ini sudah disetujui. Apakah Anda yakin ingin memperbarui data?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Perbarui!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();  // Mengirim form jika dikonfirmasi
                        }
                    });
                } else {
                    // Jika file tidak ada, tidak menampilkan alert
                }
            } else {
                // Jika status bukan 2
                if (fileExists) {
                    // Jika file ada, lanjutkan submit form tanpa alert
                } else {
                    // Jika file tidak ada, tampilkan alert
                    e.preventDefault();  // Mencegah pengiriman form
                    alert('Mohon lengkapi Tanda Daftar Perusahaan.');
                }
            }
        });
    });    

</script>
@endsection
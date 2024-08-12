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
                    <form method="post" class="needs-validation" novalidate="">
                    <div class="card-header">
                        <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">                               
                            <div class="form-group col-md-7 col-12">
                                <label>Nama</label>
                                <input type="text" class="form-control" value="{{ $contractor->nama }}" required>
                            </div>
                            <div class="form-group col-md-5 col-12">
                                <label>Telepon</label>
                                <input type="tel" class="form-control" value="{{ $contractor->telepon }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-7 col-12">
                                <label>Nama Perusahaan</label>
                                <input type="text" class="form-control" value="{{ $contractor->perusahaan }}" required>
                            </div>
                            <div class="form-group col-md-5 col-12">
                                <label>Email</label>
                                <input type="email" class="form-control" value="{{ $contractor->user->email }}" required readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                            <label>Alamat</label>
                                <textarea class="form-control summernote-simple" style="height: 100px;" required>{{ $contractor->alamat }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <label>Tanda Daftar Perusahaan</label>
                                    <input type="file" value="" name="tdp" class="form-control" id="tdp" placeholder="Foto" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                    <img id="output" src="" width="200px" height="200px">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Save Changes</button>
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

    

</script>
@endsection
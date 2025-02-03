@extends('layouts_enduser.index')

@section('content')

    <div class="ltn__feature-area section-bg-1 pt-80 pb-90">
        <div class="container">
            <!-- Alert / Disclaimer -->
            <div class="alert alert-info text-center" role="alert">
                Ingin bergabung bersama kami? 
                <a href="/register" class="alert-link"><u>Silahkan daftar disini</u></a>
            </div><br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2 text-center">
                        <h6 class="section-subtitle ltn__secondary-color"><span><i class="fas fa-square-full"></i></span> Kontraktor Kami</h6>
                        <h1 class="section-title">List Kontraktor</h1>
                    </div>
                </div>
            </div>
            <div class="row align-self-center">
                @foreach ($data as $d)
                <div class="col-lg-6 col-sm-6">                            
                    <div class="ltn__feature-item ltn__feature-item-6 box-shadow-1">
                        <div class="ltn__feature-icon">
                            <span><i class="icon-mechanic"></i></span>
                        </div>
                        <div class="ltn__feature-info">
                            <h3>{{ $d->perusahaan }}</h3>
                        </div>
                        <div class="footer-address-icon">
                            <i class="icon-placeholder"> {{ $d->alamat }}</i><br>
                            <i class="icon-call"> {{ $d->telepon }}</i>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
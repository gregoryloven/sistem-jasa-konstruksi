@extends('layouts_enduser.index')

@section('content')

    <div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image "  data-bg="../../enduser/img/bg/14.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner">
                        <h1 class="page-title">Product Details</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="index.html"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                                <li>Product Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ltn__shop-details-area pb-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="ltn__shop-details-inner mb-60">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="ltn__shop-details-img-gallery">
                                    <div class="ltn__shop-details-large-img">
                                        <div class="single-large-img">
                                            <a href="{{ asset('foto/'.$data->foto) }}">
                                                <img src="{{ asset('foto/'.$data->foto) }}" alt="Image">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="modal-product-info shop-details-info pl-0">
                                    <h3>{{ $data->nama }}</h3>
                                    <div class="product-price">
                                        <span>$49.00</span>
                                        <del>$65.00</del>
                                    </div>
                                    <div class="modal-product-meta ltn__product-details-menu-1">
                                        <ul>
                                            <li>
                                                <strong>Penyedia Jasa:</strong> 
                                                <span>
                                                    <a href="#">20 Kontraktor</a>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="ltn__product-details-menu-2">
                                        <ul>
                                            <li>
                                                <a href="/order" class="theme-btn-1 btn btn-effect-1" title="Pesan" target="_blank">
                                                    <i class="fas fa-shopping-cart"></i>
                                                    <span>PESAN</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Shop Tab Start -->
                    <div class="ltn__shop-details-tab-inner ltn__shop-details-tab-inner-2">
                        <div class="ltn__shop-details-tab-menu">
                            <div class="nav">
                                
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="liton_tab_details_1_1">
                                <div class="ltn__shop-details-tab-content-inner">
                                    <h4 class="title-2">Daftar Kontraktor</h4>
                                    <div class="col-lg-12">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Perusahaan</th>
                                                    <th>Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data2 as $d)
                                                <tr>
                                                    <td>{{ $d->contractor->nama }}</td>
                                                    <td>{{ $d->contractor->perusahaan }}</td>
                                                    <td>IDR {{ number_format($d->harga, 0, ',', '.') }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Shop Tab End -->
                </div>

            </div>
        </div>
    </div>

@endsection
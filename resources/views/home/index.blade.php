@extends('layouts_enduser.index')

@section('content')

  <div class="ltn__slider-area ltn__slider-3  section-bg-2---">
      <div class="ltn__slide-one-active slick-slide-arrow-1 slick-slide-dots-1">
          <!-- ltn__slide-item -->
          <div class="ltn__slide-item ltn__slide-item-2  ltn__slide-item-3-normal--- ltn__slide-item-3 bg-image bg-overlay-theme-black-60---" data-bg="../../enduser/img/slider/71.jpg">
              <div class="ltn__slide-item-inner  text-left">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-12 align-self-center">
                              <div class="slide-item-info">
                                  <div class="slide-item-info-inner ltn__slide-animation">
                                      <h6 class="slide-sub-title ltn__secondary-color animated text-uppercase"><span><i class="fas fa-square-full"></i></span> Jasa Terbaik dalam Konstruksi</h6>
                                      <h1 class="slide-title animated ">Solusi Cepat Mencari dan <br> Menawarkan Jasa Konstruksi</h1>
                                      <div class="slide-brief animated">
                                          <p>Selamat datang di KontrakPro, platform inovatif yang menghubungkan pengguna dengan kontraktor profesional di seluruh Indonesia. Temukan jasa terbaik untuk proyek Anda, dari renovasi hingga pembangunan besar, dengan sistem pencocokan cerdas dan transparan. Praktis, efisien, dan terpercaya!</p>
                                      </div>
                                      <div class="btn-wrapper animated">
                                        <a href="{{ route('contractor.showContractor') }}" class="theme-btn-1 btn btn-effect-1">Daftar Sekarang!</a>
                                          <!-- <a href="/house_type_user" class="theme-btn-1 btn btn-effect-1">House Type</a> -->
                                          <!-- <a href="about.html" class="theme-btn-2 btn btn-effect-2">Learn More</a> -->
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- ltn__slide-item -->
          <!-- <div class="ltn__slide-item ltn__slide-item-2  ltn__slide-item-3-normal--- ltn__slide-item-3 bg-image bg-overlay-theme-black-60---" data-bg="../../enduser/img/slider/74.jpg">
              <div class="ltn__slide-item-inner  text-right text-end">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-12 align-self-center">
                              <div class="slide-item-info">
                                  <div class="slide-item-info-inner ltn__slide-animation">
                                      <h6 class="slide-sub-title ltn__secondary-color animated text-uppercase"><span><i class="fas fa-square-full"></i></span> Great Experience In Building</h6>
                                      <h1 class="slide-title animated ">Comprehensive Construction <br> Solutions</h1>
                                      <div class="slide-brief animated">
                                          <p>Full range of services, from initial design to final commissioning, ensuring seamless project execution.</p>
                                      </div>
                                      <div class="btn-wrapper animated">
                                          <a href="/house_type_user" class="theme-btn-1 btn btn-effect-1">House Type</a>
                                          <a href="about.html" class="theme-btn-2 btn btn-effect-2">Learn More</a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div> -->
          <!-- ltn__slide-item -->
          <!-- <div class="ltn__slide-item ltn__slide-item-2  ltn__slide-item-3-normal--- ltn__slide-item-3 bg-image bg-overlay-theme-black-60---" data-bg="../../enduser/img/slider/71.jpg">
              <div class="ltn__slide-item-inner  text-center">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-12 align-self-center">
                              <div class="slide-item-info">
                                  <div class="slide-item-info-inner ltn__slide-animation">
                                      <h6 class="slide-sub-title ltn__secondary-color animated text-uppercase"><span><i class="fas fa-square-full"></i></span> Great Experience In Building</h6>
                                      <h1 class="slide-title animated ">Expert Design <br> & Engineering</h1>
                                      <div class="slide-brief animated">
                                          <p>Innovative design concepts and precise engineering for every construction need.</p>
                                      </div>
                                      <div class="btn-wrapper animated">
                                          <a href="/house_type_user" class="theme-btn-1 btn btn-effect-1">House Type</a>
                                          <a href="about.html" class="theme-btn-2 btn btn-effect-2">Learn More</a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div> -->
          <!--  -->
      </div>
  </div>

  <div class="ltn__about-us-area pt-120 pb-120">
      <div class="container">
          <div class="row">
              <div class="col-lg-6 align-self-center">
                  <div class="about-us-img-wrap about-img-left">
                      <img src="../../enduser/img/bg/37.jpg" alt="About Us Image">
                  </div>
              </div>
              <div class="col-lg-6 align-self-center">
                  <div class="about-us-info-wrap">
                      <div class="section-title-area ltn__section-title-2">
                          <h6 class="section-subtitle ltn__secondary-color"><span><i class="fas fa-square-full"></i></span> Pengalaman Luar Biasa dalam Membangun</h6>
                          <h1 class="section-title">Solusi untuk Bangunan dan Industri!</h1>
                      </div>
                      <p>Kami menyediakan marketplace yang mempertemukan Anda dengan kontraktor terbaik, lengkap dengan sistem penawaran harga yang transparan. Semua kontraktor kami telah diverifikasi untuk menjamin kualitas dan keamanan layanan. Anda juga dapat melihat review dan rating dari pengguna lain untuk memastikan pilihan terbaik. Pantau perkembangan proyek secara real-time melalui dashboard interaktif, dan manfaatkan layanan konsultasi untuk mendapatkan saran dari ahli konstruksi. Dengan KontrakPro, proyek Anda berjalan lebih lancar, aman, dan sesuai anggaran.</p>
                      <div class="about-author-info d-flex">
                          <div class="author-name-designation  align-self-center mr-30">
                              <!-- <h4 class="mb-0">Jerry Henson</h4>
                              <small>/ Shop Director</small> -->
                              <div class="btn-wrapper">
                                  <a class="btn theme-btn-2 btn-effect-1" href="/order">Pesan Sekarang!</a>
                              </div>
                          </div>
                          <!-- <div class="author-sign  align-self-center mt-40">
                              <img src="../../enduser/img/icons/icon-img/author-sign.png" alt="#">
                          </div> -->
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

@endsection
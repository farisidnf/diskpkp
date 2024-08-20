@extends('layouts.main')

@section('banner')
    <style>

    </style>
    <!-- Banner -->
    <div class="banner_slider_wrapper">
        <div class="banner_slider banner_slider_1">
            <div class="slide">
                <div class="slide_img" style="background-image: url(images/a4.jpg);" loading="lazy"></div>
                <div class="slide__content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="slide__content--headings ttm-textcolor-white text-center">
                                    <div class="logo-icon"><img src="{{ asset('images/logo.png') }}" alt="logo-img"
                                            class="m-auto d-none d-lg-block" width="100" height="100" loading="lazy"></div>
                                    <br>
                                    <h4 data-animation="fadeInDown">DINAS KETAHANAN PANGAN, KELAUTAN DAN PERTANIAN</h4>
                                    <h4 data-animation="fadeInDown">PROVINSI DKI JAKARTA</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide">
                <div class="slide_img" style="background-image: url(images/a7.jpeg);"></div>
                <div class="slide__content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="slide__content--headings ttm-textcolor-white text-center">
                                    <div class="logo-icon"><img src="{{ asset('images/logo.png') }}" alt="logo-img"
                                            class="m-auto d-none d-lg-block" width="100" height="100" loading="lazy"></div>
                                    <br>
                                    <h4 data-animation="fadeInDown">DINAS KETAHANAN PANGAN, KELAUTAN DAN PERTANIAN</h4>
                                    <h4 data-animation="fadeInDown">PROVINSI DKI JAKARTA</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide">
                <div class="slide_img" style="background-image: url(images/a9.jpeg);"></div>
                <div class="slide__content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="slide__content--headings ttm-textcolor-white text-center">
                                    <div class="logo-icon"><img src="{{ asset('images/logo.png') }}" alt="logo-img"
                                            class="m-auto d-none d-lg-block" width="100" height="100" loading="lazy"></div>
                                    <br>
                                    <h4 data-animation="fadeInDown">DINAS KETAHANAN PANGAN, KELAUTAN DAN PERTANIAN</h4>
                                    <h4 data-animation="fadeInDown">PROVINSI DKI JAKARTA</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner end-->
@endsection

@section('main')
    <!--padding_zero-section-->
    <section class="ttm-row padding_zero-section clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row mb_15 mt_110 res-991-margin_top50">
                        <div class="col-lg-6 col-md-6">
                            <!--featured-icon-box-->
                            <div
                                class="featured-icon-box icon-align-before-content icon-ver_align-top ttm-bgcolor-white p-30 border-rad_6 box-shadow icon-flip-hover">
                                <div class="featured-icon pt-0">
                                    <div
                                        class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-size-xl ttm-icon_element-color-skincolor">
                                        <i class="flaticon-lake"></i>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3 class="mb-2">Izin Peternakan</h3>
                                    </div>
                                    <div class="title-desc">
                                        <p>Persyaratan Perizinan Bidang Peternakan</p>
                                    </div>
                                    <a class="ttm-btn btn-inline ttm-btn-size-md ttm-icon-btn-right ttm-btn-color-dark"
                                        href="/peternakan" tabindex="0">Lihat disini<i class="fa fa-angle-right"></i></a>
                                </div>
                            </div><!-- featured-icon-box end-->
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <!--featured-icon-box-->
                            <div
                                class="featured-icon-box icon-align-before-content icon-ver_align-top ttm-bgcolor-white p-30 border-rad_6 box-shadow icon-flip-hover">
                                <div class="featured-icon pt-0">
                                    <div
                                        class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-size-xl ttm-icon_element-color-skincolor">
                                        <i class="flaticon-lake-2"></i>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3 class="mb-2">Izin Perikanan</h3>
                                    </div>
                                    <div class="title-desc">
                                        <p>Persyaratan Perizinan Bidang Perikanan</p>
                                    </div>
                                    <a class="ttm-btn btn-inline ttm-btn-size-md ttm-icon-btn-right ttm-btn-color-dark"
                                        href="/perikanan" tabindex="0">Lihat disini<i class="fa fa-angle-right"></i></a>
                                </div>
                            </div><!-- featured-icon-box end-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--padding_zero-section end-->

    <!--about-section-->
    <section class="ttm-row about-section clearfix">
        <div class="container">
            <!-- row -->
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="margin_top15 res-991-margin_top50">
                        <!-- section title -->
                        <div class="section-title">
                            <div class="title-header">
                                <h2 class="title">PROFIL</h2>
                            </div>
                            <div class="title-desc">
                                <p>Dinas KPKP melaksanakan kegiatan mencakup ketahanan pangan, kelautan, perikanan,
                                    pertanian, peternakan dan kesehatan hewan. Memiliki fungsi membangun pengembangan dan
                                    pembinaan kegiatan rumpun urusan ketahanan pangan, kelautan, perikanan, pertanian,
                                    peternakan dan kesehatan hewan ...</p>
                            </div>
                        </div><!-- section title end -->
                        <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-border ttm-btn-color-dark  margin_top15"
                            href="/profil">Lihat Profil</a>
                        <div class="ttm-horizontal_sep width-100 margin_top40 margin_bottom30"></div>
                        <div class="row">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-7 col-sm-8 ">
                    <div class="d-flex">
                        <div class="p-10 margin_right10 ttm-bgcolor-grey"></div>
                        <div class="ttm_single_image-wrapper">
                            <img class="img-fluid" src="images/gdkpkp.png" loading="lazy" alt="single-01">
                        </div>
                    </div>
                </div>
            </div><!-- row end -->
        </div>
    </section>
    <!--about-section end-->

    <!-- padding_top_zero-section -->
    <div class="ttm-row padding_zero-section clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ttm_single_image-wrapper">
                        <img class="img-fluid" src="images/bglayanan.jpg" alt="single-02" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- padding_top_zero-section end -->


    <!-- padding_bottom_zero-section -->
    <section class="ttm-row ttm-bgcolor-grey padding_bottom_zero-section mt_160 res-991-margin_top_30 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-7 col-md-12">
                    <div class="margin_left50 res-991-margin_left0">
                        <!--featured-icon-box-->
                        <div
                            class="featured-icon-box icon-align-before-content ttm-bgcolor-skincolor p-30 margin_top10 d-lg-inline-block border-rad_6 width-100 icon-flip-hover">
                            <div class="featured-icon">
                                <div
                                    class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-size-lg ttm-icon_element-color-white">
                                    <i class="flaticon-pond-1"></i>
                                </div>
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h3 class="mb-0">Layanan Kami</h3>
                                </div>
                            </div>
                        </div><!-- featured-icon-box end-->
                    </div>
                </div>
                <div class="col-lg-12">
                    <!-- slick_slider -->
                    <div class="slick_slider padding_bottom40 res-991-padding_bottom0"
                        data-slick='{"slidesToShow": 5, "slidesToScroll": 1, "arrows":true, "autoplay":true, "infinite":true, "responsive": [{"breakpoint":1200,"settings":{"slidesToShow": 5}}, {"breakpoint":1024,"settings":{"slidesToShow": 4}}, {"breakpoint":777,"settings":{"slidesToShow": 3}},{"breakpoint":575,"settings":{"slidesToShow": 2}},{"breakpoint":380,"settings":{"slidesToShow": 1}}]}'>
                        <div class="client-box">
                            <div class="ttm-client-logo-tooltip">
                                <div class="ttm-client-logo-tooltip-inner">
                                    <div class="client-thumbnail">
                                        <a href="https://jakarta.go.id/" target="_blank">
                                            <img class="img-fluid" src="/images/DKIJAKARTA.jpg" alt="image" loading="lazy">
                                        </a>
                                    </div>
                                    <div class="client-thumbnail_hover">
                                        <a href="https://jakarta.go.id/" target="_blank">
                                            <img class="img-fluid" src="/images/DKIJAKARTA.jpg" alt="image" loading="lazy">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="client-box">
                            <div class="ttm-client-logo-tooltip">
                                <div class="ttm-client-logo-tooltip-inner">
                                    <div class="client-thumbnail">
                                        <a href="https://openstreetmap.id/dkpkp/reports/submit" target="_blank">
                                            <img class="img-fluid" src="/images/SIPETANI.jpg" alt="image" loading="lazy">
                                        </a>
                                    </div>
                                    <div class="client-thumbnail_hover">
                                        <a href="https://openstreetmap.id/dkpkp/reports/submit" target="_blank">
                                            <img class="img-fluid" src="/images/SIPETANI.jpg" alt="image" loading="lazy">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="client-box">
                            <div class="ttm-client-logo-tooltip">
                                <div class="ttm-client-logo-tooltip-inner">
                                    <div class="client-thumbnail">
                                        <a href="https://www.kkp.go.id/" target="_blank">
                                            <img class="img-fluid" src="/images/KEKEPE.jpg" alt="image" loading="lazy">
                                        </a>
                                    </div>
                                    <div class="client-thumbnail_hover">
                                        <a href="https://www.kkp.go.id/" target="_blank">
                                            <img class="img-fluid" src="/images/KEKEPE.jpg" alt="image" loading="lazy">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="client-box">
                            <div class="ttm-client-logo-tooltip">
                                <div class="ttm-client-logo-tooltip-inner">
                                    <div class="client-thumbnail">
                                        <a href="https://www.pertanian.go.id/" target="_blank">
                                            <img class="img-fluid" src="/images/KEPE.jpg" alt="image" loading="lazy">
                                        </a>
                                    </div>
                                    <div class="client-thumbnail_hover">
                                        <a href="https://www.pertanian.go.id/" target="_blank">
                                            <img class="img-fluid" src="/images/KEPE.jpg" alt="image" loading="lazy">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="client-box">
                            <div class="ttm-client-logo-tooltip">
                                <div class="ttm-client-logo-tooltip-inner">
                                    <div class="client-thumbnail">
                                        <a href="https://sikp.jakarta.go.id/" target="_blank">
                                            <img class="img-fluid" src="/images/SIKP.jpg" alt="image" loading="lazy">
                                        </a>
                                    </div>
                                    <div class="client-thumbnail_hover">
                                        <a href="https://sikp.jakarta.go.id/" target="_blank">
                                            <img class="img-fluid" src="/images/SIKP.jpg" alt="image" loading="lazy">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="client-box">
                            <div class="ttm-client-logo-tooltip">
                                <div class="ttm-client-logo-tooltip-inner">
                                    <div class="client-thumbnail">
                                        <a href="https://data.jakarta.go.id/" target="_blank">
                                            <img class="img-fluid" src="/images/OPEND.jpg" alt="image" loading="lazy">
                                        </a>
                                    </div>
                                    <div class="client-thumbnail_hover">
                                        <a href="https://data.jakarta.go.id/" target="_blank">
                                            <img class="img-fluid" src="/images/OPEND.jpg" alt="image" loading="lazy">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- ttm-client end -->
                </div>
            </div>
        </div>
    </section>
    <!-- padding_bottom_zero-section end -->

    <!--blog-section2-->
    <section class="ttm-row blog-section clearfix">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- section title -->
                    <div class="section-title title-style-center_text">
                        <div class="title-header">
                            <h2 class="title">BERITA</h2>
                        </div>
                    </div><!-- section title end -->
                </div>
            </div>
            <div class="row slick_slider padding_bottom5"
                data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "arrows":true, "dots":false, "autoplay":true, "infinite":true, "responsive": [{"breakpoint":1024,"settings":{"slidesToShow": 3}} , {"breakpoint":900,"settings":{"slidesToShow": 2}}, {"breakpoint":575,"settings":{"slidesToShow": 1}}]}'>
                @forelse ($news->posts as $post)
                    <div class="col-lg-4">
                        <!-- featured-imagebox-post -->
                        <div class="featured-imagebox featured-imagebox-post style2">
                            <div class="featured-imagebox-post-inner">
                                <div class="featured-thumbnail">
                                    <img class="img-fluid" src="{{ $post->thumbnail }}" alt="{{ $post->slug }}"
                                        style="aspect-ratio: 3/3; object-fit: cover;">
                                </div>
                                <div class="featured-content">
                                    <!-- ttm-box-post-date -->
                                    <div class="ttm-box-post-date">
                                        <div class="entry-date"><span>{{ $post->date }}</span>{{ $post->month }}
                                            {{ $post->year }}</div>
                                    </div><!-- ttm-box-post-date end -->
                                    <div class="post-meta">
                                        <span class="ttm-meta-line category">{{ $post->category->name }}</span>
                                    </div>
                                    <div class="featured-title">
                                        <h5><a
                                                href="{{ route('news.slug', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                                        </h5>
                                    </div>
                                    <a class="ttm-btn btn-inline ttm-btn-size-md ttm-icon-btn-right ttm-btn-color-skincolor" href="{{ route('news.slug', ['slug' => $post->slug]) }}">Baca Berita<i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div><!-- featured-imagebox-post end -->
                    </div>
                @empty
                    <div class="col-lg-4">
                        <!-- featured-imagebox-post -->
                        <div class="featured-imagebox featured-imagebox-post style2">
                            <div class="featured-imagebox-post-inner">
                                <div class="featured-thumbnail">
                                    <img class="img-fluid"
                                        src="https://via.placeholder.com/620x460?text=620x460+blog-01.jpg" alt="blog-img">
                                </div>
                                <div class="featured-content">
                                    <!-- ttm-box-post-date -->
                                    <div class="ttm-box-post-date">
                                        <div class="entry-date"><span>29</span>Jun 2023</div>
                                    </div><!-- ttm-box-post-date end -->
                                    <div class="post-meta">
                                        <span class="ttm-meta-line category">Berita</span>
                                    </div>
                                    <div class="featured-title">
                                        <h3><a href="#">Belum Ada Berita</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div><!-- featured-imagebox-post end -->
                    </div>
                @endforelse
                @for ($i = count($news->posts); $i <= 2; $i++)
                    <div class="col-lg-4">
                        <!-- featured-imagebox-post -->
                        <div class="featured-imagebox featured-imagebox-post style2">
                            <div class="featured-imagebox-post-inner">
                                <div class="featured-thumbnail">
                                    <img class="img-fluid"
                                        src="https://via.placeholder.com/620x460?text=620x460+blog-01.jpg" alt="blog-img">
                                </div>
                                <div class="featured-content">
                                    <!-- ttm-box-post-date -->
                                    <div class="ttm-box-post-date">
                                        <div class="entry-date"><span>29</span>Jun 2023</div>
                                    </div><!-- ttm-box-post-date end -->
                                    <div class="post-meta">
                                        <span class="ttm-meta-line category">Berita</span>
                                    </div>
                                    <div class="featured-title">
                                        <h3><a href="#">Belum Ada Berita</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div><!-- featured-imagebox-post end -->
                    </div>
                @endfor
                {{-- <div class="col-lg-4">
                    <!-- featured-imagebox-post -->
                    <div class="featured-imagebox featured-imagebox-post style2">
                        <div class="featured-imagebox-post-inner">
                            <div class="featured-thumbnail">
                                <img class="img-fluid" src="https://via.placeholder.com/620x460?text=620x460+blog-01.jpg"
                                    alt="blog-img">
                            </div>
                            <div class="featured-content">
                                <!-- ttm-box-post-date -->
                                <div class="ttm-box-post-date">
                                    <div class="entry-date"><span>29</span>Jun 2023</div>
                                </div><!-- ttm-box-post-date end -->
                                <div class="post-meta">
                                    <span class="ttm-meta-line category">Berita</span>
                                </div>
                                <div class="featured-title">
                                    <h3><a href="#">JUDUL BERITA 1</a></h3>
                                </div>
                            </div>
                        </div>
                    </div><!-- featured-imagebox-post end -->
                </div>
                <div class="col-lg-4">
                    <!-- featured-imagebox-post -->
                    <div class="featured-imagebox featured-imagebox-post style2">
                        <div class="featured-imagebox-post-inner">
                            <div class="featured-thumbnail">
                                <img class="img-fluid" src="https://via.placeholder.com/620x460?text=620x460+blog-02.jpg"
                                    alt="blog-img">
                            </div>
                            <div class="featured-content">
                                <!-- ttm-box-post-date -->
                                <div class="ttm-box-post-date">
                                    <div class="entry-date"><span>29</span>Jun 2023</div>
                                </div>
                                <div class="post-meta">
                                    <span class="ttm-meta-line category">Berita</span>
                                </div><!-- post-meta end -->
                                <div class="featured-title">
                                    <h3><a href="#">JUDUL BERITA 2</a></h3>
                                </div>
                            </div>
                        </div>
                    </div><!-- featured-imagebox-post end -->
                </div> --}}
            </div>
        </div>
    </section>
    <!--blog-section2 end-->
@endsection

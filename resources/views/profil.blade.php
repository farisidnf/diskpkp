@extends('layouts.main')

@section('main')
    <!-- page-title -->
    <div class="ttm-page-title-row ttm-bg ttm-bgimage-yes ttm-bgcolor-darkgrey clearfix">
        <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="ttm-page-title-row-inner">
                        <div class="page-title-heading">
                            <h2 class="title">Profil</h2>
                        </div>
                        <div class="breadcrumb-wrapper">
                            <span>
                                <a title="Homepage" href="/">Beranda</a>
                            </span>
                            <span>Profil</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-title end -->

    <!--site-main start-->
    <div class="site-main">


        <section class="ttm-row about-section clearfix">
            <div class="container">
                <!-- row -->
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="padding_right50 res-991-padding_right0 res-991-margin_bottom50">
                            <!-- section title -->
                            <div class="section-title">
                                <div class="title-header">
                                    <h2 class="title">PROFIL DINAS KPKP</h2>
                                </div>
                                <div class="title-desc">
                                    <p>Dinas Ketahanan Pangan, Kelautan dan Pertanian Provinsi DKI Jakarta melaksanakan
                                        kegiatan mencakup ketahanan pangan, kelautan, perikanan,
                                        pertanian, peternakan dan kesehatan hewan.</p>
                                </div>
                            </div><!-- section title end -->
                            <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-border ttm-btn-color-dark  margin_top15"
                                href="/ppid">BUKA PPID</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="ttm-bgcolor-grey p-15">
                            <div class="ttm-tabs ttm-tab-style-02" data-effect="fadeIn">
                                <ul class="tabs text-center clearfix">
                                    <li class="tab"><a href="#">Visi</a></li>
                                    <li class="tab active"><a href="#">Misi</a></li>
                                    <li class="tab"><a href="#">Tujuan</a></li>
                                </ul>
                                <div class="content-tab">
                                    <!-- content-inner -->
                                    <div class="content-inner">
                                        <p class="clearfix">“Terwujudnya Ketahanan Pangan Dan Laut Biru Yang Berkelanjutan
                                            Menuju Jakarta Maju, Lestari Dan Berbudaya Untuk Keberadapan, Keadilan Dan
                                            Kesejahteraan Bagi Semua”</p>
                                    </div><!-- content-inner end-->
                                    <!-- content-inner -->
                                    <div class="content-inner active">
                                        <p class="clearfix">1. Mewujudkan ketahanan pangan, dan daya saing usaha pertanian,
                                            peternakan, kelautan dan perikanan.</p>
                                        <p class="clearfix">2. Meningkatkan kualitas lingkungan melalui pengelolaan
                                            sumberdaya kelautan dan perikanan yang berkelanjutan.</p>
                                    </div><!-- content-inner end-->
                                    <!-- content-inner -->
                                    <div class="content-inner">
                                        <p class="clearfix">1. Meningkatkan ketersediaan dan kualitas pangan.</p>
                                        <p class="clearfix">2. Meningkatkan kuantitas dan kualitas produksi hasil pertanian.
                                        </p>
                                        <p class="clearfix">3. Meningkatkan kuantitas dan kualitas produksi hasil hasil
                                            perikanan.</p>
                                        <p class="clearfix">4. Meningkatkan kuantitas dan kualitas produksi produk hewan dan
                                            kesehatan hewan.</p>
                                        <p class="clearfix">5. Mengembangkan potensi dan kelestarian sumberdaya kelautan dan
                                            perikanan.</p>
                                    </div><!-- content-inner end-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- row end -->
            </div>
        </section>

        <!--blog-section-->
        <section class="ttm-row ttm-bgcolor-grey blog-section clearfix">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- section title -->
                        <div class="section-title title-style-center_text">
                            <div class="title-header">
                                <h2 class="title">BERITA TERBARU</h2>
                            </div>
                        </div><!-- section title end -->
                    </div>
                </div>
                <div class="row slick_slider"
                    data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "arrows":false, "dots":false, "autoplay":true, "infinite":true, "responsive": [{"breakpoint":1024,"settings":{"slidesToShow": 3}} , {"breakpoint":900,"settings":{"slidesToShow": 2}}, {"breakpoint":575,"settings":{"slidesToShow": 1}}]}'>
                    @forelse ($news->posts as $post)
                        <div class="col-lg-4">
                            <!-- featured-imagebox-post -->
                            <div class="featured-imagebox featured-imagebox-post style2">
                                <div class="featured-imagebox-post-inner">
                                    <div class="featured-thumbnail">
                                        <img class="img-fluid" src="{{ $post->thumbnail }}" alt="blog-img">
                                    </div>
                                    <div class="featured-content">
                                        <!-- ttm-box-post-date -->
                                        <div class="ttm-box-post-date">
                                            <div class="entry-date"><span>{{ $post->date }}</span>{{ $post->month }}
                                                {{ $post->year }}</div>
                                        </div><!-- ttm-box-post-date end -->
                                        <div class="post-meta">
                                            <span class="ttm-meta-line category">{{ $post->category->name }} / {{$post->tag->content}}</span>
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
                                            src="https://via.placeholder.com/620x460?text=620x460+blog-01.jpg"
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
                                            <h3><a href="#">Belum Ada Berita</a></h3>
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
                                        <img class="img-fluid"
                                            src="https://via.placeholder.com/620x460?text=620x460+blog-02.jpg"
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
                        </div>
                        <div class="col-lg-4">
                            <!-- featured-imagebox-post -->
                            <div class="featured-imagebox featured-imagebox-post style2">
                                <div class="featured-imagebox-post-inner">
                                    <div class="featured-thumbnail ttm-post-format-video">
                                        <iframe width="1280" height="720"
                                            src="https://www.youtube.com/embed/vwCIoVICDY4" title="YouTube video player"
                                            allow="accelerometer; autoplay; clipboard-write; encrypte  d-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="featured-content">
                                        <!-- ttm-box-post-date -->
                                        <div class="ttm-box-post-date">
                                            <div class="entry-date"><span>29</span>Jun 2023</div>
                                        </div><!-- ttm-box-post-date end -->
                                        <div class="post-meta">
                                            <span class="ttm-meta-line category">Berita</span>
                                        </div><!-- post-meta end -->
                                        <div class="featured-title">
                                            <h3><a href="#">JUDUL BERITA 3</a></h3>
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
                                        <img class="img-fluid"
                                            src="https://via.placeholder.com/620x460?text=620x460+blog-04.jpg"
                                            alt="blog-img">
                                    </div>
                                    <div class="featured-content">
                                        <!-- ttm-box-post-date -->
                                        <div class="ttm-box-post-date">
                                            <div class="entry-date"><span>29</span>Jun 2023</div>
                                        </div><!-- ttm-box-post-date end -->
                                        <div class="post-meta">
                                            <span class="ttm-meta-line category">Berita</span>
                                        </div><!-- post-meta end -->
                                        <div class="featured-title">
                                            <h3><a href="#">JUDUL BERITA 4</a></h3>
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
                                        <img class="img-fluid"
                                            src="https://via.placeholder.com/620x460?text=620x460+blog-05.jpg"
                                            alt="blog-img">
                                    </div>
                                    <div class="featured-content">
                                        <!-- ttm-box-post-date -->
                                        <div class="ttm-box-post-date">
                                            <div class="entry-date"><span>29</span>Jun 2023</div>
                                        </div><!-- ttm-box-post-date end -->
                                        <div class="post-meta">
                                            <span class="ttm-meta-line category">Berita</span>
                                        </div><!-- post-meta end -->
                                        <div class="featured-title">
                                            <h3><a href="#">JUDUL BERITA 5</a></h3>
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
                                            src="https://via.placeholder.com/620x460?text=620x460+blog-01.jpg"
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
                                            <h3><a href="#">Belum Ada Berita</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- featured-imagebox-post end -->
                        </div>
                    @endfor
                </div>
            </div>
        </section>
        <!--blog-section end-->


    </div>
    <!--site-main end-->
@endsection

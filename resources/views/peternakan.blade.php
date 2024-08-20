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
                            <h2 class="title">PPID Dinas KPKP</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-title end -->

    <!--site-main start-->
    <div class="site-main">


        <div class="ttm-row sidebar ttm-sidebar-left clearfix">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-4 widget-area sidebar-left">
                        @include('partials.navwid')
                    </div>
                    <div class="col-lg-8 content-area">
                        <div class="ttm-service-single-content-area">
                            <div class="ttm-service-description">
                                <h3>Selamat Datang di,</h3>
                                <p align="justify">PPID Dinas Ketahanan Pangan, Kelautan dan Pertanian Provinsi DKI
                                    Jakarta. Sebagai
                                    wujud komitmen dalam penerapan good governance yang memerlukan transparansi,
                                    akuntabilitas, partisipasi, pemerintah mendukung adanya keterbukaan
                                    informasi bagi publik. Untuk membuka akses informasi bagi masyarakat dalam memperoleh
                                    informasi-informasi yang berakibat pada kepentingan publik, pemerintah menerbitkan
                                    Undang-undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik. Terkait dengan
                                    hal tersebut, Dinas Ketahanan Pangan, Kelautan dan Pertanian Provinsi DKI Jakarta telah
                                    membentuk Pejabat Pengelola Informasi dan Dokumentasi (PPID).
                                </P>
                                <p>
                                <ul>
                                    PPID Dinas Ketahanan Pangan, Kelautan dan Pertanian Provinsi DKI Jakarta mempunyai tugas
                                    antara lain :
                                    <li align="justify">Merencanakan, mengorganisaksikan, melaksanakan, mengawasi dan
                                        mengevaluasi pelaksanaan kegiatan pengelolaan dan layanan informasi publik di
                                        lingkungan Dinas Ketahanan Pangan, Kelautan dan Pertanian Provinsi DKI Jakarta;</li>
                                    <li align="justify">Melakukan koordinasi dengan unit kerja terkait di bidang layanan,
                                        pengelolaan informasi publik, dokumentasi dan arsip, dan pengaduan dan penyelesaian
                                        sengketa.
                                    </li>
                                </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                </div><!-- row end -->
            </div>
        </div>
    </div>
    <!--site-main end-->
@endsection
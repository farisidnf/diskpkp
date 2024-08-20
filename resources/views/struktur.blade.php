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
                            <h2 class="title">Struktur PPID</h2>
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
                                <h5>Dinas Ketahanan Pangan, Kelautan dan Pertanian Provinsi DKI</h5>
                            </div>
                        </div>
                    </div>
                </div><!-- row end -->
            </div>
        </div>
    </div>
    <!--site-main end-->
@endsection

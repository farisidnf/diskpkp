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
                            <h2 class="title">PPID</h2>
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
                                <h3>Informasi Serta Merta</h3>
                                <div class="row">
                                    <div class="col-lg-12 col-md-7 col-sm-6">
                                        <aside class="widget with-title">
                                            <div class="d-flex">
                                                <div class="box-body">
                                                    <div id="data_content" class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    <th>Ringkasan Isi Informasi</th>
                                                                    <th style="text-align:center"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>Waspada Penyakit Mulut & Kuku</td>

                                                                    <td style="text-align:center" width="140px">
                                                                        <button
                                                                            onclick="location.href='https://dinaskpkp.com/bppid/Waspada Penyakit Mulut dan Kuku.pdf'; return false;"
                                                                            class="ttm-btn ttm-btn-size-sm ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor">
                                                                            Lihat</button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Waspada Lumpy Skin Disease (LSD)</td>

                                                                    <td style="text-align:center" width="140px">
                                                                        <button
                                                                            onclick="location.href='https://dinaskpkp.com/bppid/Waspada Lumpy Skin Disease.pdf'; return false;"
                                                                            class="ttm-btn ttm-btn-size-sm ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor"
                                                                            title="Lihat">
                                                                            Lihat</button>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </aside>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- row end -->
            </div>
        </div>
    </div>
    <!--site-main end-->
@endsection

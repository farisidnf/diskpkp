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
                            <h2 class="title">Data Statistik</h2>
                        </div>
                        <div class="breadcrumb-wrapper">
                            <span>
                                <a title="Homepage" href="/">Beranda</a>
                            </span>
                            <span>Data</span>
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
                    <div class="col-lg-12">
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Uraian Data</th>
            <th scope="col">Download</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>...</td>
            <td>[DOWNLOAD]</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>...</td>
            <td>[DOWNLOAD]</td>
        </tr>
        <!-- Tambahkan baris sesuai kebutuhan -->
    </tbody>
</table>
                    </div>
                </div><!-- row end -->
            </div>
        </section>


    </div>
    <!--site-main end-->
@endsection

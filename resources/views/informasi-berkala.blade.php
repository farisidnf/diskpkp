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
                                <h3>Informasi Berkala</h3>
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
                                                                    <td><strong>A</strong></td>
                                                                    <td><strong>Informasi Tentang Badan Publik :</strong>
                                                                    </td>

                                                                    <td style="text-align:center" width="140px">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>Tugas, Wewenang dan Fungsi</td>

                                                                    <td style="text-align:center" width="140px">
                                                                        <button
                                                                            onclick="location.href='https://dinaskpkp.com/ppid'; return false;"
                                                                            class="ttm-btn ttm-btn-size-sm ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor"
                                                                            title="Lihat">
                                                                            Lihat</button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong>B</strong></td>
                                                                    <td><strong>Laporan Kinerja Instansi Pemerintah
                                                                            (LKIP)</strong></td>

                                                                    <td style="text-align:center" width="140px">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>LKIP DKPKP 2022</td>

                                                                    <td style="text-align:center" width="140px">
                                                                        <button
                                                                            onclick="location.href='https://dinaskpkp.com/bppid/LKIP DKPKP 2022.pdf'; return false;"
                                                                            class="ttm-btn ttm-btn-size-sm ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor"
                                                                            title="Lihat">
                                                                            Lihat</button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>LKIP DKPKP 2021</td>

                                                                    <td style="text-align:center" width="140px">
                                                                        <button
                                                                            onclick="location.href='https://dinaskpkp.com/bppid/LKIP DKPKP 2021.pdf'; return false;"
                                                                            class="ttm-btn ttm-btn-size-sm ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor"
                                                                            title="Lihat">
                                                                            Lihat</button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>LKIP DKPKP 2020</td>

                                                                    <td style="text-align:center" width="140px">
                                                                        <button
                                                                            onclick="location.href='https://dinaskpkp.com/bppid/LKIP DKPKP 2020.pdf'; return false;"
                                                                            class="ttm-btn ttm-btn-size-sm ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor"
                                                                            title="Lihat">
                                                                            Lihat</button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>LKIP DKPKP 2019</td>

                                                                    <td style="text-align:center" width="140px">
                                                                        <button
                                                                            onclick="location.href='https://dinaskpkp.com/bppid/LKIP DKPKP 2019.pdf'; return false;"
                                                                            class="ttm-btn ttm-btn-size-sm ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor"
                                                                            title="Lihat">
                                                                            Lihat</button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong>C</strong></td>
                                                                    <td><strong>Ringkasan Laporan Keuangan</strong></td>

                                                                    <td style="text-align:center" width="140px">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>Laporan Arus Kas 2022 Audited
                                                                    </td>

                                                                    <td style="text-align:center" width="140px">
                                                                        <button
                                                                            onclick="location.href='https://dinaskpkp.com/bppid/LAPORAN ARUS KAS AUDITED 2022.pdf'; return false;"
                                                                            class="ttm-btn ttm-btn-size-sm ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor"
                                                                            title="Lihat">
                                                                            Lihat</button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Laporan Keuangan Gabungan 31 Desember 2022 Audited
                                                                    </td>

                                                                    <td style="text-align:center" width="140px">
                                                                        <button
                                                                            onclick="location.href='https://dinaskpkp.com/bppid/LAPORAN KEUANGAN GABUNGAN 31 DESEMBER 2022 AUDITED kirim.pdf'; return false;"
                                                                            class="ttm-btn ttm-btn-size-sm ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor"
                                                                            title="Lihat">
                                                                            Lihat</button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>Laporan Operasional 2022 Audited</td>

                                                                    <td style="text-align:center" width="140px">
                                                                        <button
                                                                            onclick="location.href='https://dinaskpkp.com/bppid/LAPORAN OPERASIONAL AUDITED 2022.pdf'; return false;"
                                                                            class="ttm-btn ttm-btn-size-sm ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor"
                                                                            title="Lihat">
                                                                            Lihat</button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>Laporan Realisasi Anggaran 2022 Audited</td>

                                                                    <td style="text-align:center" width="140px">
                                                                        <button
                                                                            onclick="location.href='https://dinaskpkp.com/bppid/LAPORAN REALISASI ANGGARAN AUDITED 2022.pdf'; return false;"
                                                                            class="ttm-btn ttm-btn-size-sm ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor"
                                                                            title="Lihat">
                                                                            Lihat</button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong>D</strong></td>
                                                                    <td><strong>Pengumuman Pengadaan Barang dan
                                                                            Jasa</strong></td>

                                                                    <td style="text-align:center" width="140px">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>Rencana Umum Pengadaan Barang &amp; Jasa</td>

                                                                    <td style="text-align:center" width="140px">
                                                                        <button
                                        onclick="location.href='https://dinaskpkp.com/bppid/rekap-2023-000163289-163289.pdf'; return false;"
                                        class="ttm-btn ttm-btn-size-sm ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor"
                                                                            title="Lihat">
                                                                            Lihat</button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Daftar Paket Pelelangan</td>

                                                                    <td style="text-align:center" width="140px">
                                                                        <button
                                        onclick="location.href='https://dinaskpkp.com/bppid/Daftar Paket Lelang 2023.pdf'; return false;"
                                        class="ttm-btn ttm-btn-size-sm ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor"
                                                                            title="Lihat">
                                                                            Lihat</button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong>E</strong></td>
                                                                    <td><strong>Informasi Tentang Regulasi Badan
                                                                            Publik</strong></td>

                                                                    <td style="text-align:center" width="140px">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>Informasi yang Sedang Diproses dan Regulasi yang
                                                                        Telah Disahkan/ Ditetapkan</td>

                                                                    <td style="text-align:center" width="140px">
                                                                        <button
                                        onclick="location.href='https://dinaskpkp.com/bppid/SK lokasi Pangan Bersubsidi 2023.pdf'; return false;"
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

@extends('layouts.main')

@section('main')
    <!--site-main start-->
    <div class="site-main">


        <section class="ttm-row project-single-section padding_top70 padding_bottom70 clearfix">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ttm-pf-single-content-wrapper ttm-pf-view-left-image">
                            <div class="ttm-pf-single-content-wrapper-innerbox">
                                <div class="ttm-pf-detail-box">
                                    <!-- ttm_pf_image-wrapper -->
                                    <div class="ttm_pf_image-wrapper">
                                        <img class="img-fluid" src="{{ asset('images/pusyan2.png') }}" alt="nkv-img">
                                    </div><!-- ttm_pf_image-wrapper end -->
                                    <div class="ttm-pf-single-detail-box">
                                        <ul class="ttm-pf-detailbox-list">
                                           <li><span>Pengajuan</span><span>• Rekomendasi NKV</span><span>• Surveilans NKV</span></li>
                                        <ul class="ttm-pf-detailbox-list">
                                           <li><span>Verifikasi Akun</span><span>dkpkp.jakarta@gmail.com</span></li>
                                    </div>
                                </div>
                                <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-border ttm-btn-color-dark  margin_top15" href="/nkv-login">MASUK</a>
                                <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-border ttm-btn-color-dark  margin_top15" href="/register">DAFTAR</a>
                                <div class="ttm-pf-single-content-area">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="margin_top70 res-991-margin_top30">
                                                <h3>Selamat datang,</h3>
                                                <p>di laman resmi Nomor Kontrol Veteriner (NKV) Dinas Ketahanan Pangan, Kelautan, dan Pertanian Provinsi DKI Jakarta. Sebagai salah satu ujung tombak dalam menjaga keamanan pangan asal hewan, kami berkomitmen untuk memastikan setiap produk hewani yang beredar di Jakarta memiliki jaminan mutu dan keamanan yang tinggi.Pelayanan NKV kami bertujuan untuk memberikan standar yang jelas dan ketat bagi setiap usaha yang bergerak di bidang produk hewani.<br><br> Melalui Pelayanan NKV kami memastikan bahwa produk hewan yang beredar di Jakarta telah menerapkan higiene sanitasi mulai dari hulu sampai hilir. Dengan demikian kepercayaan masyarakat dalam mengkonsumsi produk hewan semakin meningkat sehingga mendorong pertumbuhan usaha di sektor peternakan. Komitmen kami adalah menghadirkan pelayanan yang cepat, transparan dan akuntabel untuk mendukung Jakarta sebagai kota global.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex download_block">
                                    <div class="download_img_icon">
                                        <img class="img-fluid auto_size" width="46" height="53" src="images/download-pdf.png" alt="download-pdf-img" />
                                    </div>
                                    <div class="padding_left20">
                                        <p class="ttm-textcolor-skincolor margin_bottom0">2023 - DKI Jakarta</p>
                                        <h2 class="fs-18">Data Surveilans dan Audit NKV</h2>
                                        <a href="{{ asset('bnkv/2023-REKAP DATA SURVEILANS DAN AUDIT NKV DKI JAKARTA.pdf') }}" target="_blank"><i class="ti-arrow-right mr-1"></i>Download (255 KB)</a>
                                    </div>
                                </div>
                                <br>
                                <br>
                                        <div>
                                            <div class="margin_bottom30">
                                                <h3>Panduan Mendaftar</h3>
                                                <p>Berikut dibawah ini adalah cara <u><a class="ttm-textcolor-skincolor" href="/register">mendaftar akun</a></u> khusus perusahaan.</p>
                                                <ul class="ttm-list fs-15 ttm-list-style-icon ttm-list-icon-color-skincolor">
                                                    <li>
                                                        <i class="ti ti-arrow-circle-right"></i>
                                                        <div class="ttm-list-li-content">Klik tombol daftar</div>
                                                    </li>
                                                    <li>
                                                        <i class="ti ti-arrow-circle-right"></i>
                                                        <div class="ttm-list-li-content">Pilih kategori <b>Perusahaan</b></div>
                                                    </li>
                                                    <li>
                                                        <i class="ti ti-arrow-circle-right"></i>
                                                        <div class="ttm-list-li-content">Isi form pendaftaran, masukkan data sesuai kolom yang sudah disediakan (pastikan kembali data yang di-input sudah benar)</div>
                                                    </li>
                                                    <li>
                                                        <i class="ti ti-arrow-circle-right"></i>
                                                        <div class="ttm-list-li-content">Setelah melakukan pendaftaran akun Anda perlu di verifikasi oleh pihak dinas di jam dan hari kerja</div>
                                                    </li>
                                                    <li>
                                                        <i class="ti ti-arrow-circle-right"></i>
                                                        <div class="ttm-list-li-content">Jika sudah terverifikasi, akun Anda sudah bisa diakses untuk selanjutnya masuk ke laman masuk/login</div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                <br>
                            <aside class="widget flicker-widget with-title">
                                <h3 class="widget-title">Galeri</h3>
                                <div class="images-gellary">
                                    <ul>
                                        <li><a class="ttm_prettyphoto" href="{{ asset('images/pusyan01.jpeg') }}" rel="prettyPhoto[coregallery]" data-rel="prettyPhoto">
                                            <img class="img-fluid" src="{{ asset('images/pusyan01.jpeg') }}" alt=""></a>
                                        </li>
                                        <li><a class="ttm_prettyphoto" href="{{ asset('images/pusyan02.jpeg') }}" rel="prettyPhoto[coregallery]" data-rel="prettyPhoto">
                                            <img class="img-fluid" src="{{ asset('images/pusyan02.jpeg') }}" alt=""></a>
                                        </li>
                                        <li><a class="ttm_prettyphoto" href="{{ asset('images/pusyan03.jpeg') }}" rel="prettyPhoto[coregallery]" data-rel="prettyPhoto">
                                            <img class="img-fluid" src="{{ asset('images/pusyan03.jpeg') }}" alt=""></a>
                                        </li>
                                        <li><a class="ttm_prettyphoto" href="{{ asset('images/pusyan04.jpeg') }}" rel="prettyPhoto[coregallery]" data-rel="prettyPhoto">
                                            <img class="img-fluid" src="{{ asset('images/pusyan04.jpeg') }}" alt=""></a>
                                        </li>
                                        <li><a class="ttm_prettyphoto" href="{{ asset('images/pusyan05.jpeg') }}" rel="prettyPhoto[coregallery]" data-rel="prettyPhoto">
                                            <img class="img-fluid" src="{{ asset('images/pusyan05.jpeg') }}" alt=""></a>
                                        </li>
                                    </ul>
                                </div>
                            </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div><!--site-main end-->
@endsection
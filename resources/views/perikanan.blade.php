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
                            <h2 class="title">Izin Perikanan</h2>
                        </div>
                        <div class="breadcrumb-wrapper">
                            <span>
                                <a title="Homepage" href="/">Beranda</a>
                            </span>
                            <span>Izin Perikanan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-title end -->

    <!--procedure-section-->
    <section class="ttm-row procedure-section clearfix">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- section title -->
                    <div class="section-title title-style-center_text">
                        <div class="title-header">
                            <h2 class="title">Bidang Perikanan</h2>
                        </div>
                        <div class="heading-seperator"><span></span></div>
                        <div class="title-desc">
                            <p>Berikut dibawah ini detail perzinan'nya:</p>
                        </div>
                    </div><!-- section title end -->
                </div>
            </div>
            <div class="row mb_15">
                <div class="col-lg-12 col-md-6 col-sm-6">
                    <h5>PEMBUATAN SIUP (Surat Izin Usaha Perikanan) BARU</h5>
                    <ol>
                        <li>Pemohon mengajukan permohonan surat izin usaha perikanan diajukan kepada Kepala Dinas Kelautan
                            Dan Pertanian, dengan melampirkan persyaratan tersebut melalui Suku Dinas Kelautan dan
                            pertanian&nbsp; setempat;</li>
                        <li>Rencana usaha meliputi rencana investasi, rencana kapal dan rencana operasional.</li>
                        <li>Pengecekan kelokasi tempat usaha perikanan oleh suku dinas setempat</li>
                        <li>Surat&nbsp; Pernyataan bermaterai cukup dari pemilik kapal atau penanggung jawab perusahaan yang
                            menyatakan :</li>
                    </ol>
                    <ul>
                        <li>Kesanggupan membangun atau memiliki UPI atau bermitra dengan UPI
                            yang telah memiliki SKP bagi usaha perikanan tangkap terpadu</li>
                        <li>Kesediaan mematuhi dan melaksanakan semua ketentuan peraturan
                            perudang-undangan ; dan</li>
                        <li>Kebenaran data dan informasi yang disampaikan;</li>
                    </ul>
                    <h5>PEMBUATAN SIPI (Surat Izin Penangkapan Ikan) BARU</h5>
                    <ol>
                        <li>Pemohonan mengajukan permohonan surat izin penangkapan ikan&nbsp; kepada&nbsp; Kepala Dinas
                            Kelautan Dan Pertanian melalui Suku Dinas setempat, dengan melampirkan persyaratan tersebut
                            melalui suku dinas/UPT</li>
                        <li>Fotokopi SIUP;</li>
                        <li>Fotokopi grosse akta dengan menunjukan aslinya, apabila&nbsp; grosse akta dalam jaminan bank,
                            harus melampirkan akta hipotik dengan menunjukan aslinya;</li>
                        <li>Spesifikasi teknis alat penangkapan ikan yang digunakan;</li>
                        <li>Fotokopi gambar rencana umum kapal (general arragement)</li>
                        <li>Rencana target spesies penangkapan ikan</li>
                        <li>Surat pernyataan bermeterai cukup dari pemilik kapal atau penanggung jawab perusahaan yang
                            menyatakan :</li>
                    </ol>
                    <ul>
                        <li>Kesanggupan untuk menjaga kelestarian SDI dan lingkungannya;</li>
                        <li>Kesanggupan mengisi&nbsp;&nbsp;<em>lookbook&nbsp;</em>sesuai
                            ketentuan pertauran perundang-undangan;</li>
                        <li>Kesanggupan menggunakan nahkoda dan ABK berkewarganegaraan Indonesia
                            sesuai ketentuan peraturan perundang-undangan;</li>
                        <li>Kapal yang digunakan tidak tercantum dalam daftar kapal yang
                            melakukan penangkapan ikan secara tidak sah, tidak dilaporkan, dan tidak diatur (<em>illegal,
                                unreported, and unregulated fishing</em>); dan</li>
                        <li>Kebenaran data dan informasi yang disampaikan.</li>
                    </ul>
                    <h5>PERUBAHAN SIPI (Surat Izin Penangkapan Ikan)</h5>
                    <ol>
                        <li>Perubahan SIPI&nbsp;hanya dapat diajukan&nbsp;setelah jangka waktu 3 bulan&nbsp;terhitung sejak
                            SIPI diterbitkan.</li>
                        <li>Perubahan SIPI dilakukan apabila terdapat perubahan:</li>
                    </ol>
                    <ul>
                        <li>SIUP;</li>
                        <li>Spesifikasi kapal penangkapan ikan;</li>
                        <li>Alat penangkapan ikan;</li>
                        <li>Daerah penangkapan ; dan /atau</li>
                        <li>Pelabuhan pangkalan.</li>
                    </ul>
                    <ol start="3">
                        <li>Setiap orang untuk melakukan perubahan SIPI mengajukan permohonan kepada&nbsp;Kepala Dinas
                            Kelautan dan Pertanian melalui Suku Dinas setempat, dengan melampirkan persyaratan :</li>
                    </ol>
                    <ul>
                        <li>Fotokopi SIUP;</li>
                        <li>Fotokopi SIPI yang akan diubah ;</li>
                        <li>Jenis perubahan SIPI yang diminta ; dan</li>
                        <li>Surat pernyataan bermeterai cukup atas kebenaraan data dan informasi
                            yang disampaikan.</li>
                    </ul>
                    <p>&nbsp;</p>
                    <h5>PERPANJANGAN SIPI (Surat Izin Penangkapan Ikan)</h5>
                    <ol>
                        <li>Perpanjangan SIPI&nbsp;dapat diajukan&nbsp;3 (tiga) bulan&nbsp;sebelum masa berlaku SIPI
                            berakhir.</li>
                        <li>Persyaratan :</li>
                    </ol>
                    <ul>
                        <li>Fotokopi SIUP;</li>
                        <li>Fotokopi SIPI yang diperpanjang;</li>
                        <li><em>Grosse</em>akta atau buku kapal perikanan;</li>
                        <li>Surat keterangan dari Kepala Pelabuhan tempat kapal tersebut
                            berpangkalan, yang menyatakan bahwa kapal tersebut berpangkalan dan mendaratkan ikan hasil
                            tangkapannya di pelabuhan sesuai dengan yang tercantum dalam SIPI;</li>
                        <li>Surat pernyataan dari pemilik kapal atau penanggung jawab perusahaan
                            bahwa kapal penangkapan ikan masih layak untuk dioperasikan dan tidak atau terdapat perubahan
                            fungsi, dan spesifikasi teknis kapal penangkapan ikan dan/atau alat penangkapan ikan;</li>
                    </ul>
                    <p>&nbsp;</p>
                    <h5>PENGGANTIAN SIPI (Surat Izin Penangkapan Ikan)</h5>
                    <ol>
                        <li>Penggantian SIPI dapat dilakukan apabila SIPI asli rusak atau hilang, dengan syarat :</li>
                    </ol>
                    <ul>
                        <li>SIPI asli dalam hal SIPI rusak atau surat keterangan hilang dari
                            kepolisian dalam hal SIPI hilang; dan</li>
                        <li>Surat pernyataan bermeterai cukup atas kebenaran atas data dan
                            informasi yang disampaikan.</li>
                    </ul>
                    <ol start="2">
                        <li>Penggantian SIPI tidak dikenakan PHP.</li>
                    </ol>
                    <p>&nbsp;</p>
                    <h5>SYARAT PENERBITAN SIKPI (Surat Izin Kapal Pengangkut Ikan)</h5>
                    <p>Setiap orang untuk memiliki SIKPI&nbsp;harus mengajukan permohonan kepada&nbsp;Kepala Dinas Kelautan
                        dan Pertanian melalui Suku Dinas setempat, dengan melampirkan persyaratan :</p>
                    <ol>
                        <li>Fotokopi SIUP;</li>
                        <li>Fotokopi&nbsp;<em>grosse akta</em>&nbsp;dengan menunjukkan aslinya apabila&nbsp;<em>grosse
                                akta&nbsp;</em>dalam jaminan bank, harus melampirkan akta hipotik dengan menunjukkan
                            aslinya;</li>
                        <li>Fotokopi gambar rencana umum kapal (<em>general arrangement</em>);</li>
                        <li>Data kapal dengan format yang telah ditetapkan (lampiran Permen);</li>
                        <li>Surat Pernyataan bermeterai cukup dari pemilik kapal atau penanggung jawab perusahaan yang
                            menyatakan:</li>
                    </ol>
                    <ul>
                        <li>Kesanggupan menerima, membantu kelancaran tugas, dan menjaga
                            keselamatan petugas pemantau (<em>observer</em>) di atas kapal pengangkut ikan ;</li>
                        <li>Kesanggupan menggunakan 1 orang tenaga kualiti control yang memiliki
                            sertifikat keterampilan penangkapan ikan (SKPI);</li>
                        <li>Kesanggupan untuk menjaga kelestarian SDI dan lingkungannya;</li>
                        <li>Kesanggupan menggunakan nahkoda dan ABK berkewarganegaraan Indonesia
                            sesuai ketentuan peraturan perundang-undangan;</li>
                        <li>Kapal yang digunakan tidak tercantum dalam daftar kapal yang
                            melakukan penangkapan ikan secara tidak sah, tidak dilaporkan,&nbsp; dan tidak diatur
                            (<em>illegal,unreported, and unregulated fishing</em>); dan</li>
                        <li>Kebenaran data dan informasi yang disampaikan.</li>
                    </ul>
                    <p>&nbsp;</p>
                    <h5>SYARAT TAMBAHAN PENERBITAN SIKPI (Surat Izin Kapal Pengangkut Ikan)</h5>
                    <ol>
                        <li>Untuk kapal pengangkut ikan dari sentra nelayan,&nbsp;berupa&nbsp;daftar nama
                            sentra&nbsp;kegiatan nelayan yang menjadi tempat muat ikan hasil tangkapan yang disahkan oleh
                            dinas kabupaten/kota</li>
                        <li>Untuk kapal penangkuat ikan dengan pola kementrian,&nbsp;berupa&nbsp;daftar kapal penangkapan
                            ikan berukuran s/d 10 GT&nbsp;yang menjadi mitra yang disahkan oleh dinas kabupaten/kota</li>
                        <li>Untuk kapal pengangkut ikan tujuan ekspor,&nbsp;berupa :</li>
                    </ol>
                    <ul>
                        <li>Rencana pelabuhan pangkalan dan pelabuhan tujuan;</li>
                        <li>Fotokopi surat tanda kebangsaan kapal untuk kapal asing;</li>
                        <li>Fotokopi surat ukur internasional untuk kapal asing; dan</li>
                        <li>Fotokopi paspor dan buku pelaut (<em>seamen book&nbsp;</em>) dan
                            foto nahkoda uk. 4×6 cm berwarna sebanyak 2 lembar dan daftar ABK</li>
                    </ul>
                    <ol start="4">
                        <li>Selain persyaratan di atas, untuk kapal pengangkut ikan dalam usaha perikanan tangkap
                            terpaduditambah persyaratan berupa surat keterangan dari Dirjen P2HP yang menyatakan :</li>
                    </ol>
                    <ul>
                        <li>Realisasi pembangunan UPI paling sedikit 75% untuk pengadaan kapal
                            penangkap ikan bekas ;</li>
                        <li>Realisasi pembangunan UPI paling sedikit 50% untuk pengadaan kapal
                            penangkap ikan baru ;</li>
                        <li>Realisasi pembangunan UPI paling sedikit 65% untuk pengadaan kapal
                            penangkap ikan dalam keadaan baru bekas.</li>
                    </ul>
                    <p>&nbsp;</p>
                    <h5>SYARAT PERUBAHAN SIKPI (Surat Izin Kapal Pengangkut Ikan)</h5>
                    <ol>
                        <li>Perubahan SIKPI&nbsp;&nbsp;hanya dapat diajukan&nbsp;setelah&nbsp;jangka waktu&nbsp;3 ( tiga)
                            bulan&nbsp;terhitung sejak SIKPI diterbitkan.</li>
                        <li>Perubahan SIKPI dilakukan apabila terdapat perubahan:</li>
                    </ol>
                    <ul>
                        <li>SIUP;</li>
                        <li>Spesifikasi kapal pengangkut ikan; dan/atau</li>
                        <li>Pelabuhan pangkalan, pelabuhan bongkar, pelabuhan singgah atau
                            pelabuhan muat.</li>
                    </ul>
                    <ol start="3">
                        <li>Setiap orang untuk melakukan perubahan SIKPI mengajukan permohonan kepada Direktur Jendral,
                            dengan melampirkan persyaratan:</li>
                    </ol>
                    <ul>
                        <li>Fotokopi SIUP;</li>
                        <li>Fotokopi SIKPI yang diubah;</li>
                        <li>Jenis perubahan SIKPI yang diminta; dan</li>
                        <li>Surat pernyataan bermeterai cukup atas kebenaran data dan informasi
                            yang disampaikan.</li>
                    </ul>
                    <p>&nbsp;</p>
                    <h5>PERPANJANGAN SIKPI (Surat Izin Kapal Pengangkut Ikan)</h5>
                    <ol>
                        <li>Perpanjangan SIKPI dapat diajukan 3 (tiga) bulan sebelum masa berlaku SIKPI berakhir.</li>
                        <li>Setiap orang untuk melakukan perpanjangan SIKPI harus mengajukan permohonan kepada Direktur
                            Jendral, dengan melampirkan persyaratan:</li>
                    </ol>
                    <ul>
                        <li>Fotokopi SIUP;</li>
                        <li>Fotokopi SIKPI yagn diperpanjang ;</li>
                        <li><em>Grosse akta</em>atau buku kapal perikanan ;</li>
                        <li>Surat keterangan dari Kepala Pelabuhan tempat kapal tersebut
                            berpangkalan, yang menyatakan bahwa kapal tersebut berpangkalan dan mendaratkan ikan dipelabuhan
                            sesuai dengan tercantum dalam SIKPI;</li>
                        <li>Bukti penyampaian LKU dan LKP.</li>
                    </ul>
                    <ol start="3">
                        <li>Surat pernyataan dari pemilik kapal atau penanggung jawab perusahaan bahwa kapal pengangkut ikan
                            masih layak untuk dioperasikan dan tidak atau terdapat perubahan fungsi, dan spesifikasi teknis
                            kapal pengangkut ikan;</li>
                        <li>Surat pernyataan bermeterai cukup atas kebenaran data dan informasi yang disampaikan.</li>
                    </ol>
                    <p>&nbsp;</p>
                    <h5>PERSYARATAN &amp; TATA CARA PERSETEJUAN PENGADAAN</h5>
                    <p><strong>KAPAL PENANGKAP IKAN DAN KAPAL PENGANGKUT IKAN</strong></p>
                    <p>Setiap orang&nbsp;&nbsp;untuk melakukan pengadaan kapal penangkap ikan dan/atau kapal penangkut
                        ikan&nbsp;harus mengajukan permohonan&nbsp;Kepala Dinas Kelautan dan Pertanian melalui Suku Dinas
                        setempat&nbsp;dengan melampirkan&nbsp;persyaratan&nbsp;:</p>
                    <ol>
                        <li>Fotokopi SIUP;</li>
                        <li>Fotokopi gambar rencana umum kapal (<em>general arrangement</em>);</li>
                        <li>Spesifikasi teknis jenis alat penangkapan ikan yang akan digunakan, untuk kapal penangkapan
                            ikan;</li>
                        <li>Surat keterangan dari galangan kapal, untuk pengadaan kapal baru ;</li>
                        <li>Rekomendasi&nbsp;dari pemerintah Negara tempat membangun kapal dan diketahui oleh
                            kantor&nbsp;Perwakilan Negara Republik Indonesia&nbsp;di negara yang bersangkutan untuk
                            pengadaan&nbsp;kapal dari luar negeri&nbsp;; dan</li>
                        <li>Surat pernyataan bermeterai cukup yang menyatakan bahwa kapal perikanan tidak tercantum dalam
                            daftar kapal yang melakukan penangkapan dan /atau</li>
                        <li>pengangkutan ikan secara tidak sah, tidak dilaporkan, dan tidak diatur (<em>illegal, unreported
                                and unregulated fishing</em>) untuk pengadaan kapal keadaan bekas.</li>
                    </ol>
                    <p>&nbsp;</p>
                    <h5>DAERAH PENANGKAPAN IKAN &amp; PELABUHAN PANGKALAN</h5>
                    <p>1. Kapal penangkap ikan diberikan DPI di 1 (satu) WPP –NRI*<br>
                        2. DPI dapat diberikan di 2 (dua) WPP-NRI untuk yang berdampingan.<br>
                        3. Setiap kapal penangkap ikan diberikan 1 (satu) pelabuhan pangkalan dan 1 (satu) pelabuhan
                        singgah.<br>
                        4. Setiap kapal pengangkut ikan diberikan 1 (satu) pelabuhan pangkalan.<br>
                        5. Setiap kapal penangkap ikan dan kapal pengangkut ikan wajib mendaratkan ikan hasil tangkapan di
                        pelabuhan pangkalan sebagaimana tercantum dalam SIPI atau SIKPI.<br>
                        6. Setiap kapal yang tidak mendaratkan ikan hasil tangkapan di pelabuhan pangkalan sebagaimana
                        dimaksud diatas, diberikan sanksi pencabutan SIPI atau SIKPI.<br>
                        7. Dokumen yang ada di atas kapal penangkap ikan dan/ atau kapal pengangkut ikan terdiri atas:</p>
                    <ul>
                        <li>SIPI/SIKPI Asli;</li>
                        <li>Surat Larik Operasi (SLO) kapal perikanan Asli; dan</li>
                        <li>Surat Persetujuan Berlayar (SPB) Asli.</li>
                    </ul>
                    <p>8. Terhadap kapal penangkap dan/atau kapal pengangkut ikan yang tidak membawa dokumen sebagaimana
                        dimaksud di atas, maka dikategorikan tidak memiliki dokumen .<br>
                        9. Kapal penangkap ikan atau kapal pengangkut ikan berbendera Indonesia yang diberikan SIPI atau
                        SIKPI untuk menangkap ikan atau menagangkut ikan di WPP-NRI dapat melakukan kegiatan penangkapan
                        atau pengangkutan ikan di laut lepas dengan mengacu pada ketentuan peraturan perundang-undangan yang
                        mengatur tentang Usaha Perikanan Tangkap di laut lepas.</p>
                    <p>&nbsp;</p>
                    <h5>PELAPORAN</h5>
                    <ol>
                        <li>Setiap orang yang melakukan usaha perikanan tangkap wajib melapor membuat Laporan Kegiatan Usaha
                            (LKU)&nbsp;setiap 6 bulan&nbsp;dilengkapi dengan realisi investasi dan permodalan.</li>
                        <li>Setiap orang yang melakukan usaha penangkapan ikan dan pengangkutan ikan wajib menyampaikan
                            Laporan Kegiatan Penangkapan/Pengangkutan&nbsp;(LKP) setiap 3 bulan.</li>
                        <li>Laporan disampaikan kepada Dierektur Jendral, Gubernur, atau Bupati/Walikota (sesuai kewenangan
                            penerbitan izinnya)</li>
                        <li>Setiap orang&nbsp;yang tidak menyampaikan laporan dikenakan sanksi&nbsp;&nbsp;administratif
                            berupa :</li>
                    </ol>
                    <ul>
                        <li>Peringatan/teguran tertulis (<em>jangka waktu 1 bulan)</em></li>
                        <li>Pembekuan&nbsp;SIUP, SIPI dan/atau SIKPI (<em>jangka waktu 1 bulan</em>)</li>
                        <li>Pencabutan&nbsp;SIUP, SIPI dan/atau SIKPI</li>
                    </ul>
                    <p><em>Sanksi adminitratif akan gugur apabila dalam jangka waktu diberlakukannya sanksi, pemilik SIUP
                            mampu memenuhi kewajibannya.</em></p>
                    <p>&nbsp;</p>
                    <h5>HAL-HAL YANG PERLU DILAPORKAN</h5>
                    <ol>
                        <li>SIPI yang tidak diperpanjang selama kurun waktu 3 (tiga) bulan&nbsp;sejak masa berlakunnya
                            habis, pemilik kapal atau penanggung jawab perusahaan harus melaporkan secara tertulis tentang
                            keberadaan dan aktivitas kapal dan mengembalikan SIPI tersebut kepada Direktur Jendral.</li>
                        <li>Apabila ketentuan di atas tidak dilaksanakan, pemerintah tidak bertanggung jawab terhadap
                            aktivitas kapal yang dilakukan dan terhadap&nbsp;&nbsp;kapal tersebut tidak dapat
                            diberikan&nbsp;SIPI lagi .</li>
                    </ol>
                    <p>&nbsp;</p>
                    <h5>PERSYARATAN CEK FISIK KAPAL</h5>
                    <p>Pemohon mengajukan Persyaratan Cek Fisik seperti sebagai berikut :</p>
                    <ul>
                        <li>Foto Copy KTP pemilik;</li>
                        <li>Foto Copy Surat Ijin Usaha Perikanan (SIUP);</li>
                        <li>Foto Copy SIPI/SIKPI yang masih berlaku;</li>
                        <li>Foto Copy Gross Akte Kapal;</li>
                        <li>Foto Copy Pas Tahunan/Surat Ukur yang masih berlaku;</li>
                        <li>Surat pernyataan pemilik tentang kebenaran data;</li>
                        <li>Gambar disain spesifikasi alat tangkap&nbsp; yang digunakan;</li>
                        <li>Rekomendasi dari Suku Dinas setempat.</li>
                    </ul>
                    <p>Pelaksanaan pengecekan fisik kapal&nbsp; dan alat penangkapan ikan, meliputi :</p>
                    <ul>
                        <li>Panjang, Lebar, Dalam/Tinggi dan Panjang kleseluruhan Kapal;</li>
                        <li>Panjang jaring;</li>
                        <li>Lebar jaring;</li>
                        <li>Ukuran mata jaring;</li>
                        <li>Jumlah pelampung;</li>
                        <li>Jumlah lampu.</li>
                    </ul>
                    <p>Resume hasil &nbsp;Cek Fisik :</p>
                    <ul>
                        <li>Melampirkan foto ukurang 3 R saat pengecekan cek fisik di kapal;</li>
                        <li>Hasil resume di tanda tangani petugas cek fisik, pemilik kapal dan mengetahui Kepala Dinas
                            Kelautan dan Pertanian;</li>
                    </ul>
                    <p>&nbsp;</p>
                    <h5>PERSYARATAN PERIJINAN ANDON ( masa berlaku andon selama 6 bulan ) :</h5>
                    <ol>
                        <li>Foto Copy KTP pemilik</li>
                        <li>Foto Copy Surat Ijin Usaha Perikanan (SIUP)</li>
                        <li>Foto Copy SIPI/SIKPI yang masih berlaku</li>
                        <li>Foto Copy Pas Tahunan/Surat Ukur yang masih berlaku</li>
                        <li>Surat pernyataan pemilik tentang kebenaran data</li>
                        <li>Rekomendasi dari Suku Dinas yang akan dituju wilayah perairannya</li>
                    </ol>
                    <p>&nbsp;</p>
                    <p></p>
                </div>
            </div>
        </div>
    </section>
    <!--procedure-section end-->

    </div>
    <!--site-main end-->
@endsection

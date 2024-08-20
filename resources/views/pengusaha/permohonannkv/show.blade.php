@extends('admin.layouts.admin')
@section('title', $title ?? __('Blank Page'))
@section('main-content')
    <style>
        .form-check {
            padding-left: 2.25rem;
        }
    </style>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <h5><b>Data Detail</b></h5>
        <hr>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="type-select form-control" disabled>
                        <option value="">Pilih Status</option>
                        <option value="0" {{$get_data->status==0 ? "selected" : ""}}>Belum Mengajukan</option>
                        <option value="1" {{$get_data->status==1 ? "selected" : ""}}>Mengajukan</option>
                        <option value="2" {{$get_data->status==2 ? "selected" : ""}}>Sedang Periksa</option>
                        <option value="3" {{$get_data->status==3 ? "selected" : ""}}>Dikembalikan</option>
                        <option value="4" {{$get_data->status==4 ? "selected" : ""}}>Disetujui</option>
                        <option value="5" {{$get_data->status==5 ? "selected" : ""}}>Penerbitan Rekomendasi</option>
                        <option value="6" {{$get_data->status==6 ? "selected" : ""}}>Selesai</option>
                    </select>
                </div>
                @if($get_data->catatan)
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label for="catatan">Catatan</label>
                            <textarea readonly class="type-text form-control" cols="30" rows="10">{{$get_data->catatan}}</textarea>
                        </div>
                    </div>
                </div>
                @endif
                <div class="form-group">
                    <label>No.Permohonan</label>
                    <input type="text" class="form-control" disabled value="{{$get_data->no_pengajuan}}">
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-12">Tujuan Permohonan</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="fk_lokasi_sudin" name="fk_lokasi_sudin"
                                placeholder="Tujuan Permohonan" value="Sudin KPKP {{$get_data->lokasi_sudin_r->lokasi}}" disabled>
                        </div>
                    </div>
                </div>
             
                <h5 class="mt-5"><b>Data Perusahaan</b></h5>
                <hr>
                <div class="form-group">
                <div class="row">
                    <label class="col-sm-12">Nama Perusahaan</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan"
                            placeholder="Nama Perusahaan" value="{{old('nama_perusahaan', $get_data->nama_perusahaan)}}" disabled>
                    </div>
                </div>
                </div>

                <div class="form-group">
                <div class="row">
                    <label class="col-sm-12">Alamat Perusahaan</label>
                    <div class="col-sm-12">
                                <textarea disabled name="alamat_perusahaan" class="form-control" id="alamat_perusahaan" cols="30" rows="10" placeholder="Alamat Perusahaan">{{old('alamat_perusahaan', $get_data->alamat_perusahaan)}}</textarea>
                    </div>
                </div>
                </div>

                <div class="form-group">
                <div class="row">
                    <label class="col-sm-12">Alamat Tempat Usaha</label>
                    <div class="col-sm-12">
                                <textarea disabled name="alamat_tempat_usaha" class="form-control" id="alamat_tempat_usaha" cols="30" rows="10" placeholder="Alamat Tempat Usaha">{{old('alamat_tempat_usaha', $get_data->alamat_tempat_usaha)}}</textarea>
                    </div>
                </div>
                </div>

                <div class="form-group">
                <div class="row">
                    <label class="col-sm-12">Nama Pimpinan/Penanggung Jawab</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="nama_pimpinan" name="nama_pimpinan"
                            placeholder="Nama Pimpinan/Penanggung Jawab" value="{{old('nama_pimpinan', $get_data->nama_pimpinan)}}" disabled>
                    </div>
                </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-12">Jenis Unit Usaha Produk Hewan</label>
                        <div class="col-sm-12">
                        <ul class="list-group list-group-horizontal">
                            @foreach($jenisunitusaha as $jenisunit)
                                @php
                                    $checked = "";
                                @endphp
                                @if($get_data->jenis_unit_usaha)
                                    @foreach(json_decode($get_data->jenis_unit_usaha) as $datajenisunit)
                                        @php
                                            if($datajenisunit==$jenisunit->id){
                                                $checked = "checked";
                                            }
                                        @endphp
                                    @endforeach
                                @endif
                            @if($checked=="checked")
                            <li class="list-group-item">{{$jenisunit->nama}}</li>
                            @endif
                            @endforeach

                            @if($get_data->jenis_unit_usaha_laincek)
                            <li class="list-group-item">{{$get_data->jenis_unit_usaha_lainnya}}</li>
                            @endif                
                        </ul>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                <div class="row">
                    <label class="col-sm-12">Kontak Person</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="kontak_person" name="kontak_person"
                            placeholder="Kontak Person" value="{{old('kontak_person', $get_data->kontak_person)}}" disabled>
                    </div>
                </div>
                </div>

                <div class="form-group">
                <div class="row">
                    <label class="col-sm-12">Nomor Handphone</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="nomor_hp" name="nomor_hp"
                            placeholder="Nomor Handphone" value="{{old('nomor_hp', $get_data->nomor_hp)}}" disabled>
                    </div>
                </div>
                </div>
                <h5 class="mt-5"><b>Data Berkas</b></h5>
                <hr>
                <div class="">
                    <div class="row">
                        <div class="col-sm-8">
                            <label for="file_ktp" class="mb-0">Kartu Tanda Penduduk Pimpinan/Penanggung Jawab Perusahaan <i style="font-weight:bold">(Maks 1,5 mb) (pdf/jpg)</i>
                            </label>
                        </div>
                        <div class="col-sm-2">
                            <center>
                                @if($get_data->file_ktp)
                                <h6 class="mb-0"><a class="text-success" target="_blank" href="{{asset($get_data->file_ktp)}}"><i>Lihat File</i></a></h6>
                                @endif
                            </center>
                        </div>
                        <div class="col-sm-2">
                            <center>
                                @if($get_data->file_ktp_cek)
                                <i data-toggle="tooltip" data-placement="top" title="File Terverivikasi" class="text-success fas fa-check"></i>
                                @else
                                <i data-toggle="tooltip" data-placement="top" title="File Belum Terverivikasi" class="fas fa-exclamation-triangle"></i>
                                @endif
                            </center>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="">
                    <div class="row">
                        <div class="col-sm-8">
                            <label for="file_nib" class="mb-0">Nomor Induk Berusaha (NIB) <i style="font-weight:bold">(Maks 1,5 mb) (pdf/jpg)</i>
                            </label>
                        </div>
                        <div class="col-sm-2">
                            <center>
                                @if($get_data->file_nib)
                                <h6 class="mb-0"><a class="text-success" target="_blank" href="{{asset($get_data->file_nib)}}"><i>Lihat File</i></a></h6>
                                @endif
                            </center>
                        </div>
                        <div class="col-sm-2">
                            <center>
                                @if($get_data->file_nib_cek)
                                <i data-toggle="tooltip" data-placement="top" title="File Terverivikasi" class="text-success fas fa-check"></i>
                                @else
                                <i data-toggle="tooltip" data-placement="top" title="File Belum Terverivikasi" class="fas fa-exclamation-triangle"></i>
                                @endif
                            </center>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="">
                    <div class="row">
                        <div class="col-sm-8">
                            <label for="file_surat_permohonan_perusahaan" class="mb-0">Surat Permohonan dari Perusahaan <i style="font-weight:bold">(Maks 1,5 mb) (pdf/jpg)</i>
                            </label>
                        </div>
                        <div class="col-sm-2">
                            <center>
                                @if($get_data->file_surat_permohonan_perusahaan)
                                <h6 class="mb-0"><a class="text-success" target="_blank" href="{{asset($get_data->file_surat_permohonan_perusahaan)}}"><i>Lihat File</i></a></h6>
                                @endif
                            </center>
                        </div>
                        <div class="col-sm-2">
                            <center>
                                @if($get_data->file_surat_permohonan_perusahaan_cek)
                                <i data-toggle="tooltip" data-placement="top" title="File Terverivikasi" class="text-success fas fa-check"></i>
                                @else
                                <i data-toggle="tooltip" data-placement="top" title="File Belum Terverivikasi" class="fas fa-exclamation-triangle"></i>
                                @endif
                            </center>
                        </div>
                    </div>
                </div>
                <hr>

                <!-- <div class="">
                    <div class="row">
                        <div class="col-sm-8">
                            <label for="file_surat_keterangan" class="mb-0">Surat Keterangan Domisili Unit Usaha Produk Hewan <i style="font-weight:bold">(Maks 1,5 mb) (pdf/jpg)</i>
                            </label>
                        </div>
                        <div class="col-sm-2">
                            <center>
                                @if($get_data->file_surat_keterangan)
                                <h6 class="mb-0"><a class="text-success" target="_blank" href="{{asset($get_data->file_surat_keterangan)}}"><i>Lihat File</i></a></h6>
                                @endif
                            </center>
                        </div>
                        <div class="col-sm-2">
                            <center>
                                @if($get_data->file_surat_keterangan_cek)
                                <i data-toggle="tooltip" data-placement="top" title="File Terverivikasi" class="text-success fas fa-check"></i>
                                @else
                                <i data-toggle="tooltip" data-placement="top" title="File Belum Terverivikasi" class="fas fa-exclamation-triangle"></i>
                                @endif
                            </center>
                        </div>
                    </div>
                </div>
                <hr> -->

                <div class="">
                    <div class="row">
                        <div class="col-sm-8">
                            <label for="file_bukti_kepemilikan" class="mb-0">Bukti Kepemilikan unit usaha/bukti perjanjian sewa menyewa <i style="font-weight:bold">(Maks 1,5 mb) (pdf/jpg)</i>
                            </label>
                        </div>
                        <div class="col-sm-2">
                            <center>
                                @if($get_data->file_bukti_kepemilikan)
                                <h6 class="mb-0"><a class="text-success" target="_blank" href="{{asset($get_data->file_bukti_kepemilikan)}}"><i>Lihat File</i></a></h6>
                                @endif
                            </center>
                        </div>
                        <div class="col-sm-2">
                            <center>
                                @if($get_data->file_bukti_kepemilikan_cek)
                                <i data-toggle="tooltip" data-placement="top" title="File Terverivikasi" class="text-success fas fa-check"></i>
                                @else
                                <i data-toggle="tooltip" data-placement="top" title="File Belum Terverivikasi" class="fas fa-exclamation-triangle"></i>
                                @endif
                            </center>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="">
                    <div class="row">
                        <div class="col-sm-8">
                            <label for="file_surat_keabsahan" class="mb-0">Surat Pernyataan keabsahan dokumen (bermaterai) <i style="font-weight:bold">(Maks 1,5 mb) (pdf/jpg)</i>
                            </label>
                        </div>
                        <div class="col-sm-2">
                            <center>
                                @if($get_data->file_surat_keabsahan)
                                <h6 class="mb-0"><a class="text-success" target="_blank" href="{{asset($get_data->file_surat_keabsahan)}}"><i>Lihat File</i></a></h6>
                                @endif
                            </center>
                        </div>
                        <div class="col-sm-2">
                            <center>
                                @if($get_data->file_surat_keabsahan_cek)
                                <i data-toggle="tooltip" data-placement="top" title="File Terverivikasi" class="text-success fas fa-check"></i>
                                @else
                                <i data-toggle="tooltip" data-placement="top" title="File Belum Terverivikasi" class="fas fa-exclamation-triangle"></i>
                                @endif
                            </center>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="">
                    <div class="row">
                        <div class="col-sm-8">
                            <label for="file_surat_kuasa" class="mb-0">Surat Kuasa bermaterai (bila diwakilkan oleh pihak lain) <i style="font-weight:bold">(Maks 1,5 mb) (pdf/jpg)</i>
                            </label>
                        </div>
                        <div class="col-sm-2">
                            <center>
                                @if($get_data->file_surat_kuasa)
                                <h6 class="mb-0"><a class="text-success" target="_blank" href="{{asset($get_data->file_surat_kuasa)}}"><i>Lihat File</i></a></h6>
                                @else
                                <h6 class="mb-0 text-danger">Tidak Ada File</h6>
                                @endif
                            </center>
                        </div>
                        <div class="col-sm-2">
                            <center>
                                @if($get_data->file_surat_kuasa)
                                    @if($get_data->file_surat_kuasa_cek)
                                    <i data-toggle="tooltip" data-placement="top" title="File Terverivikasi" class="text-success fas fa-check"></i>
                                    @else
                                    <i data-toggle="tooltip" data-placement="top" title="File Belum Terverivikasi" class="fas fa-exclamation-triangle"></i>
                                    @endif
                                @endif
                            </center>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="">
                    <div class="row">
                        <div class="col-sm-8">
                            <label for="file_kontrak_kerja" class="mb-0">Surat perjanjian dokter hewan penanggung jawab (gudang berpendingin importir daging/susu/dsb, RPH, budidaya ternak) <i style="font-weight:bold">(Maks 1,5 mb) (pdf/jpg)</i>
                            </label>
                        </div>
                        <div class="col-sm-2">
                            <center>
                                @if($get_data->file_kontrak_kerja)
                                <h6 class="mb-0"><a class="text-success" target="_blank" href="{{asset($get_data->file_kontrak_kerja)}}"><i>Lihat File</i></a></h6>
                                @else
                                <h6 class="mb-0 text-danger">Tidak Ada File</h6>
                                @endif
                            </center>
                        </div>
                        <div class="col-sm-2">
                            <center>
                                @if($get_data->file_kontrak_kerja)
                                    @if($get_data->file_kontrak_kerja_cek)
                                    <i data-toggle="tooltip" data-placement="top" title="File Terverivikasi" class="text-success fas fa-check"></i>
                                    @else
                                    <i data-toggle="tooltip" data-placement="top" title="File Belum Terverivikasi" class="fas fa-exclamation-triangle"></i>
                                    @endif
                                @endif
                            </center>
                        </div>
                    </div>
                </div>
                @if($get_data->status==6)
                    @if($get_data->file_rekom)
                    <center>
                        <a class="mt-3 btn-success btn-sm btn-block" target="_blank" href="{{asset($get_data->file_rekom)}}"><i><i class="fas fa-download"></i> Download File Rekomendasi</i></a>
                    </center>
                    @endif
                @endif
                
                @if($get_data->boleh_edit)
                <div class="row mt-3">
                    <div class="btn-block-m col-md-6 col-sm-6 col-12 d-flex justify-content-start">
                        <a href="{{url('pengusaha/permohonannkv/edit')}}/{{$id}}" class="btn btn-primary me-1 mb-1">Edit</a>
                    </div>
                </div>
                @endif
        </div>
    </div>
    <!-- End of Main Content -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> -->
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
@endsection

@push('notif')
    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('warning'))
        <div class="alert alert-warning border-left-warning alert-dismissible fade show" role="alert">
            {{ session('warning') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
@endpush

@push('js')

@endpush

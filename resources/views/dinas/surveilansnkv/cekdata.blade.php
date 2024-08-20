@extends('admin.layouts.admin')
@section('title', $title ?? __('Blank Page'))
@section('main-content')
<link rel="stylesheet" href="{{asset('global/sweetalert2/sweetalert2.min.css')}}">
<link rel="stylesheet" href="{{asset('global/toastify-js/src/toastify.css')}}">
<style>
    .form-check {
        padding-left: 2.25rem;
    }
    .error{
            font-size: .875rem;
            line-height: 1.5;
        }
</style>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
                @if (session()->has('message'))
                    <div class="alert alert-warning">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="form-group">
                <div class="row">
                    <label class="col-sm-12">No.Permohonan</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="no_pengajuan" name="no_pengajuan"
                            placeholder="No.Permohonan" value="{{old('no_pengajuan', $get_data->no_pengajuan)}}" disabled>
                    </div>
                </div>
                </div>
                <h5 class="mt-4"><b>Data Perusahaan</b></h5>
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
                    <label class="col-sm-12">Jenis Unit Usaha Lainnya</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="jenis_unit_usaha_lainnya" name="jenis_unit_usaha_lainnya"
                            placeholder="Lainnya" value="{{old('jenis_unit_usaha_lainnya', $get_data->jenis_unit_usaha_lainnya)}}" disabled>
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

                <form id="form-data" class="form">

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
                                <input type="checkbox" class="form-check-input" name="file_ktp_cek" {{$get_data->file_ktp_cek ? "checked" : ""}}>        
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
                                <input type="checkbox" class="form-check-input" name="file_nib_cek" {{$get_data->file_nib_cek ? "checked" : ""}}>        
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
                                <input type="checkbox" class="form-check-input" name="file_surat_permohonan_perusahaan_cek" {{$get_data->file_surat_permohonan_perusahaan_cek ? "checked" : ""}}>        
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
                                <input type="checkbox" class="form-check-input" name="file_surat_keterangan_cek" {{$get_data->file_surat_keterangan_cek ? "checked" : ""}}>        
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
                                <input type="checkbox" class="form-check-input" name="file_bukti_kepemilikan_cek" {{$get_data->file_bukti_kepemilikan_cek ? "checked" : ""}}>        
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
                                <input type="checkbox" class="form-check-input" name="file_surat_keabsahan_cek" {{$get_data->file_surat_keabsahan_cek ? "checked" : ""}}>        
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
                                <input type="checkbox" class="form-check-input" name="file_surat_kuasa_cek" {{$get_data->file_surat_kuasa_cek ? "checked" : ""}}>        
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
                                <input type="checkbox" class="form-check-input" name="file_kontrak_kerja_cek" {{$get_data->file_kontrak_kerja_cek ? "checked" : ""}}>        
                            </center>
                        </div>
                    </div>
                </div>

                <hr>

                <input type="hidden" name="id_data" id="id_data" value="{{$id}}">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label for="status">Status<span class="text-danger">*</span></label>
                            <select class="type-select form-control" name="status" id="status">
                                <option value="">Pilih Status</option>
                                <option value="2" {{$get_data->status==2 ? "selected" : ""}}>Sedang Periksa</option>
                                <option value="3" {{$get_data->status==3 ? "selected" : ""}}>Belum Sesuai</option>
                                <option value="4" {{$get_data->status==4 ? "selected" : ""}}>Sesuai</option>
                            </select>
                            <span id="status-error" class="error invalid-feedback"></span>
                        </div>
                    </div>
                    <!-- <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label for="file_rekom">File Rekomendasi <i style="font-weight:bold">(Maks 1,5 mb) (pdf/jpg)</i></label>
                            <input type="file" class="type-text form-control" name="file_rekom" id="file_rekom" accept="image/jpg,image/jpeg,image/png,application/pdf"/>
                            <span id="file_rekom-error" class="error invalid-feedback"></span>
                            @if($get_data->file_rekom)
                            <h6 class="mb-0 mt-1"><a class="text-success" target="_blank" href="{{asset($get_data->file_rekom)}}"><i>Lihat File Sebelumnya</i></a></h6>
                            @endif
                        </div>
                    </div> -->
                    <div id="div_catatan" class="col-md-12 col-12 {{$get_data->status==3 ? '' : 'd-none'}}">
                        <div class="form-group">
                            <label for="catatan">Catatan</label>
                            <textarea class="type-text form-control" name="catatan" id="catatan" cols="30" rows="10" placeholder="File tidak sesuai / tidak bisa dibuka...">{{$get_data->catatan}}</textarea>
                            <span id="catatan-error" class="error invalid-feedback"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-12">
                        <span class="badge bg-light-warning mb-3">Bertanda <span class="text-danger">*</span> harus diisi!</span>
                    </div>
                    <div class="btn-block-m col-md-6 col-sm-6 col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                    </div>
                </div>
                </form>
        </div>
    </div>
    <!-- End of Main Content -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="{{asset('global/sweetalert2/sweetalert2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('global/toastify-js/src/toastify.js')}}"></script>
    <script type="text/javascript">
        $("#status").change(function(){
          this_status = $(this).val();
          if(this_status==3){
            $("#div_catatan").removeClass('d-none');
          }else{
            $("#div_catatan").addClass('d-none');
          }
        });
        $('#form-data').on('submit', e => {
            e.preventDefault();
            var formData = new FormData($('#form-data')[0]);
            // Ubah Link Store Data
            var url = "{{ url('dinas/surveilansnkv/ubahstatus') }}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: 'POST',
                dataType: "JSON",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $(".loading-full").fadeIn(1000);
                    $('.form-group').removeClass('is-invalid');
                    $('.form-group').children().removeClass('is-invalid');
                    $('.invalid-feedback').html("");
                },
                success: function(response) {
                    if (response.responsedata.status) {
                        Toastify({
                            escapeMarkup: false,
                            text: '<i class="bi bi-check-circle"></i> ' + response.responsedata.message,
                            duration: response.responsedata.duration,
                            stopOnFocus: true,
                            gravity: "top",
                            position: "right",
                            close: true,
                            className: "bg-" + response.responsedata.icon,
                            callback: () => {
                                window.location.href="{{url('dinas/surveilansnkv')}}";
                            }
                        }).showToast()
                    } else {
                        Toastify({
                            escapeMarkup: false,
                            text: response.responsedata.message,
                            duration: response.responsedata.duration,
                            stopOnFocus: true,
                            gravity: "top",
                            position: "right",
                            close: true,
                            className: "bg-" + response.responsedata.icon,
                        }).showToast()
                    }
                },
                error: function(xhr, status) {
                    let errMessage = xhr.responseJSON.message ?? xhr.responseJSON.meta.message;
                    errMessage = errMessage.toString();
                    errMessage = errMessage.replace("and", "dan");
                    errMessage = errMessage.replace("more", "kesalahan");
                    errMessage = errMessage.replace("errors", "lainnya");
                    errMessage = errMessage.replace("error", "lainnya");
                    Toastify({
                        escapeMarkup: false,
                        text: '<i class="bi bi-exclamation-circle"></i> ' + errMessage,
                        duration: 3000,
                        stopOnFocus: true,
                        gravity: "top",
                        position: "right",
                        close: true,
                        className: "bg-danger"
                    }).showToast();
                    var dataerrors = JSON.parse(xhr.responseText);
                    $no = 1;
                    $.each(dataerrors.errors, function(key, value) {
                        //   console.log(key)
                        //   console.log(value)
                        namaClass = $('#' + key).attr("class");
                        if (namaClass.indexOf("type-text") > -1) {
                            $('#' + key).addClass('is-invalid');
                            $('#' + key + '-error').html(value);
                            if ($no == 1) {
                                $('#' + key).focus();
                            }
                        }else if (namaClass.indexOf("type-select") > -1) {
                            $('#' + key).parent().addClass('is-invalid');
                            $('#' + key + '-error').html(value);
                            if ($no == 1) {
                                $('#' + key).focus();
                            }
                        }
                        $no++;
                    });
                    $(".loading-full").fadeOut(1000);
                },
                complete: function() {
                    $(".loading-full").fadeOut(1000);
                }
            });
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

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
            width:100% !important;
            display:block;
            font-size: 90%;
            color: #e74a3b;
        }
        .is-invalid .type-select{
            border:1px solid #e74a3b;
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
                <!-- <hr> -->
              
                <h5><b>Upload berkas peninjauan</b></h5>

                <form id="form-data" class="form">

                <hr>

                <input type="hidden" name="id_data" id="id_data" value="{{$id}}">
                <div class="form-group">
                <div class="row">
                    <label class="col-sm-12">No.Permohonan</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="no_pengajuan" name="no_pengajuan"
                            placeholder="No.Permohonan" value="{{old('no_pengajuan', $get_data->no_pengajuan)}}" disabled>
                    </div>
                </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label for="status">Status<span class="text-danger">*</span></label>
                            <select class="type-select form-control" name="status" id="status">
                                <!-- <option value="">Pilih Status</option> -->
                                @if($get_data->status==4)
                                <option value="5" {{$get_data->status==5 ? "selected" : ""}}>Penjadwalan</option>
                                @else
                                <option value="5" {{$get_data->status==5 ? "selected" : ""}}>Penjadwalan</option>
                                <option value="6" {{$get_data->status==6 ? "selected" : ""}}>Dalam Peninjauan</option>
                                <option value="7" {{$get_data->status==7 ? "selected" : ""}}>Selesai</option>
                                @endif
                            </select>
                            <span id="status-error" class="error invalid-feedback"></span>
                        </div>
                    </div>
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label for="file_surat_tugas_peninjauan_lapangan">File Surat Tugas Peninjauan Lapangan <i style="font-weight:bold">(Maks 1,5 mb) (pdf/jpg)</i></label>
                            <input type="file" class="type-text form-control" name="file_surat_tugas_peninjauan_lapangan" id="file_surat_tugas_peninjauan_lapangan" accept="image/jpg,image/jpeg,image/png,application/pdf"/>
                            <span id="file_surat_tugas_peninjauan_lapangan-error" class="error invalid-feedback"></span>
                            @if($get_data->file_surat_tugas_peninjauan_lapangan)
                            <h6 class="mb-0 mt-1"><a class="text-success" target="_blank" href="{{asset($get_data->file_surat_tugas_peninjauan_lapangan)}}"><i>Lihat File Sebelumnya</i></a></h6>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label for="file_berkas_hasil_tinjauan">File Berkas Hasil Tinjauan <i style="font-weight:bold">(Maks 1,5 mb) (pdf/jpg)</i></label>
                            <input type="file" class="type-text form-control" name="file_berkas_hasil_tinjauan" id="file_berkas_hasil_tinjauan" accept="image/jpg,image/jpeg,image/png,application/pdf"/>
                            <span id="file_berkas_hasil_tinjauan-error" class="error invalid-feedback"></span>
                            @if($get_data->file_berkas_hasil_tinjauan)
                            <h6 class="mb-0 mt-1"><a class="text-success" target="_blank" href="{{asset($get_data->file_berkas_hasil_tinjauan)}}"><i>Lihat File Sebelumnya</i></a></h6>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select class="type-select form-control" name="level" id="level">
                                <option value="">Pilih level</option>
                                <option value="1" {{$get_data->level==1 ? "selected" : ""}}>1</option>
                                <option value="2" {{$get_data->level==2 ? "selected" : ""}}>2</option>
                                <option value="3" {{$get_data->level==3 ? "selected" : ""}}>3</option>
                            </select>
                            <span id="level-error" class="error invalid-feedback"></span>
                        </div>
                    </div>
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label for="file_sertifikat_nkv">File Sertifikat NKV <i style="font-weight:bold">(Maks 1,5 mb) (pdf/jpg)</i></label>
                            <input type="file" class="type-text form-control" name="file_sertifikat_nkv" id="file_sertifikat_nkv" accept="image/jpg,image/jpeg,image/png,application/pdf"/>
                            <span id="file_sertifikat_nkv-error" class="error invalid-feedback"></span>
                            @if($get_data->file_sertifikat_nkv)
                            <h6 class="mb-0 mt-1"><a class="text-success" target="_blank" href="{{asset($get_data->file_sertifikat_nkv)}}"><i>Lihat File Sebelumnya</i></a></h6>
                            @endif
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
        $('#form-data').on('submit', e => {
            e.preventDefault();
            var formData = new FormData($('#form-data')[0]);
            // Ubah Link Store Data
            var url = "{{ url('dinas/surveilansnkv/ubahstatuspeninjauan') }}";
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

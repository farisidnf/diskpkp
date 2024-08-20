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
            @if ($errors->any())
                <div class="alert alert-danger border-left-danger" role="alert">
                    <ul class="pl-4 my-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form id="postForm" name="postForm" class="form-horizontal" action="{{route('pengusaha.surveilansnkv.update')}}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" id="id" value="{{$id}}">
                <div class="form-group">
                <div class="row">
                    <label class="col-sm-12"><span class="text-danger">*</span>No.Permohonan</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control"
                            placeholder="No.Permohonan" value="{{old('no_pengajuan', $get_data->no_pengajuan)}}" disabled>
                    </div>
                </div>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="type-select form-control" disabled>
                        <option value="">Pilih Status</option>
                        <option value="0" {{$get_data->status==0 ? "selected" : ""}}>Belum Mengajukan</option>
                        <option value="1" {{$get_data->status==1 ? "selected" : ""}}>Mengajukan</option>
                        <option value="2" {{$get_data->status==2 ? "selected" : ""}}>Sedang Periksa</option>
                        <option value="3" {{$get_data->status==3 ? "selected" : ""}}>Belum Sesuai</option>
                        <option value="4" {{$get_data->status==4 ? "selected" : ""}}>Sesuai</option>
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
                <hr>
                <h5><b>Data Perusahaan</b></h5>
                <hr>
                <div class="form-group">
                <div class="row">
                    <label class="col-sm-12"><span class="text-danger">*</span>Nama Perusahaan</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan"
                            placeholder="Nama Perusahaan" value="{{old('nama_perusahaan', $get_data->nama_perusahaan)}}" required>
                    </div>
                </div>
                </div>

                <div class="form-group">
                <div class="row">
                    <label class="col-sm-12"><span class="text-danger">*</span>Alamat Perusahaan</label>
                    <div class="col-sm-12">
                                <textarea required name="alamat_perusahaan" class="form-control" id="alamat_perusahaan" cols="30" rows="10" placeholder="Alamat Perusahaan">{{old('alamat_perusahaan', $get_data->alamat_perusahaan)}}</textarea>
                    </div>
                </div>
                </div>

                <div class="form-group">
                <div class="row">
                    <label class="col-sm-12"><span class="text-danger">*</span>Alamat Tempat Usaha</label>
                    <div class="col-sm-12">
                                <textarea required name="alamat_tempat_usaha" class="form-control" id="alamat_tempat_usaha" cols="30" rows="10" placeholder="Alamat Tempat Usaha">{{old('alamat_tempat_usaha', $get_data->alamat_tempat_usaha)}}</textarea>
                    </div>
                </div>
                </div>

                <div class="form-group">
                <div class="row">
                    <label class="col-sm-12"><span class="text-danger">*</span>Nama Pimpinan/Penanggung Jawab</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="nama_pimpinan" name="nama_pimpinan"
                            placeholder="Nama Pimpinan/Penanggung Jawab" value="{{old('nama_pimpinan', $get_data->nama_pimpinan)}}" required>
                    </div>
                </div>
                </div>

                <div class="form-group mb-1">
                    <div class="row">
                        <label class="col-sm-12">Jenis Unit usaha Produk Hewan</label>
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
                        <div class="col-sm-12 form-check">
                        <input type="checkbox" class="form-check-input" name="jenis_unit_usaha[]" value="{{$jenisunit->id}}" {{$checked}}>
                        <label class="form-check-label" for="check1">{{$jenisunit->nama}}</label>
                        </div>
                        @endforeach
                        <div class="col-sm-12 form-check">
                        <input type="checkbox" class="form-check-input" id="jenis_unit_usaha_laincek" name="jenis_unit_usaha_laincek" {{$get_data->jenis_unit_usaha_laincek ? "checked" : ""}}>
                        <label class="form-check-label" for="check1">Lainnya</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                <div class="row">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="jenis_unit_usaha_lainnya" name="jenis_unit_usaha_lainnya"
                            placeholder="Jenis Unit Usaha Lainnya" value="{{$get_data->jenis_unit_usaha_laincek ? $get_data->jenis_unit_usaha_lainnya : ''}}" {{$get_data->jenis_unit_usaha_laincek ? '' : 'readonly'}}>
                    </div>
                </div>
                </div>
                
                <div class="form-group">
                <div class="row">
                    <label class="col-sm-12"><span class="text-danger">*</span>Kontak Person</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="kontak_person" name="kontak_person"
                            placeholder="Kontak Person" value="{{old('kontak_person', $get_data->kontak_person)}}" required>
                    </div>
                </div>
                </div>

                <div class="form-group">
                <div class="row">
                    <label class="col-sm-12"><span class="text-danger">*</span>Nomor Handphone</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="nomor_hp" name="nomor_hp"
                            placeholder="Nomor Handphone" value="{{old('nomor_hp', $get_data->nomor_hp)}}" required>
                    </div>
                </div>
                </div>
                <h5 class="mt-5"><b>Upload Berkas</b></h5>
                <hr>
                <div class="form-group">
                    <div class="row">
                        <label for="file_ktp" class="col-sm-12">Kartu Tanda Penduduk Pimpinan/Penanggung Jawab Perusahaan <i style="font-weight:bold">(Maks 1,5 mb) (pdf/jpg)</i>
                        @if($get_data->file_ktp)
                        <h6 class="mb-0"><a target="_blank" href="{{asset($get_data->file_ktp)}}">Lihat File Sebelumnya</a></h6>
                        @endif
                        </label>
                        <div class="col-sm-12">
                            <input type="file" name="file_ktp" id="file_ktp" accept="image/jpg,image/jpeg,image/png,application/pdf" />
                        </div>
                    </div>
                </div>
                <hr>

                <div class="form-group">
                    <div class="row">
                        <label for="file_nib" class="col-sm-12">Nomor Induk Berusaha (NIB) <i style="font-weight:bold">(Maks 1,5 mb) (pdf/jpg)</i>
                        @if($get_data->file_nib)
                        <h6 class="mb-0"><a target="_blank" href="{{asset($get_data->file_nib)}}">Lihat File Sebelumnya</a></h6>
                        @endif
                        </label>
                        <div class="col-sm-12">
                            <input type="file" name="file_nib" id="file_nib" accept="image/jpg,image/jpeg,image/png,application/pdf" />
                        </div>
                    </div>
                </div>
                <hr>

                <div class="form-group">
                    <div class="row">
                        <label for="file_surat_permohonan_perusahaan" class="col-sm-12">Surat Permohonan dari Perusahaan <i style="font-weight:bold">(Maks 1,5 mb) (pdf/jpg)</i>
                        @if($get_data->file_surat_permohonan_perusahaan)
                        <h6 class="mb-0"><a target="_blank" href="{{asset($get_data->file_surat_permohonan_perusahaan)}}">Lihat File Sebelumnya</a></h6>
                        @endif
                        </label>
                        <div class="col-sm-12">
                            <input type="file" name="file_surat_permohonan_perusahaan" id="file_surat_permohonan_perusahaan" accept="image/jpg,image/jpeg,image/png,application/pdf" />
                        </div>
                    </div>
                </div>
                <hr>

                <!-- <div class="form-group">
                    <div class="row">
                        <label for="file_surat_keterangan" class="col-sm-12">Surat Keterangan Domisili Unit Usaha Produk Hewan <i style="font-weight:bold">(Maks 1,5 mb) (pdf/jpg)</i>
                        @if($get_data->file_surat_keterangan)
                        <h6 class="mb-0"><a target="_blank" href="{{asset($get_data->file_surat_keterangan)}}">Lihat File Sebelumnya</a></h6>
                        @endif
                        </label>
                        <div class="col-sm-12">
                            <input type="file" name="file_surat_keterangan" id="file_surat_keterangan" accept="image/jpg,image/jpeg,image/png,application/pdf" />
                        </div>
                    </div>
                </div>
                <hr> -->

                <div class="form-group">
                    <div class="row">
                        <label for="file_bukti_kepemilikan" class="col-sm-12">Bukti Kepemilikan unit usaha/bukti perjanjian sewa menyewa <i style="font-weight:bold">(Maks 1,5 mb) (pdf/jpg)</i>
                        @if($get_data->file_bukti_kepemilikan)
                        <h6 class="mb-0"><a target="_blank" href="{{asset($get_data->file_bukti_kepemilikan)}}">Lihat File Sebelumnya</a></h6>
                        @endif
                        </label>
                        <div class="col-sm-12">
                            <input type="file" name="file_bukti_kepemilikan" id="file_bukti_kepemilikan" accept="image/jpg,image/jpeg,image/png,application/pdf" />
                        </div>
                    </div>
                </div>
                <hr>

                <div class="form-group">
                    <div class="row">
                        <label for="file_surat_keabsahan" class="col-sm-12">Surat Pernyataan keabsahan dokumen (bermaterai) <i style="font-weight:bold">(Maks 1,5 mb) (pdf/jpg)</i>
                        @if($get_data->file_surat_keabsahan)
                        <h6 class="mb-0"><a target="_blank" href="{{asset($get_data->file_surat_keabsahan)}}">Lihat File Sebelumnya</a></h6>
                        @endif    
                        </label>
                        <div class="col-sm-12">
                            <input type="file" name="file_surat_keabsahan" id="file_surat_keabsahan" accept="image/jpg,image/jpeg,image/png,application/pdf" />
                        </div>
                    </div>
                </div>
                <hr>

                <div class="form-group">
                    <div class="row">
                        <label for="file_surat_kuasa" class="col-sm-12">Surat Kuasa bermaterai (bila diwakilkan oleh pihak lain) <i style="font-weight:bold">(Maks 1,5 mb) (pdf/jpg)</i>
                        @if($get_data->file_surat_kuasa)
                        <h6 class="mb-0"><a target="_blank" href="{{asset($get_data->file_surat_kuasa)}}">Lihat File Sebelumnya</a></h6>
                        @endif
                        </label>
                        <div class="col-sm-12">
                            <input type="file" name="file_surat_kuasa" id="file_surat_kuasa" accept="image/jpg,image/jpeg,image/png,application/pdf"/>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="form-group">
                    <div class="row">
                        <label for="file_kontrak_kerja" class="col-sm-12">Surat perjanjian dokter hewan penanggung jawab (gudang berpendingin importir daging/susu/dsb, RPH, budidaya ternak) <i style="font-weight:bold">(Maks 1,5 mb) (pdf/jpg)</i>
                        @if($get_data->file_kontrak_kerja)
                        <h6 class="mb-0"><a target="_blank" href="{{asset($get_data->file_kontrak_kerja)}}">Lihat File Sebelumnya</a></h6>
                        @endif
                        </label>
                        <div class="col-sm-12">
                            <input type="file" name="file_kontrak_kerja" id="file_kontrak_kerja" accept="image/jpg,image/jpeg,image/png,application/pdf" />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <!-- <a type="button" class="btn btn-secondary" href="{{route('pengusaha.surveilansnkv')}}"
                       data-dismiss="modal">Batal</a> -->
                    <button type="submit" class="btn btn-primary" id="savedata" value="create">Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- End of Main Content -->
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
<script>
    $(document).ready(function() {
        $('#jenis_unit_usaha_laincek').change(function() {
            if(this.checked) {
                $("#jenis_unit_usaha_lainnya").removeAttr("readonly");
            } else{
                $("#jenis_unit_usaha_lainnya").val("");
                $("#jenis_unit_usaha_lainnya").attr("readonly","readonly");
            }     
        });
    });
</script>

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script type="text/javascript">
    var path = "{{ url('autocomplete') }}";
    $( "#nama_perusahaan" ).autocomplete({
        source: function( request, response ) {
          $.ajax({
            url: path,
            type: 'GET',
            dataType: "json",
            data: {
               search: request.term,
               model: "SurveilansNkv",
               field: "nama_perusahaan"
            },
            success: function( data ) {
               response( data );
            }
          });
        },
        select: function (event, ui) {
           $('#nama_perusahaan').val(ui.item.label);
        //    console.log(ui.item); 
           return false;
        }
      });

      $( "#alamat_perusahaan").autocomplete({
        source: function( request, response ) {
          $.ajax({
            url: path,
            type: 'GET',
            dataType: "json",
            data: {
               search: request.term,
               model: "SurveilansNkv",
               field: "alamat_perusahaan"
            },
            success: function( data ) {
               response( data );
            }
          });
        },
        select: function (event, ui) {
           $('#alamat_perusahaan').val(ui.item.label);
        //    console.log(ui.item); 
           return false;
        }
      });

      $( "#alamat_tempat_usaha").autocomplete({
        source: function( request, response ) {
          $.ajax({
            url: path,
            type: 'GET',
            dataType: "json",
            data: {
               search: request.term,
               model: "SurveilansNkv",
               field: "alamat_tempat_usaha"
            },
            success: function( data ) {
               response( data );
            }
          });
        },
        select: function (event, ui) {
           $('#alamat_tempat_usaha').val(ui.item.label);
        //    console.log(ui.item); 
           return false;
        }
      });

      $( "#nama_pimpinan").autocomplete({
        source: function( request, response ) {
          $.ajax({
            url: path,
            type: 'GET',
            dataType: "json",
            data: {
               search: request.term,
               model: "SurveilansNkv",
               field: "nama_pimpinan"
            },
            success: function( data ) {
               response( data );
            }
          });
        },
        select: function (event, ui) {
           $('#nama_pimpinan').val(ui.item.label);
        //    console.log(ui.item); 
           return false;
        }
      });
</script>
@endpush

@extends('admin.layouts.admin')
@section('title', $title ?? __('Blank Page'))
@push('css')
<link href="{{ asset('css/admin/custom.css') }}" rel="stylesheet">
@endpush
@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">

        
<div class="container">
  <div class="panel">
    <div class="panel-body wizard-content">
        <form id="example-form" action="{{route('pengusaha.surveilansnkv.store')}}" method="POST" enctype="multipart/form-data" class="form-horizontal tab-wizard wizard-circle wizard clearfix">
          @csrf
          <h6>Isi Data</h6>
          <section>
            <br/>
            @if ($errors->any())
                <div class="alert alert-danger border-left-danger" role="alert">
                    <ul class="pl-4 my-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Form Data -->
            <input type="hidden" name="id" id="id">

            <h5><b>Data Perusahaan</b></h5>
            <hr>
            @if($datareff)
            <div class="form-group">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="form-group">
                        <label>No.Reff<span class="text-danger">*</span></label>
                        <select class="type-select form-control" disabled>
                            <option value="{{$datareff->id}}">{{$datareff->no_pengajuan}}</option>
                        </select>
                    </div>
                </div>
            </div>
            </div>
            <input type="hidden" name="fk_surveilans_nkv_perpanjang" id="fk_surveilans_nkv_perpanjang" value="{{base64_encode($datareff->id)}}">
            @endif

            <div class="form-group">
            <div class="row">
                <label class="col-sm-12"><span class="text-danger">*</span>Nama Perusahaan</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan"
                        placeholder="Nama Perusahaan" value="{{ old('nama_perusahaan')}}" required>
                </div>
            </div>
            </div>

            <div class="form-group">
            <div class="row">
                <label class="col-sm-12"><span class="text-danger">*</span>Alamat Perusahaan</label>
                <div class="col-sm-12">
                            <textarea required name="alamat_perusahaan" class="form-control" id="alamat_perusahaan" cols="30" rows="10" placeholder="Alamat Perusahaan">{{ old('alamat_perusahaan')}}</textarea>
                </div>
            </div>
            </div>

            <div class="form-group">
            <div class="row">
                <label class="col-sm-12"><span class="text-danger">*</span>Alamat Tempat Usaha</label>
                <div class="col-sm-12">
                            <textarea required name="alamat_tempat_usaha" class="form-control" id="alamat_tempat_usaha" cols="30" rows="10" placeholder="Alamat Tempat Usaha">{{ old('alamat_tempat_usaha')}}</textarea>
                </div>
            </div>
            </div>

            <div class="form-group">
            <div class="row">
                <label class="col-sm-12"><span class="text-danger">*</span>Nama Pimpinan/Penanggung Jawab</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="nama_pimpinan" name="nama_pimpinan"
                        placeholder="Nama Pimpinan/Penanggung Jawab" value="{{ old('nama_pimpinan')}}" required>
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
                            @if(old('jenis_unit_usaha'))
                                @foreach(old('jenis_unit_usaha') as $datajenisunit)
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
                <input type="checkbox" class="form-check-input" id="jenis_unit_usaha_laincek" name="jenis_unit_usaha_laincek" {{old('jenis_unit_usaha_laincek') ? "checked" : ""}}>
                <label class="form-check-label" for="check1">Lainnya</label>
                </div>
            </div>
            </div>

            <div class="form-group">
            <div class="row">
                <!-- <label class="col-sm-12">Lainnya</label> -->
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="jenis_unit_usaha_lainnya" name="jenis_unit_usaha_lainnya"
                        placeholder="Jenis Unit Usaha Lainnya" value="{{ old('jenis_unit_usaha_laincek') ? old('jenis_unit_usaha_lainnya') : ''}}" {{old('jenis_unit_usaha_laincek') ? "" : "readonly"}}>
                </div>
            </div>
            </div>

            <div class="form-group">
            <div class="row">
                <label class="col-sm-12"><span class="text-danger">*</span>Kontak Person</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="kontak_person" name="kontak_person"
                        placeholder="Kontak Person" value="{{ old('kontak_person')}}" required>
                </div>
            </div>
            </div>

            <div class="form-group">
            <div class="row">
                <label class="col-sm-12"><span class="text-danger">*</span>Nomor Handphone</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="nomor_hp" name="nomor_hp"
                        placeholder="Nomor Handphone" value="{{ old('nomor_hp')}}" required>
                </div>
            </div>
            </div>
            <h5 class="mt-5"><b>Upload Berkas</b></h5>
            <hr>
            <div class="form-group">
            <div class="row">
                <label for="file_ktp" class="col-sm-12"><span class="text-danger">*</span>Kartu Tanda Penduduk Pimpinan/Penanggung Jawab Perusahaan <i style="font-weight:bold">(Maks 1,5 mb) (pdf/jpg)</i></label>
                <div class="col-sm-12">
                    <input type="file" name="file_ktp" id="file_ktp" accept="image/jpg,image/jpeg,image/png,application/pdf" required/>
                </div>
            </div>
            </div>

            <div class="form-group">
            <div class="row">
                <label for="file_nib" class="col-sm-12"><span class="text-danger">*</span>Nomor Induk Berusaha (NIB) <i style="font-weight:bold">(Maks 1,5 mb) (pdf/jpg)</i></label>
                <div class="col-sm-12">
                    <input type="file" name="file_nib" id="file_nib" accept="image/jpg,image/jpeg,image/png,application/pdf" required/>
                </div>
            </div>
            </div>

            <div class="form-group">
            <div class="row">
                <label for="file_surat_permohonan_perusahaan" class="col-sm-12"><span class="text-danger">*</span>Surat Permohonan dari Perusahaan <i style="font-weight:bold">(Maks 1,5 mb) (pdf/jpg)</i></label>
                <div class="col-sm-12">
                    <input type="file" name="file_surat_permohonan_perusahaan" id="file_surat_permohonan_perusahaan" accept="image/jpg,image/jpeg,image/png,application/pdf" required/>
                </div>
            </div>
            </div>

            <!-- <div class="form-group">
            <div class="row">
                <label for="file_surat_keterangan" class="col-sm-12"><span class="text-danger">*</span>Surat Keterangan Domisili Unit Usaha Produk Hewan <i style="font-weight:bold">(Maks 1,5 mb) (pdf/jpg)</i></label>
                <div class="col-sm-12">
                    <input type="file" name="file_surat_keterangan" id="file_surat_keterangan" accept="image/jpg,image/jpeg,image/png,application/pdf" required/>
                </div>
            </div>
            </div> -->

            <div class="form-group">
            <div class="row">
                <label for="file_bukti_kepemilikan" class="col-sm-12"><span class="text-danger">*</span>Bukti Kepemilikan unit usaha/bukti perjanjian sewa menyewa <i style="font-weight:bold">(Maks 1,5 mb) (pdf/jpg)</i></label>
                <div class="col-sm-12">
                    <input type="file" name="file_bukti_kepemilikan" id="file_bukti_kepemilikan" accept="image/jpg,image/jpeg,image/png,application/pdf" required/>
                </div>
            </div>
            </div>

            <div class="form-group">
            <div class="row">
                <label for="file_surat_keabsahan" class="col-sm-12"><span class="text-danger">*</span>Surat Pernyataan keabsahan dokumen (bermaterai) <i style="font-weight:bold">(Maks 1,5 mb) (pdf/jpg)</i></label>
                <div class="col-sm-12">
                    <input type="file" name="file_surat_keabsahan" id="file_surat_keabsahan" accept="image/jpg,image/jpeg,image/png,application/pdf" required/>
                </div>
            </div>
            </div>

            <div class="form-group">
            <div class="row">
                <label for="file_surat_kuasa" class="col-sm-12">Surat Kuasa bermaterai (bila diwakilkan oleh pihak lain) <i style="font-weight:bold">(Maks 1,5 mb) (pdf/jpg)</i></label>
                <div class="col-sm-12">
                    <input type="file" name="file_surat_kuasa" id="file_surat_kuasa" accept="image/jpg,image/jpeg,image/png,application/pdf"/>
                </div>
            </div>
            </div>

            <div class="form-group">
            <div class="row">
                <label for="file_kontrak_kerja" class="col-sm-12">Surat perjanjian dokter hewan penanggung jawab (gudang berpendingin importir daging/susu/dsb, RPH, budidaya ternak) <i style="font-weight:bold">(Maks 1,5 mb) (pdf/jpg)</i></label>
                <div class="col-sm-12">
                    <input type="file" name="file_kontrak_kerja" id="file_kontrak_kerja" accept="image/jpg,image/jpeg,image/png,application/pdf"/>
                </div>
            </div>
            </div>

            <button type="submit" class="btn btn-primary d-none" id="savedata" value="create">Simpan
            </button>
            <!-- Akhir Form Data -->
          </section>
        </form>
      </div>
  </div>
</div>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
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
    var form = $("#example-form");
    var starStep = 0;
    $("#example-form").steps({
      startIndex: starStep,
      headerTag: "h6",
      bodyTag: "section",
      transitionEffect: "fade",
      titleTemplate: '<span class="step">#index#</span> #title#',
      labels: {
          next: "Selanjutnya",
          previous: "Sebelumnya",
          loading: "Loading...",
          finish: "Simpan",
      },
      onFinished: function (event, currentIndex) {
            $('#savedata').trigger('click');
      }
    }
    );
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

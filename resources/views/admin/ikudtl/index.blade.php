@extends('admin.layouts.admin')
@section('title', $title ?? __('Blank Page'))

@section('main-content')
    <link rel="stylesheet" href="{{asset('global/sweetalert2/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('global/toastify-js/src/toastify.css')}}">
    <style>
        .error{
            color:#e74a3b;
        }
        .table td {
            vertical-align: middle;
        }
        .table th{
            vertical-align: middle !important;
            text-align: center;
            white-space: nowrap;
            border: 1px solid #e6edf4;
            font-weight: bold;
        }
        .table .hiddenRow{
            padding: 0;
        }
    </style>

    <!-- Page Heading -->
    <center>
        <h1 class="font-weight-bold mt-5 h3 mb-3 text-gray-800">
            Capaian Indikator Kinerja Utama (IKU) Tahun {{ $ikumst->tahun }}
            <br>
            {{ $ikumst->judul }}
        </h1>
    </center>

    <!-- Main Content goes here -->

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    
    <div class="card">
        <div class="card-body">
            
            @if(Auth::user()->role == 'admin')
            <button class="btn btn-primary mb-3" onclick="createTujuan('{{$ikumst->id}}')">Tambah Indikator Tujuan Baru</button>
            @endif

            <div class="table-responsive">
		    <table class="table table-condensed table-bordered">
                <thead>
                    <tr>
                        <th rowspan="2">#</th>
                        <th rowspan="2">No</th>
                        <th rowspan="2">Indikator Tujuan</th>
                        <th rowspan="2">No</th>
                        <th rowspan="2">Indikator Sasaran</th>
                        <th rowspan="2">Satuan</th>
                        <th rowspan="2">Kondisi Awal</th>
                        <th colspan="2">TRIWULAN I</th>
                        <th colspan="2">TRIWULAN II</th>
                        <th colspan="2">TRIWULAN III</th>
                        <th colspan="2">TRIWULAN IV</th>
                        <th colspan="3">TAHUNAN</th>
                        <th rowspan="2">Keterangan</th>
                        <th rowspan="2">Bukti Dukung</th>
                        <th rowspan="2">Link Bukti Dukung</th>
                        <th rowspan="2">Evaluasi</th>
                        <th rowspan="2">Faktor Pendorong</th>
                        <th rowspan="2">Faktor Penghambat</th>
                        <th rowspan="2">Bidang</th>
                    </tr>
                    <tr>
                        <th>Target</th>
                        <th>Realisasi</th>
                        <th>Target</th>
                        <th>Realisasi</th>
                        <th>Target</th>
                        <th>Realisasi</th>
                        <th>Target</th>
                        <th>Realisasi</th>
                        <th>Target</th>
                        <th>Realisasi</th>
                        <th>Capaian</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        if(Auth::user()->role == 'admin'){
                            $tujuans = $ikumst->tujuan_r; 
                        }else{
                            $tujuans = $ikumst->tujuan_bidang_r; 
                        }
                    @endphp
                    @foreach($tujuans as $tujuan)
                    <tr class="table-info">
                        <td>
                           <div class="btn-group">
                                <span data-toggle="tooltip" data-placement="top" title="Lihat Indikator Sasaran">
                                    <button data-toggle="collapse" data-target=".collapse_tujuan_{{$tujuan->id}}" class="accordion-toggle btn btn-success btn-sm"><i class="fas fa-eye"></i></button>
                                </span>
                                @if(Auth::user()->role == 'admin')
                                <span data-toggle="tooltip" data-placement="top" title="Tambah Indikator Sasaran">
                                    <button onclick="createSasaran('{{$tujuan->id}}')" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></button>
                                </span>
                                <span data-toggle="tooltip" data-placement="top" title="Edit Data">
                                    <button onclick="editTujuan('{{$tujuan->id}}')" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                </span>
                                <span data-toggle="tooltip" data-placement="top" title="Hapus Data">
                                    <button data-id="{{base64_encode($tujuan->id)}}" class="deleteTujuan btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                </span>
                                @else
                                <span data-toggle="tooltip" data-placement="top" title="Update Data">
                                    <button onclick="editTujuanUser('{{$tujuan->id}}')" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                </span>
                                @endif
                            </div>
                        </td>
                        <td>1</td>
                        <td>{{$tujuan->judul}}</td>
                        <td></td>
                        <td></td>
                        <td class="text-center">{{$tujuan->satuan_r->nama}}</td>
                        <td class="text-right">{{editRupiah($tujuan->kondisi_awal)}}</td>
                        <td class="text-right">{{editRupiah($tujuan->target_triwulan_1)}}</td>
                        <td class="text-right">{{editRupiah($tujuan->realisasi_triwulan_1)}}</td>
                        <td class="text-right">{{editRupiah($tujuan->target_triwulan_2)}}</td>
                        <td class="text-right">{{editRupiah($tujuan->realisasi_triwulan_2)}}</td>
                        <td class="text-right">{{editRupiah($tujuan->target_triwulan_3)}}</td>
                        <td class="text-right">{{editRupiah($tujuan->realisasi_triwulan_3)}}</td>
                        <td class="text-right">{{editRupiah($tujuan->target_triwulan_4)}}</td>
                        <td class="text-right">{{editRupiah($tujuan->realisasi_triwulan_4)}}</td>
                        <td class="text-right">{{editRupiah($tujuan->target_tahunan)}}</td>
                        <td class="text-right">{{editRupiah($tujuan->realisasi_tahunan)}}</td>
                        <td class="text-right"><b>{{editRupiah($tujuan->capaian_tahunan)}}</b></td>
                        <td>{{$tujuan->keterangan}}</td>
                        <td>{{$tujuan->bukti_dukung}}</td>
                        <td class="text-center">@if($tujuan->link_bukti_dukung)<a target="_blank" href="{{$tujuan->link_bukti_dukung}}">Lihat</a>@endif</td>
                        <td>{{$tujuan->evaluasi}}</td>
                        <td>{{$tujuan->faktor_pendorong}}</td>
                        <td>{{$tujuan->faktor_penghambat}}</td>
                        <td class="text-center">{{$tujuan->bidang_r->nama}}</td>
                    </tr>
                    @foreach($tujuan->sasaran_r as $sasaran)
                    <tr class="accordian-body collapse show collapse_tujuan_{{$tujuan->id}}">
                        <td class="text-right">
                            <div class="btn-group">
                                @if(Auth::user()->role == 'admin')
                                <span data-toggle="tooltip" data-placement="top" title="Edit Data">
                                    <button onclick="editSasaran('{{$sasaran->id}}')" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                </span>
                                <span data-toggle="tooltip" data-placement="top" title="Hapus Data">
                                    <button data-id="{{base64_encode($sasaran->id)}}" class="deleteSasaran btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                </span>
                                @else
                                <span data-toggle="tooltip" data-placement="top" title="Update Data">
                                    <button onclick="editSasaranUser('{{$sasaran->id}}')" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                </span>
                                @endif
                            </div>
                        </td>
                        <td></td>
                        <td></td>
                        <td>1</td>
                        <td>{{$sasaran->judul}}</td>
                        <td class="text-center">{{$sasaran->satuan_r->nama}}</td>
                        <td class="text-right">{{editRupiah($sasaran->kondisi_awal)}}</td>
                        <td class="text-right">{{editRupiah($sasaran->target_triwulan_1)}}</td>
                        <td class="text-right">{{editRupiah($sasaran->realisasi_triwulan_1)}}</td>
                        <td class="text-right">{{editRupiah($sasaran->target_triwulan_2)}}</td>
                        <td class="text-right">{{editRupiah($sasaran->realisasi_triwulan_2)}}</td>
                        <td class="text-right">{{editRupiah($sasaran->target_triwulan_3)}}</td>
                        <td class="text-right">{{editRupiah($sasaran->realisasi_triwulan_3)}}</td>
                        <td class="text-right">{{editRupiah($sasaran->target_triwulan_4)}}</td>
                        <td class="text-right">{{editRupiah($sasaran->realisasi_triwulan_4)}}</td>
                        <td class="text-right">{{editRupiah($sasaran->target_tahunan)}}</td>
                        <td class="text-right">{{editRupiah($sasaran->realisasi_tahunan)}}</td>
                        <td class="text-right"><b>{{editRupiah($sasaran->capaian_tahunan)}}</b></td>
                        <td>{{$sasaran->keterangan}}</td>
                        <td>{{$sasaran->bukti_dukung}}</td>
                        <td class="text-center">@if($sasaran->link_bukti_dukung)<a target="_blank" href="{{$sasaran->link_bukti_dukung}}">Lihat</a>@endif</td>
                        <td>{{$sasaran->evaluasi}}</td>
                        <td>{{$sasaran->faktor_pendorong}}</td>
                        <td>{{$sasaran->faktor_penghambat}}</td>
                        <td></td>
                    </tr>
                    @endforeach
                    <!-- <tr>
                        <td colspan="2"></td>
                        <td colspan="20" class="hiddenRow">
                            <div class="accordian-body collapse" id="tujuan_{{$tujuan->id}}">
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="info">
                                            <th>#</th>
                                            <th>Indikator Sasaran</th>
                                            <th>Satuan</th>
                                            <th>Kondisi Awal</th>
                                            <th>Target</th>
                                            <th>Indikator Sasaran</th>
                                            <th>Satuan</th>
                                            <th>Kondisi Awal</th>
                                            <th>Target</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>U$8.00000 </td>
                                            <td> 2016/09/27</td>
                                            <td> 2017/09/27</td>
                                            <td>
                                               asd
                                            </td>
                                            <td>U$8.00000 </td>
                                            <td> 2016/09/27</td>
                                            <td> 2017/09/27</td>
                                            <td>
                                               asd
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr> -->
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>


      <!-- The Modal-->
  <div class="modal fade" id="modalIkuDtl">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            

            </div>
        </div>
    </div>
    
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
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="{{asset('global/sweetalert2/sweetalert2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('global/toastify-js/src/toastify.js')}}"></script>  
    <script type="text/javascript" src="{{asset('js/admin/custom.js')}}"></script>  
    <script type="text/javascript">
        $(document).ready(function() {
            $('body').on('click', '.deleteTujuan', function () {

            var id = $(this).data("id");

            if (confirm("Are You sure want to delete this data?")) {
                $.ajax({
                    type: "DELETE",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('deletetujuan') }}" + '/' + id,
                    success: function (data) {
                        alert(data.text);
                        window.location.reload();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });

            }
            });

            $('body').on('click', '.deleteSasaran', function () {

                var id = $(this).data("id");

                if (confirm("Are You sure want to delete this data?")) {
                    $.ajax({
                        type: "DELETE",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ url('deletesasaran') }}" + '/' + id,
                        success: function (data) {
                            alert(data.text);
                            window.location.reload();
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });

                }
            });
        });

        createTujuan = (ikumst_id) => {
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{
                        ikumst_id : ikumst_id
                    },
                    url: "{{ url('createtujuan') }}",
                    beforeSend: function() {
                        $(".loading-full").show();
                    },
                    success: function (data) {
                        $("#modalIkuDtl .modal-content").html(data['modal_content']);
                        $("#modalIkuDtl").modal('show');
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $(".loading-full").hide();
                    },
                    complete: function() {
                        $(".loading-full").hide();
                    }
                });
        };

        createSasaran = (tujuan_id) => {
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{
                        tujuan_id : tujuan_id
                    },
                    url: "{{ url('createsasaran') }}",
                    beforeSend: function() {
                        $(".loading-full").show();
                    },
                    success: function (data) {
                        $("#modalIkuDtl .modal-content").html(data['modal_content']);
                        $("#modalIkuDtl").modal('show');
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $(".loading-full").hide();
                    },
                    complete: function() {
                        $(".loading-full").hide();
                    }
                });
        };

        editTujuan = (tujuan_id) => {
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{
                        tujuan_id : tujuan_id
                    },
                    url: "{{ url('edittujuan') }}",
                    beforeSend: function() {
                        $(".loading-full").show();
                    },
                    success: function (data) {
                        $("#modalIkuDtl .modal-content").html(data['modal_content']);
                        $("#modalIkuDtl").modal('show');
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $(".loading-full").hide();
                    },
                    complete: function() {
                        $(".loading-full").hide();
                    }
                });
        };

        editTujuanUser = (tujuan_id) => {
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{
                        tujuan_id : tujuan_id
                    },
                    url: "{{ url('edittujuan-user') }}",
                    beforeSend: function() {
                        $(".loading-full").show();
                    },
                    success: function (data) {
                        $("#modalIkuDtl .modal-content").html(data['modal_content']);
                        $("#modalIkuDtl").modal('show');
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $(".loading-full").hide();
                    },
                    complete: function() {
                        $(".loading-full").hide();
                    }
                });
        };

        editSasaran = (sasaran_id) => {
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{
                        sasaran_id : sasaran_id
                    },
                    url: "{{ url('editsasaran') }}",
                    beforeSend: function() {
                        $(".loading-full").show();
                    },
                    success: function (data) {
                        $("#modalIkuDtl .modal-content").html(data['modal_content']);
                        $("#modalIkuDtl").modal('show');
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $(".loading-full").hide();
                    },
                    complete: function() {
                        $(".loading-full").hide();
                    }
                });
        };

        editSasaranUser = (sasaran_id) => {
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{
                        sasaran_id : sasaran_id
                    },
                    url: "{{ url('editsasaran-user') }}",
                    beforeSend: function() {
                        $(".loading-full").show();
                    },
                    success: function (data) {
                        $("#modalIkuDtl .modal-content").html(data['modal_content']);
                        $("#modalIkuDtl").modal('show');
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $(".loading-full").hide();
                    },
                    complete: function() {
                        $(".loading-full").hide();
                    }
                });
        };
        
</script>
@endpush

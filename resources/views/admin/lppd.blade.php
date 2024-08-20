@extends('admin.layouts.admin')
@section('title', $title ?? __('Blank Page'))

@section('main-content')

    <section class="section">
        <div class="section-header">
            <h1>Laporan Penyelenggaraan Pemerintahan Daerah kepada Pemerintah @if (Auth::user()->role == 'user')
                    - Bidang {{ Auth::user()->bidang }}
                @endif
            </h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-options">
                            @if (Auth::user()->role == 'admin')
                                <a href="{{route('admin.lppd.create')}}" class="btn btn-sm btn-pill btn-primary">Tambah
                                    Data Baru
                                </a>
                            @endif
                            <span style="margin-left:20px;"> Filter : </span>
                            <select name="filtertahun" style="margin-left:20px;" id="filtertahun">

                                @for ($i = 2020; $i < 2027; $i++)
                                    :
                                    <option {{ $i == date('Y') ? 'selected' : '' }} value="{{ $i }}">
                                        {{ $i }}</option>
                                @endfor
                            </select>

                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-icon alert-success alert-dismissible" role="alert">
                                <i class="fe fe-check mr-2" aria-hidden="true"></i>
                                <button type="button" class="close" data-dismiss="alert"></button>
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="form-group col-4">


                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table data-table  table-bordered dt-responsive nowrap table-striped align-middle  no-footer dtr-inline">
                                <thead>
                                <tr>
                                    <th>No</th>

                                    <th>T.Update</th>
                                    <th>Nama data</th>
                                    <th>Status</th>
                                        <th width="140px">Tindakan</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>


    <div class="modal fade" id="ajaxModelexa" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">

                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>

                    <form id="postForm" name="postForm" class="form-horizontal">
                        <input type="hidden" name="id" id="id">


                        @if (Auth::user()->role == 'admin')
                            <div class="form-group">
                                <label for="criteria" class="col-sm-12">Pilih Tahun</label>
                                <div class="col-sm-12">
                                    <select name="tahun" class="form-control" id="tahun">

                                        @for ($i = 2018; $i < 2029; $i++)
                                            :
                                            <option {{ $i == date('Y') ? 'selected' : '' }} value="{{ $i }}">
                                                {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="bulan" class="col-sm-12">Pilih Bulan</label>
                                <div class="col-sm-12">
                                    <select name="bulan" class="form-control" id="bulan">
                                        @foreach (range(1, 12) as $bulan)
                                            @php
                                                $bulanFormat = str_pad($bulan, 2, '0', STR_PAD_LEFT);
                                                $namaBulan = \Carbon\Carbon::create(2000, $bulan, 1)->format('F');
                                            @endphp
                                            <option {{ $bulanFormat == date('m') ? 'selected' : '' }}
                                                    value="{{ $bulanFormat }}">{{ $namaBulan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="criteria" class="col-sm-12">Nama <span style="color:brown;"></span></label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="nama" name="nama"
                                           placeholder="Nama" value="" required>
                                </div>
                            </div>


                            <div class="form-group" style="display:none;">
                                <label for="" class="col-sm-12">Sifat data </label>
                                <div class="col-sm-12">
                                    <select name="sifat_data" id="sifat_data" class="form-control" style="width:350px;">
                                        <option value="Public">Public</option>
                                        <option value="Pribadi">Pribadi</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="criteria" class="col-sm-12">Bidang</label>

                                <div class="col-sm-12">
                                    <select name="bidang" id="bidang" class="form-control">
                                        <option value="">Pilih Bidang</option>
                                        <option value="kelautan">Kelautan</option>
                                        <option value="pangan">Pangan</option>
                                        <option value="perikanan">Perikanan</option>
                                        <option value="pertanian">Pertanian</option>
                                        <option value="peternakan">Peternakan</option>
                                    </select>
                                </div>
                            </div>
                        @endif


                        <div {!! Auth::user()->role == 'user' ? 'style="display:none;"' : '' !!}">
                        <div class="form-group" id="formStatus">
                            <label for="criteria" class="col-sm-12">Status</label>
                            <div class="col-sm-12">
                                <select name="status" id="status" class="form-control">
                                    <option value="Menunggu Periksa">Menunggu Periksa</option>
                                    <option value="Sedang Periksa">Sedang Periksa</option>
                                    <option value="Ada Kesalahan">Ada Kesalahan</option>
                                    <option value="Selesai">Selesai</option>
                                </select>
                            </div>
                        </div>
                </div>

                <div class="form-group">
                    <label for="criteria" class="col-sm-12">Upload (Maks 1,5 mb)</label>
                    <div class="col-sm-12">
                        <input type="file" name="upload_file" id="upload_file"/>
                    </div>
                </div>

                <div class="form-group">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="savedata" value="create">Simpan
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,


            'ajax': {
                'url': '{{ route('admin.lppd.index') }}',
                'data': function (data) {
                    data.tahun = $("#filtertahun").val();
                    data.bulan = $("#filterbulan").val();
                    data.data_triwulan = $("#filter_data_triwulan").val();
                    data.data_bidang = $("#filterbidang").val();
                }
            },


            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },

                {
                    data: 'updated_at',
                    name: 'updated_at'
                },


                {
                    data: 'nama',
                    name: 'nama'
                },


                {
                    data: 'status',
                    name: 'status'
                },

                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });


        $("#filtertahun").change(function () {
            table.draw();
        });

        $("#filterbulan").change(function () {
            table.draw();
        });

        $("#filter_data_triwulan").change(function () {
            table.draw();
        });

        $("#filterbidang").change(function () {
            table.draw();
        });

        $('#createNewPost').click(function () {
            $('#savedata').val("create-post");
            // $("#formStatus").hide();
            $('#id').val('');
            $('#postForm').trigger("reset");
            $('#modelHeading').html("FORM SATU DATA INDONESIA");
            $('#ajaxModelexa').modal('show');
        });

        $('body').on('click', '.editPost', function () {
            var id = $(this).data('id');

            // $("#formStatus").show();

            $.get("{{ route('admin.sdi.index') }}" + '/' + id + '/edit', function (data) {
                $('#modelHeading').html("FORM EDIT SATU DATA INDONESIA");
                $('#savedata').val("edit-user");
                $('#ajaxModelexa').modal('show');
                $('#id').val(data.id);
                // $('#tampilkan').val(data.tampilkan);
                $('#status').val(data.status);
                $('#sifat_data').val(data.sifat_data);
                $('#tahun').val(data.tahun);
                $('#nama').val(data.nama);

                @if (Auth::user()->role == 'admin')
                $('#bidang').val(data.bidang);
                @endif
            })
        });

        $('#savedata').click(function (e) {
            e.preventDefault();
            var form = $('#postForm')[0];
            var formData = new FormData(form);
            $.ajax({
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('admin.sdi.store') }}",
                type: "POST",
                processData: false,
                contentType: false,
                success: function (data) {


                    if ($.isEmptyObject(data.error)) {
                        $('#postForm').trigger("reset");
                        $('#ajaxModelexa').modal('hide');
                        table.draw();
                    } else {
                        printErrorMsg(data.error);
                    }

                },
                error: function (data) {
                    console.log('Error:', data);
                    //$('#savedata').html('Save Changes');
                }
            });
        });

        $('body').on('click', '.deletePost', function () {

            var id = $(this).data("id");
            if (confirm("Are You sure want to delete this User!")) {

                $.ajax({
                    type: "DELETE",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('admin.lppd.store') }}" + '/' + id,
                    success: function (data) {
                        table.draw();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });

            }
        });


        function printErrorMsg(msg) {

            $(".print-error-msg").find("ul").html('');

            $(".print-error-msg").css('display', 'block');

            $.each(msg, function (key, value) {

                $(".print-error-msg").find("ul").append('<li>' + value + '</li>');

            });

        }


        // });
    </script>

@endsection

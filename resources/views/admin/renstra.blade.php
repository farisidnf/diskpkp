@extends('admin.layouts.admin')
@section('title', $title ?? __('Blank Page'))

@section('main-content')
<style>
    .data-table tbody tr.selected td {
        background-color: transparent !important;
        box-shadow: none !important;
        color: #4a5568!important;
    }

    table.dataTable tbody tr.selected>* {
        background-color: transparent !important;
        box-shadow: transparent !important;
        color: #4a5568!important;
    }
</style>
    <section class="section">
        <div class="section-header">
            <h1>Tujuan @if (Auth::user()->role == 'user')
                    - Bidang {{ Auth::user()->bidang }}
                @endif
            </h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-options d-flex w-50 justify-content-start">
                            @if (Auth::user()->role == 'admin')
                                <a href="{{route('admin.renstra.create')}}" class="btn btn-sm btn-pill btn-primary mr-1">Tambah
                                    Data Baru
                                </a>
                                <a href="{{route('admin.year.create')}}" class="btn btn-sm btn-pill btn-primary mr-1">Tambah Tahun Baru</a>
                                <a href="{{route('admin.purpose.create')}}" class="btn btn-sm btn-pill btn-primary mr-1">Tambah Tujuan Baru</a>

                            @endif

                            <span style="margin-left:20px;"> Filter : </span>
                            <div class="filter d-flex justify-content-start">
                                <select name="filtertahun" style="margin-left:20px;" id="filtertahun"
                                        class="form-control m-1">

                                    <option value="">Pilih Tahun</option>
                                    @foreach($years as $year)
                                        <option {{ $year->year == date('Y') ? 'selected' : '' }} value="{{ $year->year }}">{{ $year->year }}</option>
                                    @endforeach
                                </select>
                                <select name="filter_data_triwulan" id="filter_data_triwulan" class="form-control m-1">
                                    <option value="">Pilih Data Triwulan</option>
                                    <option {{ date('m') >= '01' && date('m') <= '03' ? 'selected' : '' }} value="Triwulan I">
                                        Triwulan I
                                    </option>
                                    <option {{ date('m') >= '04' && date('m') <= '06' ? 'selected' : '' }} value="Triwulan II">
                                        Triwulan II
                                    </option>
                                    <option {{ date('m') >= '07' && date('m') <= '09' ? 'selected' : '' }} value="Triwulan III">
                                        Triwulan III
                                    </option>
                                    <option {{ date('m') >= '10' && date('m') <= '12' ? 'selected' : '' }} value="Triwulan IV">
                                        Triwulan IV
                                    </option>
                                    <option value="Tahunan">Tahunan</option>
                                </select>

                                @if (Auth::user()->role == 'admin')
                                    @if (Auth::user()->role == 'admin')
                                        <select name="filterbidang" id="filterbidang"
                                                class="form-control-user form-control m-1">
                                            <option value="">Pilih Bidang</option>
                                            @foreach($fields as $field)
                                                <option value="{{ $field->name }}">{{ $field->name }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                @endif
                            </div>


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
                            <table class="table table-striped table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No</th>
                                    @if (Auth::user()->role == 'admin')
                                        <th>T.Upload</th>
                                        <th>T.Update</th>
                                    @endif
                                    <th>Indikator Tujuan</th>
                                    <th>Satuan</th>
                                    @if (Auth::user()->role == 'user')
                                        <th>Triwulan</th>
                                    @endif
                                    <th>Target</th>
                                    <th>Realisasi</th>
                                    <th>Capaian</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>

                                    <th width="160px">Tindakan</th>
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


                </div>
            </div>
        </div>
    </div>


    <style>
        .btn-csv {
            background-color: #5d8e88 !important;
            /* Set the background color */
            color: #fff !important;
            /* Set the text color */
            border: 1px solid #5d8e88 !important;
            /* Set the border color */
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    {{-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    {{-- <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.datatables.net/v/dt/jq-3.7.0/jszip-3.10.1/dt-1.13.8/b-2.4.2/b-html5-2.4.2/datatables.min.css"
          rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/dt/jq-3.7.0/jszip-3.10.1/dt-1.13.8/b-2.4.2/b-html5-2.4.2/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var export_columns = [];
        @if (Auth::user()->role == 'admin')
            export_columns = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        @else
            export_columns = [0, 1, 2, 3, 4, 5, 6, 7, 8];
        @endif


        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            dom: '<"top"Bfl>rt<"bottom"ip><"clear">', // Add the 'B' character to enable export buttons
            buttons: [
                {
                    extend: 'excel',
                    className: 'btn-csv mr-3', // Add the btn-success class
                    text: 'Export Excel', // Set the button text
                    exportOptions: {
                        modifier: {
                            page: 'all' // Include all data, not just the visible page
                        },
                        columns: export_columns
                    }
                },
                {
                    extend: 'csv',
                    className: 'btn-csv mr-3', // Add the btn-success class
                    text: 'Export CSV', // Set the button text
                    exportOptions: {
                        modifier: {
                            page: 'all' // Include all data, not just the visible page
                        },
                        columns: export_columns
                    }
                },
                {
                    extend: 'pdf',
                    className: 'btn-csv mr-3', // Add the btn-success class
                    text: 'Export PDF', // Set the button text
                    exportOptions: {
                        modifier: {
                            page: 'all' // Include all data, not just the visible page
                        },
                        columns: export_columns
                    }
                },
            ],
            select: true,
            lengthMenu: [10, 25, 50, 100, 500], // Specify the available page lengths

            'ajax': {
                'url': '{{ route('admin.renstra.index') }}',
                'data': function (data) {
                    data.tahun = $("#filtertahun").val();
                    data.data_triwulan = $("#filter_data_triwulan").val();
                    @if (Auth::user()->role == 'admin')
                        data.data_bidang = $("#filterbidang").val();
                    @endif

                }
            },

            columns: [
                {
                    data: 'checkbox',
                    name: 'checkbox'
                },{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },


                    @if (Auth::user()->role == 'admin')

                {
                    data: 'upload_date',
                    name: 'upload_date'
                },

                {
                    data: 'updated_at',
                    name: 'updated_at'
                },
                    @endif

                {
                    data: 'indikator_tujuan',
                    name: 'indikator_tujuan'
                },

                {
                    data: 'satuan',
                    name: 'satuan'
                },

                    @if (Auth::user()->role == 'user')
                {
                    data: 'data_triwulan',
                    name: 'data_triwulan'
                },
                    @endif

                {
                    data: 'target',
                    name: 'target'
                },

                {
                    data: 'realisasi',
                    name: 'realisasi'
                },

                {
                    data: 'capaian',
                    name: 'capaian'
                },

                {
                    data: 'keterangan',
                    name: 'keterangan'
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

        table.on('select', function (e, dt, type, indexes) {
            if (type === 'row') {
                var data = table.rows(indexes).data().pluck('id');
                table.rows(indexes).nodes().to$().find('input[type="checkbox"]').prop('checked', true);

            }
        });

        table.on('deselect', function (e, dt, type, indexes) {
            if (type === 'row') {
                // Find the checkbox in the deselected row and set its checked property to false
                table.rows(indexes).nodes().to$().find('input[type="checkbox"]').prop('checked', false);
            }
        });

        $("#filtertahun").change(function () {
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
            $("#formStatus").hide();
            $('#id').val('');
            $('#postForm').trigger("reset");
            $('#modelHeading').html("FORM TUJUAN");
            $('#ajaxModelexa').modal('show');
        });


        $('body').on('click', '.editPost', function () {
            var id = $(this).data('id');

            $("#formStatus").show();

            $.get("{{ route('admin.renstra.index') }}" + '/' + id + '/edit', function (data) {
                $('#modelHeading').html("FORM EDIT TUJUAN");
                $('#savedata').val("edit-user");
                $('#ajaxModelexa').modal('show');
                $('#id').val(data.id);
                $('#indikator_tujuan').val(data.indikator_tujuan);
                $('#indikator_sasaran').val(data.indikator_sasaran);
                $('#status').val(data.status);
                $('#satuan').val(data.satuan);
                $('#data_triwulan').val(data.data_triwulan);
                if (data.target == "N/A") {
                    $('#targetNa').prop("checked", true);
                    $('#target').prop("disabled", true);
                } else {
                    $('#targetNa').prop("checked", false);
                    $('#target').prop("disabled", false);
                    $('#target').val(data.target);
                }

                if (data.realisasi == "N/A") {
                    $('#realisasiNa').prop("checked", true);
                    $('#realisasi').prop("disabled", true);
                } else {
                    $('#realisasiNa').prop("checked", false);
                    $('#realisasi').prop("disabled", false);
                    $('#realisasi').val(data.realisasi);
                }

                @if (Auth::user()->role == 'admin')
                $('#bidang').val(data.bidang);
                @endif
                $('#tahun').val(data.tahun);
                $('#keterangan').val(data.keterangan);
                $('#target_satuan_berjalan').val(data.target_satuan_berjalan);
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
                url: "{{ route('admin.renstra.store') }}",
                type: "POST",
                processData: false,
                contentType: false,
                success: function (data) {


                    if ($.isEmptyObject(data.error)) {
                        $('#postForm').trigger("reset");
                        $("#target").prop("disabled", false);
                        $("#realisasi").prop("disabled", false);
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

        $("#targetNa").on("change", function (event) {
            // Mendapatkan nilai ceklis checkbox
            var isChecked = $(event.target).prop("checked");

            // Mendapatkan elemen dengan id #target
            var targetElement = $("#target");

            // Memeriksa apakah checkbox dicentang
            if (isChecked) {
                // Menambah atribut disabled pada elemen #target
                targetElement.prop("disabled", true);
            } else {
                // Menghapus atribut disabled jika checkbox tidak dicentang
                targetElement.prop("disabled", false);
            }
        });

        $("#realisasiNa").on("change", function (event) {
            // Mendapatkan nilai ceklis checkbox
            var isChecked = $(event.target).prop("checked");

            // Mendapatkan elemen dengan id #target
            var targetElement = $("#realisasi");

            // Memeriksa apakah checkbox dicentang
            if (isChecked) {
                // Menambah atribut disabled pada elemen #target
                targetElement.prop("disabled", true);
            } else {
                // Menghapus atribut disabled jika checkbox tidak dicentang
                targetElement.prop("disabled", false);
            }
        });

        $('body').on('click', '.deletePost', function () {

            var id = $(this).data("id");
            if (confirm("Are You sure want to delete this User!")) {

                $.ajax({
                    type: "DELETE",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('admin.renstra.store') }}" + '/' + id,
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

@extends('admin.layouts.admin')
@section('title', $title ?? __('Blank Page'))

@section('main-content')
<link rel="stylesheet" href="{{asset('global/sweetalert2/sweetalert2.min.css')}}">
<link rel="stylesheet" href="{{asset('global/toastify-js/src/toastify.css')}}">
    <style>
         th {
            white-space: nowrap;
        }
    </style>
    <section class="section">
        <div class="section-header">
            <h1>Permohonan Surveilans Nomor Kontrol Veteriner (NKV)</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-options">
                            <a href="{{url('dinas/surveilansnkv/create')}}" class="btn btn-sm btn-pill btn-primary">Tambah
                                Permohonan
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-icon alert-warning alert-dismissible" role="alert">
                                <i class="fe fe-check mr-2" aria-hidden="true"></i>
                                <button type="button" class="close" data-dismiss="alert"></button>
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered data-table">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="1%">No</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">No.Permohonan</th>
                                        <th class="text-center">Nama Perusahaan</th>
                                        <th class="text-center">Nama Pimpinan</th>
                                        <th class="text-center">Kontak Person</th>
                                        <th class="text-center">Nomor Hp</th>
                                        <th class="text-center">By</th>
                                        <th class="text-center">Tanggal Sertifikat</th>
                                        <th class="text-center">Waktu Surveilans</th>
                                        <th class="text-center" width="1%">Tindakan</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>

    <!-- The Modal Ubah Status-->
    <div class="modal fade" id="modalUbahStatus">
        <div class="modal-dialog">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Update Status Permohonan</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                    <form id="form-data" class="form">
                        <input type="hidden" name="id_data" id="id_data">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="status">Status<span class="text-danger">*</span></label>
                                    <select class="type-select form-control" name="status" id="status">
                                       <option value="">Pilih Status</option>
                                       <option value="2">Sedang Periksa</option>
                                       <option value="3">Belum Sesuai</option>
                                       <option value="4">Sesuai</option>
                                    </select>
                                    <span id="status-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="catatan">Catatan</label>
                                    <textarea class="type-text form-control" name="catatan" id="catatan" cols="30" rows="10" placeholder="File tidak sesuai / tidak bisa dibuka..."></textarea>
                                    <span id="catatan-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-12">
                                <span class="badge bg-light-warning mb-3">Bertanda <span class="text-danger">*</span> harus diisi!</span>
                            </div>
                            <div class="btn-block-m col-md-6 col-sm-6 col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                            </div>
                        </div>
                    </form>
            </div>
            
            <!-- Modal footer -->
            <!-- <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div> -->
            
        </div>
        </div>
    </div>

     <!-- The Modal Ubah Status-->
     <div class="modal fade" id="modalFilter">
        <div class="modal-dialog">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Filter Data</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                    <form id="form-data-filter" class="form">
                        <div class="form-group row">
                            <div class="col-lg-2 col-3">
                                <label class="col-form-label">From</label>
                            </div>
                            <div class="col-lg-10 col-9">
                                <input type="date" id="f_from" name="f_from" value="{{ app('request')->input('f_from') }}" class="form-control date" placeholder="From...">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-2 col-3">
                                <label class="col-form-label">To</label>
                            </div>
                            <div class="col-lg-10 col-9">
                                <input type="date" id="f_to" name="f_to" value="{{ app('request')->input('f_to') }}" class="form-control date" placeholder="To...">
                            </div>
                        </div>
                        <div class="row">
                            <div class="btn-block-m col-md-12 col-sm-12 col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1 mr-1">Filter</button>
                                <a href="{{url('dinas/surveilansnkv')}}" type="button" class="btn btn-danger me-1 mb-1">Reset Filter</a>
                            </div>
                        </div>
                    </form>
            </div>
            
            <!-- Modal footer -->
            <!-- <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div> -->
            
        </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="{{asset('global/sweetalert2/sweetalert2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('global/toastify-js/src/toastify.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('global/flatpickr/flatpickr.min.css') }}">
    <script type="text/javascript" src="{{ asset('global/flatpickr/flatpickr.min.js') }}"></script>


    <script type="text/javascript">
         var date1 = $("#f_from").flatpickr({
            dateFormat: "Y-m-d",
            onChange: function(selectedDates, dateStr, instance) {
                date2.set('minDate', dateStr)
            }
        });

        var date2 = $("#f_to").flatpickr({
            dateFormat: "Y-m-d",
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        var table = $('#datatable').DataTable({
            lengthMenu: [
                [10,25,50,100],
                [10,25,50,100]
            ],
            bLengthChange: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('dinas/surveilansnkv') }}",
                type: 'GET',
                data: {
                    'f_from': "{{ app('request')->input('f_from') }}",
                    'f_to': "{{ app('request')->input('f_to') }}",
                },
            },

            aaSorting: [0, 'desc'],
            // dom: "<'top' <'row'<'col-12 mb-2'B><'col-12 col-md-6 col-lg-6 text-left'l><'col-12 col-md-6 col-lg-6 align-items-center d-flex justify-content-end'> > ><'loading_datatable'r>t<'bottom'  <'row mt-1'<'col-12 col-md-6 col-lg-6 text-left'i><'col-12 col-md-6 col-lg-6'p> >  >",
            dom: "<'top' <'row'<'col-12 mb-2'B><'col-12 col-md-6 col-lg-6 text-left'l><'col-12 col-md-6 col-lg-6 align-items-center d-flex justify-content-end'f> > ><'loading_datatable'r>t<'bottom'  <'row mt-1'<'col-12 col-md-6 col-lg-6 text-left'i><'col-12 col-md-6 col-lg-6'p> >  >",
            // language: {
            //     url: '{{asset("template/mazer/compiled/json/id.json")}}',
            // },
            // Ubah Data Colomn
            columns: [{
                    data: 'id',
                    className: "text-center",
                    orderable: false
                },
                {
                    data: 'status',
                    name: 'status',
                    className: 'text-center dt-nowrap',
                },
                {
                    data: 'no_pengajuan',
                    name: 'no_pengajuan',
                    className: "text-center dt-nowrap"
                },
                {
                    data: 'nama_perusahaan',
                    name: 'nama_perusahaan',
                    className: "dt-nowrap"
                },
                {
                    data: 'nama_pimpinan',
                    name: 'nama_pimpinan',
                    className: "dt-nowrap"
                },
                {
                    data: 'kontak_person',
                    name: 'kontak_person',
                },
                {
                    data: 'nomor_hp',
                    name: 'nomor_hp',
                    className: 'text-center dt-nowrap',
                },
                {
                    data: 'created_by',
                    name: 'created_by',
                    className: 'text-center dt-nowrap',
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    className: 'text-center dt-nowrap',
                },
                {
                    data: 'expired',
                    name: 'expired',
                    className: 'text-center dt-nowrap',
                },
                {
                    data: 'action',
                    name: 'action',
                    className: 'text-center dt-nowrap',
                    orderable: false,
                },
            ],
            buttons: [
                {
                    text: 'Filter Data',
                    className: 'btn btn-sm btn-success mb-1',
                    attr: {
                        'data-toggle': "modal",
                        'data-target': "#modalFilter"
                    }
                },
                {
                    extend: 'csv',
                    title: 'Permohonan Surveilans Nomor Kontrol Veteriner (NKV)',
                    className: 'btn btn-sm btn-info mb-1',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6 ,7, 8, 9],
                        format: {
                            body: function(inner, rowidx, colidx, node) {
                                return node.innerText;
                            }
                        }
                    }
                },
                {
                    // Ubah Format Excel
                    extend: 'excel',
                    title: 'Permohonan Surveilans Nomor Kontrol Veteriner (NKV)',
                    className: 'btn btn-sm btn-info mb-1',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6 ,7, 8, 9],
                        format: {
                            body: function(inner, rowidx, colidx, node) {
                                return node.innerText;
                            }
                        }
                    }
                },
                {
                    // Ubah Format Pdf
                    extend: 'pdf',
                    orientation: 'landscape',
                    title: 'Permohonan Surveilans Nomor Kontrol Veteriner (NKV)',
                    className: 'btn btn-sm btn-info mb-1',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6 ,7, 8, 9],
                        format: {
                            body: function(inner, rowidx, colidx, node) {
                                return node.innerText;
                            }
                        }
                    },
                    customize: function(doc) {
                        doc.content[1].table.widths = ['5%','10%','*','*','10%','10%', '10%', '10%', '10%', '10%'];
                        var rowCount = doc.content[1].table.body.length;
                        for (i = 1; i < rowCount; i++) {
                            doc.content[1].table.body[i][0].alignment = 'center';
                        };
                    }
                },
            ],
            drawCallback: function(settings) {
                $('[data-toggle="tooltip"]').tooltip();
            },
            // rowCallback: function(nRow, aData, iDisplayIndex) {
            //     var info = $(this).DataTable().page.info();
            //     $("td:nth-child(1)", nRow).html(info.start + iDisplayIndex + 1);
            //     return nRow;
            // },
        });

        table
    .on('order.dt search.dt', function () {
        let i = 1;
        table
            .cells(null, 0, { search: 'applied', order: 'applied' })
            .every(function (cell) {
                this.data(i++);
            });
    })
    .draw();

        // Fungsi Ubah Status
        getData = (id) => {
            $.ajax({
                type: "GET",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('dinas/surveilansnkv/getdata') }}" + '/' + id,
                success: function (data) {
                    if(data.status){
                        if(data.get_data.status==0 || data.get_data.status==1){
                            data.get_data.status = "";
                        }
                        $("#id_data").val(id);
                        $("#status").val(data.get_data.status);
                        $("#catatan").val(data.get_data.catatan);
                        $("#modalUbahStatus").modal('show');
                    }
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        };


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
                                $("#modalUbahStatus").modal('hide');
                                table.draw();
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
                    let errMessage = xhr.responseJSON.message ?? xhr.responseJSON.meta.message
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
                },
                complete: function() {
                }
            });
        });

           // Fungsi Ajukan Data
           notifPerpanjang = (id) => {
            if (confirm("Are You sure want to send notif to user?")) {
                $.ajax({
                    type: "GET",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('dinas/surveilansnkv/notifperpanjang') }}" + '/' + id,
                    beforeSend: function() {
                        $(".loading-full").fadeIn(1000);
                    },
                    success: function (data) {
                        alert(data.text);
                        table.draw();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $(".loading-full").fadeOut(1000);
                    },
                    complete: function() {
                        $(".loading-full").fadeOut(1000);
                    }
                });

            }
        };

        $('body').on('click', '.deletePost', function () {

            var id = $(this).data("id");

            if (confirm("Are You sure want to delete this data?")) {
                $.ajax({
                    type: "DELETE",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('pengusaha/surveilansnkv/delete') }}" + '/' + id,
                    success: function (data) {
                        alert(data.text);
                        table.draw();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });

            }
        });

        // });
    </script>

@endsection

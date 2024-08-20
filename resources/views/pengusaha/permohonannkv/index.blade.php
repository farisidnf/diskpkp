@extends('admin.layouts.admin')
@section('title', $title ?? __('Blank Page'))

@section('main-content')
    <style>
         th {
            white-space: nowrap;
        }
    </style>
    <section class="section">
        <div class="section-header">
            <h1>Permohonan Rekomendasi Nomor Kontrol Veteriner (NKV)</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-options">
                            <a href="{{url('pengusaha/permohonannkv/create')}}" class="btn btn-sm btn-pill btn-primary">Tambah
                                Permohonan
                            </a>

                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-icon alert-primary alert-dismissible" role="alert">
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
                            <table id="datatable" class="table table-striped table-bordered data-table">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="1%">No</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">No.Permohonan</th>
                                        <th class="text-center">Tujuan Permohonan</th>
                                        <th class="text-center">Nama Perusahaan</th>
                                        <th class="text-center">Nama Pimpinan</th>
                                        <th class="text-center">Kontak Person</th>
                                        <th class="text-center">Nomor Hp</th>
                                        <th class="text-center">At</th>
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



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <script type="text/javascript">
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
            ajax: '{{ url("pengusaha/permohonannkv") }}',
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
                    data: 'fk_lokasi_sudin',
                    name: 'fk_lokasi_sudin',
                    className: "dt-nowrap"
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
                    data: 'created_at',
                    name: 'created_at',
                    className: 'text-center dt-nowrap',
                },
               
                {
                    data: 'action',
                    name: 'action',
                    className: 'text-center dt-nowrap',
                    orderable: false,
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



        $('body').on('click', '.deletePost', function () {

            var id = $(this).data("id");
      
            if (confirm("Are You sure want to delete this data?")) {
                $.ajax({
                    type: "DELETE",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('pengusaha/permohonannkv/delete') }}" + '/' + id,
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

         // Fungsi Ajukan Data
         ajukanData = (id) => {
            if (confirm("Are You sure want to send this data?")) {
                $.ajax({
                    type: "GET",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('pengusaha/permohonannkv/ajukandata') }}" + '/' + id,
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


        // });
    </script>

@endsection

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
            <h1>Data Pengguna</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- <div class="card-header">
                       
                    </div> -->
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-icon alert-primary alert-dismissible" role="alert">
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
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center" width="1%">Role</th>
                                        <th class="text-center" width="1%">Status</th>
                                        <th class="text-center" width="1%">At</th>
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





                    <div class="form-group">
                        <label for="criteria" class="col-sm-12">Username</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username"
                                value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-sm-12">Email</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter email"
                                value="" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="criteria" class="col-sm-12">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"
                                value="" required>
                        </div>
                    </div>



                   

                   


                    <!-- <div class="form-group">
                        <label for="role" class="col-sm-12">Role</label>
                        <div class="col-sm-12">
                             <select name="role" id="role" class="form-control">
                                <option value="sudin">Sudin</option>
                                <option value="pengusaha">Pengusaha</option>
                            </select>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label for="password" class="col-sm-12">Password</label>
                        <div class="col-sm-12">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter password" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="confirm-password" class="col-sm-12">Confirm Password</label>
                        <div class="col-sm-12">
                            <input type="password" class="form-control" id="confirm-password" name="confirm-password"
                                placeholder="Enter confirm password" value="" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" id="savedata" value="create">Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
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
                        <div class="form-group row" style="align-items: center">
                            <div class="col-lg-2 col-3">
                                <label class="col-form-label">Role</label>
                            </div>
                            <div class="col-lg-10 col-9">
                                <select class="form-control" id="f_role" name="f_role">
                                    <option value="">Semua</option>
                                    <option value="pengusaha" {{ app('request')->input('f_role')=="pengusaha" ? "selected" : "" }}>PENGUSAHA</option>
                                    <option value="sudin" {{ app('request')->input('f_role')=="sudin" ? "selected" : "" }}>SUDIN</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="btn-block-m col-md-12 col-sm-12 col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1 mr-1">Filter</button>
                                <a href="{{url('dinas/user')}}" type="button" class="btn btn-danger me-1 mb-1">Reset Filter</a>
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
            ajax: {
                url: "{{ url('dinas/user') }}",
                type: 'GET',
                data: {
                    'f_role': "{{ app('request')->input('f_role') }}",
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
                    data: 'username',
                    name: 'username',
                    className: 'text-center dt-nowrap',
                },
                {
                    data: 'name',
                    name: 'name',
                    className: "dt-nowrap"
                },
                {
                    data: 'role',
                    name: 'role',
                    className: "text-center dt-nowrap"
                },
                {
                    data: 'status',
                    name: 'status',
                    className: "text-center dt-nowrap"
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

            buttons: [
                {
                    text: 'Filter Data',
                    className: 'btn btn-sm btn-success mb-1',
                    attr: {
                        'data-toggle': "modal",
                        'data-target': "#modalFilter"
                    }
                }
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
                    url: "{{ url('dinas/user/delete') }}" + '/' + id,
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
         editData = (id) => {
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{
                        id : id
                    },
                    url: "{{ url('dinas/user/edit') }}",
                    success: function (data) {
                        
                        $('#modelHeading').html("Edit User");
                        $('#id').val(data.id);
                        $('#email').val(data.email);
                        $('#name').val(data.name);
                        $('#username').val(data.username);
                        // $('#role').val(data.role);
                        $("#email").attr('disabled', true);
                        $("#username").attr('disabled', true);
                        $('#ajaxModelexa').modal('show');
                        
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });

        };

         // Fungsi Ajukan Data
         ubahStatus = (id,username) => {
            if (confirm("Are you sure want to change "+username+" status?")) {
                $.ajax({
                    type: "GET",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('dinas/user/ubahstatus') }}" + '/' + id,
                    success: function (data) {
                        alert(data.text);
                        table.draw();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });

            }
        };


        // });
    </script>

@endsection

@extends('admin.layouts.admin')
@section('title', $title ?? __('Blank Page'))

@section('main-content')

<section class="section">
    <div class="section-header">
        <h1>Data Pengguna</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-options">
                        <a href="javascript:void(0)" id="createNewPost" class="btn btn-sm btn-pill btn-primary">Tambah Pengguna
                        </a>
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
                                    <th>No</th>
                                    <th>Tanggal daftar</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>NRK</th>
                                    <th>Jabatan</th>
                                    <th>Bidang</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Role</th>
                                    <th>Terakhir Masuk</th>
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





                    <div class="form-group">
                        <label for="criteria" class="col-sm-12">Username</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username"
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


                    <div class="form-group">
                        <label for="criteria" class="col-sm-12">NRK</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nrk" name="nrk" placeholder="Enter name"
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
                        <label for="role" class="col-sm-12">Jabatan</label>
                        <div class="col-sm-12">
                            <input type="text" name="jabatan" id="jabatan" class="form-control" value="" />
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="role" class="col-sm-12">Role</label>
                        <div class="col-sm-12">
                             <select name="role" id="role" class="form-control">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                                <option value="dinas">Dinas</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="" class="col-sm-12">Bidang</label>

                        <div class="col-sm-12">

                            <select name="bidang" id="bidang" class="form-control">
                                @foreach($bidangs as $bidang)
                                <option value="{{$bidang->id}}">{{$bidang->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="password" class="col-sm-12">Password</label>
                        <div class="col-sm-12">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter password" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="savedata" value="create">Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<!-- Styles -->
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
{{--
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    <script type="text/javascript">

    // $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });



            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,


                'ajax': {
                    'url':'{{ route('admin.user.index') }}',
                    'data': function(data){
                       var event = $('#filter_event_id').val();
                    }
                 },





                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },


                    {
                        data: 'username',
                        name: 'username'
                    },

                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'nrk',
                        name: 'nrk'
                    },

                    {
                        data: 'jabatan',
                        name: 'jabatan'
                    },

                    {
                        data: 'bidang',
                        name: 'bidang'
                    },


                    {
                        data: 'email',
                        name: 'email'
                    },




                    {
                        data: 'status',
                        name: 'status'
                    },


                    {
                        data: 'role',
                        name: 'role'
                    },



                    {
                        data: 'last_login',
                        name: 'last_login'
                    },

                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $('#createNewPost').click(function() {
                $('#savedata').val("create-post");
                $('#id').val('');

                $("#email").removeAttr('disabled');
                $("#username").removeAttr('disabled');


                $('#postForm').trigger("reset");
                $('#modelHeading').html("Tambah User");
                $('#ajaxModelexa').modal('show');
            });

            $('body').on('click', '.editPost', function() {
                var id = $(this).data('id');
                $.get("{{ route('admin.user.index') }}" + '/' + id + '/edit', function(data) {
                    $('#modelHeading').html("Edit User");
                    $('#savedata').val("edit-user");
                    $('#ajaxModelexa').modal('show');
                    $('#id').val(data.id);
                    $('#email').val(data.email);
                    $('#name').val(data.name);
                    $('#nrk').val(data.nrk);
                    $('#username').val(data.username);
                    $('#jabatan').val(data.jabatan);
                    $('#role').val(data.role);
                    $('#bidang').val(data.fk_bidang);

                    $("#email").attr('disabled', true);
                    $("#username").attr('disabled', true);

                    // set bidang select empty
                    // let bidang = $('#bidang');
                    // bidang.empty();
                    // set bidang select option
                    // data.bidangs.forEach(function(item) {
                    //     bidang.append('<option value="' + item.name + '">' + item.name + '</option>');
                    // });
                    // bidang.val(data.bidang);

                })
            });

            $('#savedata').click(function(e) {
                e.preventDefault();
                //$(this).html('Sending..');

                $.ajax({
                    data: $('#postForm').serialize(),
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: "{{ route('admin.user.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {


                        if ($.isEmptyObject(data.error)) {
                            $('#postForm').trigger("reset");
                            $('#ajaxModelexa').modal('hide');
                            table.draw();
                        } else {
                            printErrorMsg(data.error);
                        }

                    },
                    error: function(data) {
                        console.log('Error:', data);
                        $('#savedata').html('Save Changes');
                    }
                });
            });

            $('body').on('click', '.deletePost', function() {

                var id = $(this).data("id");
                if (confirm("Are You sure want to delete this User!")) {

                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('admin.user.store') }}" + '/' + id,
                        success: function(data) {
                            table.draw();
                        },
                        error: function(data) {
                            console.log('Error:', data);
                        }
                    });

                }
            });




            function printErrorMsg(msg) {

                $(".print-error-msg").find("ul").html('');

                $(".print-error-msg").css('display', 'block');

                $.each(msg, function(key, value) {

                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');

                });

            }


        // });
</script>


@endsection

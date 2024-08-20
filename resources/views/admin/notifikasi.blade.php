@extends('admin.layouts.admin')

@section('main-content')
    <!-- <style>
        .div-table-notif{
            max-height: 5vw;
            overflow-y: scroll;
        }
    </style> -->
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">List Notifikasi</h1>
    </div>

    
    <hr/>
    
    <div class="div-table-notif">

    <table id="table-notif" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Pesan</th>
                <th>At</th>
                <th>Link</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($notifikasi as $key)
        <tr>
            <td>{{$key->judul}}</td>
            <td>{{$key->pesan}}</td>
            <td class="text-center" style="white-space:nowrap">{{date('d M Y H:i:s', strtotime($key->created_at))}}</td>
            <td class="text-center"><a target="_blank" href="{{url('notifikasi/ubahstatus')}}/{{$key->id}}?link={{$key->link}}">Lihat</a></td>
            <td class="text-center {{$key->status ? "" : "text-danger"}}" style="white-space:nowrap">{{$key->status ? "Dibaca" : "Belum Dibaca"}}</td>
        </tr>
        @empty
        <tr>
            <td colspan="5">
                <center>Belum Ada Notifikasi</center>
            </td>
        </tr>
        @endforelse
        </tbody>
    </table>
        
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script>
        if("{{count($notifikasi)}}">0){
            $("#table-notif").DataTable({
                "lengthChange": false,
                "oLanguage": {
                    "sEmptyTable": "Belum Ada Data"
                },
                "aaSorting": [],
                "columnDefs": [ {
                    "targets": [0,4],
                    "orderable": false
                } ]
            });   
        }
    </script>
@endsection

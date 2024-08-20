@if($selectdata->status)
<button  data-toggle="tooltip" data-placement="top" title="Ubah Status" onclick="ubahStatus('{{$id}}','{{$selectdata->username}}')" class="btn btn-success btn-sm mb-0">Aktif</button>
@else
<button  data-toggle="tooltip" data-placement="top" title="Ubah Status" onclick="ubahStatus('{{$id}}','{{$selectdata->username}}')" class="btn btn-danger btn-sm mb-0">Non-Aktif</button>
@endif
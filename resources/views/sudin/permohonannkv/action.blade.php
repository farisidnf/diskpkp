@if($selectdata->status==0 && $selectdata->created_by!=Auth::user()->id)

@else
<div class="ms-auto text-end">
    <a data-toggle="tooltip" data-placement="top" title="Lihat Data" href="{{url('sudin/permohonannkv/show')}}/{{$id}}" class="btn btn-info btn-sm mb-0"><i class="fas fa-eye"></i></a>
    @if($selectdata->ubah_status)
    <!-- <button data-toggle="tooltip" data-placement="top" title="Ubah Status" onclick="getData('{{$id}}')" class="btn btn-primary btn-sm mb-0"><i class="fas fa-edit"></i></button> -->
    <a href="{{url('sudin/permohonannkv/cekdata')}}/{{$id}}" data-toggle="tooltip" data-placement="top" title="Update Status" class="btn btn-primary btn-sm mb-0"><i class="fas fa-check-double"></i></a>
    @endif

    @if($selectdata->status==6)
    
    @else
        <button data-toggle="tooltip" data-placement="top" title="Hapus Data" data-id="{{$id}}" class="deletePost btn btn-danger btn-sm mb-0"><i class="fas fa-trash-alt"></i></button>
    @endif
</div>
@endif
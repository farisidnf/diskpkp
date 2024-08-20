<div class="ms-auto text-end">
    <a data-toggle="tooltip" data-placement="top" title="Lihat Data" href="{{url('pengusaha/permohonannkv/show')}}/{{$id}}" class="btn btn-info btn-sm mb-0"><i class="fas fa-eye"></i></a>
    @if($selectdata->boleh_edit)
    <button data-toggle="tooltip" data-placement="top" title="Ajukan Data" onclick="ajukanData('{{$id}}')" class="btn btn-primary btn-sm mb-0"><i class="fas fa-paper-plane"></i></button>
    <a data-toggle="tooltip" data-placement="top" title="Edit Data" href="{{url('pengusaha/permohonannkv/edit')}}/{{$id}}" class="btn btn-warning btn-sm mb-0"><i class="fas fa-edit"></i></a>
    @endif
    @if($selectdata->status==6)
        @if($selectdata->file_rekom)
        <a data-toggle="tooltip" data-placement="top" title="Download File Rekomendasi" target="_blank" href="{{asset($selectdata->file_rekom)}}" class="btn btn-warning btn-sm mb-0"><i class="fas fa-download"></i></a>
        @endif
    @else
        <button data-toggle="tooltip" data-placement="top" title="Hapus Data" data-id="{{$id}}" class="deletePost btn btn-danger btn-sm mb-0"><i class="fas fa-trash-alt"></i></button>
    @endif
</div>
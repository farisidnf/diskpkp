<div class="ms-auto text-end">
    @if($selectdata->status==2 || $selectdata->status==3)
    <span data-toggle="tooltip" data-placement="right" title="Lihat Catatan">
        <button data-toggle="modal" data-target="#modalLihatCatatan-{{$selectdata->id}}" class="btn btn-sm btn-{{$selectdata->class_status}} mb-0 w-100">{{$selectdata->nama_status}}</button>
    </span>
    @else
    <button class="btn btn-sm btn-{{$selectdata->class_status}} mb-0 w-100">{{$selectdata->nama_status}}</button>
    @endif
</div>

 <!-- The Modal Ubah Status-->
 <div class="modal fade" id="modalLihatCatatan-{{$selectdata->id}}">
    <div class="modal-dialog">
    <div class="modal-content">
    
        <!-- Modal Header -->
        <div class="modal-header">
        <h4 class="modal-title">Catatan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12 col-12">
                    
                        <textarea class="type-text form-control" cols="30" rows="10" placeholder="" readonly>{{$selectdata->catatan ? $selectdata->catatan : "Tidak Ada Catatan"}}</textarea>
                        <span id="catatan-error" class="error invalid-feedback"></span>
                    
                </div>
            </div>
        </div>
        
    </div>
    </div>
</div>
<div class="ms-auto text-end">
    @if($selectdata->status==2 || $selectdata->status==3)
    <span data-toggle="tooltip" data-placement="right" title="Lihat Catatan">
        <button data-toggle="modal" data-target="#modalLihatCatatan-{{$selectdata->id}}" class="btn btn-sm btn-{{$selectdata->class_status}} mb-0 w-100">{{$selectdata->nama_status}}</button>
    </span>
    @elseif($selectdata->status==7)
        @if(!$selectdata->status_perpanjang)
            @if(\Carbon\Carbon::now()>=\Carbon\Carbon::parse($selectdata->expired))
                <button class="btn btn-sm btn-danger mb-0 w-100">Expired</button>
            @elseif(\Carbon\Carbon::now()>=\Carbon\Carbon::parse($selectdata->expired)->addMonth(-1))
                <button class="btn btn-sm btn-warning mb-0 w-100">Hampir Expired</button>
            @else
                <button class="btn btn-sm btn-{{$selectdata->class_status}} mb-0 w-100">{{$selectdata->nama_status}}</button>
            @endif
        @else
        <button class="btn btn-sm btn-success mb-0 w-100">Sudah Diperpanjang</button>
        @endif
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
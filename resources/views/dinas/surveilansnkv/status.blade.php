<div class="ms-auto text-end">
    @if($selectdata->status==7)
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
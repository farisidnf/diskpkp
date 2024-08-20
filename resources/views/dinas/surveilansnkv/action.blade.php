@if($selectdata->status==0 && $selectdata->created_by!=Auth::user()->id)

@else
<div class="ms-auto text-left">
    <a data-toggle="tooltip" data-placement="top" title="Lihat Data" href="{{url('dinas/surveilansnkv/show')}}/{{$id}}" class="btn btn-info btn-sm mb-0"><i class="fas fa-eye"></i></a>
    @if($selectdata->ubah_status)
    <!-- <button data-toggle="tooltip" data-placement="top" title="Ubah Status" onclick="getData('{{$id}}')" class="btn btn-primary btn-sm mb-0"><i class="fas fa-edit"></i></button> -->
    <a href="{{url('dinas/surveilansnkv/cekdata')}}/{{$id}}" data-toggle="tooltip" data-placement="top" title="Update Status" class="btn btn-primary btn-sm mb-0"><i class="fas fa-check-double"></i></a>
    @endif
    @if($selectdata->ubah_status_peninjauan)
    <a href="{{url('dinas/surveilansnkv/peninjauan')}}/{{$id}}" data-toggle="tooltip" data-placement="top" title="Update Data Peninjauan" class="btn btn-primary btn-sm mb-0"><i class="fas fa-edit"></i></a>
    @endif
    @if($selectdata->status==5 || $selectdata->status==6 || $selectdata->status==7)
        @if($selectdata->file_surat_tugas_peninjauan_lapangan)
        <a data-toggle="tooltip" data-placement="top" title="Download File Surat Tugas" target="_blank" href="{{asset($selectdata->file_surat_tugas_peninjauan_lapangan)}}" class="btn btn-success btn-sm mb-0"><i class="fas fa-download"></i></a>
        @endif
        @if($selectdata->file_berkas_hasil_tinjauan)
        <a data-toggle="tooltip" data-placement="top" title="Download File Berkas Hasil Tinjauan" target="_blank" href="{{asset($selectdata->file_berkas_hasil_tinjauan)}}" class="btn btn-success btn-sm mb-0"><i class="fas fa-download"></i></a>
        @endif
        @if($selectdata->file_sertifikat_nkv)
        <a data-toggle="tooltip" data-placement="top" title="Download File Sertifikat NKV" target="_blank" href="{{asset($selectdata->file_sertifikat_nkv)}}" class="btn btn-success btn-sm mb-0"><i class="fas fa-download"></i></a>
        @endif
    @endif
    @if($selectdata->status==7 && !$selectdata->status_perpanjang )
        @if(\Carbon\Carbon::now()>=\Carbon\Carbon::parse($selectdata->expired)->addMonth(-1))
        @endif
        <button data-toggle="tooltip" data-placement="top" title="Kirim Notif Perpanjangan Surveilans" onclick="notifPerpanjang('{{$id}}')" class="btn btn-primary btn-sm mb-0"><i class="fas fa-paper-plane"></i></button>
    @endif
    @if($selectdata->status==7)
        @if(!$selectdata->status_perpanjang)
            @if(\Carbon\Carbon::now()>=\Carbon\Carbon::parse($selectdata->expired)->addMonth(-1))
                @if(count($selectdata->perpanjang_hasmany_r)<=0)
                @endif
                <a data-toggle="tooltip" data-placement="top" title="Perpanjang Data" href="{{url('dinas/surveilansnkv/create')}}?reff={{$id}}" class="blink btn btn-danger btn-sm mb-0"><i class="fas fa-plus"></i></a>
            @endif
        @endif
    @else
        <button data-toggle="tooltip" data-placement="top" title="Hapus Data" data-id="{{$id}}" class="deletePost btn btn-danger btn-sm mb-0"><i class="fas fa-trash-alt"></i></button>
    @endif
    @if($selectdata->boleh_edit)
    <a data-toggle="tooltip" data-placement="top" title="Edit Data" href="{{url('dinas/surveilansnkv/edit')}}/{{$id}}" class="btn btn-warning btn-sm mb-0"><i class="fas fa-edit"></i></a>
    @endif
</div>
@endif
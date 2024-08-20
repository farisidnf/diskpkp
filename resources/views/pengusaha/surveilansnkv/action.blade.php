<div class="ms-auto text-left">
    <a data-toggle="tooltip" data-placement="top" title="Lihat Data" href="{{url('pengusaha/surveilansnkv/show')}}/{{$id}}" class="btn btn-info btn-sm mb-0"><i class="fas fa-eye"></i></a>
    @if($selectdata->boleh_edit)
    <button data-toggle="tooltip" data-placement="top" title="Ajukan Data" onclick="ajukanData('{{$id}}')" class="btn btn-primary btn-sm mb-0"><i class="fas fa-paper-plane"></i></button>
    <a data-toggle="tooltip" data-placement="top" title="Edit Data" href="{{url('pengusaha/surveilansnkv/edit')}}/{{$id}}" class="btn btn-warning btn-sm mb-0"><i class="fas fa-edit"></i></a>
    @endif
    @if($selectdata->status==5 || $selectdata->status==6 || $selectdata->status==7 )
        @if($selectdata->file_surat_tugas_peninjauan_lapangan)
        <a data-toggle="tooltip" data-placement="top" title="Download File Surat Tugas" target="_blank" href="{{asset($selectdata->file_surat_tugas_peninjauan_lapangan)}}" class="btn btn-success btn-sm mb-0"><i class="fas fa-download"></i></a>
        @endif
        @if($selectdata->file_berkas_hasil_tinjauan)
        <a data-toggle="tooltip" data-placement="top" title="Download File Berkas Hasil Tinjauan" target="_blank" href="{{asset($selectdata->file_berkas_hasil_tinjauan)}}" class="btn btn-success btn-sm mb-0"><i class="fas fa-download"></i></a>
        @endif
        @if($selectdata->file_sertifikat_nkv && $selectdata->status==7)
        <a data-toggle="tooltip" data-placement="top" title="Download File Sertifikat NKV" target="_blank" href="{{asset($selectdata->file_sertifikat_nkv)}}" class="btn btn-success btn-sm mb-0"><i class="fas fa-download"></i></a>
        @endif
    @endif
    @if($selectdata->status==7)
        @if(!$selectdata->status_perpanjang)
            @if(\Carbon\Carbon::now()>=\Carbon\Carbon::parse($selectdata->expired)->addMonth(-1))
                @if(count($selectdata->perpanjang_hasmany_r)<=0)
                @endif
                <a data-toggle="tooltip" data-placement="top" title="Perpanjang Data" href="{{url('pengusaha/surveilansnkv/create')}}?reff={{$id}}" class="blink btn btn-danger btn-sm mb-0"><i class="fas fa-plus"></i></a>
            @endif
        @endif
    @else
        <button data-toggle="tooltip" data-placement="top" title="Hapus Data" data-id="{{$id}}" class="deletePost btn btn-danger btn-sm mb-0"><i class="fas fa-trash-alt"></i></button>
    @endif
</div>
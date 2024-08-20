@extends('admin.layouts.admin')
@section('title', $title ?? __('Blank Page'))

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
            <form id="postForm" name="postForm" class="form-horizontal" enctype="multipart/form-data" action="{{route('admin.renstra.store')}}" method="POST">
                @csrf
                <input type="hidden" name="id" id="id">
                <div style="display:{{Auth::user()->role == 'user' ? 'display:none' : ''}}">
                    <div class="form-group">
                        <label for="tahun" class="col-sm-12">Pilih Tahun</label>
                        <div class="col-sm-12">
                            <select name="tahun" class="form-control" id="tahun">
                                <option value="">Pilih Tahun</option>
                                @foreach($years as $year)
                                    <option {{old('tahun') == $year->year ? 'selected' : ''}} value="{{$year->year}}">{{$year->year}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tujuan" class="col-sm-12">Tujuan </label>
                        <div class="col-sm-12">
                            <select name="indikator_tujuan" class="form-control" id="indikator_tujuan">
                                <option value="">Pilih Tujuan</option>
                                @foreach($purposes as $purpose)
                                    <option {{old('indikator_tujuan') == $purpose->purpose ? 'selected' : ''}} value="{{$purpose->purpose}}">{{$purpose->purpose}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="satuan" class="col-sm-12">Satuan Data <span
                                    style="color:brown;"></span></label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Isi satuan data" value="{{old('satuan')}}"
                                   required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="criteria" class="col-sm-12">Target/Thn <span
                                    style="color:brown;"></span></label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="target_satuan_berjalan"
                                   name="target_satuan_berjalan" placeholder="Target Pertahun" value="{{old('target_satuan_berjalan')}}"
                                   required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="criteria" class="col-sm-12">Pilih Data Triwulan</label>
                        <div class="col-sm-12">
                            <select name="data_triwulan" class="form-control" id="data_triwulan">
                                <option value="Triwulan I">Triwulan I</option>
                                <option value="Triwulan II">Triwulan II</option>
                                <option value="Triwulan III">Triwulan III</option>
                                <option value="Triwulan IV">Triwulan IV</option>
                                <option value="Tahunan">Tahunan</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="criteria" class="col-sm-12">Target</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="target" name="target"
                                   placeholder="Isi jumlah target" value="{{old('target')}}">
                        </div>
                        <div class="form-check ml-3">
                            <input class="form-check-input" type="checkbox" value="{{old('targetNa') ?? 'N/A'}}" id="targetNa"
                                   name="targetNa" >
                            <label class="form-check-label" for="targetNa">
                                <small>
                                    Is N/A
                                </small>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="criteria" class="col-sm-12">Realisasi</label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" id="realisasi" name="realisasi" value="{{old('realisasi')}}"
                               placeholder="Isi jumlah realisasi">
                    </div>
                    <div class="form-check ml-3">
                        <input class="form-check-input" type="checkbox" value="{{old('realisasiNa') ?? 'N/A'}}" id="realisasiNa"
                               name="realisasiNa">
                        <label class="form-check-label" for="realisasiNa">
                            <small>
                                Is N/A
                            </small>
                        </label>
                    </div>
                </div>


                <div class="form-group">
                    <label for="criteria" class="col-sm-12">Keterangan <span
                                style="color:brown;"></span></label>
                    <div class="col-sm-12">
                                <textarea name="keterangan" class="form-control" id="keterangan" cols="30" rows="10"
                                          placeholder="Isi Keterangan (minimal 50 karakter)">{{old('keterangan')}}</textarea>
                    </div>
                </div>

                <div style="display:{{Auth::user()->role == 'user' ? 'display:none' : ''}}">
                    <div class="form-group">
                        <label for="criteria" class="col-sm-12">Bidang</label>

                        <div class="col-sm-12">
                            <select name="bidang" id="bidang" class="form-control">
                                <option value="">Pilih Bidang</option>
                                @foreach($fields as $field)
                                    <option value="{{$field->id}}">{{$field->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="status_" class="col-sm-12">Status</label>

                    <div class="col-sm-12">
                        <select name="status" id="status_" class="form-control">
                            <option value="Menunggu Periksa" {{ old('status') == 'Menunggu Periksa' ? 'selected' : '' }}>Menunggu Periksa</option>
                            <option value="Sedang Periksa" {{ old('status') == 'Sedang Periksa' ? 'selected' : '' }}>Sedang Periksa</option>
                            <option value="Ada Kesalahan" {{ old('status') == 'Ada Kesalahan' ? 'selected' : '' }}>Ada Kesalahan</option>
                            <option value="Selesai" {{ old('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="criteria" class="col-sm-12">Upload (Maks 1,5 mb)</label>
                    <div class="col-sm-12">
                        <input type="file" name="upload_file" id="upload_file"/>
                    </div>
                </div>

                <div class="form-group">
                    <a type="button" class="btn btn-secondary" href="{{route('admin.renstra.index')}}" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary" id="savedata" value="create">Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- End of Main Content -->
@endsection

@push('notif')
    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('warning'))
        <div class="alert alert-warning border-left-warning alert-dismissible fade show" role="alert">
            {{ session('warning') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
@endpush

@push('js')
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
@endpush

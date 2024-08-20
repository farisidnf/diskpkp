 <!-- Modal Header -->
 <div class="modal-header">
    <h4 class="modal-title">Tambah Indikator Sasaran Baru</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<!-- Modal body -->
<div class="modal-body">
        <form id="form-indikator-sasaran" class="form">
                <input type="hidden" name="fk_iku_indikator_tujuan" id="fk_iku_indikator_tujuan" value="{{$tujuan_id}}">

                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label for="judul">Indikator Sasaran<span class="text-danger">*</span></label>
                            <textarea class="type-text form-control" name="judul" id="judul" cols="30" rows="10" placeholder="Masukkan indikator sasaran.."></textarea>
                            <span id="judul-error" class="error invalid-feedback"></span>
                        </div>
                    </div>
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label for="fk_satuan">Satuan<span class="text-danger">*</span></label>
                            <select class="type-select form-control" name="fk_satuan" id="fk_satuan">
                                <option value="">Pilih Satuan</option>
                                @foreach($satuans as $satuan)
                                <option value="{{$satuan->id}}">{{$satuan->nama}}</option>
                                @endforeach
                            </select>
                            <span id="fk_satuan-error" class="error invalid-feedback"></span>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="kondisi_awal">Kondisi Awal<span class="text-danger">*</span></label>
                            <input type="text" class="text-right decimal type-text form-control" id="kondisi_awal" name="kondisi_awal" placeholder="Masukkan Kondisi Awal...">
                            <span id="kondisi_awal-error" class="error invalid-feedback"></span>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="target_tahunan">Target Tahunan<span class="text-danger">*</span></label>
                            <input type="text" class="text-right decimal type-text form-control" id="target_tahunan" name="target_tahunan" placeholder="Masukkan Target Tahunan...">
                            <span id="target_tahunan-error" class="error invalid-feedback"></span>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="target_triwulan_1">Target Triwulan 1<span class="text-danger">*</span></label>
                            <input type="text" class="text-right decimal type-text form-control" id="target_triwulan_1" name="target_triwulan_1" placeholder="Masukkan Target Triwulan 1...">
                            <span id="target_triwulan_1-error" class="error invalid-feedback"></span>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="target_triwulan_2">Target Triwulan 2<span class="text-danger">*</span></label>
                            <input type="text" class="text-right decimal type-text form-control" id="target_triwulan_2" name="target_triwulan_2" placeholder="Masukkan Target Triwulan 2...">
                            <span id="target_triwulan_2-error" class="error invalid-feedback"></span>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="target_triwulan_3">Target Triwulan 3<span class="text-danger">*</span></label>
                            <input type="text" class="text-right decimal type-text form-control" id="target_triwulan_3" name="target_triwulan_3" placeholder="Masukkan Target Triwulan 3...">
                            <span id="target_triwulan_3-error" class="error invalid-feedback"></span>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="target_triwulan_4">Target Triwulan 4<span class="text-danger">*</span></label>
                            <input type="text" class="text-right decimal type-text form-control" id="target_triwulan_4" name="target_triwulan_4" placeholder="Masukkan Target Triwulan 4...">
                            <span id="target_triwulan_4-error" class="error invalid-feedback"></span>
                        </div>
                    </div>

                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="type-text form-control" name="keterangan" id="keterangan" cols="30" rows="10" placeholder="Masukkan Keterangan.."></textarea>
                            <span id="keterangan-error" class="error invalid-feedback"></span>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-12">
                        <span class="badge bg-light-warning mb-3">Bertanda <span class="text-danger">*</span> harus diisi!</span>
                    </div>
                    <div class="btn-block-m col-md-6 col-sm-6 col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                    </div>
                </div>

        </form>
</div>
<script>
    $(document).ready(function() {

        $(".decimal").on('input paste', function() {
            newval = formatRupiah(this.value, "");
            $(this).val(newval);
        });

        $('#form-indikator-sasaran').on('submit', e => {
            e.preventDefault();
            var formData = new FormData($('#form-indikator-sasaran')[0]);
            // Ubah Link Store Data
            var url = "{{ url('storesasaran') }}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: 'POST',
                dataType: "JSON",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $(".loading-full").fadeIn('500');
                    $('.form-group').removeClass('is-invalid');
                    $('.form-group').children().removeClass('is-invalid');
                    $('.invalid-feedback').html("");
                },
                success: function(response) {
                    if (response.responsedata.status) {
                        $("#modalIkuDtl").modal('hide');
                        Toastify({
                            escapeMarkup: false,
                            text: '<i class="bi bi-check-circle"></i> ' + response.responsedata.message,
                            duration: response.responsedata.duration,
                            stopOnFocus: true,
                            gravity: "top",
                            position: "right",
                            close: true,
                            className: "bg-" + response.responsedata.icon,
                            callback: () => {
                                window.location.reload();
                            }
                        }).showToast()
                    } else {
                        Toastify({
                            escapeMarkup: false,
                            text: response.responsedata.message,
                            duration: response.responsedata.duration,
                            stopOnFocus: true,
                            gravity: "top",
                            position: "right",
                            close: true,
                            className: "bg-" + response.responsedata.icon,
                        }).showToast()
                    }
                },
                error: function(xhr, status) {
                    let errMessage = xhr.responseJSON.message ?? xhr.responseJSON.meta.message;
                    errMessage = errMessage.toString();
                    errMessage = errMessage.replace("and", "dan");
                    errMessage = errMessage.replace("more", "kesalahan");
                    errMessage = errMessage.replace("errors", "lainnya");
                    errMessage = errMessage.replace("error", "lainnya");
                    Toastify({
                        escapeMarkup: false,
                        text: '<i class="bi bi-exclamation-circle"></i> ' + errMessage,
                        duration: 3000,
                        stopOnFocus: true,
                        gravity: "top",
                        position: "right",
                        close: true,
                        className: "bg-danger"
                    }).showToast();
                    var dataerrors = JSON.parse(xhr.responseText);
                    $no = 1;
                    $.each(dataerrors.errors, function(key, value) {
                        //   console.log(key)
                        //   console.log(value)
                        namaClass = $('#' + key).attr("class");
                        if (namaClass.indexOf("type-text") > -1) {
                            $('#' + key).addClass('is-invalid');
                            $('#' + key + '-error').html(value);
                            if ($no == 1) {
                                $('#' + key).focus();
                            }
                        }else if (namaClass.indexOf("type-select") > -1) {
                            // $('#' + key).parent().addClass('is-invalid');
                            $('#' + key).addClass('is-invalid');
                            $('#' + key + '-error').html(value);
                            if ($no == 1) {
                                $('#' + key).focus();
                            }
                        }
                        $no++;
                    });
                    $(".loading-full").hide(500);
                },
                complete: function() {
                    $(".loading-full").hide(500);
                }
            });
        });
    });
   
</script>

<!-- Modal footer -->
<!-- <div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div> -->
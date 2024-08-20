 <!-- Modal Header -->
 <div class="modal-header">
    <h4 class="modal-title">Update Indikator Sasaran</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<!-- Modal body -->
<div class="modal-body">
        <form id="form-indikator-sasaran" class="form">
                
                <input type="hidden" name="id_data" id="id_data" value="{{$data->id}}">

                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label for="judul">Indikator Sasaran<span class="text-danger">*</span></label>
                            <textarea readonly class="type-text form-control" cols="30" rows="10" placeholder="Masukkan indikator sasaran..">{{$data->judul}}</textarea>
                            <span id="judul-error" class="error invalid-feedback"></span>
                        </div>
                    </div>
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label for="fk_satuan">Satuan</label>
                            <input readonly type="text" class="form-control" value="{{$data->satuan_r->nama}}">
                            <span id="fk_satuan-error" class="error invalid-feedback"></span>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="target_tahunan">Target Tahunan</label>
                            <input readonly type="text" class="text-right decimal type-text form-control" placeholder="Masukkan Target Tahunan..." value="{{editRupiah($data->target_tahunan)}}">
                            <span id="target_tahunan-error" class="error invalid-feedback"></span>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="realisasi_tahunan">Realisasi Tahunan</label>
                            <input type="text" class="text-right decimal type-text form-control" id="realisasi_tahunan" name="realisasi_tahunan" placeholder="Masukkan Realisasi Tahunan..." value="{{editRupiah($data->realisasi_tahunan)}}">
                            <span id="realisasi_tahunan-error" class="error invalid-feedback"></span>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="target_triwulan_1">Target Triwulan 1</label>
                            <input type="text" class="text-right decimal type-text form-control" readonly placeholder="Masukkan Target Triwulan 1..." value="{{editRupiah($data->target_triwulan_1)}}">
                            <span id="target_triwulan_1-error" class="error invalid-feedback"></span>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="realisasi_triwulan_1">Realisasi Triwulan 1</label>
                            <input type="text" class="text-right decimal type-text form-control" id="realisasi_triwulan_1" name="realisasi_triwulan_1" placeholder="Masukkan Realisasi Triwulan 1..." value="{{editRupiah($data->realisasi_triwulan_1)}}">
                            <span id="realisasi_triwulan_1-error" class="error invalid-feedback"></span>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="target_triwulan_2">Target Triwulan 2</label>
                            <input type="text" class="text-right decimal type-text form-control" readonly placeholder="Masukkan Target Triwulan 2..." value="{{editRupiah($data->target_triwulan_2)}}">
                            <span id="target_triwulan_2-error" class="error invalid-feedback"></span>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="realisasi_triwulan_2">Realisasi Triwulan 2</label>
                            <input type="text" class="text-right decimal type-text form-control" id="realisasi_triwulan_2" name="realisasi_triwulan_2" placeholder="Masukkan Realisasi Triwulan 2..." value="{{editRupiah($data->realisasi_triwulan_2)}}">
                            <span id="realisasi_triwulan_2-error" class="error invalid-feedback"></span>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="target_triwulan_3">Target Triwulan 3</label>
                            <input type="text" class="text-right decimal type-text form-control" readonly placeholder="Masukkan Target Triwulan 3..." value="{{editRupiah($data->target_triwulan_3)}}">
                            <span id="target_triwulan_3-error" class="error invalid-feedback"></span>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="realisasi_triwulan_3">Realisasi Triwulan 3</label>
                            <input type="text" class="text-right decimal type-text form-control" id="realisasi_triwulan_3" name="realisasi_triwulan_3" placeholder="Masukkan Realisasi Triwulan 3..." value="{{editRupiah($data->realisasi_triwulan_3)}}">
                            <span id="realisasi_triwulan_3-error" class="error invalid-feedback"></span>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="target_triwulan_4">Target Triwulan 4</label>
                            <input type="text" class="text-right decimal type-text form-control" readonly placeholder="Masukkan Target Triwulan 4..." value="{{editRupiah($data->target_triwulan_4)}}">
                            <span id="target_triwulan_4-error" class="error invalid-feedback"></span>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="realisasi_triwulan_4">Realisasi Triwulan 4</label>
                            <input type="text" class="text-right decimal type-text form-control" id="realisasi_triwulan_4" name="realisasi_triwulan_4" placeholder="Masukkan Realisasi Triwulan 4..." value="{{editRupiah($data->realisasi_triwulan_4)}}">
                            <span id="realisasi_triwulan_4-error" class="error invalid-feedback"></span>
                        </div>
                    </div>

                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label for="bukti_dukung">Bukti Dukung</label>
                            <textarea class="type-text form-control" name="bukti_dukung" id="bukti_dukung" cols="30" rows="10" placeholder="Masukkan Bukti Dukung..">{{$data->bukti_dukung}}</textarea>
                            <span id="bukti_dukung-error" class="error invalid-feedback"></span>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="link_bukti_dukung">Link Bukti Dukung</label>
                            <input type="text" class="type-text form-control" id="link_bukti_dukung" name="link_bukti_dukung" placeholder="Masukkan Link Bukti Dukung..." value="{{editRupiah($data->link_bukti_dukung)}}">
                            <span id="link_bukti_dukung-error" class="error invalid-feedback"></span>
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
            var url = "{{ url('storesasaran-user') }}";
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
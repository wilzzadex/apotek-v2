@extends('back.master')
@section('breadcumb')
Transaksi / Pembelian Obat
@endsection

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content" style="margin-top: -50px">
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">

            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h5>Pembelian Obat</h5>
                    </div>
                    <div class="card-toolbar">

                        {{-- <a href="{{ route('unit.add') }}" class="btn btn-primary font-weight-bolder">
                            <span class="svg-icon svg-icon-md">
                                <i class="fas fa-plus"></i>
                            </span>Tambah Unit</a> --}}
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('order.store') }}" id="form_add_order" method="POST">
                        @csrf
                        <div class="row" style="padding:10px;border: 1px solid grey">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>No Faktur</label>
                                            <span class="text-danger">*</span></label>
                                            <input type="text" name="no_faktur" class="form-control"
                                                placeholder="No Faktur" id="no_faktur">
                                        </div>
                                        <div class="form-gorup">
                                            <label>Tanggal Faktur</label>
                                            <span class="text-danger">*</span></label>
                                            <div class="input-group input-group-solid date" id="kt_datetimepicker_3"
                                                data-target-input="nearest">
                                                <input type="text" name="tanggal_faktur" autocomplete="off"
                                                    class="form-control form-control-solid datetimepicker-input"
                                                    placeholder="Pilih Tanggal" data-target="#kt_datetimepicker_3" />
                                                <div class="input-group-append" data-target="#kt_datetimepicker_3"
                                                    data-toggle="datetimepicker">
                                                    <span class="input-group-text">
                                                        <i class="ki ki-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Suplier</label>
                                            <span class="text-danger">*</span></label>
                                            <select style="width: 100%" name="suplier_id" id="suplier_id"
                                                class="form-control">
                                                <option value="">- Pilih Suplier -</option>
                                                @foreach ($suplier as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_suplier }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <label>Jenis Pembelian</label>
                                                <span class="text-danger">*</span></label>
                                                <select name="jenis" id="jenis" class="form-control">
                                                    <option value="">- Pilih Jenis -</option>
                                                    <option value="Tunai">Tunai</option>
                                                    <option value="Kredit">Kredit</option>
                                                </select>
                                            </div>
                                            <div class="col-6" id="jt" style="display:none">
                                                <label>Jatuh Tempo</label>
                                                <span class="text-danger">*</span></label>
                                                <span class="text-danger">*</span></label>
                                                <div class="input-group input-group-solid date" id="kt_datetimepicker_4"
                                                    data-target-input="nearest">
                                                    <input type="text" required name="jatuh_tempo" id="jatuh_tempo"
                                                        class="form-control form-control-solid datetimepicker-input"
                                                        placeholder="Pilih Tanggal"
                                                        data-target="#kt_datetimepicker_3" />
                                                    <div class="input-group-append" data-target="#kt_datetimepicker_4"
                                                        data-toggle="datetimepicker">
                                                        <span class="input-group-text">
                                                            <i class="ki ki-calendar"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row mt-3" style="padding:10px;border: 1px solid grey">
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                data-target=".bd-example-modal-lg">Tambah Obat</button>
                            <div class="col-12">
                                <div class="row mt-3">
                                    <div class="col-12" id="renderTabel">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3" style="padding:10px;border: 1px solid grey">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Total 1 (Rp)</label>
                                            <input type="text" readonly name="total_1"
                                                class="form-control-solid form-control" value="0"
                                                placeholder="No Faktur" id="total_1">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label>Potongan Penjualan (Rp)</label>
                                            </div>

                                            <div class="col-12">
                                                <input type="text" readonly name="pot_pen"
                                                    class="form-control-solid form-control" value="0"
                                                    placeholder="No Faktur" id="pot_pen">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Total 2 (Rp)</label>
                                            <input type="text" readonly name="total_2"
                                                class="form-control-solid form-control" value="0"
                                                placeholder="No Faktur" id="total_2">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label>Pajak (%)</label>
                                            </div>
                                            <div class="col-4">
                                                <input type="text" name="pajak_total" value="0" min="0"
                                                    class="form-control" value="0" placeholder="No Faktur"
                                                    id="pajak_total">
                                            </div>
                                            <div class="col-8">
                                                <input type="text" readonly name="nominal_pajak_total"
                                                    class="form-control-solid form-control" value="0"
                                                    placeholder="No Faktur" id="nominal_pajak_total">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Biaya Lainnya (%)</label>
                                            <input type="text" name="biaya_lain" class="form-control"
                                                data-toggle="tooltip"
                                                title="Jika ada biaya tambahan seperti biaya pengiriman barang atau jasa bisa ditambahkan di sini"
                                                value="0" placeholder="Biaya Lain ..." id="biaya_lain">
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Tagihan</label>
                                            <input type="text" readonly name="jumlah_tagihan"
                                                class="form-control-solid form-control" value="0"
                                                placeholder="No Faktur" id="jumlah_tagihan">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success float-right">Simpan</button> &nbsp;
                                        <button type="button" class="btn btn-warning float-right mr-1">Cetak</button>
                                        &nbsp;
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="width: 1000px">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Obat Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    X
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form_add_obat">
                    @csrf

                    <div class="row">
                        <div class="col-4 mt-2">
                            <label>Nama Obat</label>
                            <span class="text-danger">*</span></label>
                            <select name="obat_id" style="width: 100%" class="form-control" id="obat_id">
                                <option value="">- Pilih Obat -</option>
                                @foreach ($obat as $item)
                                <option value="{{ $item->kode_obat }}">{{ $item->kode_obat }}-{{ $item->nama_obat }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4 mt-2">
                            <label>No Batch</label>
                            <span class="text-danger">*</span></label>
                            <input type="text" style="text-transform: uppercase" name="no_batch" class="form-control"
                                placeholder="No Batch" id="no_batch">
                        </div>
                        <div class="col-4 mt-2">
                            <label>Jumlah</label>
                            <span class="text-danger">*</span></label>
                            <input type="number" name="jumlah_obat" class="form-control" placeholder="Jumlah" min="0"
                                id="jumlah_obat">
                        </div>
                        <div class="col-4 mt-2">
                            <label>Unit</label>
                            <span class="text-danger">*</span></label>
                            <select name="unit_id" style="width: 100%" class="form-control" id="unit_id">
                                {{-- <option value="">- Pilih Satuan -</option>
                                @foreach ($unit as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                        <div class="col-4 mt-2">
                            <label>Tanggal Expired</label>
                            <span class="text-danger">*</span></label>
                            <div class="input-group input-group-solid date" id="tgl_exp" data-target-input="nearest">
                                <input type="text" name="tgl_exp"
                                    class="form-control form-control-solid datetimepicker-input"
                                    placeholder="Pilih Tanggal" data-target="#tgl_exp" />
                                <div class="input-group-append" data-target="#tgl_exp" data-toggle="datetimepicker">
                                    <span class="input-group-text">
                                        <i class="ki ki-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mt-2">
                            <label>Harga Beli (Rp)</label>
                            <span class="text-danger">*</span></label>
                            <input type="text" name="harga_beli" class="form-control" placeholder="Harga Beli"
                                id="harga_beli">
                        </div>
                        <div class="col-4 mt-2">
                            <label>Diskon (%)</label>
                            <input type="number" name="diskon" class="form-control" min="0" placeholder="Diskon"
                                id="diskon">
                        </div>
                        <div class="col-4 mt-2">
                            <label>Margin Harga Jual (%)</label>
                            <input type="number" name="margin_jual" class="form-control" min="0"
                                placeholder="Margin Harga Jual" id="margin_jual">
                        </div>
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary float-right" id="btn-tambah">Tambah</button>
                            {{-- <button type="button" class="btn btn-warning float-right" id="btn-ubah">Ubah</button>
                            --}}
                            <button type="button" class="btn btn-secondary float-right"
                                data-dismiss="modal">Batal</button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" id="modalEditObat" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">

</div>

@endsection
@section('js-custom')
<script src="{{ asset('assets/backend') }} /plugins/custom/datatables/datatables.bundle.js"></script>

<script>
    $(document).ready(function () {
        renderTabel();
        renderLain();
        // $('#jatuh_tempo').removeAttr('required');​​​​​
        document.getElementById('jatuh_tempo').required = false;
    })

    $('#obat_id').on('change',function(){
        let id = $(this).find(':selected').val();
        $.ajax({
            url : '{{ route("get.obat.unit") }}',
            type : 'get',
            data : {
                id : id,
            },
            success : function(res){
                $('#unit_id').html(res)
                $('#unit_id').select2()
            }
        })
    })

    function obat_change(thiss){
        // alert('tes')
        let id = $(thiss).find(':selected').val();
        $.ajax({
            url : '{{ route("get.obat.unit") }}',
            type : 'get',
            data : {
                id : id,
            },
            success : function(res){
                $('#unit_id_edit').html(res)
                $('#unit_id_edit').select2()
            }
        })
    }

    @if (session('success'))
        customAlert('Sukses !', '{{ session("success") }}', 'success')
    @endif

    $('#tgl_exp').datetimepicker({
        format: 'L'
    });
    $('#kt_datetimepicker_4').datetimepicker({
        format: 'L'
    });
    $('#kt_datetimepicker_3').datetimepicker({
        format: 'L'
    });

    $('#suplier_id').select2();
    $('#obat_id').select2();
    $('#unit_id').select2();

    $('#jenis').on('change', function () {
        let jenis = $(this).find(':selected').val();
        if (jenis == 'Kredit') {
            $('#jt').css('display', '');
            document.getElementById('jatuh_tempo').required = true;
            // $('#jatuh_tempo').prop('required',true);
        } else {
            $('#jt').css('display', 'none');
            document.getElementById('jatuh_tempo').required = false;
            // $('#jatuh_tempo').removeAttr('required');​​​​​
        }
    })

    $("#no_batch").on({
        keydown: function (e) {
            if (e.which === 32)
                return false;
        },
        change: function () {
            this.value = this.value.replace(/\s/g, "");
        }
    });

    $('#harga_beli').mask('000.000.000', { reverse: true });
    $('#biaya_lain').mask('000.000.000', { reverse: true });


    function renderTabel() {
        $.ajax({
            url: '{{ route("order.render.tabel") }}',
            type: 'get',
            success: function (res) {
                $('#renderTabel').html(res);
            }
        })
    }

    function renderLain() {
        $.ajax({
            url: '{{ route("order.render.other") }}',
            type: 'get',
            success: function (res) {
                $('#total_1').mask('000.000.000', { reverse: true }).val(res.total_1).trigger('input');
                $('#total_2').mask('000.000.000', { reverse: true }).val(res.total_2).trigger('input');
                $('#pot_pen').mask('000.000.000', { reverse: true }).val(res.pot_pen).trigger('input');
                hitungPajak(parseInt(res.total_2));
                hitungTagihan();
            }
        })
    }

    function hitungPajak(total) {
        let pajak_total = $('#pajak_total').val();
        let biaya_lain = $('#biaya_lain').val();
        let nominal_pajak = ((Number(pajak_total) / 100) * parseInt(total)).toFixed(2);
        $('#nominal_pajak_total').mask('000.000.000', { reverse: true }).val(parseInt(nominal_pajak)).trigger('input');
        $('#jumlah_tagihan').val()
    }

    function hitungTagihan() {
        let total = ($('#total_2').val()).replace(/\./g, "");
        let nominal_pajak = ($('#nominal_pajak_total').val()).replace(/\./g, "");
        let biaya = ($('#biaya_lain').val()).replace(/\./g, "");
        let tagihan = parseInt(total) + parseInt(nominal_pajak) + parseInt(biaya);
        $('#jumlah_tagihan').mask('000.000.000', { reverse: true }).val(parseInt(tagihan)).trigger('input');
    }


    $('#biaya_lain').on('keyup', function () {
        let values = $(this).val();
        let fix_val = values.replace(/\./g, "");
        hitungTagihan();
    })

    $('#pajak_total').on('keyup', function () {
        let total = $('#total_2').val();
        let fix_total = total.replace(/\./g, "");
        let values = $(this).val();
        let fix_val = values.replace(/\./g, "");
        let nominal_pajak = ((Number(fix_val) / 100) * parseInt(fix_total))
        $('#nominal_pajak_total').mask('000.000.000', { reverse: true }).val(parseInt(nominal_pajak)).trigger('input');
        hitungTagihan()
    })

    function editObat(obj) {
        let id = $(obj).attr('id');
        // alert(id)
        $.ajax({
            url: '{{ route("order.edit.obat") }}',
            type: 'get',
            data: {
                id: id,
            },
            beforeSend: function () {
                myBlock()
            },
            success: function (res) {
                $('#modalEditObat').html(res);
                $('#modalEditObat').modal('show');
                KTApp.unblockPage();
                $('#harga_beli_edit').mask('000.000.000', { reverse: true });
                $('#obat_id_edit').select2();
                $('#unit_id_edit').select2();
                $('#tgl_exp_edit').datetimepicker({
                    format: 'L'
                });
                runValidatoredit();
            }
        })
    }

    function deleteObat(obj) {
        let id = $(obj).attr('id');
        Swal.fire({
            title: "Anda Yakin ?" + id,
            text: "Data akan terhapus permanen",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, Hapus saja!",
            cancelButtonText: "Tidak, Batalkan!",
            reverseButtons: true
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: '{{ route("order.destroy.obat") }}',
                    type: 'get',
                    data: {
                        id: id,
                    },
                    beforeSend: function () {
                        KTApp.blockPage({
                            overlayColor: '#000000',
                            state: 'danger',
                            message: 'Silahkan Tunggu...'
                        });

                    },
                    success: function (res) {
                        KTApp.unblockPage();
                        // console.log(res);
                        Swal.fire(
                            "Terhapus!",
                            "Data berhasil di hapus.",
                            "success"
                        );
                        renderTabel();
                        renderLain();
                    }
                })
            }
        });
    }


    var runValidator = function () {
        var form = $('#form_add_obat');
        var errorHandler = $('.errorHandler', form);
        var successHandler = $('.successHandler', form);
        form.validate({
            errorElement: "span", // contain the error msg in a span tag
            errorClass: 'invalid-feedback',
            errorPlacement: function (error, element) {
                // Add the `invalid-feedback` class to the error element
                error.addClass("invalid-feedback");

                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.next("label"));
                } else {
                    error.insertAfter(element);
                }
            },
            ignore: "",
            rules: {
                obat_id: {
                    required: true,
                },
                no_batch: {
                    required: true,
                    maxlength: 20,
                    minlength: 5,
                },
                jumlah_obat: {
                    required: true,
                    digits: true,
                },
                unit_id: {
                    required: true,
                },
                tgl_exp: {
                    required: true,
                },
                harga_beli: {
                    required: true,
                },
            },
            messages: {

            },
            errorElement: "em",
            invalidHandler: function (event, validator) { //display error alert on form submit
                successHandler.hide();
                errorHandler.show();
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            },
            success: function (label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.validate ').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function (form) {
                // $('#alert').hide();
                successHandler.show();
                errorHandler.hide();
                // submit form
                if (successHandler.show()) {

                    $.ajax({
                        url: '{{ route("order.temp") }}',
                        type: 'post',
                        data: $('#form_add_obat').serialize(),
                        beforeSend: function () {
                            myBlock()
                        },
                        success: function (res) {

                            KTApp.unblockPage();
                            if (res == 'ada') {
                                customAlert('Gagal', 'Obat sudah ada di daftar', 'warning');
                            } else {
                                renderTabel();
                                renderLain();
                            }
                        },
                        error: function () {
                            KTApp.unblockPage();
                        }
                    })
                    // console.log(form.serialize());
                }
            }
        });
    };
    var runValidatoredit = function () {
        var form = $('#form_edit_obat');
        var errorHandler = $('.errorHandler', form);
        var successHandler = $('.successHandler', form);
        form.validate({
            errorElement: "span", // contain the error msg in a span tag
            errorClass: 'invalid-feedback',
            errorPlacement: function (error, element) {
                // Add the `invalid-feedback` class to the error element
                error.addClass("invalid-feedback");

                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.next("label"));
                } else {
                    error.insertAfter(element);
                }
            },
            ignore: "",
            rules: {
                obat_id: {
                    required: true,
                },
                no_batch: {
                    required: true,
                    maxlength: 20,
                    minlength: 5,
                },
                jumlah_obat: {
                    required: true,
                    digits: true,
                },
                unit_id: {
                    required: true,
                },
                tgl_exp: {
                    required: true,
                },
                harga_beli: {
                    required: true,
                },
            },
            messages: {

            },
            errorElement: "em",
            invalidHandler: function (event, validator) { //display error alert on form submit
                successHandler.hide();
                errorHandler.show();
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            },
            success: function (label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.validate ').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function (form) {
                // $('#alert').hide();
                successHandler.show();
                errorHandler.hide();
                // submit form
                if (successHandler.show()) {

                    $.ajax({
                        url: '{{ route("order.update.temp") }}',
                        type: 'post',
                        data: $('#form_edit_obat').serialize(),
                        beforeSend: function () {
                            myBlock()
                        },
                        success: function (res) {
                            // console.log(res)
                            customAlert('Sukses', 'Data berhasil di ubah', 'success')
                            KTApp.unblockPage();
                            if (res == 'ada') {
                                customAlert('Gagal', 'Obat sudah ada di daftar', 'warning');
                            } else {
                                $('#modalEditObat').modal('hide');
                                renderTabel();
                                renderLain();
                            }
                        },
                        error: function () {
                            KTApp.unblockPage();
                        }
                    })
                }
            }
        });
    };
    runValidator();

    var runValidatorOrder = function () {
        var form = $('#form_add_order');
        var errorHandler = $('.errorHandler', form);
        var successHandler = $('.successHandler', form);
        form.validate({
            errorElement: "span", // contain the error msg in a span tag
            errorClass: 'invalid-feedback',
            errorPlacement: function (error, element) {
                // Add the `invalid-feedback` class to the error element
                error.addClass("invalid-feedback");

                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.next("label"));
                } else {
                    error.insertAfter(element);
                }
            },
            ignore: "",
            rules: {
                no_faktur: {
                    required: true,
                    minlength: 3,
                    maxlength: 20,
                },
                tanggal_faktur: {
                    required: true,
                },
                suplier: {
                    required: true,
                },
                jenis: {
                    required: true,
                },
                total_1: {
                    required: true,
                    //    digits : true,
                },
                total_2: {
                    required: true,
                    //    digits : true,
                },
                jumlah_tagihan: {
                    required: true,
                },
                jml_item: {
                    required: true,
                }
            },
            messages: {
                jml_item: {
                    required: "Transaksi tidak bisa di simpan jika tidak ada data obat !"
                }
            },
            errorElement: "em",
            invalidHandler: function (event, validator) { //display error alert on form submit
                successHandler.hide();
                errorHandler.show();
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            },
            success: function (label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.validate ').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function (form) {
                // $('#alert').hide();
                successHandler.show();
                errorHandler.hide();
                // submit form
                if (successHandler.show()) {

                    myBlock();
                    form.submit();
                }
            }
        });
    };

    runValidatorOrder()


</script>
@endsection
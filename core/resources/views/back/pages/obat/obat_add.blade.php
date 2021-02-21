@extends('back.master')
@section('breadcumb')
    Data Suplier / Tambah Obat
@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content" style="margin-top: -50px">
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Obat</h3>
                        </div>
                        <div class="container">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        <!--begin::Form-->
                        <form method="POST" action="{{ route('obat.store') }}" id="userAdd">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kode Obat
                                    <span class="text-danger">*</span></label>
                                    <input type="text" value="{{ old('kode_obat') }}" style="text-transform: uppercase" id="kt_maxlength_3" maxlength="10" class="form-control" name="kode_obat" placeholder="Contoh : OBT028971" />
                                </div>
                                <div class="form-group">
                                    <label>Nama Obat</label>
                                    <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{ old('nama_obat') }}" name="nama_obat" placeholder="Nama Obat" />
                                </div>
                                <div class="form-group">
                                    <label>Kategori Obat</label>
                                    <span class="text-danger">*</span></label>
                                    <select name="kategori_obat" id="kategori_obat" style="width: 100%" class="form-control">
                                        <option value="">- Pilih Kategori -</option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}" {{ $item->id == old('kategori_obat') ? 'selected' : '' }}>{{ $item->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Golongan Obat</label>
                                    <span class="text-danger">*</span></label>
                                    <select name="golongan_obat" id="golongan_obat" style="width: 100%" class="form-control">
                                        <option value="">- Pilih Golongan -</option>
                                        @foreach ($golongan as $item)
                                            <option value="{{ $item->id }}" {{ $item->id == old('golongan_obat') ? 'selected' : '' }}>{{ $item->nama_golongan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Stok Minimum
                                    <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="stok_minimum" value="{{ old('stok_minimum') }}" data-toggle="tooltip" title="Stok minimum adalah patokan jika obat kurang dari stok minimum akan ada peringatan" placeholder="Stok Minimum ..." />
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                   <textarea name="keterangan" class="form-control" cols="30" rows="5">{{ old('keterangan') }}</textarea>
                                </div>
                               
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
   
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection
@section('js-custom')
<script type="text/javascript">
    @if(session('success'))
        customAlert('Sukses !','{{ session("success") }}','success')
    @endif

    $('#kategori_obat').select2();
    $('#golongan_obat').select2();

    var runValidator = function () {
        var form = $('#userAdd');
        var errorHandler = $('.errorHandler', form);
        var successHandler = $('.successHandler', form);
        form.validate({
            errorElement: "span", // contain the error msg in a span tag
            errorClass: 'invalid-feedback',
            errorPlacement: function ( error, element ) {
                // Add the `invalid-feedback` class to the error element
                error.addClass( "invalid-feedback" );

                if ( element.prop( "type" ) === "checkbox" ) {
                    error.insertAfter( element.next( "label" ) );
                } else {
                    error.insertAfter( element );
                }
            },
            ignore: "",
            rules: {
               kode_obat : {
                   required : true,
               },
               nama_obat : {
                   required : true,
               },
               kategori_obat : {
                   required : true,
               },
               golongan_obat : {
                   required : true,
               },
               stok_minimum : {
                   required : true,
               }
                
            },
            messages: {
                no_telp: {
                    maxlength : "Maksimal 13 digit !",
                    digits: "Masukan dalam bentuk angka saja !"
                },
            },
            errorElement: "em",
            invalidHandler: function (event, validator) { //display error alert on form submit
                successHandler.hide();
                errorHandler.show();
            },
            highlight: function ( element, errorClass, validClass ) {
                $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
            },
            unhighlight: function (element, errorClass, validClass) {
                $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
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
                    myBlock()
                    form.submit();
                }
            }
        });
    };
    runValidator();
</script>
@endsection
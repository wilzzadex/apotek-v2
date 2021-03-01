@extends('back.master')
@section('breadcumb')
    Menu Kasir
@endsection

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Invoice 2</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Pages</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Invoice 2</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Actions-->
                <a href="#" class="btn btn-light-primary font-weight-bolder btn-sm">Actions</a>
                <!--end::Actions-->
                <!--begin::Dropdown-->
                <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
                    <a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="svg-icon svg-icon-success svg-icon-2x">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Files/File-plus.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right p-0 m-0">
                        <!--begin::Navigation-->
                        <ul class="navi navi-hover">
                            <li class="navi-header font-weight-bold py-4">
                                <span class="font-size-lg">Choose Label:</span>
                                <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
                            </li>
                            <li class="navi-separator mb-3 opacity-70"></li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-text">
                                        <span class="label label-xl label-inline label-light-success">Customer</span>
                                    </span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-text">
                                        <span class="label label-xl label-inline label-light-danger">Partner</span>
                                    </span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-text">
                                        <span class="label label-xl label-inline label-light-warning">Suplier</span>
                                    </span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-text">
                                        <span class="label label-xl label-inline label-light-primary">Member</span>
                                    </span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-text">
                                        <span class="label label-xl label-inline label-light-dark">Staff</span>
                                    </span>
                                </a>
                            </li>
                            <li class="navi-separator mt-3 opacity-70"></li>
                            <li class="navi-footer py-4">
                                <a class="btn btn-clean font-weight-bold btn-sm" href="#">
                                <i class="ki ki-plus icon-sm"></i>Add new</a>
                            </li>
                        </ul>
                        <!--end::Navigation-->
                    </div>
                </div>
                <!--end::Dropdown-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!-- begin::Card-->
            <div class="card card-custom overflow-hidden">
                <div class="card-body p-0">
                    <!-- begin: Invoice-->
                    <!-- begin: Invoice header-->
                    <form action="{{ route("store.penjualan") }}" method="POST" >
                        @csrf
                        <div class="row justify-content-center py-2 px-2 py-md-15 px-md-0">
                            <div class="col-md-9">
                                <div class="d-flex justify-content-between flex-column flex-md-row">
                                    <h3 class="display-5 font-weight-boldest mb-10">Kasir : {{ auth()->user()->name }}</h3>
                                    <div class="d-flex flex-column align-items-md-end px-0 mb-1">
                                        <!--begin::Logo-->
                                        <a href="#" class="mb-5">
                                            Tanggal : {{ date('d M Y') }}
                                        </a>
                                        <!--end::Logo-->
                                        <span class="d-flex flex-column align-items-md-end opacity-70">
                                            @php
                                                $kode_transaksi = 'TRN-' . date('dmys');
                                            @endphp
                                            <span>Kode Transaksi : {{ $kode_transaksi }}</span>
                                            <input type="hidden" name="kode_transaksi" value="{{ $kode_transaksi }}">
                                        </span>
                                    </div>
                                </div>
                                {{-- <div class="border-bottom w-100"></div> --}}
                                <br>
                                <div class="row">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="keyword" placeholder="Ketik Nama / Kode Obat..."/>
                                        <div class="input-group-append">
                                        <button class="btn btn-primary" id="btn-cari" type="button">Cari Obat</button>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-12" id="tableShowObat">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice header-->
                        <!-- begin: Invoice body-->
                        <div class="row justify-content-center" style="margin-top: -50px">
                            <div class="col-md-9">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nama Obat</th>
                                                <th>Jumlah</th>
                                                <th>Satuan</th>
                                                <th>Harga</th>
                                                <th>Nominal Diskon</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableListObat">
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice body-->
                        <!-- begin: Invoice footer-->
                        <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0">
                            <div class="col-md-9">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="font-weight-bold text-muted text-uppercase">TOTAL BAYAR</th>
                                                <th class="font-weight-bold text-muted text-uppercase">UANG BAYAR.</th>
                                                <th class="font-weight-bold text-muted text-uppercase">UANG KEMBALI</th>
                                                <th class="font-weight-bold text-muted text-uppercase"></th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                            <tr class="font-weight-bolder">
                                                <td class="text-danger font-size-h3 font-weight-boldest"><input readonly type="text" id="total_bayar" class="form-control text-danger" name="total_bayar"></td>
                                                <td><input type="text" class="form-control" id="uang_bayar" required name="uang_bayar"></td>
                                                <td><input type="text" class="form-control" id="uang_kembali" name="uang_kembali"></td>
                                                <td></td>
                                                
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice footer-->
                        <!-- begin: Invoice action-->
                        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                            <div class="col-md-9">
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-primary font-weight-bold" onclick="window.print();">Print Struk</button>
                                    <button type="submit" class="btn btn-light-primary font-weight-bold">Simpan Transaksi</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- end: Invoice action-->
                    <!-- end: Invoice-->
                </div>
            </div>
            <!-- end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>

<div class="modal fade" id="modalPcs" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeSm" aria-hidden="true">
    
</div>
<div class="modal fade" id="modalDiskon" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeSm" aria-hidden="true">
    
</div>
@endsection

@section('js-custom')
<script>
    getListObat();
    getTotalBayar();

    @if(session("success"))
        customAlert('Sukses','Transaksi Berhasil','success');
    @endif

    $('#uang_bayar').mask('000.000.000', { reverse: true });
    $('#uang_bayar').on('keyup',function(){
        let total = $('#total_bayar').val();
        let fix_total = total.replace(/\./g, "");
        let uang_bayar = $(this).val();
        let fix_uang_bayar =  uang_bayar.replace(/\./g, "");
        let uang_kembali = parseInt(fix_total) - parseInt(fix_uang_bayar);
        $('#uang_kembali').mask('000.000.000', { reverse: true }).val(uang_kembali).trigger('input')
    })

    function deleteList(thiss){
        let id = $(thiss).attr('id');
        Swal.fire({
            title: "Anda Yakin ?",
            text: "Data akan terhapus permanen",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, Hapus saja!",
            cancelButtonText: "Tidak, Batalkan!",
            reverseButtons: true
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url : '{{ route("list.destroy") }}',
                    type : 'get',
                    data : {
                        id : id,
                    },
                    beforeSend: function(){
                        KTApp.blockPage({
                            overlayColor: '#000000',
                            state: 'danger',
                            message: 'Silahkan Tunggu...'
                        });
                    },
                    success: function(res){
                        KTApp.unblockPage();
                        getListObat();
                        getTotalBayar();
                    }
                })
            }
        });
    }

    function changePcs(thiss){
        let id = $(thiss).attr('id');
        $.ajax({
            url : '{{ route("kasir.change.pcs") }}',
            type : 'get',
            data : {
                id : id,
            },
            success: function(res){
                $('#modalPcs').html(res);
                $('#modalPcs').modal('show');
            }
        })
    }

    function getTotalBayar() {
        $.ajax({
            url : '{{ route("kasir.get.total") }}',
            type : 'get',
            success: function(res){
                console.log(res);
                $('#total_bayar').mask('000.000.000', { reverse: true }).val(res).trigger('input')
            }
        })
    }

    function  changeDiskon(thiss) {
        let id = $(thiss).attr('id');
        $.ajax({
            url : '{{ route("kasir.change.diskon") }}',
            type : 'get',
            data : {
                id : id,
            },
            success: function(res){
                console.log(res)
                $('#modalDiskon').html(res);
                $('#modalDiskon').modal('show');
            }
        })
    }

    $('#btn-cari').on('click', function(){
        $('#tableShowObat').html('');
        let keyword = $('#keyword').val();
        getObat(keyword);
    })

    document.querySelector('#keyword').addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            $('#tableShowObat').html('');
            let keyword = $('#keyword').val();
            getObat(keyword);
        }
    });

    function getListObat() {
        $.ajax({
            url : '{{ route("kasir.get.list") }}',
            type : 'get',
            success: function(res){
                $('#tableListObat').html(res);
            }
        })
    }

    function getObat(keyword){
        $.ajax({
            url : '{{ route("kasir.show.obat") }}',
            type : 'get',
            data : {
                keyword : keyword,
            },
            success: function(res){
                $('#tableShowObat').html(res);
            }
        })
    }

    function addToList(thiss){
        let id = $(thiss).attr('id');
        $.ajax({
            url : '{{ route("kasir.add.tolist") }}',
            data : {
                id : id,
            },
            success : function(res){
                if(res == 'ada'){
                    customAlert('','Obat sudah ada di list','warning');
                }else{
                    getListObat();
                }
            }
        })
    }
</script>
@endsection

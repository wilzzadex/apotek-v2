@extends('back.master')
@section('breadcumb')
    Menu Kasir
@endsection

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
   
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
                                        <table class="table" id="table-show">

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice header-->
                        <!-- begin: Invoice body-->
                        <div class="row justify-content-center" style="margin-top: -50px">
                            <div class="col-md-9">
                                <div class="table-responsive">
                                    <table class="table" id="tabel_obat">
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
                                                <td><input type="text" class="form-control" readonly id="uang_kembali" name="uang_kembali"></td>
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
                                    <button type="button" class="btn btn-primary font-weight-bold" id="btn-struk" disabled>Print Struk</button>
                                    <button type="submit" class="btn btn-light-primary font-weight-bold" id="btn-transaksi" disabled>Simpan Transaksi</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- end: Invoice action-->
                    <!-- end: Invoice-->
                    <form action="{{ route('kasir.print') }}" method="POST" target="_blank" id="form_struk">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="total_bayar" id="total_bayar_print">
                        <input type="hidden" name="uang_bayar" id="uang_bayar_print">
                        <input type="hidden" name="uang_kembali" id="uang_kembali_print">
                        <input type="hidden" name="no_transaksi" value="{{ $kode_transaksi }}" id="no_transaksi_print">
                    </form>
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
<script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js') }}"></script>

<script>
    getListObat();
    getTotalBayar();

    @if(session("success"))
        customAlert('Sukses','Transaksi Berhasil','success');
    @endif

    $('#btn-struk').on('click', function(){
        $('#total_bayar_print').val($('#total_bayar').val());
        $('#uang_bayar_print').val($('#uang_bayar').val());
        $('#uang_kembali_print').val($('#uang_kembali').val());
        $('#form_struk').submit();
        // $('#no_transaksi_print').val($('.kode_transaksi').val());
    });

    $('#uang_bayar').mask('000.000.000', { reverse: true });
    $('#uang_bayar').on('keyup',function(){
        let total = $('#total_bayar').val();
        let fix_total = total.replace(/\./g, "");
        let uang_bayar = $(this).val();
        let fix_uang_bayar =  uang_bayar.replace(/\./g, "");
        let uang_kembali = parseInt(fix_uang_bayar) - parseInt(fix_total);
        $('#uang_kembali').mask('000.000.000', { reverse: true }).val(uang_kembali).trigger('input')

        if(uang_bayar <= fix_total){
            document.getElementById('btn-struk').disabled = true;
            document.getElementById('btn-transaksi').disabled = true;
        }else{
            document.getElementById('btn-struk').disabled = false;
            document.getElementById('btn-transaksi').disabled = false;
        }
        if(uang_kembali >= 0){
            document.getElementById('btn-struk').disabled = false;
            document.getElementById('btn-transaksi').disabled = false;
        }else{
            document.getElementById('btn-struk').disabled = true;
            document.getElementById('btn-transaksi').disabled = true;
        }
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
        if(keyword == ''){
            $('#tableShowObat').html(`<div class="alert alert-warning">Data Obat Tidak Ada !</div>`);
        }else{
            $.ajax({
                url : '{{ route("kasir.show.obat") }}',
                type : 'get',
                data : {
                    keyword : keyword,
                },
                success: function(res){
                    if(res.kosong){
                        $('#tableShowObat').html(`<div class="alert alert-warning">Data Obat Tidak Ada !</div>`);
                    }else{
                        $('#tableShowObat').html(res.html);
                        $('#table-show').DataTable({
                            pageLength : 5,
                        });

                    }
                    
                }
            })
        }
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

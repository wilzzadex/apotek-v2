@extends('back.master')
@section('breadcumb')
    Transaksi / Histori Pembelian Obat
@endsection

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content" style="margin-top: -50px">
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-4">
                            
                            <div style="display: " id="filter_bulan">
                                <div class="row">
                                    <div class="col-8">
                                        <label for="">Pilih Bulan</label>
                                        <div class="input-group input-group-solid date" data-target-input="nearest">
                                            <select name="" id="input_tanggal" class="form-control">
                                                <option value="01" {{ date('m') == '01' ? 'selected' : '' }}>Januari</option>
                                                <option value="02" {{ date('m') == '02' ? 'selected' : '' }}>Februari</option>
                                                <option value="03" {{ date('m') == '03' ? 'selected' : '' }}>Maret</option>
                                                <option value="04" {{ date('m') == '04' ? 'selected' : '' }}>April</option>
                                                <option value="05" {{ date('m') == '05' ? 'selected' : '' }}>Mei</option>
                                                <option value="06" {{ date('m') == '06' ? 'selected' : '' }}>Juni</option>
                                                <option value="07" {{ date('m') == '07' ? 'selected' : '' }}>Juli</option>
                                                <option value="08" {{ date('m') == '08' ? 'selected' : '' }}>Agustus</option>
                                                <option value="09" {{ date('m') == '09' ? 'selected' : '' }}>September</option>
                                                <option value="10" {{ date('m') == '10' ? 'selected' : '' }}>Oktober</option>
                                                <option value="11" {{ date('m') == '11' ? 'selected' : '' }}>November</option>
                                                <option value="12" {{ date('m') == '12' ? 'selected' : '' }}>Desember</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label for="">Tahun</label>
                                        <select name="" class="form-control form-control-solid" id="input_tahun">
                                            <option value="2020" {{ date('Y') == '2020' ? 'selected' : '' }}>2020</option>
                                            <option value="2021" {{ date('Y') == '2021' ? 'selected' : '' }}>2021</option>
                                            <option value="2022" {{ date('Y') == '2022' ? 'selected' : '' }}>2022</option>
                                            <option value="2023" {{ date('Y') == '2023' ? 'selected' : '' }}>2023</option>
                                            <option value="2014" {{ date('Y') == '2024' ? 'selected' : '' }}>2024</option>
                                            <option value="2025" {{ date('Y') == '2025' ? 'selected' : '' }}>2025</option>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap py-3">
                   <div class="card-title">
                        Data Barang Masuk Bulan &nbsp; <span id="title-tabel"></span>
                       
                   </div>
                   
                    <div class="card-toolbar">
                        {{-- <a href="" class="btn btn-primary font-weight-bolder">
                        <span class="svg-icon svg-icon-md">
                           <i class="fas fa-plus"></i>
                        </span>Tambah</a> --}}
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    
                    <table class="table table-bordered" id="user_table">
                        <thead>
                            <tr>
                                <th width="10px">No.</th>
                                <th>No Faktur</th>
                                <th>Tanggal Faktur</th>
                                <th>Suplier</th>
                                <th>Jenis</th> 
                                <th>Pajak (%)</th>
                                <th>Jumlah Tagihan</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                                {{-- <th>Total (Rp)</th>  --}}
                                {{-- <th>Nama Barang</th>
                                <th>Reoder Jika barang kurang dari (Rolls)</th>
                                <th>Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
           
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection

@section('js-custom')
<script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script>

    // $(document).ready(function(){
        let input_tanggal = $('#input_tanggal').find(':selected').val();
        let input_tahun = $('#input_tahun').find(':selected').val();
        let title_tanggal = $('#input_tanggal').find(':selected').html();
        $('#title-tabel').html(' ' + title_tanggal + ' ' + input_tahun)

         renderTable(input_tanggal, input_tahun);

         $('#input_tanggal').on('change', function(){
            input_tanggal = $(this).find(':selected').val();
            $('#user_table').dataTable().fnDestroy();
            renderTable(input_tanggal, input_tahun);
            title_tanggal = $('#input_tanggal').find(':selected').html();
            $('#title-tabel').html(' ' + title_tanggal + ' ' + input_tahun)
        })

        $('#input_tahun').on('change', function(){
            input_tahun = $(this).find(':selected').val();
            $('#user_table').dataTable().fnDestroy();
            renderTable(input_tanggal, input_tahun);
            $('#title-tabel').html(' ' + title_tanggal + ' ' + input_tahun)
        })
    // })

   

    

    

    function renderTable(bulan,tahun){
        $('#user_table').DataTable({
            processing: true,
            serverSide: true,
            "ajax": {
                url : "{{ route('histori.pembelian.data') }}",
                type : 'get',
                data : {
                    tahun : input_tahun,
                    bulan : input_tanggal
                },
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'no_faktur', name: 'no_faktur'},
                {data: 'tgl_faktur', name: 'tgl_faktur'},
                {data: 'suplier_id', name: 'suplier_id'},
                {data: 'jenis', name: 'jenis'},
                {data: 'pajak', name: 'pajak'},
                {data: 'jumlah_tagihan', name: 'jumlah_tagihan'},
                {data: 'keterangan', name: 'keterangan'},
                {data: 'status_tagihan', name: 'status_tagihan'},
                {data: 'aksi', name: 'aksi'},
            ]
        })
    }
    

    // @if(session('msg'))
    //     Swal.fire('Sukses!','{{ session("success") }}','success');
    // @endif

    // var arrows;
    // if (KTUtil.isRTL()) {
    // arrows = {
    // leftArrow: '<i class="la la-angle-right"></i>',
    // rightArrow: '<i class="la la-angle-left"></i>'
    // }
    // } else {
    // arrows = {
    // leftArrow: '<i class="la la-angle-left"></i>',
    // rightArrow: '<i class="la la-angle-right"></i>'
    // }
    // }

    // $('input:radio[name="jenis"]').change(
    //         function(){
    //             if ($(this).is(':checked') && $(this).val() == 'day') {
    //                 $('#filter_day').css('display','');
    //                 $('#filter_bulan').css('display','none');
    //             } else if($(this).is(':checked') && $(this).val() == 'bulan'){
    //                 $('#filter_day').css('display','none');
    //                 $('#filter_bulan').css('display','');
    //             }
    // });

    // $('#tanggal').datetimepicker({
    //     format: 'L'
    // });

   
</script>
@endsection

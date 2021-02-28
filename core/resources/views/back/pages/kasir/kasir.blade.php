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
                                    <input type="text" class="form-control" placeholder="Ketik Nama / Kode Obat..."/>
                                    <div class="input-group-append">
                                     <button class="btn btn-primary" type="button">Cari Obat</button>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>1</td>
                                            <td>2</td>
                                            <td>3</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>2</td>
                                            <td>3</td>
                                        </tr>
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
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nama Obat</th>
                                            <th>Jumlah</th>
                                            <th>Satuan</th>
                                            {{-- <th>Pilihan Harga</th> --}}
                                            <th>Harga</th>
                                            <th>Nominal Diskon</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                           <td>OBT0001 - Amoxcilin</td>
                                           <td style="cursor: pointer" onclick="changePcs(1)">1</td>
                                           <td style="cursor: pointer">Pcs</td>
                                           <td style="cursor: pointer">Rp 10.000</td>
                                           <td style="cursor: pointer">Rp 1.000</td>
                                           <td><b> Rp 9.000 </b></td>
                                       </tr>
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
                                            <th class="font-weight-bold text-muted text-uppercase">BANK</th>
                                            <th class="font-weight-bold text-muted text-uppercase">ACC.NO.</th>
                                            <th class="font-weight-bold text-muted text-uppercase">DUE DATE</th>
                                            <th class="font-weight-bold text-muted text-uppercase">Total Bayar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="font-weight-bolder">
                                            <td>BARCLAYS UK</td>
                                            <td>12345678909</td>
                                            <td>Jan 07, 2018</td>
                                            <td class="text-danger font-size-h3 font-weight-boldest">20,600.00</td>
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
                                <button type="button" class="btn btn-light-primary font-weight-bold" onclick="window.print();">Download Invoice</button>
                                <button type="button" class="btn btn-primary font-weight-bold" onclick="window.print();">Print Invoice</button>
                            </div>
                        </div>
                    </div>
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
@endsection

@section('js-custom')
<script>
    function changePcs(id){
        alert(id)
    }
</script>
@endsection

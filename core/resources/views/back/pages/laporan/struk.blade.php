<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Histori Pembelian Obat</title>
    <style>
        @media print {
            @page {
                /* size: 400px; */
                margin-top: 0;
                margin-bottom: 0px;
            }

            #data,
            #data th,
            #data td {
                border: 1px solid;
            }

            #data td,
            #data th {
                padding: 5px;
            }

            #data {
                border-spacing: 0px;
                /* margin-top: 40px; */
            }

            body {
                padding-top: 50px;
            }
        }
    </style>
</head>

<body onload="window.print()">
    <table border="0" style="width:300px">
        <tr>
            <td colspan="3" align="center"><b>Google Apotek</b></td>
        </tr>
        <tr>
            <td colspan="3" align="center">Margahayu, Kab.Bandung</td>
        </tr>
        <tr>
            <td colspan="3" align="center">02209765</td>
        </tr>
        <tr>
            <td colspan="3"><hr></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td>{{ date('d M Y H:i',strtotime($penjualan->created_at)) }}</td>
        </tr>
        <tr>
            <td>No Transaksi</td>
            <td>:</td>
            <td>{{ $penjualan->no_transaksi }}</td>
        </tr>
        <tr>
            <td>Kasir</td>
            <td>:</td>
            <td>{{ auth()->user()->name }}</td>
        </tr>
        <tr>
            <td>Pelanggan</td>
            <td>:</td>
            <td>{{ '- Umum -' }}</td>
        </tr>
        <tr>
            <td colspan="3">================================</td>
        </tr>

        @foreach ($detail_penjualan as $item)
        <tr>
            <td colspan="3">{{ $item->kode_obat }} - {{ $item->obat->nama_obat }}</td>
        </tr>
        <tr>
            <td align="center">{{ $item->jumlah_obat }} {{ $item->diskon != 0  ? '/ ' . $item->diskon . '%' : ''}}</td>
            <td>{{ number_format($item->harga) }} / {{ $item->unit->nama }}</td>
            <td align="right">{{ number_format($item->subtotal) }}</td>
        </tr>
        @endforeach

       

        <tr>
            <td colspan="3">================================</td>
        </tr>

        <tr>
            <td align="right">Total</td>
            <td>:</td>
            <td align="right">{{ number_format($penjualan->jumlah_bayar) }}</td>
        </tr>
        {{-- <tr>
            <td align="right">Dikon</td>
            <td>:</td>
            <td>{{ '- Umum -' }}</td>
        </tr> --}}
        <tr>
            <td><b> Grand Total </b></td>
            <td>:</td>
            <td align="right"><b> {{ number_format($penjualan->jumlah_bayar) }} </b></td>
        </tr>
        <tr>
            <td><b> Tunai </b></td>
            <td>:</td>
            <td align="right">{{ number_format($penjualan->uang_bayar) }}</td>
        </tr>
        <tr>
            <td colspan="3" align="right">--------------------------------------</td>
        </tr>
        <tr>
            <td><b> Kembali </b></td>
            <td>:</td>
            <td align="right">{{  number_format($penjualan->uang_kembali) }}</td>
        </tr>
        <tr>
            <td colspan="3"> <br> </td>
        </tr>
        <tr>
            <td colspan="3" align="Center"> Terima Kasih Atas Kunjungan anda  </td>
        </tr>
        
    </table>
    <table id="data">
     
    </table>
</body>

</html>
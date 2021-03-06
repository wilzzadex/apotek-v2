<html>
<head>
    <title>Laporan Data Penjualan Obat</title>
    <style>
        body{
            font-family: arial, sans-serif;
            font-size: 10px;
        }
        .center {
            text-align: center;
            
            }
        #ex2{
            font-family: arial, sans-serif;
            border-collapse: collapse;
            /* width: 100%; */
        }

        #ex2{
            border: 1px solid;
            text-align: left;
            padding: 1px;
        }
      #ex{
            font-family: arial, sans-serif;
            
            width: 100%;
        }

      #ex{
            /* border: 1px solid; */
            text-align: left;
            padding: 10px;
        }
    </style>
    {{-- {{ date('d M Y',strtotime($dari)) }} s/d {{ date('d M Y',strtotime($sampai)) }} --}}
<body>
    <center><h3>Laporan Data Penjualan Obat</h3></center>
	<table id="ex2" width="100%">
        @php
            $no = 1;
            $total_semua = 0;
        @endphp
        @foreach ($penjualan as $penjualan)
        @php
            $total_semua += $penjualan->jumlah_bayar;
        @endphp
        <thead>
			<tr>
                <th width="10px" id="ex2">No</th>
				<th id="ex2">No Transaksi</th>
                <th id="ex2">Tanggal Transaksi</th>
		        <th id="ex2">Pelanggan</th>
                <th id="ex2">Grand Total</th>
                <th id="ex2">Kasir</th>
			</tr>
		</thead>
        <tbody>
			<tr>
                <td id="ex2">{{ $no++ }}</td>
                <td id="ex2">{{ $penjualan->no_transaksi }}</td>
                <td id="ex2">{{ date('d M Y H:i',strtotime($penjualan->created_at)) }}</td>
                <td id="ex2">{{ $penjualan->pelanggan_id == 0 ? '-Umum-' : '' }}</td>
                <td id="ex2">{{ number_format($penjualan->jumlah_bayar) }}</td>
                <td id="ex2">{{ $penjualan->user->name }}</td>
            </tr>
            <tr>
                <td id="ex2" colspan="6">
                    <table id="ex2" width="100%">
                        <thead>
                            <tr>
                                <th id="ex2">Obat</th>
                                <th id="ex2">Jumlah</th>
                                <th id="ex2">Harga Satuan</th>
                                <th id="ex2">Diskon</th>
                                <th id="ex2">Nominal Diskon</th>
                                <th id="ex2">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail as $item)
                                @if ($item->no_transaksi == $penjualan->no_transaksi)
                                    <tr>
                                        <td id="ex2">{{ $item->kode_obat }} - {{ $item->obat->nama_obat }}</td>
                                        <td id="ex2">{{ $item->jumlah_obat }} {{ $item->unit->nama }}</td>
                                        <td id="ex2">{{ number_format($item->harga) }}</td>
                                        <td id="ex2">{{ $item->diskon }} %</td>
                                        <td id="ex2">{{ number_format(($item->diskon / 100) * $item->harga) }}</td>
                                        <td id="ex2">{{ number_format($item->subtotal) }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
		</tbody>
        @endforeach
        <tfoot>
            <tr>
                <th id="ex2" colspan="4">Total</th>
                <th id="ex2" colspan="2">{{ number_format($total_semua) }}</th>
            </tr>
        </tfoot>
		
		
	</table>
 
</body>
</html>


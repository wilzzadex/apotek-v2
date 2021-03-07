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
    <center><h3>Laporan Data Pembelian Obat</h3></center>
	<table id="ex2" width="100%">
        @php
            $no = 1;
            $total_semua = 0;
        @endphp
        
        <thead>
			<tr>
                <th width="10px" id="ex2">No</th>
				<th id="ex2">No Faktur</th>
                <th id="ex2">Tanggal Faktur</th>
		        <th id="ex2">Tanggal Pengeluaran</th>
                <th id="ex2">Suplier</th>
                <th id="ex2">PPn</th>
                <th id="ex2">Nominal Pajak</th>
                <th id="ex2">Biaya Lain</th>
                <th id="ex2">Jenis</th>
                <th id="ex2">Keterangan</th>
                <th id="ex2">Status Tagihan</th>
                {{-- <th id="ex2">Admin</th> --}}
			</tr>
		</thead>
        <tbody>
            @php
                $no = 1;
                $total_semua = 0;
            @endphp
           @foreach ($pembelian as $pembelian)
           @php
               $total_semua += $pembelian->jumlah_tagihan;
           @endphp
               <tr>
                   <td id="ex2">{{ $no++ }}</td>
                   <td id="ex2">{{ $pembelian->no_faktur }}</td>
                   <td id="ex2">{{ date('d M Y',strtotime($pembelian->tgl_faktur)) }}</td>
                   <td id="ex2">{{ date('d M Y',strtotime($pembelian->created_at)) }}</td>
                   <td id="ex2">{{ $pembelian->suplier->nama_suplier }}</td>
                   <td id="ex2">{{ $pembelian->pajak }} %</td>
                   <td id="ex2">{{ number_format(($pembelian->pajak / 100) * $pembelian->jumlah_tagihan) }}</td>
                   <td id="ex2">{{ number_format($pembelian->biaya_lain) }}</td>
                   <td id="ex2">{{ $pembelian->jenis }}</td>
                   <td id="ex2">{{ $pembelian->jenis == 'Kredit' ? date('d M Y',strtotime($pembelian->jatuh_tempo)) : '' }}</td>
                   <td id="ex2">{{ $pembelian->status_tagihan == 'lunas' ? 'Lunas' : 'Belum Terbayar' }}</td>
               </tr>
           @endforeach
		</tbody>
       
        <tfoot>
            <tr>
                <th id="ex2" colspan="9">Total</th>
                <th id="ex2" colspan="2">{{ number_format($total_semua) }}</th>
            </tr>
        </tfoot>
		
		
	</table>
 
</body>
</html>


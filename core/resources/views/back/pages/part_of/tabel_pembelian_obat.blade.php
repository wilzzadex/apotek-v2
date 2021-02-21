<div class="table-responsive">
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>No Batch</th>
        <th>Obat</th>
        <th>Tgl exp</th>
        <th>Jumlah</th>
        <th>Harga beli satuan</th>
        <th>Diskon</th>
        <th>Margin Jual</th>
        <th>Nominal Diskon</th>
        <th>Nominal Margin</th>
        <th>Subtotal</th>
        <th>Aksi</th>
    </tr>
    @foreach ($temp as $key => $item)
    <tr>
        @php
            $subtotal = $item->jumlah_obat * $item->harga_beli;
        @endphp
        <td>{{ $key+1 }}</td>
        <td>{{ $item->no_batch }}</td>
        <td>{{ $item->kode_obat }} - {{ $item->obat->nama_obat }}</td>
        <td>{{ date('d F Y',strtotime($item->tgl_exp)) }}</td>
        <td>{{ $item->jumlah_obat }} {{ $item->unit->nama }}</td>
        <td>Rp.{{ number_format($item->harga_beli,0,',','.') }}</td>
        <td>{{ $item->diskon }} %</td>
        <td>{{ $item->margin_jual }} %</td>
        <td>Rp.{{ number_format((($item->diskon / 100) * $subtotal),0,',','.') }}</td>
        <td>Rp.{{ number_format((($item->margin_jual / 100) * $item->harga_beli),0,',','.') }}</td>
        <td></td>
        <td></td>
    </tr>
    @endforeach
</table>
</div>
<input type="hidden" name="jml_item" value="{{ count($temp) > 0 ? count($temp) : '' }}">
<div class="table-responsive">
    
<table class="table table-bordered">
    <tr>
        <th style="max-width: 40px;min-width:40px">No</th>
        <th style="min-width: 100px">No Batch</th>
        <th style="min-width: 150px">Obat</th>
        <th style="min-width: 150px">Tgl exp</th>
        <th>Jumlah</th>
        <th style="min-width: 150px">Harga beli satuan</th>
        <th>Diskon</th>
        <th>Margin Jual</th>
        <th>Nominal Diskon</th>
        <th>Nominal Margin</th>
        <th>Subtotal</th>
        <th style="min-width: 120px">Aksi</th>
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
        <td>Rp.{{ number_format($subtotal,0,',','.') }}</td>
        <td>
            <button type="button" class="btn btn-warning btn-sm" onclick="editObat(this)" id="{{ $item->id }}"><i class="fas fa-pencil-alt"></i></button>
            <button type="button" class="btn btn-danger btn-sm" onclick="deleteObat(this)" id="{{ $item->id }}"><i class="fas fa-trash"></i></button>
        </td>
    </tr>
    @endforeach
</table>
</div>
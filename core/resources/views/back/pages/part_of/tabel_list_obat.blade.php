@foreach ($list as $item)
<tr>
    <td>{{ $item->kode_obat }} - {{ $item->obat->nama_obat }}</td>
    <td style="cursor: pointer" onclick="changePcs(this)" id="{{ $item->id }}">{{ $item->jumlah_obat == 0 ? '--Masukan Jumlah--' : $item->jumlah_obat }}</td>
    <td style="cursor: pointer">{{ $item->unit_id == 0 ? '--Belum ada data--' : $item->unit->nama }}</td>
    <td style="cursor: pointer">Rp.{{ number_format($item->harga,0,',','.') }}</td>
    <td style="cursor: pointer" onclick="changeDiskon(this)" id="{{ $item->id }}">Rp.{{ number_format(($item->diskon /100) * $item->harga,0,',','.') }}</td>
    <td><b> Rp {{ number_format($item->subtotal,0,',','.') }} </b> &nbsp; &nbsp; <button onclick="deleteList(this)" id="{{ $item->id }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button> </td>
</tr>
@endforeach

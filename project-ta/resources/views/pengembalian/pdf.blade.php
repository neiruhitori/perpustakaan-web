<!DOCTYPE html>
<html>
<head>
<title>Download</title>
</head>
<body>

    <h1>Data Pengembalian</h1>
    <hr>
    <table id="example1" class="table table-bordered table-striped" style="width: 100%" border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Buku</th>
            <th>Kelas</th>
            <th>Jumlah Buku</th>
            <th>Jam Pinjam</th>
            <th>Jam Kembali</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
            @if ($pengembalian->count() > 0)
                @forelse ($pengembalian as $k)
                    <tr>
                        <td scope="row" align=center>{{ $loop->iteration }}</td>
                        <td align=center>{{ $k->name }}</td>
                        <td align=center>{{ $k->buku }}</td>
                        <td align=center>{{ $k->kelas }}</td>
                        <td align=center>{{ $k->jml_buku }}</td>
                        <td align=center>{{ $k->jam_pinjam }}</td>
                        <td align=center>{{ $k->jam_kembali }}</td>
                        <td align=center>
                            <label class="label {{ ($k->status == 1) ? 'label-danger' : 'label-success' }}">{{ ($k->status == 1) ? 'Sedang Meminjam' : 'Selesai' }}</label>
                        </td>
                    </tr>
                @empty

                @endforelse
            @endif
        </tbody>
    </table>

</body>
</html>
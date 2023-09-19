<table class="table table-hover text-center">
    <thead>
        <tr class="bg-info">
            <th>No</th>
            <th>Nomor Kwitansi</th>
            <th>Nama Lengkap</th>
            <th>Alamat</th>
            <th>No. HP</th>
            <th>Uang Sebanyak</th>
            <th>Pembayaran</th>
            <th>Lokasi</th>
            <th>No. Kavling</th>
            <th>Type</th>
            <th>Luas</th>
            <th>Jumlah</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kwitansis as $kwitansi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $kwitansi->nomor_kwitansi }}</td>
                <td>{{ $kwitansi->nama_lengkap }}</td>
                <td>{{ $kwitansi->alamat }}</td>
                <td>{{ $kwitansi->no_hp }}</td>
                <td>{{ $kwitansi->uang_sebanyak }}</td>
                <td>{{ $kwitansi->pembayaran }}</td>
                <td>{{ $kwitansi->lokasi }}</td>
                <td>{{ $kwitansi->no_kavling }}</td>
                <td>{{ $kwitansi->type }}</td>
                <td>{{ $kwitansi->luas }}</td>
                <td>{{ $kwitansi->jumlah }}</td>
                <td>
                    <a href="{{ route('kwitansi.show', $kwitansi->id) }}" class="btn btn-primary ">Lihat</a>
                    <a href="{{ route('kwitansi.edit', $kwitansi->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('kwitansi.destroy', $kwitansi->id) }}}}" method="POST"
                        class="d-inline-grid">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
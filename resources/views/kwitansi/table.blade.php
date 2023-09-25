<table class="table table-hover text-center">
    <thead>
        <tr class="bg-info">
            <th>No</th>
            <th>Nomor Kwitansi</th>
            <th>Nama Lengkap</th>
            <th>Alamat Lengkap</th>
            <th>No. HP</th>
            <th>Terbilang</th>
            <th>Pembayaran</th>
            <th>Nama Perumahan</th>
            <th>No. Kavling</th>
            <th>Type</th>
            <th>Luas</th>
            <th>Jumlah</th>
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
                <td>{{ $kwitansi->terbilang }}</td>
                <td>{{ $kwitansi->pembayaran }}</td>
                <td>{{ $kwitansi->lokasi }}</td>
                <td>{{ $kwitansi->no_kavling }}</td>
                <td>{{ $kwitansi->type }}</td>
                <td>{{ $kwitansi->luas }}</td>
                <td>{{ $kwitansi->jumlah }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

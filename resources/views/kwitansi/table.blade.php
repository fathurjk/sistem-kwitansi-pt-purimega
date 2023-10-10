<table class="table table-hover text-center">
    <thead>
        <tr class="bg-info">
            <th>No.</th>
            <th>No. Kwitansi</th>
            <th>Tanggal</th>
            <th>Nama Lengkap</th>
            <th>Alamat</th>
            <th>No. HP</th>
            <th>Terbilang</th>
            <th>Pembayaran</th>
            <th>Keterangan</th>
            <th>Nama Perumahan</th>
            <th>No. Kavling</th>
            <th>Type</th>
            <th>Jumlah</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kwitansis as $kwitansi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $kwitansi->nomor_kwitansi }}</td>
                <td>{{ date('j F Y', strtotime($kwitansi->created_at)) }}</td>
                <td>{{ $kwitansi->nama_lengkap }}</td>
                <td>{{ $kwitansi->alamat }}</td>
                <td>{{ $kwitansi->no_hp }}</td>
                <td>{{ $kwitansi->terbilang }}</td>
                <td>{{ $kwitansi->pembayaran }}</td>
                <td>{{ $kwitansi->keterangan }}</td>
                <td>{{ $kwitansi->lokasi }}</td>
                <td>{{ $kwitansi->no_kavling }}</td>
                <td>{{ $kwitansi->type }}</td>
                <td>{{ $kwitansi->jumlah }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

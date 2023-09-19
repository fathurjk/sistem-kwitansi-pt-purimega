<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Kwitansi</title>
</head>

<body>
    <section class="kwitansi p-5">
        <h1>Kwitansi</h1>
        <a href="{{ route('kwitansi.create') }}" class="btn btn-primary mb-3">Tambah</a>
        <a href="{{ url('kwitansi/export/excel') }}" class="btn btn-success mb-3">Export To Excel</a>
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
                            <a href="{{ route('kwitansi.detail', $kwitansi->id) }}" class="btn btn-primary ">Lihat</a>
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
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>

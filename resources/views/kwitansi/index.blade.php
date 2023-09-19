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
        @include('kwitansi.table', $kwitansis)
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>

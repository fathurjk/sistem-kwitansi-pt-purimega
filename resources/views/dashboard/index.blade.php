<!DOCTYPE html>
<html lang="en">

<html>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Dashboard</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}">

    <style>
        .date {
        margin-right: 16px;
        margin-top: 10px;
        font-size: 18px
        }
        .main-content{
            flex-grow: 1;
        min-height: calc(100vh - 60px);
        }
        .col-content {
            display: flex;
            justify-content: space-between
        }

        .table th {
            background-color: #3c6687;
            color: white;
            text-align: center;
            vertical-align: middle;
            margin: 0;
            padding: 0 4px 0 4px;
            height: 3rem;
            border-bottom: 1px solid #493d3d
        }

        .table td {
            margin: 0;
            padding: 0 4px 0 4px;
            vertical-align: middle;
            height: 6rem;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 1rem;
        }

        .pagination a {
            margin: 0 0.5rem;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border: 1px solid #4caf50;
            color: #4caf50;
            border-radius: 4px;
        }

        .pagination a:hover {
            background-color: #6ac063;
            color: white;
        }

        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            width: 100%;
            height: auto;
            background-color: #8ba8d9;
            padding: 10px 0
        }
    </style>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<body>
    @include('templates.navbar')
    <div class="date">
        <label class="date float-end" style="font-weight: 500">
            {{ date('l, j F Y') }}
        </label>
    </div>
    <!-- Main Content -->
    <div class="main-content">
        <!-- Content goes here -->
        <div class="container" style="margin-top: 4rem">
            <div class="col">
                <h1 class="text-center" style="margin-bottom: 3rem">KWITANSI TERBARU</h1>
                <div class="col" style="margin-left: 32px">
                    <table class="table table-hover table-striped text-center" id="kwitansi-table"
                        style="margin-bottom: 2rem">
                        <thead>
                            <tr class="bg-info">
                                <th style="width: 1.5rem; justify-content: center; align-items: center; cursor: pointer; border-top-left-radius:6px "
                                    id="sortNo">No.</th>
                                <th style="width: 5rem">Nama Admin</th>
                                <th style="width: 3rem">Tanggal</th>
                                <th style="width: 4rem">No. Kwitansi</th>
                                <th style="width: 4rem">Pembayaran</th>
                                <th style="border-top-right-radius: 6px; width: 7rem">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kwitansis as $kwitansi)
                                <tr onclick="window.location.href='{{ route('kwitansi.detail', $kwitansi->id) }}';"
                                    style="cursor: pointer;">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ optional($kwitansi->user)->name }}</td>
                                    <td>{{ date('j F Y', strtotime($kwitansi->created_at)) }}</td>
                                    <td>{{ $kwitansi->nomor_kwitansi }}</td>
                                    <td>{{ $kwitansi->pembayaran }}</td>
                                    <td>{{ $kwitansi->keterangan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @extends('templates.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>List Kwitansi</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}">
</head>

<body>
    @include('templates.navbar')
    <div class="date-wrapper">
        <label class="date float-end" style="font-weight: 500">
            {{ date('l, j F Y') }}
        </label>
    </div>
    <section class="kwitansi" style="padding: 1.5rem 24px 1.5rem 24px">
        <h1 class="text-center"> <a href="{{ route('kwitansi') }}" class="text-decoration-none"
                style="color: black">LIST KWITANSI</a>
        </h1>
        <div class="input" style="padding-top: 2rem">
            <div class="d-flex justify-content-end mb-3">
                <form action="/kwitansi" method="GET" class="me-2">
                    <div class="input-group">
                        <input type="search" class="form-control shadow-sm bg-body-tertiary" placeholder="Search..."
                            name="search" value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary shadow-sm" type="submit"
                                style="border-top-left-radius: 0; border-bottom-left-radius: 0" title="Search Data">
                                <img src="{{ asset('icon/search.svg') }}" alt="">
                            </button>
                        </div>
                    </div>
                </form>
                <div class="btn-group me-2">
                    <a href="{{ route('kwitansi.create') }}" class="btn btn-add shadow-sm" title="Tambah Kwitansi">
                        <img class="add" src="{{ asset('icon/add_notes.svg') }}" alt="">
                    </a>
                </div>
                <div class="btn-group me-2">
                    <a href="#" class="btn btn-filter shadow-sm" id="filterButton" title="Filter Data">
                        <img class="filter" src="{{ asset('icon/filter.svg') }}" alt="">
                    </a>
                </div>
                <div class="btn-group me-2">
                    <a href="#" class="btn btn-refresh shadow-sm" id="refreshButton" title="Refresh Data">
                        <img style="width: 20px; height: 20px;" class="refresh" src="{{ asset('icon/refresh.svg') }}"
                            alt="">
                    </a>
                </div>
                <div class="btn-group me-2">
                    <button type="button" class="btn btn-print dropdown-toggle shadow-sm" data-bs-toggle="dropdown"
                        aria-expanded="false" title="Export Data Excel">
                        <img src="{{ asset('icon/export_notes.svg') }}" alt="">
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('kwitansi/export/excel') }}">Export Semua Data</a>
                        </li>
                        <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#durationModal">Export
                                Range Tanggal</button></li>
                    </ul>
                </div>
            </div>
        </div>
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session()->get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="content" style="margin: 2rem 0 2rem 0">
            <table class="table table-hover table-striped text-center" id="kwitansi-table" style="margin-bottom: 2rem">
                <thead>
                    <tr class="bg-info">
                        <th style="width: 2rem; justify-content: center; align-items: center; cursor: pointer; border-top-left-radius: 6px"
                            id="sortNo">No.</th>
                        <th style="width: 4.5rem; cursor: pointer;" id="sortKwitansi">No. Kwitansi</th>
                        <th style="width: 5rem;">Tanggal</th>
                        <th style="width: 6rem; cursor: pointer;" id="sortNama">Nama Lengkap</th>
                        <th style="width: 10rem;">Alamat</th>
                        <th style="width: 4.5rem;">No. HP</th>
                        <th style="width: 8.5rem;">Terbilang</th>
                        <th style="width: 4rem;">Pembayaran</th>
                        <th style="width: 4rem;">Nama Perumahan</th>
                        <th style="width: 1rem;">No. Kavling</th>
                        <th style="width: 1rem;">Type</th>
                        <th
                            style="width: 5rem; @cannot('super admin')
                        border-top-right-radius: 6px                            
                        @endcannot">
                            Jumlah</th>
                        @can('super admin')
                            <th style="width: 6.7rem; border-top-right-radius: 6px"> Action</th>
                        @endcan
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kwitansis as $kwitansi)
                        <tr onclick="window.location.href='{{ route('kwitansi.detail', $kwitansi->id) }}';"
                            style="cursor: pointer;">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kwitansi->nomor_kwitansi }}</td>
                            <td>{{ $kwitansi->created_at->format('d F Y') }}</td>
                            <td>{{ $kwitansi->nama_lengkap }}</td>
                            <td>{{ $kwitansi->alamat }}</td>
                            <td>{{ $kwitansi->no_hp }}</td>
                            <td>{{ $kwitansi->terbilang }}</td>
                            <td> <?php
                            $pembayaran = $kwitansi->pembayaran;
                            $keterangan = $kwitansi->keterangan;
                            
                            if ($pembayaran === 'Booking' || $pembayaran === 'DP' || $pembayaran === 'CBTH' || $pembayaran === 'KET') {
                                echo $pembayaran;
                            } elseif ($pembayaran === 'Angsuran ke') {
                                echo $pembayaran . ' ' . $keterangan;
                            } elseif ($pembayaran === 'Lain-lain') {
                                echo $keterangan;
                            } else {
                                echo $pembayaran;
                            }
                            ?></td>
                            <td>{{ $kwitansi->lokasi }}</td>
                            <td>{{ $kwitansi->no_kavling }}</td>
                            <td>{{ $kwitansi->type }}</td>
                            <td>{{ $kwitansi->jumlah }}</td>
                            @can('super admin')
                                <td
                                    style="padding-left: 1rem; display: flex; height: 6rem; justify-content: space-around; align-items: center">
                                    <a class="btn btn-edit-pencil" title="Edit Data Kwitansi"
                                        href="{{ route('kwitansi.edit', $kwitansi->id) }}">
                                        <img src="{{ asset('icon/pen2.svg') }}" alt=""
                                            style="margin: 4px 0 4px 0">
                                    </a>

                                    <form action="{{ route('kwitansi.destroy', $kwitansi->id) }}}}" method="POST"
                                        class="d-inline-grid">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-delete" title="Hapus Kwitansi"
                                            onclick="return confirm('Hapus Data Kwitansi?')">
                                            <img src="{{ asset('icon/trash3.svg') }}" alt="">
                                        </button>
                                    </form>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination" id="pagination" style="display: flex">
            </div>
        </div>
    </section>
    @extends('kwitansi.pop-up.date-picker')
    @extends('kwitansi.pop-up.filter-date-picker')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    <script>
        // JS Filter Data Menggunakan Tanggal
        document.addEventListener('DOMContentLoaded', function() {
            const filterButton = document.getElementById('filterButton');
            const filterDatePickerModal = new bootstrap.Modal(document.getElementById('filterDatePickerModal'));

            filterButton.addEventListener('click', function() {
                filterDatePickerModal.show();
            });

            const filterDatePickerModalButton = document.getElementById('filterDatePickerModalButton');
            filterDatePickerModalButton.addEventListener('click', function() {
                // Ambil nilai tanggal dari input date picker
                const startDateText = document.getElementById('start_date_filter').value;
                const endDateText = document.getElementById('end_date_filter').value;

                // Konversi tanggal dari format "j F Y" ke objek Date
                const startDate = new Date(startDateText);
                const endDate = new Date(endDateText);

                // Sembunyikan modal setelah mengambil nilai tanggal
                filterDatePickerModal.hide();

                // Anda dapat memfilter data di tabel menggunakan startDate dan endDate
                // Sebagai contoh, Anda dapat menyembunyikan baris yang tidak berada dalam rentang tanggal tertentu.

                // Ambil semua baris dalam tabel
                const rows = document.querySelectorAll('#kwitansi-table tbody tr');

                // Iterasi melalui setiap baris dan periksa tanggal
                rows.forEach(row => {
                    const tanggalText = row.cells[2]
                        .textContent; // Menggunakan indeks 2 karena kolom tanggal berada pada indeks 2
                    const tanggal = new Date(tanggalText);

                    // Format tanggal dalam "j F Y"
                    const formatter = new Intl.DateTimeFormat('id-ID', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });

                    if (
                        formatter.format(tanggal) >= formatter.format(startDate) &&
                        formatter.format(tanggal) <= formatter.format(endDate)
                    ) {
                        // Tampilkan baris jika tanggal berada dalam rentang
                        row.style.display = '';
                    } else {
                        // Sembunyikan baris jika tanggal tidak berada dalam rentang
                        row.style.display = 'none';
                    }
                });
            });
        });
    </script>


    <script>
        //JS Export Data Excell Menggunakan Rentang Tanggal
        document.addEventListener('DOMContentLoaded', function() {
            // Temukan elemen tombol ekspor di dalam modal
            const exportDurationModalButton = document.getElementById('exportDurationModalButton');

            // Tambahkan penanganan acara klik
            exportDurationModalButton.addEventListener('click', function() {
                const startDate = document.getElementById('start_date').value;
                const endDate = document.getElementById('end_date').value;

                // Mengonversi tanggal ke format ISO (YYYY-MM-DD)
                const isoStartDate = new Date(startDate).toISOString().split('T')[0];
                const isoEndDate = new Date(endDate).toISOString().split('T')[0];

                // Redirect ke URL ekspor dengan parameter tanggal
                window.location.href =
                    `{{ url('kwitansi/export/excel-with-date') }}?start_date=${isoStartDate}&end_date=${isoEndDate}`;

                // Sembunyikan modal setelah pengguna mengklik tombol "Export"
                const modal = new bootstrap.Modal(document.getElementById('durationModal'));
                modal.hide();
            });
        });
    </script>
    <script>
        //JS Refresh
        document.addEventListener('DOMContentLoaded', function() {
            const refreshButton = document.getElementById('refreshButton');

            refreshButton.addEventListener('click', function() {
                // Lakukan operasi atau pengiriman data ke server sesuai dengan kebutuhan Anda untuk me-refresh data.
                // Misalnya, Anda bisa membuat permintaan AJAX ke server untuk memuat ulang data.

                // Setelah memuat ulang data, Anda dapat mereload halaman untuk menampilkan perubahan.
                location.reload();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Initialize sorting order for each column
            let noSortOrder = 1;
            let kwitansiSortOrder = 1;
            let namaSortOrder = 1;

            // Get the table element
            const table = $("#kwitansi-table");

            // Get the pagination element
            const pagination = $(".pagination");

            // Set the number of items per page
            const itemsPerPage = 10; // Ganti dengan 10 untuk menampilkan 10 data per halaman

            // Function to update the entire table with sorted data
            function updateTable(sortKey, sortOrder) {
                const $table = $("table tbody");
                const $rows = $table.find("tr").get();

                $rows.sort(function(a, b) {
                    const aValue = $(a).find("td").eq(sortKey).text();
                    const bValue = $(b).find("td").eq(sortKey).text();

                    if (sortKey === 1) {
                        // Sorting No. Kwitansi
                        return sortOrder * aValue.localeCompare(bValue);
                    } else if (sortKey === 3) {
                        // Sorting Nama Lengkap
                        return sortOrder * aValue.localeCompare(bValue);
                    } else {
                        // Sorting other columns as numbers
                        return sortOrder * (parseFloat(aValue) - parseFloat(bValue));
                    }
                });

                $table.empty().append($rows);

                // Call the initial sorting to sort the data based on the default column
                updateTableRows(currentPage);
            }

            // Function to hide and show rows based on the current page
            function updateTableRows(currentPage) {
                // Hide all rows in the table, except the header
                table.find("tr").not("thead tr").hide();

                // Show the rows for the current page
                const startIdx = (currentPage - 1) * itemsPerPage;
                const endIdx = startIdx + itemsPerPage;
                table.find("tr").slice(startIdx, endIdx).show();
            }

            // **Add the header to the table**
            table.append(table.find("thead"));

            // Handle click event for sorting by No
            $("#sortNo").click(function() {
                noSortOrder *= -1;
                updateTable(0, noSortOrder);
            });

            // Handle click event for sorting by No. Kwitansi
            $("#sortKwitansi").click(function() {
                kwitansiSortOrder *= -1;
                updateTable(1, kwitansiSortOrder);
            });

            // Handle click event for sorting by Nama Lengkap
            $("#sortNama").click(function() {
                namaSortOrder *= -1;
                updateTable(3, namaSortOrder);
            });

            // Set the initial page number
            let currentPage = 1;

            // Calculate the total number of pages
            const totalData = {{ $kwitansis->count() }}; // Ganti dengan jumlah data yang sesungguhnya
            const totalPages = Math.ceil(totalData / itemsPerPage);

            // Generate initial pagination buttons
            for (let i = 1; i <= totalPages; i++) {
                pagination.append(`<a href="#" class="${i === 1 ? 'active' : ''}">${i}</a>`);
            }

            // Handle click event for pagination buttons
            pagination.on("click", "a", function() {
                // Get the clicked page number
                const newPage = parseInt($(this).text());

                // If the clicked page number is different from the current page number
                if (newPage !== currentPage) {
                    // Update the current page number
                    currentPage = newPage;

                    // Update the active pagination button
                    pagination.find("a").removeClass("active");
                    $(this).addClass("active");

                    // Update the table rows
                    updateTableRows(currentPage);
                }
            });

            // Call the initial sorting to sort the data based on the default column
            updateTable(0, 1);
            updateTableRows(currentPage);
        });
    </script>
    @extends('templates.footer')
</body>

<style>
    .date-wrapper {
        margin: 20px 32px 0 0;
    }

    .date {
        font-weight: 500;
        font-size: 14pt
    }

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
    }

    .kwitansi {
        flex-grow: 1;
        min-height: calc(100vh - 60px);
    }

    .table th {
        background-color: #3c6687;
        color: white;
        text-align: center;
        vertical-align: middle;
        margin: 0;
        padding: 0 4px 0 4px;
        height: 4rem;
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

    img {
        height: 26px;
        width: 26px;
        margin: 4px;
        padding: 0;
    }

    .date {
        font-size: 18px;
        margin-top: 10px;
    }

    .btn-add {
        width: 4rem;
        background-color: #8e4761;
        color: #ffffff;
        border-radius: 0.3rem;
        transition: all 0.3s ease;
    }

    .btn-add:hover {
        background-color: #acdff8;
        color: #8e4761;
        border: 1px solid #8e4761;
    }

    .btn-add:hover img.add {
        content: url('icon/add_noteshover.svg');
    }

    .btn-filter {
        width: 4rem;
        background-color: #8e4761;
        color: #ffffff;
        border-radius: 0.3rem;
        transition: all 0.3s ease;
    }

    .btn-filter:hover {
        background-color: #acdff8;
        color: #8e4761;
        border: 1px solid #8e4761;
    }

    .btn-filter:hover img.filter {
        content: url('icon/filterhover.svg');
    }

    .btn-refresh {
        width: 4rem;
        background-color: #8e4761;
        color: #ffffff;
        border-radius: 0.3rem;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .btn-refresh:hover {
        background-color: #acdff8;
        color: #8e4761;
        border: 1px solid #8e4761;
    }

    .btn-refresh:hover img.refresh {
        content: url('icon/refresh-hover.svg');
    }


    .btn-print {
        background-color: #f9d150;
        color: #404567;
        border-radius: 0.3rem;
    }

    .btn-print:hover {
        background-color: #e5eae6;
        color: #404567;
        border: 1px solid #8e4761
    }

    .btn-edit-pencil {
        background-color: #d96652;
        color: #e9ecf1;
        border-radius: 100%;
    }

    .btn-edit-pencil:hover {
        background-color: #8e4761;
        color: #e9ecf1;
        border: 1px solid #f39c7d
    }

    .btn-delete {
        background-color: #33434f;
        color: #ffffff;
        margin: 0;
        padding: 6.5px 8px 6.5px 8px;
        border-radius: 100%;
    }

    .btn-delete:hover {
        background-color: #b0b2b7;
        color: #ffffff;
        border: 1px solid #33434f
    }
</style>

</html>

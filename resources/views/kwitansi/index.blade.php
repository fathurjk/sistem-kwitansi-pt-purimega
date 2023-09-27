
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Kwitansi</title>
    <link rel="icon" href="{{ asset('img/logoremove.png') }}">
</head>

<body>
    @include('templates.navbar')
    <div class="date">
        <label class="date float-end" style="font-weight: 500">
            {{ date('l, j F Y') }}
        </label>
    </div>
    <section class="kwitansi" style="padding: 1.5rem 24px 1.5rem 24px">
        <h1 class="text-center"> <a href="{{ route('kwitansi') }}" class="text-decoration-none" style="color: black">List Kwitansi</a>
        </h1>
        <div class="input mb-2" style="padding-top: 2rem">
            <div class="row">
                <div class="col">
                    <a href="{{ route('kwitansi.create') }}" class="btn btn-add mb-1"
                        style="margin-right: 24px">Tambah</a>
                    <a href="{{ url('kwitansi/export/excel') }}" class="btn btn-print mb-1 ">Export To Excel</a>
                </div>
                <div class="col" style="padding-left:50%">
                    <form action="/kwitansi" method="GET" class="float-right">
                        <div class="input-group" style="padding-left: ;">
                            <input type="search" style="border-top-right-radius: 0; border-bottom-right-radius: 0"
                                class="form-control shadow-sm bg-body-tertiary" placeholder="Search..." name="search"
                                value="{{ request('search') }}">
                            <div class="input-group-append" style="padding-left: 2px;">
                                <button class="btn btn-primary"
                                    style="border-top-left-radius: 0; border-bottom-left-radius: 0; padding: 4px"
                                    type="submit"><img src="{{ asset('icon/search.svg') }}" alt=""></button>
                            </div>
                        </div>
                    </form>
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
                        <th style="width: 2rem; justify-content: center; align-items: center; cursor: pointer;"
                            id="sortNo">No.</th>
                        <th style="width: 4.5rem; cursor: pointer;" id="sortKwitansi">No. Kwitansi</th>
                        <th style="width: 6rem; cursor: pointer;" id="sortNama">Nama Lengkap</th>
                        <th style="width: 10rem;">Alamat</th>
                        <th style="width: 4.5rem;">No. HP</th>
                        <th style="width: 8.5rem;">Terbilang</th>
                        <th style="width: 4rem;">Pembayaran</th>
                        <th style="width: 4rem;">Keterangan</th>
                        <th style="width: 4rem;">Nama Perumahan</th>
                        <th style="width: 1rem;">No. Kavling</th>
                        <th style="width: 1rem;">Type</th>
                        <th style="width: 5rem;">Jumlah</th>
                        <th style="width: 6.7rem;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kwitansis as $kwitansi)
                        <tr onclick="window.location.href='{{ route('kwitansi.detail', $kwitansi->id) }}';"
                            style="cursor: pointer;">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kwitansi->nomor_kwitansi }}</td>
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
                            <td
                                style="padding-left: 1rem; display: flex; height: 6rem; justify-content: space-around; align-items: center">
                                <a class="btn btn-edit-pencil" href="{{ route('kwitansi.edit', $kwitansi->id) }}">
                                    <img src="{{ asset('icon/pen2.svg') }}" alt="" style="margin: 4px 0 4px 0">
                                </a>

                                <form action="{{ route('kwitansi.destroy', $kwitansi->id) }}}}" method="POST"
                                    class="d-inline-grid">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-delete" onclick="return confirm('Are you sure?')"
                                        style="margin:0 ; padding: 6.5px 8px 6.5px 8px; border-radius: 100%;">
                                        <img src="{{ asset('icon/trash3.svg') }}" alt="">
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination" style="display: flex">
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize sorting order for each column
            let noSortOrder = 1;
            let kwitansiSortOrder = 1;
            let namaSortOrder = 1;

            // Function to update the table with sorted data
            function updateTable(sortKey, sortOrder) {
                const $table = $("table tbody");
                const $rows = $table.find("tr").get();

                $rows.sort(function(a, b) {
                    const aValue = $(a).find("td").eq(sortKey).text();
                    const bValue = $(b).find("td").eq(sortKey).text();

                    if (sortKey === 1 || sortKey === 2) {
                        // Convert values to lowercase for case-insensitive sorting
                        return sortOrder * aValue.toLowerCase().localeCompare(bValue.toLowerCase());
                    }

                    // Sort as numbers
                    return sortOrder * (parseFloat(aValue) - parseFloat(bValue));
                });

                $table.empty().append($rows);
            }

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
                updateTable(2, namaSortOrder);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Function to initialize the table with the specified number of items per page
            function initializeTable() {
                const table = $("#kwitansi-table");
                const itemsPerPage = 11; // Jumlah item per halaman

                // Hide all rows in the table, except the header
                table.find("tr").not("thead tr").hide();

                // Show the rows for the current page
                table.find("tr:lt(" + itemsPerPage + ")").show();
            }

            // Initialize the table when the document is ready
            initializeTable();

            // Get the table element
            const table = $("#kwitansi-table");

            // Get the pagination element
            const pagination = $(".pagination");

            // Set the initial page number
            let currentPage = 1;

            // Set the number of items per page
            const itemsPerPage = 10;

            // Calculate the total number of pages
            const totalData = {{ $kwitansis->count() }}; // Ganti dengan jumlah data yang sesungguhnya
            const totalPages = Math.ceil(totalData / itemsPerPage);

            // Generate initial pagination buttons
            for (let i = 1; i <= totalPages; i++) {
                pagination.append(`<a href="#" class="${i === 1 ? 'active' : ''}">${i}</a>`);
            }

            // Function to hide and show rows based on the current page
            function updateTableRows() {
                // Hide all rows in the table, except the header
                table.find("tr").not("thead tr").hide();

                // Show the rows for the current page
                const startIdx = (currentPage - 1) * itemsPerPage;
                const endIdx = startIdx + itemsPerPage;
                table.find("tr").slice(startIdx, endIdx).show();
            }

            // **Add the header to the table**
            table.append(table.find("thead"));

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
                    updateTableRows();
                }
            });
        });
    </script>
    <footer class="text-center text-lg-start" style="background-color: #8ba8d9">
        <!-- Copyright -->
        <div class="text-center p-3" style="text-align:center">
            © 2023 Copyright:
            <a class="text-dark text-decoration-none" href="https://tamananggrekgroup.co.id/">Taman Anggrek Group</a>
        </div>
        <!-- Copyright -->
    </footer>
</body>

<style>
    .date{
        margin-right: 16px;
    }

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
    }

    .content {
        flex-grow: 1;
        min-height: calc(100vh - 60px);
    }

    footer {
        flex-shrink: 0;
        background-color: #8ba8d9;
        text-align: center;
        padding: 0rem 0;
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
        vertical-align: middle
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
        background-color: #8e4761;
        color: #ffffff;
        border-radius: 0.3rem;
    }

    .btn-add:hover {
        background-color: #acdff8;
        color: #8e4761;
        border: 1px solid #8e4761
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
        border-radius: 0.3rem
    }

    .btn-delete:hover {
        background-color: #b0b2b7;
        color: #ffffff;
        border: 1px solid #33434f
    }
</style>

</html>

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
        <h1> <a href="{{ route('kwitansi') }}" class="text-decoration-none" style="color: black">Kwitansi</a></h1>
        <div class="input-group mb-3">
            <a href="{{ route('kwitansi.create') }}" class="btn btn-primary mb-3 m-2">Tambah</a>
            <a href="{{ url('kwitansi/export/excel') }}" class="btn btn-success mb-3 m-2">Export To Excel</a>
            <form action="/kwitansi" method="GET">
            <input type="search" class="form-control m-3" placeholder="Search..." name="search" value="{{ request('search') }}">
            </form>
                <button class="btn btn-primary m-3" type="submit">Search</button>
            </div>
            @if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session()->get('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
            <table class="table table-hover text-center" id="kwitansi-table">
                <thead>
                <tr class="bg-info">
                    <th style="width: 1%; justify-content: center; align-items: center; cursor: pointer;" id="sortNo">No</th>
                    <th style="width: 10%; cursor: pointer;" id="sortKwitansi">No. Kwitansi</th>
                    <th style="width: 15%; cursor: pointer;" id="sortNama">Nama Lengkap</th>
                    <th style="width: 10%;">Alamat</th>
                    <th style="width: 5%;">No. HP</th>
                    <th style="width: 10%;">Terbilang</th>
                    <th style="width: 10%;">Pembayaran</th>
                    <th style="width: 10%;">Lokasi</th>
                    <th style="width: 5%;">No. Kavling</th>
                    <th style="width: 1%;">Type</th>
                    <th style="width: 1%;">Luas</th>
                    <th style="width: 5%;">Jumlah</th>
                    <th style="width: 15%;">Action</th>
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
                        <td style="display: flex; height: 6rem; justify-content: space-evenly; align-items: center">
                            <a href="{{ route('kwitansi.detail', $kwitansi->id) }}" class="btn btn-primary" style="margin:0 ; padding: 6.5px 8px 6.5px 8px; border-radius: 100%">
                                <img src="{{ asset("icon/eye.svg") }}" alt="">
                            </a>
                            <a href="{{ route('kwitansi.edit', $kwitansi->id) }}" class="btn btn-warning" style="margin:0 ; padding: 6.5px 8px 6.5px 8px; border-radius: 100%">
                                <img src="{{ asset("icon/pen.svg") }}" alt="">
                            </a>
                            <form action="{{ route('kwitansi.destroy', $kwitansi->id) }}}}" method="POST"
                                class="d-inline-grid">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Are you sure?')" style="margin:0 ; padding: 6.5px 8px 6.5px 8px; border-radius: 100%">
                                    <img src="{{ asset("icon/trash3.svg") }}" alt="">
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
    <ul class="list-group">
        <li class="list-group-item active">1</li>
        <li class="list-group-item">2</li>
        <li class="list-group-item">3</li>
    </ul>
</div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function () {
        // Initialize sorting order for each column
        let noSortOrder = 1;
        let kwitansiSortOrder = 1;
        let namaSortOrder = 1;

        // Function to update the table with sorted data
        function updateTable(sortKey, sortOrder) {
            const $table = $("table tbody");
            const $rows = $table.find("tr").get();

            $rows.sort(function (a, b) {
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
        $("#sortNo").click(function () {
            noSortOrder *= -1;
            updateTable(0, noSortOrder);
        });

        // Handle click event for sorting by No. Kwitansi
        $("#sortKwitansi").click(function () {
            kwitansiSortOrder *= -1;
            updateTable(1, kwitansiSortOrder);
        });

        // Handle click event for sorting by Nama Lengkap
        $("#sortNama").click(function () {
            namaSortOrder *= -1;
            updateTable(2, namaSortOrder);
        });
    });
</script>
<script>
    $(document).ready(function () {
    // Get the table element
    const table = $("#kwitansi-table");

    // Get the pagination element
    const pagination = $(".pagination");

    // Set the initial page number
    let currentPage = 1;

    // Hide all rows in the table
    table.find("tr").hide();

    // Show the first 10 rows
    table.find("tr").slice(0, 5).show();

    // Add the header to the table
    table.append(table.find("thead"));

    // Handle click event for pagination buttons
    pagination.find("li").click(function () {
        // Get the clicked page number
        const newPage = parseInt($(this).text());

        // If the clicked page number is different from the current page number
        if (newPage !== currentPage) {
            // Update the current page number
            currentPage = newPage;

            // Hide all rows in the table
            table.find("tr").hide();

            // Show the rows for the current page
            table.find("tr").slice((currentPage - 1) * 5, currentPage * 5).show();

            // Update the active pagination button
            pagination.find("li").removeClass("active");
            pagination.find("li").eq(currentPage - 1).addClass("active");
        }
    });
});
    </script>
</body>

</html>
<style>
    img {
        height: 24px;
        width: 24px;
        margin: 0;
        padding: 0;
    }
</style>

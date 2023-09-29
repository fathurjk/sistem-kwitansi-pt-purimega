<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Dashboard</title>
    <link rel="icon" href="{{ asset('img/logoremove.png') }}">

    <style>
        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            width: 100%;
            height: auto;
            background-color: #8ba8d9;
        }
    </style>
</head>
<body>
  @include('templates.navbar')


  <!-- Main Content -->
  <div class="main-content">
    <!-- Content goes here -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Dashboard</h1>

                <div class="card">
                    <div class="card-header">
                        Dashboard Statistics
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Total Admin: 2</li>
                            <li class="list-group-item">Total Kwitansi: 500</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="text-center text-lg-start">
    <!-- Copyright -->
    <div class="text-center p-3">
        © 2023 Copyright:
        <a class="text-dark text-decoration-none" href="https://tamananggrekgroup.co.id/">Taman Anggrek Group</a>
    </div>
    <!-- Copyright -->
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
<style>
    footer {
        bottom: 0;
        width: 100%;
        background-color: #8ba8d9;
        text-align: center;
        padding: 10px 0;
    }

    .main-content {
        margin-bottom: 60px; /* Sesuaikan dengan tinggi footer */
    }
</style>

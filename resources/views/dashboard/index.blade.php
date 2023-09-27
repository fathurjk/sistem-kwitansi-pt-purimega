<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  {{-- Font Awesome --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <title>Dashboard</title>
</head>
<body>
  @include('templates.navbar')

  <!-- Sidebar -->
  <div class="sidebar">
    @include('dashboard.layouts.sidebar')
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <!-- Content goes here -->
  </div>

  <!-- Footer -->
  <footer class="text-center text-lg-start" style="background-color: #8ba8d9">
    <!-- Copyright -->
    <div class="text-center p-3" style="text-align:center">
        © 2023 Copyright:
        <a class="text-dark text-decoration-none" href="https://tamananggrekgroup.co.id/">Taman Anggrek Group</a>
    </div>
    <!-- Copyright -->
</footer>
</body>
</html>

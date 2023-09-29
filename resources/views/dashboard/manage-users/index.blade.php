<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Manage Admin</title>
    <link rel="icon" href="{{ asset('img/logoremove.png') }}">
</head>

<body>
    @include('templates.navbar')
    <div class="date">
        <label class="date float-end" style="font-weight: 500">
            {{ date('l, j F Y') }}
        </label>
    </div>

    <section class="manage-users" style="padding: 1.5rem 24px 1.5rem 24px">

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3 d-flex justify-content-center align-items-center"
                role="alert" style="width: 25%;">
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h1 class="text-center" style="margin: 2.5rem 0 0 0"> <a href="{{ route('manage.users') }}"
                class="text-decoration-none" style="color: black">LIST ADMIN</a>
        </h1>
        <div class="input mb-2" style="padding-top: 1rem">
            <div class="row">
                <div class="col">
                    <a href="{{ route('manage-users.create') }}" class="btn btn-add mb-1"
                        style="margin-right: 24px">Tambah</a>
                </div>
            </div>
        </div>
        <div class="content" style="margin: 1.5rem 0 2rem 0">
            <table class="table table-hover table-striped text-center" id="kwitansi-table" style="margin-bottom: 2rem">
                <thead>
                    <tr class="bg-info">
                        <th style="width: 3rem; justify-content: center; align-items: center; cursor: pointer;  border-top-left-radius: 6px"
                            id="sortNo">No.</th>
                        <th style="width: 5rem">Nama Admin</th>
                        <th style="width: 5rem">Username</th>
                        <th style="width: 6rem">Email</th>
                        <th style="width: 6rem">Role</th>
                        <th style="width: 6rem">Permission</th>
                        <th style="width: 10rem">Action Account</th>
                        <th style="width: 10rem; border-top-right-radius: 6px">Action Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach ($user->getRoleNames() as $role)
                                    {{ $role }}
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($user->getAllPermissions() as $permission)
                                    {{ $permission->name }}
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </td>
                            <td
                                style="padding-left: 1rem; display: flex; height: 6rem; justify-content: space-around; align-items: center">
                                <form action="{{ route('manage-users.destroy', $user->id) }}}}" method="POST"
                                    class="d-inline-grid">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-delete" onclick="return confirm('Hapus Akun Ini?')">
                                        <img src="{{ asset('icon/trash3.svg') }}" alt="">
                                    </button>
                                </form>
                            </td>
                            <td>
                                <a class="btn btn-edit-pencil" data-bs-toggle="modal" data-bs-target="#addRoleModal"
                                    href="">
                                    <img src="{{ asset('icon/pen2.svg') }}" alt="" style="margin: 4px 0 4px 0">
                                </a>
                                <a class="btn btn-delete" data-bs-toggle="modal" data-bs-target="#deleteRoleModal"
                                    href=""><img src="{{ asset('icon/trash3.svg') }}" alt="">
                                </a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination" style="display: flex">
            </div>
        </div>
    </section>
    @extends('dashboard.manage-users.pop-up.addrole')
    @extends('dashboard.manage-users.pop-up.deleterole')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    @extends('templates.footer')
</body>
<style>
    .date {
        margin: 10px 16px 0 0;
        font-size: 18px
    }

    img {
        height: 26px;
        width: 26px;
        margin: 4px;
        padding: 0;
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
        height: 4rem;
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
        border-radius: 0.3rem;
        margin: 0;
        padding: 6.5px 8px 6.5px 8px;
        border-radius: 100%;
    }

    .btn-delete:hover {
        background-color: #b0b2b7;
        color: #ffffff;
        border: 1px solid #33434f;

    }
</style>

</html>

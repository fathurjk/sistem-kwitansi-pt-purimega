<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
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
    <div class="alert alert-success alert-dismissible fade show mt-3 d-flex justify-content-center align-items-center" role="alert" style="width: 25%;">
        {{ session()->get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

    <h1 class="text-center"> <a href="{{ route('manage.users') }}" class="text-decoration-none" style="color: black">Manage Users</a>
    </h1>
    <div class="content" style="margin: 2rem 0 2rem 0">
            <table class="table table-hover table-striped text-center" id="kwitansi-table" style="margin-bottom: 2rem">
                <thead>
                    <tr class="bg-info">
                        <th style="width: 2rem; justify-content: center; align-items: center; cursor: pointer;"
                            id="sortNo">No.</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Permission</th>
                        <th>Action Account</th>
                        <th>Action Role</th>
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
                            <td>@foreach ($user->getAllPermissions() as $permission)
                                    {{ $permission->name }}
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </td>
                            <td></td>
                            <td>
                            <a class="btn btn-edit-pencil" href="{{ route('add.role', $user->id) }}">
                                <img src="{{ asset('icon/pen2.svg') }}" alt="" style="margin: 4px 0 4px 0;">Add Role
                            </a>
                            <a class="btn btn-delete" href="{{ route('remove.role', $user->id) }}">Delete Role
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>
<style>
    .btn-edit-pencil {
        background-color: darkcyan;
        color: #e9ecf1;
        height: 45px;
        width: 120px;
    }

    .btn-edit-pencil:hover{
        background-color: cadetblue
    }

    .btn-delete{
        background-color: crimson;
        color: #e9ecf1;
        height: 45px;
        width: 120px;
    }

    .btn-delete:hover{
        background-color: darkred;
        color: white;
    }
</style>
</html>
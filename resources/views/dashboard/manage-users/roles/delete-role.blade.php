<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h2>Remove Role for {{ $user->name }}</h2>
        <form action="{{ route('remove.role', $user->id) }}" method="POST">
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="role_id">Select Role to Remove:</label>
                <select name="role_id" id="role_id" class="form-control">
                    @foreach ($user->roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Remove Role</button>
        </form>
    </div>
</body>

</html>

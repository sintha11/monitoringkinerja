@extends('layouts.main')

@section('content')
<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">User</h1>

                        <div class="card mb-4">
                            <div class="card-body">
                            <a class="btn btn-success mb-2" href="{{ route('user.create') }}" role="button">Create New</a>
                                <table id="datatablesSimple" class=" table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name}}</td>
                                        <td>{{ $user->email}}</td>
                                        <td>{{ $user->password}}</td>

                                        <td>
                                    <form onsubmit="return confirm('Are you sure? ');" action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                    </td>
                                    </tr>
                                    @endforeach
                                    </body>
                                </table>
                            </div>
                        </div>
                    </div>
</main>                         
@endsection
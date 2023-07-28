@extends('layouts.main')

@section('content')
  <main>

    <!-- datatable style -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <!-- bootstrap 4 css  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
      integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- css tambahan  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">

    <div class="container-fluid px-4">
      <h1 class="mt-4">User</h1>

      <div class="card mb-4">
        <div class="card-body">
          <a class="btn btn-success mb-2" href="{{ route('user.create') }}" role="button">Create New</a>
          <table id="datatablesSimple" class="table table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Registered At</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                <tr>
                  <td>
                    <p class="mt-3">{{ $loop->iteration }}</p>
                  </td>
                  <td>
                    <p class="mt-3">{{ $user->name }}</p>
                  </td>
                  <td>
                    <p class="mt-3">{{ $user->email }}</p>
                  </td>
                  <td>
                    <p class="mt-3">{{ \Carbon\Carbon::parse($user->created_at)->toFormattedDateString() }}</p>
                  </td>

                  <td>
                    <div class="dropdown p-3">
                      <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Aksi
                      </a>

                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('user.edit', $user->id) }}"><i
                              class="fa-regular fa-pen-to-square"></i> &nbsp;
                            Edit</a></li>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="dropdown-item text-danger">
                            <i class="fa-solid fa-trash-can"></i> &nbsp; Delete
                          </button>
                        </form>
                      </ul>
                    </div>
                    {{-- <form onsubmit="return confirm('Are you sure? ');" action="{{ route('user.destroy', $user->id) }}"
                      method="POST">
                      <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                      @csrf
                      @method('DELETE')

                      <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form> --}}
                  </td>
                </tr>
              @endforeach
              </body>
          </table>
        </div>
        <!-- jquery -->
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <!-- jquery datatable -->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

        <!-- script tambahan  -->
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>

        <script>
          //   $(document).ready(function() {
          //     $('#datatablesSimple').DataTable({
          //       // script untuk membuat export data
          //       dom: 'Bfrtip',
          //       buttons: [
          //         'copy', 'csv', 'excel', 'pdf', 'print'
          //       ]
          //     })
          //   });
        </script>
      </div>
    </div>
  </main>
@endsection

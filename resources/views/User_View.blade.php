@include('layouts.navbar')

<div class="content-wrapper d-flex flex-column min-vh-100">
    <div class="container mt-4 flex-grow-1">
        <h2 class="page-title text-center">User List</h2>

        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
            <a href="/users/create" class="btn btn-primary">Add User</a>

            <form action="/import-csv" method="POST" enctype="multipart/form-data" class="d-flex gap-2">
                @csrf
                <input type="file" name="csv_file" class="form-control" required>
                <button type="submit" class="btn btn-success">Import CSV</button>
            </form>

            <a href="/export-csv" class="btn btn-warning">Export CSV</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-dark table-hover text-center w-100">
                <thead>
                    <tr>
                        <th>Profile</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Street</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Country</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td><img src="{{ $user->profile_image }}" class="profile-img"></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->street_address }}</td>
                            <td>{{ $user->city }}</td>
                            <td>{{ $user->state }}</td>
                            <td>{{ $user->country }}</td>
                            <td>
                                <a href="/users/{{ $user->id }}/edit" class="btn btn-sm btn-update">Update</a>
                                <a href="/users/{{ $user->id }}/delete" class="btn btn-sm btn-delete">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <footer class="footer mt-auto bg-dark text-white text-center py-3">
        &copy; 2025 Your Company. All Rights Reserved.
    </footer>
</div>

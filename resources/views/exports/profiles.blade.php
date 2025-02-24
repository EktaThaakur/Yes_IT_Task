<table>
    <thead>

        <tr>
            <th>SL</th>
            <th>Profile</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Street</th>
            <th>City</th>
            <th>State</th>
            <th>Country</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($profiles as $user)
            <tr>
                <td>
                    {{ $user->id }}
                </td>
                <td>
                    {{ $user->profile_image }}
                </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->street_address }}</td>
                <td>{{ $user->city }}</td>
                <td>{{ $user->state }}</td>
                <td>{{ $user->country }}</td>

            </tr>
        @endforeach
    </tbody>
</table>

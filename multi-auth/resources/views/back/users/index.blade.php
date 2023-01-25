@extends('back.master')

@section('content')
    <section class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h5>Users</h5>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @foreach ($user->roles as $role)
                                        <span class="badge bg-primary">{{ $role->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach (Auth::user()->roles as $role)
                                        @if ($role->name == 'Manager')
                                            <a href="{{ url("/admin/users/edit/$user->id") }}"
                                                class="btn btn-sm btn-info">Manage
                                                Roles
                                            </a>
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

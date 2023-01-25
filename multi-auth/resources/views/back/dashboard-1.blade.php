@extends('back.master')

@section('content')
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Dashboard One</h1>
                <ul>
                    <li>Name: {{ Auth::user()->name }}</li>
                    <li>Email: {{ Auth::user()->email }}</li>
                    <li>
                        Roles:
                        @foreach (Auth::user()->roles as $role)
                            <div class="badge bg-info">{{ $role->name }}</div>
                        @endforeach
                    </li>
                </ul>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <a href="{{ url('/admin/users') }}" class="btn btn-primary">User</a>
                    <a href="{{ url('/admin/roles') }}" class="btn btn-primary">Role</a>
                    <button class="btn btn-danger float-end"
                        onclick="return confirm('Are you sure you want to logout?')">Logout</button>
                </form>
                <hr>
                @foreach (Auth::user()->roles as $role)
                    @if ($role->name == 'Manager')
                        <a href="{{ url('/admin/managers') }}" class="btn btn-primary">Dashboard One</a>
                    @elseif ($role->name == 'Supervisor')
                        <a href="{{ url('/admin/managers') }}" class="btn btn-primary">Dashboard One</a>
                    @elseif ($role->name == 'Staff')
                        <a href="{{ url('/admin/staffs') }}" class="btn btn-primary">Dashboard Two</a>
                    @elseif ($role->name == 'User')
                        <a href="{{ url('/admin/normal_users') }}" class="btn btn-primary">Dashboard Three</a>
                    @endif
                    {{-- @endif
                    @if ($role->name == 'Staff')
                        <a href="{{ url('/admin/staffs') }}" class="btn btn-primary">Dashboard Two</a>
                    @endif
                    @if ($role->name == 'User')
                        <a href="{{ url('/admin/normal_users') }}" class="btn btn-primary">Dashboard Three</a>
                    @endif --}}
                @endforeach

            </div>
        </div>
    </section>
@endsection

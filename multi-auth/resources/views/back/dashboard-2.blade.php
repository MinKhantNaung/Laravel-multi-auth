@extends('back.master')

@section('content')

    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-3">Dashboard Two</h1>
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

                    <button class="btn btn-danger float-end" onclick="return confirm('Are you sure you want to logout?')">Logout</button>
                </form>
                <hr>
                @foreach (Auth::user()->roles as $role)
                    @if ($role->name == 'Manager' || $role->name == 'Supervisor')
                        <a href="{{ url('/admin/managers') }}" class="btn btn-primary">Dashboard One</a>
                    @endif
                    @if ($role->name == 'Staff')
                        <a href="{{ url('/admin/staffs') }}" class="btn btn-primary">Dashboard Two</a>
                    @endif
                    @if ($role->name == 'User')
                        <a href="{{ url('/admin/normal_users') }}" class="btn btn-primary">Dashboard Three</a>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

@endsection

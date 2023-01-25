@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard Three</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

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

                            <button class="btn btn-danger float-end"
                                onclick="return confirm('Are you sure you want to logout?')">Logout</button>
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
            </div>
        </div>
    </div>
@endsection

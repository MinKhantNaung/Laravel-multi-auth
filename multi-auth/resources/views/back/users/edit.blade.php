@extends('back.master')

@section('content')
    <section class="container mt-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="{{ url("/admin/users/update/$user->id") }}" method="POST">

                    @csrf
                    <div class="mb-3">
                        <h5>User</h5>
                        <input type="text" class="form-control" value="{{ $user->name }}">
                    </div>
                    <div class="mb-3">
                        <h5>Role</h5>

                        @foreach ($roles as $role)
                            <div>
                                <input type="checkbox" name="role_ids[]" value="{{ $role->id }}" id="label{{ $role->id }}"
                                @foreach ($user->roles as $userRole)
                                    @if ($userRole->name == $role->name)
                                        checked
                                    @endif
                                @endforeach
                                >
                                <label for="label{{ $role->id }}">{{ $role->name }}</label>
                            </div>
                        @endforeach

                    </div>
                    <button class="btn btn-primary btn-sm">Add Role</button>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </section>
@endsection

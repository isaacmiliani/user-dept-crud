@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <a class="btn btn-outline-primary btn-block" href="{{ route('users.index') }}">Users</a>
                        <a class="btn btn-outline-primary btn-block" href="{{ route('departments.index') }}">Departments</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

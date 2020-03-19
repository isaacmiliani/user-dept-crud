@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header container-fluid">
                        <div class="row">
                            <div class="col-md-10">
                                {{ __('Users') }}
                            </div>
                            <div class="col-md-2 float-right">
                                <a class="btn btn-outline-secondary btn-sm" href="{{ route('home') }}"> Back</a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th width="200px">Action</th>
                            </tr>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <form action="{{ route('users.destroy',$user->id) }}" method="POST">

                                            <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {!! $users->links() !!}

                    <tr>
                        @if (Route::has('register'))
                            <a class="btn btn-primary btn-block" href="{{ route('register') }}">Create New User</a>
                        @endif
                    </tr>

                </div>
            </div>
        </div>
    </div>
@endsection




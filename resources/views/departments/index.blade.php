@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header container-fluid">
                        <div class="row">
                            <div class="col-md-10">
                                {{ __('Departments') }}
                            </div>
                            <div class="col-md-2 float-right">
                                <a class="btn btn-outline-secondary btn-sm" href="{{ route('home') }}"> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <th>Details</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($departments as $department)
                                <tr>
                                    <td>{{ $department->name }}</td>
                                    <td>{{ $department->description }}</td>
                                    <td>
                                        <form action="{{ route('departments.destroy',$department->id) }}" method="POST">

                                            <a class="btn btn-primary btn-sm" href="{{ route('departments.edit',$department->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                        {!! $departments->links() !!}
                    </div>
                </div>
                <tr>
                    @if (Route::has('register'))
                        <a class="btn btn-primary btn-block" href="{{ route('departments.create') }}">Add Department</a>
                    @endif
                </tr>
            </div>
        </div>
    </div>
@endsection

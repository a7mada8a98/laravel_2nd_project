@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-5">
            <br>
            <div class="card text-center">
                <div class="card-header">{{$employee['name']}}</div>
                <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{$employee['first_name']}} {{$employee['last_name']}}</li>
                    <li class="list-group-item">{{$employee['email']}}</li>
                    <li class="list-group-item">{{$employee['phone']}}</li>
                    <li class="list-group-item"><a href="{{route('employees.edit',$employee)}}" class="btn btn-primary">Edit</a></li>
                    <li class="list-group-item">
                    <form action="{{ route('employees.destroy', $employee) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="delete" class="btn btn-danger">Delete</button>
                    </form>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>
@endsection
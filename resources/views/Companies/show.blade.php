@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <br>
            <div class="card text-center col-md-8 col-lg-5">
                <div class="card-header">{{$company['name']}}</div>
                <div class="pt-5">
                    <img src="{{asset('storage/'.$company->logo) }}" class="rounded-circel" style="height: 100px;">
                </div>
                <div class="card-body">
                    <h5 class="card-title pt-5">
                        <form method="post" action="{{ route('companies.storeImage',[$company['id']])}}" enctype="multipart/form-data">
                            @csrf
                            <div class="image">
                                <input type="file" class="form-control" required name="image">
                            </div>
                            <br>
                            <div class="post_button">
                                <button type="submit" class="btn btn-success">Change Pic</button>
                            </div>
                        </form>
                    </h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{$company['email']}}</li>
                    <li class="list-group-item">{{$company['website']}}</li>
                    <li class="list-group-item"><a href="{{route('companies.edit',$company)}}" class="btn btn-primary">Edit</a></li>
                    <li class="list-group-item">
                        <form action="{{ route('companies.destroy', $company) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="delete" class="btn btn-danger">Delete</button>
                        </form>
                    </li>
                </ul>
            </div>
            <br>
            <div class="card col-md-12">
                <div class="card-header">Assigned Employees</div>
                <div class="card-body">
                    <table class="table table-striped table-hover table-bordered text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col"><strong>First Name</strong></th>
                                <th scope="col"><strong>Last Name</strong></th>
                                <th scope="col"><strong>Email</strong></th>
                                <th scope="col"><strong>Phone</strong></th>
                                <th scope="col"><strong>Action</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                            <tr>
                                <th scope="row">{{$employee['first_name']}}</th>
                                <th scope="row">{{$employee['last_name']}}</th>
                                <th scope="row">{{$employee['email']}}</th>
                                <th scope="row">{{$employee['phone']}}</th>
                                <th scope="row"><a href="{{route('employees.show',[$employee['id']])}}">view</a></th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-sm-12 ">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <br>
            <div class="card col-md-8 ">
                <div class="card-header">Assign an Employee</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('employees.store') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="first_name" class="col-md-4 col-form-label text-md-end">First Name</label>
                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="last_name" class="col-md-4 col-form-label text-md-end">Last Name</label>
                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('website') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="comp_id" class="col-md-4 col-form-label text-md-end">Company</label>
                            <div class="col-md-6">
                                <select id="comp_id" name="comp_id" class="form-select" aria-label="Default select example">
                                    @foreach($companies as $company)
                                    <option value="{{$company->id}}">{{$company->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Assign
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
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
                                <th scope="col"><strong>Company</strong></th>
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
                                <th scope="row">{{$employee['id']}}</th>
                                <th scope="row"><a href="{{route('employees.show',$employee)}}">view</a></th>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                    {{ $employees->render("pagination::default") }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
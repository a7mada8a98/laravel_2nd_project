@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       
        <div class="col-sm pt-5">
            <div class="card col-md-8 ">
                <div class="card-header text-center">Registered Companies</div>
                <div class="card-body text-center">
                    <strong>{{$companies}}</strong>
                </div>
            </div>
        </div>
        <div class="col-sm pt-5">
            <div class="card col-md-8 ">
                <div class="card-header text-center">Assigned Employees</div>
                <div class="card-body text-center">
                    <strong>{{$employees}}</strong>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
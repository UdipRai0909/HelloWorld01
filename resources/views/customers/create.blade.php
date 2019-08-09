
@extends('layouts.app')

@section('title', 'Add New Customer')

@section('content')

    <div class="row pl-5">
        <div class="col-12">
            <h1 class="text-center text-info ">Add New Customer</h1>
        </div>
    </div>

    <div class="row px-5">
        <div class="col-12">
            <div class="card p-3">
                <div class="card-body">
                    <form action="/customers" method="POST" class="">
                        @include('customers.files.form')
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Add Customer</button>
                        </div>
                    </form>
                </div>
        </div>
        </div>
    </div>

@endsection



@extends('layouts.app')

@section('title', 'Edit Customer Details')

@section('content')

<div class="row pl-5">
    <div class="col-12">
        <h1 class="text-center text-info">Edit Details</h1>
    </div>
</div>

<div class="row px-5">
    <div class="col-12">
        <div class="card p-3">
            <div class="card-body">
                <form action="/customers/{{ $customer->id }}" method="POST" class="">
                    @method('PATCH')
                    @include('customers.files.form')
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Customer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
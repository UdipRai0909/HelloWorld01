
@extends('layouts.app')

@section('title', 'Customers')

@section('content')

    <div class="row pl-5">
        <div class="col-12">
            <h1 class="text-center text-info">Customer Lists</h1>
            <h3><a href="customers/create">Add New Customer</a></h3>
        </div>
    </div>



    <div class="row pt-3 border border-dark mr-2">
        <div class="col-2">Customer Id</div>
        <div class="col-3">Customer Name</div>
        <div class="col-3">Company Name</div>
        <div class="col-2">Status</div>
    </div>    
    @foreach($customers as $customer)
        <div class="row pt-4 p-2 border mr-2">
            <div class="col-2">{{ $customer->id }}</div>

            <div class="col-3"><a href="/customers/{{ $customer->id }}">
                {{ $customer->name }}
            </a></div>

            <div class="col-3">{{ $customer->company->name }}</div>
            <!-- 
                div class="col-2">{{ $customer->active ? 'Active' : 'In-Active'}}</div>
                </div>        -->
        <div class="col-2">{{ $customer->active }}</div>
        </div>       
    @endforeach

@endsection



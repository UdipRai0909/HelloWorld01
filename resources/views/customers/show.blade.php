
@extends('layouts.app')

@section('title', 'Customer Details')

@section('content')

    <div class="row pl-5">
        <div class="col-12">
            <h1 class="ml-5 text-info text-center">Details of {{ $customer->name }}</h1>
            <button class="btn btn-primary"><a class="text-white" href="/customers/{{ $customer->id }}/edit">Edit</a></button>
            
            <form action="/customers/{{ $customer->id }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger" type="submit"><a class="text-white">Delete</a></button>
            </form>
        </div>
    </div>

    <div class="row pt-3">
        <div class="col-9">
            <table class="table">
                <tr>
                    <th>Customer Id</th>
                    <th colspan="2">Name</th>
                    <th colspan="2">Email</th>
                    <th colspan="2">Company</th>
                </tr>
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td colspan="2">{{ $customer->name }}</td>
                    <td colspan="2">{{ $customer->email }}</td>
                    <td colspan="2">{{ $customer->company->name }}</td>
                </tr>
            </table>
        </div>
    </div>

@endsection



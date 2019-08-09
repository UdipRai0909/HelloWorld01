@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')



@if(!session() -> has('message'))
<h1 class="text-center text-info">Contact Page</h1>
<form action="/contact" method="POST" class="mr-5">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter name..">
        <div class="text-danger">{{ $errors->first('name') }}</div>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter email..">
        <div class="text-danger">{{ $errors->first('email') }}</div>
    </div>

    <div class="form-group">
        <label for="message">Message</label>
        <textarea name="message" id="message01" cols="30" rows="10" class="form-control">{{ old('message') }}</textarea>
        <div class="text-danger">{{ $errors->first('message') }}</div>
    </div>
    @csrf
    <button class="btn btn-success">Send Message</button>
</form>
@endif
@endsection
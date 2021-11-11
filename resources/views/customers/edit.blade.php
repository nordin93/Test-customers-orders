@extends('layouts.app')
@section('content')
<div class="offset-md-10 col-md-2">
  <a href="{{ route('customers.create') }}" class="btn btn-primary btn-block">Create a New Customer</a>
</div>
  <form action="{{ route('customers.update', $customer) }}" method="POST">
    @csrf
    @method('PUT')
    @include('customers._form')
    <button type="submit" class="btn btn-warning">Update</button>
  </form>
@stop

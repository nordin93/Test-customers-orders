@extends('layouts.app')
@section('content')
  <form action="{{route('store')}}" method="POST">
    @csrf
    @include('orders.form')
    <button type="submit" class="btn btn-primary">Save</button>
  </form>
@stop

@extends('layouts.app')
@section('content')
<div class="offset-md-10 col-md-2">
  <a href="{{ route('create') }}" class="btn btn-primary btn-block">Create a new Order</a>
</div>
<form action="{{route('update' ,$order)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{$order->title}}">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Discription</label>
            <input type="text" name="description" class="form-control" value="{{ $order->description }}">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-2">
          <div class="form-group">
            <label>Cost</label>
            <input type="number" name="cost" class="form-control" value="{{$order->cost }}">
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label>Cliente</label>
            <select class="form-control" name="customer_id" id="customer_id">
              <option name="customer_id" value="{{$order->customer_id}}">{{$order->customer->first_name}} {{$order->customer->last_name}}</option>
              @foreach ($customers as $customer)
              <option name="customer_id" value="{{$customer->id}}">{{$customer->first_name}} {{$customer->last_name}}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
    <button type="submit" class="btn btn-warning">Update</button>
  </form>
@stop

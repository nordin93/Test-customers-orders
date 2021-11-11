@extends('layouts.app')

@section('content')
<div class="row">
    <div class="offset-md-10 col-md-2">
      <a href="{{ route('create') }}" class="btn btn-primary btn-block">New Order</a>
      <a href="{{ route('contract') }}" class="btn btn-success btn-block">Contract</a>
    </div>
    @if ($countOrder == 0)
    <div class="col-12">
      <h4>No order has been placed yet</h4>
  </div>
    @endif
</div>
<br>
<div class="row">
  <div class="col-md-12">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Discription</th>
          <th scope="col">Name Customer</th>
          <th scope="col">Cost</th>
          <th scope="col">Associated Tags</th>
          <th scope="col" colspan="2" class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($orders as $order)

        @if ($order->delete == 0)
            
          <tr>
            <th scope="row">{{ $order->id }}</th>
            <td>{{ $order->title }}</td>
            <td>{{ $order->description }}</td>
            <td>{{ $order->customer->first_name}}</td>
            <td>{{ $order->cost }} €</td>
            <td><a class="btn btn-warning"  href="{{ route('tag', $order) }}">Look Tag</a></td>
            <td><a class="btn btn-warning"  href="{{ route('edit', $order) }}">Edit</a></td>
            <td><a class="btn btn-success" href="{{ route('order.delete', $order) }}">Move to trash</a></td>
            </tr>
          @endif
        @endforeach
      </tbody>
    </table>
  </div>
</div>


<div class="row">
  <div class="col-md-12">
    {{ $orders->links() }}
  </div>
</div>


@stop
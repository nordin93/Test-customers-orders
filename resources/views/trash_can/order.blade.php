@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <h2>Trash can of Order</h2>
    </div>
    @if ($countOrder == 0)
    <div class="col-12">
      <h4>Trash can is Empty</h4>
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
          <th scope="col" colspan="2" class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($orders as $order)            
          <tr>
            <th scope="row">{{ $order->id }}</th>
            <td>{{ $order->title }}</td>
            <td>{{ $order->description }}</td>
            <td>{{ $order->customer->first_name}}</td>
            <td>{{ $order->cost }} €</td>
            <td><form method="POST" class="btn-position" action="{{route('order.destroy',$order)}}">
              @method('delete')
              @csrf
              <button class="btn btn-danger" type="submit">Delete</button>
             </form></td>
            <td><a class="btn btn-success" href="{{ route('order.delete', $order) }}">Restore</a></td>
            </tr>
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
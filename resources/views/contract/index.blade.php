@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
      <h3>These are the contacts associated with orders and customers</h3>
  </div>
</div>
<br>
<div class="row">
  <div class="col-md-12">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Order Number</th>
          <th scope="col">Order Title</th>
          <th scope="col">Customer Number</th>
          <th scope="col">Customer name</th>
        </tr>
      </thead>
      <tbody>              
        @foreach($contracts as $contract)
        <tr>
          <th scope="row">{{ $contract->id}}</th>
          <td>{{ $contract->order->id}}</td>
          <td>{{ $contract->order->title }}</td>
          <td>{{ $contract->customer->id }}</td>
          <td>{{ $contract->customer->first_name }}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    {{ $contracts->links() }}
  </div>
</div>

@stop

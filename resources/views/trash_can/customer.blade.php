@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <h2>Trash can of Customer</h2>
    </div>
</div>
<br>
<br>
<div class="row">
  <div class="col-md-12">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">Company</th>
          <th scope="col" colspan="2" class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($customers as $customer)
          @if ($customer->delete == 1)
          <tr>
            <th scope="row">{{ $customer->id }}</th>
            <td>{{ $customer->first_name }}</td>
            <td>{{ $customer->last_name }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->phone }}</td>
            <td>{{ $customer->company }}</td>
            <td><form method="POST" class="btn-position" action="{{route('customer.destroy',$customer)}}">
              @method('delete')
              @csrf
              <button class="btn btn-danger" type="submit">Delete</button>
             </form></td>
            <td><a class="btn btn-success" href="{{ route('customer.delete', $customer) }}">Restore</a></td>
          </tr>
          @endif
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    {{ $customers->links() }}
  </div>
</div>


@stop
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
          <th scope="col">Tag Number</th>
          <th scope="col">Tag Name</th>
        </tr>
      </thead>
      <tbody>              
        @foreach($tags as $tag)
        <tr>
          <th scope="row">{{ $tag->id}}</th>
          <td>{{ $tag->name}}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>


@stop

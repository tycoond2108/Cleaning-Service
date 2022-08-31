@extends('layouts.base')

@section('stylesheets')
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
@endsection

@section('headerScripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection

@section('title')
My Orders
@endsection

@section('content')

@if(count($orders) == 0)
  <div>
  <h1>Sorry It looks like you have no orders yet!</h1>
</div>
@else

@foreach($orders as $order)
<div style="margin:10px;">
  <h1>Date Customer Ordered:</h1>
  <h3 style="color: blue;">{{$order->created_at}}</h3>
  <h1>Order from:</h1>
  <h3><a href="/users/{{$order->user->id}}">{{$order->user->name}}</a></h3>
  <h1>Type Of Service:</h1>
  <h3 style="color: blue;">{{$order->service->name}}</h3>
  <h1>House Access:</h1>
  <h3 style="color: blue;">{{$order->house_access}}</h3>
  <h1>Day:</h1>
  <h3 style="color: blue;">{{$order->day}}</h3>
  <h1>From:</h1>
  <h3 style="color: blue;">{{$order->from}}</h3>
  <h1>To:</h1>
  <h3 style="color: blue;">{{$order->to}}</h3>
  <h1>Preferred Language:</h1>
  <h3 style="color: blue;">{{$order->preferred_language}}</h3>
  <h1>Status:</h1>
  @if($order->status == null)
  <form method="PUT" action="/orders-change-stat/{{$order->id}}">
    @csrf
    <select name="status" class="form-select" style="width: 300px; font-size: 1.5rem;">
      <option value="1">Accept</option>
      <option value="2">Decline</option>
    </select>
    <button class="btn btn-primary" type="submit" style="width: 300px; font-size: 1.5rem;">Accept Or Decline</button>
  </form>
  @else
  
  @if($order->status == 1)
  <h3 style="color: blue;">Accepted</h3>
  @elseif($order->status == 2)
  <h3 style="color: blue;">Declined</h3>
  @endif
  
  @endif
<br>
<br>
<hr>
<hr>

</div>

@endforeach
@endif
@endsection

@section('scripts')

@endsection
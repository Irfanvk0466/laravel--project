@extends('layouts.master')
@section('title','view page')
@section('content')
    <div class="container">
      <ul>
        <li>Name : {{$user->myName}}</li>
        <li>DOB : {{$user->DOB_formatted}}</li>
        <li>Email : {{$user->email}}</li>
        <li>Phone : {{$user->phone}}</li>
        <li>status : {{$user->status_text}}</li>
      </ul>
      <hr>
      <ul>
      @if($user->address)
        <li>Address id: {{$user->address->address_id}}</li>
        <li>Address user id: {{$user->address->user_id}}</li>
        <li>Address Line 1: {{$user->address->address_line_1}}</li>
        <li>City: {{$user->address->city}}</li>
        <li>Post Code: {{$user->address->post_code}}</li>
        <li>State: {{$user->address->state}}</li>
      @else
        <li>No address available</li>
      @endif
      </ul>
      <hr>
      <h5>Orders:</h5>
      <table class="table">
        <thead>
          <tr>
            <td>OrderID</td>
            <td>UserID</td>
            <td>Price</td>
            <td>Status</td>
            <td>Placed At</td>
          </tr>
        </thead>
        <tbody>
          @foreach ($user->orders->whereNotNull('user_id') as $order)
          <tr>
            <td>{{ $order->order_id }}</td>
            <td>{{ $order->user_id }}</td>
            <td>{{number_format($order->price,2) }}</td>
            <td>{{ $order->status_text }}</td>
            <td>{{ $order->created_at  }}</td>
          </tr>
          @endforeach
       
         
        
        </tbody>


    
      </table>
      

   





    </div>
@endsection
@extends('layouts.master')
@section('title','New form')
@section('content')
    <div class="container">
        <form action="{{route('update.formpage')}}" method="post">
        @csrf <!-- csrf means it is a tocken which uses when the new pageloaded shows it expired so, generting csrf tocken is the solution for this  -->
    <input type="hidden" name="user_id" value="{{ encrypt($user->user_id)}}">    
    <div class="form-group">
    <label>myName</label>
    <input type="text" name="myName" value="{{$user->myName}}" class="form-control" placeholder="Enter your name"><br>

  </div>
  <div class="form-group">
    <label>DOB</label>
    <input type="text" name="DOB" value="{{$user->DOB_formatted}}" class="form-control" placeholder="date_of_birth"><br>
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" name="email" value="{{$user->email}}" class="form-control" placeholder="email@gmail.com"><br>
  </div>
  <div class="form-group">
    <label>Phone</label>
    <input type="text" name="phone" value="{{$user->phone}}" class="form-control" placeholder="9567618629"><br>
  </div>
  <div class="form-group">
    <label>Status</label>
    <select class="form-control" name="status"><br>
        <option value="1" @if($user->status == 1) selected = "selected" @endif> Active</option>
        <option value="0" @if($user->status == 0) selected = "selected" @endif> inactive</option>
    </select>
   
  </div>

  <br><button type="submit" class="btn btn-primary">Submit</button>
</form>


    </div>
@endsection
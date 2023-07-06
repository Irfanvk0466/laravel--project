@extends('layouts.master')
@section('title','New User')
@section('content')
    <div class="container">
        <form action="{{route('save.formpage')}}" method="post">
        @csrf <!-- csrf means it is a tocken which uses when the new pageloaded shows it expired so, generting csrf tocken is the solution for this  -->
  <div class="form-group">
    <label>myName</label>
    <input type="text" name="myName" class="form-control" placeholder="Enter your name">
    @error('myName')<p class="w3-panel w3-red">{{ $message }}</p>@enderror<br>

  </div>
  <div class="form-group">
    <label>DOB</label>
    <input type="date" name="DOB" class="form-control" placeholder="date_of_birth">
    @error('DOB')<p class="w3-panel w3-red">{{ $message }}</p>@enderror<br>
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control" placeholder="email@gmail.com">
    @error('email')<p class="w3-panel w3-red">{{ $message }}</p>@enderror<br>
  </div>
  <div class="form-group">
    <label>Phone</label>
    <input type="text" name="phone" class="form-control" placeholder="9567618629">
    @error('phone')<p class="w3-panel w3-red">{{ $message }}</p>@enderror<br>
  <div class="form-group">
    <label>Status</label>
    <select class="form-control" name="status"><br>
        <option value="1">Active</option>
        <option value="0">inactive</option>
    </select>
   
  </div>

  <br><button type="submit" class="btn btn-primary">Submit</button>
</form>


    </div>
@endsection
        @extends('layouts.master')
        @section('title','admin-welcome')
        @section('content')
            <h2 style="text-align: center;">laravel Admin Table:</h2>
            <h4>users:<h4>
               <p>@if(session()->has('message'))
                {{ session()->get('message')}}</p>
                @endif
                <h4>welcome {{auth()->guard('admin')->user()->name}}</h4>
                <a href="{{route('logoutpage')}}" class="btn btn-danger">LogOut</a>
                <a href="{{route('new.userpage')}}" style="margin-left: 1170px;margin-bottom: 10px;" class="btn btn-primary">New</a>
            <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">myName</th>
                <th scope="col">Email</th>
                <th scope="col">DOB</th>
                <th scope="col">Phone</th>
                <th scope="col">Orders</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach($users as $user)
                <tr>
                <th scope="row">{{$users->firstItem() + $loop->index}}</th>
                <td>{{ $user->myName }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->DOB_formatted}}</td>
                <td>{{ $user->phone}}
                <td>{{ $user->Orders_count }}</td>
                <td>@if($user->trashed()) Trashed @else Active @endif </td>
                <td>
                    
                    @if($user->trashed())<a href="{{route('activate.formpage', encrypt($user->user_id))}}" class="btn btn-success">Activate</a>@endif
                    <a href="{{route('view.formpage', encrypt($user->user_id))}}" class="btn btn-warning">View</a>
                    <a href="{{route('edit.formpage', encrypt($user->user_id))}}" class="btn btn-primary">Edit</a>
                    <a href="{{route('delete.formpage',encrypt($user->user_id))}}" class="btn btn-danger">Delete</a>
                    <a href="{{route('force.formpage',encrypt($user->user_id))}}" class="btn btn-info">forceDelete</a>
                </td>
                </tr>
                @endforeach

            </tbody>
            </table>
            <div class="pagination" style="margin-left: 300px; margin-top:50px;">
                {{ $users->links()}}
            </div>
        @endsection
    
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                  <a href="{{route('home')}}">Dashboard</a>
                   @isset(Auth::user()->role->permission->permission['user']['add'])
                  <a href="{{route('user.create')}}" class="float-right btn btn-sm btn-success">New User</a>
                  @endisset
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th>Role</th>
                          <th colspan="2">Action</th>
                      
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($users as $user)
                        <tr>
                        
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->role->roleName}}</td>
                          @isset(Auth::user()->role->permission->permission['user']['edit'])
                          <td colspan="1">
                            <a href="{{route('user.edit',$user)}}" class="btn btn-sm btn-info ">Edit</a>
                          </td>
                          @endisset
                          @isset(Auth::user()->role->permission->permission['user']['delete']) 
                           <td colspan="1">
                            <form action="{{route('user.destroy',$user->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <input type="hidden" name="id" value="{{$user->id}}">
                              <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                            </form>

                          </td>
                          @endisset
                         
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

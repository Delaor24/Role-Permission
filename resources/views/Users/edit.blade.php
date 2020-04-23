@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><a href="{{route('home')}}">Dashboard</a>
                   @isset(Auth::user()->role->permission->permission['user']['list'])
                  <a href="{{route('user.index')}}" class="float-right btn btn-sm btn-success">Users</a>
                  @endisset
                </div>

                <div class="card-body">
              
                    <form method="post" action="{{route('user.update',$user->id)}}">
                      @csrf
                      @method('PUT')
                  
                     <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" placeholder="Full Name" value="{{$user->name}}" name="name" class="form-control @error('name') is-invalid @enderror">
                          @error('name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                          @enderror
                      </div>


                     <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" placeholder="Email" value="{{$user->email}}" name="email" class="form-control @error('email') is-invalid @enderror">
                          @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                          @enderror
                      </div>

                      <div class="form-group">
                        <label for="roleName">Role</label>
                        <select class="form-control @error('role_id') is-invalid @enderror" name="role_id">
                          <option value="">--select role--</option>
                          @foreach($roles as $role)
                           <option value="{{$role->id}}" {{$role->id == $user->role_id ? 'selected':''}}>{{$role->roleName}}</option>
                          @endforeach
                        </select>
                          @error('role_id')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                          @enderror
                      </div>
                      <button type="submit" class="btn btn-success btn-sm">Update User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

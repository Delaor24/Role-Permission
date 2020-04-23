@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                  <a href="{{route('home')}}">Dashboard</a>
                   @isset(Auth::user()->role->permission->permission['role']['add'])
                  <a href="{{route('role.create')}}" class="float-right btn btn-sm btn-success">New Role</a>
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
                          <th scope="col">Role</th>
                          <th colspan="2">Action</th>
                      
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($roles as $role)
                        <tr>
                        
                          <td>{{$role->roleName}}</td>
                          @isset(Auth::user()->role->permission->permission['role']['edit'])
                          <td colspan="1">
                            <a href="{{route('role.edit',$role)}}" class="btn btn-sm btn-info ">Edit</a>
                          </td>
                          @endisset
                         @isset(Auth::user()->role->permission->permission['role']['delete'])
                           <td colspan="1">
                            <form action="{{route('role.destroy',$role->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <input type="hidden" name="id" value="{{$role->id}}">
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

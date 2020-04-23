@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                  <a href="{{route('home')}}">Dashboard</a>
                   @isset(Auth::user()->role->permission->permission['permission']['add'])
                  <a href="{{route('permission.create')}}" class="float-right btn btn-sm btn-success">New Permission</a> @endisset
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
                          <th scope="col">Permissions</th>
                          <th colspan="2">Action</th>
                      
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($permissions as $permission)
                        <tr>
                        
                          <td>{{$permission->role->roleName}}</td>
                           @isset(Auth::user()->role->permission->permission['permission']['edit'])
                          <td colspan="1">
                            <a href="{{route('permission.edit',$permission)}}" class="btn btn-sm btn-info ">Edit</a>
                          </td>
                          @endisset
                          
                            @isset(Auth::user()->role->permission->permission['permission']['delete'])
                           <td colspan="1">
                            <form action="{{route('permission.destroy',$permission->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <input type="hidden" name="id" value="{{$permission->id}}">
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

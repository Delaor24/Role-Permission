@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><a href="{{route('home')}}">Dashboard</a>
                   @isset(Auth::user()->role->permission->permission['permission']['list'])
                  <a href="{{route('permission.index')}}" class="float-right btn btn-sm btn-success">Permissions</a>
                  @endisset
                </div>

                <div class="card-body">
              
                    <form method="post" action="{{route('permission.update',$permission->id)}}">
                      @csrf
                      @method('PUT')
                      <div class="form-group">
                        <label for="roleName">Role</label>
                        <select class="form-control @error('role_id') is-invalid @enderror" name="role_id">
                          <option value="">--select role--</option>
                          @foreach($roles as $role)
                           <option value="{{$role->id}}" {{$role->id == $permission->role_id ? 'selected':''}}>{{$role->roleName}}</option>
                          @endforeach
                        </select>
                          @error('role_id')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                          @enderror
                      </div>

                      <div class="form-group">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <td>Permissions</td>
                              <td>Add</td>
                              <td>Edit</td>
                              <td>Delete</td>
                              <td>List</td>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Role</td>
                              <td>
                                <input @isset($permission['permission']['role']['add']) checked="" @endisset type="checkbox" name="permission[role][add]" value="1"></td>
                              <td>
                                <input @isset($permission['permission']['role']['edit']) checked="" @endisset  type="checkbox" name="permission[role][edit]" value="1"></td>
                              <td>
                                <input @isset($permission['permission']['role']['delete']) checked="" @endisset type="checkbox" name="permission[role][delete]" value="1"></td>
                              <td>
                                <input @isset($permission['permission']['role']['list']) checked="" @endisset type="checkbox" name="permission[role][list]" value="1"></td>
                            </tr>

                             <tr>
                              <td>Permission</td>
                              <td>
                                <input @isset($permission['permission']['permission']['add']) checked="" @endisset type="checkbox" name="permission[permission][add]" value="1"></td>
                              <td>
                                <input @isset($permission['permission']['permission']['edit']) checked="" @endisset type="checkbox" name="permission[permission][edit]" value="1"></td>
                              <td>
                                <input @isset($permission['permission']['permission']['delete']) checked="" @endisset type="checkbox" name="permission[permission][delete]" value="1"></td>
                              <td>
                                <input @isset($permission['permission']['permission']['list']) checked="" @endisset type="checkbox" name="permission[permission][list]" value="1"></td>
                            </tr>

                             <tr>
                              <td>User</td>
                              <td><input @isset($permission['permission']['user']['add']) checked="" @endisset type="checkbox" name="permission[user][add]" value="1"></td>
                              <td><input @isset($permission['permission']['user']['edit']) checked="" @endisset type="checkbox" name="permission[user][edit]" value="1"></td>
                              <td><input @isset($permission['permission']['user']['delete']) checked="" @endisset type="checkbox" name="permission[user][delete]" value="1"></td>
                              <td><input @isset($permission['permission']['user']['list']) checked="" @endisset type="checkbox" name="permission[user][list]" value="1"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                
                      <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><a href="{{route('home')}}">Dashboard</a>
                  @isset(Auth::user()->role->permission->permission['role']['list'])
                  <a href="{{route('role.index')}}" class="float-right btn btn-sm btn-success">Roles</a>
                  @endisset
                </div>

                <div class="card-body">
              
                    <form method="post" action="{{route('role.store')}}">
                      @csrf
                      <div class="form-group">
                        <label for="roleName">Role</label>
                        <input type="text" class="form-control @error('roleName') is-invalid @enderror" id="roleName" name="roleName" placeholder="Role Name">
                          @error('roleName')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                          @enderror
                      </div>
                
                      <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

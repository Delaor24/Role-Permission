@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><a href="{{route('home')}}">Dashboard</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul class="list-group">
                      @isset(Auth::user()->role->permission->permission['user']['list'])
                      <li class="list-group-item"><a href="{{route('user.index')}}">users</a></li>
                      @endisset

                       @isset(Auth::user()->role->permission->permission['role']['list'])
                      <li class="list-group-item"><a href="{{route('role.index')}}">Roles</a></li>
                      @endisset

                       @isset(Auth::user()->role->permission->permission['permission']['list'])
                      <li class="list-group-item"><a href="{{route('permission.index')}}">Permissions</a></li>
                      @endisset
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

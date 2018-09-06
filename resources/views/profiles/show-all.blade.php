@extends('layouts.app')

@section('content')
    <br><br><br><br><br><br>
    <div class="container-fluid">
        <div class="row">
            <h3 class="page-title">Registered Users</h3>
        </div>
        
        <div class="row">
            <div class="col-md-3">Name</div>
            <div class="col-md-2">Gender</div>
            <div class="col-md-2">Email</div>
            <div class="col-md-2">Phone</div>
            <div class="col-md-3">Facebook URL</div>
        </div>

        @foreach ($users as $user)
            <div class="row">
                <div class="col-md-3">{{$user->profile->f_name.' '.$user->profile->m_name.' '.$user->profile->l_name}}</div>
                <div class="col-md-2">{{$user->profile->gender}}</div>
                <div class="col-md-2">{{$user->email}}</div>
                <div class="col-md-2">{{$user->profile->phone}}</div>
                <div class="col-md-3">{{$user->profile->fb_url}}</div>
            </div>
        @endforeach

        {{ $users->links() }}
    </div>
@endsection
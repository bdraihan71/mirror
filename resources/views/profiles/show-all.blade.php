@extends('layouts.app')

@section('content')
    <br><br><br><br><br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9"><h3 class="page-title"><a href="/home/#top"><i class="fas fa-arrow-alt-circle-left"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Registered Users</h3></div>
            <div class="col-md-3">
                @if ($flow)
                    <form action="/profile/show-all" method="GET">
                        <input type="hidden" name="role" value="admin">
                        <button class="btn btn-danger w-100">View Admin Accounts</button>
                    </form>
                @else
                    <a href="/profile/show-all" class="btn btn-danger w-100">View User Accounts</a>
                @endif
            </div>
        </div>
        <br>
        
        <div class="row">
            <div class="col">Name</div>
            <div class="col">Gender</div>
            <div class="col">Email</div>
            <div class="col">Phone</div>
            <div class="col">Facebook URL</div>
            @if(!$flow)
                <div class="col">Delete Profile</div>
            @endif
        </div>

        <hr>
        @foreach ($users as $user)
            <div class="row">
                <div class="col">{{$user->profile->f_name.' '.$user->profile->m_name.' '.$user->profile->l_name}}</div>
                <div class="col">{{$user->profile->gender}}</div>
                <div class="col">{{$user->email}}</div>
                <div class="col">{{$user->profile->phone}}</div>
                <div class="col">{{$user->profile->fb_url}}</div>
                @if (!$flow)
                    <a href="/profile/delete/{{$user->id}}" class="btn black-button w-100">Delete</a>
                @endif
            </div>
            <hr>
        @endforeach

        {{ $users->links() }}
    </div>
@endsection
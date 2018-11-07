@extends('layouts.app')

@section('content')
    <section id="dashboard" class="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <nav class="nav flex-column bg-dark nav-height">
                      @if (!App\Http\Controllers\Controller::notAdmin())
                        <strong><a class="nav-link text-white" href="/events/create">CREATE EVENTS</a></strong>
                        <strong><a class="nav-link text-white" href="/partners">PARTNERS</a></strong>
                        <strong><a class="nav-link text-white" href="/media/photo/edit">EDIT EVENT ALBUMS</a></strong>
                        <strong><a class="nav-link text-white" href="/media/video/edit">EDIT EVENT VIDEOS</a></strong>
                        <strong><a class="nav-link text-white" href="/event/feature">FEATURE EVENT</a></strong>
                        @if (auth()->user()->role == 'super-admin')
                            <strong><a class="nav-link text-white" href="/create/admin">CREATE ADMIN</a></strong>
                            <strong><a class="nav-link text-white" href="/analytics/events">EVENTS ANALYTICS</a></strong>
                            <strong><a class="nav-link text-white" href="/profile/show-all">VIEW PROFILES</a></strong>
                            <strong><a class="nav-link text-white" href="/purchases">VIEW PURCHASES</a></strong>
                            <strong><a class="nav-link text-white" href="/issue/create">ISSUE TICKETS</a></strong>
                            <strong><a class="nav-link text-white" href="/export/ticket">EXPORT TICKETS</a></strong>
                        @endif
                      @else
                        <strong><a class="nav-link text-white" href="/cart/show-all">PRODUCT PURCHASES</a></strong>
                        <strong><a class="nav-link text-white" href="/tickets">TICKETS</a></strong>
                      @endif
                    </nav>
                </div>
                <div class="col-md-3 text-center">
                    <i class="far fa-user fa-7x img-fluid rounded-circle "></i>
                    <br><br>
                    <h5 class="text-white">{{$user->profile->f_name.' '.$user->profile->m_name.' '.$user->profile->l_name}}</h5>
                </div>
                <div class="col-md-6">
                    <h5 class="text-danger">Username</h5>
                    <p class="text-white">{{$user->profile->f_name.' '.$user->profile->m_name.' '.$user->profile->l_name}}</p>
                    
                    <form action="/profile/name" method="POST">
                        @csrf
                        <input type="text" maxlength="200" name="name" class="form-control" value="{{$user->profile->f_name.' '.$user->profile->m_name.' '.$user->profile->l_name}}" required>
                        <br>
                        <button type="submit" class="btn btn-outline-danger">Update</button>
                    </form>
                    
                    <br>
                    <br>
                    <br>
                    
                    <h5 class="text-danger">Email Address</h5>
                    <p class="text-white">{{$user->email}}</p>

                    <br>
                    <br>
                    <br>
                    
                    <h5 class="text-danger">Phone Number</h5>
                    <p class="text-white">{{$user->profile->phone}}</p>
                    <form action="/profile/phone" method="POST">
                        @csrf
                        <input type="text" maxlength="14" name="phone" class="form-control" value="{{$user->profile->phone}}" required>
                        <br>
                        <button type="submit" class="btn btn-outline-danger">Update</button>
                    </form>
                    
                    <br>
                    <br>
                    <br>

                    <h5 class="text-danger">Facebook Link</h5>
                    <p class="text-white">{{$user->profile->fb_url}}</p>
                    <form action="/profile/facebook" method="POST">
                        @csrf
                        <input type="text" name="fb_url" class="form-control" value="{{$user->profile->fb_url}}">
                        <br>
                        <button type="submit" class="btn btn-outline-danger">Update</button>
                    </form>
                    
                    <br>
                    <br>
                    <br>
                    
                    @if ($user->facebook == null && $user->google_id == null)
                        @if ($user->role != 'admin')
                            <form action="/profile/password" method="POST">
                                @csrf
                                <h5 class="text-danger">Password</h5>
                                <p class="text-white">Current password</p>
                                <input type="password" class="form-control" name="current" placeholder="**********" required>
                                <br>
                                <p class="text-white">New password</p>
                                <input type="password" class="form-control" name="next" placeholder="**********" required>
                                <br>
                                <p class="text-white">Confirm password</p>
                                <input type="password" class="form-control" name="confirm" placeholder="**********" required>
                                <br>
                                <button type="submit" class="btn btn-outline-danger">Update</button>
                            </form>
                            
                            
                            
                            <br>
                            <br>
                            <br>
                        @endif
                    @endif
                    
                </div>
                
            </div>

        </div>
    </section>
@endsection
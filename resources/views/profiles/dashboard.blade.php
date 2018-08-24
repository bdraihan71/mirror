@extends('layouts.app')

@section('content')
    <section id="dashboard" class="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <nav class="nav flex-column bg-dark nav-height">
                      @if (auth()->user()->role == 'admin')
                        <strong><a class="nav-link text-white" href="/events/create">CREATE EVENTS</a></strong>
                        <strong><a class="nav-link text-white" href="/partners">PARTNERS</a></strong>
                      @endif
                      @if (auth()->user()->role == 'super-admin')
                        <strong><a class="nav-link text-white" href="/events/create">CREATE EVENTS</a></strong>
                        <strong><a class="nav-link text-white" href="/create/admin">CREATE ADMIN</a></strong>
                        <strong><a class="nav-link text-white" href="/partners">PARTNERS</a></strong>
                        <strong><a class="nav-link text-white" href="/analytics/events">EVENTS ANALYTICS</a></strong>
                      @endif
                      @if (auth()->user() == 'normal')
                        <strong><a class="nav-link text-white" href="/tickets">TICKETS</a></strong>
                      @endif
                      <strong><a class="nav-link text-white" href="/events">EVENTS</a></strong>
                      {{-- <strong><a class="nav-link text-white" href="/shop">SHOP</a></strong> --}}
                      <strong><a class="nav-link text-white" href="/logout">LOGOUT</a></strong>
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
                        <input type="text" name="name" class="form-control" value="{{$user->profile->f_name.' '.$user->profile->m_name.' '.$user->profile->l_name}}" required>
                        <br>
                        <button type="submit" class="btn btn-outline-danger">Update</button>
                    </form>
                    
                    <br>
                    <br>
                    <br>
                    
                    <h5 class="text-danger">Email Address</h5>
                    <p class="text-white">{{$user->email}}</p>
                    <form action="/profile/email" method="POST" autocomplete="off">
                        @csrf
                        <input type="text" name="email" class="form-control" value="{{$user->email}}" required>
                        <br>
                        <input type="password" name="password" class="form-control" placeholder="Please enter password to change email address" required>
                        <br>
                        <button type="submit" class="btn btn-outline-danger">Update</button>
                    </form>
                    
                    <br>
                    <br>
                    <br>
                    
                    <h5 class="text-danger">Physical Address</h5>
                    <p class="text-white">{{$user->profile->address}}</p>
                    <form action="/profile/address" method="POST">
                        @csrf
                        <input type="text" name="address" class="form-control" value="{{$user->profile->address}}" required>
                        <br>
                        <button type="submit" class="btn btn-outline-danger">Update</button>
                    </form>

                    <br>
                    <br>
                    <br>
                    
                    <h5 class="text-danger">Phone Number</h5>
                    <p class="text-white">{{$user->profile->phone}}</p>
                    <form action="/profile/phone" method="POST">
                        @csrf
                        <input type="text" name="phone" class="form-control" value="{{$user->profile->phone}}" required>
                        <br>
                        <button type="submit" class="btn btn-outline-danger">Update</button>
                    </form>
                    
                    <br>
                    <br>
                    <br>
                    
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
                    
                    <h4 class="text-danger">Manage Account</h4>
                    <p class="text-white">I would like to <span class="text-danger"><a href="/profile/delete">Delete my account</a></span></p>
                    
                </div>
                
            </div>

        </div>
    </section>
@endsection
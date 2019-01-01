@extends('layouts.app')

@section('content')
    <div class="row" id="top"></div>
    <br><br><br><br>
    <section id="register" class="register black-bg">
        <div class="container">
            <div class="row pt-3">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <table class="table table-striped bg-light text-dark">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Call To Action</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $sl=0;
                        @endphp
                        @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{++$sl}}</th>
                                <td>{{$category->name}}</td>
                                <td>{{$category->type}}</td>
                                <td>{{$category->call_to_action}}</td>
                                <td>
                                    <a href="{{route('categories.edit',$category->id)}}"><button type="button" class="btn btn-primary">Edit</button></a>
                                    {{--<a href = 'delete/{{ $category->id }}'><button type="button" class="btn btn-danger">Delete</button></a>--}}
                                    <form  action="{{route('categories.destroy',$category->id)}}" method="POST" style="display: inline" >
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$categories->links()}}
                </div>
                <div class="col-md-3"></div>
            </div>

        </div>
    </section>
@endsection
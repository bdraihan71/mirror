@extends('layouts.app')

@section('content')
    <div class="row" id="top"></div>
    <br><br><br><br>
    <section id="register" class="register black-bg">
        <div class="container">
            <div class="row pt-3">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <a href='/home' class="btn btn-primary">Dashboard</a>
                    <a href='/subcategories/create' class="btn btn-info">Create</a>
                    <br>
                    <br>
                    <table class="table table-striped bg-light text-dark">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subcategories as $subcategory)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$subcategory->title}}</td>
                                <td>{{$subcategory->category->name}}</td>
                                <td>
                                    <a href="{{route('subcategories.edit',$subcategory->id)}}"><button type="button" class="btn btn-primary">Edit</button></a>
                                    {{--<a href = 'delete/{{ $category->id }}'><button type="button" class="btn btn-danger">Delete</button></a>--}}
                                    {{--<form  action="{{route('subategories.destroy',$subcategory->id)}}" method="POST" style="display: inline" >--}}
                                        {{--@csrf--}}
                                        {{--@method('DELETE')--}}
                                        {{--<button class="btn btn-danger">Delete</button>--}}
                                    {{--</form>--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$subcategories->links()}}
                </div>
                <div class="col-md-3"></div>
            </div>

        </div>
    </section>
@endsection
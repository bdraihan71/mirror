@extends('layouts.app')

@section('content')
    @foreach($categories as $category)
        @if ($loop->index == 0)
            <section id="laser" class="laser text-center">
                <div class="cover-text-overlay">
                    <img class="w-100" src="{{$category->image}}" />
                    <div class="centered text-white display-3 font-weight-bold">{{$category->name}}</div>
                </div>
            </section>
        @else
            <div class="cover-text-overlay">
                <img class="w-100" src="{{$category->image}}" />
                <div class="centered text-white display-3 font-weight-bold">{{$category->name}}</div>
            </div>
        @endif

        <section id="text-card" class="text-card text-center">
            <div class="container-fluid ">
                <div class="row text-white">
                    <div class="col"></div>
                    @foreach ($category->subCategories as $subcat)
                        @if ($loop->index != 0 && $loop->index % 3 == 0)
                            </div>
                            <div class="row text-white">
                                <div class="col"></div>
                        @endif
                        <div class="col-md-3 ">
                            <div class="card border-0 rounded-0 my-3 laser-card ">
                                <div class="py-5"><h3 class="py-5">{{$subcat->title}}</h3></div>
                                <a
                                    href="/requestservice/{{$subcat->id}}"
                                    class="btn btn-danger w-100 py-3 mb-5 rounded-0">
                                    {{$category->call_to_action}}
                                </a>
                            </div>
                        </div>
                        <div class="col"></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endforeach
@endsection
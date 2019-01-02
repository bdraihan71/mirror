@extends('layouts.app')

@section('content')
    @foreach($categories as $category)
        @if ($loop->index == 0)
            <section id="logistics" class="logistics text-center">
                <h1 class="display-4 py-5 text-white">LOGISTICS</h1>
                <div class="cover-text-overlay">
                    <img class="w-100" src="{{$category->image}}" />
                    <div class="centered text-white display-4">{{$category->name}}</div>
                </div>
            </section>
        @else
            <div class="cover-text-overlay">
                <img class="w-100" src="{{$category->image}}" />
                <div class="centered text-white display-4">{{$category->name}}</div>
            </div>
         @endif

        <section id="text-card" class="text-card text-center">
            <div class="container">
                <div class="row text-white">
                    <div class="col"></div>
                    @foreach ($category->subCategories as $subcat)
                        @if ($loop->index != 0 && $loop->index % 3 == 0)
                            </div>
                            <div class="row text-white">
                        @endif
                        <div class="col-md-4">
                            <div class="card border-0 bg-dark my-3 logistics-card">
                                <div class="py-5"><h3>{{$subcat->title}}</h3></div>
                                <a
                                        href="single-event.html"
                                        class="btn btn-danger w-100 py-3 logistics-btn">
                                    {{$category->call_to_action}}</a>
                            </div>
                        </div>
                                <div class="col"></div>
                                @endforeach

                    </div>
                </div>
            </div>
        </section>
    @endforeach;

@endsection
@extends('layouts.app')

@section('content')
<section id="software-showcase">
<div class="container">

    <div class="heading">
        <h2>Software Showcase</h2>
    </div>
  
    <div class="row">
  

      <div class="col-md-2"></div>
      <div class="col-md-8">
        @foreach($softwareProducts as $softwareProduct)
            {{$softwareProduct->name}}
            {{$softwareProduct->brief_description}}
        @endforeach
      </div>
      <div class="col-md-2"></div>
  
    </div>
  </div>
</section>
@endsection

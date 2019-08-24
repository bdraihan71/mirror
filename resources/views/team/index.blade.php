@extends('layouts.app')

@section('content')
<section id="team" class="team-sec">
<div class="container">

    <div class="heading">
        <h2>Meet Our Team</h2>
    </div>
  
    <div class="row team-row">
  

      <div class="col-md-2"></div>

      <div class="col-md-4 col-sm-6 team-wrap">
        <div class="team-member text-center">
          <div class="team-img">
            <img src="/frontend/img/tasnim-2.jpg" alt="">
            <div class="overlay">
              <div class="team-details text-center">
                <p>
                    Tasnim spends most of her time talking to clients, understanding problems and planning solutions. She also tests every features developed by Techynaf team to ensure reliability.
                </p>
                <div class="socials mt-20">
                  <!-- <a href="#"><i class="fab fa-facebook"></i></a>
                  <a href="#"><i class="fab fa-twitter"></i></a>
                  <a href="#"><i class="fab fa-google-plus"></i></a> -->
                  <a href="mailto:tasnim@techynaf.com"><i class="fa fa-envelope"></i></a>
                </div>
              </div>
            </div>
          </div>
          <h5 class="team-title">Tasnim Mortoza</h5>
          <span>CEO</span>
        </div>
      </div>
      <!-- end team member -->
  
      <div class="col-md-4 col-sm-6 team-wrap">
        <div class="team-member text-center">
          <div class="team-img">
            <img src="/frontend/img/prince.jpg" alt="">
            <div class="overlay">
              <div class="team-details text-center">
                <p>
                    Prince spends his time in driving the tech team. He ensures that the team produces clean code on a regular basis and all the applications and data are secured.
                </p>
                <div class="socials mt-20">
                  <!-- <a href="#"><i class="fab fa-facebook"></i></a>
                  <a href="#"><i class="fab fa-twitter"></i></a>
                  <a href="#"><i class="fab fa-google-plus"></i></a> -->
                  <a href="mailto:prince@techynaf.com"><i class="fa fa-envelope"></i></a>
                </div>
              </div>
            </div>
          </div>
          <h5 class="team-title">Gulshan Jubaed Prince</h5>
          <span>CTO</span>
        </div>
      </div>
      <!-- end team member -->

      <div class="col-md-2"></div>
  
    </div>
  </div>
</section>
@endsection

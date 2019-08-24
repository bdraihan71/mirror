@extends('layouts.app')

@section('content')
<section id="software-showcase">
<div class="container">

    <div class="heading">
        <h1 class="display-4 mt-3">Software Products</h1>
    </div>
  
    <h2>Connect</h2>
      <p class="lead">Connect is a highly customizable, reliable and secured information collection platform. Any office can collect information digitally using connect.
      You can use instance of connect for a program by creating an application form and opening it for applicants to submit their applications.</p>
      
    <div class="row">
      <div class="col-md-6">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/mAVS0lr_Yso" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>

      <div class="col-md-6 my-4 my-md-0">
        <section class="pricing py-5">
          <div class="container">
            <div class="row">
              <!-- Free Tier -->
              <div class="col-lg-6">
                <div class="card mb-5 mb-lg-0">
                  <div class="card-body">
                    <h5 class="card-title text-muted text-uppercase text-center">Solo</h5>
                    <h6 class="card-price text-center">$150<span class="period">/month</span></h6>
                    <hr>
                    <ul class="fa-ul">
                      <li><span class="fa-li"><i class="fas fa-check"></i></span>Single User</li>
                  </div>
                </div>
              </div>
              <!-- Plus Tier -->
              <div class="col-lg-6">
                <div class="card mb-5 mb-lg-0">
                  <div class="card-body">
                    <h5 class="card-title text-muted text-uppercase text-center">Team</h5>
                    <h6 class="card-price text-center">$200<span class="period">/month</span></h6>
                    <hr>
                    <ul class="fa-ul">
                      <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Unlimited Users</strong></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  

    <a class="btn btn-lg download-button text-center my-3" target="_blank" href="/frontend/pdf/Connect_Product_Doc.pdf">View Product Details</a>


    <div class="row">
        <div class="col-md-12">
          <img class="img-fluid d-none d-sm-block" src="/frontend/img/2.png">
          <img class="img-fluid d-none d-sm-block" src="/frontend/img/1.png">
          <img class="img-fluid w-100 d-block d-sm-none" src="/frontend/img/mobile.jpg">
        </div>
    </div>
    
    {{-- <div class="row">
      <div class="col-md-6">
      <h1>Application Tracking System (ATS)</h1>
      <p>When testing Laravel applications, you may wish to "mock" certain aspects of your application so they are not actually executed during a given test. For example, when testing a controller that dispatches an event, you may wish to mock the event listeners so they are not actually executed during the test. This allows you to only test the controller's HTTP response without worrying about the execution of the event listeners, since the event listeners can be tested in their own test case.</p>
      
      <h4>Contact us to see the demo</h4>

      </div>

      <div class="col-md-6">
        <section class="pricing py-5">
          <div class="container">
            <div class="row">
              <!-- Free Tier -->
              <div class="col-lg-6">
                <div class="card mb-5 mb-lg-0">
                  <div class="card-body">
                    <h5 class="card-title text-muted text-uppercase text-center">Solo</h5>
                    <h6 class="card-price text-center">$150<span class="period">/month</span></h6>
                    <hr>
                    <ul class="fa-ul">
                      <li><span class="fa-li"><i class="fas fa-check"></i></span>Single User</li>
                      <li><span class="fa-li"><i class="fas fa-check"></i></span>5GB Storage</li>
                      <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Public Projects</li>
                      <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
                      <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Unlimited Private Projects</li>
                      <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Dedicated Phone Support</li>
                      <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Free Subdomain</li>
                      <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Monthly Status Reports</li>
                    </ul>
                    <a href="#" class="btn btn-block btn-primary text-uppercase">Subscribe</a>
                  </div>
                </div>
              </div>
              <!-- Plus Tier -->
              <div class="col-lg-6">
                <div class="card mb-5 mb-lg-0">
                  <div class="card-body">
                    <h5 class="card-title text-muted text-uppercase text-center">Team</h5>
                    <h6 class="card-price text-center">$200<span class="period">/month</span></h6>
                    <hr>
                    <ul class="fa-ul">
                      <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>5 Users</strong></li>
                      <li><span class="fa-li"><i class="fas fa-check"></i></span>50GB Storage</li>
                      <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Public Projects</li>
                      <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
                      <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Private Projects</li>
                      <li><span class="fa-li"><i class="fas fa-check"></i></span>Dedicated Phone Support</li>
                      <li><span class="fa-li"><i class="fas fa-check"></i></span>Free Subdomain</li>
                      <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Monthly Status Reports</li>
                    </ul>
                    <a href="#" class="btn btn-block btn-primary text-uppercase">Subscribe</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-6">
      <h1>Alfred: Money Requisition System</h1>
      <p>When testing Laravel applications, you may wish to "mock" certain aspects of your application so they are not actually executed during a given test. For example, when testing a controller that dispatches an event, you may wish to mock the event listeners so they are not actually executed during the test. This allows you to only test the controller's HTTP response without worrying about the execution of the event listeners, since the event listeners can be tested in their own test case.</p>
      <div class="embed-responsive embed-responsive-16by9">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/YCdao4vWoMo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      </div>

      <div class="col-md-6">
        <section class="pricing py-5">
          <div class="container">
            <div class="row">
              <!-- Free Tier -->
              <div class="col-lg-6">
                <div class="card mb-5 mb-lg-0">
                  <div class="card-body">
                    <h5 class="card-title text-muted text-uppercase text-center">Solo</h5>
                    <h6 class="card-price text-center">$150<span class="period">/month</span></h6>
                    <hr>
                    <ul class="fa-ul">
                      <li><span class="fa-li"><i class="fas fa-check"></i></span>Single User</li>
                      <li><span class="fa-li"><i class="fas fa-check"></i></span>5GB Storage</li>
                      <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Public Projects</li>
                      <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
                      <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Unlimited Private Projects</li>
                      <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Dedicated Phone Support</li>
                      <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Free Subdomain</li>
                      <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Monthly Status Reports</li>
                    </ul>
                    <a href="#" class="btn btn-block btn-primary text-uppercase">Subscribe</a>
                  </div>
                </div>
              </div>
              <!-- Plus Tier -->
              <div class="col-lg-6">
                <div class="card mb-5 mb-lg-0">
                  <div class="card-body">
                    <h5 class="card-title text-muted text-uppercase text-center">Team</h5>
                    <h6 class="card-price text-center">$200<span class="period">/month</span></h6>
                    <hr>
                    <ul class="fa-ul">
                      <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>5 Users</strong></li>
                      <li><span class="fa-li"><i class="fas fa-check"></i></span>50GB Storage</li>
                      <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Public Projects</li>
                      <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
                      <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Private Projects</li>
                      <li><span class="fa-li"><i class="fas fa-check"></i></span>Dedicated Phone Support</li>
                      <li><span class="fa-li"><i class="fas fa-check"></i></span>Free Subdomain</li>
                      <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Monthly Status Reports</li>
                    </ul>
                    <a href="#" class="btn btn-block btn-primary text-uppercase">Subscribe</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-6">
      <h1>Huddle</h1>
      <p>When testing Laravel applications, you may wish to "mock" certain aspects of your application so they are not actually executed during a given test. For example, when testing a controller that dispatches an event, you may wish to mock the event listeners so they are not actually executed during the test. This allows you to only test the controller's HTTP response without worrying about the execution of the event listeners, since the event listeners can be tested in their own test case.</p>
      <div class="embed-responsive embed-responsive-16by9">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/YCdao4vWoMo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      </div>

      <div class="col-md-6">
        <section class="pricing py-5">
          <div class="container">
            <div class="row">
              <!-- Free Tier -->
              <div class="col-lg-6">
                <div class="card mb-5 mb-lg-0">
                  <div class="card-body">
                    <h5 class="card-title text-muted text-uppercase text-center">Solo</h5>
                    <h6 class="card-price text-center">$150<span class="period">/month</span></h6>
                    <hr>
                    <ul class="fa-ul">
                      <li><span class="fa-li"><i class="fas fa-check"></i></span>Single User</li>
                      <li><span class="fa-li"><i class="fas fa-check"></i></span>5GB Storage</li>
                      <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Public Projects</li>
                      <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
                      <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Unlimited Private Projects</li>
                      <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Dedicated Phone Support</li>
                      <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Free Subdomain</li>
                      <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Monthly Status Reports</li>
                    </ul>
                    <a href="#" class="btn btn-block btn-primary text-uppercase">Subscribe</a>
                  </div>
                </div>
              </div>
              <!-- Plus Tier -->
              <div class="col-lg-6">
                <div class="card mb-5 mb-lg-0">
                  <div class="card-body">
                    <h5 class="card-title text-muted text-uppercase text-center">Team</h5>
                    <h6 class="card-price text-center">$200<span class="period">/month</span></h6>
                    <hr>
                    <ul class="fa-ul">
                      <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>5 Users</strong></li>
                      <li><span class="fa-li"><i class="fas fa-check"></i></span>50GB Storage</li>
                      <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Public Projects</li>
                      <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
                      <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Private Projects</li>
                      <li><span class="fa-li"><i class="fas fa-check"></i></span>Dedicated Phone Support</li>
                      <li><span class="fa-li"><i class="fas fa-check"></i></span>Free Subdomain</li>
                      <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Monthly Status Reports</li>
                    </ul>
                    <a href="#" class="btn btn-block btn-primary text-uppercase">Subscribe</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div> --}}
  </div>
</section>
@endsection

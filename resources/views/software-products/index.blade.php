@extends('layouts.app')

@section('content')
<section id="software-showcase">
<div class="container">

    <div class="heading">
        <h1 class="display-4 mt-3">Software Products</h1>
    </div>

    <ul class="nav nav-pills justify-content-center mb-3" id="pills-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Connect</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">ATS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pills-exhibit-tab" data-toggle="pill" href="#pills-exhibit" role="tab" aria-controls="pills-exhibit" aria-selected="false">Exhibit</a>
      </li>
    </ul>

    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
          <div class="row">
            <div class="col-md-9 my-auto">
                <h2>Connect (Application Collection Software)</h2>
            </div>
            <div class="col-md-3 text-md-right">
                <a class="btn btn-lg btn-primary text-center my-3" target="_blank" href="/frontend/pdf/Connect_Product_Doc.pdf">View Product Details</a>
            </div>
          </div>
      <p class="lead text-justify">Connect is a highly customizable, reliable and secured information collection platform. Any office can collect information digitally using connect.
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
                      <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Single User</strong></li>
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


    <div class="row mt-3">
        <div class="col-md-12">
          <img class="img-fluid d-none d-sm-block w-100" src="/frontend/img/connect-1.png">
          <img class="img-fluid d-none d-sm-block w-100" src="/frontend/img/connect-2.png">
          <img class="img-fluid w-100 d-block d-sm-none w-100" src="/frontend/img/connect-mobile.jpg">
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
      <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <div class="row">
          <div class="col-md-9 my-auto">
            <h2>ATS (Application Tracking Software)</h2>
          </div>
          <div class="col-md-3 text-right">
            <a class="btn btn-lg btn-primary text-center my-3" target="_blank" href="/frontend/pdf/ATS-Product-Documentation.pdf">View Product Details</a>
          </div>
        </div>
        <p class="lead text-justify">Application Tracking Software is a highly customizable, reliable and secured
        information tracking platform. Any office can track information digitally using ATS.
        You can use instance of ATS for a program by storing the data and tracking any or
        all the information and different analytics.</p>
      
    <div class="row">
      <div class="col-md-6 align-self-center">
        <div class="text-center">
          <p class="text-monospace my-auto align-middle font-weight-bold">** Product video will be available upon request.</p>
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
                    <h6 class="card-price text-center">$350<span class="period">/month</span></h6>
                    <hr>
                    <ul class="fa-ul">
                      <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Single User</strong></li>
                  </div>
                </div>
              </div>
              <!-- Plus Tier -->
              <div class="col-lg-6">
                <div class="card mb-5 mb-lg-0">
                  <div class="card-body">
                    <h5 class="card-title text-muted text-uppercase text-center">Team</h5>
                    <h6 class="card-price text-center">$500<span class="period">/month</span></h6>
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


    <div class="row mt-3">
        <div class="col-md-12">
          <img class="img-fluid d-none d-sm-block w-100" src="/frontend/img/ats-2.png">
          <img class="img-fluid d-none d-sm-block w-100" src="/frontend/img/ats-1.png">
          <img class="img-fluid w-100 d-block d-sm-none w-100" src="/frontend/img/ats-mobile.jpg">
        </div>
    </div>
      </div>



      <div class="tab-pane fade" id="pills-exhibit" role="tabpanel" aria-labelledby="pills-exhibit-tab">
        <div class="row">
          <div class="col-md-9 my-auto">
            <h2>Exhibit (Individual Portfolio)</h2>
          </div>
          <div class="col-md-3 text-right">
            <a class="btn btn-lg btn-primary text-center my-3" target="_blank" href="/frontend/img/exhibit-3.jpg">View Product Details</a>
          </div>
        </div>
        <p class="lead text-justify">Exhibit is a highly customizable, reliable and secured Personal information Showcasing a.k.a individual portfolio . Any one can showcase their projects, experiences, education, contact information. You don’t have to rely on other social media platforms with your data. Create your own.</p>
      
    <div class="row">
      <div class="col-md-6 align-self-center">
        <div class="text-center">
          <p class="text-monospace my-auto align-middle font-weight-bold">** Product video will be available upon request.</p>
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
                    <h6 class="card-price text-center">$30<span class="period">/month</span></h6>
                    <hr>
                    <ul class="fa-ul">
                      <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Single User</strong></li>
                  </div>
                </div>
              </div>
              <!-- Plus Tier -->
              <div class="col-lg-6">
                <div class="card mb-5 mb-lg-0">
                  <div class="card-body">
                    <h5 class="card-title text-muted text-uppercase text-center">Team</h5>
                    <h6 class="card-price text-center">$150<span class="period">/month</span></h6>
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


    <div class="row mt-3">
        <div class="col-md-12">
          <img class="img-fluid d-none d-sm-block w-100" src="/frontend/img/exhibit-3.jpg">
          <img class="img-fluid w-100 d-block d-sm-none w-100" src="/frontend/img/exhibit-mobile.jpg">
        </div>
    </div>
      </div>




    </div>
  </div>
</section>
@endsection

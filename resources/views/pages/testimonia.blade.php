@extends('layouts.master_home',['title' => 'testimonial'])

@section('home_content')

 <!-- ======= Breadcrumbs ======= -->
 <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Testimonials</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Testimonials</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container">

        <div class="row">

          @foreach($testimonials as $testimonial)
            <div class="col-lg-6" data-aos="fade-up">
              <div class="testimonial-item">
                <img src="{{$testimonial->user_profile}}" class="testimonial-img" alt="">
                <h3>{{$testimonial->user_name}}</h3>
                <h4>{{$testimonial->user_title}}</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  {{$testimonial->user_comment}}
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>
          @endforeach


        </div>

      </div>
    </section><!-- End Testimonials Section -->
@endsection
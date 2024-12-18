@extends('layout.master')

@section('title', 'Home')

@section('content')
<div class="container-fluid px-0">
        <div class="row">
          <div class="col">
            <h1>Small Effort</h1>
            <h1>Make a Big Change</h1>
            <h2>We are ready to provide better service to make world happy</h2>
            <div class="mt-4">
                <a href="{{ route('donate') }}" class="btn btn-primary btn-lg">Donate Now</a>
            </div>
          </div>
          <div class="col">
            <img src="assets/img/imageHome.png" alt="">
          </div>
        </div>

        <div class="fitur">
            <div class="content">
              <div class="card">
                <img class="icon" src="assets/img/imageDonation.png" alt="Icon 1" />
                <h2 class="card-title">Donate</h2>
                <p class="card-description">
                This platform provides an opportunity for you to make a difference by donating to those in need. Donations can take many forms, including food, essential supplies, or financial contributions to support our programs.
                Your generosity helps fight hunger and provides relief to underserved communities. Whether it's a warm meal or surplus food that can still nourish, every donation counts. Together, we can build a more caring and sustainable society.
                Ready to give?
                </p>
                <a href="{{ route('donate') }}">Explore how you can contribute and be part of the change!</a>
              </div>
              <div class="card">
                <img class="icon" src="assets/img/imageRentForSharing.png" alt="Icon 2">
                <h2 class="card-title">Rent for Sharing</h2>
                <p class="card-description">
                This platform allows you to make a difference by renting our services to share food with those in need. Simply place your order, and we’ll handle the distribution for you. 
                Your contribution enables us to deliver meals and essentials to underserved communities. By letting us manage the process, you save time while still making a meaningful impact. Together, we can spread care and kindness effortlessly.
                Ready to share?
                </p>
                <a href="{{ route('share') }}">Discover how you can support others through our seamless service!</a>
              </div>
            </div>
            <div class="header">
                <h1 class="title">You Can Help <br />The Other</h1>
                <p class="subtitle">What We Offer: Tools to Help You Help Others</p>
              </div>
        </div>
        
        <div class="about-us-home">
            <div class="background"></div>
            <div class="about-us-content">
              <img class="image" src="assets/img/imageAboutUs.png" alt="Food For All Image" />
              <div class="text-content">
                <h2 class="welcome-text">
                  Welcome To <span class="highlight">Food For All</span> Charity
                </h2>
                <p class="description">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sit amet arcu a dolor malesuada laoreet sit amet eu tortor. Fusce efficitur aliquam neque, at commodo turpis pretium sit amet. Aenean vehicula eros lacinia nibh pulvinar, nec vulputate mi ullamcorper.
                </p>
                <div class="cta">
                  <div class="button">
                    <span><a href="{{ route('about') }}">More About Us </a></span>
                  </div>
                </div>
              </div>
            </div>
        </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
@endpush
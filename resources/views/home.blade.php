@extends('layout.master')

@section('title', 'Home')

@section('content')
<div class="container-fluid px-0">
        <div class="row">
          <div class="col">
            <h1>{{ __('home.small_effort') }}</h1>
            <h1>{{ __('home.big_change') }}</h1>
            <h2>{{ __('home.ready_service') }}</h2>
            <div class="mt-4">
                <a href="{{ route('donate') }}" class="btn btn-primary btn-lg">{{ __('home.donate_now') }}</a>
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
                <h2 class="card-title">{{ __('home.donate_title') }}</h2>
                <p class="card-description">
                {{ __('home.donate_description') }}
                </p>
                <a href="{{ route('donate') }}">{{ __('home.explore_donate') }}</a>
              </div>
              <div class="card">
                <img class="icon" src="assets/img/imageRentForSharing.png" alt="Icon 2">
                <h2 class="card-title">{{ __('home.rent_for_sharing_title') }}</h2>
                <p class="card-description">
                {{ __('home.rent_for_sharing_description') }}
                </p>
                <a href="{{ route('share') }}">{{ __('home.explore_rent_for_sharing') }}</a>
              </div>
            </div>
            <div class="header">
                <h1 class="title">{{ __('home.help_other_title') }}<br />{{ __('home.other') }}</h1>
                <p class="subtitle">{{ __('home.what_we_offer') }}</p>
              </div>
        </div>
        
        <div class="about-us-home">
            <div class="background"></div>
            <div class="about-us-content">
              <img class="image" src="assets/img/imageAboutUs.png" alt="Food For All Image" />
              <div class="text-content">
                <h2 class="welcome-text">
                {{ __('home.welcome_text') }} <span class="highlight">{{ __('home.judul') }}</span> {{ __('home.charity') }}
                </h2>
                <p class="description">
                {{ __('home.description_text') }}
                </p>
                <div class="cta">
                  <div class="button">
                    <span><a href="{{ route('about') }}">{{ __('home.more_about_us') }}</a></span>
                  </div>
                </div>
              </div>
            </div>
        </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{secure_asset('assets/css/home.css') }}">
@endpush
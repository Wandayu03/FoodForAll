@extends('layout.master')

@section('title', 'About')

@section('content')
<div class="page">
    <div class="about-one">
        <img src="{{asset('assets/img/about1.jpg') }}">
        <div class="about-content d-flex flex-column bd-highlight">
            <h3>{{ __('about.about_us') }}</h3>
            <p>{{ __('about.about_description') }}</p>
        </div>
    </div>
    <div class="stats d-flex flex-column flex-md-row bd-highlight justify-content-evenly">
        <div class="stats-content d-flex flex-column bd-highlight align-items-center">
            <img src="{{asset('assets/img/about-user.png') }}">
            <h4>1.000+</h4>
            <p>{{ __('about.active_users') }}</p>
        </div>
        <div class="stats-content d-flex flex-column bd-highlight align-items-center">
            <img src="{{asset('assets/img/about-donation.png') }}">
            <h4>3.000+</h4>
            <p>{{ __('about.donation_gathered') }}</p>
        </div>
        <div class="stats-content d-flex flex-column bd-highlight align-items-center">
            <img src="{{asset('assets/img/about-food.png') }}">
            <h4>7.000+</h4>
            <p>{{ __('about.food_shared') }}</p>
        </div>
    </div>
    <div class="about-two">
        <div class="about-extended d-flex flex-column flex-md-row bd-highlight align-items-center">
            <img src="{{asset('assets/img/about2.jpg') }}">
            <div class="about-extended-one d-flex flex-column bd-highlight">
                <h3>{{ __('about.our_vision') }}</h3>
                <p>{{ __('about.vision_description') }}</p>
            </div>
        </div>
        <div class="about-extended d-flex flex-column flex-md-row bd-highlight align-items-center">
            <div class="about-extended-two d-flex flex-column bd-highlight">
                <h3>{{ __('about.our_mission') }}</h3>
                <p>{{ __('about.mission_description') }}</p>
            </div>
            <img src="{{asset('assets/img/about3.jpg') }}">
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{secure_asset('assets/css/about.css') }}">
@endpush

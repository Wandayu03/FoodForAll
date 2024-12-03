@extends('layout.master')

@section('title', 'About')

@section('content')
<div class="page">
    <div class="about-one">
        <img src="{{asset('assets/img/about1.jpg') }}">
        <div class="about-content d-flex flex-column bd-highlight">
            <h3>About Us</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sit amet arcu a dolor malesuada laoreet sit amet eu tortor. Fusce efficitur aliquam neque, at commodo turpis pretium sit amet. Aenean vehicula eros lacinia nibh pulvinar, nec vulputate mi ullamcorper. Nullam sed sodales tellus, quis feugiat ante. Nullam convallis turpis quis iaculis rutrum.</p>
        </div>
    </div>
    <div class="stats d-flex flex-column flex-md-row bd-highlight justify-content-evenly">
        <div class="stats-content d-flex flex-column bd-highlight align-items-center">
            <img src="{{asset('assets/img/about-user.png') }}">
            <h4>1.000+</h4>
            <p>Active users</p>
        </div>
        <div class="stats-content d-flex flex-column bd-highlight align-items-center">
            <img src="{{asset('assets/img/about-donation.png') }}">
            <h4>3.000+</h4>
            <p>Donation gathered</p>
        </div>
        <div class="stats-content d-flex flex-column bd-highlight align-items-center">
            <img src="{{asset('assets/img/about-food.png') }}">
            <h4>7.000+</h4>
            <p>Food shared</p>
        </div>
    </div>
    <div class="about-two">
        <div class="about-extended d-flex flex-column flex-md-row bd-highlight align-items-center">
            <img src="{{asset('assets/img/about2.jpg') }}">
            <div class="about-extended-one d-flex flex-column bd-highlight">
                <h3>Our Vision</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sit amet arcu a dolor malesuada laoreet sit amet eu tortor. Fusce efficitur aliquam neque, at commodo turpis pretium sit amet. Aenean vehicula eros lacinia nibh pulvinar, nec vulputate mi ullamcorper. Nullam sed sodales tellus, quis feugiat ante. Nullam convallis turpis quis iaculis rutrum.</p>
            </div>
        </div>
        <div class="about-extended d-flex flex-column flex-md-row bd-highlight align-items-center">
            <div class="about-extended-two d-flex flex-column bd-highlight">
                <h3>Our Mission</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sit amet arcu a dolor malesuada laoreet sit amet eu tortor. Fusce efficitur aliquam neque, at commodo turpis pretium sit amet. Aenean vehicula eros lacinia nibh pulvinar, nec vulputate mi ullamcorper. Nullam sed sodales tellus, quis feugiat ante. Nullam convallis turpis quis iaculis rutrum.</p>
            </div>
            <img src="{{asset('assets/img/about3.jpg') }}">
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">
@endpush

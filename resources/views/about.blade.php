@extends('layout.master')
<link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">
@section('title', 'About')

@section('content')
<div class="page">
    <div class="about">
        <img src="{{asset('assets/img/about1.jpg') }}">
        <div>
            <h3>About Us</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sit amet arcu a dolor malesuada laoreet sit amet eu tortor. Fusce efficitur aliquam neque, at commodo turpis pretium sit amet. Aenean vehicula eros lacinia nibh pulvinar, nec vulputate mi ullamcorper. Nullam sed sodales tellus, quis feugiat ante. Nullam convallis turpis quis iaculis rutrum.</p>
        </div>
    </div>
    <div>
        <div>
            <img src="{{asset('assets/img/about-user.png') }}">
            <p>1.000+</p>
            <p>Active users</p>
        </div>
        <div>
            <img src="{{asset('assets/img/about-donation.png') }}">
            <p>3.000+</p>
            <p>Donation gathered</p>
        </div>
        <div>
            <img src="{{asset('assets/img/about-food.png') }}">
            <p>7.000+</p>
            <p>Food shared</p>
        </div>
    </div>
    <div>
        <div>
            <img src="{{asset('assets/img/about2.jpg') }}">
            <div>
                <h3>Our Vision</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sit amet arcu a dolor malesuada laoreet sit amet eu tortor. Fusce efficitur aliquam neque, at commodo turpis pretium sit amet. Aenean vehicula eros lacinia nibh pulvinar, nec vulputate mi ullamcorper. Nullam sed sodales tellus, quis feugiat ante. Nullam convallis turpis quis iaculis rutrum.</p>
            </div>
        </div>
        <div>
            <div>
                <h3>Our Mission</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sit amet arcu a dolor malesuada laoreet sit amet eu tortor. Fusce efficitur aliquam neque, at commodo turpis pretium sit amet. Aenean vehicula eros lacinia nibh pulvinar, nec vulputate mi ullamcorper. Nullam sed sodales tellus, quis feugiat ante. Nullam convallis turpis quis iaculis rutrum.</p>
            </div>
            <img src="{{asset('assets/img/about3.jpg') }}">
        </div>
    </div>
</div>
@endsection



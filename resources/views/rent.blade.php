@extends('layout.master')

@section('title', 'Rent For Sharing')

@section('content')
<div>
    <div class="hero" style="background-image: url('{{ asset('assets/img/Hero-RentPage.png') }}')">
        <div class="color"></div>
        <p>Every Contribution <span>Makes a Difference.</span></p>
    </div>
    <div class="banner">
        <p>Donate your funds, and we'll connect with the best food vendors to distribute meals to those in need.</p>
    </div>
    <div class="order-detail">
        <p class="order-detail-title">Order Details</p>
        <div class="order-detail-all">
            <div class="order-detail-left">
                <div class="detail">
                    <div class="program-name">
                        <p>Program Name</p>
                        <input type="text" placeholder="Example: 'Free Iftar' or 'Help the Orphanage'">
                    </div>
                    <div class="type-of-food">
                        <p>Type of Food</p>
                        <input type="text" placeholder="Example: boxed rice, snacks">
                    </div>
                    <div class="number-of-servings">
                        <p>Number of Servings You Expect</p>
                        <input type="text" placeholder="Example: 100">
                    </div>
                </div>
            </div>
            <div class="vertical-divider"></div>
            <div class="order-detail-right">
                <div class="budget-donation">
                    <p>Budget/Donation</p>
                    <input type="text" placeholder="Example: 350.000">
                </div>
                <div class="distribution-date">
                    <p>Distribution Date</p>
                    <input type="date">
                </div>
                <div class="distribution-location">
                    <p>Distribution Location</p>
                    <input type="text" placeholder="Example: orphanages or street workers like scavengers">
                </div>
            </div>
        </div>
        <div class="continue-process-wrapper">
            <div class="continue-process">
                <a href="">Continue Process</a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/rent.css') }}">
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
@endpush
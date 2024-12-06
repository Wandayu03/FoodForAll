@extends('layout.master')

@section('title', 'More1')

@section('content')
<main class="content">
    <div class="containers">
        <div class="headers">
            <h2>Lorem ipsum odor amet</h2>
            <p>Order ID: #12345</p>
        </div>
        <div class="timeline">
            <div class="step completed">
                <div class="circle"></div>
                <p>14 Des 13:00<br>Donations accepted</p>
            </div>
            <div class="line"></div>
            <div class="step completed">
                <div class="circle"></div>
                <p>15 Des 11:00<br>Order in process</p>
            </div>
            <div class="line"></div>
            <div class="step active">
                <div class="circle"></div>
                <p>15 Des 17:00<br>Food is ready</p>
                <a href="#">Proof of activity>></a>
            </div>
            <div class="line"></div>
            <div class="step">
                <div class="circle"></div>
                <p>15 Des 18:00<br>Food has been distributed</p>
            </div>
            <div class="line"></div>
            <div class="step">
                <div class="circle"></div>
                <p>15 Des 18:30<br>Process completed</p>
                <a href="#">Proof of activity>></a>
            </div>
        </div>
        <div class="order-info">
            <div class="info-row">
                <i class="fa-solid fa-calendar me-2"></i>
                <p>Date: Dec 6, 2024</p>
                <p class="right">Number of serving: 100</p>
            </div>
            <div class="info-row">
                <i class="fa-solid fa-location-dot me-2"></i>
                <p>Lorem ipsum odor amett</p>
                <p class="right">Payment status: Lorem ipsum</p>
            </div>
            <div class="info-row">
                <p>Donation: Rp xxx.xxx,-</p>
                <p class="right">Type of food : Lorem ipsum</p>
            </div>
        </div>
    </div>
</main>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/more1.css') }}">
@endpush
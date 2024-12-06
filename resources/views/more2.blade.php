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
            <div class="line"></div>
            <div class="step">
                <div class="circle"></div>
                <p>114 Des 13:00<br>Donations accepted</p>
                <a href="#">Proof of activity>></a>
            </div>
        </div>
        <div class="order-info">
            <div class="info-row">
                <p>Donation: Rp xxx.xxx,-</p>
                <p class="right">Payment status: Lorem ipsum</p>
            </div>
            <div class="info-row">
                <i class="fa-solid fa-calendar me-2"></i>
                <p>xx : xx</p>
                <p class="right">Payment: Lorem ipsum</p>
            </div>
            
        </div>
    </div>
</main>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/more2.css') }}">
@endpush
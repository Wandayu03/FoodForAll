@extends('layout.master')

@section('title', 'Donate')

@section('content')
<div>
    <div class="hero">
        <p>DONATE NOW</p>
    </div>
    <div class="all-wrapper">
        <div class="choose-price">
            <p class="choose-price-title">Choose an Amount</p>
            <div class="choose-price-radio">
                <input type="radio" id="amount-30k" name="amount" value="Rp 30.000">
                <label for="amount-30k" class="custom-label">Rp 30.000</label>

                <input type="radio" id="amount-50k" name="amount" value="Rp 50.000">
                <label for="amount-50k" class="custom-label">Rp 50.000</label>

                <input type="radio" id="amount-80k" name="amount" value="Rp 80.000">
                <label for="amount-80k" class="custom-label">Rp 80.000</label>

                <input type="radio" id="amount-100k" name="amount" value="Rp 100.000">
                <label for="amount-100k" class="custom-label">Rp 100.000</label>
            </div>
        </div>
        <div class="enter-price">
            <p class="header-text">Enter Your Own</p>
            <div class="enter-price-detail">
                <label for="custom-amount">Rp</label>
                <input type="text" id="custom-amount" name="customAmount" placeholder="350000">
            </div>
            <p class="notes">Minimum donation of Rp 10.000</p>
        </div>
        <div class="continue-payment-wrapper">
            <div class="continue-payment">
                <a href="">Continue Payment</a> 
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/donate.css') }}">
@endpush
@extends('layout.master')

@section('title', 'Payment Detail')

@section('content')
<div class="payment-detail">  
    <h1>Payment Form</h1>
    <p>You will make a payment</p>
    <p>at a price of</p>
    <p class="price">Rp350.000</p>
    <button id="payButton">Pay Now</button>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/paymentdetail.css') }}">
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
@endpush
@extends('layout.master')

@section('title', 'More1')

@section('content')
<main>
    <div class="containers">
        <div class="order-id">
            <h2>Order ID: #12345</h2>
        </div>
        <div class="proof-image">
            <img src="{{ asset('assets/img/share-meal.jpg') }}" alt="Proof of Order">
        </div>
        <div class="thank-you-message">
            <p>We deeply appreciate your generosity; your donation is truly impactful!</p>
        </div>
    </div>
</main>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/proof.css') }}">
@endpush
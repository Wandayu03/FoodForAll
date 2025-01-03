@extends('layout.master')

@section('title', 'Donate')

@section('content')
<main class="main-container">
    <div class="success-container">
        <h1>YOUR PAYMENT SUCCESS</h1>
        <i class="fa-solid fa-circle-check"></i>
        <p>Thank you for your donation!</p>
        <a href="#" class="btn">SEE YOUR TRANSACTION</a>
    </div>
</main>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/confpayment.css') }}">
@endpush
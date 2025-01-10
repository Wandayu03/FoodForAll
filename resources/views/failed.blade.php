HTML FAILED

@extends('layout.master')

@section('title', 'Donate')

@section('content')
<main class="main-container">
    <div class="success-container">
        <h1>YOUR PAYMENT FAILED</h1>
        <i class="fa-solid fa-circle-check"></i>
        <p>Try again!</p>
        <a href="#" class="btn">SEE YOUR TRANSACTION</a>
    </div>
</main>
@endsection

@push('styles')
<link rel="stylesheet" href="{{secure_asset('assets/css/confpaymentfailed.css') }}">
@endpush
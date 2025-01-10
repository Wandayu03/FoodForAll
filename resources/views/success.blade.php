@extends('layout.master')

@section('title', __('success.title'))

@section('content')
<main class="main-container">
    <div class="success-container">
        <h1>{{ __('success.payment_success') }}</h1>
        <i class="fa-solid fa-circle-check"></i>
        <p>{{ __('success.transaction_id') }}: {{ $payment->transaction_id }}</p>
        <p>{{ __('success.amount') }}: Rp{{ number_format($payment->amount, 0, ',', '.') }}</p>
        <p>{{ __('success.thank_you') }}</p>
        <a href="{{ route('history', ['type' => 'all']) }}"class="btn">{{ __('success.see_transaction') }}</a>
    </div>
</main>
@endsection

@push('styles')
<link rel="stylesheet" href="{{secure_asset('assets/css/confpayment.css') }}">
@endpush
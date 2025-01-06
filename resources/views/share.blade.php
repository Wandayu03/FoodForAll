@extends('layout.master')

@section('title', 'Rent For Sharing')

@section('content')
<div>
    <div class="hero" style="background-image: url('{{ asset('assets/img/Hero-RentPage.png') }}')">
        <div class="color"></div>
        <p>{{ __('share.every_contribution') }}<span>{{ __('share.make_difference') }}</span></p>
    </div>
    <div class="banner">
        <p>{{ __('share.banner') }}</p>
    </div>
    <div class="order-detail">
        <p class="order-detail-title">Order Details</p>
        <form action="{{ route('share.create') }}" method="POST">
            @csrf
            <div class="order-detail-all">
                <div class="order-detail-left">
                    <div class="detail">
                        <div class="program-name">
                            <p>{{ __('share.program_name') }}</p>
                            <input type="text" placeholder="Example: 'Free Iftar' or 'Help the Orphanage'" name="event_name" required>
                        </div>
                        <div class="type-of-food">
                            <p>{{ __('share.food_type') }}</p>
                            <input type="text" placeholder="Example: boxed rice, snacks" name="food_type" required>
                        </div>
                        <div class="number-of-servings">
                            <p>{{ __('share.number_of_servings') }}</p>
                            <input type="number" placeholder="Example: 100" name="estimated_people" required>
                        </div>
                    </div>
                </div>
                <div class="vertical-divider"></div>
                <div class="order-detail-right">
                    <div class="budget-donation">
                        <p>{{ __('share.budget_donation') }}</p>
                        <input type="number" placeholder="Example: 350.000" name="budget" required>
                    </div>
                    <div class="distribution-date">
                        <p>{{ __('share.distribution_date') }}</p>
                        <input type="date" name="distribution_date" required>
                    </div>
                    <div class="distribution-location">
                        <p>{{ __('share.distribution_location') }}/p>
                        <input type="text" placeholder="Example: orphanages or street workers like scavengers" name="distribution_address" required>
                    </div>
                </div>
            </div>
            <div class="continue-process-wrapper">
                <div class="continue-process">
                    <input type="submit" class="submit" value="{{ __('share.continue_process') }}">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/share.css') }}">
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
@endpush
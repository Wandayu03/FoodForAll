@extends('layout.master')

@section('title', __('tracking.title'))

@section('content')
<main class="content">
    <div class="containers">
        <div class="headers">
            <h2>{{$share->event_name}}</h2>
            {{-- kalo payment udh kelar pake yg bawah --}}
        </div>
        <div class="timeline">
            <div class="step">
                <div class="circle"></div>
                <p><b>{{ __('tracking.step1') }}</b></p>
            </div>
            @foreach ($trackings as $tracking)
            <div class="line"></div>
                <div class="step-loop">
                    <div class="circle"></div>
                    <p>{{$tracking->created_at}}<br><b>{{$tracking->status}}</b></p>
                    @if ($tracking->description != NULL)
                        <p class="loop-desc">{{$tracking->description}}</p>
                    @endif
                    @if ($tracking->photo_url != NULL)
                        <img src="{{$tracking->photo_url}}">
                    @endif
            </div>
            @endforeach
        <div class="order-info">
            <div class="info-row">
                <i class="fa-solid fa-calendar me-2"></i>
                <p>{{ __('tracking.date_label') }}: {{$share->distribution_date}}</p>
                <p class="right">{{ __('tracking.serving_count') }}: {{$share->estimated_people}}</p>
            </div>
            <div class="info-row">
                <i class="fa-solid fa-location-dot me-2"></i>
                <p>{{$share->distribution_address}}</p>
                <p class="right">{{ __('tracking.payment_status_label') }}: {{$share->status}}</p>
            </div>
            <div class="info-row">
                <p>{{ __('tracking.donation_label') }}: Rp {{$share->budget}},-</p>
                <p class="right">{{ __('tracking.food_type_label') }}: {{$share->food_type}}</p>
            </div>
        </div>
    </div>
</main>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/tracking.css') }}">
@endpush
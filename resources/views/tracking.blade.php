@extends('layout.master')

@section('title', 'More1')

@section('content')
<main class="content">
    <div class="containers">
        <div class="headers">
            <h2>{{$share->event_name}}</h2>
            {{-- kalo payment udh kelar pake yg bawah --}}
            {{-- <p>Order ID: #{{$share->payment->id}}</p> --}}
            <p>Order ID: #{{$share->id}}</p>
        </div>
        <div class="timeline">
            <div class="step">
                <div class="circle"></div>
                <p><b>{{$trackings[0]->status}}</b></p>
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
                <p>Date: {{$share->distribution_date}}</p>
                <p class="right">Number of serving: {{$share->estimated_people}}</p>
            </div>
            <div class="info-row">
                <i class="fa-solid fa-location-dot me-2"></i>
                <p>{{$share->distribution_address}}</p>
                <p class="right">Payment status: {{$share->status}}</p>
            </div>
            <div class="info-row">
                <p>Donation: Rp {{$share->budget}},-</p>
                <p class="right">Type of food : {{$share->food_type}}</p>
            </div>
        </div>
    </div>
</main>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/tracking.css') }}">
@endpush
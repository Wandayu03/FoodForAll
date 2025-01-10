@extends('layout.master')
@section('title', __('tracking.title'))

@section('content')
<main class="content">
    <div class="containers">
        <div class="headers">
            <h2>{{$share->event_name}}</h2>
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
        </div>
        <div class="order-info">
            <div class="info-row">
                <i class="fa-solid fa-calendar me-2"></i>
                <p>{{ __('tracking.date_label') }}: {{$share->distribution_date}}</p>
                <p class="right">{{ __('tracking.serving_count') }}: {{$share->estimated_people}}</p>
            </div>
            <div class="info-row">
                <i class="fa-solid fa-location-dot me-2"></i>
                <p>{{$share->distribution_address}}</p>
                <p class="right">{{ __('tracking.payment_status_label') }}: {{$share->payment->status}}</p>
            </div>
            <div class="info-row">
                <p>{{ __('tracking.donation_label') }}: Rp {{$share->budget}},-</p>
                <p class="right">{{ __('tracking.food_type_label') }}: {{$share->food_type}}</p>
            </div>
        </div>
    </div>
    @if (Auth::check() && Auth::user()->is_admin==1)
    <div class="tracking-manager">
        <div class="headers">
            <h2>Tracking Manager</h2>
        </div>
        <form method="POST" action="{{ secure_url('trackingcreate', ['id'=>$share->id]) }}" enctype="multipart/form-data" id="updateForm">
            @csrf
            <label for="status">Update Status</label>
            <select name="status" id="status" required>
                <option value="Order in process">Order in process</option>
                <option value="Food is ready">Food is ready</option>
                <option value="Food has been distributed">Food has been distributed</option>
                <option value="Process is completed">Process is completed</option>
            </select>
            <label for="description">Add Description</label>
            <textarea id="description" name="description"></textarea>
            <label for="photo">Add Photo</label>
            <input class="custom-file-input" type="file" id="photo" name="photo" accept="image/*">
            
            <div class="button-container">
                <button type="submit" id="updateButton">Update</button>
                <div id="loadingIndicator" style="display: none; margin-left: 10px;">
                    <div class="spinner"></div>
                </div>
            </div>
        </form>
    </div>
    @endif
</main>
@endsection

@push('styles')
<link rel="stylesheet" href="{{secure_asset('assets/css/tracking.css') }}">
@endpush
@push('scripts')
<script>
    document.getElementById('updateForm').addEventListener('submit', function (event) {
        const button = document.getElementById('updateButton');
        const loadingIndicator = document.getElementById('loadingIndicator');
        button.disabled = true;
        loadingIndicator.style.display = 'block';
    });
</script>
@endpush

@extends('layout.master')

@section('title', 'History')

@section('content')
<div class="min-heigt">
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>History</h1>
            <div>
                <label for="filter" class="form-label me-2">Filter:</label>
                <select id="filter" class="form-select d-inline-block w-auto">
                    <option value="all">---</option>
                    <option value="all">All</option>
                    <option value="donation">Donation</option>
                    <option value="share">Share a Meal</option>
                </select>
            </div>
        </div>

        @foreach ($histories as $history)
        @if ($history->activity_type == 'donation')
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <img src="https://via.placeholder.com/40" alt="Profile Icon" class="rounded-circle me-3" style="width: 40px; height: 40px;">
                    <strong>{{$history->user->name}}</strong>
                </div>

                <h5 class="card-title mb-4 my-4">You made a donation of Rp. {{$history->donations->amount}}</h5>

                <div class="d-flex justify-content-between align-items-center">
            
                    <div>
                        <span>Status :</span>
                        @if ($history->donations->status == "completed")    
                            <span class="status-box status-active">{{$history->donations->status}}</span>
                        @else
                        <span class="status-box status-active" style="background-color: gray">{{$history->donations->status}}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <img src="https://via.placeholder.com/40" alt="Profile Icon" class="rounded-circle me-3" style="width: 40px; height: 40px;">
                    <strong>{{$history->user->name}}</strong>
                </div>

                <h5 class="card-title mb-4 my-4">You make an event called '{{$history->shares->event_name}}'. In order to distribure {{$history->shares->food_type}} to {{$history->shares->estimated_people}} with a budget of Rp. {{$history->shares->budget}}</h5>

                <div class="d-flex justify-content-between align-items-center">
                
                        <div class="d-flex align-items-center mb-1">
                            <i class="fa-solid fa-calendar me-2"></i>
                            <span>{{$history->shares->distribution_date}}</span>
                        </div>
    
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-location-dot me-2"></i>
                            <span>{{$history->shares->distribution_address}}</span>
                        </div>
                    
                    <div>
                        <span>Status :</span>
                        @if ($history->shares->status == "completed")    
                            <span class="status-box status-active">{{$history->shares->status}}</span>
                        @else
                            <span class="status-box status-active" style="background-color: gray">{{$history->shares->status}}</span>
                        @endif
                    </div>

                    <div class="view">
                        <a href={{ route('tracking', ['id'=>$history->shares->id]) }} class="btn btn-link">View>></a>
                    </div>
                </div>
            </div>
        </div>
        @endif
            
        @endforeach
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/history.css') }}">
<script>
    document.getElementById('filter').addEventListener('change', function () {
        const userId = "{{ $userId }}"; 
        const type = this.value; 
        const url = `/history/${userId}/${type}`; 
        window.location.href = url;
    });
</script>
@endpush
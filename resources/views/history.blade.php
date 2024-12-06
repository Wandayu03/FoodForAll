@extends('layout.master')

@section('title', 'History')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>History</h1>
        <div>
            <label for="filter" class="form-label me-2">Filter:</label>
            <select id="filter" class="form-select d-inline-block w-auto">
                <option value="donate">Donate</option>
                <option value="rent">Rent</option>
            </select>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex align-items-center mb-2">
                <img src="https://via.placeholder.com/40" alt="Profile Icon" class="rounded-circle me-3" style="width: 40px; height: 40px;">
                <strong>Lorem ipsum</strong>
            </div>

            <h5 class="card-title mb-4 my-4">Lorem ipsum odor amet, consectetuer adipiscing elit</h5>

            <div class="d-flex justify-content-between align-items-center">
            
                    <div class="d-flex align-items-center mb-1">
                        <i class="fa-solid fa-calendar me-2"></i>
                        <span>12 Dec 2024, 3:00 PM</span>
                    </div>
  
                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-location-dot me-2"></i>
                        <span>Location Name</span>
                    </div>
                
                <div>
                    <span>Status :</span>
                    <span class="status-box status-active">SUCCESS</span>
                </div>

                <div class="view">
                    <a href="#" class="btn btn-link">View>></a>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex align-items-center mb-2">
                <img src="https://via.placeholder.com/40" alt="Profile Icon" class="rounded-circle me-3" style="width: 40px; height: 40px;">
                <strong>Lorem ipsum</strong>
            </div>

            <h5 class="card-title mb-4 my-4">Lorem ipsum odor amet, consectetuer adipiscing elit</h5>

            <div class="d-flex justify-content-between align-items-center">
            
                    <div class="d-flex align-items-center mb-1">
                        <i class="fa-solid fa-calendar me-2"></i>
                        <span>12 Dec 2024, 3:00 PM</span>
                    </div>
  
                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-location-dot me-2"></i>
                        <span>Location Name</span>
                    </div>
                
                <div>
                    <span>Status :</span>
                    <span class="status-box status-active">SUCCESS</span>
                </div>

                <div class="view">
                    <a href="#" class="btn btn-link">View>></a>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex align-items-center mb-2">
                <img src="https://via.placeholder.com/40" alt="Profile Icon" class="rounded-circle me-3" style="width: 40px; height: 40px;">
                <strong>Lorem ipsum</strong>
            </div>

            <h5 class="card-title mb-4 my-4">Lorem ipsum odor amet, consectetuer adipiscing elit</h5>

            <div class="d-flex justify-content-between align-items-center">
        
                <div>
                    <span>Status :</span>
                    <span class="status-box status-active">SUCCESS</span>
                </div>

                <div class="view">
                    <a href="#" class="btn btn-link">View>></a>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex align-items-center mb-2">
                <img src="https://via.placeholder.com/40" alt="Profile Icon" class="rounded-circle me-3" style="width: 40px; height: 40px;">
                <strong>Lorem ipsum</strong>
            </div>

            <h5 class="card-title mb-4 my-4">Lorem ipsum odor amet, consectetuer adipiscing elit</h5>

            <div class="d-flex justify-content-between align-items-center">
            
                    <div class="d-flex align-items-center mb-1">
                        <i class="fa-solid fa-calendar me-2"></i>
                        <span>12 Dec 2024, 3:00 PM</span>
                    </div>
  
                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-location-dot me-2"></i>
                        <span>Location Name</span>
                    </div>
                
                <div>
                    <span>Status :</span>
                    <span class="status-box status-active">SUCCESS</span>
                </div>

                <div class="view">
                    <a href="#" class="btn btn-link">View>></a>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex align-items-center mb-2">
                <img src="https://via.placeholder.com/40" alt="Profile Icon" class="rounded-circle me-3" style="width: 40px; height: 40px;">
                <strong>Lorem ipsum</strong>
            </div>

            <h5 class="card-title mb-4 my-4">Lorem ipsum odor amet, consectetuer adipiscing elit</h5>

            <div class="d-flex justify-content-between align-items-center">
                
                <div>
                    <span>Status :</span>
                    <span class="status-box status-active">SUCCESS</span>
                </div>

                <div class="view">
                    <a href="#" class="btn btn-link">View>></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/history.css') }}">
@endpush
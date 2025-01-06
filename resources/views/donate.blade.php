@extends('layout.master')

@section('title', 'Donate')

@section('content')
<div>
    <div class="hero">
        <p>{{ __('donate.donate_now') }}</p>
    </div>
    <div class="all-wrapper">
        <!-- Form mengirim Data -->
        <form action="{{ route('donation.create') }}" method="POST">
            @csrf
            <!-- Pilih jumlah donasi -->
            <div class="choose-price">
                <p class="choose-price-title">{{ __('donate.choose_amount') }}</p>
                <div class="choose-price-radio">
                    <input type="radio" id="amount-30k" name="amount" value="30000">
                    <label for="amount-30k" class="custom-label">Rp 30.000</label>

                    <input type="radio" id="amount-50k" name="amount" value="50000">
                    <label for="amount-50k" class="custom-label">Rp 50.000</label>

                    <input type="radio" id="amount-80k" name="amount" value="80000">
                    <label for="amount-80k" class="custom-label">Rp 80.000</label>

                    <input type="radio" id="amount-100k" name="amount" value="100000">
                    <label for="amount-100k" class="custom-label">Rp 100.000</label>
                </div>
            </div>
            <!-- input jumlah donasi -->
            <div class="enter-price">
                <p class="header-text">{{ __('donate.enter_own_amount') }}</p>
                <div class="enter-price-detail">
                    <label for="custom-amount">Rp</label>
                    <input type="number" name="amount" placeholder="350000" required>
                </div>
                <p class="notes">{{ __('donate.minimum_donation') }}</p>
            </div>
            <!-- submit donasi -->
            <div class="continue-payment-wrapper">
                <div class="continue-payment">
                    <input type="submit" class="submit" value="{{ __('donate.continue_process') }}">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/donate.css') }}">
@endpush

@push('scripts')
<script>
    // Menambahkan event listener pada setiap radio button
    document.querySelectorAll('input[name="amount"]').forEach(function(radioButton) {
        radioButton.addEventListener('change', function() {
            // Mengubah nilai input amount berdasarkan pilihan radio
            document.getElementById('custom-amount').value = this.value;
        });
    });

    document.getElementById('custom-amount').addEventListener('input', function() {
        document.querySelectorAll('input[name="amount"]').forEach(function(radioButton) {
            radioButton.checked = false; // Uncheck radio buttons
        });
        this.disabled = false; // Enable custom input field when typing
    });
</script>
@endpush
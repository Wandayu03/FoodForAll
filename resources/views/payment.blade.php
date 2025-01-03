@extends('layout.master')

@section('title', 'Payment Detail')

@section('content')
<div class="payment-detail">  
    <h1>Payment Form</h1>
    <p>You will make a payment</p>
    <p>at a price of</p>
    <p class="price">
      @if(isset($share))
          Rp{{ number_format($share->budget, 0, ',', '.') }}
      @elseif(isset($donation))
          Rp{{ number_format($donation->amount, 0, ',', '.') }}
      @endif
    </p>
    <button id="payButton">Pay Now</button>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/paymentdetail.css') }}">
@endpush

@push('scripts')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script type="text/javascript">
      document.getElementById('payButton').onclick = function(){
        // SnapToken acquired from previous step
        snap.pay('<?=$snapToken?>', {
          // Optional
          onSuccess: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onPending: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onError: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          }
        });
      };
    </script>
@endpush
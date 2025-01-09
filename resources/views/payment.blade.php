@extends('layout.master')

@section('title', 'Payment Detail')

@section('content')
<div class="payment-detail">  
    <h1>{{ __('payment.payment_form') }}</h1>
    <p>{{ __('payment.you_will_make_a_payment_of') }}</p>
    <p>{{ __('payment.at_a_price_of') }}</p>
    <p class="price">
      @if(isset($share))
          Rp{{ number_format($share->budget, 0, ',', '.') }}
      @elseif(isset($donation))
          Rp{{ number_format($donation->amount, 0, ',', '.') }}
      @endif
    </p>
    <button id="payButton">{{ __('payment.pay_now') }}</button>
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
        snap.pay('{{$snapToken}}', {
          // Optional
          onSuccess: function(result){
            /* You may add your own js here, this is just example */ 
            // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            window.location.href = "{{ route('payment.success', ['transaction_id' => $payment->transaction_id]) }}";
          },
          // Optional
          onPending: function(result){
            /* You may add your own js here, this is just example */ 
            // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            console.log('pending', result);
          },
          // Optional
          onError: function(result){
            /* You may add your own js here, this is just example */ 
            // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            console.log('error', result);
          }
        });
      };
    </script>
@endpush
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
</head>
<body>
    <h1>Payment Form</h1>
    <button id="payButton">Pay Now</button>

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

    <!-- <script>
        $(document).ready(function() {
            $('#payButton').click(function() {
                // Pertama, ambil snap token
                $.ajax({
                    url: '/create-snap-token', // Endpoint yang mengembalikan snap token
                    type: 'POST',
                    contentType: 'application/json',
                    success: function(response) {
                        const snapToken = response.snap_token;

                        // Kemudian, kirim permintaan ke Midtrans dengan snap token
                        $.ajax({
                            url: 'https://app.sandbox.midtrans.com/snap/v1/transactions',
                            type: 'POST',
                            contentType: 'application/json',
                            data: JSON.stringify({
                                "snap_token": snapToken
                            }),
                            success: function(response) {
                                console.log(response);
                                alert("Payment successful!"); // Tindakan setelah sukses
                            },
                            error: function(xhr, status, error) {
                                console.log("Status:", status);
                                console.log("Error:", error);
                                console.log("Response Text:", xhr.responseText);
                                alert("Payment failed: " + xhr.responseText); // Tindakan saat gagal
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log("Error fetching snap token:", xhr.responseText);
                        alert("Failed to fetch snap token.");
                    }
                });
            });
        });
    </script> -->
</body>
</html>
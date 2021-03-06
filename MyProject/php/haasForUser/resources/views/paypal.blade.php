<!DOCTYPE html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
</head>

<body>
<body>



<div id="paypal-button"></div>
<script src="https://www.paypal.com/sdk/js?client-id=AeatnFoXL1V45NZiv9TZUG73vpMMDVUpgtfSGffIH4iq609h0mc8ejqsd02PBC5NARSflsmr1cya5c0t"></script>
  <script>

paypal.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '0.01'
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
        alert('Transaction completed by ' + details.payer.name.given_name);
      });
    }
  }).render('#paypal-button');
  //This function displays Smart Payment Buttons on your web page.
  </script>


</body>
</body>
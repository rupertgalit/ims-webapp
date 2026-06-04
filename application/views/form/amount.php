<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Amount</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="/assets/css/amount.css?v=05072025">
      <meta property="og:title" content="NetGlobal Solutions, Inc.">
  <meta property="og:description" content="Your trusted IT solutions provider.">
  <meta property="og:image" content="/assets/img/ngsilogo.png">
  <meta property="og:type" content="website">

</head>

<body>
    <!-- Main Panel (Donation Form) -->
    <div class="main-panel">
        <div class="form-container" style="background:none; padding:0;">
            <div class="payment-frame">
                <!-- Header -->
                <div class="header">
                    <img src="/assets/img/ngsi.png">
                </div>
                <!-- QR Code -->
                <div class="qr-container">
                    <h2>Top-Up Form</h2>
                    <p>Enter your details below to generate a QR code.</p>
                    <form class="form" action="cashin-v2" method="post">
                        <!-- Input Fields -->
                        <input type="text" class="form-input" name="name" id="company-name" placeholder="Enter your  name" required>


                        <input type="number" class="form-input" name="amount" id="amount" placeholder="Amount" required>


                        <input type="text" class="form-input" name="mobile-number" id="mobile-number" placeholder="Mobile Number" required>

                        <input type="email" class="form-input" name="email" id="email" placeholder="Email" required>

                        <!-- Submit Button -->
                        <button class="submit-btn" type="submit" id="submit">Submit</button>
                    </form>

                </div>

                <h2>Supported Payments</h2>
                <img src="/assets/img/payments.png" alt="Supported Payments" class="supportedpayments">
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/assets/js/slider.js"></script>
    <!-- <script>
        const amountInput = document.getElementById("amount");
        amountInput.addEventListener("input", function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script> -->
</body>

</html>
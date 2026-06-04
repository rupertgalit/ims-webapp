<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Payment Success</title>

  <!-- Libraries -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

  <!-- CSS -->
  <link rel="stylesheet" href="/assets/css/success.css">

  <link rel="icon" type="image/x-icon" href="/assets/img/NGPAY PRIMARY LOGO.png" />
    <meta property="og:title" content="NetGlobal Solutions, Inc.">
  <meta property="og:description" content="Your trusted IT solutions provider.">
  <meta property="og:image" content="/assets/img/ngsilogo.png">
  <meta property="og:type" content="website">

</head>

<body>
  <div class="container" id="payment">
    <!-- Checkmark -->
    <div class="checkmark"></div>

    <!-- Success Message Title -->
    <h2>Paid</h2>
    <h2><?= $data['return_url']?></h2>
    <h2 class="card__submsg">Your payment has already been made.</h2>

    <div class="card__body">
      <div class="details">
        <p>
          <strong>Account Name:</strong><span>I****N F** C*****E V*****</span>
        </p>
        <p>
          <strong>Account No.:</strong><span>1234567890</span>
        </p>
        <p>
          <strong>Payment Date & Time:</strong><span>12/14/24 4:44PM</span>
        </p>
        <p>
          <strong>Reference No.:</strong><span>987654321</span>
        </p>
        <hr />
        <p>
          <strong>Convenience Fee:</strong><span>23.00</span>
        </p>
        <hr />
        <p class="total">
          <strong>Total Amount:</strong><span>1023.00</span>
        </p>
      </div>

      <!-- Buttons -->
      <div class="btn-container">
        <button onclick="window.location.href='<?= $data['return_url'] ?>'">Back to Page</button>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
</body>

</html>

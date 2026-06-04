<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Top-up Form</title>
  <meta name="description" content="Login page for user authentication">
  <link rel="stylesheet" href="<?= base_url('/assets/css/form.css'); ?>">
  <link rel="icon" type="image/x-icon" href="/assets/img/NGPAY PRIMARY LOGO.png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
    <meta property="og:title" content="NetGlobal Solutions, Inc.">
  <meta property="og:description" content="Your trusted IT solutions provider.">
  <meta property="og:image" content="/assets/img/ngsilogo.png">
  <meta property="og:type" content="website">

</head>

<body>
<div class="watermark tl">for Demo Purpose Only</div>
  <div class="watermark tr">for Demo Purpose Only</div>
  <div class="watermark bl">for Demo Purpose Only</div>
  <div class="watermark br">for Demo Purpose Only</div>
  <div class="form-container fade-in">
    <h1 class="title">Top-up Form</h1>
    <form class="form" action="cashin-v2" method="post">
      <div class="input-group">
        <label for="company-name">Name</label>
        <input type="text" name="name" id="company-name" placeholder="Enter your  name" required>
      </div>
      <div class="input-group">
        <label for="amount">Amount</label>
        <input type="number" name="amount" id="amount" placeholder="Amount" required>
      </div>
      <div class="input-group">
        <label for="amount">Mobile Number</label>
        <input type="text" name="mobile-number" id="mobile-number" placeholder="Mobile Number" required>
      </div>
      <div class="input-group">
        <label for="amount">Email </label>
        <input type="email" name="email" id="email" placeholder="Email" required>
      </div>
      <!-- <div class="input-group">
        <label for="paymentoption">Payment Option</label>
        <select name="paymentoption" id="paymentoption" required>
          <option value="" disabled selected>Select Payment</option>
          <option value="3">QRPH</option>
          <option value="2">Brankas</option>
         
     
        </select>
      </div> -->
      <button type="submit" class="sign">Submit</button>
    </form>
  </div>
</body>

</html>

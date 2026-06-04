<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Failed</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/failed.css" />
    <link rel="icon" type="image/x-icon" href="/assets/img/NGPAY PRIMARY LOGO.png">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
      <meta property="og:title" content="NetGlobal Solutions, Inc.">
  <meta property="og:description" content="Your trusted IT solutions provider.">
  <meta property="og:image" content="/assets/img/ngsilogo.png">
  <meta property="og:type" content="website">

</head>

<body>
    <main class="container" role="main" aria-live="polite">
        <section class="payment payment--failed fade-in">
            <i class="fas fa-times-circle"></i>
            <span class="payment__status">Payment Failed</span>
            <span class="payment__message">Your payment was not successful. Please try again.</span>
            <button class="payment__button" onclick="window.location.href='/form'">Back to Payment Form</button>
        </section>
    </main>
</body>

</html>
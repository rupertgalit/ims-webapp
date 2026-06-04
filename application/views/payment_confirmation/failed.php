<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payment Failed</title>

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css" />

    <link rel="stylesheet" href="/assets/css/pc_failed.css?v=050522025">
      <meta property="og:title" content="NetGlobal Solutions, Inc.">
  <meta property="og:description" content="Your trusted IT solutions provider.">
  <meta property="og:image" content="/assets/img/ngsilogo.png">
  <meta property="og:type" content="website">


</head>

<body>
    <div class="container">
        <!-- Error Icon -->
        <div class="error-icon">
            <svg viewBox="0 0 52 52">
                <circle cx="26" cy="26" r="25" />
                <path fill="none" stroke="#fff" stroke-width="5" d="M16 16 L36 36 M36 16 L16 36" />
            </svg>
        </div>

        <!-- Failure Text -->
        <h2>Transaction Failed</h2>
        <div class="card__submsg">We were unable to process your payment.</div>
        <div class="card__submsg">Please try again or contact support if the issue persists.</div>

        <div class="btn-container">
        <button onclick="redirectNow()"><i class="mdi mdi-arrow-left-bold"></i> Back to Merchant</button>
        </div>

        <!-- Countdown -->
        <p id="countdown">Redirecting in <span id="time">15</span> seconds...</p>

        <!-- Support Info -->
        <p class="support-text">
            Need help? Email us at <strong>support@netglobalsolutions.net</strong><br />
            or call us at <strong>(02) 853 50989</strong>
        </p>
    </div>
</body>

<script>
    let timeLeft = 15;
    const countdownEl = document.getElementById("time");
    const redirectURL = "/";

    const timer = setInterval(() => {
        timeLeft--;
        countdownEl.textContent = timeLeft;

        if (timeLeft <= 0) {
            clearInterval(timer);
            window.location.href = redirectURL;
        }
    }, 1000);

    function redirectNow() {
        clearInterval(timer);
        window.location.href = redirectURL;
    }
</script>

</html>
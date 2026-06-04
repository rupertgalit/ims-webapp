<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Checkout Page</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" />

  <link rel="stylesheet" href="/assets/css/checkout.css">
    <meta property="og:title" content="NetGlobal Solutions, Inc.">
  <meta property="og:description" content="Your trusted IT solutions provider.">
  <meta property="og:image" content="/assets/img/ngsilogo.png">
  <meta property="og:type" content="website">


</head>

<body>
  <header>
    <h3>Checkout</h3>
  </header>

  <main>
    <!-- Checkout Form -->
    <section class="checkout-form">
      <form action="#!" method="get">
        <h6>Payment information</h6>

        <div class="form-control">
          <label for="checkout-email">E-mail</label>
          <input type="email" id="checkout-email" name="checkout-email" placeholder="you@example.com" autocomplete="email" required>
        </div>

        <div class="form-control">
          <label for="checkout-phone">Phone (Optional)</label>
          <div style="display: flex; align-items: center;">
            <span style="padding: 10px; background: #eee; border-radius: 10px 0 0 10px; font-weight: 700; font-size:14px;">+63</span>
            <input type="tel" id="checkout-phone" name="checkout-phone" placeholder="9123456789" style="border-radius: 0 10px 10px 0; border-left: none;" maxlength="10" pattern="[0-9]{10}" autocomplete="tel">
          </div>
        </div>

        <div class="form-control">
          <label for="checkout-amount">Amount (₱)</label>
          <input type="text" id="checkout-amount" name="checkout-amount" placeholder="Enter total amount..." autocomplete="off" required>
        </div>

        <div class="form-control checkbox-control">
          <input type="checkbox" id="checkout-checkbox" name="checkout-checkbox" required>
          <label for="checkout-checkbox">Terms & Agreement.</label>
        </div>

        <div class="form-control-btn">
          <button type="submit">Continue</button>
        </div>
      </form>

      <div class="alert alert-amber">
        <svg class="alert-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
          <line x1="12" y1="9" x2="12" y2="13"></line>
          <line x1="12" y1="17" x2="12.01" y2="17"></line>
        </svg>
        <span class="alert-text">After making a payment, please do not close or refresh the <span class="highlight">QR page.</span> Wait for a response indicating success or failure.</span>
      </div>

      <img src="/assets/img/NETGLOBAL PAY EWALLET LOGO-05.png" alt="Company Logo" style="max-height: 60px; display: block; margin: 0 auto 10px;">
    </section>

    <!-- Checkout Details -->
    <section class="checkout-details">
      <div class="checkout-details-inner hidden">
        <div class="checkout-lists">
          <div class="qr-container">
            <div class="qr-code" id="content">
              <img src="/assets/img/qrph.png" alt="Payment QR Code" loading="lazy">
            </div>
          </div>
        </div>

        <div class="checkout-shipping">
          <span>Reference Number</span>
          <p>1234567890</p>
        </div>

        <div class="checkout-total">
          <span>Amount</span>
          <p>148.98</p>
        </div>
      </div>

      <h5>Supported E-Wallets & Banks</h5>
      <img src="/assets/img/1121_LOGOS.png" alt="Supported Payment Providers" loading="lazy" style="margin: -60px auto;">
    </section>
  </main>

  <script>
    const amountInput = document.getElementById("checkout-amount");
    amountInput.addEventListener("input", function(e) {
      this.value = this.value.replace(/[^0-9]/g, '');
    });

    const form = document.querySelector("form");
    const requiredInputs = ["checkout-email", "checkout-amount"];
    const checkoutDetails = document.querySelector(".checkout-details-inner");

    checkoutDetails.classList.add("hidden");

    form.addEventListener("submit", function(e) {
      let isValid = true;

      requiredInputs.forEach((id) => {
        const input = document.getElementById(id);
        if (!input.value.trim()) {
          input.classList.add("input-error");
          isValid = false;
        } else {
          input.classList.remove("input-error");
        }
      });

      const phoneInput = document.getElementById("checkout-phone");
      const phoneValue = phoneInput.value.trim();
      if (phoneValue && !/^\d{10}$/.test(phoneValue)) {
        phoneInput.classList.add("input-error");
        isValid = false;
      } else {
        phoneInput.classList.remove("input-error");
      }

      if (!isValid) {
        e.preventDefault();
        return;
      }

      e.preventDefault();

      // Show and animate the checkout details
      checkoutDetails.classList.remove("hidden");
      checkoutDetails.classList.add("animate");
    });
  </script>
</body>

</html>

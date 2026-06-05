<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=yes" />
  <title>Innovative Solutions | Payment Form</title>
  <link rel="icon" type="image/x-icon" href="/assets/img/innovative_icon.png">
  <style>
    @import url(https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&display=swap);

    .company-text h2,
    body,
    h1 {
      color: var(--text)
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box
    }

    :root {
      --panel: rgba(255, 255, 255, 0.82);
      --text: #0a2540;
      --muted: #7a8ea5;
      --border: #e6ebf1;
      --primary: #635bff;
      --primary-hover: #564df0;
      --success: #16a34a;
      --danger: #dc2626;
      --shadow: 0 18px 40px rgba(15, 23, 42, 0.08)
    }

    body {
      min-height: 100vh;
      background: #f5f5f5;
      font-family: Raleway, sans-serif;
      padding: 40px 20px
    }

    .page-wrapper {
      max-width: 1200px;
      margin: auto;
      display: grid;
      grid-template-columns: 1fr 420px;
      gap: 28px
    }

    .required-star {
      color: #e53e3e;
      font-weight: 700;
      margin-left: 2px
    }

    .left-panel,
    .right-panel {
      background: var(--panel);
      backdrop-filter: blur(16px);
      border: 1px solid rgba(255, 255, 255, .6);
      border-radius: 28px;
      padding: 32px;
      box-shadow: var(--shadow)
    }

    .right-panel {
      position: sticky;
      top: 20px
    }

    .company-logo {
      display: flex;
      align-items: center;
      gap: 14px;
      margin-bottom: 18px
    }

    .company-logo img {
      height: 54px;
      margin-bottom: 0
    }

    .company-text h2 {
      margin: 0;
      font-size: 1.2rem;
      font-weight: 700;
      line-height: 1.2
    }

    .company-text span {
      display: block;
      font-size: .85rem;
      color: var(--muted);
      margin-top: 2px
    }

    h1 {
      font-size: 1.5rem;
      font-weight: 700;
      letter-spacing: -.03em;
      margin-top: .25rem
    }

    .hero-sub {
      margin-top: 10px;
      color: var(--muted);
      line-height: 1.6;
      font-size: .95rem
    }

    .section-title {
      margin-top: 34px;
      margin-bottom: 8px;
      font-size: .9rem;
      text-transform: uppercase;
      letter-spacing: .08em;
      color: #55718e;
      font-weight: 700
    }

    .section-sub {
      color: var(--muted);
      font-size: .8rem;
      margin-bottom: 18px
    }

    .input-row {
      display: flex;
      gap: 16px;
      margin-bottom: 18px
    }

    .input-group {
      flex: 1
    }

    .field-wrapper {
      display: flex;
      flex-direction: column
    }

    .input-label {
      font-size: .85rem;
      font-weight: 600;
      margin-bottom: 8px;
      color: #425466
    }

    .pay-btn,
    .peso {
      font-weight: 700
    }

    .input-field {
      border: 1px solid var(--border);
      width: 100%;
      padding: .9rem 1rem;
      border-radius: 1rem;
      font-size: .92rem;
      outline: 0;
      background: #fff;
      transition: border .2s, box-shadow .2s
    }

    .method-option,
    .pay-btn {
      cursor: pointer;
      transition: .2s
    }

    .pay-btn,
    .toast {
      transition: .25s
    }

    textarea.input-field {
      height: 110px;
      resize: none;
      padding-top: 14px
    }

    .input-field:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 4px rgba(99, 91, 255, .12)
    }

    .error-field {
      border-color: var(--danger) !important;
      background: #fff7f7 !important
    }

    .error-message {
      font-size: .76rem;
      color: var(--danger);
      margin-top: 6px;
      margin-left: 4px;
      display: none
    }

    .methods-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 14px;
      margin-top: 18px
    }

    .method-option {
      position: relative;
      border: 1px solid var(--border);
      background: #fff;
      border-radius: 18px;
      min-height: 100px;
      display: flex;
      align-items: center;
      justify-content: center
    }

    .check-icon,
    .pay-btn {
      background: var(--primary);
      color: #fff;
      font-weight: 700
    }

    .method-option:hover {
      border-color: var(--primary);
      transform: translateY(-2px)
    }

    .method-option.selected {
      border: 2px solid var(--primary);
      background: rgba(99, 91, 255, .04)
    }

    .method-option img {
      max-width: 90px;
      max-height: 42px;
      object-fit: contain
    }

    .check-icon {
      position: absolute;
      top: 10px;
      right: 10px;
      width: 22px;
      height: 22px;
      border-radius: 50%;
      display: none;
      align-items: center;
      justify-content: center;
      font-size: .75rem
    }

    .method-option.selected .check-icon {
      display: flex
    }

    .pay-btn {
      margin-top: 28px;
      width: 100%;
      padding: 14px;
      border: none;
      border-radius: 10px;
      background: linear-gradient(195deg, #42424a, #191919);
      color: #fff;
      cursor: pointer;
      letter-spacing: 1px
    }

    .pay-btn:hover {
      transform: translateY(-1px);
      box-shadow: 0 10px 25px rgba(25, 25, 25, .25)
    }

    .pay-btn:active {
      transform: scale(.98)
    }

    .amount-wrapper {
      position: relative
    }

    .peso {
      position: absolute;
      left: 16px;
      top: 50%;
      transform: translateY(-50%);
      color: #425466
    }

    .amount-input {
      padding-left: 36px
    }

    .toast {
      position: fixed;
      bottom: 24px;
      left: 50%;
      transform: translateX(-50%) translateY(20px);
      background: #163047;
      color: #fff;
      padding: 14px 18px;
      border-radius: 14px;
      font-size: .8rem;
      font-weight: 600;
      box-shadow: 0 10px 25px rgba(0, 0, 0, .15);
      opacity: 0;
      visibility: hidden;
      z-index: 9999;
      max-width: 340px;
      width: max-content
    }

    .toast.show {
      opacity: 1;
      visibility: visible;
      transform: translateX(-50%) translateY(0)
    }

    .toast.success {
      background: var(--success)
    }

    .toast.error {
      background: var(--danger)
    }

    @media (max-width:600px) {
      .toast {
        left: 16px;
        right: 16px;
        bottom: 16px;
        width: auto;
        max-width: unset;
        transform: translateY(20px);
        border-radius: 16px;
        text-align: center
      }

      .toast.show {
        transform: translateY(0)
      }
    }

    @media (max-width:980px) {
      .page-wrapper {
        grid-template-columns: 1fr;
        gap: 1rem;
        padding: 0
      }

      .right-panel {
        position: static
      }
    }

    @media (max-width:640px) {
      body {
        padding: 16px
      }

      .left-panel,
      .right-panel {
        padding: 22px;
        border-radius: 22px
      }

      .input-row {
        flex-direction: column;
        gap: 14px
      }

      .methods-grid {
        grid-template-columns: 1fr 1fr
      }

      h1 {
        font-size: 1.2rem;
        text-align: center
      }

      .hero-sub {
        font-size: .8rem;
        text-align: justify
      }
    }
    .method-option input[type="radio"] {
  position: absolute;
  opacity: 0;
  width: 0;
  height: 0;
  pointer-events: none;
}
  </style>
</head>

<form action="payment-vlpay" method="POST">
        <div class="page-wrapper">
            <div class="left-panel">
                <div class="company-logo">
                    <img
                        src="/assets/img/innovative_icon.png"
                        alt="Innovative Solutions Logo"
                        onerror="this.src = 'https://placehold.co/200x70?text=Innovative Solutions'" />

                    <div class="company-text">
                        <h2>Innovative Solutions</h2>
                        <span>Secure Payment Portal</span>
                    </div>
                </div>


                <h1>Payment Form</h1>
                <div class="hero-sub">
                    Fast, secure, and reliable payment processing for your transactions.
                </div>

                <div class="section-title">Contact Details</div>
                <div class="section-sub">Enter your personal contact information.</div>

                <!-- Full Name row -->
                <div class="input-row">
                    <div class="input-group">
                        <div class="field-wrapper">
                            <label class="input-label"><span class="label-with-req">Full Name<span class="required-star">*</span></span></label>
                            <input
                                id="fullName"
                                name="name"
                                class="input-field"
                                type="text"
                                placeholder="Enter your name"
                                autocomplete="name" />
                            <div class="error-message" id="name-error"></div>
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="field-wrapper">
                            <label class="input-label"><span class="label-with-req">Mobile Number<span class="required-star">*</span></span></label>
                            <input
                                id="mobile"
                                name="phone_number"
                                class="input-field"
                                type="tel"
                                placeholder="09XXXXXXXXX"
                                autocomplete="tel" />
                            <div class="error-message" id="mobile-error"></div>
                        </div>
                    </div>
                </div>

                <!-- Email Address row -->
                <div class="input-row">
                    <div class="input-group">
                        <div class="field-wrapper">
                            <label class="input-label"><span class="label-with-req">Email Address<span class="required-star">*</span></span></label>
                            <input
                                id="email"
                                name="email"
                                class="input-field"
                                type="email"
                                placeholder="Enter your email address"
                                autocomplete="email" />
                            <div class="error-message" id="email-error"></div>
                        </div>
                    </div>
                </div>

                <!-- Description row: NOW REQUIRED - not optional -->
                <div class="input-row">
                    <div class="input-group">
                        <div class="field-wrapper">
                            <label class="input-label"><span class="label-with-req">Description<span class="required-star">*</span></span></label>
                            <textarea
                                id="description"
                                name="description"
                                class="input-field"
                                maxlength="200"
                                placeholder="What is this payment for? (required: e.g., donation, membership, invoice, service)"></textarea>
                            <div class="error-message" id="description-error"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT PANEL: amount & payment method -->
            <div class="right-panel">
                <h1>Select Payment</h1>
                <div class="hero-sub">Choose amount and payment method</div>

                <div class="section-title">Payment Amount</div>
                <div class="section-sub">Specify the amount you want to pay.</div>

                <div class="input-row">
                    <div class="input-group">
                        <div class="field-wrapper">
                            <label class="input-label"><span class="label-with-req">Amount (PHP)<span class="required-star">*</span></span></label>
                            <div class="amount-wrapper">
                                <span class="peso">₱</span>
                                <input
                                    id="amount"
                                    name="amount"
                                    class="input-field amount-input"
                                    type="text"
                                    inputmode="decimal"
                                    placeholder="0.00"
                                    autocomplete="off" />
                            </div>
                            <div class="error-message" id="amount-error"></div>
                        </div>
                    </div>
                </div>

                <div class="section-title">Payment Method</div>
                <div class="section-sub">
                    Select your preferred payment option (required).
                </div>

                <div class="methods-grid">

                    <label class="method-option" data-method="gcash">
                        <input type="radio" name="payment_method" value="GCASH" required>
                        <div class="check-icon">✓</div>
                        <img
                            src="/assets/img/payment-options/gcash_logo.png"
                            alt="GCash"
                            loading="lazy"
                            onerror="this.src='https://placehold.co/100x50?text=GCash'">
                    </label>

                    <label class="method-option" data-method="maya">
                        <input type="radio" name="payment_method" value="MAYA">
                        <div class="check-icon">✓</div>
                        <img
                            src="/assets/img/payment-options/maya_logo.png"
                            alt="Maya"
                            loading="lazy"
                            onerror="this.src='https://placehold.co/100x50?text=Maya'">
                    </label>

                    <label class="method-option" data-method="gotyme">
                        <input type="radio" name="payment_method" value="GOTYME">
                        <div class="check-icon">✓</div>
                        <img
                            src="/assets/img/payment-options/gotyme_logo.png"
                            alt="GoTyme"
                            loading="lazy"
                            onerror="this.src='https://placehold.co/100x50?text=GoTyme'">
                    </label>

                    <label class="method-option" data-method="qrph">
                        <input type="radio" name="payment_method" value="QRPH">
                        <div class="check-icon">✓</div>
                        <img
                            src="/assets/img/payment-options/qrph_logo.svg"
                            alt="QRPh"
                            loading="lazy"
                            onerror="this.src='https://placehold.co/100x50?text=QRPh'">
                    </label>

                </div>
                <button type="submit" class="pay-btn" id="payBtn">Complete Payment</button>
            </div>
        </div>
    </form>
    <div id="toast" class="toast"></div>
    <script>
        // ======================== DOM Elements ========================
        const fullName = document.getElementById("fullName");
        const mobile = document.getElementById("mobile");
        const email = document.getElementById("email");
        const amount = document.getElementById("amount");
        const description = document.getElementById("description");

        const nameErr = document.getElementById("name-error");
        const mobileErr = document.getElementById("mobile-error");
        const emailErr = document.getElementById("email-error");
        const amountErr = document.getElementById("amount-error");
        const descErr = document.getElementById("description-error");

        // ======================== Helper Functions ========================
        const setError = (inputEl, errorEl, message) => {
            inputEl.classList.add("error-field");
            errorEl.innerText = message;
            errorEl.style.display = "block";
        };

        const removeError = (inputEl, errorEl) => {
            inputEl.classList.remove("error-field");
            errorEl.style.display = "none";
            errorEl.innerText = "";
        };

        // Validators
        const isValidEmail = (value) => {
            const trimmed = value.trim();
            return /^[^\s@]+@([^\s@]+\.)+[^\s@]+$/.test(trimmed);
        };

        const isValidMobile = (value) => {
            const cleaned = value.trim();
            return /^09\d{9}$/.test(cleaned);
        };

        const validateName = () => {
            const val = fullName.value;
            if (!val.trim()) {
                setError(fullName, nameErr, "Full name cannot be blank");
                return false;
            }
            if (val.trim().length < 2) {
                setError(
                    fullName,
                    nameErr,
                    "Enter a valid full name (min. 2 characters)",
                );
                return false;
            }
            removeError(fullName, nameErr);
            return true;
        };

        const validateEmail = () => {
            const val = email.value;
            if (!val.trim()) {
                setError(email, emailErr, "Email address cannot be blank");
                return false;
            }
            if (!isValidEmail(val)) {
                setError(
                    email,
                    emailErr,
                    "Enter a valid email (e.g., name@domain.com)",
                );
                return false;
            }
            removeError(email, emailErr);
            return true;
        };

        const validateMobile = () => {
            const val = mobile.value;
            if (!val.trim()) {
                setError(mobile, mobileErr, "Mobile number cannot be blank");
                return false;
            }
            if (!isValidMobile(val)) {
                setError(
                    mobile,
                    mobileErr,
                    "Use valid PH mobile: 09XXXXXXXXX (11 digits)",
                );
                return false;
            }
            removeError(mobile, mobileErr);
            return true;
        };

        const validateAmount = () => {
            let val = amount.value.trim();
            if (val === "") {
                setError(amount, amountErr, "Amount cannot be empty");
                return false;
            }
            let numericVal = val.replace(/,/g, "");
            const number = parseFloat(numericVal);
            if (isNaN(number) || number <= 0) {
                setError(amount, amountErr, "Enter a valid amount greater than 0");
                return false;
            }
            if (number > 999999999) {
                setError(amount, amountErr, "Amount is too high");
                return false;
            }
            removeError(amount, amountErr);
            return true;
        };

        const validateDescription = () => {
            const descRaw = description.value;
            const trimmed = descRaw.trim();
            if (!trimmed) {
                setError(
                    description,
                    descErr,
                    "Description is required. Please provide payment details.",
                );
                return false;
            }
            if (trimmed.length < 3) {
                setError(
                    description,
                    descErr,
                    "Please provide a more detailed description (minimum 3 characters).",
                );
                return false;
            }
            removeError(description, descErr);
            return true;
        };

        const validateForm = () => {
            const isNameValid = validateName();
            const isEmailValid = validateEmail();
            const isMobileValid = validateMobile();
            const isAmountValid = validateAmount();
            const isDescValid = validateDescription();
            return (
                isNameValid &&
                isEmailValid &&
                isMobileValid &&
                isAmountValid &&
                isDescValid
            );
        };

        // Mobile restrict digits + max 11 digits
        mobile.addEventListener("input", (e) => {
            let raw = e.target.value.replace(/\D/g, "");
            if (raw.length > 11) raw = raw.slice(0, 11);
            e.target.value = raw;
            if (raw.length > 0 && isValidMobile(raw)) {
                removeError(mobile, mobileErr);
            }
        });

        amount.addEventListener("keydown", (e) => {
            if (["e", "E", "+", "-"].includes(e.key)) {
                e.preventDefault();
            }
        });

        amount.addEventListener("input", (e) => {
            let value = e.target.value;
            let sanitized = value.replace(/[^\d.]/g, "");
            const parts = sanitized.split(".");
            if (parts.length > 2) {
                sanitized = parts[0] + "." + parts.slice(1).join("");
            }
            if (parts.length === 2 && parts[1].length > 2) {
                sanitized = parts[0] + "." + parts[1].slice(0, 2);
            }
            e.target.value = sanitized;
            const num = parseFloat(sanitized);
            if (!isNaN(num) && num > 0 && sanitized !== "") {
                removeError(amount, amountErr);
            }
        });

        description.addEventListener("input", () => {
            const val = description.value.trim();
            if (val.length >= 3) {
                removeError(description, descErr);
            } else if (val.length === 0) {
                if (description.classList.contains("error-field")) {}
            }
        });

        fullName.addEventListener("input", () => {
            if (fullName.value.trim().length >= 2) removeError(fullName, nameErr);
        });
        email.addEventListener("input", () => {
            if (email.value.trim() && isValidEmail(email.value))
                removeError(email, emailErr);
        });
        mobile.addEventListener("blur", validateMobile);
        amount.addEventListener("blur", validateAmount);
        fullName.addEventListener("blur", validateName);
        email.addEventListener("blur", validateEmail);
        description.addEventListener("blur", validateDescription);

        // ========== Payment Method Selection ==========
        const methodOptions = document.querySelectorAll(".method-option");
        let selectedMethod = null;

        const updateMethodSelection = (selectedElement) => {
            methodOptions.forEach((opt) => {
                opt.classList.remove("selected");
            });
            selectedElement.classList.add("selected");
            selectedMethod = selectedElement.getAttribute("data-method");
        };

        methodOptions.forEach((option) => {
            option.addEventListener("click", () => {
                updateMethodSelection(option);
                const methodsGrid = document.querySelector(".methods-grid");
                if (methodsGrid) methodsGrid.style.boxShadow = "";
            });
        });

        const payButton = document.getElementById("payBtn");
        const showToast = (message, type = "error") => {
            const toast = document.getElementById("toast");
            toast.textContent = message;
            toast.className = `toast show ${type}`;
            clearTimeout(toast.hideTimeout);
            toast.hideTimeout = setTimeout(() => {
                toast.classList.remove("show");
            }, 3200);
        };

        payButton.addEventListener("click", (e) => {
            e.preventDefault();

            const formValid = validateForm();

            // Get selected radio
            const selectedPayment = document.querySelector(
                'input[name="payment_method"]:checked'
            );

            const methodValue = selectedPayment ? selectedPayment.value : null;

            if (!formValid) {
                const firstErrorField = document.querySelector(".error-field");

                if (firstErrorField) {
                    firstErrorField.scrollIntoView({
                        behavior: "smooth",
                        block: "center",
                    });
                }

                showToast("Please complete all required fields correctly.");
                return;
            }

            if (!methodValue) {
                showToast(
                    "Please select a payment method (GCash, Maya, GoTyme, or QRPh)."
                );

                const methodsGrid = document.querySelector(".methods-grid");

                if (methodsGrid) {
                    methodsGrid.style.transition = "0.1s";
                    methodsGrid.style.boxShadow = "0 0 0 2px #e53e3e";

                    setTimeout(() => {
                        methodsGrid.style.boxShadow = "";
                    }, 800);
                }

                return;
            }

            // submit form if all valid
            document.querySelector("form").submit();
        });

        // Ensure initial errors hidden
        const ensureErrorsHidden = () => {
            [nameErr, mobileErr, emailErr, amountErr, descErr].forEach(
                (er) => (er.style.display = "none"),
            );
        };
        ensureErrorsHidden();

        amount.addEventListener("blur", () => {
            let val = amount.value.trim();
            if (val === "") return;
            let num = parseFloat(val);
            if (!isNaN(num) && num > 0) {
                if (!val.includes(".")) {
                    amount.value = num.toFixed(2);
                } else {
                    let parts = val.split(".");
                    if (parts.length === 2 && parts[1].length === 1)
                        amount.value = num.toFixed(2);
                    else if (parts.length === 2 && parts[1].length > 2)
                        amount.value = num.toFixed(2);
                }
            }
            validateAmount();
        });

        email.addEventListener("blur", () => {
            if (email.value.trim() && !isValidEmail(email.value)) {
                setError(
                    email,
                    emailErr,
                    "Invalid email format. Example: name@domain.com",
                );
            } else {
                validateEmail();
            }
        });

        description.addEventListener("blur", validateDescription);
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>2C2P Payment Form </title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(145deg, #e9f0fc 0%, #d9e4f5 100%);
            font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        .form-card {
            max-width: 520px;
            width: 100%;
            background: rgba(255, 255, 255, 0.98);
            border-radius: 1.5rem;
            box-shadow: 0 25px 45px -12px rgba(0, 0, 0, 0.25), 0 8px 18px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .form-header {
            padding: 2rem 2rem 1rem 2rem;
            border-bottom: 1px solid #eef2f8;
            background: #ffffff;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 0.75rem;
        }

        .logo-image {
            width: 200px;
            height: auto;
            display: block;
        }

        .brand-badge {
            font-size: 0.75rem;
            font-weight: 500;
            background: #F0F4FA;
            color: #1F5E96;
            padding: 0.2rem 0.7rem;
            border-radius: 40px;
        }

        .form-title {
            font-size: 1.9rem;
            font-weight: 700;
            color: #0A2647;
            margin: 1rem 0 0.25rem 0;
            text-align: center;
        }

        .subhead {
            font-size: 0.9rem;
            color: #5c6f87;
            text-align: center;
        }

        .form-body {
            padding: 1.8rem 2rem 2rem 2rem;
        }

        .input-group {
            margin-bottom: 1.75rem;
            display: flex;
            flex-direction: column;
        }

        .input-label {
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #2c3e5c;
            margin-bottom: 0.6rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .input-field {
            width: 100%;
            padding: 0.9rem 1rem;
            font-size: 1rem;
            font-family: inherit;
            background: #F9FBFE;
            border: 1.5px solid #E2E9F2;
            border-radius: 1rem;
            transition: all 0.2s ease;
            outline: none;
            color: #0B2B42;
            font-weight: 500;
        }

        .input-field.error-field {
            border-color: #e53e3e;
            background-color: #fff5f5;
        }

        .error-message {
            font-size: 0.7rem;
            color: #e53e3e;
            margin-top: 6px;
            margin-left: 6px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .error-message::before {
            content: "!";
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background-color: red;
            color: white;
            font-size: 0.7rem;
            font-weight: bold;
        }

        .input-field:focus {
            border-color: #2C7DA0;
            box-shadow: 0 0 0 4px rgba(44, 125, 160, 0.15);
            background: #ffffff;
        }

        .amount-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .currency-symbol {
            position: absolute;
            left: 1rem;
            font-size: 1.1rem;
            font-weight: 600;
            color: #2c5a7a;
            pointer-events: none;
        }

        .amount-wrapper .input-field {
            padding-left: 2.2rem;
        }

        .hint-text {
            font-size: 0.7rem;
            color: #7e92aa;
            margin-top: 6px;
            margin-left: 6px;
        }

        .submit-btn {
            background: #0A2647;
            color: white;
            border: none;
            width: 100%;
            padding: 1rem;
            font-size: 1.05rem;
            font-weight: 600;
            border-radius: 1rem;
            cursor: pointer;
            margin-top: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-family: inherit;
            box-shadow: 0 4px 10px rgba(10, 38, 71, 0.2);
        }

        .submit-btn:hover {
            background: #123e64;
            transform: scale(0.98);
        }

        @media (max-width: 560px) {

            .form-header,
            .form-body {
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }

            .form-title {
                font-size: 1.6rem;
            }
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            opacity: 0.5;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body>

    <div class="form-card">
        <div class="form-header">
            <div class="logo-container">
                <img class="logo-image" src="/assets/img/ngsiblack.png" alt="2C2P Secure Logo">
                <span class="brand-badge">secure gateway</span>
            </div>
            <h1 class="form-title">2C2P Payment Form</h1>
            <div class="subhead">Fast & secure transactions</div>
        </div>
        <form action="payment-2c2p" method="POST">
            <div class="form-body">
                <div class="input-group">
                    <label class="input-label" for="email">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 4H20C21.1 4 22 4.9 22 6V18C22 19.1 21.1 20 20 20H4C2.9 20 2 19.1 2 18V6C2 4.9 2.9 4 4 4Z" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M22 6L12 13L2 6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Email address
                    </label>
                    <input type="email" id="email" name="email" class="input-field" placeholder="Enter your email" autocomplete="email">
                    <div class="hint-text">We'll send a receipt here</div>
                    <div class="error-message" id="email-error" style="display: none;"></div>
                </div>

                <div class="input-group">
                    <label class="input-label" for="mobile">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="5" y="2" width="14" height="20" rx="2" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                            <line x1="12" y1="18" x2="12.01" y2="18" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            <line x1="8" y1="6" x2="16" y2="6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                        </svg>
                        Mobile number
                    </label>
                    <input type="tel" id="mobile" name="phone_number" class="input-field" placeholder="Enter your mobile number" autocomplete="tel" maxlength="11" inputmode="numeric">
                    <div class="hint-text">Enter exactly 11 digits starting with 09</div>
                    <div class="error-message" id="mobile-error" style="display: none;"></div>
                </div>

                <div class="input-group">
                    <label class="input-label" for="amount">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <rect x="3" y="6" width="18" height="12" rx="2" stroke="currentColor" stroke-width="1.6" />
                            <circle cx="12" cy="12" r="2.5" stroke="currentColor" stroke-width="1.6" />
                        </svg>
                        Amount (PHP)
                    </label>
                    <div class="amount-wrapper">
                        <span class="currency-symbol">₱</span>
                        <input type="number" id="amount" name="amount" class="input-field" placeholder="0.00" min="1" step="any">
                    </div>
                    <div class="hint-text">Minimum amount ₱1.00 PHP</div>
                    <div class="error-message" id="amount-error" style="display: none;"></div>
                </div>

                <button type="submit" class="submit-btn" id="submitPaymentBtn">
                    <span>Pay securely with 2C2P</span>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 12H19M19 12L13 6M19 12L13 18" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </form>
    </div>

    <script>
        const email = document.getElementById('email');
        const mobile = document.getElementById('mobile');
        const amount = document.getElementById('amount');
        const emailErr = document.getElementById('email-error');
        const mobileErr = document.getElementById('mobile-error');
        const amountErr = document.getElementById('amount-error');

        const setError = (el, errEl, msg) => {
            el.classList.add('error-field');
            errEl.innerText = msg;
            errEl.style.display = 'flex';
        };
        const removeError = (el, errEl) => {
            el.classList.remove('error-field');
            errEl.style.display = 'none';
        };

        const isValidEmail = (v) => /^[^\s@]+@([^\s@]+\.)+[^\s@]+$/.test(v?.trim() || '');
        const isValidMobile = (v) => /^09\d{9}$/.test(v?.trim() || '');
        const isValidAmount = (v) => {
            if (!v || v.toString().trim() === '') return false;
            const num = parseFloat(v);
            return !isNaN(num) && num > 0;
        };

        const validateEmail = () => {
            const val = email.value;
            if (!isValidEmail(val)) {
                setError(email, emailErr, val.trim() === '' ? 'Email cannot be blank' : 'Invalid email format');
                return false;
            }
            removeError(email, emailErr);
            return true;
        };
        const validateMobile = () => {
            const val = mobile.value;
            if (!isValidMobile(val)) {
                if (!val.trim()) setError(mobile, mobileErr, 'Mobile cannot be blank');
                else if (!/^\d{11}$/.test(val.trim())) setError(mobile, mobileErr, 'Must be exactly 11 digits');
                else if (!val.trim().startsWith('09')) setError(mobile, mobileErr, 'Must start with 09');
                else setError(mobile, mobileErr, 'Invalid mobile format');
                return false;
            }
            removeError(mobile, mobileErr);
            return true;
        };
        const validateAmount = () => {
            const val = amount.value;
            if (!isValidAmount(val)) {
                if (!val || val.toString().trim() === '') setError(amount, amountErr, 'Amount cannot be blank');
                else setError(amount, amountErr, 'Amount must be greater than 0');
                return false;
            }
            removeError(amount, amountErr);
            return true;
        };

        const validateForm = () => validateEmail() & validateMobile() & validateAmount();

        const blockNonDigits = (e) => {
            if (e.inputType === 'insertText' && e.data && !/^\d$/.test(e.data)) e.preventDefault();
        };
        const blockPasteNonDigits = (e) => {
            const text = (e.clipboardData || window.clipboardData).getData('text');
            if (!/^\d+$/.test(text)) e.preventDefault();
        };
        const sanitizeDigits = (e) => {
            let val = e.target.value.replace(/\D/g, '').slice(0, 11);
            if (e.target.value !== val) e.target.value = val;
            if (isValidMobile(val)) removeError(mobile, mobileErr);
        };

        const blockAmountNonNumeric = (e) => {
            if (e.inputType === 'insertText' && e.data && /[eE\-+]/.test(e.data)) e.preventDefault();
        };
        const sanitizeAmount = (e) => {
            let val = e.target.value;
            if (val.startsWith('-')) e.target.value = '';
            if (isValidAmount(e.target.value)) removeError(amount, amountErr);
        };

        mobile.addEventListener('beforeinput', blockNonDigits);
        mobile.addEventListener('paste', blockPasteNonDigits);
        mobile.addEventListener('input', sanitizeDigits);
        mobile.addEventListener('blur', validateMobile);

        amount.addEventListener('beforeinput', blockAmountNonNumeric);
        amount.addEventListener('input', sanitizeAmount);
        amount.addEventListener('blur', validateAmount);

        email.addEventListener('blur', validateEmail);
        email.addEventListener('input', () => isValidEmail(email.value) && removeError(email, emailErr));
    </script>
</body>

</html>
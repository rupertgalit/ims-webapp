<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <title>NGSI - Cashout Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <meta property="og:title" content="NetGlobal Solutions, Inc.">
    <meta property="og:description" content="Your trusted IT solutions provider.">
    <meta property="og:image" content="/assets/img/ngsilogo.png">
    <meta property="og:type" content="website">
    <link rel="stylesheet" href="/assets/css/cashoutform.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="responsive-card">
        <div class="card-elevated">
            <div class="header-responsive">
                <div class="logo-container">
                    <img src="/assets/img/ngsi.png" alt="NetGlobal Solutions Logo">
                </div>
            </div>

            <div class="form-container">
                <h2>Cashout Form</h2>
                <div class="subhead-responsive">Enter your details below to process your cashout request.</div>

                <form id="cashoutForm" method="post" action="cashout/do_cashout" novalidate>
                    <div class="form-grid">
                        <div class="row-duo">
                            <div class="field">
                                <label for="company-name">full name <span class="required-mark">*</span></label>
                                <input type="text" id="company-name" name="name" placeholder="Enter your full name" required>
                            </div>
                            <div class="field">
                                <label for="email">email address <span class="required-mark">*</span></label>
                                <input type="email" id="email" name="email" placeholder="your@email.com" required>
                            </div>
                        </div>

                        <div class="full-row">
                            <div class="field">
                                <label for="account-number">account number <span class="required-mark">*</span></label>
                                <input type="text" id="account-number" name="acc-no" placeholder="Enter your account number" required>
                            </div>
                        </div>

                        <div class="full-row">
                            <div class="field">
                                <label for="amount">amount <span class="required-mark">*</span></label>
                                <input type="number" id="amount" name="amount" placeholder="Enter amount" required>
                            </div>
                        </div>

                        <hr class="responsive-divider">

                        <div class="row-duo">
                            <div class="field">
                                <label for="payment-channel">payment channel <span class="required-mark">*</span></label>
                                <select id="payment-channel" name="payment_channel" required>
                                    <option value="" disabled selected>-- Select payment channel --</option>
                                    <option value="PESO-LST-BNK">PESONET</option>
                                    <option value="INSTA-LST-BNK">INSTAPAY</option>

                                </select>
                            </div>
                            <div class="field">
                                <label for="cashout-method">select bank <span class="required-mark">*</span></label>
                                <select id="cashout-method" name="cashout_method" required disabled>
                                    <option value="">-- Select a bank --</option>
                                </select>

                                <div id="bank-loading" style="display:none;">
                                    <i class="fa fa-spinner fa-spin"></i> Loading banks...
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn-cashout" id="submit">
                            Proceed
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script>
    const paymentChannel = document.getElementById("payment-channel");
    const bankDropdown = document.getElementById("cashout-method");

    paymentChannel.addEventListener("change", function() {

        let channel = this.value;

        // show loading inside dropdown
        bankDropdown.innerHTML = '<option value="">Loading banks...</option>';
        bankDropdown.disabled = true;

        fetch("<?= base_url('cashout/channel_list') ?>", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: "payment-channel=" + encodeURIComponent(channel)
            })
            .then(response => response.json())
            .then(data => {

                bankDropdown.innerHTML = '';

                if (data.status) {

                    bankDropdown.innerHTML = '<option value="">-- Select a bank --</option>';

                    data.data.forEach(function(bank) {

                        let option = document.createElement("option");

                        option.value = bank.value;
                        option.textContent = bank.text;

                        bankDropdown.appendChild(option);

                    });

                    bankDropdown.disabled = false;

                } else {

                    bankDropdown.innerHTML = '<option value="">No banks available</option>';

                }

            })
            .catch(error => {

                bankDropdown.innerHTML = '<option value="">Error loading banks</option>';

                console.error(error);

            });

    });
</script>



<script>
    document.addEventListener("DOMContentLoaded", function() {

        const form = document.getElementById("cashoutForm");
        const submitBtn = document.getElementById("submit");

        form.addEventListener("submit", function(e) {

            e.preventDefault();

            let formData = new FormData(form);

            // disable button while processing
            submitBtn.disabled = true;
            submitBtn.innerHTML = "Processing...";

            fetch("<?= base_url('cashout/do_cashout') ?>", {
                    method: "POST",
                    body: formData
                })
                .then(response => {

                    if (!response.ok) {
                        throw new Error("Network response error");
                    }

                    return response.json();
                })
                .then(data => {

                    submitBtn.disabled = false;
                    submitBtn.innerHTML = "Proceed";

                    if (data.status) {

                        Swal.fire({
                            icon: "success",
                            title: "Cashout Request Sent",
                            html: `
                        <div style="text-align:left;font-size:14px">
                            <center><p><b>${data.message}</b></p></center>
                            <hr>

                            <p><b>Reference Number:</b><br>${data.data.reference_number}</p>

                            <p><b>Transaction Reference:</b><br>${data.data.txn_ref}</p>

                            <p><b>Amount:</b><br>₱${parseFloat(data.data.txn_amount).toLocaleString()}</p>

                            <p><b>Date Created:</b><br>${data.data.create_at}</p>
                        </div>
                    `,
                            confirmButtonText: "OK",
                            confirmButtonColor: "#3085d6"
                        });

                        form.reset();

                        // reset bank dropdown
                        const bankDropdown = document.getElementById("cashout-method");
                        bankDropdown.innerHTML = '<option value="">-- Select a bank --</option>';
                        bankDropdown.disabled = true;

                    } else {

                        Swal.fire({
                            icon: "error",
                            title: "Cashout Failed",
                            text: data.message || "Unable to process transaction."
                        });

                    }

                })
                .catch(error => {

                    submitBtn.disabled = false;
                    submitBtn.innerHTML = "Proceed";

                    Swal.fire({
                        icon: "error",
                        title: "Server Error",
                        text: "Something went wrong. Please try again."
                    });

                    console.error(error);

                });

        });

    });
</script>

</html>
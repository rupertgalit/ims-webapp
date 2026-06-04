<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Input Amount</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Bebas+Neue" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/bictform2.css" />
</head>

<body>
    <!-- Main Panel -->
    <div class="main-panel">
        <div class="form-container">
            <div class="payment-frame">

                <!-- Header Section -->
                <div class="container-fluid">
                    <div class="row header-row">
                        <!-- Left Side (Flag) -->
                        <div class="col-3 text-start">
                            <img src="/assets/img/wavingflag.png" alt="Philippine Flag" class="header-flag" />
                        </div>

                        <div class="col-6 header-center">
                            <h2 class="mb-0 fw-bold">
                                THE FRATERNAL ORDER OF
                                <span style="font-family: 'Monotype Corsiva', cursive; font-style: italic;">
                                    Eagles
                                </span>
                            </h2>
                            <p style="font-style: italic;">
                                (Philippine <span style="font-family: 'Monotype Corsiva', cursive; font-style: italic;">
                                    Eagles
                                </span>)
                            </p>
                            <p class="fw-semibold mb-1">
                                First Philippine Born Fraternal Socio-Civic Organization
                            </p>
                            <p class="tagline" style="font-family: 'Monotype Corsiva', cursive; font-style: italic; color: #d9534f; font-weight: bold;">
                                "Service Through Strong Brotherhood"
                            </p>
                        </div>
                        <!-- Right Side (Logo) -->
                        <div class="col-3 text-end">
                            <img src="/assets/img/highresologo.png" alt="Eagle Logo" class="header-logo" />
                        </div>
                    </div>
                </div>

                <hr>

                <!-- QR Code Form -->
                <div class="qr-container">
                    <div class="payment-header">
                        <h2>Payment Portal</h2>
                        <p>Enter your details below to generate a QR code.</p>
                    </div>

                    <form class="form" action="cashin-bict" method="post" style="text-align: left;">

                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label for="company-name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-input form-control" name="name" id="company-name" placeholder="Enter your name" required autofocus />
                            </div>

                            <div class="col-md-6">
                                <label for="mobile-number" class="form-label">
                                    Mobile Number <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-input form-control"
                                    name="mobile-number"
                                    id="mobile-number"
                                    placeholder="Enter mobile number"
                                    maxlength="11"
                                    required />
                                <small id="mobileError" class="text-danger d-none">Please enter a valid 11-digit mobile number starting with 09.</small>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label for="email" class="form-label">
                                Email <span class="text-danger">*</span>
                            </label>
                            <input
                                type="email"
                                class="form-input form-control"
                                name="email"
                                id="email"
                                placeholder="Enter email"
                                required />
                            <small id="emailError" class="text-danger d-none">Please enter a valid email address (e.g. name@example.com).</small>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label for="region" class="form-label">
                                    Region <span class="text-danger">*</span>
                                </label>
                                <select class="form-input" name="region" id="region" required>
                                    <option value="" disabled selected>Select your Region</option>
                                    <option value="National Capital Region 1 (NCR 1)">National Capital Region (NCR 1)</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="club-name" class="form-label">
                                    Club Name <span class="text-danger">*</span>
                                </label>
                                <select class="form-input" name="club-name" id="club-name" required>
                                    <option value="" disabled selected>Select your club</option>
                                    <option value="BARASOAIN ICT EAGLES CLUB">BARASOAIN ICT EAGLES CLUB</option>
                                    <option value="BARASOAIN EAGLES CLUB">BARASOAIN EAGLES CLUB</option>
                                    <option value="BARASOAIN DOS EAGLES CLUB">BARASOAIN DOS EAGLES CLUB</option>
                                    <option value="BARASOAIN TRES DE MANILA EAGLES CLUB">BARASOAIN TRES DE MANILA EAGLES CLUB</option>
                                    <option value="PAYT SANA EAGLES CLUB">PAYT SANA EAGLES CLUB</option>
                                    <option value="EAST MANILA EAGLES CLUB">EAST MANILA EAGLES CLUB</option>
                                    <option value="TANGLAW ALAB EAGLES CLUB">TANGLAW ALAB EAGLES CLUB</option>
                                    <option value="YANO EAGLES CLUB">YANO EAGLES CLUB</option>
                                    <option value="TAGUIG VANGUARD EAGLES CLUB">TAGUIG VANGUARD EAGLES CLUB</option>
                                    <option value="LUZON UNITED CAVALLIERS EAGLES CLUB">LUZON UNITED CAVALLIERS EAGLES CLUB</option>
                                    <option value="EL CABALLERO VALIENTE EAGLES CLUB">EL CABALLERO VALIENTE EAGLES CLUB</option>
                                    <option value="AIR FORCE 1 SPARTAN KNIGHTS EAGLES CLUB">AIR FORCE 1 SPARTAN KNIGHTS EAGLES CLUB</option>
                                    <option value="MANDALUYONG SUPREME EAGLES CLUB">MANDALUYONG SUPREME EAGLES CLUB</option>
                                    <option value="GINTONG BUTIL NG CABANATUAN CITY EAGLES CLUB">GINTONG BUTIL NG CABANATUAN CITY EAGLES CLUB</option>
                                    <option value="GINTONG BUTIL NG KALIKID EAGLES CLUB">GINTONG BUTIL NG KALIKID EAGLES CLUB</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>
                        </div>
                        <div id="other-region-input" class="mt-2" style="display: none;">
                            <label for="custom-region" class="form-label">Please specify your Region <span class="text-danger">*</span></label>
                            <input type="text" class="form-input form-control" name="custom-region" id="custom-region" placeholder="Enter your region" />
                        </div>
                        <div id="other-club-input" class="mt-2" style="display: none;">
                            <label for="custom-club" class="form-label">Please specify your club name <span class="text-danger">*</span></label>
                            <input type="text" class="form-input form-control" name="custom-club" id="custom-club" placeholder="Enter your club name" />
                        </div>

                        <div class="mb-2">
                            <label for="purpose" class="form-label">Purpose of Payment <span class="text-danger">*</span></label>
                            <select class="form-input" name="purpose" id="purpose" required>
                                <option value="">-- Select Purpose --</option>
                                <option value="monthlycontribution">Monthly Contribution</option>
                                <option value="Donation">Donation</option>
                                <option value="Alalayang Agila">Alalayang Agila</option>
                                <option value="Membership renewal"> Membership renewal</option>
                                <option value="Induction"> Induction</option>
                                <option value="Chartering"> Chartering</option>
                                <option value="Orientation"> Orientation</option>
                                <option value="GMM">GMM</option>
                                <option value="Rexecom Assembly">Rexecom Assembly</option>
                                <option value="National Assembly">National Assembly</option>
                                <option value="others">Others</option>
                            </select>
                        </div>
                        <div id="other-purpose-input" class="mt-2" style="display: none;">
                            <label for="custom-purpose" class="form-label">Please specify your purpose of payment <span class="text-danger">*</span></label>
                            <input type="text" class="form-input form-control" name="custom-purpose" id="custom-purpose" placeholder="Enter your purpose of payment" />
                        </div>


                        <hr>

                        <!-- <div class="mb-2">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" class="form-input" name="amount" id="amount" placeholder="Enter amount" />
                        </div> -->

                        <div class="mb-2">
                            <label for="amount" class="form-label">Amount <span class="text-danger">*</span></label>
                            <input
                                type="number"
                                class="form-input form-control"
                                name="amount"
                                id="amount"
                                placeholder="Enter amount"
                                min="1"
                                step="0.01"
                                required
                                onkeydown="if(event.key === 'e' || event.key === 'E' || event.key === '-' ) event.preventDefault()" />

                            <small id="amountError" class="text-danger d-none">
                                Please enter a valid amount greater than 0.
                            </small>
                        </div>
                        <!-- <button class="submit-btn" type="submit" id="submit">Submit</button> -->



                        <button class="submit-btn" type="button" id="previewBtn">Preview</button>

                        <!-- Modal -->
                        <div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content shadow-lg border-0 rounded-3">
                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title" id="previewModalLabel">
                                            <i class="fas fa-file-invoice-dollar me-2"></i> Payment Summary
                                        </h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>


                                    <!-- Modal Body -->
                                    <div class="modal-body">

                                        <!-- Personal Information -->
                                        <h6 class="fw-bold text-secondary mb-3">Personal Information</h6>
                                        <table class="table table-sm align-middle summary-table">
                                            <tbody>
                                                <tr>
                                                    <td class="label">Full Name</td>
                                                    <td id="preview-name" class="value"></td>
                                                </tr>
                                                <tr>
                                                    <td class="label">Mobile</td>
                                                    <td id="preview-mobile" class="value"></td>
                                                </tr>
                                                <tr>
                                                    <td class="label">Email</td>
                                                    <td id="preview-email" class="value"></td>
                                                </tr>
                                                <tr>
                                                    <td class="label">Region</td>
                                                    <td id="preview-region" class="value"></td>
                                                </tr>
                                                <tr>
                                                    <td class="label">Club Name</td>
                                                    <td id="preview-club" class="value"></td>
                                                </tr>
                                                <tr>
                                                    <td class="label">Purpose</td>
                                                    <td id="preview-purpose" class="value"></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <!-- Payment Details -->
                                        <h6 class="fw-bold text-secondary mt-3">Payment Details</h6>
                                        <table class="table table-bordered table-sm align-middle payment-table">
                                            <thead class="table-light">
                                                <tr>
                                                    <th class="desc-col">Description</th>
                                                    <th class="amt-col text-end">Amount (₱)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Amount</td>
                                                    <td id="preview-amount" class="text-end"></td>
                                                </tr>
                                                <tr>
                                                    <td>Fee</td>
                                                    <td id="preview-fee" class="text-end"></td>
                                                </tr>
                                                <tr class="table-primary total-row">
                                                    <td><strong>Total</strong></td>
                                                    <td><strong id="preview-total" class="text-end"></strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">

                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-check-circle me-1"></i> Confirm & Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </form>
                </div>
                <hr>

                <!-- Supported Payments -->
                <div class="qr-container pt-0">
                    <h2>Supported Payments</h2>
                    <img src="/assets/img/payments.png" alt="Supported Payments" class="supportedpayments" />

                    <!-- Powered by section -->
                    <div class="powered-by text-center">
                        <p class="m-0">Powered by:</p>
                        <img src="/assets/img/ngsiblack.png" alt="Powered By NGSI" />
                    </div>
                </div>

            </div>
        </div>
    </div>

    <button class="toggle-chat" id="toggleChat" onclick="toggleChatbox()" aria-label="Toggle chat">
        <div class="toggle-content">
            <i class="fas fa-phone" id="chatIcon"></i>
            <span class="toggle-text">&nbsp;Contact Us</span>
        </div>
    </button>
    <div class="overlay" id="overlay" aria-hidden="true"></div>

    <div class="chatbox" id="chatbox" aria-labelledby="chatboxTitle" role="dialog" aria-modal="true">
        <h4 id="chatboxTitle">Contact Us</h4>
        <p class="contact-info"><strong><i class="fas fa-mobile-alt"></i> Mobile / Viber:</strong><br>
            <a href="tel:+639171486979">09171486979</a><br>
            <a href="tel:+639173126960">09173126960</a>
        </p>
        <p class="contact-info"><strong><i class="fas fa-phone"></i> Landline:</strong><br>
            <a href="tel:+63289526925">+632 89526925</a>
        </p>
        <p class="contact-info"><strong><i class="fab fa-facebook"></i> Facebook Page & Messenger:</strong><br>
            <a href="https://facebook.com/netglobalsolutionsinc" target="_blank" rel="noopener noreferrer">netglobalsolutionsinc</a>
        </p>
        <p class="contact-info"><strong><i class="fas fa-envelope"></i> Email:</strong><br>
            <a href="mailto:Support@netglobalsolutions.net">Support@netglobalsolutions.net</a>
        </p>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function toggleChatbox() {
            const chatbox = document.getElementById('chatbox');
            const overlay = document.getElementById('overlay');
            const chatIcon = document.getElementById('chatIcon');
            const toggleChatButton = document.getElementById('toggleChat');
            const toggleText = toggleChatButton.querySelector('.toggle-text');
            const isVisible = chatbox.classList.contains('visible');

            if (isVisible) {
                chatbox.classList.remove('visible');
                overlay.classList.remove('visible');
                chatIcon.className = 'fas fa-phone';
                toggleChatButton.style.backgroundColor = '';
                toggleChatButton.style.color = '';
                toggleText.style.display = 'block';
                overlay.setAttribute('aria-hidden', 'true');
            } else {
                chatbox.classList.add('visible');
                overlay.classList.add('visible');
                chatIcon.className = 'fas fa-times';
                toggleChatButton.style.backgroundColor = 'red';
                toggleChatButton.style.color = 'white';
                toggleText.style.display = 'none';
                overlay.setAttribute('aria-hidden', 'false');
            }
        }
    </script>



    <script>
        $("#previewBtn").on("click", function() {
            // Validate required fields before showing modal
            if (!$("form.form")[0].checkValidity()) {
                $("form.form")[0].reportValidity();
                return;
            }

            let amount = parseFloat($("#amount").val()) || 0;
            let fee = 20.00;
            let total = amount + fee;

            // Fill modal preview
            $("#preview-name").text($("#company-name").val());
            $("#preview-mobile").text($("#mobile-number").val());
            $("#preview-email").text($("#email").val());
            let regionSelected = $("#region").val();
            let regionText = (regionSelected === "others") ?
                $("#custom-region").val() :
                $("#region option:selected").text();
            $("#preview-region").text(regionText);


            let clubSelected = $("#club-name").val();
            let clubText = (clubSelected === "others") ?
                $("#custom-club").val() :
                $("#club-name option:selected").text();
            $("#preview-club").text(clubText);

            let purposeSelected = $("#purpose").val();
            let purposeText = (purposeSelected === "others") ?
                $("#custom-purpose").val() :
                $("#purpose option:selected").text();
            $("#preview-purpose").text(purposeText);
            $("#preview-amount").text(amount.toFixed(2));
            $("#preview-fee").text(fee.toFixed(2));
            $("#preview-total").text(total.toFixed(2));

            // Show modal
            var previewModal = new bootstrap.Modal(document.getElementById('previewModal'));
            previewModal.show();
        });
    </script>

    <script>
        document.getElementById("mobile-number").addEventListener("input", function() {
            const mobile = this.value.trim();
            const error = document.getElementById("mobileError");

            // Simple check: must be 11 digits and start with 09
            if (/^09\d{9}$/.test(mobile)) {
                this.classList.remove("is-invalid");
                error.classList.add("d-none");
            } else {
                this.classList.add("is-invalid");
                error.classList.remove("d-none");
            }
        });

        document.getElementById("email").addEventListener("input", function() {
            const email = this.value.trim();
            const error = document.getElementById("emailError");

            // Basic email format check
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (emailPattern.test(email)) {
                this.classList.remove("is-invalid");
                error.classList.add("d-none");
            } else {
                this.classList.add("is-invalid");
                error.classList.remove("d-none");
            }
        });

        document.getElementById("amount").addEventListener("input", function() {
            const amount = parseFloat(this.value.trim());
            const error = document.getElementById("amountError");

            // Check if amount is a valid number greater than zero
            if (!isNaN(amount) && amount > 0) {
                this.classList.remove("is-invalid");
                error.classList.add("d-none");
            } else {
                this.classList.add("is-invalid");
                error.classList.remove("d-none");
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const clubSelect = document.getElementById('club-name');
            const otherClubInput = document.getElementById('other-club-input');

            clubSelect.addEventListener('change', function() {
                if (this.value === 'others') {
                    otherClubInput.style.display = 'block';
                    document.getElementById('custom-club').setAttribute('required', 'required');
                } else {
                    otherClubInput.style.display = 'none';
                    document.getElementById('custom-club').removeAttribute('required');
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const purposeSelect = document.getElementById('purpose');
            const otherpurposeInput = document.getElementById('other-purpose-input');

            purposeSelect.addEventListener('change', function() {
                if (this.value === 'others') {
                    otherpurposeInput.style.display = 'block';
                    document.getElementById('custom-purpose').setAttribute('required', 'required');
                } else {
                    otherpurposeInput.style.display = 'none';
                    document.getElementById('custom-purpose').removeAttribute('required');
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const regionSelect = document.getElementById('region');
            const otherregionInput = document.getElementById('other-region-input');

            regionSelect.addEventListener('change', function() {
                if (this.value === 'others') {
                    otherregionInput.style.display = 'block';
                    document.getElementById('custom-region').setAttribute('required', 'required');
                } else {
                    otherregionInput.style.display = 'none';
                    document.getElementById('custom-region').removeAttribute('required');
                }
            });
        });
    </script>


</body>

</html>
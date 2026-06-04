<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New QR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="/assets/css/newqr.css?v=05022025">
    <meta property="og:title" content="NetGlobal Solutions, Inc.">
    <meta property="og:description" content="Your trusted IT solutions provider.">
    <meta property="og:image" content="/assets/img/ngsilogo.png">
    <meta property="og:type" content="website">

    <style>
        .gcash-button {
            background-color: #589de2ff;
            /* GCash blue */
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 12px;
            font-weight: 600;
            border-radius: 50px;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: background-color 0.3s ease;
        }

        .gcash-button:hover {
            background-color: #005fa3;
        }

        .gcash-logo {
            height: 24px;
            width: 24px;
        }

        .note {
            font-size: 12px;
            color: #666;
            margin-top: 8px;
        }

         /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.6);
        }

        .modal-content {
            background-color: #fff;
            margin: auto;
            padding: 20px;
            border-radius: 12px;
            width: 80%;
            max-width: 400px;
            text-align: center;
        }

        .modal-close {
            margin-top: 15px;
            padding: 10px 20px;
            background: #0074cc;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
    </style>

</head>

<body>

    <!-- Main Panel (Donation Form) -->
    <div class="main-panel">
        <div class="form-container" style="background:none; padding:0;">
            <div class="payment-frame">
                <!-- Header -->
                <div class="header">
                    <h2>Scan to Pay</h2>
                    <p>Complete your payment using your e-wallet or bank.</p>
                </div>

                <!-- Timer and USD Amount -->
                <div class="timer-section">
                    <div class="timer-display">
                        <!-- <span class="timer-text" ><b>Reference No.:</b> <span>1234567890</span></span> -->
                    </div>
                    <!-- <div class="usd-amount"> <b>Amount:</b> <span>₱123.12</span> </div> -->
                </div>

                <!-- QR Code -->
                <div class="qr-container">
                    <div class="qr-code" id="content">

                    </div>

                </div>


                <!-- Payment Details -->
                <div class="details-section">
                    <!-- <button style="margin-bottom: 10px;" onclick="downloadReceipt()">Download</button> -->
                    <!-- <a href="gcash://com.mynt.gcash/app" class="gcash-button" id="gcashLink">
                        <img src="/assets/img/gcash-logo.png" alt="GCash Logo" class="gcash-logo">
                        Open GCash App
                    </a>
                    <p class="note">If the app doesn't open, please open GCash manually.</p>
                    <br> -->

                    <!-- Amount Warning -->
                    <div class="alert alert-amber">
                        <svg class="alert-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z" />
                            <line x1="12" y1="9" x2="12" y2="13" />
                            <line x1="12" y1="17" x2="12.01" y2="17" />
                        </svg>
                        <span class="alert-text">After making a payment, please do not close or refresh the <span class="highlight">QR page. </span> Wait for a response indicating success or failure. Once the <span class="highlight">'Payment Confirmation'</span> dialog appears, your payment is confirmed. If it takes too long, please don't hesitate to contact us to verify your payment or for any technical concerns. Thank you!</span>
                    </div>

                    <!-- MODAL -->
                    <div id="desktopModal" class="modal">
                        <div class="modal-content">
                            <h3>GCash App Notice</h3>
                            <p>This link only works on mobile devices with the GCash app installed.</p>
                            <button class="modal-close" onclick="closeModal()">OK</button>
                        </div>
                    </div>


                </div>
                <div class="header">
                    <img src="/assets/img/ngsi.png" height="50px">
                </div>

            </div>


        </div>
        <!-- <img src="/assets/img/"> -->
    </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/assets/js/qrcode-lib/easy.qrcode.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
        var qrcode = new QRCode(document.getElementById("content"), {


            text: "<?= $records['qr'] ?>",

            logo: "/assets/img/qr-logo.png",
            logoWidth: 40,
            logoHeight: 40,
            logoBackgroundColor: 'black',
            logoBackgroundTransparent: true,

        });
    </script>

    <script>
        function callEndpoint() {
            // console.log('test');
            const myHeaders = new Headers();


            const formdata = new FormData();
            formdata.append("refnum", "<?= htmlspecialchars($records['reference_number'], ENT_QUOTES, 'UTF-8') ?>");


            const requestOptions = {
                method: "POST",
                headers: myHeaders,
                body: formdata,
                redirect: "follow"
            };

            fetch("<?= base_url() ?>/check-reference", requestOptions)
                .then((response) => response.json())
                .then((result) => {
                    if (result.payment_status == "CREATED") {
                        console.log('CREATED');

                    } else {
                        console.log(result.redirect_url);
                        window.location.href = result.redirect_url;
                    }

                })

                .catch((error) => console.error(error));

        }

        callEndpoint();

        setInterval(callEndpoint, 5000);
    </script>
    <!-- 
    <script>
        function downloadReceipt() {
            var receiptContent = document.getElementById('content');
            if (!receiptContent) {
                console.error("Receipt content not found!");
                return;
            }

            html2canvas(receiptContent, {
                scale: 2, 
                useCORS: true, 
                backgroundColor: "white", 
                logging: false, 
                letterRendering: true, 
                removeContainer: true, 
                scrollX: 0, 
                scrollY: 0 
            }).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const link = document.createElement('a');
                link.href = imgData;
                link.download = 'PGCAG-Donation-QR.png';
                link.click();
            }).catch(error => {
                console.error("Error generating the receipt image: ", error);
            });
        }
    </script> -->

    <script>
    function isMobile() {
        return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    }

    document.getElementById("gcashLink").addEventListener("click", function(e) {
        if (!isMobile()) {
            e.preventDefault(); 
            document.getElementById("desktopModal").style.display = "block";
        }
    });

    function closeModal() {
        document.getElementById("desktopModal").style.display = "none";
    }
</script>
</body>

</html>
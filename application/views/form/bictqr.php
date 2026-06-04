<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New QR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Bebas+Neue" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/css/bictqr.css">
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

                <!-- QR Code -->
                <div class="qr-container">
                    <div class="qr-code" id="content">

                    </div>

                </div>


                <!-- Payment Details -->
                <div class="details-section">
                    <!-- Amount Warning -->
                    <div class="alert alert-amber">
                        <svg class="alert-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z" />
                            <line x1="12" y1="9" x2="12" y2="13" />
                            <line x1="12" y1="17" x2="12.01" y2="17" />
                        </svg>
                        <span class="alert-text">After making a payment, please do not close or refresh the <span class="highlight">QR page. </span> Wait for a response indicating success or failure. Once the <span class="highlight">'Payment Confirmation'</span> dialog appears, your payment is confirmed. If it takes too long, please don't hesitate to contact us to verify your payment or for any technical concerns. Thank you!</span>
                    </div>

  

                </div>
               <div class="header flex-column">
                    <div class="header-title text-center w-100 mb-3">
                        <h1 class="club-title">Barasoain ICT Eagles Club</h1>
                        <div class="title-underline"></div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center flex-wrap gap-3">
                        <img src="/assets/img/ngsi.png" class="header-logo" />
                        <img src="/assets/img/highresologo.png" class="header-logo" />
                    </div>
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
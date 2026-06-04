<?php 

// $qr="00020101021228760011ph.ppmi.p2m0111OPDVPHM1XXX0315777148000000142041632948137736144390503001520460165303608540515.005802PH5923Netglobal Solutions Inc6013City Of Pasig62460014ph.allbank.p2m052424091105140171139800012488310012ph.ppmi.qrph0111OPDVPHM1XXX630446FE";
date_default_timezone_set('Asia/Manila');
$qr = $records['data']['raw_string'];
$ref_num = $records['data']['txn_ref'];
$currentDateTime = date('Y-m-d H:i:s');





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <title>Generate QR</title>
    <link rel="stylesheet" href="/assets/css/qr.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/assets/js/qrcode-lib/easy.qrcode.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="merchant-name">
            <div class="receipt">
                <div class="receipt__holder">
                    <div class="receipt__paper" id="receiptContent">
                        <div class="receipt__info">
                            <div class="content" id="content">
                                <h6 align="center">Payment&nbsp;Topup</h6>
                                <div id="qrcode" class="receipt__block" style="text-align: center; justify-content:center;">
                                    <!-- QR code will be generated here -->
                                </div>
                                <div class="receipt__block">
                                    <h6>Reference No.:</h6>
                                    <h6 style="word-break:break-all;"><?= $ref_num ?></h6>
                                </div>
                                <div class="receipt__block">
                                    <h6>Amount:</h6>
                                    <h6 style="word-break:break-all;";>₱<?= $amount ?></h6>
                                </div>
                                <div class="receipt__block">
                                    <h6>Date:</h6>
                                    <h6><?= $currentDateTime ?></h6>
                                </div>
                            </div>
                        </div>
                        <div class="receipt__actions is-flex-centered is-print-hidden">
                            <button id="downloadButton" class="button button--action receipt__button" onclick="downloadReceipt()">Download</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="supported-payments">
            <h3>Supported Payments</h3>
            <div class="slider-container">
                <div class="slider-wrapper">
                    <div class="slider-item">
                        <img src="/assets/images/Group 12.png" alt="Payment Method 1">
                    </div>
                    <div class="slider-item">
                        <img src="/assets/images/Group 14.png" alt="Payment Method 3">
                    </div>
                </div>
                <div class="dots-container">

                </div>
            </div>
        </div>
    </div>

    <script src="/assets/js/qr.js"></script>

    <script>
        // Generate QR Code
        var qrcode = new QRCode(document.getElementById("qrcode"), {
            text: "<?php echo $qr; ?>",
            logo: "/assets/images/qr-logo.png",
            logoWidth: 40,
            logoHeight: 40,
            logoBackgroundColor: 'black',
            logoBackgroundTransparent: true,
        });
        function downloadReceipt() {
    html2canvas(document.getElementById('content'), {
        scale: 2,
        useCORS: true,
        backgroundColor: "white",
        logging: true
    }).then(originalCanvas => {
        const padding = 20;
        const widthWithPadding = originalCanvas.width + padding * 2;
        const heightWithPadding = originalCanvas.height + padding * 2;

        const paddedCanvas = document.createElement('canvas');
        paddedCanvas.width = widthWithPadding;
        paddedCanvas.height = heightWithPadding;
        const ctx = paddedCanvas.getContext('2d');

    
        ctx.fillStyle = 'white'; 
        ctx.fillRect(0, 0, widthWithPadding, heightWithPadding);

   
        ctx.drawImage(originalCanvas, padding, padding);

        const imgData = paddedCanvas.toDataURL('image/png');

        const link = document.createElement('a');
        link.href = imgData;
        link.download = 'receipt.png';
        link.click();
    });
}
document.addEventListener('DOMContentLoaded', function() {
            const sliderWrapper = document.querySelector('.slider-wrapper');
            const sliderItems = document.querySelectorAll('.slider-item');
            const dotsContainer = document.querySelector('.dots-container');
            let currentIndex = 0;

            function createDots() {
                sliderItems.forEach((_, index) => {
                    const dot = document.createElement('span');
                    dot.classList.add('dot');
                    if (index === currentIndex) dot.classList.add('active');
                    dot.addEventListener('click', () => showSlide(index));
                    dotsContainer.appendChild(dot);
                });
            }

            function updateDots() {
                const dots = document.querySelectorAll('.dot');
                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentIndex);
                });
            }

            function showSlide(index) {
                if (index >= sliderItems.length) currentIndex = 0;
                else if (index < 0) currentIndex = sliderItems.length - 1;
                else currentIndex = index;
                
                sliderWrapper.style.transform = `translateX(-${currentIndex * 100}%)`;
                updateDots();
            }

            createDots();
            showSlide(currentIndex);

            setInterval(() => {
                showSlide(currentIndex + 1);
            }, 5000); 
        });
    </script>
    
</body>

</html>
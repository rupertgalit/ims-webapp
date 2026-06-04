<?php

date_default_timezone_set('Asia/Manila');
$qr = $data['data']['raw_tring'];
// $qr = "00020101021228760011ph.ppmi.p2m0111OPDVPHM1XXX0315777148000000142041632948137736144390503001520460165303608540515.005802PH5923Netglobal Solutions Inc6013City Of Pasig62460014ph.allbank.p2m052424091105140171139800012488310012ph.ppmi.qrph0111OPDVPHM1XXX630446FE";
$amount = $data['amount'];
$currentDateTime = date('Y-m-d H:i:s');


?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Top-up</title>
    <link rel="stylesheet" href="<?= base_url('/assets/css/form.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/assets/css/qr.css'); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
      <meta property="og:title" content="NetGlobal Solutions, Inc.">
  <meta property="og:description" content="Your trusted IT solutions provider.">
  <meta property="og:image" content="/assets/img/ngsilogo.png">
  <meta property="og:type" content="website">

</head>

<body>
    <div class="watermark tl">for Demo Purpose Only</div>
    <div class="watermark tr">for Demo Purpose Only</div>
    <div class="watermark bl">for Demo Purpose Only</div>
    <div class="watermark br">for Demo Purpose Only</div>
    <div class="form-container">
        <h1 class="title">Payment Top-up</h1>
        <main class="ticket-system">
            <div class="top">
                <div class="printer" />
            </div>
            <div class="receipts-wrapper">
                <div class="receipts">
                    <div class="receipt">
                        <div class="details">
                            <div class="item">
                                <span>Reference No.</span>
                                <h3><?= $ref_num ?></h3>
                            </div>
                            <div class="item">
                                <span>Amount</span>
                                <h3>₱<?= $amount ?></h3>
                            </div>
                            <div class="item">
                                <span>Date & Time</span>
                                <h3><?= $currentDateTime ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="receipt qr-code">
                        <div id="qrcode">

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
<script src="/assets/js/qrcode-lib/easy.qrcode.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script>
    var qrcode = new QRCode(document.getElementById("qrcode"), {
        text: "<?php echo $qr; ?>",
        logo: "/assets/img/qr-logo.png",
        logoWidth: 40,
        logoHeight: 40,
        logoBackgroundColor: 'black',
        logoBackgroundTransparent: true,
    });
</script>

</html>
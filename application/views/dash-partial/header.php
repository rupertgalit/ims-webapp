<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="/assets/img/NGPAY PRIMARY LOGO.png">
  <?php
    if (uri_string() == 'dashboard') {
        $page_title = 'NetGlobal Solutions, Inc. - Dashboard';
    } elseif (uri_string() == 'banks') {
        $page_title = 'NetGlobal Solutions, Inc. - All Bank';
    } elseif (uri_string() == 'cashin') {
        $page_title = 'NetGlobal Solutions, Inc. - Cash In';
    } elseif (uri_string() == 'cashout') {
        $page_title = 'NetGlobal Solutions, Inc. - Cash Out';
    } elseif (uri_string() == 'merchant-settle-table') {
        $page_title = 'NetGlobal Solutions, Inc. - Merchant';
    } elseif (uri_string() == 'client-settle-table') {
        $page_title = 'NetGlobal Solutions, Inc. - Client';
    } elseif (uri_string() == 'list_account') {
        $page_title = 'NetGlobal Solutions, Inc. - List of Account';
    } elseif (uri_string() == 'create_client') {
        $page_title = 'NetGlobal Solutions, Inc. - Create API';
    } elseif (uri_string() == 'list_user') {
        $page_title = 'NetGlobal Solutions, Inc. - List of User';
    } elseif (uri_string() == 'create_user') {
        $page_title = 'NetGlobal Solutions, Inc. - Create User';
    } elseif (uri_string() == 'api-logs') {
        $page_title = 'NetGlobal Solutions, Inc. - API Logs';
    } elseif (uri_string() == 'user-logs') {
        $page_title = 'NetGlobal Solutions, Inc. - User Logs';
    } elseif (uri_string() == 'prefund') {
        $page_title = 'NetGlobal Solutions, Inc. - Prefund';
    } elseif (uri_string() == 'prefund-history') {
        $page_title = 'NetGlobal Solutions, Inc. - Prefund History';
    } elseif (uri_string() == 'bank-deposit') {
        $page_title = 'NetGlobal Solutions, Inc. - Bank Deposit';
    } elseif (uri_string() == 'bank-deposit-history') {
        $page_title = 'NetGlobal Solutions, Inc. - Bank Deposit History';
    }
    ?>

    <title><?= isset($page_title) ? $page_title : 'NetGlobal Solutions, Inc.'; ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
  <meta property="og:title" content="NetGlobal Solutions, Inc.">
  <meta property="og:description" content="Your trusted IT solutions provider.">
  <meta property="og:image" content="/assets/img/ngsilogo.png">
  <meta property="og:type" content="website">

  <!-- CSS Files -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
  <link rel="stylesheet"
    href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../assets/css/plugins.min.css" />
  <link rel="stylesheet" href="../assets/css/kaiadmin.min.css?v=08122025" />
  <link rel="stylesheet" href="../assets/css/style.css?v=09042025" />
  <link rel="stylesheet" href="../assets/css/createaccount.css" />
  <link rel="stylesheet" href="../assets/css/customcolor.css" />
  <link rel="stylesheet" href="../assets/css/loader.css" />
  <link rel="stylesheet" href="../assets/css/dtbuttons.css?v=05272025" />
  <link rel="stylesheet" href="../assets/css/sidebarcolor.css?v=05222025" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/css/demo.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<?php $this->load->view('loader/loader.php'); ?>
<!-- JavaScript to handle hiding loader -->
<script src="/assets/js/loader.js"></script>
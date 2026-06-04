<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>NetGlobal Pay Login</title>
  <link rel="icon" type="image/x-icon" href="/assets/img/NGPAY PRIMARY LOGO.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Placeholder for CSS -->
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
  <link rel="stylesheet" href="<?= base_url("/assets/css/login.css?v=05022025"); ?>">
  <!-- SweetAlert2 CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <meta property="og:title" content="NetGlobal Solutions, Inc.">
  <meta property="og:description" content="Your trusted IT solutions provider.">
  <meta property="og:image" content="/assets/img/ngsilogo.png">
  <meta property="og:type" content="website">

</head>

<body>
  <img class="wave" src="/assets/img/loginbg.png">
  <div class="container">
    <div class="img">
      <img src="/assets/img/netpaylogo.png">
    </div>
    <div class="login-content">

      <form id="loginForm" method="post" action="<?php echo base_url('auth-login') ?>">
        <?php if ($this->session->flashdata('error')): ?>
          <div class="alert alert-danger">
            <?= $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>
        <h2 class="title">Login</h2>
        <div class="input-div one">
          <div class="i">
            <i class="fa fa-user"></i>
          </div>
          <div class="div">
            <input type="text" id="username" class="input" name="username" placeholder="Username" style="box-shadow:0 0 0 40px #fff inset !important; z-index:1" required>
          </div>
        </div>
        <div class="input-div pass">
          <div class="i">
            <i class="fa fa-lock"></i>
          </div>
          <div class="div">
            <input type="password" id="password" class="input" placeholder="Password" name="password" style="box-shadow:0 0 0 40px #fff inset !important; z-index:1" required>
          </div>
        </div>
        <button class="btn" type="submit" id="submit" value="Login">Sign in</button>
        <div class="mobilelogo">
          <img src="/assets/img/netpaylogo.png">
        </div>
      </form>
    </div>
  </div>

  <script>
    const inputs = document.querySelectorAll(".input");

    function addcl() {
      let parent = this.parentNode.parentNode;
      parent.classList.add("focus");
    }

    function remcl() {
      let parent = this.parentNode.parentNode;
      if (this.value == "") {
        parent.classList.remove("focus");
      }
    }
    inputs.forEach(input => {
      input.addEventListener("focus", addcl);
      input.addEventListener("blur", remcl);
    });
  </script>

  <!-- SweetAlert2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

  <script>
    <?php if ($this->session->flashdata('error_message')): ?>
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?php echo $this->session->flashdata('error_message'); ?>',
      });
    <?php endif; ?>

    <?php if ($this->session->flashdata('success_message')): ?>
      Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '<?php echo $this->session->flashdata('success_message'); ?>',
      });
    <?php endif; ?>
  </script>
</body>

</html>
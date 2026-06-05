<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Innovative Solutions | Login</title>
      <link rel="icon" type="image/x-icon" href="/assets/img/innovative_icon.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&display=swap');

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Raleway", sans-serif;
            background: #f5f5f5;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .wrapper {
            width: 100%;
            max-width: 420px;
            background: #fff;
            border-radius: 16px;
            padding: 40px 32px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .logo-container {
            text-align: center;
            margin-bottom: 10px;
        }

        .logo-container img {
            width: 140px;
        }

        .brand-text {
            text-align: center;
            font-size: 14px;
            color: #666;
            margin-top: 6px;
            font-weight: 600;
        }

        .login-form {
            margin-top: 25px;
        }

        .input-container {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        /* INPUT WRAPPER */
        .input-wrapper {
            position: relative;
            width: 100%;
        }

        /* INPUT STYLE */
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 14px 42px 14px 40px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 14px;
            outline: none;
            transition: 0.2s ease;
        }

        input:focus {
            border-color: #42424a;
            box-shadow: 0 0 0 3px rgba(66, 66, 74, 0.12);
        }

        /* LEFT ICON */
        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
            font-size: 14px;
        }

        /* PASSWORD TOGGLE */
        .toggle-password {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #777;
            font-size: 14px;
        }

        .toggle-password:hover {
            color: #333;
        }

        /* BUTTON */
        input[type="submit"] {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(195deg, #42424a, #191919);
            color: #fff;
            font-weight: 700;
            cursor: pointer;
            letter-spacing: 1px;
            transition: 0.25s ease;
        }

        input[type="submit"]:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 25px rgba(25, 25, 25, 0.25);
        }

        /* HIDE EDGE ICONS */
        input[type="password"]::-ms-reveal,
        input[type="password"]::-ms-clear {
            display: none;
        }

        @media (max-width: 480px) {
            .wrapper {
                padding: 28px 20px;
            }

            .logo-container img {
                width: 120px;
            }
        }

        .alert {
            width: 100%;
            margin-bottom: 15px;
        }

        .alert.alert-danger {
            background: #d9534f;
            color: #fff;
            padding: 12px 14px;
            border-radius: 10px;
            font-size: 13px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .close-btn {
            background: transparent;
            border: none;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            opacity: 0.8;
        }

        .close-btn:hover {
            opacity: 1;
        }
    </style>
</head>

<body>

    <div class="wrapper">

        <div class="logo-container">
            <img src="/assets/img/innovative_icon.png" alt="Logo">
            <div class="brand-text">Innovative Solutions Dashboard</div>
        </div>

        <?php if ($this->session->flashdata('error_message')): ?>
          <div class="alert alert-danger">
            <?= $this->session->flashdata('error_message'); ?>
          </div>
        <?php endif; ?>

      <form id="loginForm" method="post" action="<?php echo base_url('auth-login') ?>">

            <div class="input-container">

                <!-- USERNAME -->
                <div class="input-wrapper">
                    <i class="fa-solid fa-user input-icon"></i>
                    <input type="text" name="username" placeholder="Username" required>
                </div>

                <!-- PASSWORD -->
                <div class="input-wrapper">
                    <i class="fa-solid fa-lock input-icon"></i>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
                </div>

                <input type="submit" value="Login">

            </div>

        </form>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const password = document.getElementById('password');
            const toggle = document.getElementById('togglePassword');

            toggle.addEventListener('click', function () {
                const isHidden = password.type === 'password';
                password.type = isHidden ? 'text' : 'password';

                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });

            document.querySelectorAll('.alert .close-btn').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    this.closest('.alert').style.display = 'none';
                });
            });

        });
    </script>

</body>

</html>
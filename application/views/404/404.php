<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 page not found!</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css" />

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Montserrat', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            background:#f8f9fa;
            justify-content: center;
        }

        .error-contain {
            background: #fff;
            width: 100%;
            max-width: 470px;
            border-radius: 16px;
            box-shadow:
        0 4px 6px rgba(0, 0, 0, 0.1),
        0 10px 20px rgba(0, 0, 0, 0.05);
            text-align: center;
            padding: 30px 20px;
            position: relative;
            overflow: hidden;
            animation: fadeIn 0.7s ease;
        }

        .error-text h1 {
            font-size: 100px !important;
            font-family: monospace;
            margin: 0;
            text-shadow: 1px 1px 1px #fff, -1px -1px 1px black;
        }

        .error-text {
            text-align: center;
            font-weight: bold;
            font-family: 'Montserrat', sans-serif;

        }

        .error-text p {
            font-size: 16px;
        }

        .error-text p:nth-child(3) {
            margin-top: 150px;
        }

        .binoculars {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-60%, 20%);
            transition: 1s;
        }

        .binoculars {
            /* 	animation-name: wiggle; */
            animation-duration: 10s;
            animation-delay: 5s;
            animation-iteration-count: infinite;
        }

        .left-bino-lense,
        .right-bino-lense {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            border: 5px solid black;
            display: inline-block;
            transform: skewX(-10deg);
            background: white;
            overflow: hidden;
            position: relative;
        }

        .left-bino-lense {
            margin-right: 10px;
        }

        .left-bino-lense::before,
        .right-bino-lense::before {
            width: 20px;
            height: 20px;
            content: '';
            display: block;
            background: black;
            position: absolute;
            border: 3px solid #3066c9;
            border-radius: 50%;
            top: 50%;
            left: 50%;
            transform: translate(-70%, -55%);
            animation-name: eye-move;
            animation-duration: 6s;
            animation-iteration-count: infinite;
            animation-timing-function: ease-in-out;
            animation-delay: 3s;
        }

        .back-bino {
            width: 70px;
            height: 30px;
            background: black;
            position: absolute;
            top: 23px;
            left: 40px;
        }

        .left-bino,
        .right-bino {
            position: absolute;
            height: 100px;
            width: 80px;
            perspective: 80px;
            transform: rotate(100deg);
            right: -25px;
            top: 1px;
        }

        .right-bino {
            left: -1px;
        }

        .left-bino::after,
        .right-bino::after {
            content: '';
            padding: 21px;
            padding-top: 45px;
            position: absolute;
            border: 1px solid black;
            background: black;
            transform-style: preserve-3d;
            transform: rotateX(30deg);
            border-radius: 30% 80% 0 0;
            left: 1px;
            top: -4px;
        }

        .left-bino-lense .eye {
            width: 100%;
            height: 100%;
        }

        .eye::before,
        .eye::after {
            content: '';
            display: block;
            width: 45px;
            height: 26px;
            background: #f5cd8c;
            position: absolute;
            transition: 1s;
        }

        .eye::before {
            border-radius: 50% 50% 0 0;
            border-bottom: 2px solid #b88c44;
            top: -30px;
            animation-name: eye-up;
            animation-duration: 3s;
            animation-iteration-count: infinite;
        }

        .eye::after {
            border-radius: 0 0 50% 50%;
            border-top: 2px solid #b88c44;
            bottom: -30px;
            animation-name: eye-down;
            animation-duration: 3s;
            animation-iteration-count: infinite;
        }

        .binoculars:hover .eye::after {
            bottom: -30px;
        }

        .binoculars:hover .eye::before {
            top: -30px;
        }

        @keyframes eye-up {
            0% {
                top: -30px;
            }

            50% {
                top: -30px;
            }

            55% {
                top: -5px;
            }

            60% {
                top: -30px;
            }
        }

        @keyframes eye-down {
            0% {
                bottom: -30px;
            }

            50% {
                bottom: -30px;
            }

            55% {
                bottom: -3px;
            }

            60% {
                bottom: -30px;
            }
        }

        @keyframes wiggle {
            0% {
                transform: translate(-50%, -20%);
            }

            10% {
                transform: skew(-20deg) translate(-50%, -20%) rotate(20deg);
            }

            30% {
                transform: skew(20deg) translate(-50%, -20%) rotate(-20deg);
            }

            40% {
                transform: translate(-50%, -20%);
            }

            50% {}
        }

        @keyframes eye-move {
            0% {
                transform: translate(-70%, -55%);
            }

            10% {
                transform: translate(-90%, -90%);
            }

            20% {
                transform: translate(-60%, -110%);
            }

            30% {
                transform: translate(-20%, -20%);
            }

            40% {
                transform: translate(-60%, -0%);
            }

            50% {
                transform: translate(-70%, -55%);
            }
        }

        .btn-container {
            display: flex;
            margin-top: 20px;
            gap: 10px;
        }

        button {
            width: 100%;
            font-weight: bold;
            background: #05113b;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 12px;
            font-size: 15px;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        button:hover {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #05113b;
            transform: translateY(-2px);
        }
        @keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

    </style>
</head>

<body>

    <div class="error-contain">
        <div class="error-text">
            <h1>404</h1>
            <p>Oops! This page doesn’t exist.</p>
            <p>We looked everywhere, but couldn’t find what you’re looking for.</p>

        </div>
        <div class="btn-container">
            <!-- <button onclick="redirectNow()"><i class="mdi mdi-arrow-left-bold"></i> Back to Homepage</button> -->
        </div>
        <div class="binoculars">
            <div class="back-bino"></div>
            <div class="left-bino"></div>
            <div class="right-bino"></div>
            <div class="left-bino-lense">
                <div class="eye"></div>
            </div>
            <div class="right-bino-lense">
                <div class="eye"></div>
            </div>
        </div>
    </div>


    <script>
    function redirectNow() {
        window.location.href = "/";
    }
</script>

</body>

</html>
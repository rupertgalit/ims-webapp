<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Barasoain ICT Eagles Club Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Bebas+Neue" rel="stylesheet" />
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }

        .header {
            background-color: #03060b;
            color: white;
            padding: 2rem 1rem 1rem;
            text-align: center;
        }

        .club-title {
            font-family: "Bebas Neue", sans-serif;
            font-size: 2.2rem;
            color: #f5ce0d;
            text-transform: uppercase;
            margin-bottom: 0.5rem;
        }

        .title-underline {
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, #f5ce0d, #ffc107);
            margin: 0 auto 1rem;
            border-radius: 2px;
        }

        .header-logos {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .header-logo {
            max-height: 90px;
            width: auto;
            object-fit: contain;
        }

        .event-sidebar {
            background: white;
            border-left: 5px solid #f5ce0d;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }


        .event-sidebar h5 {
            font-weight: bold;
            margin-top: 1rem;
        }

        .form-box {
            background: white;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        }

        .form-input {
            margin-bottom: 1rem;
        }

        .submit-btn {
            background-color: #f5ce0d;
            color: #03060b;
            font-weight: bold;
            text-transform: uppercase;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
        }

        /* Marquee styling */
        .marquee-container {
            overflow: hidden;
            white-space: nowrap;
            margin-top: 2rem;
        }

        .marquee {
            display: inline-flex;
            gap: 2rem;
            animation: scroll-left 50s linear infinite;
        }

        .marquee img {
            height: 40px;
            object-fit: contain;
        }

        @keyframes scroll-left {
            0% {
                transform: translateX(0%);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .marquee.reverse {
            animation: scroll-right 50s linear infinite;
        }

        @keyframes scroll-right {
            0% {
                transform: translateX(-50%);
            }

            100% {
                transform: translateX(0%);
            }
        }

        @media (max-width: 768px) {
            .row {
                flex-direction: column-reverse;
            }

            .header-logo {
                max-height: 60px;
            }
        }
    </style>
</head>

<body>

    <!-- Header -->
    <div class="header">
        <h1 class="club-title">Barasoain ICT Eagles Club</h1>
        <div class="title-underline"></div>
        <div class="header-logos">
            <img src="/assets/img/ngsi.png" alt="NGSI Logo" class="header-logo" />
            <img src="/assets/img/highresologo.png" alt="HighResO Logo" class="header-logo" />
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mt-4">
        <div class="row g-4">
            <!-- Sidebar -->
            <div class="col-md-4">
                <div class="event-sidebar">
                    <h5 class="text-primary fw-bold mb-2" style="font-size: 1.2rem;">📅 Event Details</h5>

                    <div class="mb-3" style="font-size: 0.9rem; line-height: 1.4;">
                        <p class="mb-1"><strong>📌 What:</strong><br><span class="text-muted">Membership Orientation</span></p>
                        <p class="mb-1"><strong>👥 Who:</strong><br><span class="text-muted">Eagle Aspirants</span></p>
                        <p class="mb-1"><strong>🕒 When:</strong><br><span class="text-muted">October 1, 2025<br>1:00 PM – 6:00 PM</span></p>
                        <p class="mb-1"><strong>📍 Where:</strong><br>
                            <span class="text-muted">Ace Hotel & Suites,<br>
                                United Street, Brgy. Kapitolyo,<br>
                                Pasig City, Metro Manila 1603</span><br>
                            <span>📞 <a href="tel:+6386281888" class="text-decoration-none text-dark" style="font-size: 0.9rem;">+63 8628-1888</a></span>
                        </p>
                    </div>

                    <h5 class="text-primary fw-bold mb-2" style="font-size: 1.2rem;">🗂 Agenda</h5>
                    <ol class="ps-3 text-muted" style="font-size: 0.85rem; line-height: 1.4;">
                        <li><strong>1:00–2:00 PM:</strong> Registration</li>
                        <li><strong>2:00–2:10 PM:</strong> Opening Remarks</li>
                        <li><strong>2:10–2:20 PM:</strong> Officer Introduction</li>
                        <li><strong>2:20–2:30 PM:</strong> Club Activities Presentation</li>
                        <li><strong>2:30–2:35 PM:</strong> Message from Founding President</li>
                        <li><strong>2:35–2:40 PM:</strong> Message from Regional Governor</li>
                        <li><strong>2:40–6:00 PM:</strong> Orientation Proper</li>
                        <li><strong>6:00–6:15 PM:</strong> Open Forum & Closing</li>
                        <li><strong>6:15–6:30 PM:</strong> Photo Ops</li>
                        <li><strong>6:30 PM onward:</strong> Fellowship & Cocktails</li>
                    </ol>
                </div>


            </div>

            <!-- Form -->
            <div class="col-md-8">
                <div class="form-box">
                    <h4 class="mb-3 text-center">Registration Payment</h4>
                    <form action="cashin-bict" method="post">
                        <div class="form-input">
                            <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-input">
                            <label for="mobile-number" class="form-label">Mobile Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="mobile-number" name="mobile-number" required="" maxlength="11" inputmode="numeric" pattern="09\d{9}" title="Phone number must start with 09 and be 11 digits long" oninput="this.value = this.value.replace(/\D/g, '');">
                        </div>
                        <div class="form-input">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-input">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" class="form-control" id="amount" name="amount" value="2500" readonly style="background:#f0f0f0; cursor: not-allowed;">
                        </div>
                        <button type="submit" class="submit-btn">Submit</button>
                    </form>

                    <h4 class="mt-4 mb-2 text-center">Supported Payments</h6>
                        <!-- Marquee Section 1 -->
                        <div class="marquee-container">
                            <div class="marquee">
                                <img src="/assets/img/1-01.png"> <img src="/assets/img/1-02.png"> <img src="/assets/img/1-03.png"> <img src="/assets/img/1-04.png"> <img src="/assets/img/1-05.png"> <img src="/assets/img/1-06.png"> <img src="/assets/img/1-07.png"> <img src="/assets/img/1-08.png"> <img src="/assets/img/1-09.png"> <img src="/assets/img/1-10.png"> <img src="/assets/img/1-11.png"> <img src="/assets/img/1-12.png"> <img src="/assets/img/1-13.png"> <img src="/assets/img/1-14.png"> <img src="/assets/img/1-15.png"> <img src="/assets/img/1-16.png"> <img src="/assets/img/1-17.png"> <img src="/assets/img/1-18.png">
                                <!-- Duplicate for smooth scroll -->
                                <img src="/assets/img/1-01.png"> <img src="/assets/img/1-02.png"> <img src="/assets/img/1-03.png"> <img src="/assets/img/1-04.png"> <img src="/assets/img/1-05.png"> <img src="/assets/img/1-06.png"> <img src="/assets/img/1-07.png"> <img src="/assets/img/1-08.png"> <img src="/assets/img/1-09.png"> <img src="/assets/img/1-10.png"> <img src="/assets/img/1-11.png"> <img src="/assets/img/1-12.png"> <img src="/assets/img/1-13.png"> <img src="/assets/img/1-14.png"> <img src="/assets/img/1-15.png"> <img src="/assets/img/1-16.png"> <img src="/assets/img/1-17.png"> <img src="/assets/img/1-18.png">
                            </div>
                        </div>

                        <!-- Marquee Section 2 -->
                        <div class="marquee-container">
                            <div class="marquee reverse">
                                <img src="/assets/img/1-19.png"> <img src="/assets/img/1-20.png"> <img src="/assets/img/1-21.png"> <img src="/assets/img/1-22.png"> <img src="/assets/img/1-23.png"> <img src="/assets/img/1-24.png"> <img src="/assets/img/1-25.png"> <img src="/assets/img/1-26.png"> <img src="/assets/img/1-27.png"> <img src="/assets/img/1-28.png"> <img src="/assets/img/1-29.png"> <img src="/assets/img/1-30.png"> <img src="/assets/img/1-32.png"> <img src="/assets/img/1-33.png"> <img src="/assets/img/1-34.png"> <img src="/assets/img/1-35.png"> <img src="/assets/img/1-36.png">
                                <img src="/assets/img/1-19.png"> <img src="/assets/img/1-20.png"> <img src="/assets/img/1-21.png"> <img src="/assets/img/1-22.png"> <img src="/assets/img/1-23.png"> <img src="/assets/img/1-24.png"> <img src="/assets/img/1-25.png"> <img src="/assets/img/1-26.png"> <img src="/assets/img/1-27.png"> <img src="/assets/img/1-28.png"> <img src="/assets/img/1-29.png"> <img src="/assets/img/1-30.png"> <img src="/assets/img/1-32.png"> <img src="/assets/img/1-33.png"> <img src="/assets/img/1-34.png"> <img src="/assets/img/1-35.png"> <img src="/assets/img/1-36.png">
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <title>GEO Technical</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap");

        :root {
            --primary-color: #f3eae5;
            --text-dark: #2c2724;
            --white: #ffffff;
            --max-width: 1200px;
        }

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .btn {
            outline: none;
            border: none;
            transition: 0.3s;
            cursor: pointer;
        }

        img {
            display: flex;
            width: 100%;
        }

        a {
            text-decoration: none;
            transition: 0.3s;
        }

        body {
            font-family: "Montserrat", sans-serif;
        }
        

        nav {
            position: fixed;
            isolation: isolate;
            width: 100%;
            z-index: 9;
        }

        .nav__header {
            padding: 1rem;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: var(--text-dark);
        }

        .nav__logo a {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--white);
        }

        .nav__menu__btn {
            font-size: 1.5rem;
            color: var(--white);
            cursor: pointer;
        }

        .nav__links {
            position: absolute;
            top: 60px;
            left: 0;
            width: 100%;
            padding: 2rem;
            list-style: none;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 2rem;
            background-color: var(--text-dark);
            transition: 0.5s;
            z-index: -1;
            transform: translateY(-100%);
        }

        .nav__links.open {
            transform: translateY(0);
        }

        .nav__links a {
            font-weight: 600;
            color: var(--primary-color);
        }

        .nav__links a:hover {
            color: var(--white);
        }

        .nav__btns {
            display: none;
        }

        .container {
            max-width: var(--max-width);
            margin: auto;
            padding: 5rem 0;
            position: relative;
            isolation: isolate;
            display: grid;
            gap: 2rem;
            overflow: hidden;
        }

        .container__left {
            padding-inline: 1rem;
            text-align: center;
        }

        .container__left h1 {
            margin-bottom: 2rem;
            font-size: 3.5rem;
            font-weight: 700;
            line-height: 4.5rem;
            color: var(--text-dark);
        }

        .container__left .btn {
            padding: 1rem 2rem;
            letter-spacing: 2px;
            color: var(--white);
            background-color: var(--text-dark);
            border-radius: 5rem;
        }

        .container__left .btn:hover {
            color: var(--text-dark);
            background-color: var(--primary-color);
        }

        .container__right {
            position: relative;
            isolation: isolate;
            display: grid;
            gap: 2rem;
        }

        .container__right::before {
            position: absolute;
            content: "";
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            transform-origin: left;
            height: 80%;
            background-color: var(--primary-color);
            border-radius: 1rem;
            z-index: -1;

            animation: show 0.75s 1.25s ease-in-out forwards;
        }

        @keyframes show {
            0% {
                width: 0;
            }

            100% {
                width: calc(100% - 2rem);
            }
        }

        .images {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .tent-1 {
            max-width: 300px;
            transform: translateX(1rem);
            border-radius: 1rem;
            box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.2);
        }

        .tent-2 {
            max-width: 180px;
            transform: translateX(-1rem);
            border-radius: 1rem;
            box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.2);
        }

        .content {
            padding-block: 0 5rem;
            padding-inline: 2rem;
            text-align: center;
        }

        .content h4 {
            margin-bottom: 1rem;
            font-size: 1rem;
            font-weight: 500;
            color: var(--text-dark);
        }

        .content h2 {
            margin-bottom: 0.5rem;
            font-size: 2rem;
            font-weight: 700;
            letter-spacing: 2px;
            color: var(--text-dark);
        }

        .content h3 {
            margin-bottom: 1rem;
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .content p {
            line-height: 1.75rem;
            color: var(--text-dark);
        }

        .location {
            position: absolute;
            left: 1rem;
            bottom: 1rem;
            padding: 1rem 2rem 1rem 1rem;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-dark);
            background-color: var(--primary-color);
            border: 10px solid var(--white);
            border-bottom: none;
        }

        .location span {
            padding: 5px 10px;
            font-size: 1.5rem;
            color: var(--text-dark);
            background-color: var(--white);
            border-radius: 10px;
        }

        .socials {
            position: absolute;
            bottom: 1rem;
            right: 1rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .socials a {
            font-size: 1.25rem;
            color: var(--text-dark);
        }

        .nav-logo{
            width: 130px;
        }

        @media (width > 768px) {
            nav {
                position: static;
                padding: 2rem 1rem;
                max-width: var(--max-width);
                margin-inline: auto;
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 2rem;
            }

            .nav__header {
                flex: 1;
                padding: 0;
                background-color: transparent;
            }

            .nav__logo a {
                color: var(--text-dark);
            }

            .nav__menu__btn {
                display: none;
            }

            .nav__links {
                position: static;
                padding: 0;
                padding-left: 19rem;
                flex-direction: row;
                background-color: transparent;
                transform: none;
            }

            .nav__links a,
            .nav__links a:hover {
                color: var(--text-dark);
            }

            .nav__btns {
                flex: 1;
                display: flex;
                align-items: center;
                gap: 1rem;
            }

            .nav__btns .btn {
                font-size: 1.5rem;
                color: var(--text-dark);
                background-color: transparent;
            }

            .container {
                grid-template-columns: 2fr 3fr;
                align-items: center;
                padding: 2rem 0;
            }

            .container__left {
                text-align: left;
            }
        }

        @media (width > 1024px) {
            .container__right {
                grid-template-columns: 1fr 2fr;
                align-items: center;
            }

            .container__right::before {
                bottom: unset;
                top: 0;
                height: 90%;
            }

            .images {
                flex-direction: column;
            }

            .tent-1 {
                width: calc(100% + 10rem);
                max-width: 325px;
                transform: translate(-2rem, 2rem);
            }

            .tent-2 {
                max-width: 200px;
                transform: translate(4rem, -1rem);
            }

            .content {
                padding-block: 5rem;
                text-align: left;
                max-width: 400px;
                margin-inline-start: unset;
            }

            .nav-button {
                background-color: #EA7831;
                color: white;
                border: none;
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
                border-radius: 4px;
            }

            .nav-button:hover {
                background-color:  #E3A02C;
            }


        }

        /* footer */

        .footer {
                background-color: #192a36;
                color: #ffffff;
                padding: 2rem 0;
                font-family: "Montserrat", sans-serif;
            }

            .footer-container {
                display: flex;
                justify-content: space-between;
                max-width: var(--max-width);
                margin: auto;
                padding: 0 1rem; 
            }

            .footer-left {
                display: flex;
                flex-direction: column;
                max-width: 300px;
                margin-right: auto; 
                padding-left: 1rem; 
            }

            .footer-logo-container {
                display: flex;
                align-items: center;
                margin-bottom: 1rem;
            }

            .footer-logo {
                max-width: 28px;
                margin-right: 1rem;
            }

            .footer-logo-container h1 {
                font-size: 1.25rem;
                font-weight: 700;
                margin: 0;
            }

            .footer-left p {
                font-size: 0.875rem;
                margin: 0;
                line-height: 1.5;
            }

            .footer-right {
                display: flex;
                justify-content: space-between;
                flex: 1;
                margin-left: 18rem; 
            }

            .footer-column {
                margin-left: 1rem; 
            }

            .footer-column ul {
                list-style: none;
                padding: 0;
                margin: 0;
                display: flex;
                flex-direction: column;
                gap: 0.5rem;
            }

            .footer-column ul li {
                margin-bottom: 0.5rem;
                font-size: 0.875rem;
            }

            .footer-column ul li a {
                color: #ffffff;
                text-decoration: none;
                transition: 0.3s;
            }

            .footer-column ul li a:hover {
                color: #E3A02C;
            }

            .footer-column ul li a i {
                font-size: 1.25rem;
                vertical-align: middle;
            }

            .footer-column.social {
                display: flex;
                flex-direction: column;
            }

            .footer-column.social .social-title {
                margin-bottom: 0.5rem; 
            }

            .footer-column.social .social-icons {
                display: flex;
                gap: 1rem; 
            }

            .footer-column.social .social-icons a {
                color: #ffffff;
                background-color: #192a36; 
                border-radius: 50%; 
                padding: 10px; 
                display: inline-flex; 
                align-items: center;
                justify-content: center;
                width: 40px; 
                height: 40px;
                transition: background-color 0.3s, color 0.3s;
            }

            .footer-column.social .social-icons a:hover {
                background-color: #E3A02C; 
                color: #ffffff; 
            }

            .footer-bottom {
                display: flex;
                justify-content: space-between;
                align-items: center;
                border-top: 1px solid #ffffff;
                padding-top: 1rem;
                padding-left: 4rem;
                padding-right: 3rem;
                margin-top: 1rem;
                font-size: 0.875rem;
            }

            .footer-bottom .links {
                display: flex;
                gap: 1rem; 
            }

            .footer-bottom .links a {
                color: #ffffff;
                text-decoration: none;
                margin-right: 1rem; 
                transition: 0.3s;
            }

            .footer-bottom .links a:hover {
                color: #E3A02C;
            }

            .footer-bottom p {
                margin: 0;
            }

             /* New CSS styles */
        :root {
            --primary-color: #FF6600;
            --background-color: #FFFFFF;
            --text-color: #262D59;
            --accent-color: #FF6600;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
        }

        .container-text {
            width: 80%;
            margin: 0 auto;
        }

        .hero {
            display: flex;
            align-items: center;
            height: 100vh;
            text-align: left;
        }

        .hero-text {
            max-width: 600px;
            padding-bottom: 204px;
        }

        .hero-text h1 {
            font-size: 3em;
        }

        .hero-text h1 span {
            color: var(--accent-color);
        }

        .hero-text p {
            margin: 20px 0;
            line-height: 1.5;
        }

        .hero-buttons {
            display: flex;
            gap: 20px;
        }

        .btn-primary, .btn-secondary {
            padding: 10px 20px;
            text-decoration: none;
            color: var(--text-color);
            border-radius: 5px;
        }

        .btn-primary {
            background-color: var(--primary-color);
        }

        .btn-secondary {
            background-color: transparent;
            border: 2px solid var(--primary-color);
        }

        @media (max-width: 768px) {
            .hero {
                text-align: center;
                padding: 0 20px;
            }

            .hero-text {
                margin: 0 auto;
            }

            .hero-buttons {
                flex-direction: column;
                gap: 10px;
            }
        }

        .btn-primary:hover {
        background-color: #E35500; /* Adjust the color as needed */
        color: var(--white);
        }

        .btn-secondary:hover {
            background-color: var(--primary-color);
            color: var(--white);
            border-color: #E35500; /* Adjust the color as needed */
        }

    </style>
</head>

<body>
    <nav>
        <div class="nav__header">
            <img src="image/geo.png" alt="Melbourne Geotechnical Logo" class="nav-logo">
            <div class="nav__menu__btn" id="menu-btn">
                <i class="ri-menu-line"></i>
            </div>
        </div>
        <ul class="nav__links" id="nav-links">
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="#">Service</a></li>
            <li><a href="{{ route('estimation') }}">Estimate</a></li>
            <li><a href="{{ route('contact') }}">Contact Us</a></li>
            <li><button class="nav-button" onclick="location.href='{{ route('login') }}'">Job Operation</button></li>
            <li><button class="nav-button" onclick="location.href='{{ route('admin_login') }}'">Admin</button></li>
        </ul>

    </nav>

    <!-- New content -->
    <div class="hero">
        <div class="container-text">
            <div class="hero-text">
                <h1>pppppppppppp <span>your</span> decisions with geographic insights</h1>
                <p>Lorem ipsum dolor sit amet consectetur. Nullam lacus dictum tristique nulla amet at suspendisse felis ullamcorper. Cursus turpis tellus neque feugiat neque massa.</p>
                <div class="hero-buttons">
                    <a href="#" class="btn-primary">Join with Us</a>
                    <a href="#" class="btn-secondary">Get an Estimate</a>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-left">
                <div class="footer-logo-container">
                    <img src="image/Asset_5.png" alt="Melbourne Geotechnical Logo" class="footer-logo">
                    <h1>Melbourne Geotechnical</h1>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum in mauris ut tellus ultrices eleifend. Proin nec leo nec risus.</p>
            </div>
            <div class="footer-right">
                <div class="footer-column">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Our Services</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Portfolio</a></li>
                        <li><a href="#">Get An Estimate</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <ul>
                        <li><a href="#">Contacts</a></li>
                        <li>+1 601-201-5580</li>
                        <li><a href="mailto:sampleemail">sampleemail</a></li>
                        <li>Sample Address</li>
                        <li><a href="#">Driving directions</a></li>
                    </ul>
                </div>
                <div class="footer-column social">
        <div class="social-title">Social</div>
        <div class="social-icons">
            <a href="#"><i class="ri-facebook-fill"></i></a>
            <a href="#"><i class="ri-twitter-fill"></i></a>
            <a href="#"><i class="ri-linkedin-fill"></i></a>
            <a href="#"><i class="ri-instagram-fill"></i></a>
        </div>
        </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="links">
                <a href="#">Privacy policy</a>
                <a href="#">Terms of use</a>
            </div>
            <p>© 2022 All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="main.js"></script>
    <script>
        const menuBtn = document.getElementById("menu-btn");
        const navLinks = document.getElementById("nav-links");
        const menuBtnIcon = menuBtn.querySelector("i");

        menuBtn.addEventListener("click", (e) => {
            navLinks.classList.toggle("open");

            const isOpen = navLinks.classList.contains("open");
            menuBtnIcon.setAttribute("class", isOpen ? "ri-close-line" : "ri-menu-line");
        });

        navLinks.addEventListener("click", (e) => {
            navLinks.classList.remove("open");
            menuBtnIcon.setAttribute("class", "ri-menu-line");
        });

        const scrollRevealOption = {
            distance: "50px",
            origin: "bottom",
            duration: 1000,
        };

        ScrollReveal().reveal(".container__left h1", {
            ...scrollRevealOption,
        });
        ScrollReveal().reveal(".container__left .container__btn", {
            ...scrollRevealOption,
            delay: 500,
        });

        ScrollReveal().reveal(".container__right h4", {
            ...scrollRevealOption,
            delay: 2000,
        });
        ScrollReveal().reveal(".container__right h2", {
            ...scrollRevealOption,
            delay: 2500,
        });
        ScrollReveal().reveal(".container__right h3", {
            ...scrollRevealOption,
            delay: 3000,
        });
        ScrollReveal().reveal(".container__right p", {
            ...scrollRevealOption,
            delay: 3500,
        });

        ScrollReveal().reveal(".container__right .tent-1", {
            duration: 1000,
            delay: 4000,
        });
        ScrollReveal().reveal(".container__right .tent-2", {
            duration: 1000,
            delay: 4500,
        });

        ScrollReveal().reveal(".location", {
            ...scrollRevealOption,
            origin: "left",
            delay: 5000,
        });

        ScrollReveal().reveal(".socials span", {
            ...scrollRevealOption,
            origin: "top",
            delay: 5500,
            interval: 500,
        });
    </script>
</body>

</html>

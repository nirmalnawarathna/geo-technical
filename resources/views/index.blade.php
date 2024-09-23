<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>MELBOURNE GEOTECHNICAL</title>
  <meta name="description" content="Discover the the power of AI 
              driven  ground data analysis 
              to achieve unmatched 
              precision in your projects. Our 
              advanced geo-database and 
              mapping software provides 
              location based insights to 
              help you make informed 
              decisions .">
  <meta name="keywords" content="geotechnical, site investigations, soil testing, Melbourne, engineers">
  <link rel="icon" href="image/new/favicon.ico" type="image/x-icon">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="css/style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cuprum:wght@500;600;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <!-- 
    - preload images
  -->
  <link rel="preload" as="image" href="./assets/images/hero-banner.png">

  {{-- about us --}}
  <style>
              
            :root {

            /**
            * colors
            */

            --rich-black-fogra-29-1: hsl(215, 31%, 14%);
            --rich-black-fogra-29-2: hsl(230, 14%, 8%);
            --rich-black-fogra-39: hsl(158, 29%, 5%);
            --granite-gray: hsl(0, 0%, 40%);
            --go-green_50: hsla(145, 63%, 42%, 0.5);
            --go-green_8: hsla(145, 63%, 42%, 0.08);
            --go-green_5: hsla(145, 63%, 42%, 0.05);
            --light-gray: hsl(0, 0%, 80%);
            --mint-cream: hsl(258, 100%, 98%);
            --cultured: hsl(0, 0%, 93%);
            /* --go-green: hsl(145, 63%, 42%); */
            --go-green: #EA7831;
            --white: hsl(0, 0%, 100%);
            --jet: hsl(0, 0%, 18%);

            /**
            * typography
            */

            --ff-poppins: 'Poppins', sans-serif;
            --ff-cuprum: 'Montserrat', sans-serif;

            --fs-1: 4.5rem;
            --fs-2: 3.6rem;
            --fs-3: 3.5rem;
            --fs-4: 3.2rem;
            --fs-5: 2.5rem;
            --fs-6: 2.4rem;
            --fs-7: 2.2rem;
            --fs-8: 2rem;
            --fs-9: 1.8rem;
            --fs-10: 1.5rem;
            --fs-11: 1.4rem;
            --fs-12: 1.3rem;

            --fw-600: 600;
            --fw-500: 500;

            /**
            * spacing
            */

            --section-padding: 80px;

            /**
            * shadow
            */

            --shadow-1: 3px 4px 30px hsla(0, 0%, 53%, 0.1);
            --shadow-2: 5px 3px 40px hsla(191, 100%, 17%, 0.1);

            /**
            * radius
            */

            --radius-5: 5px;

            /**
            * transition
            */

            --transition-1: 0.25s ease;
            --transition-2: 0.5s ease;
            --cubic-out: cubic-bezier(0.33, 0.85, 0.4, 0.96);

            }

            /*-----------------------------------*\
            #RESET
            \*-----------------------------------*/

            *,
            *::before,
            *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            }

            li { list-style: none; }

            a {
            color: inherit;
            text-decoration: none;
            }

            a,
            img,
            span,
            input,
            button,
            ion-icon { 
              display: block; 
              text-decoration: none;
            }

            img { height: auto; }

            input,
            button {
            background: none;
            border: none;
            font: inherit;
            }

            input { width: 100%; }

            button { cursor: pointer; }

            ion-icon { pointer-events: none; }

            address { font-style: normal; }

            html {
            font-family: var(--ff-poppins);
            font-size: 10px;
            scroll-behavior: smooth;
            }

            body {
            background-color: var(--white);
            color: var(--granite-gray);
            font-size: 1.6rem;
            line-height: 1.7;
            }

            :focus-visible { outline-offset: 4px; }

            ::-webkit-scrollbar { width: 10px; }

            ::-webkit-scrollbar-track { background-color: hsl(0, 0%, 98%); }

            ::-webkit-scrollbar-thumb { background-color: hsl(0, 0%, 80%); }

            ::-webkit-scrollbar-thumb:hover { background-color: hsl(0, 0%, 70%); }

            /*-----------------------------------*\
            #REUSED STYLE
            \*-----------------------------------*/

            .container { padding-inline: 15px; }

            /* .section { padding-block: var(--section-padding); } */
            .section { padding-block: 78px; }

            .has-before,
            .has-after {
            position: relative;
            z-index: 1;
            }

            .has-before::before,
            .has-after::after {
            content: "";
            position: absolute;
            }

            .h1,
            .h2,
            .h3,
            .h2-sm {
            color: var(--rich-black-fogra-29-1);
            font-family: var(--ff-cuprum);
            }

            .h1 {
            font-size: var(--fs-1);
            line-height: 1.1;
            }

            .h2 { font-size: var(--fs-2); }

            .h2,
            .h3,
            .h2-sm { line-height: 1.3; }

            .h2-sm { font-size: var(--fs-3); }

            .h3 { font-size: var(--fs-7); }

            .btn-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 35px;
            }

            .btn {
            font-weight: var(--fw-600);
            text-transform: uppercase;
            padding: 12px 24px;
            border-radius: var(--radius-5);
            max-width: max-content;
            transition: var(--transition-1);
            }

            .btn-primary {
              display: block;
              color: #ffffff;
              font-weight: var(--fw-600);
              text-transform: uppercase;
              border: 2px solid #ffffff;
              padding: 7px 18px;
              transition: var(--transition-1);
            }

            .btn-primary:is(:hover, :focus) { background-color: #262D59;
              color: var(--white); }

            .flex-btn {
            display: flex;
            align-items: center;
            gap: 20px;
            }

            .img-holder {
            aspect-ratio: var(--width) / var(--height);
            background-color: var(--light-gray);
            }

            .img-cover {
            width: 100%;
            height: 100%;
            object-fit: cover;
            }

            .w-100 { width: 100%; }

            .ww-100 { 
              width: 107%;
              padding-top: 102px;
            
            }
            .www-100 { 
              width: 79%;
              padding-top: 53px;
            
            }

            .text-center { text-align: center; }

            .section-subtitle {
            color: var(--go-green);
            font-weight: var(--fw-500);
            }

            .grid-list {
            display: grid;
            gap: 20px;
            }

            .btn-link {
            color: var(--rich-black-fogra-29-1);
            font-size: var(--fs-12);
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
            transition: var(--transition-1);
            }


            /*-----------------------------------*\
            #HEADER
            \*-----------------------------------*/

            .header .btn-outline { display: none; }

            .header {
            padding-block: 15px;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 4;
            }

            .header.active {
            background-color: var(--white);
            box-shadow: var(--shadow-2);
            }

            .header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            }

            .logo {
            color: var(--rich-black-fogra-29-1);
            /* font-family: var(--ff-cuprum); */
            font-size: 20px;
            font-weight: var(--fw-500);
            line-height: 1;
            }

            .nav-open-btn {
            color: var(--rich-black-fogra-29-1);
            font-size: 35px;
            }

            .navbar {
            position: fixed;
            top: 0;
            left: -280px;
            max-width: 280px;
            width: 100%;
            height: 100%;
            background-color: var(--rich-black-fogra-39);
            color: var(--white);
            padding: 30px 20px;
            visibility: hidden;
            transition: 0.25s var(--cubic-out);
            z-index: 4;
            }

            .navbar.active {
            visibility: visible;
            transform: translateX(280px);
            transition-duration: 0.5s;
            }

            .header.active .navbar-link {
                color: #262D59; /* Black color for active state */
            }
            .header.active .navbar-link:hover {
                color: #d0bc36; /* Black color for active state */
            }

            .navbar .logo,
            .nav-close-btn { color: var(--white); }

            .navbar .wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-block-end: 25px;
            }

            .nav-close-btn { font-size: 30px; }

            .navbar-link {
            padding-block: 10px;
            transition: var(--transition-1);
            }

            .navbar-link:is(:hover, :focus) { color: var(--go-green); }

            .overlay {
            position: fixed;
            inset: 0;
            background-color: hsla(0, 0%, 100%, 0.7);
            visibility: hidden;
            opacity: 0;
            transition: var(--transition-1);
            z-index: 3;
            }

            .overlay.active {
            visibility: visible;
            opacity: 1;
            }

            /*-----------------------------------*\
            #HERO
            \*-----------------------------------*/

            .hero {
            background-color: rgb(0 0 0 / 28%);
            padding-block-start: calc(var(--section-padding) + 50px);
            text-align: center;
            overflow: hidden;
            }

            .hero .container {
            display: grid;
            gap: 50px;
            }

            .hero-subtitle {
            color: var(--go-green);
            font-size: var(--fs-12);
            font-weight: var(--fw-500);
            max-width: max-content;
            margin-inline: auto;
            z-index: 0;
            }

            .hero-subtitle::before {
            top: 8px;
            left: -20px;
            width: 15px;
            height: 2px;
            background-color: var(--go-green);
            }

            .hero-title { margin-block: 10px 15px; }

            .hero-text { color: white}; 

            .hero .btn-group { margin-block-start: 40px; }

            .hero .btn-icon {
            background-color: var(--go-green);
            color: var(--white);
            font-size: 20px;
            padding: 20px;
            border-radius: 50%;
            animation: pulse 2s ease infinite;
            }

            @keyframes pulse {
            0% { box-shadow: 0 0 0 0 var(--go-green); }
            100% { box-shadow: 0 0 0 20px transparent; }
            }

            .hero .flex-btn .span {
            color: var(--go-green);
            font-size: var(--fs-9);
            font-weight: var(--fw-600);
            }

            .hero-banner,
            .hero-banner > img {
              border-radius: 50%;
            }

            .hero-banner > img {
              /* No animation applied to the image */
            }

            .hero-banner::before {
              top: -17%;
              left: -52px;
              transform: translate(-101%, -50%);
              width: 122%;
              height: 134%;
              background-image: url(image/new/hero-pattern.svg);
              background-repeat: no-repeat;
              background-size: contain;
              background-position: center;
              z-index: -1;
              animation: circle-rotate infinite;
              animation-duration: 130s;
              animation-timing-function: linear;
            }

            @keyframes circle-rotate {
              from { transform: rotate(0deg); }
              to { transform: rotate(360deg); }
            }

            /*-----------------------------------*\
            #ABOUT
            \*-----------------------------------*/

            .about .container {
            display: grid;
            gap: 30px;
            }

            .about-banner { filter: drop-shadow(2px 2px 5px hsla(0, 0%, 0%, 0.08)); }

            .about .section-text { margin-block: 20px 13px; }

            .about-list { margin-block-end: 50px; }

            .about-list .has-before {
            font-family: var(--ff-cuprum);
            font-size: var(--fs-8);
            font-weight: var(--fw-600);
            padding-inline-start: 20px;
            line-height: 1.5;
            }

            .about-list .has-before:not(:last-child) { margin-block-end: 15px; }

            .about-list .has-before::before {
            top: 10px;
            left: 0;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: var(--go-green);
            }

            .about .btn-group { justify-content: flex-start; }

            .about .btn-group .flex-btn { gap: 10px; }

            .about .btn-icon ion-icon {
            color: var(--go-green);
            font-size: 40px;
            }

            .about .btn-group .span {
            color: var(--go-green);
            font-family: var(--ff-cuprum);
            font-size: var(--fs-6);
            font-weight: var(--fw-600);
            }

            #animatedImage {
                transition: transform 0.5s ease-in-out;
            }

            #animatedImage.animate {
                transform: translateX(20px);
            }

            /*-----------------------------------*\
            #SERVICE
            \*-----------------------------------*/

            .service .section-text { margin-block: 15px 50px; }

            .service .grid-list { margin-block-end: 50px; }

            .service-card {
            height: 100%;
            padding: 30px 25px;
            text-align: center;
            box-shadow: var(--shadow-1);
            }

            .service-card::after {
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--go-green);
            transition: var(--transition-2);
            }

            .service-card:is(:hover, :focus-within)::after { width: 100%; }

            .service-card .card-icon {
            max-width: max-content;
            margin-inline: auto;
            margin-block-end: 10px; 
            }

            .service-card .img { transition: var(--transition-1); }

            .service-card:is(:hover, :focus-within) .img { transform: scale(1.1); }

            .service-card .card-text { margin-block: 5px 13px; }

            .service .btn { margin-inline: auto; }
            
            

            /*-----------------------------------*\
            #FOOTER
            \*-----------------------------------*/

            .footer {
            background-color: #262D59;
            color: var(--cultured);
            }

            .footer-top .container {
            display: grid;
            gap: 40px;
            }

            .footer .logo { color: var(--white); }

            .footer-text { margin-block: 25px; }

            .newsletter-form {
            position: relative;
            max-width: 350px;
            }

            .email-field {
            color: var(--white);
            font-size: var(--fs-11);
            border: 1px solid var(--granite-gray);
            padding: 15px;
            border-radius: var(--radius-5);
            }

            .footer .form-btn {
            background-color: var(--go-green);
            color: var(--white);
            font-size: 24px;
            position: absolute;
            top: 6px;
            right: 6px;
            bottom: 6px;
            padding-inline: 10px;
            border-radius: var(--radius-5);
            }

            .footer-list-title {
            font-family: var(--ff-cuprum);
            font-size: var(--fs-5);
            font-weight: var(--fw-600);
            line-height: 1.2;
            margin-block-end: 25px;
            }

            .footer-link {
            margin-block-start: 15px;
            transition: var(--transition-1);
            }

            .footer-link:is(:hover, :focus) { color: var(--go-green); }

            .footer-item,
            .social-list {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            }

            .footer-item { margin-block-start: 15px; }

            .footer-item > ion-icon {
            flex-shrink: 0;
            color: var(--go-green);
            font-size: 20px;
            margin-block-start: 3px;
            }

            .contact-link { transition: var(--transition-1); }

            .contact-link:not(.address):is(:hover, :focus) { color: var(--go-green); }

            .footer-item:last-child {
            margin-block-start: 25px;
            padding-block-start: 25px;
            border-block-start: 1px solid var(--granite-gray);
            }

            .social-link {
            font-size: 14px;
            border: 1px solid var(--granite-gray);
            padding: 10px;
            transition: var(--transition-1);
            }

            .social-link:is(:hover, :focus) {
            background-color: var(--go-green);
            border-color: var(--go-green);
            }

            .footer-bottom {
            padding-block: 15px;
            border-block-start: 1px solid var(--jet);
            }

            .copyright {
            font-size: var(--fs-12);
            text-align: center;
            margin-block-end: 15px;
            }

            .copyright-link {
            display: inline-block;
            color: var(--go-green);
            font-weight: var(--fw-500);
            }

            .footer-bottom-list {
            display: flex;
            justify-content: center;
            gap: 20px;
            }

            .footer-bottom-link {
            font-size: var(--fs-11);
            transition: var(--transition-1);
            }

            .footer-bottom-link:is(:hover, :focus) { color: var(--go-green); }

            /*-----------------------------------*\
            #MEDIA QUERIES 
            \*-----------------------------------*/

            /**
            * responsive for large than 575px screen
            */

            @media (min-width: 575px) {

            /**
            * CUSTOM PROPERTY
            */

            :root {

              /**
              * typography
              */

              --fs-1: 5.4rem;

            }

            /**
            * REUSED STYLE
            */

            .container {
              max-width: 540px;
              width: 100%;
              margin-inline: auto;
            }

            /**
            * HEADER
            */

            .header .container { max-width: unset; }

            /**
            * SERVICE
            */

            .service .grid-list { grid-template-columns: 1fr 1fr; }

            .service-card { text-align: left; }

            .service-card .card-icon { margin-inline: 0; }

            .service-card .btn-link { justify-content: flex-start; }

            }

            /**
            * responsive for large than 768px screen
            */

            @media (min-width: 768px) {

            /**
            * CUSTOM PROPERTY
            */

            :root {

              /**
              * typography
              */

              --fs-1: 7rem;
              --fs-2: 4rem;
              --fs-4: 3.5rem;

            }

            /**
            * REUSED STYLE
            */

            .container { max-width: 720px; }

            .btn { padding: 16px 32px; }

            .section-text.text-center {
              max-width: 50ch;
              margin-inline: auto;
            }

            .btn-link { --fs-12: 1.4rem; }

            /**
            * HERO
            */

            .hero-subtitle { --fs-12: 1.4rem; }

            /**
            * FEATURES
            */

            .features .grid-list { grid-template-columns: 1fr 1fr; }

            /**
            * FOOTER
            */

            .footer-top .container { grid-template-columns: 1fr 1fr; }

            }

            .background-image{
              width: 100%;
              height: 100%;
            }
            

            /**
            * responsive for large than 992px screen
            */

            @media (min-width: 992px) {

            /**
            * REUSED STYLE
            */

            .container { max-width: 960px; }

            /**
            * HEADER
            */

            .nav-open-btn,
            .navbar .wrapper,
            .overlay { display: none; }

            .header { padding: 20px; }

            .navbar,
            .navbar.active { all: unset; }

            .navbar-list {
              display: flex;
              gap: 40px;
            }

            .navbar-link {
              /* color: var(--rich-black-fogra-29-1); */
              color: white;
              font-weight: var(--fw-500);
              padding-block: 0;
            }

            .header .btn-outline {
              display: block;
              color: var(--go-green);
              font-weight: var(--fw-600);
              text-transform: uppercase;
              border: 1px solid var(--go-green);
              padding: 7px 18px;
              transition: var(--transition-1);
            }

            .header .btn-outline:is(:hover, :focus) {
              background-color: var(--go-green);
              color: var(--white);
            }

            /**
          * HERO
          */

          .hero {
              text-align: left;
          }

          .hero .container {
              display: grid;
              grid-template-columns: 1fr 0.7fr;
              align-items: center;
          }

          .hero-subtitle {
              margin-inline: 25px 0;
          }

          .hero .btn-group {
              justify-content: flex-start;
              padding-top: 17px;
          }

          /* Animation Keyframes */
          @keyframes slideInLeft {
              0% {
                  opacity: 0;
                  transform: translateX(-100%);
              }
              100% {
                  opacity: 1;
                  transform: translateX(0);
              }
          }

          @keyframes fadeInUp {
              0% {
                  opacity: 0;
                  transform: translateY(100%);
              }
              100% {
                  opacity: 1;
                  transform: translateY(0);
              }
          }

          /* Initial State */
          .hero-title-new, .hero-text, .btn-group {
              opacity: 0;
          }

          /* Animation Classes */
          .animate-title {
              animation: slideInLeft 1s ease-out forwards;
          }

          .animate-content {
              animation: fadeInUp 1s ease-out forwards;
          }


            /**
            * ABOUT
            */

            .about .container {
              grid-template-columns: 1fr 1fr;
              align-items: center;
            }

            /**
            * SERVICE
            */

            .service-card {
              display: flex;
              align-items: flex-start;
              gap: 10px;
            }

            /**
            * FEATURES
            */

            .features .grid-list { grid-template-columns: repeat(3, 1fr); }

            /**
            * FAQ
            */

            .faq .container {
              grid-template-columns: 0.48fr 1fr;
              align-items: flex-start;
            }

            /**
            * FOOTER
            */

            .footer-top .container { grid-template-columns: 1fr 0.8fr 0.8fr 1fr; }

            .footer-bottom .container {
              display: flex;
              justify-content: space-between;
              align-items: center;
            }

            .copyright { margin-block-end: 0; }

            }

            /**
            * responsive for large than 1200px screen
            */

            @media (min-width: 1200px) {

            /**
            * CUSTOM PROPERTY
            */

            :root {

              /**
              * typography
              */

              --fs-1: 7.5rem;
              --fs-4: 3.8rem;

            }

            /**
            * REUSED STYLE
            */

            .container { max-width: 1140px; }

            .btn-link { --fs-12: 1.5rem; }

            /**
            * HERO
            */

            .hero {
                position: relative; /* Make the section a positioned element */
                height: 100vh; /* Set the height to full viewport height */
                width: 100%; /* Set the width to 100% of the parent container */
                display: flex; /* Enable flexbox for centering content */
                align-items: center; /* Vertically center the content */
                justify-content: center; /* Horizontally center the content */
                overflow: hidden; /* Ensure no content overflows the section */
            }

            .hero img.background-image {
              position: absolute;
              top: 32px;
              left: 283px;
              /* bottom: 11px; */
              height: 677px;
              width: 677px;
              object-fit: cover;
              z-index: -1;
            }


            /**
            * ABOUT
            */

            .about .container { grid-template-columns: 1fr 0.7fr; }

            /**
            * FAQ
            */

            .faq-card .card-action.active + .card-content { max-height: 200px; }

            }


            .nav-logo{
            width: 132px;
            }

            .hero-content .hero-title-new{
            font-size: 44px;
            font-weight: 900;
            color: #ffffff;

            }

            .hero-content .hero-title-new span{
            color: red;
            }

            /* estimation styles */
            .esimate-container {
                display: flex;
                background-color: white;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                overflow: hidden;
            }

            .form-container {
                padding: 40px;
                max-width: 500px;
            }


            label {
                display: block;
                margin-bottom: 10px;
                font-weight: bold;
            }

            input[type="text"],
            input[type="email"],
            input[type="date"],
            input[type="time"],
            select,
            textarea,
            input[type="file"] {
                width: calc(100% - 20px);
                padding: 10px;
                margin-bottom: 20px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            textarea {
                resize: none;
                height: 100px;
            }

            .estimation {
                display: block;
                width: 100%;
                padding: 15px;
                background-color: #262D59;
                color: white;
                border: none;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
            }

            .estimation:hover {
                background-color: #3f4776;
            } 

            .contactshedule{
                display: block;
                width: 100%;
                padding: 15px;
                background-color: #262D59;
                color: white;
                border: none;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
            }

            .contactshedule:hover {
                background-color: #3f4776;
            } 

            .row {
                display: flex;
                justify-content: space-between;
            }

            .column {
                flex: 0 0 48%;
            }

            /* contact us shedule call */
            .switch {
              font-size: 17px;
              position: relative;
              display: inline-block;
              width: 3.5em;
              height: 2em;
            }

            /* Hide default HTML checkbox */
            .switch input {
              opacity: 0;
              width: 0;
              height: 0;
            }

            /* The slider */
            .slider {
              position: absolute;
              cursor: pointer;
              inset: 0;
              background: #9fccfa;
              border-radius: 50px;
              transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            }

            .slider:before {
              position: absolute;
              content: "";
              display: flex;
              align-items: center;
              justify-content: center;
              height: 2em;
              width: 2em;
              inset: 0;
              background-color: white;
              border-radius: 50px;
              box-shadow: 0 10px 20px rgba(0,0,0,0.4);
              transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            }

            .switch input:checked + .slider {
              background: #0974f1;
            }

            .switch input:focus + .slider {
              box-shadow: 0 0 1px #0974f1;
            }

            .switch input:checked + .slider:before {
              transform: translateX(1.6em);
            }


                @keyframes float {
              0% {
                transform: translateY(0);
              }
              50% {
                transform: translateY(-10px);
              }
              100% {
                transform: translateY(0);
              }
            }

            .floating-animation {
              animation: float 4s ease-in-out infinite;
            }

            .footer-logo-container {
                  display: flex;
                  /* align-items: center; */
                  margin-bottom: 1rem;
              }

            .footer-logo {
              max-width: 31px;
              margin-right: 1rem;
              }

              .footer-logo-container h1 {
                font-size: 19px;
                font-weight: 700;
                margin: 0;
              }

              .bar {
              display: flex;
              background-color: #262D59;
              overflow: hidden;
              border-radius: 17px; 
            }

            .bar-item {
              flex: 1;
              padding: 6px 13px;
              text-align: center;
              color: white;
              cursor: pointer;
              transition: background-color 0.3s;
            }

            .bar-item:hover {
              background-color: #ea7831;
            }

            .city {
              display: none;
              padding: 20px;
            }

            .active {
              display: block;
            }
  
            .client-btn{
              border-radius: 10px;
            }

            .admin-btn{
              border-radius: 10px;
            }


            .login-box {
              display: flex;
              justify-content: center;
              flex-direction: column;
              width: 384px;
              height: 505px;
              padding: 16px !important;
              /* box-shadow: 0px 5px 10px 1px rgba(245, 184, 54, 0.3); */
              text-decoration: none;
              
          }

          .login-header {
              text-align: center;
              margin: 20px 0 40px 0;
          }

          .login-header header {
            margin-bottom: -35px;
            color: #333;
            font-size: 24px;
            font-weight: bolder;
          }

          .input-box .input-field {
              width: 100%;
              height: 60px;
              font-size: 17px;
              padding: 0 25px;
              margin-bottom: 15px;
              border-radius: 10px;
              border: none;
              box-shadow: 0px 5px 10px 1px rgb(0 0 0 / 51%);
              outline: none;
              transition: .3s;
              
          }

          ::placeholder {
              font-weight: 500;
              color: #222;
          }


          .forgot {
              display: flex;
              justify-content: space-between;
              margin-bottom: 40px;
          }

          section {
              display: flex;
              align-items: center;
              font-size: 14px;
              color: #555;
          }

          #check {
              margin-right: 10px;
          }

          a {
              text-decoration: none !important;
          }

          a:hover {
              text-decoration: underline;
          }

          section a {
              color: #555;
              text-decoration: none !important;
          }

          .input-submit {
              position: relative;
          }

          .submit-btn {
              width: 100%;
              height: 60px;
              background: #EA7831;
              border: none;
              border-radius: 12px;
              cursor: pointer;
              transition: .3s;
          }

          .input-submit label {
              position: absolute;
              top: 45%;
              left: 50%;
              color: #fff;
              -webkit-transform: translate(-50%, -50%);
              -ms-transform: translate(-50%, -50%);
              transform: translate(-50%, -50%);
              cursor: pointer;
          }

          .submit-btn:hover {
              background:  #E3A02C;
              transform: scale(1.05, 1);
          }

          .sign-up-link {
              text-align: center;
              font-size: 15px;
              margin-top: 20px;
          }

          .sign-up-link a {
              color: #000;
              font-weight: 600;
              text-decoration: none !important;
          }

          .image-container {
              display: flex;
              justify-content: center;
              align-items: center;
              margin-bottom: 20px;
          }

          .top-left-image {
              position: absolute;
              top: 0;
              left: 0;
              margin: 20px;
              /* Optional: Adjust margin to move the image inward */
          }

          .bar-item.active {
            background-color: #ea7831;
            color: #ffffff;
            border-radius: 5px;
          }
          

        /* hero */
        /* Responsive Styles */
          .background-image {
            width: 100%;
            height: auto;
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
          }

          .login-box {
            background-color: rgba(230, 230, 230, 0.55);
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
          }

          .input-box {
            margin-bottom: 15px;
          }

          .input-field {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
          }

          .submit-btn {
            /* background-color: #007bff; */
            border: none;
            color: white;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
          }

          /* Media Queries */
          @media (max-width: 768px) {
            .hero-title-new {
              font-size: 2rem;
            }

            .hero-text {
              font-size: 1rem;
            }

            .btn-group .btn {
              width: 100%;
              margin: 5px 0;
            }

            .login-box {
              margin: 20px 0;
            }
          }

          @media (max-width: 480px) {
            .hero-title-new {
              font-size: 1.5rem;
              color: #ffffff !important;
              font-weight: 900 !important;
              /* text-shadow: 0px -1px 13px #ffffff !important; */
            }

            .hero-text {
              font-size: 0.9rem;
            }

            .login-box {
              /* width: 90%; */
              margin: 20px auto;
              padding: 20px;
              max-width: 400px;
            }

            .input-box {
              text-align: left; /* Align text to the left */
            }

            .input-field {
              font-size: 1rem;
              width: 100%; /* Full width for input fields */
            }

            .submit-btn {
              width: 100%; /* Full width for the button */
            }

            .input-box label {
              display: block; /* Ensure the label takes full width */
              margin-bottom: 5px; /* Space between label and input */
            }
          }

          /* estimation */
          /* Responsive styles */
          @media (max-width: 768px) {
              .esimate-container {
                  flex-direction: column; /* Stack elements vertically */
                  align-items: center; /* Center content */
              }

              .form-container {
                  padding: 20px; /* Adjust padding */
                  max-width: 90%; /* Max width for smaller screens */
              }

              input[type="text"],
              input[type="email"],
              input[type="date"],
              input[type="time"],
              select,
              textarea,
              input[type="file"],
              .estimation {
                  font-size: 0.9rem; /* Adjust font size */
                  padding: 8px; /* Adjust padding */
              }
          }

          @media (max-width: 480px) {
              label {
                  text-align: left; /* Align labels to the left */
              }

              .form-container {
                  padding: 15px; /* Reduce padding */
                  max-width: 100%; /* Full width for very small screens */
              }

              input[type="text"],
              input[type="email"],
              input[type="date"],
              input[type="time"],
              select,
              textarea,
              input[type="file"],
              .estimation {
                  padding: 6px; /* Smaller padding */
              }

              textarea {
                  height: 80px; /* Smaller height for textareas */
              }

              .about-banner {
                  display: none !important; /* Hide the image */
              }

              .form-container {
                  padding: 20px; /* Adjust padding */
                  max-width: 90%; /* Max width for smaller screens */
              }
          }

          /* backgroun video */
          .background-video {
              position: absolute;
              top: 0;
              left: 0;
              width: 100%;
              height: 100%;
              object-fit: cover;
              z-index: -1;
          }

          .video-overlay {
              position: absolute;
              top: 0;
              left: 0;
              width: 100%;
              height: 100%;
              background-color: rgb(92 92 92 / 38%); /* Change this to your desired color and opacity */
              z-index: -1;
          }

          /* scroll arrow */
          /* Scroll to Top Button */
          .scroll-to-top {
              position: fixed;
              bottom: 20px;
              left: 1190px;
              width: 50px;
              height: 50px;
              background-color: #262D59;
              color: white;
              border-radius: 50%;
              display: flex;
              justify-content: center;
              align-items: center;
              cursor: pointer;
              box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
              transition: opacity 0.3s, visibility 0.3s;
              opacity: 0;
              visibility: hidden;
              z-index: 1000;
          }

          .scroll-to-top.show {
              opacity: 1;
              visibility: visible;
          }

          .scroll-to-top ion-icon {
              font-size: 24px;
          }

                    /* Responsive Adjustments */
          @media (max-width: 768px) {
              .scroll-to-top {
                  width: 40px;
                  height: 40px;
                  bottom: 15px;
                  left: 380px;
              }

              .scroll-to-top ion-icon {
                  font-size: 20px;
              }
          }

          @media (max-width: 480px) {
              .scroll-to-top {
                  width: 35px;
                  height: 35px;
                  bottom: 10px;
                  left: 380px;
              }

              .scroll-to-top ion-icon {
                  font-size: 18px;
              }
          }


          /* animation */
          /* Initial state for animation */
          .section {
              opacity: 0;
              transform: translateY(20px);
              transition: opacity 0.6s ease-in-out, transform 0.6s ease-in-out;
          }

          /* Active state when section is in view */
          .section.in-view {
              opacity: 1;
              transform: translateY(0);
          }

          /* about */
          .tabs-about {
            display: flex;
            border-bottom: 2px solid #e0b5b1;
          }

          .tab-button {
            flex: 1;
            padding: 15px;
            cursor: pointer;
            background-color: #ffffff;
            color: blue;
            text-align: center;
            border: none;
            border-top-right-radius: 50px 20px;
            outline: none;
            transition: background-color 0.3s, color 0.3s;
          }

          .tab-button.active {
            background-color: #ea7831;
            color: white;
          }

          .tab-content {
            background-color: #262D59;
            padding: 20px;
            display: none;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
            height: 200px; /* Set the desired fixed height */
            overflow-y: auto; /* Make content scrollable if it exceeds the height */
          }

          .tab-content.active {
            display: block;
            opacity: 1;
          }

          .tab-content p {
            color: #DEE1E6;
            text-align: justify;
          }


          .about-content{
            font-size: 87%;
          }
        
          .button {
              background-color: #ea7831;
              border: none;
              color: white;
              padding: 8px;
              border-radius: 5px;
              text-align: center;
              font-weight: 600;
              text-decoration: none;
              display: inline-block;
              font-size: 16px;
              margin: -2px -16px;
              cursor: pointer;
          }

          .button:hover {
            background-color: #eeaa80; /* Green */
            color: white;
          }

  </style>
</head>
<body>
  <!-- #HEADER-->
  <header class="header" data-header>
    <div class="container">

      <a href="#home"><img src="image/new/logo/geo.png" class="nav-logo"></a>
      

      <nav class="navbar" data-navbar>

        <div class="wrapper">
          <a href="images/logo/gro.png" class="logo"></a>

          <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
            <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
          </button>
        </div>

        <ul class="navbar-list">

          <li>
            <a href="#home" class="navbar-link" data-nav-link>Home</a>
          </li>

          <li>
            <a href="#about" class="navbar-link" data-nav-link>Who we are</a>
          </li>

          <li>
            <a href="#services" class="navbar-link" data-nav-link>What we do</a>
          </li>

          <li>
            <a href="#estimation" class="navbar-link" data-nav-link>Request a quote</a>
          </li>

          <li>
            <a href="#contactOrSchedule" class="navbar-link" data-nav-link>Get in touch with us</a>
          </li>

        </ul>

      </nav>

      <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
        <ion-icon name="menu-outline" aria-hidden="true"></ion-icon>
      </button>
      {{-- <button href="#" class="btn-outline client-btn" onclick="location.href='{{ route('login') }}'">Client</button> --}}
      <button href="#" class="button button3" onclick="location.href='{{ route('admin_login') }}'">Admin</button>
      <div class="overlay" data-nav-toggler data-overlay></div>
    </div>
  </header>

  {{-- body --}}
  <main>
    <article>
      <!--- #HERO-->
      <section class="section hero" id="home" aria-label="hero">
        {{-- <img src="image/new/bg.png" alt="Background Image" class="background-image"> --}}
        <video autoplay muted loop class="background-video" preload="auto">
          <source src="image/new/bg.mp4" type="video/mp4">
        </video>
        <div class="video-overlay"></div>
        <div class="container">
          <div class="hero-content">
            <h1 class="hero-title-new">Empower Your Decisions with Geographic Insights</h1>
            <p class="hero-text">
              Discover the the power of AI 
              driven  ground data analysis 
              to achieve unmatched 
              precision in your projects. Our 
              advanced geo-database and 
              mapping software provides 
              location based insights to 
              help you make informed 
              decisions 
            </p>
            <div class="btn-group">
              <a href="#contactOrSchedule" class="btn btn-primary">Get in touch with us</a>
              <a href="#estimation" class="btn btn-primary">Request a quote</a>
            </div>
          </div>
          {{-- <figure class="hero-banner has-before img-holder floating-animation" style="--width: 650px; --height: 650px;">
            <img src="image/new/hero-banner-01.png" width="650" height="650" alt="hero banner" class="img-cover">
          </figure>           --}}

          {{-- Login --}}
          <div class="login-box" style="background-color: #e6e6e68c; border-radius: 10px;">

            <form method="POST" action="{{ route('login') }}">
                <div class="login-header">
                    <header style="color: #000000;text-align: left; ">Login to track your jobs and access to all our features</header>
                </div>
                @csrf
                <!-- Email input -->
                <div class="input-box">
                  <label for="">User name</label>
                    <input name="name" id="form3Example3" class="input-field" placeholder="User Name"  autocomplete="off"  required />
    
                </div>
    
                <!-- Password input -->
                <div class="input-box">
                  <label for="">Password</label>
                    <input type="password" name="password" id="password" class="input-field" placeholder="password"  autocomplete="off" required />
                </div>
    
                @if ($errors->has('name'))
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: '{{ $errors->first('name') }}'
                        });
                    </script>
                @endif
    
                <div class="input-submit">
                    <button type="submit" class="submit-btn"
                        style="padding-left: 2.5rem; padding-right: 2.5rem;  font-size: 17px; font-weight: 500; color:#fff;">Login</button>
                    </div>
                    <br/>
                    <div style="text-align: center; color: #565D6D; font-size: 14px; font-family: Inter; font-weight: 400; line-height: 22px; word-wrap: break-word">OR</div>
                    <div style=" border: 1px #DEE1E6 solid"></div>
                    <div style=" text-align: center"><span style="color: #323743; font-size: 14px; font-family: Inter; font-weight: 400; line-height: 22px; word-wrap: break-word">Are you new to our services, please signup here to access all our features</span><span style="color: #262D59; font-size: 14px; font-family: Inter; font-weight: 700; line-height: 22px; word-wrap: break-word"><a style="color: #323743; text-decoration: none" href="{{ route('admin_client_signup') }}"> Sign up here </a></span></div>
            </form>
          </div>
          {{-- Login --}}


        </div>
      </section>

      <!--- #ABOUT-->
      <section class="section about" id="about" aria-label="about">
        <div class="container">

          <figure class="about-banner">
            <img src="image/new/03.jpg" width="802" height="654" loading="lazy" alt="about banner"
                class="w-100" id="animatedImage">
        </figure>
        

          <div class="about-content">

            <h2 class="h2-sm section-title">Who we are</h2>
            <br/>

            <h3>Our Story</h3>
    
            <p class="section-text" style=" text-align: justify;">
              Melbourne Geotechnical Services was founded in 2016 with the mission to provide top-notch geotechnical engineering solutions. Over the past years, we have grown into a leading firm in the industry, serving clients across Victoria.
            </p>

            <br/>

            <h3>Our Mission</h3>
    
            <p class="section-text" style=" text-align: justify;">
              To deliver innovative and reliable integrated solutions that empower our clients to build safely and sustainably.
            </p>

            <br/>

            <h3>Our Vision</h3>
    
            <p class="section-text" style=" text-align: justify;">
              To be the most trusted partner in the building and construction industry, known for our expertise, integrity, and commitment to excellence.
            </p>

            <br/>

            <h3>Our Values</h3>
    
            <p class="section-text" style=" text-align: justify;">
              • Customer Service: We prioritize our clients' needs and aim to exceed their expectations.<br>• Accuracy and Speed: We deliver precise results quickly, without compromising on quality.
            </p>

            <br/>




            {{-- <div class="container-about">
              <div class="tabs-about">
                <button class="tab-button active" onclick="openTab(event, 'story')">Our Story</button>
                <button class="tab-button" onclick="openTab(event, 'mission')">Our Mission</button>
                <button class="tab-button" onclick="openTab(event, 'vision')">Our Vision</button>
                <button class="tab-button" onclick="openTab(event, 'values')">Our Values</button>
              </div>
              <div id="story" class="tab-content active">
               
                <p>Melbourne Geotechnical Services was founded in 2016 with the mission to provide top-notch geotechnical engineering solutions. Over the past years, we have grown into a leading firm in the industry, serving clients across Victoria.</p>
              </div>
              <div id="mission" class="tab-content">
              
                <p>To deliver innovative and reliable integrated solutions that empower our clients to build safely and sustainably.</p>
              </div>
              <div id="vision" class="tab-content">
                
                <p>To be the most trusted partner in the building and construction industry, known for our expertise, integrity, and commitment to excellence.</p>
              </div>
              <div id="values" class="tab-content">
                
                <p>• Customer Service: We prioritize our clients' needs and aim to exceed their expectations.<br>• Accuracy and Speed: We deliver precise results quickly, without compromising on quality.</p>
              </div>
            </div> --}}

          </div>

        </div>
      </section>

      <!--- #SERVICE-->
      <section class="section service" id="services" aria-label="service">
        <div class="container">
          <!-- <h2 class="h2 section-title text-center">Our Services</h2> -->

          <section class="section about" id="about" aria-label="about">
            <div class="container">
              <div class="about-content">
    
                <h2 class="h2-sm section-title">What We Do</h2>
                <br>

                <h3>Our Comprehensive Services</h3>
    
                <p class="section-text" style=" text-align: justify;">
                  At Melbourne Geotechnical Services, we offer a wide range of services to ensure your projects meet all necessary standards and regulations. Our client portal provides real-time access to project timelines, progress, and detailed reports, keeping you informed and in control every step of the way.
                </p>
    
              </div>
              
              <figure class="about-banner">
                <img src="image/new/04.jpg" width="802" height="654" loading="lazy"
                  class="w-100">
              </figure>
    
            </div>
          </section>

          <!-- <p class="section-text text-center">
            Get the most of reduction in your team’s operating costs for the whole product which creates amazing UI/UX
            experiences.
          </p> -->

          <h2 class="h2-sm section-title text-center">Our All Services</h2>

          <ul class="grid-list">
            {{-- 01 --}}
            <li>
              <div class="service-card has-after">

                <figure class="card-icon">
                  <img src="image/new/service-11.png" width="140" height="140" loading="lazy"
                     class="img">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">Soil Testing</h3>

                  <p class="card-text" style=" text-align: justify;">
                    We conduct borehole drilling and lab testing under engineer supervision to analyze soil properties and composition, ensuring solid foundations and early issue detection.
                  </p>

                  <a href="#" class="btn-link">
                    {{-- <span class="span">Read More</span> --}}

                    {{-- <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon> --}}
                  </a>

                </div>

              </div>
            </li>
            {{-- 02 --}}
            <li>
              <div class="service-card has-after">

                <figure class="card-icon">
                  <img src="image/new/service-22.png" width="140" height="140" loading="lazy" alt="App Development"
                    class="img">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">Land Surveying Services</h3>

                  <p class="card-text" style=" text-align: justify;">
                    Our precise surveying maps your site accurately, supporting all construction and development plans with reliable data.
                  </p>

                  <a href="#" class="btn-link">
                    {{-- <span class="span">Read More</span> --}}

                    {{-- <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon> --}}
                  </a>

                </div>

              </div>
            </li>
            {{-- 03 --}}
            <li>
              <div class="service-card has-after">

                <figure class="card-icon">
                  <img src="image/new/service-33.png" width="140" height="140" loading="lazy"
                    class="img">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">Construction Phase Inspections</h3>

                  <p class="card-text" style=" text-align: justify;">
                    We provide thorough inspections during construction to ensure compliance with standards, addressing issues promptly to maintain project momentum.
                  </p>

                  <a href="#" class="btn-link">
                    {{-- <span class="span">Read More</span> --}}

                    {{-- <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon> --}}
                  </a>

                </div>

              </div>
            </li>
            {{-- 04 --}}
            <li>
              <div class="service-card has-after">

                <figure class="card-icon">
                  <img src="image/new/service-44.png" width="140" height="140" loading="lazy" 
                    class="img">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">Level 1 Inspections and Earthworks Compliance </h3>

                  <p class="card-text" style=" text-align: justify;">
                    We ensure your earthworks meet regulations with comprehensive inspections and documentation, avoiding legal and structural issues.
                  </p>

                  <a href="#" class="btn-link">
                    {{-- <span class="span">Read More</span> --}}

                    {{-- <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon> --}}
                  </a>

                </div>

              </div>
            </li>
            {{-- 05 --}}
            <li>
              <div class="service-card has-after">

                <figure class="card-icon">
                  <img src="image/new/service-44.png" width="140" height="140" loading="lazy" 
                    class="img">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">Bushfire Attack Level Assessment Reports</h3>

                  <p class="card-text" style=" text-align: justify;">
                    Our detailed BAL reports help you understand bushfire risks and plan for safety and compliance.
                  </p>

                  <a href="#" class="btn-link">
                    {{-- <span class="span">Read More</span> --}}

                    {{-- <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon> --}}
                  </a>

                </div>

              </div>
            </li>
            {{-- 06 --}}
            <li>
              <div class="service-card has-after">

                <figure class="card-icon">
                  <img src="image/new/service-44.png" width="140" height="140" loading="lazy" 
                    class="img">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">Footing Probes and Inspection Reports </h3>

                  <p class="card-text" style=" text-align: justify;">
                    We assess foundation stability with detailed footing probe inspections and provide actionable recommendations.
                  </p>

                  <a href="#" class="btn-link">
                    {{-- <span class="span">Read More</span> --}}

                    {{-- <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon> --}}
                  </a>

                </div>

              </div>
            </li>
            {{-- 07 --}}
            <li>
              <div class="service-card has-after">

                <figure class="card-icon">
                  <img src="image/new/service-44.png" width="140" height="140" loading="lazy"
                    class="img">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">Distress Dwelling Reports</h3>

                  <p class="card-text" style=" text-align: justify;">
                    We thoroughly assess distressed structures, identify root causes, and recommend effective remediation solutions.
                  </p>

                  <a href="#" class="btn-link">
                    {{-- <span class="span">Read More</span> --}}

                    {{-- <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon> --}}
                  </a>

                </div>

              </div>
            </li>

          </ul>

          <!-- <a href="#" class="btn btn-primary">Get Started</a> -->

        </div>
      </section>

      <!-- estimation -->
      <section class="section service" id="estimation" aria-label="service">
        <div class="container">
          <section class="section about" id="about" aria-label="about">
            <div class="container-est" style="display: flex; justify-content: space-between; align-items: flex-start;">
              <div class="about-content" style="flex: 1; margin-right: 20px;">
                <h2 class="h2-sm section-title">Request a Quote</h2>
                <div class="esimate-container">
                  <div class="form-container">
                    <form action="{{ route('save_estimation') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <h3>Get Your Project Started</h3>
                      <p>To help us provide you with an accurate quote, please fill out the from below with your project details</p>
                      <br/>
                      <div class="row">
                          <div class="column">
                              <label for="firstName">Name</label>
                              <input type="text" id="firstName" name="first_name" placeholder="Enter first name" required>
                          </div>
                          <div class="column">
                              <label for="contactNumber">Contact Number</label>
                              <input type="text" class="form-control" id="mobile_no" name="mobile_no" value="+61 " title="Format: +61 XXX XXX XXX" oninput="validateMobileNumber()" onfocus="ensurePrefix()" required>
                          </div>
                      </div>
                      <label for="email">Email address</label>
                      <input type="email" id="email" name="email" placeholder="Enter email" required>
                      <div class="row">
                          <div class="column">
                              <label for="jobType">Select the job type</label>
                              <select id="jobType" name="job_id">
                                  <option value="">Select Job Type</option>
                                  @foreach($services as $se)
                                    <option value="{{ $se->id }}">{{ $se->name }}</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="column">
                              <label for="location">Where it's located</label>
                              <input type="text" id="location" name="location" value="" placeholder="Enter location" required>
                          </div>
                      </div>
                      <label for="message">Your message</label>
                      <textarea id="message" name="message" placeholder="Enter your question or message"></textarea>
                      <label for="upload">Upload Project Documents</label>
                      <input type="file" id="upload" name="image">
                      <button class="estimation" type="submit">Submit</button>
                    </form>
                  </div>
              </div>
              </div>
              <figure class="about-banner" style="flex: 1; display: flex; justify-content: center;">
                <img src="image/new/01.jpg" width="802" height="654" loading="lazy" alt="about banner" class="www-100">
              </figure>
            </div>
          </section>
        </div>
      </section>
      
      <!-- Contact US / Schedule a Call -->
      <section class="section service" id="contactOrSchedule" aria-label="service">
        <div class="container">
          <section class="section about" id="about" aria-label="about">
            <div class="container-est" style="display: flex; justify-content: space-between; align-items: flex-start;">
              <div class="about-content" style="flex: 1; margin-right: 20px;">
                <div class="bar">
                  <div class="bar-item active" onclick="openCity('Schedule', this)">Schedule a Call</div>
                  <div class="bar-item" onclick="openCity('Contact', this)">Contact Us</div>
                </div>
                <div id="Schedule" class="city active">
                  <h2 class="h2-sm section-title">Book a Consultation</h2>
                  <div class="esimate-container">
                    <div class="form-container" id="scheduleForm">
                      <form id="scheduleForm" action="{{ route('add_schedule') }}" method="POST">
                        @csrf
                        <p>Schedule a Call with one of our engineers to discuss your project needs.</p>
                        <br/>
                        <div class="row">
                          <div class="column">
                            <label for="firstName">Name</label>
                            <input type="text" id="first_name" name="first_name" placeholder="Enter first name" required>
                          </div>
                          <div class="column">
                            <label for="contactNumber">Contact Number</label>
                            <input type="text" class="form-control" id="mobile_no" name="mobile_no" value="+61 " title="Format: +61 XXX XXX XXX" oninput="validateMobileNumber()" onfocus="ensurePrefix()" required>
                          </div>
                        </div>
                        <label for="email">Email address</label>
                        <input type="email" id="email" name="email" placeholder="Enter email" required>
                        <div class="column">
                          <label for="date">Select Date</label>
                          {{-- <input type="datetime-local" value="2023-01-01T12:00" /> --}}
                          <input type="date" id="schedule_date" name="schedule_date" placeholder="" value="2024-07-15">
                        </div>
                        <div class="column">
                          <label for="time">Select Time</label>
                          <input type="time" id="schedule_time" name="schedule_time" required value="12:00">
                        </div>
                        <label for="message">Your message</label>
                        <textarea id="message" name="message" placeholder="Enter your question or message"></textarea>
                        <button class="contactshedule" type="submit">Submit</button>
                      </form>
                    </div>
                  </div>
                </div>

                <div id="Contact" class="city ">
                  <h2 class="h2-sm section-title">We're Here to Help</h2>
                  <div class="esimate-container">
                    <div class="form-container" id="contactForm">
                      <form>
                        <p>If you have any questions or need further information, please fill out the form below or contact us directly</p>
                        <br/>
                        <div class="row">
                          <div class="column">
                            <label for="firstName">Name</label>
                            <input type="text" id="firstName" name="firstName" placeholder="Enter first name" required>
                          </div>
                          <div class="column">
                            <label for="contactNumber">Contact Number</label>
                            <input type="text" class="form-control" id="mobile_no" name="mobile_no" value="+61 " title="Format: +61 XXX XXX XXX" oninput="validateMobileNumber()" onfocus="ensurePrefix()" required>
                          </div>
                        </div>
                        <label for="email">Email address</label>
                        <input type="email" id="email" name="email" placeholder="Enter email" required>
                        <label for="message">Your message</label>
                        <textarea id="message" name="message" placeholder="Enter your question or message"></textarea>
                        <button class="contactshedule" type="submit">Submit</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <figure class="about-banner" style="flex: 1; display: flex; justify-content: center;">
                <img src="image/new/02.jpg" width="802" height="654" loading="lazy" alt="about banner" class="ww-100">
              </figure>
            </div>
          </section>
        </div>
      </section>
    </article>
  </main>

  <!--#FOOTER-->
  <footer class="footer">

    <div class="footer-top section">
      <div class="container">
        <div class="footer-brand">
          <div class="footer-logo-container">
            <img src="image/Asset_5.png" alt="Melbourne Geotechnical Logo" class="footer-logo">
            <h1>MELBOURNE GEOTECHNICAL</h1>
        </div>
          <p class="footer-text" style=" text-align: justify;">
            Discover the the power of AI driven ground data analysis to achieve unmatched precision in your projects. Our advanced geo-database and mapping software provides location based insights to help you make informed decisions
          </p>

        </div>

        <ul class="footer-list">

          {{-- <li>
            <p class="footer-list-title">Our Services</p>
          </li>

          <li>
            <a href="#" class="footer-link">TEST</a>
          </li> --}}

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Company</p>
          </li>

          <li>
            <a href="#home" class="footer-link">Home</a>
          </li>

          <li>
            <a href="#about" class="footer-link">Who we are</a>
          </li>

          <li>
            <a href="#services" class="footer-link">What we do</a>
          </li>

          <li>
            <a href="#estimation" class="footer-link">Request a quote</a>
          </li>

          <li>
            <a href="#contactOrSchedule" class="footer-link">Get in touch with us</a>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Contact Us</p>
          </li>

          <li class="footer-item">
            <ion-icon name="location" aria-hidden="true"></ion-icon>

            <address class="contact-link address">
              Location
            </address>
          </li>

          <li class="footer-item">
            <ion-icon name="call" aria-hidden="true"></ion-icon>

            <a href="tel:+7894631546876" class="contact-link">Contact Number</a>
          </li>

          <li class="footer-item">
            <ion-icon name="mail" aria-hidden="true"></ion-icon>

            <a href="mailto:info@hoolix.com" class="contact-link">Email</a>
          </li>

          <li class="footer-item">
            <ul class="social-list">

              <li>
                <a href="#" class="social-link">
                  <ion-icon name="logo-facebook"></ion-icon>
                </a>
              </li>

              <li>
                <a href="#" class="social-link">
                  <ion-icon name="logo-twitter"></ion-icon>
                </a>
              </li>

              <li>
                <a href="#" class="social-link">
                  <ion-icon name="logo-instagram"></ion-icon>
                </a>
              </li>

              <li>
                <a href="#" class="social-link">
                  <ion-icon name="logo-pinterest"></ion-icon>
                </a>
              </li>

            </ul>
          </li>

        </ul>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          &copy; 2024 MELBOURNE GEOTECHNICAL | All Rights Reserved
        </p>

        <ul class="footer-bottom-list">

          <li>
            <a href="#" class="footer-bottom-link">Privacy Policy</a>
          </li>

          <li>
            <a href="#" class="footer-bottom-link">Terms of Use</a>
          </li>

        </ul>

      </div>
    </div>

  </footer>
</body>
    <div id="scrollToTopBtn" class="scroll-to-top">
      <ion-icon name="arrow-up-outline" aria-hidden="true"></ion-icon>
    </div>

      <!-- 
        - custom js link
      -->
      <script>
                'use strict';
            /**
             * add event on element
             */

            const addEventOnElem = function (elem, type, callback) {
              if (elem.length > 1) {
                for (let i = 0; i < elem.length; i++) {
                  elem[i].addEventListener(type, callback);
                }
              } else {
                elem.addEventListener(type, callback);
              }
            }



            /**
             * navbar toggle
             */

            const navbar = document.querySelector("[data-navbar]");
            const navToggler = document.querySelectorAll("[data-nav-toggler]");
            const overlay = document.querySelector("[data-overlay]");

            const toggleNavbar = function () {
              navbar.classList.toggle("active");
              overlay.classList.toggle("active");
            }

            addEventOnElem(navToggler, "click", toggleNavbar);



            /**
             * close navbar when click on any navbar links
             */

            const navLinks = document.querySelectorAll("[data-nav-link]");

            const closeNavbar = function () {
              navbar.classList.remove("active");
              overlay.classList.remove("active");
            }

            addEventOnElem(navLinks, "click", closeNavbar);



            /**
             * header active when scroll down
             */

            const header = document.querySelector("[data-header]");

            const headerActive = function () {
              window.scrollY > 100 ? header.classList.add("active")
                : header.classList.remove("active");
            }

            addEventOnElem(window, "scroll", headerActive);



            /**
             * accordion toggle
             */

            const accordionAction = document.querySelectorAll("[data-accordion-action]");

            const toggleAccordion = function () { this.classList.toggle("active"); }

            addEventOnElem(accordionAction, "click", toggleAccordion);
      </script>

      <script>
                function openCity(cityName, elmnt) {
            // Hide all elements with class "city" by default
            var i, city, tablinks;
            city = document.getElementsByClassName("city");
            for (i = 0; i < city.length; i++) {
              city[i].classList.remove("active");
            }
            
            // Remove the background color of all tablinks/buttons
            tablinks = document.getElementsByClassName("bar-item");
            for (i = 0; i < tablinks.length; i++) {
              tablinks[i].classList.remove("active");
            }

            // Show the specific tab content
            document.getElementById(cityName).classList.add("active");

            // Add the active class to the current/clicked tablink
            elmnt.classList.add("active");
          }

      </script>

      <script>
          document.addEventListener('DOMContentLoaded', function() {
            const image = document.getElementById('animatedImage');

            image.addEventListener('mouseenter', function() {
                image.classList.add('animate');
            });

            image.addEventListener('mouseleave', function() {
                image.classList.remove('animate');
            });
        });
        
      </script>

      <script>
        // Set default date to today
        const dateInput = document.getElementById('date');
        const today = new Date().toISOString().split('T')[0];
        dateInput.value = today;

        // Set default time to current time (e.g., 12:00)
        const timeInput = document.getElementById('time');
        const currentTime = new Date();
        const hours = String(currentTime.getHours()).padStart(2, '0');
        const minutes = String(currentTime.getMinutes()).padStart(2, '0');
        timeInput.value = `${hours}:${minutes}`;
      </script>

      <script>
          document.addEventListener("DOMContentLoaded", function() {
              // Add animation class to title
              document.querySelector(".hero-title-new").classList.add("animate-title");

              // Add animation class to text and button group with a slight delay
              setTimeout(function() {
                  document.querySelector(".hero-text").classList.add("animate-content");
                  document.querySelector(".btn-group").classList.add("animate-content");
              }, 500); // Delay in milliseconds
          });
      </script>

      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            @if(session('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: '{{ session('success') }}',
                        confirmButtonText: 'OK'
                    });
                </script>
            @endif
        
            <!-- SweetAlert2 Error Message -->
            @if(session('error'))
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '{{ session('error') }}',
                        confirmButtonText: 'OK'
                    });
                </script>
            @endif

        <!-- 
          - ionicon link
        -->
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

      <script>
        document.addEventListener("DOMContentLoaded", function () {
        var scrollToTopBtn = document.getElementById("scrollToTopBtn");
        var rootElement = document.documentElement;

        // Function to scroll to the top
        function scrollToTop() {
            rootElement.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        }

        // Function to toggle the visibility of the scroll-to-top button
        function handleScroll() {
            var scrollTotal = rootElement.scrollHeight - rootElement.clientHeight;
            if ((rootElement.scrollTop / scrollTotal) > 0.1) {
                // Show button if scrolled down more than 10%
                scrollToTopBtn.classList.add("show");
            } else {
                // Hide button if scrolled less than 10%
                scrollToTopBtn.classList.remove("show");
            }
        }

        // Attach event listeners
        scrollToTopBtn.addEventListener("click", scrollToTop);
        document.addEventListener("scroll", handleScroll);
        });

      </script>

      <script>
          document.addEventListener('DOMContentLoaded', function () {
              const sections = document.querySelectorAll('.section');
          
              const options = {
                  threshold: 0.1 // Adjust this value as needed
              };
          
              const observer = new IntersectionObserver((entries, observer) => {
                  entries.forEach(entry => {
                      if (entry.isIntersecting) {
                          entry.target.classList.add('in-view');
                          observer.unobserve(entry.target); // Optional: to only animate once
                      }
                  });
              }, options);
          
              sections.forEach(section => {
                  observer.observe(section);
              });
          });
      </script>

      <script>
        function validateMobileNumber() {
            const input = document.getElementById('mobile_no');
            const prefix = '+61 ';
            
            // Ensure the prefix remains intact
            if (!input.value.startsWith(prefix)) {
                input.value = prefix;
            }
            
            // Regex pattern to allow numbers with spaces
            const numberPattern = /^\+61\s?\d{0,3}\s?\d{0,3}\s?\d{0,3}$/;

            // Allow partial matching to facilitate typing
            if (!numberPattern.test(input.value)) {
                input.value = input.value.slice(0, -1); // Prevent invalid characters
            }
        }

        function ensurePrefix() {
            const input = document.getElementById('mobile_no');
            const prefix = '+61 ';
            
            if (!input.value.startsWith(prefix)) {
                input.value = prefix;
            }
        }
      </script>

{{-- <script>
  function openTab(event, tabId) {
    // Get all elements with class="tab-content" and hide them
    var tabContents = document.getElementsByClassName("tab-content");
    for (var i = 0; i < tabContents.length; i++) {
      tabContents[i].classList.remove("active");
    }

    // Get all elements with class="tab-button" and remove the class "active"
    var tabButtons = document.getElementsByClassName("tab-button");
    for (var i = 0; i < tabButtons.length; i++) {
      tabButtons[i].classList.remove("active");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(tabId).classList.add("active");
    if (event) {
      event.currentTarget.classList.add("active");
    }
  }

  // Automatically switch tabs
  var currentTab = 0;
  var tabs = document.getElementsByClassName('tab-button');
  var tabIds = ['story', 'mission', 'vision', 'values'];

  function autoSwitchTabs() {
    currentTab = (currentTab + 1) % tabs.length;
    openTab(null, tabIds[currentTab]);
    tabs[currentTab].classList.add('active');
  }

  setInterval(autoSwitchTabs, 7000); // Change tab every 5 seconds
</script> --}}


  
</html>


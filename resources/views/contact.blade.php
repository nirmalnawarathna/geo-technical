<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />

    <title>GEO Technical</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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

        .container__right img {
            display: flex;
            width: 338px;
        }

        .page_topic h2{
            font-weight: 600;
            margin-bottom: 20px;
        }

        .page_topic p {
            color: #666;
            margin-bottom: 40px;
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
               /* margin-bottom: 2rem; */
                font-size: 2.5rem;
                font-weight: 700;
                /* line-height: 4.5rem; */
                color: var(--text-dark);
        }

        .container__left .btn {
            padding: 1rem 12rem;
            letter-spacing: 2px;
            color: var(--white);
            background-color: var(--text-dark);
            /* border-radius: 5rem; */
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
                padding: 10px;
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
                padding: 4px;
                padding-left: 192px;
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
            <li><a href="#">About</a></li>
            <li><a href="#">Service</a></li>
            <li><a href="#">Estimate</a></li>
            <li><a href="{{ route('contact') }}">Contact Us</a></li>
            <li><button class="nav-button" onclick="location.href='{{ route('login') }}'">Job Operation</button></li>
            <li><button class="nav-button" onclick="location.href='{{ route('admin_login') }}'">Admin</button></li>
        </ul>

    </nav>
    {{-- <div>
        <form>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
              </div>
            </div>
            <div class="form-group">
              <label for="inputAddress">Address</label>
              <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
            </div>
            <div class="form-group">
              <label for="inputAddress2">Address 2</label>
              <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" id="inputCity">
              </div>
              <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <select id="inputState" class="form-control">
                  <option selected>Choose...</option>
                  <option>...</option>
                </select>
              </div>
              <div class="form-group col-md-2">
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control" id="inputZip">
              </div>
            </div>
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                  Check me out
                </label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Sign in</button>
          </form>
    </div> --}}
    <div class="container">
        <div class="container__left">
            <div class="page_topic">
                <h1>Contact us</h1>
                <p>Subheading for description or instructions</p>
            </div>
            <form>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">First Name</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Last Name">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Last Name</label>
                    <input type="text" class="form-control" id="inputPassword4" placeholder="Last Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputAddress">Email</label>
                  <input type="email" class="form-control" id="inputAddress" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="inputAddress2">Your Messege</label>
                  <textarea type="text" class="form-control" id="inputAddress2" placeholder="" rows="4" cols="50"></textarea>
                </div>
                
                
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
        <div class="container__right">
            
            <img src="https://c.stocksy.com/a/RDCI00/z9/4336865.jpg" alt="" width="1000px" height="auto">
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

    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
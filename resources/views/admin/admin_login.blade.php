<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: right;  /* right */
            padding-right: 10%;
            align-items: center;
            min-height: 100vh;
            background-image: url('./image/Fb-Cover_5.jpg');
            background-size: cover;
        }

        .login-box {
            display: flex;
            justify-content: center;
            flex-direction: column;
            width: 440px;
            height: 480px;
            padding: 30px;
            box-shadow: 0px 5px 10px 1px rgba(245, 184, 54, 0.3);
        }

        .login-header {
            text-align: center;
            margin: 20px 0 40px 0;
        }

        .login-header header {
            color: #333;
            font-size: 30px;
            font-weight: 600;
        }

        .input-box .input-field {
            width: 100%;
            height: 60px;
            font-size: 17px;
            padding: 0 25px;
            margin-bottom: 15px;
            border-radius: 10px;
            border: none;
            box-shadow: 0px 5px 10px 1px rgba(0, 0, 0, 0.05);
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
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        section a {
            color: #555;
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
    </style>
</head>

<body>


    <img src="image/geo.png" alt="" width="200px" height="auto" class="top-left-image">

    <div class="login-box" style="background-color: #e6e6e68c; border-radius: 10px;">

        <form method="POST" action="{{ route('admin_login') }}">
            <div class="login-header">
                <header style="color: #000000">Admin Login</header>
            </div>
            @csrf
            <!-- Email input -->
            <div class="input-box">

                <input name="name" id="form3Example3" class="input-field" placeholder="User Name" required />

            </div>

            <!-- Password input -->
            <div class="input-box">

                <input type="password" name="password" id="password" class="input-field" placeholder="password"
                    required />

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
                    style="padding-left: 2.5rem; padding-right: 2.5rem; font-size: 17px; font-weight: 500;  color:#fff">Login</button>
            </div>
            <br/>
            {{-- <div style="text-align: center; color: #565D6D; font-size: 14px; font-family: Inter; font-weight: 400; line-height: 22px; word-wrap: break-word">OR</div> --}}
            <div style=" border: 1px #DEE1E6 solid"></div>
            {{-- <div style=" text-align: center"><span style="color: #323743; font-size: 14px; font-family: Inter; font-weight: 400; line-height: 22px; word-wrap: break-word">Create an account? </span><span style="color: #262D59; font-size: 14px; font-family: Inter; font-weight: 700; line-height: 22px; word-wrap: break-word"><a href="{{ route('admin_admin_signup') }}" style="color: #323743; text-decoration: none"> Sign up here </a></span></div> --}}
        </form>
        
    </div>
</body>

</html>

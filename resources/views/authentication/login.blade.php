<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doc Me </title>
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <!-- Favicons -->
   <link href="{{ asset('imgs/icon.png') }}" rel="icon">
   <link href="{{ asset('imgs/docme_logo.png') }}" rel="apple-touch-icon">

</head>
<body>
    @if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ $errors->first() }}', // Displays the first error from the validation
        });
    </script>
@endif
  <div class="container">
      <div class="form-box login">
        <form action="{{ route('login.authenticate') }}" method="POST">
            @csrf
            <h1>Login</h1>
            <div class="input-box">
                <input type="email" placeholder="Email" name="email" required>
                <i class='bx bx-envelope' ></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="password" required>
                <i class='bx bx-lock'></i>
            </div>
            <div class= "forget-link">
                <a href="#">Forgot Password?</a>
            </div>
            <button type="submit" class="btn">Login</button>
            <p> or login with social platforms</p>
            <div class="social-icons">
                <a href=""><i class='bx bxl-google'></i></a>
                <a href=""><i class='bx bxl-facebook-circle'></i></a>
                <a href=""><i class='bx bxl-twitter' ></i></a>
                <a href=""><i class='bx bxl-linkedin-square' ></i></a>
            </div>
        </form>
      </div>

      <div class="form-box register">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <h1>Registration</h1>
            <div class="input-box">
                <input type="text" placeholder="First Name" name="fname" required>
                <i class='bx bxs-user-detail'></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Last Name" name="lname" required>
                <i class='bx bxs-user-detail'></i>
            </div>
            <div class="input-box">
                <input type="email" placeholder="Email" name="email" required>
                <i class='bx bx-envelope' ></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="pass" required>
                <i class='bx bx-lock'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Comfirm Password" name="cpass"  required>
                <i class='bx bx-lock'></i>
            </div>
            <button type="submit" class="btn">Register</button>
            <p> or register with social platforms</p>
            <div class="social-icons">
                <a href=""><i class='bx bxl-google'></i></a>
                <a href=""><i class='bx bxl-facebook-circle'></i></a>
                <a href=""><i class='bx bxl-twitter' ></i></a>
                <a href=""><i class='bx bxl-linkedin-square' ></i></a>
            </div>
        </form>
      </div>

      <div class="toggle-box">
         <div class ="toggle-panel toggle-left">
            <img src="{{ asset('imgs/docme_logo.png') }}" alt="DocME Logo" class="logo" width="150" height="50">
            <br>
            <h2> Hello, Welcome to DocME<h2>
            <p> Don't have  an account ?</p>
            <button class="btn register-btn"> Register</button>
         </div>

         <div class ="toggle-panel toggle-right">

            <img src="{{ asset('imgs/docme_logo.png') }}" alt="DocME Logo" class="logo" width="150" height="50">
            <br>
            <h2>Welcome Back <h2>
            <p> Already have an account ?</p>
            <button class="btn login-btn"> Login</button>
         </div>
      </div>
  </div>
  <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OTP Verification</title>

  <!-- Add Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <!-- Favicons -->
 <link href="{{ asset('imgs/icon.png') }}" rel="icon">
 <link href="{{ asset('imgs/docme_logo.png') }}" rel="apple-touch-icon">

  <style>
    body {
      background: linear-gradient(90deg, rgb(92, 0, 131), rgb(241, 106, 214));
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      font-family: 'Arial', sans-serif;

    }

    .form-box {
      background: #fff;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      width: 100%;
    }

    .form-box h2 {
      font-size: 1.5rem;
      margin-bottom: 1rem;
      color: #333;
      text-align: center;
    }

    .form-box .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
      transition: 0.3s;
    }

    .form-box .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }

    .form-box input {
      border-radius: 5px;
      padding: 0.5rem;
      margin-bottom: 1rem;
    }

    .form-box .alert {
      margin-bottom: 1rem;
    }

    .form-box p {
      font-size: 0.875rem;
      color: #666;
      text-align: center;
      margin-top: 1rem;
    }
  </style>
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

  <div class="form-box">
    <!-- Display success message -->
    @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif

    <!-- Display validation error -->
    @if ($errors->any())
      <div class="alert alert-danger">
        {{ $errors->first() }}
      </div>
    @endif

    <!-- OTP Form -->
    <h2>Verify Your Email</h2>
    <p>We've sent an OTP to your registered email. Please enter it below to verify your account.</p>
    <form action="{{route('verify-otp')}}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="otp" class="form-label">Enter OTP</label>
        <input type="text" name="otp" id="otp" class="form-control" placeholder="Enter your OTP" required>
        <input type="hidden" name="email" value="{{ $email }}">
      </div>
      <button type="submit" class="btn btn-primary w-100">Verify OTP</button>
    </form>

    <p>Didn't receive the OTP? <a href="#" class="text-primary">Resend</a></p>
  </div>

  <!-- Add Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

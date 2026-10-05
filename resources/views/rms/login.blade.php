<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sign in | Admin Panel</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
<link href="{{ asset('assets/css/login.css') }}" rel="stylesheet">
<link rel="shortcut icon" type="image/jpg" href="{{ asset('assets/images/icon.png') }}"/>
</head>
<body class="auth">

  <div class="auth-card">
    <div class="auth-head bg-g-pink">
      <h4>Sign in</h4>
    </div>
    @if (session('error'))
      <div class="alert auth-alert alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-circle-fill me-2"></i>
        <span>{{ session('error') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <form id="loginForm" class="needs-validation" novalidate method="POST" action="{{ route('rms.loggedin') }}">
      @csrf
      <div class="mb-3">
        <input type="text" name="username" class="form-control auth-input" placeholder="Mobile Number/Email" aria-label="Email" required>
        <div class="invalid-feedback">Enter a valid mobile number or email address.</div>
      </div>

      <div class="mb-3 pw-wrap">
        <input type="password" name="password" id="pw" class="form-control auth-input" placeholder="PIN" aria-label="Password" required minlength="4" maxlength="4" pattern="[0-9]{4}">
        <button type="button" class="pw-toggle" id="pwToggle" aria-label="Show password"><i class="bi bi-eye"></i></button>
        <div class="invalid-feedback">PIN must be 4 digits.</div>
      </div>

      <!-- <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="form-check form-switch mb-0">
          <input class="form-check-input" type="checkbox" id="remember">
          <label class="form-check-label text-secondary" for="remember">Remember me</label>
        </div>
        <a href="#" class="small text-secondary">Forgot password?</a>
      </div> -->

      <button type="submit" class="btn btn-gradient w-100 auth-btn">Sign in</button>

      <p class="text-center text-secondary mt-4 mb-0">
        Don't have an account? Contact with your administrator to create one.
      </p>
    </form>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // show / hide password
  const pw = document.getElementById('pw');
  document.getElementById('pwToggle').addEventListener('click', function () {
    const show = pw.type === 'password';
    pw.type = show ? 'text' : 'password';
    this.innerHTML = show ? '<i class="bi bi-eye-slash"></i>' : '<i class="bi bi-eye"></i>';
  });

  // validation (form submits to action only when valid)
  const form = document.getElementById('loginForm');
  form.addEventListener('submit', e => {
    if (!form.checkValidity()) { e.preventDefault(); e.stopPropagation(); }
    form.classList.add('was-validated');
  });
</script>
</body>
</html>
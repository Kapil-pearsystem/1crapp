<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<link rel="shortcut icon" type="image/jpg" href="https://admin.1crapp.com/images/icon.png"/>
<title>RMS · Tenant Login</title>
<style>
  :root {
    --navy: #2b5a80;
    --navy-dark: #234b6b;
    --ink: #1f2430;
    --label: #3d4756;
    --sub: #7c8794;
    --border: #e3e6ea;
    --bg: #eef1f4;
    --card-bg: #ffffff;
    --focus: #2b5a80;
  }

  * { box-sizing: border-box; }

  html, body {
    height: 100%;
  }

  body {
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100%;
    background: var(--bg);
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
    color: var(--ink);
    padding: 32px 16px;
  }

  .card {
    width: 100%;
    max-width: 380px;
    background: var(--card-bg);
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(31, 36, 48, 0.08);
    padding: 40px 32px 32px;
    text-align: center;
  }

  .logo {
    width: 76px;
    height: 76px;
    border-radius: 50%;
    background: var(--navy);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    font-weight: 700;
    font-size: 22px;
    letter-spacing: 0.5px;
  }

  h1 {
    font-size: 22px;
    font-weight: 700;
    margin: 0 0 6px;
    color: var(--ink);
  }

  .subtitle {
    font-size: 14px;
    color: var(--sub);
    margin: 0 0 28px;
  }

  .field {
    text-align: left;
    margin-bottom: 18px;
  }

  .field label {
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: var(--label);
    margin-bottom: 8px;
  }

  .field input {
    width: 100%;
    padding: 13px 14px;
    font-size: 15px;
    border: 1px solid var(--border);
    border-radius: 8px;
    background: #fff;
    color: var(--ink);
    outline: none;
    transition: border-color 0.15s ease, box-shadow 0.15s ease;
  }

  .field input::placeholder {
    color: #a7afb9;
  }

  .field input:focus {
    border-color: var(--focus);
    box-shadow: 0 0 0 3px rgba(43, 90, 128, 0.15);
  }

  button.login-btn {
    width: 100%;
    padding: 14px;
    margin-top: 6px;
    border: none;
    border-radius: 8px;
    background: var(--navy);
    color: #fff;
    font-size: 15px;
    font-weight: 700;
    letter-spacing: 0.5px;
    cursor: pointer;
    transition: background 0.15s ease;
  }

  button.login-btn:hover {
    background: var(--navy-dark);
  }

  button.login-btn:focus-visible {
    outline: 3px solid rgba(43, 90, 128, 0.4);
    outline-offset: 2px;
  }

  .forgot {
    display: block;
    margin-top: 18px;
    font-size: 14px;
    color: var(--navy);
    text-decoration: none;
  }

  .forgot:hover {
    text-decoration: underline;
  }

  .footer {
    margin-top: 22px;
    font-size: 11px;
    color: #b9c0c9;
  }

  .footer .sep {
    margin: 0 6px;
  }

  .footer .brand {
    color: #8b94a0;
  }
.error-msg {
    display: none;
    color: #d64545;
    font-size: 12px;
    margin-top: 6px;
  }
  .field.invalid input {
    border-color: #d64545;
  }
  .field.invalid input:focus {
    box-shadow: 0 0 0 3px rgba(214, 69, 69, 0.15);
  }
  .field.invalid .error-msg {
    display: block;
  }
  @media (max-width: 400px) {
    .card {
      padding: 32px 22px 26px;
    }
  }
</style>
</head>
<body>

  <div class="card">
    <div class="logo">RMS</div>
    <h1>Tenant Login</h1>
    <p class="subtitle">View your rent and payment details</p>

   <form id="loginForm" novalidate method="POST" action="{{ route('rms.loggedin') }}">
        @csrf
        <div class="field">
            <label for="mobile">Mobile Number/Email</label>
            <input type="text" id="mobile" name="username" placeholder="Enter mobile number/email" required>
            <span class="error-msg" id="mobileError"></span>
        </div>

        <div class="field">
            <label for="pin">4-Digit PIN</label>
            <input type="password" id="pin" name="password" placeholder="Enter PIN" inputmode="numeric" maxlength="4" pattern="[0-9]{4}" autocomplete="current-password" required>
            <span class="error-msg" id="pinError"></span>
        </div>

        <button type="submit" class="login-btn">LOGIN</button>
    </form>

    <a href="#" class="forgot">Forgot PIN?</a>

    <div class="footer">
      <span class="brand">RMS</span><span class="sep">•</span><span class="brand">Ramjee Enterprises</span>
    </div>
  </div>

</body>

<script>
  (function () {
    const form = document.getElementById('loginForm');
    const mobileInput = document.getElementById('mobile');
    const pinInput = document.getElementById('pin');
    const mobileError = document.getElementById('mobileError');
    const pinError = document.getElementById('pinError');

    const mobileRegex = /^[6-9]\d{9}$/;               // 10-digit Indian mobile, adjust as needed
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const pinRegex = /^\d{4}$/;

    function setError(input, errorEl, message) {
      input.closest('.field').classList.add('invalid');
      errorEl.textContent = message;
    }

    function clearError(input, errorEl) {
      input.closest('.field').classList.remove('invalid');
      errorEl.textContent = '';
    }

    function validateMobile() {
      const val = mobileInput.value.trim();
      if (!val) {
        setError(mobileInput, mobileError, 'Mobile number or email is required.');
        return false;
      }
      if (!mobileRegex.test(val) && !emailRegex.test(val)) {
        setError(mobileInput, mobileError, 'Enter a valid 10-digit mobile number or email address.');
        return false;
      }
      clearError(mobileInput, mobileError);
      return true;
    }

    function validatePin() {
      const val = pinInput.value.trim();
      if (!val) {
        setError(pinInput, pinError, 'PIN is required.');
        return false;
      }
      if (!pinRegex.test(val)) {
        setError(pinInput, pinError, 'PIN must be exactly 4 digits.');
        return false;
      }
      clearError(pinInput, pinError);
      return true;
    }

    // Only allow digits in the PIN field as the user types
    pinInput.addEventListener('input', function () {
      this.value = this.value.replace(/\D/g, '').slice(0, 4);
    });

    mobileInput.addEventListener('blur', validateMobile);
    pinInput.addEventListener('blur', validatePin);

    form.addEventListener('submit', function (e) {
      const isMobileValid = validateMobile();
      const isPinValid = validatePin();

      if (!isMobileValid || !isPinValid) {
        e.preventDefault();
        return;
      }

      // Passed validation — form submits normally here.
      // If you're doing an AJAX/fetch submit to Laravel instead, e.preventDefault()
      // and handle the request here.
    });
  })();
</script>
</html>
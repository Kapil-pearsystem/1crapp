<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200;6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900&display=swap" rel="stylesheet">
  <title>RMS – Tenant Portal V1 Prototype</title>
  <link rel="shortcut icon" type="image/jpg" href="https://admin.1crapp.com/images/icon.png"/>
  <link href="{{ asset('rms/css/style.css') }}" rel="stylesheet" />
</head>

<body>
  @include('rms.layouts.header')
  <div id="tenantApp">
    <div class="layout">
      @include('rms.layouts.sidebar')
      <main class="main">
        <header class="header">
          <h1 id="headerTitle">My Dashboard</h1>
          <div class="user"><span>▯</span><span>98XXXXXX75</span><span>⌄</span>
            <div class="avatar">VY</div>
          </div>
        </header>
        @yield('content')

        <div class="footer">© 2026 RMS – Rent Management System. V1 Tenant Portal Prototype.</div>
      </main>
    </div>
  </div>
  <div class="modal" id="modal">
    <div class="modal-box">
      <h3 id="modalTitle">RMS</h3>
      <p id="modalText"></p><button class="close" onclick="closeModal()">Close</button>
    </div>
  </div>
</body>

<script>
  function confirmLogout() {
    if (confirm('Are you sure you want to logout?')) {
      window.location.href = "{{ route('rms.logout') }}";
    }
  }
</script>
</html>
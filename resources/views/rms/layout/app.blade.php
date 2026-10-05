<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dashboard | Admin Panel</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
<link rel="shortcut icon" type="image/jpg" href="{{ asset('assets/images/icon.png') }}"/>
</head>
<body data-page="dashboard" data-title="Dashboard">

@include('rms.layout.sidebar')
<main class="main">
@include('rms.layout.header')
@yield('content')
<footer class="page-foot">&copy; {{ date('Y') }} RMS Panel. Powered by <a href="https://1crapp.com" target="_blank">1crapp.com</a></footer>
</main>
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content text-center p-3">
      <div class="modal-body">
        <div class="logout-ico mb-3"><i class="bi bi-box-arrow-right"></i></div>
        <h5 class="fw-bold mb-1" id="logoutModalTitle">Logout?</h5>
        <p class="text-secondary small mb-4">Are you sure you want to logout?</p>
        <div class="d-flex gap-2 justify-content-center">
          <button type="button" class="btn btn-light flex-fill" data-bs-dismiss="modal">Cancel</button>
          <a href="{{ route('rms.logout') }}" class="btn btn-gradient flex-fill">Logout</a>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/lang.js') }}"></script>
</body>
</html>

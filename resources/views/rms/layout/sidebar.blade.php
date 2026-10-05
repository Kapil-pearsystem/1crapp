<aside class="sidebar" id="sidebar">
  <a  href="{{ route('rms.dashboard') }}" class="brand text-white"><img src="{{ asset('assets/images/rms-logo.png') }}" alt="Logo" class="img-fluid"></a>
  <nav class="nav flex-column">
    <a class="nav-link {{ request()->routeIs('rms.dashboard') ? 'active' : '' }}" href="{{ route('rms.dashboard') }}"><i class="bi bi-grid-fill"></i>Dashboard</a>
    <a class="nav-link {{ request()->routeIs('rms.my-property') ? 'active' : '' }}" href="{{ route('rms.my-property') }}"><i class="bi bi-table"></i>Property</a>
    <a class="nav-link {{ request()->routeIs('rms.my-payments') ? 'active' : '' }}" href="{{ route('rms.my-payments') }}"><i class="bi bi-ui-checks"></i>Rent & Payments</a>
    <!-- <a class="nav-link" href="#"><i class="bi bi-receipt"></i>Billing</a>
    <a class="nav-link" href="#"><i class="bi bi-person-fill"></i>Profile</a> -->
  </nav>
  <div class="upgrade">
    <button type="button" class="btn btn-gradient w-100" data-bs-toggle="modal" data-bs-target="#logoutModal">
        <i class="bi bi-box-arrow-right me-1"></i>Logout
    </button>
</div>
</aside>
<div class="backdrop" id="backdrop"></div>
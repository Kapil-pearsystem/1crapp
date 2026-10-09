@php 
 $user = Session::get('tenent_login');
  $tenant = \App\Models\TenantModel::find($user['id']);
@endphp
<header class="topbar">
  <div class="d-flex align-items-center gap-3">
    <button class="icon-btn d-xl-none fs-3" id="menuBtn" aria-label="Open menu"><i class="bi bi-list"></i></button>
    <div>
      <!-- <h6>Dashboard</h6> -->
    </div>
  </div>

  <div class="topbar-right ms-auto">
    <!-- <input class="form-control search d-none d-md-block" type="search" placeholder="Type here..." aria-label="Search"> -->

    <!-- Top menus (desktop) -->
    <ul class="nav top-menu d-none d-lg-flex">
        @include('rms.layout.header-menu')
    </ul>

    <!-- Settings -->
    <!-- <div class="dropdown">
      <button class="icon-btn" data-bs-toggle="dropdown" aria-label="Settings"><i class="bi bi-gear-fill"></i></button>
      <ul class="dropdown-menu dropdown-menu-end shadow border-0">
        <li><a class="dropdown-item" href="#"><i class="bi bi-sliders"></i>Preferences</a></li>
        <li><a class="dropdown-item" href="#"><i class="bi bi-shield-lock"></i>Security</a></li>
        <li><a class="dropdown-item" href="#"><i class="bi bi-credit-card"></i>Billing</a></li>
      </ul>
    </div> -->
    <div class="lang-switch" role="group" aria-label="Language">
        <button type="button" class="lang-btn active" data-lang="en">EN</button>
        <button type="button" class="lang-btn" data-lang="hi">हिं</button>
    </div>
    <!-- Notifications -->
    <div class="dropdown">
      <button class="icon-btn" data-bs-toggle="dropdown" aria-label="Notifications"><i class="bi bi-bell-fill"></i><span class="dot">3</span></button>
      <div class="dropdown-menu dropdown-menu-end shadow border-0 notif-menu p-0">
        <div class="d-flex justify-content-between align-items-center px-3 py-2 border-bottom">
          <strong>Notifications</strong><a href="#" class="small">Mark all read</a>
        </div>
        <a class="dropdown-item notif" href="#"><span class="n-ico bg-g-pink"><i class="bi bi-cart-fill"></i></span><span><b>New order received</b><small>2 min ago</small></span></a>
        <a class="dropdown-item notif" href="#"><span class="n-ico bg-g-green"><i class="bi bi-check-lg"></i></span><span><b>Payment completed</b><small>1 hour ago</small></span></a>
        <a class="dropdown-item notif" href="#"><span class="n-ico bg-g-blue"><i class="bi bi-person-plus-fill"></i></span><span><b>New user registered</b><small>Yesterday</small></span></a>
        <a class="dropdown-item text-center small py-2 border-top" href="#">View all</a>
      </div>
    </div>

    <!-- User -->
    <div class="dropdown">
      <a href="#" class="user-btn" data-bs-toggle="dropdown">
        <!-- <span class="avatar bg-g-pink">A</span> -->
         <img
            src="{{ $tenant->profile ? $tenant->profile : 'https://ui-avatars.com/api/?background=random&name=' . urlencode($tenant->name) }}"
            alt="Profile" class="rounded-circle border"
            style="width:35px;height:35px;object-fit:cover;">
        <i class="bi bi-chevron-down small d-none d-sm-inline"></i>
      </a>
      <ul class="dropdown-menu dropdown-menu-end shadow border-0">
        <li><a class="dropdown-item" href="{{ route('rms.profile') }}"><i class="bi bi-person"></i>My profile</a></li>
        <li><a class="dropdown-item" href="{{ route('rms.pin') }}"><i class="bi bi-key"></i>Setting</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item text-danger" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal"><i class="bi bi-box-arrow-right"></i>Sign out</a></li>
      </ul>
    </div>
  </div>
</header>
<aside class="sidebar">
    <div class="logo">
        <div class="logo-home">⌂</div>
        <div class="logo-title">RMS</div>
        <div class="logo-sub">Tenant Portal</div>
    </div>
    <nav class="menu">
        <div class="menu-item {{ request()->routeIs('rms.dashboard') ? 'active' : '' }}" onclick="window.location.href='{{ route('rms.dashboard') }}'"><span class="menu-icon">▣</span><span>My Dashboard</span></div>
        <div class="menu-item {{ request()->routeIs('rms.rent') ? 'active' : '' }}" onclick="window.location.href='{{ route('rms.rent') }}'"><span class="menu-icon">₹</span><span>My Rent</span></div>
        <div class="menu-item {{ request()->routeIs('rms.my-payments') ? 'active' : '' }}" onclick="window.location.href='{{ route('rms.my-payments') }}'"><span class="menu-icon">▣</span><span>My Payments</span></div>
        <div class="menu-item" data-screen="statements"><span class="menu-icon">▤</span><span>My Statements</span></div>
        <div class="menu-item" data-screen="meter"><span class="menu-icon">⌁</span><span>Meter Reading</span></div>
        <div class="menu-item" data-screen="agreement"><span class="menu-icon">✎</span><span>Rent Agreement</span><span class="soon">Coming Soon</span></div>
        <div class="menu-item" data-screen="deposit"><span class="menu-icon">▣</span><span>Security Deposit</span><span class="soon">Coming Soon</span></div>
        <div class="menu-item" data-screen="profile"><span class="menu-icon">♙</span><span>My Profile</span></div>
        <div class="menu-item" data-screen="settings"><span class="menu-icon">⚙</span><span>Settings</span></div>
        <div class="menu-item" onclick="confirmLogout()"><span class="menu-icon">⇥</span><span>Logout</span></div>
    </nav>
</aside>
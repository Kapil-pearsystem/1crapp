<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200;6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900&display=swap" rel="stylesheet">
  <title>RMS – Tenant Portal V1 Prototype</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Nunito Sans', sans-serif;
    }

    body {
      background: #f6f8fb;
      color: #182230;
      font-size: 13px
    }

    .layout {
      display: flex;
      min-height: 100vh;
    }

    /* ========================= TOP BLUE BAR ========================== */
    .top-bar {
      height: auto;
      background: #245a99;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 8px 15px;
      gap: 20px;
      font-size: 13px;
      font-weight: 600;
    }

    .top-item {
      display: flex;
      align-items: center;
      gap: 4px;
      white-space: nowrap;
    }

    .top-item svg {
      width: 13px;
      height: 13px;
      fill: currentColor;
    }

    /* Red play/help button */
    .help-play {
      width: 18px;
      height: 18px;
      background: #ff4056;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .help-play svg {
      width: 12px;
      height: 12px;
      fill: white;
      margin-left: 2px;
    }

    /* =========================       MAIN NAVBAR    ========================== */
    .main-nav {
      height: 76px;
      background: #fff;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 35px 0 45px;
      border-bottom: 1px solid #eee;
    }

    /* =========================       LOGO    ========================== */
    .logoss {
      width: 50px;
      height: 55px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .logoss .logo {
      padding: 0;
      border-bottom: none;
      margin-bottom: 0;
      width: 60px;
    }

    /* =========================       RIGHT NAV    ========================== */
    .nav-right {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .nav-menu {
      display: flex;
      align-items: center;
      gap: 20px;
    }

    .dropdown {
      position: relative;
    }

    .dropdown-btn {
      border: none;
      background: transparent;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 5px;
      font-size: 15px;
      color: #111;
      padding: 28px 0;
      font-weight: 500;
    }

    .dropdown-arrow {
      width: 11px;
      height: 11px;
      transition: transform 0.2s ease;
    }

    .dropdown:hover .dropdown-arrow {
      transform: rotate(180deg);
    }

    /* =========================       DROPDOWN MENU    ========================== */
    .dropdown-menu {
      position: absolute;
      top: 67px;
      left: -15px;
      min-width: 190px;
      background: #fff;
      border-radius: 5px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.14);
      border: 1px solid #eee;
      opacity: 0;
      visibility: hidden;
      transform: translateY(8px);
      transition: all 0.2s ease;
      z-index: 1000;
      padding: 8px 0;
    }

    .dropdown:hover .dropdown-menu {
      opacity: 1;
      visibility: visible;
      transform: translateY(0);
    }

    .dropdown-menu a {
      display: block;
      text-decoration: none;
      color: #333;
      padding: 11px 18px;
      font-size: 14px;
      transition: 0.2s;
    }

    .dropdown-menu a:hover {
      background: #f2f6fb;
      color: #245a99;
    }

    /* =========================       BUTTONS    ========================== */
    .login-btn,
    .register-btn {
      border: none;
      cursor: pointer;
      font-size: 14px;
      font-weight: 600;
      height: 40px;
      padding: 0 23px;
      border-radius: 24px;
    }

    .login-btn {
      background: #245a99;
      color: white;
    }

    .register-btn {
      background: #ff4056;
      color: white;
    }

    .login-btn:hover {
      background: #174d89;
    }

    .register-btn:hover {
      background: #ec3047;
    }

    /* =========================       MOBILE    ========================== */
    .mobile-menu {
      display: none;
      cursor: pointer;
      border: none;
      background: transparent;
    }

    .mobile-menu svg {
      width: 28px;
      height: 28px;
    }

    @media (max-width: 800px) {
      .top-bar {
        padding: 0 15px;
        gap: 15px;
        font-size: 12px;
      }

      .top-item:nth-child(2),
      .top-item:nth-child(3) {
        display: none;
      }

      .main-nav {
        height: 70px;
        padding: 0 20px;
      }

      .nav-right {
        display: none;
      }

      .mobile-menu {
        display: block;
      }
    }

    .sidebar {
      width: 175px;
      background: linear-gradient(180deg, #102b3a, #071b28);
      color: #fff;
      padding: 16px 5px;
      flex-shrink: 0
    }

    .logo {
      padding: 2px 15px 18px;
      border-bottom: 1px solid #ffffff1f;
      margin-bottom: 10px
    }

    .logo-home {
      font-size: 25px
    }

    .logo-title {
      font-size: 20px;
      font-weight: 700
    }

    .logo-sub {
      font-size: 10px;
      color: #cbd5dc
    }

    .menu {
      display: flex;
      flex-direction: column;
      gap: 2px
    }

    .menu-item {
      padding: 9px 14px;
      border-radius: 5px;
      font-size: 11px;
      display: flex;
      align-items: center;
      gap: 8px;
      cursor: pointer;
      color: #e5edf2;
      min-height: 34px
    }

    .menu-item:hover {
      background: #ffffff14
    }

    .menu-item.active {
      background: #07985a;
      color: #fff;
      font-weight: 700
    }

    .menu-icon {
      width: 14px;
      text-align: center
    }

    .soon {
      margin-left: auto;
      font-size: 7px;
      background: #477aa5;
      padding: 3px 5px;
      border-radius: 7px
    }

    .main {
      flex: 1;
      padding: 0 18px 24px;
      min-width: 0
    }

    .header {
      height: 58px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 1px solid #e2e7ed;
      margin-bottom: 12px
    }

    .header h1 {
      font-size: 15px
    }

    .user {
      display: flex;
      align-items: center;
      gap: 9px;
      font-size: 11px
    }

    .avatar {
      width: 30px;
      height: 30px;
      border-radius: 50%;
      background: #eaf2fb;
      color: #24649b;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700
    }

    .screen {
      display: none
    }

    .screen.active {
      display: block
    }

    .card {
      background: #fff;
      border: 1px solid #e0e5eb;
      border-radius: 6px;
      box-shadow: 0 1px 2px #00000005
    }

    .grid-top {
      display: grid;
      grid-template-columns: 240px 1fr;
      gap: 10px
    }

    .property {
      padding: 14px;
      display: flex;
      align-items: center;
      gap: 13px;
      min-height: 112px
    }

    .prop-icon {
      width: 58px;
      height: 58px;
      border-radius: 50%;
      background: #def5e9;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 27px
    }

    .property h2 {
      font-size: 14px;
      margin-bottom: 7px
    }

    .property p {
      font-size: 11px;
      margin-bottom: 6px
    }

    .green {
      color: #087b45;
      font-weight: 700
    }

    .month {
      padding: 13px 15px
    }

    .month-title {
      font-size: 14px;
      font-weight: 700;
      margin-bottom: 13px
    }

    .summary {
      display: grid;
      grid-template-columns: repeat(4, 1fr)
    }

    .sum {
      text-align: center;
      border-right: 1px solid #e5e7eb
    }

    .sum:last-child {
      border: 0
    }

    .label {
      font-size: 10px;
      margin-bottom: 7px
    }

    .value {
      font-size: 18px;
      font-weight: 700
    }

    .red {
      color: #ed3b3b
    }

    .paid {
      color: #138848
    }

    .status {
      display: inline-block;
      border: 1px solid #f29b37;
      background: #fff7e9;
      color: #e87800;
      border-radius: 5px;
      padding: 4px 7px;
      font-size: 8px;
      font-weight: 700
    }

    .date {
      font-size: 10px;
      margin-top: 7px
    }

    .dashboard-grid {
      display: grid;
      grid-template-columns: 1.25fr .72fr .9fr .8fr;
      gap: 10px;
      margin-top: 10px
    }

    .card-head {
      padding: 12px 13px;
      font-size: 12px;
      font-weight: 700;
      border-bottom: 1px solid #e8edf2
    }

    .card-body {
      padding: 10px 13px
    }

    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 9px
    }

    th {
      background: #f5f7fa;
      padding: 8px 6px;
      text-align: left;
      font-size: 9px
    }

    td {
      padding: 8px 6px;
      border-bottom: 1px solid #edf0f3
    }

    td:last-child,
    th:last-child {
      text-align: right
    }

    .total td {
      font-weight: 700;
      font-size: 12px;
      border-top: 1px solid #cfd6de;
      border-bottom: 0;
      padding-top: 11px
    }

    .e-row {
      display: flex;
      justify-content: space-between;
      padding: 9px 0;
      border-bottom: 1px solid #edf0f3;
      font-size: 10px
    }

    .e-row:last-child {
      border: 0
    }

    .e-total {
      font-weight: 700;
      font-size: 11px
    }

    .success {
      background: #e4f7ec;
      color: #168548;
      padding: 4px 5px;
      border-radius: 5px;
      font-size: 8px
    }

    .link {
      color: #1765bd;
      cursor: pointer
    }

    .quick {
      display: flex;
      align-items: center;
      gap: 9px;
      padding: 12px 2px;
      border-bottom: 1px solid #edf0f3;
      font-size: 10px;
      color: #1765bd;
      cursor: pointer
    }

    .quick:last-child {
      border: 0
    }

    .qicon {
      width: 22px;
      text-align: center;
      font-size: 15px
    }

    .bottom-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 10px;
      margin-top: 10px
    }

    .info {
      padding: 14px
    }

    .info h3 {
      font-size: 12px;
      margin-bottom: 9px
    }

    .info p {
      font-size: 10px;
      color: #64748b;
      line-height: 1.6
    }

    .future-items {
      display: flex;
      gap: 8px;
      flex-wrap: wrap
    }

    .future {
      border: 1px dashed #cbd5e1;
      border-radius: 5px;
      padding: 9px 10px;
      font-size: 9px;
      color: #64748b;
      cursor: pointer
    }

    .future span {
      display: block;
      color: #e78317;
      font-size: 7px;
      margin-top: 4px
    }

    .page-card {
      padding: 16px
    }

    .page-title {
      font-size: 17px;
      font-weight: 700;
      margin-bottom: 4px
    }

    .page-sub {
      font-size: 10px;
      color: #64748b;
      margin-bottom: 15px
    }

    .page-actions {
      display: flex;
      gap: 8px;
      flex-wrap: wrap;
      margin-bottom: 14px
    }

    .btn {
      border: 1px solid #d5dde6;
      background: #fff;
      border-radius: 5px;
      padding: 8px 12px;
      font-size: 10px;
      cursor: pointer
    }

    .btn.primary {
      background: #1769b0;
      color: #fff;
      border-color: #1769b0
    }

    .filterbar {
      display: flex;
      gap: 8px;
      margin-bottom: 10px
    }

    .filterbar input,
    .filterbar select {
      border: 1px solid #d8e0e8;
      border-radius: 5px;
      padding: 8px;
      font-size: 10px;
      background: #fff
    }

    .stat-cards {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 9px;
      margin-bottom: 10px
    }

    .stat {
      padding: 13px
    }

    .stat small {
      font-size: 9px;
      color: #64748b
    }

    .stat strong {
      display: block;
      font-size: 17px;
      margin-top: 6px
    }

    .badge {
      padding: 4px 6px;
      border-radius: 5px;
      font-size: 8px
    }

    .badge.p {
      background: #e4f7ec;
      color: #168548
    }

    .badge.partial {
      background: #fff4df;
      color: #c96b00
    }

    .rule {
      background: #f8fafc;
      border: 1px solid #e4eaf0;
      border-radius: 5px;
      padding: 12px;
      margin-top: 12px
    }

    .rule h4 {
      font-size: 11px;
      margin-bottom: 8px
    }

    .rule-row {
      display: flex;
      justify-content: space-between;
      padding: 7px 0;
      border-bottom: 1px solid #e8edf2;
      font-size: 10px
    }

    .rule-row:last-child {
      border: 0
    }

    .alert {
      padding: 11px 12px;
      border-radius: 5px;
      background: #fff7e9;
      border: 1px solid #f6d39b;
      color: #8a5a00;
      font-size: 10px;
      margin-bottom: 12px
    }

    .profile-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 10px
    }

    .field {
      padding: 11px;
      background: #f8fafc;
      border: 1px solid #e4eaf0;
      border-radius: 5px
    }

    .field label {
      display: block;
      color: #64748b;
      font-size: 9px;
      margin-bottom: 5px
    }

    .field strong {
      font-size: 11px
    }

    .deposit-box {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 10px;
      margin-bottom: 14px
    }

    .deposit {
      padding: 15px;
      background: #f8fafc;
      border: 1px solid #e4eaf0;
      border-radius: 5px
    }

    .deposit span {
      font-size: 9px;
      color: #64748b
    }

    .deposit strong {
      display: block;
      font-size: 18px;
      margin-top: 7px
    }

    .footer {
      text-align: center;
      color: #94a3b8;
      font-size: 9px;
      margin-top: 18px
    }

    .modal {
      display: none;
      position: fixed;
      inset: 0;
      background: #0f172a73;
      align-items: center;
      justify-content: center;
      z-index: 10
    }

    .modal.show {
      display: flex
    }

    .modal-box {
      width: 350px;
      background: #fff;
      border-radius: 8px;
      padding: 22px;
      box-shadow: 0 10px 30px #0000002e
    }

    .modal-box h3 {
      font-size: 16px;
      margin-bottom: 8px;
      color: #174d80
    }

    .modal-box p {
      font-size: 11px;
      color: #64748b;
      line-height: 1.6
    }

    .close {
      margin-top: 15px;
      background: #245b93;
      color: #fff;
      border: 0;
      border-radius: 5px;
      padding: 8px 14px;
      cursor: pointer
    }

    @media(max-width:1050px) {
      .dashboard-grid {
        grid-template-columns: 1fr 1fr
      }

      .grid-top {
        grid-template-columns: 1fr
      }

      .bottom-grid {
        grid-template-columns: 1fr
      }
    }

    @media(max-width:760px) {
      .sidebar {
        width: 64px
      }

      .logo-title,
      .logo-sub,
      .menu-item span:not(.menu-icon),
      .soon {
        display: none
      }

      .menu-item {
        justify-content: center;
        padding: 10px 5px
      }

      .main {
        padding: 0 10px 20px
      }

      .summary {
        grid-template-columns: 1fr 1fr;
        gap: 12px
      }

      .sum {
        border: 0
      }

      .stat-cards {
        grid-template-columns: 1fr 1fr
      }

      .profile-grid,
      .deposit-box {
        grid-template-columns: 1fr
      }
    }
  </style>
</head>

<body>
  <div class="top-bar"> <!-- WhatsApp -->
    <div class="top-item"> <svg viewBox="0 0 24 24">
        <path d="M20.5 3.5A11.8 11.8 0 0 0 12.1 0C5.6 0 .4 5.2.4 11.7c0 2.1.6 4.2 1.7 6L.3 24l6.5-1.7c1.8 1 3.7 1.5 5.7 1.5h.1c6.4 0 11.7-5.2 11.7-11.7 0-3.1-1.3-6.2-3.8-8.6zM12.1 21.7c-1.8 0-3.6-.5-5.1-1.5l-.4-.2-3.8 1 1-3.7-.3-.4a9.7 9.7 0 1 1 8.6 4.8zm5.3-7.3c-.3-.2-1.8-.9-2.1-1-.3-.1-.5-.2-.7.2-.2.3-.8 1-.9 1.2-.2.2-.3.2-.6.1-1.7-.8-2.8-1.5-3.9-3.3-.3-.5.3-.5.8-1.7.1-.2 0-.4 0-.6 0-.2-.7-1.7-.9-2.3-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.6.1-.9.4-.3.3-1.1 1.1-1.1 2.6s1.1 3 1.3 3.2c.2.2 2.1 3.3 5.2 4.6 1.9.8 2.6.9 3.6.8.6-.1 1.8-.7 2.1-1.4.3-.7.3-1.3.2-1.4 0-.1-.2-.2-.5-.4z" />
      </svg> +91-996680133 </div> <!-- About Us -->
    <div class="top-item"> <svg viewBox="0 0 24 24">
        <path d="M12 12a5 5 0 1 0 0-10 5 5 0 0 0 0 10zm0 2c-4.4 0-8 2.2-8 5v2h16v-2c0-2.8-3.6-5-8-5z" />
      </svg> About Us </div> <!-- Play -->
    <div class="help-play"> <svg viewBox="0 0 24 24">
        <path d="M8 5v14l11-7z" />
      </svg> </div> <!-- Help -->
    <div class="top-item"> <svg viewBox="0 0 24 24">
        <path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20zm1 16h-2v-2h2v2zm2.1-7.2-.9.9c-.7.7-1.2 1.2-1.2 2.3h-2c0-1.4.5-2.2 1.5-3.2l1.1-1.1c.4-.4.6-.9.6-1.4 0-1-.8-1.8-2-1.8s-2 .8-2 2H8c0-2.2 1.7-4 4.1-4s4 1.5 4 3.7c0 .9-.4 1.8-1 2.6z" />
      </svg> Instant Help ? </div>
  </div><!-- =====================================================     MAIN NAVIGATION====================================================== -->
  <nav class="main-nav"> <!-- LOGO -->
    <div class="logoss"> <img class="logo" src="https://kapil.1crapp.com/home/img/logo 1.png" alt="Logo"> </div> <!-- RIGHT SIDE -->
    <div class="nav-right">
      <div class="nav-menu"> <!-- PRICE DROPDOWN -->
        <div class="dropdown"> <button class="dropdown-btn"> Price <svg class="dropdown-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="m6 9 6 6 6-6" />
            </svg> </button>
          <div class="dropdown-menu"> <a href="#">Pricing Plans</a> <a href="#">Monthly Plan</a> <a href="#">Yearly Plan</a> <a href="#">Enterprise</a> </div>
        </div> <!-- RESOURCES DROPDOWN -->
        <div class="dropdown"> <button class="dropdown-btn"> Resources &amp; Tools <svg class="dropdown-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="m6 9 6 6 6-6" />
            </svg> </button>
          <div class="dropdown-menu"> <a href="#">GST Calculator</a> <a href="#">EMI Calculator</a> <a href="#">Income Tax Calculator</a> <a href="#">Resources</a> <a href="#">Blog</a> </div>
        </div>
      </div> <!-- LOGIN --> <button class="login-btn">Login</button> <!-- REGISTER --> <button class="register-btn">Register Free</button>
    </div> <!-- MOBILE BUTTON --> <button class="mobile-menu"> <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M4 6h16M4 12h16M4 18h16" />
      </svg> </button>
  </nav>
  <div id="loginPage" style="min-height:100vh;background:#f4f7fb;display:flex;align-items:center;justify-content:center;padding:24px;">
    <div style="width:535px;max-width:100%;background:#fff;border-radius:16px;box-shadow:0 12px 35px rgba(20,45,70,.10);padding:44px 46px 42px;">
      <div style="width:88px;height:88px;border-radius:50%;background:#245b89;color:#fff;display:flex;align-items:center;justify-content:center;font-size:28px;font-weight:700;margin:0 auto 20px;">RMS</div>
      <h1 style="text-align:center;font-size:29px;color:#172333;margin-bottom:6px;">Tenant Login</h1>
      <p style="text-align:center;font-size:18px;color:#718096;margin-bottom:34px;">View your rent and payment details</p>

      <form id="tenantLoginForm">
        <label style="display:block;font-size:17px;color:#39485a;margin-bottom:8px;">Mobile Number</label>
        <input id="tenantMobile" type="tel" inputmode="numeric" maxlength="10" placeholder="Enter mobile number"
          style="width:100%;height:59px;border:1px solid #cfd4da;border-radius:8px;padding:0 17px;font-size:18px;outline:none;margin-bottom:23px;">

        <label style="display:block;font-size:17px;color:#39485a;margin-bottom:8px;">4-Digit PIN</label>
        <input id="tenantPin" type="password" inputmode="numeric" maxlength="4" placeholder="Enter PIN"
          style="width:100%;height:59px;border:1px solid #cfd4da;border-radius:8px;padding:0 17px;font-size:18px;outline:none;margin-bottom:23px;">

        <button type="submit"
          style="width:100%;height:58px;border:0;border-radius:8px;background:#245b89;color:#fff;font-size:18px;font-weight:700;cursor:pointer;">LOGIN</button>
      </form>

      <button id="forgotPinBtn" type="button"
        style="display:block;margin:23px auto 0;border:0;background:none;color:#145a91;font-size:16px;cursor:pointer;">Forgot PIN?</button>

      <div id="loginMessage" style="display:none;margin-top:16px;text-align:center;font-size:12px;color:#b45309;"></div>
      <div style="text-align:center;margin-top:27px;color:#9aa5b1;font-size:10px;">RMS • Ramjee Enterprises</div>
    </div>
  </div>

  <div id="tenantApp" style="display:none;">
    <div class="layout">
      <aside class="sidebar">
        <div class="logo">
          <div class="logo-home">⌂</div>
          <div class="logo-title">RMS</div>
          <div class="logo-sub">Tenant Portal</div>
        </div>
        <nav class="menu">
          <div class="menu-item active" data-screen="dashboard"><span class="menu-icon">▣</span><span>My Dashboard</span></div>
          <div class="menu-item" data-screen="rent"><span class="menu-icon">₹</span><span>My Rent</span></div>
          <div class="menu-item" data-screen="payments"><span class="menu-icon">▣</span><span>My Payments</span></div>
          <div class="menu-item" data-screen="statements"><span class="menu-icon">▤</span><span>My Statements</span></div>
          <div class="menu-item" data-screen="meter"><span class="menu-icon">⌁</span><span>Meter Reading</span></div>
          <div class="menu-item" data-screen="agreement"><span class="menu-icon">✎</span><span>Rent Agreement</span><span class="soon">Coming Soon</span></div>
          <div class="menu-item" data-screen="deposit"><span class="menu-icon">▣</span><span>Security Deposit</span><span class="soon">Coming Soon</span></div>
          <div class="menu-item" data-screen="profile"><span class="menu-icon">♙</span><span>My Profile</span></div>
          <div class="menu-item" data-screen="settings"><span class="menu-icon">⚙</span><span>Settings</span></div>
          <div class="menu-item" data-screen="logout"><span class="menu-icon">⇥</span><span>Logout</span></div>
        </nav>
      </aside>
      <main class="main">
        <header class="header">
          <h1 id="headerTitle">My Dashboard</h1>
          <div class="user"><span>▯</span><span>98XXXXXX75</span><span>⌄</span>
            <div class="avatar">VY</div>
          </div>
        </header>

        <section id="dashboard" class="screen active">
          <div class="grid-top">
            <div class="card property">
              <div class="prop-icon">🏢</div>
              <div>
                <h2>SKRM Manpur</h2>
                <p>Shop G-01 & G-02</p>
                <p>Tenant: <span class="green">Vikram Yogi</span></p>
              </div>
            </div>
            <div class="card month">
              <div class="month-title">August 2026</div>
              <div class="summary">
                <div class="sum">
                  <div class="label">Gross Rent Due</div>
                  <div class="value red">₹15,750</div>
                </div>
                <div class="sum">
                  <div class="label">Paid Amount</div>
                  <div class="value paid">₹14,750</div>
                </div>
                <div class="sum">
                  <div class="label">Balance</div>
                  <div class="value red">₹1,000</div>
                </div>
                <div class="sum">
                  <div class="label">Status</div><span class="status">PARTIAL PAYMENT</span>
                  <div class="date">Payment Date<br><b>12 Aug 2026</b></div>
                </div>
              </div>
            </div>
          </div>
          <div class="dashboard-grid">
            <div class="card">
              <div class="card-head">Bill Breakdown</div>
              <div class="card-body">
                <table>
                  <thead>
                    <tr>
                      <th>Particulars</th>
                      <th>Details</th>
                      <th>Amount (₹)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Basic Rent</td>
                      <td>Monthly Rent</td>
                      <td>13,100</td>
                    </tr>
                    <tr>
                      <td>Cleaning Charges</td>
                      <td>Monthly Cleaning</td>
                      <td>150</td>
                    </tr>
                    <tr>
                      <td>Electricity Charges</td>
                      <td>100 Units × ₹10.0</td>
                      <td>1,000</td>
                    </tr>
                    <tr>
                      <td class="red">Late Payment Penalty</td>
                      <td>10% of Basic Rent</td>
                      <td class="red">1,310</td>
                    </tr>
                    <tr class="total">
                      <td colspan="2">Total Amount Due</td>
                      <td>15,560</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card">
              <div class="card-head">Electricity Details</div>
              <div class="card-body">
                <div class="e-row"><span>Last Reading</span><strong>250</strong></div>
                <div class="e-row"><span>This Reading</span><strong>350</strong></div>
                <div class="e-row"><span>Units Consumed</span><strong>100 Units</strong></div>
                <div class="e-row"><span>Rate Per Unit</span><strong>₹10.0</strong></div>
                <div class="e-row e-total"><span>Electricity Bill</span><strong>₹1,000</strong></div>
              </div>
            </div>
            <div class="card">
              <div class="card-head">Recent Payments</div>
              <div class="card-body">
                <table>
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Amount</th>
                      <th>Mode</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>12 Aug 2026</td>
                      <td>14,750</td>
                      <td>Cash</td>
                      <td><span class="success">Success</span></td>
                    </tr>
                    <tr>
                      <td>05 Jul 2026</td>
                      <td>13,100</td>
                      <td>Cash</td>
                      <td><span class="success">Success</span></td>
                    </tr>
                    <tr>
                      <td>05 Jun 2026</td>
                      <td>13,100</td>
                      <td>Cash</td>
                      <td><span class="success">Success</span></td>
                    </tr>
                  </tbody>
                </table>
                <div style="text-align:right;margin-top:12px"><span class="link" data-screen-link="payments">View All Payments →</span></div>
              </div>
            </div>
            <div class="card">
              <div class="card-head">Quick Links</div>
              <div class="card-body">
                <div class="quick" data-screen-link="statements"><span class="qicon">📄</span>View Full Statement</div>
                <div class="quick" data-screen-link="payments"><span class="qicon">▣</span>Payment History</div>
                <div class="quick" data-screen-link="meter"><span class="qicon">🟧</span>Meter Reading History</div>
                <div class="quick" data-action="receipt"><span class="qicon">⇩</span>Download Receipt</div>
              </div>
            </div>
          </div>
          <div class="bottom-grid">
            <div class="card info">
              <h3>Your Rent Information</h3>
              <p>Your monthly rent, applicable charges, electricity consumption and penalty are automatically calculated according to the conditions set by the property owner.<br><br>If you have any question regarding your bill, please contact your landlord/property administrator.</p>
            </div>
            <div class="card info">
              <h3>More Services Coming Soon</h3>
              <div class="future-items">
                <div class="future" data-screen-link="agreement">Digital Rent Agreement<span>Coming Soon</span></div>
                <div class="future" data-screen-link="deposit">Security Deposit<span>Coming Soon</span></div>
                <div class="future" data-action="online">Online Payment<span>Coming Soon</span></div>
                <div class="future" data-action="whatsapp">WhatsApp Alerts<span>Coming Soon</span></div>
              </div>
            </div>
          </div>
        </section>

        <section id="rent" class="screen">
          <div class="card page-card">
            <div class="page-title">My Rent</div>
            <div class="page-sub">Month-wise rent calculation, charges and outstanding amount.</div>
            <div class="stat-cards">
              <div class="card stat"><small>Basic Rent</small><strong>₹13,100</strong></div>
              <div class="card stat"><small>Other Charges</small><strong>₹1,150</strong></div>
              <div class="card stat"><small>Penalty</small><strong class="red">₹1,310</strong></div>
              <div class="card stat"><small>Balance</small><strong class="red">₹1,000</strong></div>
            </div>
            <table>
              <thead>
                <tr>
                  <th>Particular</th>
                  <th>Calculation / Details</th>
                  <th>Amount</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Basic Rent</td>
                  <td>Monthly Rent</td>
                  <td>₹13,100</td>
                </tr>
                <tr>
                  <td>Cleaning Charges</td>
                  <td>Monthly Cleaning</td>
                  <td>₹150</td>
                </tr>
                <tr>
                  <td>Electricity</td>
                  <td>100 Units × ₹10</td>
                  <td>₹1,000</td>
                </tr>
                <tr>
                  <td>Late Payment Penalty</td>
                  <td>10% of Basic Rent</td>
                  <td class="red">₹1,310</td>
                </tr>
                <tr class="total">
                  <td colspan="2">Gross Amount Due</td>
                  <td>₹15,560</td>
                </tr>
                <tr>
                  <td colspan="2">Paid Amount</td>
                  <td class="paid">₹14,750</td>
                </tr>
                <tr class="total">
                  <td colspan="2">Outstanding Balance</td>
                  <td class="red">₹810</td>
                </tr>
              </tbody>
            </table>
            <div class="rule">
              <h4>Automatic Penalty Rule</h4>
              <div class="rule-row"><span>Payment on or before 5th</span><strong>No Penalty</strong></div>
              <div class="rule-row"><span>6th to 10th</span><strong>10% of Basic Rent</strong></div>
              <div class="rule-row"><span>11th to 15th</span><strong>25% of Basic Rent</strong></div>
              <div class="rule-row"><span>After 15th</span><strong>50% of Basic Rent</strong></div>
            </div>
          </div>
        </section>

        <section id="payments" class="screen">
          <div class="card page-card">
            <div class="page-title">My Payments</div>
            <div class="page-sub">Complete history of payments recorded by your property administrator.</div>
            <div class="page-actions"><button class="btn primary" data-action="receipt">Download Latest Receipt</button></div>
            <div class="filterbar"><input placeholder="Search month / date"><select>
                <option>All Modes</option>
                <option>Cash</option>
                <option>UPI</option>
              </select><select>
                <option>All Status</option>
                <option>Success</option>
                <option>Pending</option>
              </select></div>
            <table>
              <thead>
                <tr>
                  <th>Date</th>
                  <th>For Month</th>
                  <th>Amount</th>
                  <th>Mode</th>
                  <th>Status</th>
                  <th>Receipt</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>12 Aug 2026</td>
                  <td>August 2026</td>
                  <td>₹14,750</td>
                  <td>Cash</td>
                  <td><span class="badge p">Success</span></td>
                  <td><span class="link" data-action="receipt">View</span></td>
                </tr>
                <tr>
                  <td>05 Jul 2026</td>
                  <td>July 2026</td>
                  <td>₹13,100</td>
                  <td>Cash</td>
                  <td><span class="badge p">Success</span></td>
                  <td><span class="link" data-action="receipt">View</span></td>
                </tr>
                <tr>
                  <td>05 Jun 2026</td>
                  <td>June 2026</td>
                  <td>₹13,100</td>
                  <td>Cash</td>
                  <td><span class="badge p">Success</span></td>
                  <td><span class="link" data-action="receipt">View</span></td>
                </tr>
                <tr>
                  <td>05 May 2026</td>
                  <td>May 2026</td>
                  <td>₹13,250</td>
                  <td>Cash</td>
                  <td><span class="badge p">Success</span></td>
                  <td><span class="link" data-action="receipt">View</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </section>

        <section id="statements" class="screen">
          <div class="card page-card">
            <div class="page-title">My Statements</div>
            <div class="page-sub">Your monthly rent ledger and complete statement.</div>
            <div class="page-actions"><button class="btn primary" data-action="statement">Download Statement</button></div>
            <table>
              <thead>
                <tr>
                  <th>Month</th>
                  <th>Gross Due</th>
                  <th>Paid</th>
                  <th>Balance</th>
                  <th>Status</th>
                  <th>Statement</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>August 2026</td>
                  <td>₹15,560</td>
                  <td>₹14,750</td>
                  <td>₹810</td>
                  <td><span class="badge partial">Partial</span></td>
                  <td><span class="link" data-action="statement">View</span></td>
                </tr>
                <tr>
                  <td>July 2026</td>
                  <td>₹13,250</td>
                  <td>₹13,100</td>
                  <td>₹150</td>
                  <td><span class="badge partial">Partial</span></td>
                  <td><span class="link" data-action="statement">View</span></td>
                </tr>
                <tr>
                  <td>June 2026</td>
                  <td>₹13,250</td>
                  <td>₹13,100</td>
                  <td>₹150</td>
                  <td><span class="badge partial">Partial</span></td>
                  <td><span class="link" data-action="statement">View</span></td>
                </tr>
                <tr>
                  <td>May 2026</td>
                  <td>₹13,250</td>
                  <td>₹13,250</td>
                  <td>₹0</td>
                  <td><span class="badge p">Paid</span></td>
                  <td><span class="link" data-action="statement">View</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </section>

        <section id="meter" class="screen">
          <div class="card page-card">
            <div class="page-title">Meter Reading</div>
            <div class="page-sub">Electricity consumption calculated from your individual meter and the applicable master bill rate.</div>
            <div class="stat-cards">
              <div class="card stat"><small>Previous Reading</small><strong>250</strong></div>
              <div class="card stat"><small>Current Reading</small><strong>350</strong></div>
              <div class="card stat"><small>Units Consumed</small><strong>100 Units</strong></div>
              <div class="card stat"><small>Rate / Unit</small><strong>₹10.00</strong></div>
            </div>
            <div class="alert"><b>Electricity Bill: ₹1,000</b><br>100 Units × ₹10.00 per Unit.</div>
            <table>
              <thead>
                <tr>
                  <th>Month</th>
                  <th>Opening</th>
                  <th>Closing</th>
                  <th>Units</th>
                  <th>Rate / Unit</th>
                  <th>Electricity Bill</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>August 2026</td>
                  <td>250</td>
                  <td>350</td>
                  <td>100</td>
                  <td>₹10</td>
                  <td>₹1,000</td>
                </tr>
                <tr>
                  <td>July 2026</td>
                  <td>180</td>
                  <td>250</td>
                  <td>70</td>
                  <td>₹10</td>
                  <td>₹700</td>
                </tr>
                <tr>
                  <td>June 2026</td>
                  <td>120</td>
                  <td>180</td>
                  <td>60</td>
                  <td>₹10</td>
                  <td>₹600</td>
                </tr>
              </tbody>
            </table>
            <div class="rule">
              <h4>Important</h4>
              <div style="font-size:10px;color:#64748b">The unit rate is determined from the property's monthly Master Bill settings. The tenant does not enter or change the rate.</div>
            </div>
          </div>
        </section>

        <section id="agreement" class="screen">
          <div class="card page-card">
            <div class="page-title">Rent Agreement</div>
            <div class="page-sub">Digital Rent Agreement (DRA)</div>
            <div class="alert"><b>Coming Soon</b><br>Digital Rent Agreement will be available in a future RMS version. This section will contain the agreement, terms, charges, conditions and digital signing process.</div>
            <div class="future-items">
              <div class="future">Agreement Details<span>Coming Soon</span></div>
              <div class="future">Digital Signature<span>Coming Soon</span></div>
              <div class="future">Agreement Download<span>Coming Soon</span></div>
            </div>
          </div>
        </section>

        <section id="deposit" class="screen">
          <div class="card page-card">
            <div class="page-title">Security Deposit</div>
            <div class="page-sub">Deposit summary and future adjustment history.</div>
            <div class="deposit-box">
              <div class="deposit"><span>Initial Deposit</span><strong>₹26,200</strong></div>
              <div class="deposit"><span>Adjusted / Deducted</span><strong class="red">₹1,310</strong></div>
              <div class="deposit"><span>Current Balance</span><strong class="paid">₹24,890</strong></div>
            </div>
            <table>
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Particular</th>
                  <th>Adjustment</th>
                  <th>Balance</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>01 Jun 2026</td>
                  <td>Initial Security Deposit – 2 Months</td>
                  <td>₹26,200</td>
                  <td>₹26,200</td>
                </tr>
                <tr>
                  <td>12 Aug 2026</td>
                  <td>Late Payment Adjustment</td>
                  <td class="red">₹1,310</td>
                  <td>₹24,890</td>
                </tr>
              </tbody>
            </table>
            <div class="alert" style="margin-top:12px">Security deposit adjustments are controlled by the landlord/admin rules. Tenants cannot manually change the adjustment.</div>
          </div>
        </section>

        <section id="profile" class="screen">
          <div class="card page-card">
            <div class="page-title">My Profile</div>
            <div class="page-sub">Your tenant and property information.</div>
            <div class="profile-grid">
              <div class="field"><label>Tenant Name</label><strong>Vikram Yogi</strong></div>
              <div class="field"><label>Mobile Number</label><strong>98XXXXXXXX</strong></div>
              <div class="field"><label>Email</label><strong>Not Added</strong></div>
              <div class="field"><label>Project</label><strong>SKRM Manpur</strong></div>
              <div class="field"><label>Property / Shop</label><strong>G-01 & G-02</strong></div>
              <div class="field"><label>Shop Type</label><strong>Double</strong></div>
              <div class="field"><label>Address</label><strong>D-1285, Khenda, Dausa</strong></div>
              <div class="field"><label>Tenant Since</label><strong>01 June 2026</strong></div>
            </div>
            <div class="page-actions" style="margin-top:14px"><button class="btn primary" data-action="profile">Edit Profile</button></div>
          </div>
        </section>

        <section id="settings" class="screen">
          <div class="card page-card">
            <div class="page-title">Settings</div>
            <div class="page-sub">Basic tenant portal preferences for V1.</div>
            <div class="profile-grid">
              <div class="field"><label>Login PIN</label><strong>••••</strong>
                <div style="margin-top:8px"><button class="btn" data-action="pin">Change PIN</button></div>
              </div>
              <div class="field"><label>Language</label><strong>English</strong>
                <div style="margin-top:8px"><select>
                    <option>English</option>
                    <option>हिन्दी</option>
                  </select></div>
              </div>
              <div class="field"><label>Payment Notifications</label><strong class="green">ON</strong></div>
              <div class="field"><label>Rent Due Reminder</label><strong class="green">ON</strong></div>
            </div>
            <div class="alert" style="margin-top:14px">WhatsApp notifications and advanced notification controls are planned for a future version.</div>
          </div>
        </section>

        <section id="logout" class="screen">
          <div class="card page-card">
            <div class="page-title">Logout</div>
            <div class="page-sub">End your current RMS tenant session.</div>
            <div class="alert">For this prototype, clicking the button below only shows a confirmation message. Your developer can connect it to the actual session/logout API.</div><button class="btn primary" data-action="logout">Logout</button>
          </div>
        </section>

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
  <script>
    document.querySelectorAll('.dropdown-btn').forEach(button => {
      button.addEventListener('click', function(e) {
        e.stopPropagation();
        const dropdown = this.parentElement;
        document.querySelectorAll('.dropdown').forEach(item => {
          if (item !== dropdown) {
            item.classList.remove('active');
          }
        });
        dropdown.classList.toggle('active');
      });
    });
    document.addEventListener('click', function() {
      document.querySelectorAll('.dropdown').forEach(item => {
        item.classList.remove('active');
      });
    });
  </script>
  <script>
    const titles = {
      dashboard: "My Dashboard",
      rent: "My Rent",
      payments: "My Payments",
      statements: "My Statements",
      meter: "Meter Reading",
      agreement: "Rent Agreement",
      deposit: "Security Deposit",
      profile: "My Profile",
      settings: "Settings",
      logout: "Logout"
    };

    function showScreen(id) {
      document.querySelectorAll(".screen").forEach(s => s.classList.remove("active"));
      document.getElementById(id).classList.add("active");
      document.querySelectorAll(".menu-item").forEach(m => m.classList.toggle("active", m.dataset.screen === id));
      document.getElementById("headerTitle").textContent = titles[id] || "RMS";
      window.scrollTo({
        top: 0,
        behavior: "smooth"
      })
    }

    function openModal(t, m) {
      document.getElementById("modalTitle").textContent = t;
      document.getElementById("modalText").textContent = m;
      document.getElementById("modal").classList.add("show")
    }

    function closeModal() {
      document.getElementById("modal").classList.remove("show")
    }
    document.querySelectorAll(".menu-item").forEach(x => x.onclick = () => showScreen(x.dataset.screen));
    document.querySelectorAll("[data-screen-link]").forEach(x => x.onclick = () => showScreen(x.dataset.screenLink));
    document.querySelectorAll("[data-action]").forEach(x => x.onclick = () => {
      let a = x.dataset.action;
      let m = {
        receipt: ["Payment Receipt", "In the live RMS application, this button will open or download the selected payment receipt."],
        statement: ["Statement", "In the live RMS application, this will open or download the tenant statement."],
        online: ["Online Payment", "Online payment is planned for a future RMS version."],
        whatsapp: ["WhatsApp Alerts", "WhatsApp alerts are planned for a future RMS version."],
        profile: ["Edit Profile", "The live version will allow the tenant to edit only fields permitted by the administrator."],
        pin: ["Change PIN", "The live version will provide a secure PIN change screen."],
        logout: ["Logout", "Logout confirmation would appear here before ending the tenant session."]
      };
      let z = m[a] || ["RMS", "This feature is available in the prototype."];
      openModal(z[0], z[1])
    });
    document.getElementById("modal").onclick = e => {
      if (e.target.id === "modal") closeModal()
    };

    /* RMS V1 Login Wrapper — only controls entry to the existing Tenant Portal */
    (function() {
      const loginPage = document.getElementById("loginPage");
      const tenantApp = document.getElementById("tenantApp");
      const loginForm = document.getElementById("tenantLoginForm");
      const mobile = document.getElementById("tenantMobile");
      const pin = document.getElementById("tenantPin");
      const msg = document.getElementById("loginMessage");
      const forgot = document.getElementById("forgotPinBtn");

      loginForm.addEventListener("submit", function(e) {
        e.preventDefault();
        const m = mobile.value.trim();
        const p = pin.value.trim();

        if (!/^\d{10}$/.test(m)) {
          msg.style.display = "block";
          msg.textContent = "Please enter a valid 10-digit mobile number.";
          mobile.focus();
          return;
        }
        if (!/^\d{4}$/.test(p)) {
          msg.style.display = "block";
          msg.textContent = "Please enter your 4-digit PIN.";
          pin.focus();
          return;
        }

        msg.style.display = "none";
        loginPage.style.display = "none";
        tenantApp.style.display = "block";
        window.scrollTo(0, 0);
      });

      forgot.addEventListener("click", function() {
        msg.style.display = "block";
        msg.textContent = "PIN recovery will be connected in a future RMS version. For V1, the landlord/admin can reset the tenant PIN.";
      });
    })();
  </script>
</body>

</html>
@extends('rms.layouts.app')
@section('content')    <!-- Owl Carousel CSS -->    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<style>
section.matex_dashbrd {
    padding: 0px;
}

.side_menusses .tax-sidebar {
    width: 100%;
    max-width: 100%;
    background: #fff;
    padding:10px 5px 10px 10px;
    box-sizing: border-box;
    border: 1px solid #e0e7f0;
    border-top: none;
    margin-top: 0;
    border-radius: 0px 0px 8px 8px;
    height: 52vh;
    overflow: auto;
}

.side_menusses .tax-sidebar .tax-steps {
    width: 100%;
}

.side_menusses .tax-sidebar .tax-step {
    display: flex;
    align-items: center;
    min-height: 38px;
    padding: 4px 5px;
    border-radius: 5px;
    box-sizing: border-box;
    transition: .2s ease;
}

.tax-step:hover {
    background: #f5f8fd;
}

.side_menusses .tax-sidebar .tax-step.active {
    background: #f0f5ff;
}

.side_menusses .tax-sidebar .step-number {
    width: 20px;
    height: 20px;
    min-width: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 3px;
    background: #f1f4f9;
    color: #60708a;
    font-size: 9px;
    font-weight: 600;
}
.side_menusses .tax-sidebar .step-number.setingg svg {
    width: 14px;
    fill: #527fc1;
}

.side_menusses .tax-sidebar .completed .side_menusses .tax-sidebar .step-number,
.side_menusses .tax-sidebar .active .side_menusses .tax-sidebar .step-number {
    background: #e8f0ff;
    color: #1457b7;
}

.side_menusses .tax-sidebar .active .side_menusses .tax-sidebar .step-number {
    background: #1d5bb5;
    color: #fff;
}

.side_menusses .tax-sidebar .step-title {
    flex: 1;
    margin-left: 5px;
    color: #293b58;
    font-size: 11px;
    font-weight: 500;
    white-space: nowrap;
}
.side_menusses .tax-sidebar .step-title a {
    font-size: 11px;
}
.side_menusses .tax-sidebar .step-title a:focus{outline:none;}

.side_menusses .tax-sidebar .active .side_menusses .tax-sidebar .step-title {
    color: #1457b7;
    font-weight: 600;
}

.side_menusses .tax-sidebar .step-status {
    display: flex;
    align-items: center;
    color: #7a7a7a;
    font-size: 9px;
    white-space: nowrap;
    margin: 0;
    background: transparent;
    box-shadow: none;
}
.side_menusses .tax-sidebar .step-status img.vdiioo {
    width: 18px;
}

.side_menusses .tax-sidebar .step-status.success {
    color: #19a46b;
    font-weight: 600;
}

.side_menusses .tax-sidebar .step-status.progress {
    color: #3571d1;
}

.side_menusses .tax-sidebar .step-status svg {
    width: 15px;
    height: 15px;
    margin-left: 4px;

    fill: #20a86c;
    stroke: #fff;
    stroke-width: 2;
}


.side_menusses .tax-sidebar .dashboard-btn {
    width: calc(100% - 10px);
    height: 33px;
    margin: 9px 5px 17px;
    border: 1px solid #9bb8ea;
    border-radius: 5px;
    background: #fff;
    color: #2059b0;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    font-size: 11px;
    font-weight: 600;
    cursor: pointer;
}

.side_menusses .tax-sidebar .dashboard-btn:hover {
    background: #f3f7ff;
}

.side_menusses .tax-sidebar .dashboard-btn svg {
    width: 14px;
    height: 14px;
    fill: none;
    stroke: #2059b0;
    stroke-width: 1.7;
    stroke-linecap: round;
    stroke-linejoin: round;
}


.side_menusses .tax-sidebar .quick-title {
    margin: 0 5px 10px;
    color: #1a4f96;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: .2px;
    background: #f1f4f9;
    padding: 9px;
    position: relative;
    cursor: pointer;
    border-radius: 4px;
}
.side_menusses .tax-sidebar .quick-title span.ardown {
    position: absolute;
    right: 9px;
    top: 11px;
}

.side_menusses .tax-sidebar .quick-actions {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.side_menusses .tax-sidebar .quick-action {
    display: flex;
    align-items: center;
    min-height: 36px;
    padding: 3px 5px;
    color: #53627a;
    text-decoration: none;
    font-size: 10px;
    font-weight: 500;
    border-radius: 5px;
}

.side_menusses .tax-sidebar .quick-action:hover {
    background: #f5f8fd;
    color: #2059b0;
}

.side_menusses .tax-sidebar .quick-icon {
    width: 27px;
    height: 27px;
    margin-right: 9px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f2f6fc;
    border-radius: 5px;
}

.side_menusses .tax-sidebar .quick-icon svg {
    width: 15px;
    height: 15px;
    fill: none;
    stroke: #4777bd;
    stroke-width: 1.5;
    stroke-linecap: round;
    stroke-linejoin: round;
}




.dashes_ara_main {
    padding-top: 30px;
}
.dashes_ara_main .topbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 18px;
    margin-bottom: 16px;
}
.dashes_ara_main .greeting h1 {
    font-size: 18px;
    color: #17345b;
    margin: 0 0 4px;
}
.dashes_ara_main .greeting h1 span {
    color: #1260c4;
}
.dashes_ara_main .greeting p {
    font-size: 12px;
    color: #718098;
    margin-top: 2px;
    margin-bottom: 0;
}
.dashes_ara_main .top-actions {
    display: flex;
    align-items: center;
    gap: 10px;
}
.dashes_ara_main .top-actions .st_ds_areaa {
    display: flex;
    gap: 10px;
}
.dashes_ara_main .fy {
    background: #fff;
    border: 1px solid #dce4ef;
    border-radius: 5px;
    padding: 8px 10px;
    color: #344967;
    font-size: 10px;
    font-weight: 600;
    height: 33px;
}
.dashes_ara_main .icon-btn {
    border: 0;
    background: #fff;
    width: 34px;
    height: 34px;
    border-radius: 7px;
    color: #405675;
    position: relative;
}
.dashes_ara_main .bell-dot {
    position: absolute;
    right: 5px;
    top: 4px;
    background: #e74b4b;
    color: #fff;
    border-radius: 50%;
    font-size: 8px;
    width: 14px;
    height: 14px;
}
.dashes_ara_main .user {
    display: flex;
    align-items: center;
    gap: 3px;
    font-size: 11px;
    font-weight: 600;
    text-wrap-mode: nowrap;
}
.dashes_ara_main .avatar {
    width: 34px;
    height: 34px;
    background: #e7f0fc;
    color: #2364ad;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
}
.dashes_ara_main .grid-top {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 12px;
}
.dashes_ara_main .card {
    background: #fff;
    border: 1px solid #e0e7f0;
    border-radius: 9px;
    box-shadow: 0 4px 14px rgba(35, 57, 86, 0.05);
}
.dashes_ara_main .progress-card {
    padding: 17px 19px;
    min-height: 142px;
    margin-bottom: 5px;
}
.dashes_ara_main .progress-title {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.dashes_ara_main .progress-title h2 {
    font-size: 14px;
    font-weight: 500;
    margin: 0;
}
.dashes_ara_main .percent {
    font-size: 20px;
    color: #13a35e;
    font-weight: 700;
}
.dashes_ara_main .bar {
    height: 9px;
    background: #e5ebf3;
    border-radius: 10px;
    margin: 12px 0 13px;
    overflow: hidden;
}
.dashes_ara_main .bar span {
    display: block;
    width: 62%;
    height: 100%;
    background: #12a35d;
    border-radius: 10px;
}
.dashes_ara_main .continue {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 11px;
    color: #748197;
}
.dashes_ara_main .primary {
    background: #1a4f96;
    border: 0;
    color: #fff !important;
    border-radius: 4px;
    padding: 8px 10px 7px;
    font-size: 11px;
    font-weight: 600;
}
.dashes_ara_main .profile-card {
    padding: 14px 15px;
    margin-bottom: 5px;
}
.dashes_ara_main .profile-head {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.dashes_ara_main .profile-head h3 {
    font-size: 14px;
    font-weight: 500;
    margin: 0;
}
.dashes_ara_main .complete {
    color: #13a35e;
    font-weight: 600;
    font-size: 10px;
}
.dashes_ara_main .profile-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    margin-top: 12px;
    gap: 8px;
}
.dashes_ara_main .metric {
    background: #f7f9fc;
    border-radius: 7px;
    padding: 9px;
}
.dashes_ara_main .metric label {
    display: block;
    font-size: 9px;
    color: #77859b;
}
.dashes_ara_main .metric strong {
    font-size: 11px;
}
.dashes_ara_main .good {
    color: #15985a;
}
.dashes_ara_main .profile-date {
    font-size: 11px;
    color: #8a95a6;
    margin-top: 9px;
}
.dashes_ara_main .profile-date span.profiless {
    color: #1a4f96;
    font-weight: 700;
    text-decoration: underline;
	cursor:pointer;
}
.dashes_ara_main .profile-date span.profiless:hover{text-decoration: none;}

.dashes_ara_main .quick {
    padding: 14px;
    margin-bottom: 5px;
}
.dashes_ara_main .quick h3 {
    font-size: 14px;
    font-weight: 500;
    margin: 0 0 10px;
}
.dashes_ara_main .quick-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 7px;
}
.dashes_ara_main .quick-item {
    border: 1px solid #e1e7ef;
    border-radius: 7px;
    padding: 9px 3px;
    text-align: center;
    font-size: 9px;
    color: #52627a;
}
.dashes_ara_main .quick-item i {
    display: flex;
    width: 32px;
    height: 32px;
    margin: 0 auto 5px;
    border-radius: 8px;
    align-items: center;
    justify-content: center;
    font-size: 14px;
}
.dashes_ara_main .blue i {
    background: #eaf3ff;
    color: #2870c5;
}
.dashes_ara_main .green i {
    background: #eaf8ef;
    color: #22985a;
}
.dashes_ara_main .purple i {
    background: #f1ecff;
    color: #7251c9;
}
.dashes_ara_main .orange i {
    background: #fff3e2;
    color: #df8b18;
}
.dashes_ara_main .section {
    margin-top: 15px;
}
.dashes_ara_main .section-title {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 15px;
}
.dashes_ara_main .section-title h2 {
    font-size: 16px;
    color: #1d3558;
    font-weight: 600;
    margin: 0;
}
.dashes_ara_main .section-title a {
    font-size: 10px;
    font-weight: 500;
    color: #1a4f96;
    text-decoration: none;
}
.dashes_ara_main .steps {
    padding: 12px 13px;
}
.dashes_ara_main .step-line {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0;
    margin: 0 0px 15px;
}
.dashes_ara_main .circle {
    width: 25px;
    height: 25px;
    border: 2px solid #20a85f;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 10px;
    font-weight: 600;
    color: #159656;
    background: #fff;
}
.dashes_ara_main .circle.warn {
    border-color: #e6b526;
    color: #c28b00;
}
.dashes_ara_main .circle.lock {
    border-color: #e25454;
    color: #d54d4d;
}
.dashes_ara_main .arrow {
    width: 27px;
    height: 2px;
    background: #39a969;
    position: relative;
}
.dashes_ara_main .arrow:after {
    content: "";
    position: absolute;
    right: -1px;
    top: -4px;
    border-left: 6px solid #39a969;
    border-top: 5px solid transparent;
    border-bottom: 5px solid transparent;
}
.dashes_ara_main .step-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 9px;
}
.dashes_ara_main .step-card {
    border: 1px solid #e0e7ef;
    border-radius: 9px;
    padding: 6px 10px;
    min-height: 117px;
    position: relative;
    background: #fff;
    transition: 0.2s;
}
.dashes_ara_main .step-card:hover {
    transform: translateY(-1px);
    box-shadow: 0 5px 14px rgba(30, 55, 90, 0.08);
}
.dashes_ara_main .step-card .boths_booox {
    display: flex;
    width: 100%;
    gap: 10px;
    align-items: center;
}
.dashes_ara_main .step-card .boths_booox .mini-progress {
    width: 82%;
    margin: 0;
}
.dashes_ara_main .step-no {
    position: absolute;
    left: 9px;
    top: 8px;
    width: 24px;
    height: 24px;
    border-radius: 50%;
    background: #20a760;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 9px;
    font-weight: 700;
}
.dashes_ara_main .step-no.yellow {
    background: #e5af1a;
}
.dashes_ara_main .step-no.gray {
    background: #8893a3;
}
.dashes_ara_main .step-icon {
    width: 34px;
    height: 34px;
    margin: 4px auto 4px;
    background: #edf8f1;
    color: #159b59;
    border-radius: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
}
.dashes_ara_main .step-card.yellow .step-icon {
    background: #fff7df;
    color: #d59d11;
}
.dashes_ara_main .step-card.gray .step-icon {
    background: #f0f2f5;
    color: #8c96a5;
}
.dashes_ara_main .step-card h3 {
    text-align: center;
    font-size: 12px;
    color: #253754;
    line-height: 1.25;
    margin: 8px 0 8px;
    font-weight: 600;
    cursor: pointer;
    text-decoration: underline;
}
.dashes_ara_main .step-status {
    text-align: center;
    margin-top: 7px;
    font-size: 9px;
    color: #718097;
}
.dashes_ara_main .done {
    color: #14965a;
}
.dashes_ara_main .mini-progress {
    height: 4px;
    background: #e7ebf0;
    border-radius: 5px;
    margin: 10px 0px 0;
}
.dashes_ara_main .mini-progress span {
    display: block;
    height: 100%;
    background: #e6b21c;
    border-radius: 5px;
}
.dashes_ara_main .step-card .mini-percent {
    text-align: right;
    font-size: 8px;
    color: #66758b;
    margin-top: 3px;
}
.dashes_ara_main .summary {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 9px;
}
.dashes_ara_main .summary-card {
    padding: 14px 9px;
    border: 1px solid #e0e7ef;
    border-radius: 4px;
    display: flex;
    align-items: center;
    gap: 8px;
}
.dashes_ara_main .sum-icon {
    width: 24px;
    height: 24px;
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    background: #edf5ff;
    color: #2472c7;
}
.dashes_ara_main .sum-green .sum-icon {
    background: #ebf8f0;
    color: #20965a;
}
.dashes_ara_main .sum-yellow .sum-icon {
    background: #fff7df;
    color: #d49b13;
}
.dashes_ara_main .sum-red .sum-icon {
    background: #fff0f0;
    color: #dc5353;
}
.dashes_ara_main .summary-card label {
    display: block;
    font-size: 9px;
    color: #77859a;
	margin:0 0 3px;
}
.dashes_ara_main .summary-card strong {
    font-size: 12px;
    color: #263c5c;
}
.dashes_ara_main .documents {
    padding: 13px;
}
.dashes_ara_main .doc-grid {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    gap: 7px;
}
.dashes_ara_main .doc {
    border: 1px solid #e1e7ef;
    border-radius: 7px;
    padding: 9px;
    text-align: center;
}
.dashes_ara_main .doc h4 {
    font-size: 9px;
    color: #52627a;
}
.dashes_ara_main .doc p {
    font-size: 9px;
    margin: 0;
    line-height: 1;
}
.dashes_ara_main .uploaded {
    color: #15995b;
}
.dashes_ara_main .pending {
    color: #dc9514;
}
.dashes_ara_main .right-layout {
    display: grid;
    grid-template-columns: 1fr;
    gap: 13px;
}
.dashes_ara_main .activity.rececents {
    height: 253px;
    overflow: auto;
}
.dashes_ara_main .activity {
    padding: 13px;
    margin: 0;
}
.dashes_ara_main .activity h3,
.dashes_ara_main .years h3 {
    font-size: 14px;
    margin: 0;
    font-weight: 500;
}
.dashes_ara_main .activity-item {
    display: flex;
    gap: 9px;
    padding: 8px 0;
    border-bottom: 1px solid #edf0f4;
}
.dashes_ara_main .activity-item:last-child {
    border-bottom: 0;
}
.dashes_ara_main .activity-icon {
    width: 28px;
    height: 28px;
    border-radius: 7px;
    background: #edf5ff;
    color: #2670c5;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 11px;
    flex-shrink: 0;
}
.dashes_ara_main .activity-text strong {
    display: block;
    font-size: 11px;
    color: #324764;
}
.dashes_ara_main .activity-text span {
    font-size: 10px;
    color: #8a95a6;
}
.dashes_ara_main .years {
    padding: 13px;
}
.dashes_ara_main .year-card {
    border: 1px solid #e0e7ef;
    border-radius: 7px;
    padding: 9px 10px;
    margin-bottom: 7px;
}
.dashes_ara_main .year-card:last-child {
    margin-bottom: 0;
}
.dashes_ara_main .year-top {
    display: flex;
    justify-content: space-between;
    font-size: 10px;
    font-weight: 600;
}
.dashes_ara_main .filed {
    color: #15995b;
    background: #eaf8ef;
    border-radius: 10px;
    padding: 2px 6px;
    font-size: 9px;
}
.dashes_ara_main .year-bottom {
    display: flex;
    justify-content: space-between;
    margin-top: 6px;
    font-size: 8px;
    color: #718097;
}
.dashes_ara_main .year-bottom a {
    color: #1a4f96;
    text-decoration: none;
    font-weight: 500;
    font-size: 9px;
}
.dashes_ara_main .layout {
    display: grid;
    grid-template-columns: minmax(0, 1.75fr) minmax(260px, 0.85fr);
    gap: 13px;
    margin-top: 8px;
}
.dashes_ara_main .layout.scrolls {
    height: 61vh;
    overflow: auto;
}
.dashes_ara_main .tax-health {
    padding: 14px;
    margin: 0;
}
.dashes_ara_main .health-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.dashes_ara_main .health-row h3 {
    font-size: 14px;
    margin: 0;
    font-weight: 500;
}
.dashes_ara_main .stars {
    color: #eab21d;
    font-size: 12px;
}
.dashes_ara_main .health-good {
    font-size: 9px;
    background: #eaf8ef;
    color: #168b54;
    border-radius: 12px;
    padding: 3px 7px;
}
.dashes_ara_main .health-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    margin-top: 5px;
    gap: 6px;
}
.dashes_ara_main .health-metric {
    padding: 11px 10px;
    background: #f7f9fc;
    border-radius: 6px;
}
.dashes_ara_main .health-metric span {
    display: block;
    color: #7a879a;
    font-size: 10px;
}
.dashes_ara_main .health-metric strong {
    font-size: 10px;
}
.dashes_ara_main .right-stack {
    display: flex;
    flex-direction: column;
    gap: 13px;
}
.dashes_ara_main .toast {
    position: fixed;
    right: 20px;
    bottom: 20px;
    background: #173b68;
    color: #fff;
    padding: 11px 15px;
    border-radius: 7px;
    font-size: 10px;
    display: none;
    z-index: 20;
    box-shadow: 0 8px 25px #0003;
}
.dashes_ara_main .toast.show {
    display: block;
}
.dashes_ara_main .step-card a.you_vioss {
    position: absolute;
    right: 8px;
    top: 8px;
    cursor: pointer;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas {
    padding: 15px;
}
.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .content-header {
    display: inline-block;
    width: 100%;
    margin: 0 0 15px;
}
.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .content-header h2 {
    margin: 0 0 3px;
    font-size: 20px;
    font-weight: 800;
    color: #1a4f96;
}
.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .content-header p {
    margin: 0;
    font-size: 14px;
    color: #959595;
    font-weight: 400;
}


.matex_dashbrd .ads_areea {
    width: 100%;
    margin: 30px 0 0;
    height: 70px;
    overflow: hidden;
    padding: 10px 0 10px;
    border: 1px solid #e0e7f0;
    border-radius: 8px 8px 0px 0px;
}
.matex_dashbrd .ads_areea img.logo {
    height: 100%;
    width: 100%;
    object-fit: contain;
}
.matex_dashbrd .news-slider {
    width: 100%;
    max-width: 100%;
    margin: 20px auto;
    padding: 0;
	border: #e0e7f0 solid 1px;
	border-radius: 6px;
}
.matex_dashbrd .news-card {
    border:none;
    min-height: auto;
    padding: 15px 15px 16px;
    text-align: center;
    background: #fff;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;    
} 

.matex_dashbrd .news-icon {
    width: 26px;
    height: 26px;
    margin-bottom: 10px;
}
.matex_dashbrd .news-icon svg {
    width: 100%;
    height: 100%;
    display: block;
    fill: #527fc1;
}
.matex_dashbrd .news-title {
font-size: 14px;
    line-height: 22px;
    font-weight: 700;
    margin: 0 0 2px;
    color: #527fc1;
    max-width: 280px;
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.matex_dashbrd .news-description {
    font-size: 13px;
    line-height: 18px;
    font-weight: 400;
    margin: 0 0 12px;
    padding: 0 10px;
    color: #527fc1;
    max-width: 240px;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.matex_dashbrd .read-more {
display: inline-flex;
    align-items: center;
    justify-content: center;
    background: #fff;
    color: #527fc1;
    border: 1px solid #527fc1;
    text-decoration: none;
    font-size: 12px;
    line-height: 20px;
    font-weight: 700;
    padding: 3px 15px 2px;
    min-width: auto;
    height: auto;
    border-radius: 3px;
    margin-top: 0;
    transition: all 0.3s ease;
}
.matex_dashbrd .read-more:hover {
    background: #527fc1;
    color: #fff;
} /* Owl spacing */
.matex_dashbrd .news-slider .owl-stage {
    display: flex;
}
.matex_dashbrd .news-slider .owl-item {
    display: flex;
}
.matex_dashbrd .news-slider .news-card {
    width: 100%;
} /* Dots */
.matex_dashbrd .news-slider .owl-dots {
    margin-top: 18px;
    text-align: center;
}
.matex_dashbrd .news-slider .owl-dot span {
    width: 9px;
    height: 9px;
    margin: 4px;
    background: #ccc;
    display: block;
    border-radius: 50%;
}
.matex_dashbrd .news-slider .owl-dot.active span {
    background: #194398;
} 
.matex_dashbrd .news-slider .owl-nav button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 23px;
    height: 23px;
    background: #527fc1 !important;
    color: #fff !important;
    border-radius: 50% !important;
    font-size: 24px !important;
    line-height: 15px !important;
}
.matex_dashbrd .news-slider .owl-nav button:focus {
    outline: none;
    border: none;
}
.matex_dashbrd .news-slider .owl-nav .owl-prev {
    left: 0px;
}
.matex_dashbrd .news-slider .owl-nav .owl-next {
    right: 0px;
}
.mb_v_show {
    display: none !important;
}
.mobile_menu_btn {
    display: none;
    border: 0;
    background: transparent;
    font-size: 24px;
    cursor: pointer;
    padding: 8px 12px;
}






.dashes_ara_main .taxmate-wrapper{
    width:100%;
    max-width:100%;
    margin:0px;
}
/* .taxmate-wrapper .over_contenttts {
    max-height: 680px;
    overflow: auto;
} */

.dashes_ara_main .taxmate-wrapper .step-header{
    background:#fff;
    border:1px solid #dce5ef;
    border-radius:8px;
    padding:14px 18px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:20px;
}

.dashes_ara_main .taxmate-wrapper .step-title-area{
    display:flex;
    align-items:flex-start;
    gap:8px;
}

.dashes_ara_main .taxmate-wrapper .step-number{
    width: 33px;
    height: 33px;
    background: #14579b;
    color: #fff;
    border-radius: 7px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 13px;
    flex-shrink: 0;
}

.dashes_ara_main .taxmate-wrapper .step-title h1{
        margin: 0;
    font-size: 16px;
    color: #153f60;
    font-weight: 700;
}

.dashes_ara_main .taxmate-wrapper .step-title p{
    margin: 2px 0 0;
    color: #718198;
    font-size: 12px;
    line-height: 15px;
    max-width: 300px;
    width: 100%;
}

.dashes_ara_main .taxmate-wrapper .header-actions{
    display:flex;
    align-items:center;
    gap:12px;
}
.dashes_ara_main .taxmate-wrapper .step-header .data_sh_no {
    justify-content: center;
    align-items: center;
    display: flex;
    gap: 12px;
}

.dashes_ara_main .taxmate-wrapper .step-header .data_sh_no1 {
    justify-content: center;
    align-items: center;
    display: flex;
    gap: 12px;
}



.dashes_ara_main .taxmate-wrapper .help-btn{
        border: 1px solid #d6e0eb;
    background: #fff;
    color: #264c70;
    padding: 8px 10px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 12px;
    font-weight: 600;
}

.dashes_ara_main .taxmate-wrapper .video-help{
    width:34px;
    height:34px;
    border:none;
    background:#ff4057;
    color:#fff;
    border-radius:5px;
    font-size:18px;
    cursor:pointer;
    box-shadow:0 2px 5px rgba(0,0,0,.12);
}

.dashes_ara_main .taxmate-wrapper .progress-area{
    min-width:175px;
}

.dashes_ara_main .taxmate-wrapper .progress-label{
    display:flex;
    justify-content:space-between;
    font-size:11px;
    color:#687c91;
    margin-bottom:5px;
}

.dashes_ara_main .taxmate-wrapper .progress-label strong{
    color:#0ca564;
}

.dashes_ara_main .taxmate-wrapper .progress-bar{
    height:6px;
    background:#e3eaf1;
    border-radius:20px;
    overflow:hidden;
	width:100%;
}

.dashes_ara_main .taxmate-wrapper .progress-fill{
    height:100%;
}

.dashes_ara_main .taxmate-wrapper .dashboard-btn{
    border: none;
    background: #15599b;
    color: white;
    padding: 8px 12px;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
    white-space: nowrap;
    font-size: 13px;
}

/* =========================================================
   9 STEP FLOW
   ========================================================= */

.dashes_ara_main .taxmate-wrapper .step-flow{
    background:#fff;
    border:1px solid #dce5ef;
    border-radius:7px;
    margin-top:0px;
    margin-bottom:10px;
    padding:12px 15px 9px 0px;
    overflow-x:auto;
	position:relative;
}
.over_contenttts.step-flow-fixed {
    position: relative;
}
.over_contenttts.step-flow-fixed .step-flow {
    position: fixed !important;
    width: 100%;
    left: 322px;
    z-index: 99999;
    top: 120px;
    max-width: 945px;
    right: 0;
    margin: 0 auto;
}

.over_contenttts.step-flow-fixed .sub-tabs.sub-tabs-fixed {
    margin-top: 206px !important;
    position: fixed;
    top: 0;
    z-index: 9;
    width: 100%;
    max-width: 945px;
}

.over_contenttts.step-flow-fixed .content-layout.sub-tabs-fixed {
    margin-top: 250px !important;
	max-height:430px;
}

.dashes_ara_main .taxmate-wrapper .steps{
    display: flex;
    align-items: flex-start;
    min-width: 100%;
    position: relative;
    padding: 0;
    gap: 10px;
}

.dashes_ara_main .taxmate-wrapper .steps:before{
    content:"";
    position:absolute;
    top:13px;
    left:5%;
    right:5%;
    height:1px;
    background:#ccd9e6;
    z-index:0;
}

.dashes_ara_main .taxmate-wrapper .flow-step{
    flex:1;
    text-align:center;
    position:relative;
    z-index:1;
    cursor:pointer;
}

.dashes_ara_main .taxmate-wrapper .flow-circle{
    width:26px;
    height:26px;
    border-radius:50%;
    background:#fff;
    border:1px solid #cbd8e5;
    margin:auto;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:10px;
    font-weight:bold;
    color:#718096;
}

.dashes_ara_main .taxmate-wrapper .flow-step.active .flow-circle{
    background:#14579b;
    color:#fff;
    border-color:#14579b;
}

.dashes_ara_main .taxmate-wrapper .flow-step.completed .flow-circle{
    background:#13a66a;
    color:#fff;
    border-color:#13a66a;
}

.dashes_ara_main .taxmate-wrapper .flow-step.pending .flow-circle{
    background:#fff;
}

.dashes_ara_main .taxmate-wrapper .flow-label{
    font-size:9px;
    color:#6b7d90;
    line-height:12px;
    margin-top:4px;
}

.dashes_ara_main .taxmate-wrapper .flow-step.active .flow-label{
    color:#14579b;
    font-weight:bold;
}

.dashes_ara_main .taxmate-wrapper .flow-step.completed .flow-label{
    color:#09945c;
    font-weight:bold;
}

/* =========================================================
   SUB NAVIGATION
   ========================================================= */

.dashes_ara_main .taxmate-wrapper .sub-tabs{
    background:#fff;
    border:1px solid #dce5ef;
    border-radius:7px;
    margin-top:10px;
    display:flex;
    align-items:center;
    overflow-x:auto;
}

.dashes_ara_main .taxmate-wrapper .sub-tab{
    border:none;
    background:none;
    padding:12px 12px;
    font-size:11px;
    color:#58718b;
    cursor:pointer;
    border-bottom:none;
    white-space:nowrap;
}
.dashes_ara_main .taxmate-wrapper .sub-tab:focus{outline:none;}

.dashes_ara_main .taxmate-wrapper .sub-tab:hover{
    color:#14579b;
    background:#f7faff;
}

.dashes_ara_main .taxmate-wrapper .sub-tab.active{
    color: #fff;
   border-bottom:none;
    font-weight: bold;
    background: #14579b;
}

/* =========================================================
   CONTENT
   ========================================================= */

.dashes_ara_main .taxmate-wrapper .content-layout{
    display:grid;
    grid-template-columns:minmax(0,1fr) 260px;
    gap:10px;
    margin-top:10px;
	max-height: 44.5vh;
    overflow: auto;
}

.dashes_ara_main .taxmate-wrapper .main-content{
    min-width:0;
}

.dashes_ara_main .taxmate-wrapper .side-content{
    min-width:0;
}

.dashes_ara_main .taxmate-wrapper .card{
    background:#fff;
    border:1px solid #dce5ef;
    border-radius:7px;
    margin-bottom:10px;
    margin-top:10px;
    overflow:hidden;
}

.dashes_ara_main .taxmate-wrapper .card-header{
    padding:12px 14px;
    border-bottom:1px solid #e4ebf2;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.dashes_ara_main .taxmate-wrapper .card-header h2{
    margin:0;
    font-size:15px;
    color:#173f60;
}

.dashes_ara_main .taxmate-wrapper .card-header p{
    margin:3px 0 0;
    font-size:10px;
    color:#8090a2;
}

.dashes_ara_main .taxmate-wrapper .card-body{
    padding:12px 14px;
}

/* =========================================================
   EMPLOYER
   ========================================================= */

.dashes_ara_main .taxmate-wrapper .employer-box{
    border:1px solid #dce5ef;
    border-radius:6px;
    overflow:hidden;
}

.dashes_ara_main .taxmate-wrapper .employer-top{
    padding:12px;
    background:#fbfdff;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.dashes_ara_main .taxmate-wrapper .employer-name{
    font-weight:bold;
    color:#173f60;
}

.dashes_ara_main .taxmate-wrapper .badge{
    display:inline-block;
    padding:3px 7px;
    background:#e7f7ef;
    color:#0a9960;
    border-radius:20px;
    font-size:9px;
    margin-left:6px;
}

.dashes_ara_main .taxmate-wrapper .edit-btn,
.dashes_ara_main .taxmate-wrapper .add-btn{
    border:1px solid #cddbea;
    background:#fff;
    color:#14579b;
    padding:6px 10px;
    border-radius:4px;
    cursor:pointer;
    font-size:10px;
}

.dashes_ara_main .taxmate-wrapper .employer-grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    border-top:1px solid #e4ebf2;
}

.dashes_ara_main .taxmate-wrapper .info-cell{
    padding:9px 11px;
    border-right:1px solid #e4ebf2;
}

.dashes_ara_main .taxmate-wrapper .info-cell:last-child{
    border-right:none;
}

.dashes_ara_main .taxmate-wrapper .info-label{
    font-size:8px;
    color:#8796a7;
    margin-bottom:3px;
}

.dashes_ara_main .taxmate-wrapper .info-value{
    font-size:10px;
    font-weight:bold;
    color:#3b526a;
}

/* =========================================================
   TABLES
   ========================================================= */

.dashes_ara_main .taxmate-wrapper .data-table{
    width:100%;
    border-collapse:collapse;
}

.dashes_ara_main .taxmate-wrapper .data-table th{
    background:#f3f7fb;
    color:#536c84;
    font-size:9px;
    text-align:left;
    padding:9px 8px;
    border-bottom:1px solid #dce5ef;
}

.dashes_ara_main .taxmate-wrapper .data-table td{
    padding:8px;
    border-bottom:1px solid #edf1f5;
    font-size:10px;
    color:#465b70;
}

.dashes_ara_main .taxmate-wrapper .data-table tr:last-child td{
    border-bottom:none;
}

.dashes_ara_main .taxmate-wrapper .amount{
    text-align:right;
    font-weight:bold;
}

.dashes_ara_main .taxmate-wrapper .total-row td{
    font-weight:bold;
    background:#fafcfe;
}

/* =========================================================
   SUMMARY SIDEBAR
   ========================================================= */

.dashes_ara_main .taxmate-wrapper .status-card{
    text-align:center;
}

.dashes_ara_main .taxmate-wrapper .status-icon{
    width:48px;
    height:48px;
    border-radius:50%;
    background:#e9f8f1;
    color:#0ba365;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:24px;
    margin:8px auto 8px;
}

.dashes_ara_main .taxmate-wrapper .status-title{
    font-weight:bold;
    color:#173f60;
}

.dashes_ara_main .taxmate-wrapper .status-text{
    font-size:10px;
    color:#8391a1;
    margin-top:4px;
}

.dashes_ara_main .taxmate-wrapper .summary-row{
    display:flex;
    justify-content:space-between;
    padding:8px 0;
    border-bottom:1px solid #edf1f5;
    font-size:10px;
}

.dashes_ara_main .taxmate-wrapper .summary-row:last-child{
    border-bottom:none;
}

.dashes_ara_main .taxmate-wrapper .summary-row span:first-child{
    color:#738398;
}

.dashes_ara_main .taxmate-wrapper .summary-row strong{
    color:#173f60;
}

.dashes_ara_main .taxmate-wrapper .estimated{
    margin-top:8px;
    padding:10px;
    background:#eaf8f1;
    border-radius:5px;
    display:flex;
    justify-content:space-between;
    color:#07945b;
    font-weight:bold;
	font-size: 12px;
}

/* =========================================================
   DOCUMENTS
   ========================================================= */

.dashes_ara_main .taxmate-wrapper .doc-row{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:9px 0;
    border-bottom:1px solid #edf1f5;
    font-size:10px;
}

.dashes_ara_main .taxmate-wrapper .doc-row:last-child{
    border-bottom:none;
}

.dashes_ara_main .taxmate-wrapper .uploaded{
    background:#e5f8ed;
    color:#0b995e;
    padding:3px 6px;
    border-radius:4px;
    font-size:8px;
}

.dashes_ara_main .taxmate-wrapper .pending{
    background:#fff3dc;
    color:#d89400;
    padding:3px 6px;
    border-radius:4px;
    font-size:8px;
}

/* =========================================================
   TAB CONTENT
   ========================================================= */

.dashes_ara_main .taxmate-wrapper .tab-content{
    display:none;
}

.dashes_ara_main .taxmate-wrapper .tab-content.active{
    display:block;
}

/* =========================================================
   CROSS VERIFICATION
   ========================================================= */

.dashes_ara_main .taxmate-wrapper .verify-table th,
.dashes_ara_main .taxmate-wrapper .verify-table td{
    text-align:left;
}

.dashes_ara_main .taxmate-wrapper .match{
    color:#07945b;
    font-weight:bold;
}

.dashes_ara_main .taxmate-wrapper .difference-zero{
    color:#07945b;
}

/* =========================================================
   FOOTER ACTIONS
   ========================================================= */

.dashes_ara_main .taxmate-wrapper .bottom-actions{
    background:#fff;
    border:1px solid #dce5ef;
    border-radius:7px;
    padding:10px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-top:10px;
}

.dashes_ara_main .taxmate-wrapper .left-actions,
.dashes_ara_main .taxmate-wrapper .right-actions{
    display:flex;
    gap:7px;
}

.dashes_ara_main .taxmate-wrapper .action-btn{
    border:1px solid #ccd9e6;
    background:#fff;
    color:#526b84;
    padding:8px 12px;
    border-radius:4px;
    cursor:pointer;
    font-size:10px;
}

.dashes_ara_main .taxmate-wrapper .primary-btn{
    background:#14579b;
    color:#fff;
    border-color:#14579b;
}

.dashes_ara_main .taxmate-wrapper .success-btn{
    background:#13a66a;
    color:#fff;
    border-color:#13a66a;
}





.dashes_ara_main .taxmate-wrapper .al_data_mnges {
    height: 53vh;
    overflow: auto;
}


.HouseProperty .overview{
  margin-top:18px;
  border:1px solid #cfe0f4;
  border-radius:6px;
  background:linear-gradient(90deg,#f5f9ff,#fff);
  padding:10px 15px;
  display:flex;align-items:center;
  justify-content:space-between;gap:20px;
}
.HouseProperty .overview h2{    margin: 0 0 5px; font-size: 16px;  color: #173f67; font-weight: 600;}
.HouseProperty .overview p{margin:0;color:var(--muted);font-size:12px}
.HouseProperty .overall{min-width:250px}
.HouseProperty .overall-top{display:flex;justify-content:space-between;margin-bottom:0px}
.HouseProperty .overall-top span {font-size: 14px; font-weight: 600;}
.HouseProperty .overall-top strong{color:var(--green);font-size:18px}
.HouseProperty .bar{height:8px;background:#e5edf6;border-radius:20px;overflow:hidden}
.HouseProperty .bar span{display:block;height:100%;background:var(--green);border-radius:20px}


.HouseProperty .summary-grid{
  display:grid;grid-template-columns:repeat(5,1fr);
  gap:10px;margin:16px 0;
}
.HouseProperty .metric{
  border:1px solid #e4e4e4;
  border-radius:6px;
  padding:12px 14px;background:#fff;
}
.HouseProperty .metric .label{font-size:10px;color:#8190a2; padding:0;}
.HouseProperty .metric .value{font-size:16px;font-weight:700;color:#183e63;margin-top:4px}
.HouseProperty .metric.green .value{color:var(--green)}

/* Section */
.HouseProperty .section-head{
  display:flex;justify-content:space-between;align-items:center;
  margin:22px 0 10px;
}
.HouseProperty .section-head h2{    margin: 0; font-size: 16px; color: #183e63; font-weight: 600;}
.HouseProperty .section-head p{margin:3px 0 0;color:var(--muted);font-size:11px}

/* Cards */
.HouseProperty .card-grid{
  display:grid;grid-template-columns:repeat(3,1fr);gap:12px;
}
.HouseProperty .sub-card{
  border:1px solid #e4e4e4;
  border-radius:6px;
  background:#fff;box-shadow:var(--shadow);
  padding:15px;position:relative;
  transition:.15s;
}
.HouseProperty .sub-card:hover{transform:translateY(-1px);box-shadow:0 7px 18px rgba(25,68,115,.11)}
.HouseProperty .card-top{display:flex;justify-content:space-between;align-items:center}
.HouseProperty .badge-no{
  width:28px;height:28px;border-radius:50%;
  display:flex;align-items:center;justify-content:center;
  font-weight:700;font-size:12px;
}
.HouseProperty .complete .badge-no{background:var(--green);color:#fff}
.HouseProperty .progress .badge-no{background:#e9f2ff;color:#1a4f96;border:1px solid #cfe0f4}
.HouseProperty .pending .badge-no{background:#f0f3f7;color:#748196}
.HouseProperty .locked .badge-no{background:#f0f3f7;color:#748196}
.HouseProperty .status{
  font-size:10px;padding:4px 7px;border-radius:20px;font-weight:700;
}
.HouseProperty .complete .status{color: var(--green); background: #eaf8f1;}
.HouseProperty .progress .status{color:#e7a900; background:#fff7df;}
.HouseProperty .pending .status{color:#718096;background:#f2f5f8}

.HouseProperty .sub-card.pending {
    background: transparent;
    padding: 15px;
}
.HouseProperty .section-head .btn {
    background: transparent;
    border: #ccc solid 1px;
    font-size: 11px !important;
    font-weight: 500;
    padding: 6px 10px !important;
}

.HouseProperty .card-icon{
  width: 38px;
    height: 38px;
    border-radius: 50%;
    margin: 9px 0 9px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    background: #eef5ff;
    color: #1a4f96;
}
.HouseProperty .complete .card-icon{color: var(--green); background: #eaf8f1;}
.HouseProperty .sub-card.progress {display: block; height: auto; margin: 0;}
.HouseProperty .progress .card-icon{color:#e7a900; background:#fff7df;}
.HouseProperty .card-title{font-size:14px;font-weight:700;color:#173e62; margin:0;}
.HouseProperty .card-desc{height:34px;margin-top:1px;color:#718198;font-size:11px;line-height:1.5}
.HouseProperty .card-bottom{
  margin-top:12px;padding-top:10px;
  border-top:1px solid #edf1f6;
  display:flex;align-items:center;justify-content:space-between;
}
.HouseProperty .mini-progress{flex:1;margin-right:12px}
.HouseProperty .mini-progress .bar{height:5px; margin:0;}
.HouseProperty .mini-progress small{display:block;margin-top:4px;color:#7a8899;font-size:9px}
.HouseProperty .open{
  border:1px solid #cbdced;background:#fff;
  color:#1a4f96;border-radius:6px;
  padding:6px 10px;font-size:10px;font-weight:700;
  cursor:pointer;
}
.HouseProperty .open.primary{background:#1a4f96;color:#fff;border-color:#1a4f96}
.HouseProperty .open:disabled{cursor:not-allowed;color:#9aa7b7;background:#f7f9fb}

/* Summary table */
.HouseProperty .panel{
  border:1px solid var(--border);border-radius:9px;
  background:#fff;box-shadow:var(--shadow);
  overflow:hidden;
}
.HouseProperty .table-wrap{overflow-x:auto}
table{width:100%;border-collapse:collapse;min-width:850px}
th{
  background:#f1f6fc;color:#536b83;
  font-size:10px;text-align:left;padding:10px;
  border-bottom:1px solid var(--border);
}
td{padding:10px;border-bottom:1px solid #edf1f5;font-size:11px}
tr:last-child td{border-bottom:0}
.HouseProperty .amount{text-align:right;font-weight:600}
.HouseProperty .total td{background:#f7fbff;font-weight:700;color:#173e62}
.HouseProperty .tag{
  display:inline-block;padding:4px 7px;border-radius:12px;
  font-size:9px;font-weight:700;
}
.HouseProperty .tag.green{background:var(--green-soft);color:var(--green)}
.HouseProperty .tag.blue{background:#edf4ff;color:#1a4f96}
.HouseProperty .tag.amber{background:var(--amber-soft);color:#a87500}


.HousePropertycontinue .panel.active {
    display: block;
}
.HousePropertycontinue .panel {
    display: block;
    padding: 15px;
    border-radius: 0;
    border: none;
    margin: 0;
    box-shadow: none;
}
.HousePropertycontinue .tab-content .card {
    border-radius: 0 0 5px 5px;
    box-shadow: none;
}

.HousePropertycontinue .tab-content .card-head {
        padding: 10px 13px;
    border-bottom: 1px solid #dce5ef;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.HousePropertycontinue .tab-content .card-head h2 {
    margin: 0;
    font-size: 14px;
    color: #234a79;
	font-weight:600;
}
.HousePropertycontinue .tab-content .card-head p {
    margin: 3px 0 0;
    color: var(--muted);
    font-size: 10px;
}

.HousePropertycontinue .tab-content .card-head .btn.small {
    padding: 5px 9px !important;
    font-size: 11px !important;
}

.HousePropertycontinue .panel .notice {
background: #eef6ff;
    border: 1px solid #d5e6fa;
    border-radius: 4px;
    padding: 6px 11px;
    font-size: 10px;
    line-height: 1.5;
    margin-bottom: 12px;
}
.HousePropertycontinue .panel .grid2 {
    display: grid;
    grid-template-columns: minmax(0, 1fr) 300px;
    gap: 12px;
}
.HousePropertycontinue .panel .grid2 .card {
    border-radius: 4px;
	margin:0;
}


.HousePropertycontinue .panel .card.summary-card {
    display: block;
    padding: 0;
	margin-bottom:15px;
}
.HousePropertycontinue .panel .card.summary-card .card-body .metric {
    display: flex;
    justify-content: space-between;
    padding: 6px 0;
    border-bottom: 1px solid #edf1f5;
    font-size: 11px;
    background: transparent;
    border-radius: 0;
}

.HousePropertycontinue .panel .card.summary-card .card-body .metric strong {
    font-size: 11px;
    color: #263c5c;
}
.HousePropertycontinue .panel .card.summary-card .card-body .metric:last-child{border:none; padding-bottom:0;}

.HousePropertycontinue .tab-content .card .formgrid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 11px;
}
.HousePropertycontinue .tab-content .card .formgrid label {
    display: block;
    font-size: 10px;
    font-weight: 700;
    color: #53667d;
    margin-bottom: 5px;
}
.HousePropertycontinue .tab-content .card .formgrid input, select {
    width: 100%;
    height: 34px;
    border: 1px solid #cbd8e8;
    border-radius: 5px;
    padding: 0 9px;
    font-size: 11px;
    color: #314963;
    background: #fff;
}
.HousePropertycontinue .tab-content .card .formula {
    background: #f3f5f7;
    border-radius: 18px;
    padding: 10px 13px;
    font-family: Consolas, monospace;
    font-size: 10px;
    color: #263d59;
    margin: 8px 0;
}

.HousePropertycontinue .tab-content .card .doc {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border: 1px dashed #cbd9e8;
    padding: 9px;
    border-radius: 6px;
    margin-top: 8px;
}
.HousePropertycontinue .tab-content .card .doc .name {
    font-size: 11px;
    font-weight: 700;
	text-align: left;
}
.HousePropertycontinue .tab-content .card .doc .src {
    font-size: 9px;
    color: var(--muted);
    margin-top: 2px;
}
.HousePropertycontinue .tab-content .card .doc button.view {
    font-size: 11px;
    padding: 2px 10px;
    border: none;
    background: #ebebeb;
    border-radius: 3px;
}
.HousePropertycontinue .al_data_mngess {
    height:47vh;
    overflow: auto;
}




.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .employer-card {
    border: 1px solid #dce4ee;
    border-radius: 5px;
    overflow: hidden;
    background: #fff;
	margin-bottom:12px;
}
.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .employer-card:last-child{margin-bottom:0;}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .employer-card .employer-card-top {
    display: flex;
    align-items: center;
    gap: 13px;
    padding: 12px 15px;
    background: #f8fafc;
    border-bottom: 1px solid #e3e8ef;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .employer-card .employer-number {
    width: 37px;
    height: 37px;
    border-radius: 9px;
    background: #eaf1fb;
    color: #2457a6;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 11px;
    font-weight: 700;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .employer-card .employer-main {
    flex: 1;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .employer-card .employer-title-row {
    display: flex;
    align-items: center;
    gap: 9px;
    flex-wrap: wrap;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .employer-card .employer-title-row h3 {
    font-size: 13px;
    color: #233858;
	margin:0;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .employer-card .employer-status {
    padding: 4px 8px;
    border-radius: 20px;
    font-size: 9px;
    font-weight: 600;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .employer-card .current {
    background: #eaf8ef;
    color: #23804b;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .employer-card .previous {
    background: #eef2f7;
    color: #687890;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .employer-card .employer-subtitle {
    margin: 0px;
    color: #718098;
    font-size: 10px;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .employer-card .employer-subtitle span {
    margin: 0 6px;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .employer-card .employer-actions {
    display: flex;
	gap:5px;
}
button.action-icon {
    background: #fff;
    border: #dfdfdf solid 1px;
    padding: 0;
    border-radius: 4px;
    width: 25px;
    height: 25px;
    font-size: 13px;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .employer-card .employer-period {
    display: grid;
    grid-template-columns: 1fr 1fr;
    padding: 13px 17px;
    border-bottom: 1px solid #e5eaf1;
	margin-bottom:13px;
}
.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .employer-card .employer-period:last-child{margin-bottom:0;}


.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .employer-card .employer-period div {
    display: flex;
    flex-direction: column;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .employer-card .employer-period span,
.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .employer-card .employer-detail span {
    color: #7c899d;
    font-size: 9px;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .employer-card .employer-period strong,
.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .employer-card .employer-detail strong {
    color: #394b66;
    font-size: 11px;
    font-weight: 600;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .employer-card .employer-details {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .employer-card .employer-detail {
    padding: 12px 17px;
    border-right: 1px solid #e5eaf1;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .employer-card .employer-detail:last-child {
    border-right: 0;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .employer-card .employer-detail span {
    display: block;
    margin-bottom: 3px;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .employer-card .verified {
    color: #23804b !important;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .employer-card .employer-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 9px 17px;
    background: #fafbfd;
    border-top: 1px solid #e5eaf1;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .employer-card .record-info {
    color: #23804b;
    font-size: 9px;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .employer-card .small-btn {
    border: 1px solid #cbd7e6;
    background: #fff;
    color: #2457a6;
    padding: 6px 10px;
    border-radius: 6px;
    font-size: 9px;
    font-weight: 600;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .employer-card .employer-summary {
    margin: 0 22px 22px;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    background: #f8fafc;
    border: 1px solid #dce4ee;
    border-radius: 9px;
    overflow: hidden;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .employer-card .employer-summary div {
    padding: 12px 15px;
    border-right: 1px solid #dce4ee;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .employer-card .employer-summary div:last-child {
    border-right: 0;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .employer-card .employer-summary span {
    display: block;
    font-size: 9px;
    color: #7a879b;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .employer-card .employer-summary strong {
    font-size: 13px;
    color: #293e5c;
}
.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .bothss {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
button.action-button {
    border: 0;
    background: #2457a6;
    color: #fff;
    border-radius: 5px;
    padding: 8px 12px;
    font-size: 12px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 7px;
    white-space: nowrap;
    box-shadow: 0 4px 10px rgba(36, 87, 166, .15);
}
.bank-scroll {
    overflow-x: auto;
}



.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .security-note{
    margin:0px;
    padding:12px 14px;
    border:1px solid #dce7f5;
    background:#f5f9ff;
    border-radius:6px;
    display:flex;
    gap:10px;
    align-items:flex-start;
}
.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .security-note.notflexx {
    display: grid;
    gap: 0;
}
.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .security-note.notflexx div {
    display: flex;
    gap: 5px;
    align-items: center;
}
.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .security-note.notflexx div span.ic {
    font-size: 12px;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .security-note i{
    color:#2457a6;
    margin-top:2px;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .security-note strong{
    display:block;
    font-size:12px;
    color:#263957;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .security-note p{
    font-size:10px;
    color:#718098;
	margin:0;
}


.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .account-section{
    padding:0px;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .account-category-title{
    font-size:12px;
    color:#263957;
    font-weight:700;
    margin:12px 0 8px;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .account-card{
    display:flex;
    align-items:center;
    gap:13px;
    border:1px solid #dce4ee;
    border-radius:6px;
    padding:10px 15px;
    margin-bottom:9px;
    background:#fff;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .account-icon{
    width:38px;
    height:38px;
    border-radius:6px;
    background:#eef4fc;
    color:#2457a6;
    display:flex;
    align-items:center;
    justify-content:center;
    flex-shrink:0;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .account-main{
    flex:1;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .account-main h3{
    font-size:12px;
    color:#263957;
	margin:0;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .account-main p{
    font-size:9px;
    color:#7a879b;
    margin:0;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .account-meta{
    text-align:right;
}
.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .account-meta strong {
    font-size: 12px;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .account-meta span{
    display:block;
    font-size:9px;
    color:#7a879b;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .account-actions{
    display:flex;
    gap:4px;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .connect-btn{
    border:1px solid #cbd7e6;
    background:#fff;
    color:#2457a6;
    border-radius:6px;
    padding:6px 9px;
    font-size:9px;
    font-weight:600;
}

.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .connect-btn:hover{
    background:#eef4fc;
}



.modal-overlay.all_mld_popup{
    position:fixed;
    inset:0;
    background:rgba(20,36,60,.48);
    display:none;
    align-items:center;
    justify-content:center;
    z-index:9999;
    padding:0px;
}

.modal-overlay.all_mld_popup.show{
    display:flex !important;
}

.modal-overlay.all_mld_popup .modal{
    width:100%;
    max-width:720px;
    height: max-content;
    overflow-y:auto;
    background:#fff;
    border-radius:12px;
    box-shadow:0 20px 60px rgba(0,0,0,.22);
    display: block;
    margin: 0 auto;
	top: initial;
    bottom: initial;
}

.modal-overlay.all_mld_popup .modal-header{
    display: flex;
    justify-content: left;
    align-items: center;
    padding: 16px 20px;
    border-bottom: 1px solid #dce4ee;
    background: #fff;
    position: relative;
}

.modal-overlay.all_mld_popup .modal-header h2{
    font-size: 16px;
    color: #333;
    margin: 0;
}
.modal-overlay.all_mld_popup .modal-header h2 i {
    font-size: 13px;
}

.modal-overlay.all_mld_popup .modal-header h2 button.close-modal {
    position: absolute;
    right: 18px;
    width: auto;
    top: 10px;
    border-radius: 0;
    border: none;
    height: auto;
    background: transparent;
    color: #000;
    font-size: 26px;
}

.modal-overlay.all_mld_popup .modal-body{
    padding:20px;
	max-height: 555px;
    overflow: auto;
}

.modal-overlay.all_mld_popup .form-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:15px;
}

.modal-overlay.all_mld_popup .form-group{
    display:flex;
    flex-direction:column;
	margin:0;
}

.modal-overlay.all_mld_popup .form-group.full{
    grid-column:1/-1;
}

.modal-overlay.all_mld_popup .form-group label{
    font-size: 13px;
    font-weight: 600;
    color: #000000;
    margin-bottom: 5px;
}

.modal-overlay.all_mld_popup .required{
    color:#e04d4d;
}

.modal-overlay.all_mld_popup .form-control{
    height:38px;
    border:1px solid #cbd6e4;
    border-radius:6px;
    padding:0 10px;
    font-size:12px;
    outline:none;
}

.modal-overlay.all_mld_popup .form-control:focus{
    border-color:#2457a6;
}

.modal-overlay.all_mld_popup textarea.form-control{
    height:75px;
    padding-top:9px;
    resize:vertical;
}

.modal-overlay.all_mld_popup .help-text{
    font-size:9px;
    color:#758299;
    margin-top:3px;
}


.modal-overlay.all_mld_popup #bankDateClosing:disabled{
    background:#f1f4f8;
    color:#9aa7b8;
    cursor:not-allowed;
}

.modal-overlay.all_mld_popup .modal-footer{
    display:flex;
    justify-content:flex-end;
    gap:8px;
    padding:13px 20px;
    background:#f8fafc;
    border-top:1px solid #dce4ee;
}

.modal-overlay.all_mld_popup .btn-cancel,
.modal-overlay.all_mld_popup .btn-save{
    border-radius:6px;
    padding:8px 15px;
    font-size:11px;
    font-weight:600;
}

.modal-overlay.all_mld_popup .btn-cancel{
    border:1px solid #d5deea;
    background:#fff;
    color:#45556d;
}

.modal-overlay.all_mld_popup .btn-save{
    border:0;
    background:#2457a6;
    color:#fff;
}
.fixxed {
    display: flex;
    gap: 6px;
}



.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .account-section .stats {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 10px;
    margin:14px 0;
}
.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .account-section .stats .stat {
    background: #fff;
    border: 1px solid #dce5ef;
    border-radius: 6px;
    padding: 8px 14px;
}
.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .account-section .stats .stat .sl {
    font-size: 11px;
    color: #72819a;
}
.dashes_ara_main .taxmate-wrapper .card .crd_under_datas .account-section .stats .stat .sv {
    font-size: 18px;
    font-weight: bold;
    color: #1e4f8f;
    margin-top: 5px;
}
.dashes_ara_main .taxmate-wrapper .cardboooxs{
	background: #fff;
    border: 1px solid #dce5ef;
    border-radius: 6px;
    padding: 14px 14px;
}
.dashes_ara_main .taxmate-wrapper .cardboooxs .chead {
    display: inline-block;
    width: 100%;
}

.dashes_ara_main .taxmate-wrapper .cardboooxs .chead h2 {
    font-size: 17px;
    margin: 0 0 3px;
    font-weight: 700;
    color: #1a4f96;
}
.dashes_ara_main .taxmate-wrapper .cardboooxs .chead p {
    font-size: 13px;
    margin: 0;
    font-weight: 500;
    color: #999;
}
.dashes_ara_main .taxmate-wrapper .cardboooxs .wrap {
    margin: 12px 0;
}
.dashes_ara_main .taxmate-wrapper .cardboooxs .wrap table {
    border: #f1f1f1 solid 1px;
}
.dashes_ara_main .taxmate-wrapper .cardboooxs .wrap table .doc {
    border: 1px solid #e1e7ef;
    border-radius: 4px;
    padding: 3px 5px;
    text-align: center;
    margin-right: 3px;
	color: #0a9960;
    font-weight: 600;
}
.dashes_ara_main .taxmate-wrapper .cardboooxs .wrap table button.view {
    background: #f1f4fc;
    border: 1px solid #e1e7ef;
    border-radius: 4px;
    padding: 2px 5px;
    text-align: center;
}
.dashes_ara_main .taxmate-wrapper .actions button.icon {
    background: #fff;
    border: 1px solid #e1e7ef;
    border-radius: 4px;
    padding: 3px 5px;
    text-align: center;
	margin-right:5px;
}
.dashes_ara_main .taxmate-wrapper .actions button.icon:last-child {
	margin-right:0px;
}



.modal-overlay.all_mld_popup .docbox{margin-top:0px; border:1px solid #cbd6e4; border-radius:6px; padding:13px; background:#fafcff}
.modal-overlay.all_mld_popup .docbox h4{margin: 0 0 4px; font-size: 15px; font-weight: 700;}
.modal-overlay.all_mld_popup .docbox .help{font-size:10px;color:#77869b;line-height:1.45}
.modal-overlay.all_mld_popup .docbox .tabs{display:flex;gap:8px;margin:10px 0}
.modal-overlay.all_mld_popup .docbox .tab{padding:7px 10px;border:1px solid #cfcfcf;background:#fff;border-radius:5px;font-size:10px;font-weight:bold;cursor:pointer}
.modal-overlay.all_mld_popup .docbox .active{background:#edf4ff;border-color:#8fb2df;color:var(--p)}
.modal-overlay.all_mld_popup .docbox .upload{border:1px dashed #b9cbe0;border-radius:6px;padding:12px; margin-bottom:10px; position:relative;}
.modal-overlay.all_mld_popup .docbox .upload .document-remove {position: absolute; right: 0; bottom: 0;}
.modal-overlay.all_mld_popup .docbox .upload .document-remove button.remove-document {
    background: #ff0000;
    border: none;
    color: #fff;
    padding: 6px;
    border-radius: 100px 20px 20px 20px;
    height: 22px;
    width: 26px;
    line-height: 11px;
    font-size: 19px;
}
.modal-overlay.all_mld_popup .docbox .upload .document-remove button.remove-document:focus{outline:none;}

.modal-overlay.all_mld_popup .docbox .upload:last-child{margin-bottom:0px;}
.modal-overlay.all_mld_popup .docbox .mf{padding:13px 18px;border-top:1px solid var(--b);display:flex;justify-content:flex-end;gap:8px}

.modal-overlay.all_mld_popup .docbox label.ac_typess {
    display: flex;
    gap: 12px;
	align-items: center;
    font-size: 12px;
}
.modal-overlay.all_mld_popup .docbox label.ac_typess select#plan {
    width: auto;
    height: auto;
	padding:3px 4px;
}
.modal-overlay.all_mld_popup .docbox .upload .bothss {
    display: flex;
    gap: 12px;
}
.modal-overlay.all_mld_popup .docbox .upload input {
    width: 100%;
    height: 35px;
    border: 1px solid #cbd8e8;
    border-radius: 4px;
    padding: 6px 9px;
    font-size: 12px;
}
.modal-overlay.all_mld_popup .docbox .sm_mtr_texttx1{font-size:10px; color:#a56f00; margin-top:6px; text-align:left;}
.modal-overlay.all_mld_popup .docbox .sm_mtr_texttx{font-size:10px; color:#087b4d; margin-top:6px; text-align:left;}

.mulipal{position:relative;}
.mulipal button.action-button {position: absolute; right: 0; top: -35px; padding: 6px 10px; font-size: 11px;}

.multiple_file{position:relative;}
.multiple_file button.action-button {position: absolute; right: 0; top: -35px; padding: 6px 10px; font-size: 11px;}

.MyProfiles .over_contenttts .al_data_mngess {
    height: 56.5vh;
    overflow: auto;
}
button.view.v_w {
    font-size: 11px;
    padding: 2px 10px;
    border: none;
    background: #ebebeb;
    border-radius: 3px;
}

.matex_dashbrd .previous-years .news-card{
    padding: 0;
}
.matex_dashbrd .previous-years .news-card .year-card {
    width: 100%;
	padding:14px 10px;
}

/* =========================================================
   RESPONSIVE
   ========================================================= */

@media(max-width:900px){
    .dashes_ara_main .taxmate-wrapper .step-header{
        flex-wrap:wrap;
    }

    .dashes_ara_main .taxmate-wrapper .progress-area{
        order:3;
        width:100%;
    }

    .dashes_ara_main .taxmate-wrapper .content-layout{
        grid-template-columns:1fr;
    }

    .dashes_ara_main .taxmate-wrapper .side-content{
        display:grid;
        grid-template-columns:1fr 1fr;
        gap:10px;
    }

    .dashes_ara_main .taxmate-wrapper .employer-grid{
        grid-template-columns:1fr 1fr;
    }

}

@media(max-width:600px){
    .dashes_ara_main .taxmate-wrapper .taxmate-wrapper{width:97%; margin-top:8px;}
    .dashes_ara_main .taxmate-wrapper .step-header{padding:10px;}
    .dashes_ara_main .taxmate-wrapper .step-title h1{font-size:19px;}
    .dashes_ara_main .taxmate-wrapper .header-actions{width: 100%; justify-content: center; display: grid;}
	
	.dashes_ara_main .taxmate-wrapper .progress-area {
        order: 0;
        width: 100%;
	}
	.dashes_ara_main .taxmate-wrapper .progress-area {
		min-width: 150px;
	}

	.over_contenttts.step-flow-fixed .step-flow {
		width: 100%;
        left: 0;
        max-width: 100%;
        margin: inherit;
        border-radius: 0;
        margin-top: -10px;
	}
	.taxmate-wrapper .over_contenttts {
		max-height: initial;
		overflow: inherit;
	}
	.over_contenttts.step-flow-fixed .sub-tabs.sub-tabs-fixed {
		margin-top: 105px !important;
	}


    .dashes_ara_main .taxmate-wrapper .content-layout{
        display:block;
    }

    .dashes_ara_main .taxmate-wrapper .side-content{
        display:block;
    }

    .dashes_ara_main .taxmate-wrapper .employer-grid{
        grid-template-columns:1fr 1fr;
    }

    .dashes_ara_main .taxmate-wrapper .bottom-actions{
        flex-direction:column;
        gap:8px;
        align-items:stretch;
    }

    .dashes_ara_main .taxmate-wrapper .left-actions,
    .dashes_ara_main .taxmate-wrapper .right-actions{
        justify-content:center;
    }
}




@media (min-width: 320px) and (max-width: 767px) {.mb_v_show{display:block !important;}.mb_v_hine{display:none !important;}.ads_areea{display:none;}.dashes_ara_main .topbar .greeting {text-align: center; width: 100%; display: inline-block; margin-bottom: 12px;}.dashes_ara_main .top-actions {justify-content: space-between;}.dashes_ara_main .layout {display: block;}.dashes_ara_main .right-stack {display: grid; grid-template-columns: 1fr 1fr;}.dashes_ara_main .doc-grid {grid-template-columns: repeat(3, 1fr);}.dashes_ara_main .grid-top {grid-template-columns: 1fr;}.dashes_ara_main .quick {grid-column: auto;}.dashes_ara_main {padding: 15px 0 0;}.dashes_ara_main .topbar {align-items: flex-start; display: block;}.dashes_ara_main .greeting h1 {font-size: 17px;}.dashes_ara_main .user {display: none;}.dashes_ara_main .step-grid {grid-template-columns: 1fr;}.dashes_ara_main .summary{grid-template-columns: 1fr 1fr;}.dashes_ara_main .right-stack {grid-template-columns: 1fr; margin-bottom: 15px;}.dashes_ara_main .activity.rececents {height: auto; overflow: initial; margin-top: 15px;}.dashes_ara_main .step-line {overflow: auto; justify-content: flex-start;}.dashes_ara_main .arrow {min-width: 20px;}.dashes_ara_main .progress-title h2 {margin-top: 0;}.dashes_ara_main .profile-head h3{margin-top: 0;}.dashes_ara_main .quick h3{margin-top: 0;}.dashes_ara_main .section-title h2{margin-top: 5px; font-size: 14px;}.matex_dashbrd .news-slider {padding: 0 35px; display:none;}.matex_dashbrd .news-card {min-height: 240px;}.matex_dashbrd .news-title {font-size: 17px;}.matex_dashbrd .news-description {font-size: 17px;}.matex_dashbrd .news-slider .owl-nav .owl-prev {left: -30px;}.matex_dashbrd .news-slider .owl-nav .owl-next {right: -30px;}.mobile_menu_btn {display: block; border: #1c5299 solid 2px; padding: 3px 7px; border-radius:4px;}.mobile_menu_btn i {color: #1c5299;}.side_menusses {display:block; position:fixed; top:initial; left:0; bottom:initial; width:280px; height:100vh; background:#1a4f96; z-index:10000; overflow-y:auto; transform: translateX(-100%); transition:transform 0.35s ease; box-shadow:3px 0 15px rgba(0, 0, 0, 0.15);}
.side_menusses.menu_open {transform: translateX(0); box-shadow: 7px 2px 8px rgba(0, 0, 0, 0.15); margin-top: 1px;}
.side_menusses .navigation {margin:0; padding:20px 0;}
.side_menusses .nav-item {width: 100%;}

.matex_dashbrd .previous-years .news-card{min-height:auto;}
.dashes_ara_main .layout.scrolls {height: auto; overflow: inherit;}
.side_menusses .tax-sidebar{height: 100%; border-radius: 0;}
}




</style>


<!-- ==================== Edit Basic Information ==================== -->
<div id="EditBasicInformation" class="modal-overlay all_mld_popup">
    <div class="modal">
       <div class="modal-header">
        <h2>
		  Edit Basic Information
          <button type="button" class="close-modal" data-modal="EditBasicInformation">×</button>
		</h2>
       </div>		
       <form action="">
        <div class="modal-body">
			<div class="form-grid">
				<div class="form-group">
					<label> Name <span class="required">*</span> </label>
					<input class="form-control" id="familyName" placeholder="Full name" required="" />
				</div>
				
				<div class="form-group">
					<label> Father Name </label>
					<input class="form-control" id="familyName" placeholder="Full father name" />
				</div>
				
				<div class="form-group">
					<label> Gender </label>
					<select class="form-control">
						<option>Male</option>
						<option>Female</option>
						<option>Other</option>
					</select>
				</div>

				<div class="form-group">
					<label> Date of Birth </label>
					<input type="date" class="form-control" />
				</div>

				<div class="form-group">
					<label> PAN </label>
					<input class="form-control" placeholder="Enter PAN" />
				</div>

				<div class="form-group">
					<label> Aadhaar </label>
					<input class="form-control" placeholder="Enter Aadhaar" />
				</div>
				
				<div class="form-group">
					<label> Mobile </label>
					<input class="form-control" value="+91" />
				</div>
				
				<div class="form-group">
					<label> Email </label>
					<input class="form-control" placeholder="Enter Email" />
				</div>				
				
				<div class="form-group">
					<label> Residential Status </label>
					<select class="form-control">
					 <option>Resident Individual</option>
					 <option>Non-Resident</option>
					 <option>Resident but Not Ordinarily Resident</option>
					</select>
				</div>
				
				<div class="form-group">
					<label> ITR Ward No. </label>
					<input class="form-control" placeholder="Enter ITR Ward" />
				</div>
			</div>		   	
		</div>

		<div class="modal-footer">
			<button  type="button" class="close-modal btn-cancel" data-modal="EditBasicInformation">Cancel</button>

			<button type="submit" class="btn-save">
				Save Changes
			</button>
		</div>
	   </form>
    </div>	
</div>
<!-- ==================== End Edit Basic Information ==================== -->

<!-- ==================== Edit Address ==================== -->
<div id="EditAddressss" class="modal-overlay all_mld_popup">
    <div class="modal">
       <div class="modal-header">
        <h2>
		  Edit Address
          <button type="button" class="close-modal" data-modal="EditAddressss">×</button>
		</h2>
       </div>		
       <form action="">
        <div class="modal-body">
			<div class="form-grid">
				<div class="form-group">
					<label> House No. </label>
					<input class="form-control" id="" placeholder="Enter House No" required="" />
				</div>
				
				<div class="form-group">
					<label> Street </label>
					<input class="form-control" id="" placeholder="Enter Street" />
				</div>
				
				<div class="form-group">
					<label> Village </label>
					<input class="form-control" id="" placeholder="Enter Village" />
				</div>
				
				<div class="form-group">
					<label> Post / Tehsil </label>
					<input class="form-control" id="" placeholder="Enter Post / Tehsil" />
				</div>
				
				<div class="form-group">
					<label> City </label>
					<input class="form-control" id="" placeholder="Enter City" />
				</div>
				
				<div class="form-group">
					<label> District </label>
					<input class="form-control" id="" placeholder="Enter District" />
				</div>
				
				<div class="form-group">
					<label> State </label>
					<select class="form-control">
					 <option>Rajasthan</option>
					 <option>Haryana</option>
					 <option>Delhi</option>
					</select>
				</div>

				<div class="form-group">
					<label> PAN </label>
					<input class="form-control" placeholder="Enter PAN" />
				</div>				
			</div>		   	
		</div>

		<div class="modal-footer">
			<button  type="button" class="close-modal btn-cancel" data-modal="EditAddressss">Cancel</button>
			<button type="submit" class="btn-save">
				Save Address
			</button>
		</div>
	   </form>
    </div>	
</div>
<!-- ==================== End Edit Basic Information ==================== -->

<!-- ==================== Add Bank Account ==================== -->
<div id="AddBankAccount" class="modal-overlay all_mld_popup">
    <div class="modal">
       <div class="modal-header">
        <h2>
		  Edit Address
          <button type="button" class="close-modal" data-modal="AddBankAccount">×</button>
		</h2>
       </div>		
       <form action="">
        <div class="modal-body">
			<div class="form-grid">
				<div class="form-group">
					<label> Bank Name. <span class="required">*</span></label>
					<input class="form-control" id="" placeholder="Enter Bank Name" required="" />
				</div>
				
				<div class="form-group">
					<label> Account Number <span class="required">*</span></label>
					<input class="form-control" id="" placeholder="Enter Account Number" required="" />
				</div>
				
				<div class="form-group">
					<label> IFSC Code <span class="required">*</span></label>
					<input class="form-control" id="" placeholder="Enter IFSC Code" required="" />
				</div>
				
				<div class="form-group">
					<label> Account Type </label>
					<select class="form-control" id="accountType">
					 <option value="">Select Account Type</option>
				  	 <option value="Savings">Savings</option>
					 <option value="Current">Current</option>
					 <option value="Salary">Salary</option>
					 <option value="NRE">NRE</option>
					 <option value="NRO">NRO</option>
					</select>
				</div>
				
				<div class="form-group">
					<label> Primary Account? </label>
					<select class="form-control">
				  	 <option value="Yes">Yes</option>
				  	 <option value="No">No</option>
					</select>
				</div>
				
				<div class="form-group">
					<label> Refund Account? </label>
					<select class="form-control">
				  	 <option value="Yes">Yes</option>
				  	 <option value="No">No</option>
					</select>
				</div>
				
                <div class="form-group">
					<label> Date of Closing </label>
					<input type="date" class="form-control" id="bankDateOpened">
				</div>	
				
				<div class="form-group">
					<label> Account Closed? </label>
					<select class="form-control">
					 <option value="Yes">Yes</option>
				  	 <option value="No">No</option>
					</select>
				</div>

				<div class="form-group">
                 <label>Date of Closing</label>
                 <input type="date" class="form-control" id="bankDateClosing" disabled="">
				 <span class="help-text">
				  Required only if the bank account has been closed.
				 </span>
                </div>				
			</div>		   	
		</div>

		<div class="modal-footer">
			<button  type="button" class="close-modal btn-cancel" data-modal="AddBankAccount">Cancel</button>
			<button type="submit" class="btn-save">
				Save Account
			</button>
		</div>
	   </form>
    </div>	
</div>
<!-- ==================== End Add Bank Account ==================== -->

<!-- ==================== FAMILY MODAL ==================== -->
<div id="FamilyMember" class="modal-overlay all_mld_popup">
    <div class="modal">
       <div class="modal-header">
        <h2>
		  <i class="fa fa-users"></i>
          Add Family Member
          <button type="button" class="close-modal" data-modal="FamilyMember">×</button>
		</h2>
       </div>		
       <form action="">
        <div class="modal-body">
			<div class="form-grid">
				<div class="form-group">
					<label> Relationship <span class="required">*</span> </label>

					<select class="form-control" id="familyRelation">
						<option>Spouse</option>
						<option>Son</option>
						<option>Daughter</option>
						<option>Father</option>
						<option>Mother</option>
						<option>Other Dependent</option>
					</select>
				</div>

				<div class="form-group">
					<label> Name <span class="required">*</span> </label>
					<input class="form-control" id="familyName" placeholder="Full name" required="" />
				</div>

				<div class="form-group">
					<label> Date of Birth </label>

					<input type="date" class="form-control" />
				</div>

				<div class="form-group">
					<label> Gender </label>

					<select class="form-control">
						<option>Male</option>
						<option>Female</option>
						<option>Other</option>
					</select>
				</div>

				<div class="form-group">
					<label> PAN </label>

					<input class="form-control" placeholder="PAN if available" />
				</div>

				<div class="form-group">
					<label> Aadhaar </label>

					<input class="form-control" placeholder="Aadhaar" />
				</div>

				<div class="form-group">
					<label> Tax Dependent? </label>

					<select class="form-control">
						<option>Yes</option>
						<option>No</option>
					</select>
				</div>

				<div class="form-group">
					<label> Health Insurance? </label>

					<select class="form-control">
						<option>Yes</option>
						<option>No</option>
					</select>
				</div>

				<div class="form-group full">
					<label> Additional Notes </label>

					<textarea class="form-control" placeholder="Any relevant information"></textarea>
				</div>
			</div>		   	
		</div>

		<div class="modal-footer">
			<button  type="button" class="close-modal btn-cancel" data-modal="FamilyMember">Cancel</button>

			<button type="submit" class="btn-save">
				<i class="fa fa-plus"></i>
				Add Family Member
			</button>
		</div>
	   </form>
    </div>	
</div>
<!-- ==================== End FAMILY MODAL ==================== -->

<!-- ==================== Add Employer ==================== -->
<div id="employerModal" class="modal-overlay all_mld_popup">
    <div class="modal">
        <div class="modal-header">
            <h2>
                <i class="fa fa-building"></i>
                Add Employer
				<button type="button" class="close-modal" data-modal="employerModal">×</button>
            </h2>            
        </div>
		
		
        <form action="">
         <div class="modal-body">
            <div class="form-grid">
                <div class="form-group full">
                    <label> Employer Name <span class="required">*</span> </label>
                    <input class="form-control" id="employerName" placeholder="e.g. Indian Oil Corporation Ltd" required="" />
                </div>

                <div class="form-group">
                    <label>Employer Code</label>
                    <input class="form-control" id="employerCode" />
                </div>

                <div class="form-group">
                    <label>Designation</label>
                    <input class="form-control" id="designation" />
                </div>

                <div class="form-group full">
                    <label>Office Location</label>
                    <input class="form-control" id="officeLocation" />
                </div>

                <div class="form-group">
                    <label>Employment Start Date <span class="required">*</span></label>
                    <input type="date" class="form-control" id="employmentStart" required="" />
                </div>

                <div class="form-group">
                    <label>Employment End Date</label>
                    <input type="date" class="form-control" id="employmentEnd" />
                    <span class="help-text"> Leave blank if currently employed. </span>
                </div>

                <div class="form-group">
                    <label>Employer PAN <span class="required">*</span></label>
                    <input class="form-control" id="employerPan" required="" />
                </div>

                <div class="form-group">
                    <label>Employer TAN <span class="required">*</span></label>
                    <input class="form-control" id="employerTan" required="" />
                </div>

                <div class="form-group">
                    <label>Employer Status</label>
                    <select class="form-control" id="employerStatus">
                        <option value="current">Current Employer</option>
                        <option value="previous">Previous Employer</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Form 16 Status</label>
                    <select class="form-control" id="form16Status">
                        <option value="pending">Not Uploaded</option>
                        <option value="uploaded">Uploaded</option>
                    </select>
                </div>

                <div class="form-group full">
                    <label>TDS Deducted by Employer</label>
                    <input type="number" class="form-control" id="employerTds" placeholder="₹ Enter TDS amount" />
                </div>
            </div>
         </div>

         <div class="modal-footer">
            <button class="close-modal btn-cancel" data-modal="employerModal">Cancel</button>
            <button type="submit" class="btn-save">
				<i class="fa fa-plus"></i>
                Add Employer
            </button>
         </div>
		</form> 
    </div>
</div>
<!-- ==================== End Add Employer ==================== -->

<!-- ==================== Add Important Account ==================== -->
<div id="AddImportantAccount" class="modal-overlay all_mld_popup">
    <div class="modal">
        <div class="modal-header">
            <h2>
                <i class="fa fa-key"></i>
                 Add Important Account
				<button type="button" class="close-modal" data-modal="AddImportantAccount">×</button>
            </h2>            
        </div>
		
		
        <form action="">
         <div class="modal-body">
            <div class="form-grid">
                <div class="form-group">
                    <label> Account Category </label>
                    <select class="form-control">
					 <option value="">Tax &amp; Government</option>
					 <option value="">Investment</option>
					 <option value="">Broker / Demat</option>
					 <option value="">Financial Platform</option>
					 <option value="">Other</option>
					</select>
                </div>

                <div class="form-group">
                    <label>Account / Platform</label>
                    <input class="form-control" placeholder="e.g. Zerodha / TRACES / GST">
                </div>
				
				
				<div class="form-group full">
				  <label>User ID / Login ID <span class="required">*</span></label>
				  <input class="form-control" placeholder="Enter User ID if required" required="" />
				</div>
				
				<div class="form-group">
				  <label>Tax Purpose</label>
				  <select class="form-control">
				   <option value="">Tax Filing</option>
				   <option value="">TDS Verification</option>
				   <option value="">Capital Gains</option>
				   <option value="">Business Income</option>
				   <option value="">Other</option>
				  </select>
				</div>
				
				<div class="form-group">
				  <label>Status</label>
				  <select class="form-control">
				   <option value="">Added</option>
				   <option value="">Connected</option>
				   <option value="">Needs Review</option>
				   <option value="">Not Connected</option>
				  </select>
				</div>
				
				<div class="form-group full">
				  <label>Security Note</label>
				  <textarea class="form-control" placeholder="Additional information. Do not enter plain-text passwords here."></textarea>
				</div>
            </div>
         </div>

         <div class="modal-footer">
            <button class="close-modal btn-cancel" data-modal="AddImportantAccount">Cancel</button>
            <button type="submit" class="btn-save">
				<i class="fa fa-plus"></i>
                Add Employer
            </button>
         </div>
		</form> 
    </div>
</div>
<!-- ==================== End  Add Important Account ==================== -->

<!-- ==================== Add Important Account ==================== -->
<div id="AddProperty" class="modal-overlay all_mld_popup">
    <div class="modal">
        <div class="modal-header">
            <h2>
                 Edit Property — P001
				<button type="button" class="close-modal" data-modal="AddProperty">×</button>
            </h2>            
        </div>
		
		
        <form action="">
         <div class="modal-body">
            <div class="form-grid">
                <div class="form-group">
                    <label>Property Name <span class="required">*</span></label>
                    <input class="form-control" placeholder="Enter Name" required="" />
                </div>
				
				<div class="form-group">
                    <label> Property Type <span class="required">*</span> </label>
					<select class="form-control">
					 <option>Residential</option>
					 <option>Commercial</option>
					 <option>Land</option>
					 <option>Other</option>
					</select>
                </div>
				
				
				<div class="form-group full">
				  <label>Property Address <span class="required">*</span></label>
				  <input class="form-control" placeholder="Enter Property Address" required="" />
				</div>

				<div class="form-group">
				  <label>City <span class="required">*</span></label>
				  <input class="form-control" placeholder="Enter city" required="" />
				</div>
				
				<div class="form-group">
				  <label>Usage / Current Status <span class="required">*</span></label>
				  <select class="form-control">
				   <option value="self">Self Occupied</option>
				   <option value="let">Let Out</option>
				   <option value="vacant">Vacant</option>
				   <option value="deemed">Deemed Let Out</option>
				   <option value="other">Other</option>
				  </select>
				</div>
				
				<div class="form-group">
				  <label>Ownership % <span class="required">*</span></label>
				  <input class="form-control" placeholder="Enter ownership" required="" />
				</div>
								
				<div class="form-group">
				  <label>Co-owner?</label>
				  <select class="form-control">
				   <option value="">yes</option>
				   <option value="">No</option>
				  </select>
				</div>
				
				<div class="form-group">
				  <label>Date of Purchase</label>
				  <input type="date" class="form-control" placeholder="" />
				</div>
				
				<div class="form-group">
				  <label>Date of Possession</label>
				  <input type="date" class="form-control" placeholder="" />
				</div>
				
				<div class="form-group full">
				  <div class="docbox">
					<h4>Permanent Property Document *</h4>
					<div class="help">Add at least one permanent ownership/property document reference, such as Purchase Deed, Sale Deed or Possession Letter. FY-specific documents will be added inside the relevant ITR year.</div>
					<div class="tabs">
					 <div class="tab" id="upTab" onclick="mode('up')" style="opacity: 0.55;">Upload Document</div>
					 <div class="tab active" id="linkTab" onclick="mode('link')">Add Document Link</div>
					</div>
					<label class="ac_typess">Account type:
					  <select id="plan" onchange="planChanged()">
					   <option value="free">Free User</option>
					   <option value="paid">Paid User</option>
					  </select>
					</label>
					<div class="multiple_file" id="up" style="display: none;">
					 <div class="upload">
					  <button type="button" id="addMores" class="action-button" ><i class="fa fa-plus"></i>Add More</button>
					  <div class="bothss">
					   <input id="file" type="file" accept=".pdf,.jpg,.jpeg,.png" disabled="">
					   <input type="text" id="" name="" placeholder="Enter name of the Document" />
					  </div> 
					  <div class="sm_mtr_texttx1">Paid users can upload documents directly.</div>
					 </div>
					</div>
					<div class="mulipal" id="link" style="display: block;">
					 <div class="upload">
					  <button type="button" id="addMore" class="action-button" ><i class="fa fa-plus"></i>Add More</button>
					  <div class="bothss">
					   <input type="text" id="url" name="" placeholder="Paste Google Drive / OneDrive / document URL" />
					   <input type="text" id="url" name="" placeholder="Sale Deed of Flat 2002" />
					  </div>
					  <div class="sm_mtr_texttx">✓ Document links are available for Free and Paid users.</div>
					 </div>
					</div>
				  </div>
				</div>
            </div>
         </div>

         <div class="modal-footer">
            <button class="close-modal btn-cancel" data-modal="AddProperty">Cancel</button>
            <button type="submit" class="btn-save">
				<i class="fa fa-plus"></i>
                Save Property
            </button>
         </div>
		</form> 
    </div>
</div>
<!-- ==================== End  Add Important Account ==================== -->


<section class="matex_dashbrd">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">                
                <div class="side_menusses">
                   <div class="ads_areea"><img class="logo" src="{{ url('home/img/1cr_lgoo.jpg')}}" alt="" /></div>				
				    <div class="tax-sidebar">					    
						<!-- Steps -->
						<div class="tax-steps">
							<div class="tax-step completed">
								<div class="step-number">00</div>
								<div class="step-title"><a href="javascript:void(0);">Personal Profile</a></div>
								<div class="step-status success">
									100%
									<svg viewBox="0 0 20 20">
										<circle cx="10" cy="10" r="9"></circle>
										<path d="M6 10l2.5 2.5L14 7"></path>
									</svg>
								</div>
							</div>

							<div class="tax-step active">
								<div class="step-number">01</div>
								<div class="step-title"><a href="javascript:void(0);">Salary income</a></div>
								<div class="step-status progress">In Progress</div>
							</div>
							
							<div class="tax-step">
								<div class="step-number">02</div>
								<div class="step-title"><a href="javascript:void(0);">House Property</a></div>
								<div class="step-status">Pending</div>
							</div>

							<div class="tax-step">
								<div class="step-number">03</div>
								<div class="step-title"><a href="javascript:void(0);">Business / Professional Income</a></div>
								<div class="step-status">Pending</div>
							</div>
							
							<div class="tax-step">
								<div class="step-number">04</div>
								<div class="step-title"><a href="javascript:void(0);">Capital Gains</a></div>
								<div class="step-status">Pending</div>
							</div>
							
							<div class="tax-step">
								<div class="step-number">05</div>
								<div class="step-title"><a href="javascript:void(0);">Other Sources</a></div>
								<div class="step-status">Pending</div>
							</div>

							<div class="tax-step">
								<div class="step-number">06</div>
								<div class="step-title"><a href="javascript:void(0);">Deductions & Tax Planning</a></div>
								<div class="step-status">Pending</div>
							</div>

							<div class="tax-step">
								<div class="step-number">07</div>
								<div class="step-title"><a href="javascript:void(0);">TDS/TCS & Advance Taxes</a></div>
								<div class="step-status">Pending</div>
							</div>

							<div class="tax-step">
								<div class="step-number">08</div>
								<div class="step-title"><a href="javascript:void(0);">Review, Documents & File Return</a></div>
								<div class="step-status">Pending</div>
							</div>

							<div class="tax-step">
								<div class="step-number">09</div>
								<div class="step-title"><a href="javascript:void(0);">Tax Summary & Computation</a></div>
								<div class="step-status">Pending</div>
							</div>
							
							<div class="tax-step">
								<div class="step-number setingg">
								 <svg viewBox="0 0 24 24">
									<circle cx="12" cy="12" r="3"></circle>
									<path d="M19.4 15a1.7 1.7 0 0 0 .3 1.9l.1.1-1.8 1.8-.1-.1a1.7 1.7 0 0 0-1.9-.3 1.7 1.7 0 0 0-1 1.5V20h-2.6v-.1a1.7 1.7 0 0 0-1-1.5 1.7 1.7 0 0 0-1.9.3l-.1.1-1.8-1.8.1-.1A1.7 1.7 0 0 0 8 15a1.7 1.7 0 0 0-1.5-1H6v-2.6h.5A1.7 1.7 0 0 0 8 10a1.7 1.7 0 0 0-.3-1.9l-.1-.1 1.8-1.8.1.1a1.7 1.7 0 0 0 1.9.3 1.7 1.7 0 0 0 1-1.5V5H15v.1a1.7 1.7 0 0 0 1 1.5 1.7 1.7 0 0 0 1.9-.3l.1-.1 1.8 1.8-.1.1a1.7 1.7 0 0 0-.3 1.9 1.7 1.7 0 0 0 1.5 1h.1v2.6h-.1a1.7 1.7 0 0 0-1.5 1.4z"></path>
								 </svg>
								</div>
								<div class="step-title">Settings &amp; Profile</div>
								<div class="step-status"><img src="{{ url('home/img/vvdio_ic.png')}}" class="vdiioo" alt="" /></div>
							</div>
						</div>


						<!-- Dashboard -->
						<button class="dashboard-btn">
							<svg viewBox="0 0 24 24">
								<path d="M12 3l7 6v10H5V9l7-6z"></path>
								<path d="M9 14l2 2 4-4"></path>
							</svg>
							<span>Go to Dashboard</span>
						</button>


						<!-- Quick Actions -->
						<div class="quick-title">QUICK ACTIONS <span class="ardown"><i class="fa fa-chevron-down"></i></span></div>

						<div class="quick-actions" style="display:none;">
							<a href="javascript:void(0);" class="quick-action">
								<span class="quick-icon">
									<svg viewBox="0 0 24 24">
										<path d="M12 16V5"></path>
										<path d="M8 9l4-4 4 4"></path>
										<path d="M5 14v5h14v-5"></path>
									</svg>
								</span>
								<span>Upload Documents</span>
							</a>

							<a href="javascript:void(0);" class="quick-action">
								<span class="quick-icon">
									<svg viewBox="0 0 24 24">
										<path d="M4 19V5"></path>
										<path d="M4 19h16"></path>
										<path d="M7 15l4-4 3 2 5-6"></path>
									</svg>
								</span>
								<span>View AIS / TIS</span>
							</a>

							<a href="javascript:void(0);" class="quick-action">
								<span class="quick-icon">
									<svg viewBox="0 0 24 24">
										<rect x="5" y="3" width="14" height="18" rx="2"></rect>
										<path d="M8 7h8"></path>
										<path d="M8 11h3"></path>
										<path d="M13 11h3"></path>
										<path d="M8 15h3"></path>
										<path d="M13 15h3"></path>
									</svg>
								</span>
								<span>Tax Calculators</span>
							</a>

							<a href="javascript:void(0);" class="quick-action">
								<span class="quick-icon">
									<svg viewBox="0 0 24 24">
										<rect x="4" y="5" width="16" height="15" rx="2"></rect>
										<path d="M8 3v4"></path>
										<path d="M16 3v4"></path>
										<path d="M4 9h16"></path>
										<path d="M8 13h2"></path>
										<path d="M13 13h2"></path>
										<path d="M8 17h2"></path>
									</svg>
								</span>
								<span>Tax Calendar</span>
							</a>
													
							<a href="javascript:void(0);" class="quick-action">
								<span class="quick-icon">
								 <svg viewBox="0 0 24 24">
									<path d="M3 12a9 9 0 1 0 3-6.7"></path>
									<path d="M3 4v5h5"></path>
									<path d="M12 7v5l3 2"></path>
								 </svg>
								</span>
								<span>Previous Years</span>
							</a>

							<a href="javascript:void(0);" class="quick-action">
							    <span class="quick-icon">
								 <svg viewBox="0 0 24 24">
									<path d="M6 3h8l4 4v14H6z"></path>
									<path d="M14 3v5h5"></path>
									<path d="M9 13h6"></path>
									<path d="M9 17h6"></path>
								 </svg>
								</span>
								<span>Documents</span>
							</a>

							<a href="javascript:void(0);" class="quick-action">
							    <span class="quick-icon">
								 <svg viewBox="0 0 24 24">
									<path d="M12 3v12"></path>
									<path d="M7 10l5 5 5-5"></path>
									<path d="M4 19h16"></path>
								 </svg>
								</span> 
								<span>Downloads</span>
							</a>

							<a href="javascript:void(0);" class="quick-action">
							    <span class="quick-icon">
								 <svg viewBox="0 0 24 24">
									<circle cx="12" cy="12" r="9"></circle>
									<path d="M9.5 9a2.5 2.5 0 1 1 4.3 1.8c-.9.9-1.8 1.3-1.8 2.7"></path>
									<circle cx="12" cy="17" r=".7" fill="currentColor" stroke="none"></circle>
								 </svg>
								</span> 
								<span>Help &amp; Support</span>
							</a>
						</div>
					</div>
				

				</div>
                <div class="news-slider owl-carousel owl-theme">
                    <!-- Card 1 -->
                    <div class="news-card">
                        <div class="news-icon">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3 10.8L12 3l9 7.8v9.7c0 .8-.7 1.5-1.5 1.5h-5.2v-6.4H9.7V22H4.5c-.8 0-1.5-.7-1.5-1.5v-9.7z"
                                />
                                <path d="M1.5 10.5L12 1.8l10.5 8.7-1.3 1.6L12 4.4l-9.2 7.7-1.3-1.6z" />
                            </svg>
                        </div>
                        <h3 class="news-title">Real Estate Prices Rise in Major Cities</h3>
                        <p class="news-description">
                            Property prices across major metro cities increased steadily due to growing housing demand.
                        </p>
                        <a href="javascript:void(0);" class="read-more"> Read More </a>
                    </div>
                    <!-- Card 2 -->
                    <div class="news-card">
                        <div class="news-icon">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3 10.8L12 3l9 7.8v9.7c0 .8-.7 1.5-1.5 1.5h-5.2v-6.4H9.7V22H4.5c-.8 0-1.5-.7-1.5-1.5v-9.7z"
                                />
                                <path d="M1.5 10.5L12 1.8l10.5 8.7-1.3 1.6L12 4.4l-9.2 7.7-1.3-1.6z" />
                            </svg>
                        </div>
                        <h3 class="news-title">Property Market Shows Strong Growth</h3>
                        <p class="news-description">
                            The property market continues to grow as buyers look for better investment opportunities.
                        </p>
                        <a href="javascript:void(0);" class="read-more"> Read More </a>
                    </div>
                    <!-- Card 3 -->
                    <div class="news-card">
                        <div class="news-icon">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3 10.8L12 3l9 7.8v9.7c0 .8-.7 1.5-1.5 1.5h-5.2v-6.4H9.7V22H4.5c-.8 0-1.5-.7-1.5-1.5v-9.7z"
                                />
                                <path d="M1.5 10.5L12 1.8l10.5 8.7-1.3 1.6L12 4.4l-9.2 7.7-1.3-1.6z" />
                            </svg>
                        </div>
                        <h3 class="news-title">New Housing Projects Announced</h3>
                        <p class="news-description">
                            Several new residential projects have been announced across developing metropolitan areas.
                        </p>
                        <a href="javascript:void(0);" class="read-more"> Read More </a>
                    </div>
                    <!-- Card 4 -->
                    <div class="news-card">
                        <div class="news-icon">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3 10.8L12 3l9 7.8v9.7c0 .8-.7 1.5-1.5 1.5h-5.2v-6.4H9.7V22H4.5c-.8 0-1.5-.7-1.5-1.5v-9.7z"
                                />
                                <path d="M1.5 10.5L12 1.8l10.5 8.7-1.3 1.6L12 4.4l-9.2 7.7-1.3-1.6z" />
                            </svg>
                        </div>
                        <h3 class="news-title">Property Investment Opportunities</h3>
                        <p class="news-description">
                            Investors are exploring new opportunities in residential and commercial real estate markets.
                        </p>
                        <a href="javascript:void(0);" class="read-more"> Read More </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="dashes_ara_main">
				   <div class="topbar">
                        <div class="greeting">
                            <h1>Good Evening, <span>Ramjee Meena</span> 👋</h1>
                            <p>Welcome back to your Tax Wallet</p>
                        </div>
                        <div class="top-actions">
                            <div class="st_ds_areaa">
                                <select class="fy" onchange="notify('Financial Year changed to '+this.value)">
                                    <option>FY 2026-27</option>
                                    <option>FY 2025-26</option>
                                    <option>FY 2024-25</option>
                                </select>
                                <button class="icon-btn" onclick="notify('You have 3 notifications')">
                                    <i class="fa fa-bell"></i><b class="bell-dot">3</b>
                                </button>
                                <div class="user">
                                    <div class="avatar">RM</div>
                                    Ramjee Meena <i class="fa fa-angle-down"></i>
                                </div>
                            </div>
                            <button type="button" class="mobile_menu_btn"><i class="fa fa-bars"></i></button>
                        </div>
                   </div>
				   <div class="cover_areea" >                    
                    <!===== Mobile View ======>
                    <div class="right-stack mb_v_show">
                        <div class="card tax-health">
                            <div class="health-row">
                                <h3>Tax Health</h3>
                                <span class="stars">★★★★<span style="color: #dfe3e8">★</span></span>
                                <span class="health-good">Good</span>
                            </div>
                            <div class="health-grid">
                                <div class="health-metric"><span>Return Type</span><strong>ITR-2</strong></div>
                                <div class="health-metric">
                                    <span>Tax Regime</span><strong class="good">New Regime</strong>
                                </div>
                                <div class="health-metric">
                                    <span>Estimated Refund</span><strong class="good">₹18,450</strong>
                                </div>
                                <div class="health-metric"><span>Last Saved</span><strong>Today, 07:45 PM</strong></div>
                            </div>
                        </div>
                    </div>
                    <!===== End Mobile View ======>
                    <div class="grid-top">
                        <div class="card progress-card">
                            <div class="progress-title">
                                <div><h2>Overall Progress</h2></div>
                                <div class="percent">62%</div>
                            </div>
                            <div class="bar"><span></span></div>
                            <div class="continue">
                                <span>Continue where you left off</span>
                                <button class="primary" onclick="notify('Opening next pending step...')">
                                    Continue Filing →
                                </button>
                            </div>
                        </div>
                        <div class="card profile-card">
                            <div class="profile-head">
                                <h3>
                                    <i class="fa fa-user-circle"></i> Personal Profile
                                    <a href="javascript:void(0);" class="you_vioss">
                                        <img src="{{ url('home/img/vvdio_ic.png')}}" alt="" />
                                    </a>
                                </h3>
                                <span class="complete">● Completed</span>
                            </div>
                            <div class="profile-row">
                                <div class="metric"><label>Updated</label><strong>12 Jul 2026</strong></div>
                                <div class="metric">
                                    <label>Profile Status</label><strong class="good">Complete</strong>
                                </div>
                            </div>
                            <div class="profile-date">Permanent taxpayer profile • <span class="profiless clickshowdata" data-target=".MyProfiles">View / Edit Profile →</span></div>
                        </div>
                        <div class="card quick">
                            <h3>Quick Actions</h3>
                            <div class="quick-grid">
                                <div class="quick-item blue" onclick="notify('Upload Document')">
                                    <i class="fa fa-arrow-up"></i>Upload<br />Document
                                </div>
                                <div class="quick-item green" onclick="notify('Download Computation')">
                                    <i class="fa fa-download"></i>Download<br />Computation
                                </div>
                                <div class="quick-item purple" onclick="notify('Start Tax Summary')">
                                    <i class="fa fa-calculator"></i>Start Tax<br />Summary
                                </div>
                                <div class="quick-item orange" onclick="notify('Opening Previous Year')">
                                    <i class="fa fa-folder-open"></i>View Last<br />Year
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="layout scrolls">
                        <div>
                            <div class="section card steps mt-0">
                                <div class="section-title">
                                    <h2>Filing Progress (9 Steps)</h2>
                                    <a href="#" onclick="notify('Showing all filing steps');return false;"
                                        >View Details →</a
                                    >
                                </div>
                                <div class="step-grid">
                                    <div class="step-card">
                                        <a href="javascript:void(0);" class="you_vioss">
                                            <img src="{{ url('home/img/vvdio_ic.png')}}" alt="" />
                                        </a>
                                        <div class="step-no">1</div>
                                        <div class="step-icon"><i class="fa fa-briefcase"></i></div>
                                        <h3 class="clickshowdata"data-target=".SalaryIncome">Salary Income</h3>
                                        <div class="step-status done">● Completed</div>
                                        <div class="step-status">Updated on 14 Jul 2026</div>
                                    </div>
                                    <div class="step-card">
                                        <a href="javascript:void(0);" class="you_vioss">
                                            <img src="{{ url('home/img/vvdio_ic.png')}}" alt="" />
                                        </a>
                                        <div class="step-no">2</div>
                                        <div class="step-icon"><i class="fa fa-home"></i></div>
                                        <h3 class="clickshowdata" data-target=".HouseProperty">House Property</h3>
                                        <div class="step-status done">● Completed</div>
                                        <div class="step-status">Updated on 15 Jul 2026</div>
                                    </div>
                                    <div class="step-card yellow">
                                        <a href="javascript:void(0);" class="you_vioss">
                                            <img src="{{ url('home/img/vvdio_ic.png')}}" alt="" />
                                        </a>
                                        <div class="step-no yellow">3</div>
                                        <div class="step-icon"><i class="fa fa-line-chart"></i></div>
                                        <h3>Capital Gains</h3>
                                        <div class="boths_booox">
                                            <div class="mini-progress"><span style="width: 45%"></span></div>
                                            <div class="mini-percent">45%</div>
                                        </div>
                                        <div class="step-status">Updated on 16 Jul 2026</div>
                                    </div>
                                    <div class="step-card gray">
                                        <a href="javascript:void(0);" class="you_vioss">
                                            <img src="{{ url('home/img/vvdio_ic.png')}}" alt="" />
                                        </a>
                                        <div class="step-no gray">4</div>
                                        <div class="step-icon"><i class="fa fa-building"></i></div>
                                        <h3>Business /<br />Professional Income</h3>
                                        <div class="step-status">◉ Not Started</div>
                                    </div>
                                    <div class="step-card">
                                        <a href="javascript:void(0);" class="you_vioss">
                                            <img src="{{ url('home/img/vvdio_ic.png')}}" alt="" />
                                        </a>
                                        <div class="step-no">5</div>
                                        <div class="step-icon"><i class="fa fa-dollar"></i></div>
                                        <h3>Other Sources</h3>
                                        <div class="step-status done">● Completed</div>
                                        <div class="step-status">Updated on 16 Jul 2026</div>
                                    </div>
                                    <div class="step-card yellow">
                                        <a href="javascript:void(0);" class="you_vioss">
                                            <img src="{{ url('home/img/vvdio_ic.png')}}" alt="" />
                                        </a>
                                        <div class="step-no yellow">6</div>
                                        <div class="step-icon"><i class="fa fa-bullseye"></i></div>
                                        <h3>Deductions &amp;<br />Tax Planning</h3>
                                        <div class="boths_booox">
                                            <div class="mini-progress"><span style="width: 30%"></span></div>
                                            <div class="mini-percent">30%</div>
                                        </div>
                                    </div>
                                    <div class="step-card yellow">
                                        <a href="javascript:void(0);" class="you_vioss">
                                            <img src="{{ url('home/img/vvdio_ic.png')}}" alt="" />
                                        </a>
                                        <div class="step-no yellow">7</div>
                                        <div class="step-icon"><i class="fa fa-bar-chart"></i></div>
                                        <h3>TDS/TCS &amp; Advance Taxes</h3>
                                        <div class="boths_booox">
                                            <div class="mini-progress"><span style="width: 60%"></span></div>
                                            <div class="mini-percent">60%</div>
                                        </div>
                                        <div class="step-status">Updated on 16 Jul 2026</div>
                                    </div>
                                    <div class="step-card gray">
                                        <a href="javascript:void(0);" class="you_vioss">
                                            <img src="{{ url('home/img/vvdio_ic.png')}}" alt="" />
                                        </a>
                                        <div class="step-no gray">8</div>
                                        <div class="step-icon"><i class="fa fa-calculator"></i></div>
                                        <h3>Review, Documents &amp;<br />ITR Mapping</h3>
                                        <div class="step-status">🔒 Locked</div>
                                    </div>
                                    <div class="step-card gray">
                                        <a href="javascript:void(0);" class="you_vioss">
                                            <img src="{{ url('home/img/vvdio_ic.png')}}" alt="" />
                                        </a>
                                        <div class="step-no gray">9</div>
                                        <div class="step-icon"><i class="fa fa-file"></i></div>
                                        <h3>Tax Summary &amp;<br />Computation</h3>
                                        <div class="step-status">🔒 Locked</div>
                                    </div>
                                </div>
                            </div>
                            <div class="section card steps">
                                <div class="section-title">
                                    <h2>
                                        Income &amp; Tax Summary
                                        <small style="font-size: 9px; color: #8a95a6">(Preview)</small>
                                    </h2>
                                    <a href="#" onclick="notify('Opening detailed tax summary');return false;"
                                        >View Details →</a
                                    >
                                </div>
                                <div class="summary">
                                    <div class="summary-card">
                                        <div class="sum-icon"><i class="fa fa-shopping-bag"></i></div>
                                        <div><label>Gross Total Income</label><strong>₹24.35 Lakh</strong></div>
                                    </div>
                                    <div class="summary-card sum-green">
                                        <div class="sum-icon"><i class="fa fa-tag"></i></div>
                                        <div><label>Total Deductions</label><strong>₹2.15 Lakh</strong></div>
                                    </div>
                                    <div class="summary-card sum-yellow">
                                        <div class="sum-icon"><i class="fa fa-calculator"></i></div>
                                        <div><label>Total Tax Payable</label><strong>₹42,520</strong></div>
                                    </div>
                                    <div class="summary-card sum-red">
                                        <div class="sum-icon"><i class="fa fa-rupee"></i></div>
                                        <div><label>Estimated Refund</label><strong class="good">₹18,450</strong></div>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="section card documents">
                                <div class="section-title">
                                    <h2 style="font-size: 13px">Documents Status</h2>
                                    <a href="#" onclick="notify('Opening document manager');return false;"
                                        >Manage Documents →</a
                                    >
                                </div>
                                <div class="doc-grid">
                                    <div class="doc">
                                        <h4>Form 16</h4>
                                        <p class="uploaded">● Uploaded</p>
                                    </div>
                                    <div class="doc">
                                        <h4>AIS (Annual Info.)</h4>
                                        <p class="uploaded">● Uploaded</p>
                                    </div>
                                    <div class="doc">
                                        <h4>Form 16A</h4>
                                        <p class="pending">◷ Pending</p>
                                    </div>
                                    <div class="doc">
                                        <h4>Bank Statements</h4>
                                        <p class="uploaded">● Uploaded</p>
                                    </div>
                                    <div class="doc">
                                        <h4>Home Loan Docs</h4>
                                        <p class="pending">◷ Pending</p>
                                    </div>
                                    <div class="doc">
                                        <h4>Capital Gain Proof</h4>
                                        <p class="uploaded">● Uploaded</p>
                                    </div>
                                </div>
                            </div>--->
                        </div>
                        <div class="right-stack">
                            <!====== Mobile View Hide ======>
                            <div class="card tax-health mb_v_hine">
                                <div class="health-row">
                                    <h3>Tax Health</h3>
                                    <span class="stars">★★★★<span style="color: #dfe3e8">★</span></span>
                                    <span class="health-good">Good</span>
                                </div>
                                <div class="health-grid">
                                    <div class="health-metric"><span>Return Type</span><strong>ITR-2</strong></div>
                                    <div class="health-metric">
                                        <span>Tax Regime</span><strong class="good">New Regime</strong>
                                    </div>
                                    <div class="health-metric">
                                        <span>Estimated Refund</span><strong class="good">₹18,450</strong>
                                    </div>
                                    <div class="health-metric">
                                        <span>Last Saved</span><strong>Today, 07:45 PM</strong>
                                    </div>
                                </div>
                            </div>
                            <!====== End Mobile View Hide ======>
                            <div class="card activity rececents">
                                <div class="section-title">
                                    <h3>Recent Activity</h3>
                                    <a href="#" onclick="notify('Showing all activity');return false;">View All</a>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon"><i class="fa fa-shopping-bag"></i></div>
                                    <div class="activity-text">
                                        <strong>Salary details updated</strong><span>Today, 07:45 PM</span>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon"><i class="fa fa-download"></i></div>
                                    <div class="activity-text">
                                        <strong>AIS document uploaded</strong><span>Today, 06:30 PM</span>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon"><i class="fa fa-line-chart"></i></div>
                                    <div class="activity-text">
                                        <strong>Capital gains entries added</strong><span>Yesterday, 10:15 PM</span>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon"><i class="fa fa-bullseye"></i></div>
                                    <div class="activity-text">
                                        <strong>Deductions updated</strong><span>Yesterday, 07:20 PM</span>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon"><i class="fa fa-file"></i></div>
                                    <div class="activity-text">
                                        <strong>Return created for FY 2026-27</strong><span>15 Jul 2026, 09:10 PM</span>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon"><i class="fa fa-line-chart"></i></div>
                                    <div class="activity-text">
                                        <strong>Capital gains entries added</strong><span>Yesterday, 10:15 PM</span>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon"><i class="fa fa-bullseye"></i></div>
                                    <div class="activity-text">
                                        <strong>Deductions updated</strong><span>Yesterday, 07:20 PM</span>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon"><i class="fa fa-line-chart"></i></div>
                                    <div class="activity-text">
                                        <strong>Capital gains entries added</strong><span>Yesterday, 10:15 PM</span>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon"><i class="fa fa-bullseye"></i></div>
                                    <div class="activity-text">
                                        <strong>Deductions updated</strong><span>Yesterday, 07:20 PM</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card years">
                                <div class="section-title">
                                    <h3>Previous Years</h3>
                                    <a href="#" onclick="notify('Opening all previous years');return false;"
                                        >View All</a
                                    >
                                </div>
								
								<div class="previous-years owl-carousel owl-theme">
									<!-- Card 1 -->
									<div class="news-card">
										<div class="year-card">
											<div class="year-top">
												<span>FY 2025-26 <small>(AY 2026-27)</small></span
												><span class="filed">Filed</span>
											</div>
											<div class="year-bottom">
												<span>Refund: <b class="good">₹14,520</b></span
												><a href="#">View / Download</a>
											</div>
										</div>
									</div>
									<!-- Card 2 -->
									<div class="news-card">
										<div class="year-card">
											<div class="year-top">
												<span>FY 2025-26 <small>(AY 2026-27)</small></span
												><span class="filed">Filed</span>
											</div>
											<div class="year-bottom">
												<span>Refund: <b class="good">₹14,520</b></span
												><a href="#">View / Download</a>
											</div>
										</div>
									</div>
									<!-- Card 3 -->
									<div class="news-card">
										<div class="year-card">
											<div class="year-top">
												<span>FY 2025-26 <small>(AY 2026-27)</small></span
												><span class="filed">Filed</span>
											</div>
											<div class="year-bottom">
												<span>Refund: <b class="good">₹14,520</b></span
												><a href="#">View / Download</a>
											</div>
										</div>
									</div>
									<!-- Card 4 -->
									<div class="news-card">
										<div class="year-card">
											<div class="year-top">
												<span>FY 2025-26 <small>(AY 2026-27)</small></span
												><span class="filed">Filed</span>
											</div>
											<div class="year-bottom">
												<span>Refund: <b class="good">₹14,520</b></span
												><a href="#">View / Download</a>
											</div>
										</div>
									</div>
								</div>
							</div>
                        </div>
                    </div>
                  </div>
				  
				  
				  <div class="new_show_div" style="display: none">
				    <!=======  House Property Continue ===========>
					  <div class="MyProfiles" style="display:none;">
						<div class="taxmate-wrapper">							
							<div class="over_contenttts">
							  <div class="step-flow">
								<div class="steps">
									<div class="flow-step completed" onclick="showMessage('You are already on Salary Income.')">
										<div class="flow-circle">01</div>
										<div class="flow-label">Salary<br />Income</div>
									</div>

									<div class="flow-step active" onclick="openStep(2)">
										<div class="flow-circle">02</div>
										<div class="flow-label">House<br />Property</div>
									</div>

									<div class="flow-step" onclick="openStep(3)">
										<div class="flow-circle">03</div>
										<div class="flow-label">Capital<br />Gains</div>
									</div>

									<div class="flow-step" onclick="openStep(4)">
										<div class="flow-circle">04</div>
										<div class="flow-label">Business /<br />Professional</div>
									</div>

									<div class="flow-step" onclick="openStep(5)">
										<div class="flow-circle">05</div>
										<div class="flow-label">Other<br />Sources</div>
									</div>

									<div class="flow-step" onclick="openStep(6)">
										<div class="flow-circle">06</div>
										<div class="flow-label">Deductions &<br />Tax Planning</div>
									</div>

									<div class="flow-step" onclick="openStep(7)">
										<div class="flow-circle">07</div>
										<div class="flow-label">TDS /<br />TCS</div>
									</div>

									<div class="flow-step" onclick="openStep(8)">
										<div class="flow-circle">08</div>
										<div class="flow-label">Review &<br />ITR</div>
									</div>

									<div class="flow-step" onclick="openStep(9)">
										<div class="flow-circle">09</div>
										<div class="flow-label">Tax<br />Summary</div>
									</div>
								</div>
							</div>

							  <div class="sub-tabs">
								<button class="sub-tab active" onclick="openTab(event,'BasicInformation')">A. Basic Information</button>
								<button class="sub-tab" onclick="openTab(event,'Address')">B. Address</button>
								<button class="sub-tab" onclick="openTab(event,'EmployerDetails')">C. Employer Details</button>
								<button class="sub-tab" onclick="openTab(event,'BankDetails')">D. Bank Details</button>
								<button class="sub-tab" onclick="openTab(event,'FamilyDetails')">E. Family Details</button>
								<button class="sub-tab" onclick="openTab(event,'AccountsAccess')">F. Accounts & Access</button>		
								<button class="sub-tab" onclick="openTab(event,'PropertyRegister')">G. Property Register</button>		
							  </div>

                              <div class="al_data_mngess">
								    <!-- ======================= SUB STEP 1 : Basic Information ======================= -->
									<div id="BasicInformation" class="tab-content active">
										<div class="card">
										  <div class="crd_under_datas">
											<div class="bothss">
											 <div class="content-header">
												<h2>Basic Information</h2>
												<p>Your primary identity and taxpayer information.</p>
											 </div>
											 <button class="action-button open-modal" data-modal="EditBasicInformation">
											  <i class="fa fa-pencil"></i> Edit Basic Information
											 </button>
											</div>
											

											<div class="table-wrap">
												<table class="info-table">
													<thead>
														<tr>
															<th>S.No</th>
															<th>Field</th>
															<th>Details</th>
														</tr>
													</thead>

													<tbody>
														<tr>
															<td>1</td>
															<td>Name</td>
															<td class="value-strong">Ramawtar Meena</td>
														</tr>

														<tr>
															<td>2</td>
															<td>Father Name</td>
															<td>Lt. Shri Khyali Ram Meena</td>
														</tr>

														<tr>
															<td>3</td>
															<td>Gender</td>
															<td>Male</td>
														</tr>

														<tr>
															<td>4</td>
															<td>PAN No.</td>
															<td class="masked">ANYPM••••J</td>
														</tr>

														<tr>
															<td>5</td>
															<td>Aadhaar No.</td>
															<td class="masked">XXXX-XXXX-8956</td>
														</tr>

														<tr>
															<td>6</td>
															<td>Date of Birth</td>
															<td>13-Dec-1982</td>
														</tr>

														<tr>
															<td>7</td>
															<td>Mobile No.</td>
															<td>+91 91829••••52</td>
														</tr>

														<tr>
															<td>8</td>
															<td>Email Id</td>
															<td>itr.ramjee@gmail.com</td>
														</tr>

														<tr>
															<td>9</td>
															<td>Residential Status</td>
															<td>
																<span class="badge badge-green">
																	<i class="fa-solid fa-circle-check"></i>
																	Resident Individual
																</span>
															</td>
														</tr>

														<tr>
															<td>10</td>
															<td>ITR Ward No.</td>
															<td>WARD-1, PANIPAT</td>
														</tr>
													</tbody>
												</table>
											</div>
										  </div>
										</div>
									</div>

									<!-- ======================= SUB STEP 2 : Address ======================= -->

									<div id="Address" class="tab-content">
										<div class="card">
										  <div class="crd_under_datas">
											<div class="bothss">
											 <div class="content-header">
												<h2>Address</h2>
												<p>Your residential and communication address.</p>
											 </div>
											 <button class="action-button open-modal" data-modal="EditAddressss">
											  <i class="fa fa-pencil"></i> Edit Address
											 </button>
											</div>
											
											
											
											<div class="table-wrap">
												<table class="info-table">
													<thead>
														<tr>
															<th>S.No</th>
															<th>Field</th>
															<th>Details</th>
														</tr>
													</thead>

													<tbody>
														<tr>
															<td>1</td>
															<td>House No</td>
															<td>D-1285</td>
														</tr>

														<tr>
															<td>2</td>
															<td>Street</td>
															<td>Khora Kheri, Mandir Road</td>
														</tr>

														<tr>
															<td>3</td>
															<td>Village</td>
															<td>Khedan</td>
														</tr>

														<tr>
															<td>4</td>
															<td>Post / Tehsil</td>
															<td>Bejupada</td>
														</tr>

														<tr>
															<td>5</td>
															<td>City</td>
															<td>Panipat</td>
														</tr>

														<tr>
															<td>6</td>
															<td>District</td>
															<td>Dausa</td>
														</tr>

														<tr>
															<td>7</td>
															<td>State</td>
															<td>Rajasthan</td>
														</tr>

														<tr>
															<td>8</td>
															<td>PIN</td>
															<td>303313</td>
														</tr>
													</tbody>
												</table>
											</div>											
										  </div>
										</div>
									</div>

									<!-- ======================= SUB STEP 3 : Employer Details ======================= -->

									<div id="EmployerDetails" class="tab-content">
										<div class="card">
										   <div class="crd_under_datas">
										    <div class="bothss">
											 <div class="content-header">
												<h2>Employer Details</h2>
												<p>Add all employers for this Financial Year. Multiple employers are supported.</p>
											 </div>
											 <button class="action-button open-modal" data-modal="employerModal">
											  <i class="fa fa-plus"></i> Add Employer
											 </button>
											</div>
											
											<div class="employer-list">
											  <div class="employer-card">
												<div class="employer-card-top">
													<div class="employer-number">01</div>

													<div class="employer-main">
														<div class="employer-title-row">
															<h3>Indian Oil Corporation Ltd</h3>
															<span class="employer-status current"> Current Employer </span>
														</div>

														<p class="employer-subtitle">
															<i class="fa fa-user"></i>
															Chief Manager

															<span>•</span>

															<i class="fa fa-map-marker"></i>
															Panipat, PNCP
														</p>
													</div>

													<div class="employer-actions">
														<button class="action-icon" onclick="editEmployer(this)">
															<i class="fa fa-pencil"></i>
														</button>

														<button class="action-icon" onclick="deleteEmployer(this)">
															<i class="fa fa-trash"></i>
														</button>
													</div>
												</div>

												<div class="employer-period">
													<div>
														<span>Employment Period</span>

														<strong> 01-Apr-2025 → Present </strong>
													</div>

													<div>
														<span>Employer Code</span>

														<strong> IOCLXYZ1256 </strong>
													</div>
												</div>

												<div class="employer-details">
													<div class="employer-detail">
														<span>Employer PAN</span>

														<strong> ANYPM••••K </strong>
													</div>

													<div class="employer-detail">
														<span>Employer TAN</span>

														<strong> DELI••••16B </strong>
													</div>

													<div class="employer-detail">
														<span>Form 16</span>

														<strong class="verified">
															<i class="fa fa-check-circle"></i>
															Uploaded
														</strong>
													</div>

													<div class="employer-detail">
														<span>TDS Deducted</span>
														<strong> ₹2,84,500 </strong>
													</div>
												</div>

												<div class="employer-footer">
													<span class="record-info">
														<i class="fa fa-check-circle"></i>
														Employer information completed
													</span>

													<button class="small-btn">
														<i class="fa fa-file"></i>
														Form 16
													</button>
												</div>
											  </div>

											  <div class="employer-card">
												<div class="employer-card-top">
													<div class="employer-number">02</div>
													<div class="employer-main">
														<div class="employer-title-row">
															<h3>ABC Private Limited</h3>
															<span class="employer-status previous"> Previous Employer </span>
														</div>

														<p class="employer-subtitle">
															<i class="fa fa-user"></i>
															Manager

															<span>•</span>

															<i class="fa fa-map-marker"></i>
															New Delhi
														</p>
													</div>

													<div class="employer-actions">
														<button class="action-icon" onclick="editEmployer(this)">
															<i class="fa fa-pencil"></i>
														</button>
														<button class="action-icon" onclick="deleteEmployer(this)">
															<i class="fa fa-trash"></i>
														</button>
													</div>
												</div>

												<div class="employer-period">
													<div>
														<span>Employment Period</span>
														<strong> 01-Apr-2025 → 30-Jun-2025 </strong>
													</div>

													<div>
														<span>Employer Code</span>
														<strong> ABCEMP1025 </strong>
													</div>
												</div>

												<div class="employer-details">
													<div class="employer-detail">
														<span>Employer PAN</span>
														<strong> XXXXX••••X </strong>
													</div>

													<div class="employer-detail">
														<span>Employer TAN</span>
														<strong> XXXXX••••X </strong>
													</div>

													<div class="employer-detail">
														<span>Form 16</span>
														<strong class="verified">
															<i class="fa fa-check-circle"></i>
															Uploaded
														</strong>
													</div>

													<div class="employer-detail">
														<span>TDS Deducted</span>
														<strong> ₹42,300 </strong>
													</div>
												</div>

												<div class="employer-footer">
													<span class="record-info">
														<i class="fa fa-check-circle"></i>
														Employer information completed
													</span>

													<button class="small-btn">
														<i class="fa fa-file"></i>
														Form 16
													</button>
												</div>
											  </div>
										    </div>											
										   </div>
										</div>
									</div>

									<!-- ======================= SUB STEP 4 : Bank Details ======================= -->

									<div id="BankDetails" class="tab-content">
										<div class="card">
											<div class="crd_under_datas">
											 <div class="bothss">
											  <div class="content-header">
												<h2>Bank Details</h2>
												<p>Maintain bank accounts for tax refunds and financial records.</p>
											  </div>
											  <button class="action-button open-modal" data-modal="AddBankAccount">
											   <i class="fa fa-plus"></i> Add Bank Account
											  </button>
											 </div>											 
											 
											 <div class="bank-scroll">
												<table class="bank-table">
													<thead>
														<tr>
															<th>S.No</th>
															<th>Bank Name</th>
															<th>Account Number</th>
															<th>IFSC Code</th>
															<th>Account Type</th>
															<th>Primary?</th>
															<th>Date Opened</th>
															<th>Closed?</th>
															<th>Date of Closing</th>
															<th>Refund Account?</th>
															<th>Action</th>
														</tr>
													</thead>

													<tbody id="bankTableBody">
														<tr>
															<td>1</td>

															<td>State Bank of India</td>

															<td>XXXX XXXX 4582</td>

															<td>SBIN0001234</td>

															<td>Savings</td>

															<td>
																<span class="badge badge-green">
																	<span class="primary-dot"></span>

																	Yes
																</span>
															</td>

															<td>15-Apr-2015</td>

															<td>No</td>

															<td>—</td>

															<td>
																<span class="badge badge-green"> Yes </span>
															</td>

															<td>
															   <div class="fixxed">
																<button class="action-icon" onclick="openBankEdit()" title="Edit Bank Account">
																	<i class="fa fa-pencil"></i>
																</button>

																<button class="action-icon" onclick="deleteBank(this)" title="Delete Bank Account">
																	<i class="fa fa-trash"></i>
																</button>
															   </div>	
															</td>
														</tr>
													</tbody>
												</table>
											 </div>											 
											</div>
										</div>
									</div>

									<!-- ======================= SUB STEP 5 : Family Details ======================= -->

									<div id="FamilyDetails" class="tab-content">
										<div class="card">
											<div class="crd_under_datas">
											 <div class="bothss">
											  <div class="content-header">
												<h2>Family Details</h2>
												<p>Maintain spouse, children, parents and other dependent information.</p>
											  </div>	
											  
											  <button class="action-button open-modal" data-modal="FamilyMember">
												<i class="fa fa-plus"></i>
												Add Family Member
											  </button>
											 </div>

                                             <div class="employer-list">
											  <div class="employer-card">
												<div class="employer-card-top">
													<div class="employer-number"><i class="fa fa-user"></i></div>

													<div class="employer-main">
														<div class="employer-title-row">
															<h3>Dr. Anju Meena</h3>
														</div>
														<p class="employer-subtitle">
															Spouse
														</p>
													</div>

													<div class="employer-actions">
														<button class="action-icon" onclick="editEmployer(this)">
															<i class="fa fa-pencil"></i>
														</button>

														<button class="action-icon" onclick="deleteEmployer(this)">
															<i class="fa fa-trash"></i>
														</button>
													</div>
												</div>

												<div class="employer-details">
													<div class="employer-detail">
														<span>Relationship</span>
														<strong> Spouse </strong>
													</div>

													<div class="employer-detail">
														<span>PAN</span>
														<strong> IOCLXYZ1256 </strong>
													</div>

													<div class="employer-detail">
														<span>Aadhaar</span>
														<strong>XXXX-XXXX-8956</strong>
													</div>

													<div class="employer-detail">
														<span>Tax Dependent</span>
														<strong> Yes </strong>
													</div>
												</div>												
											  </div>
											 
											  <div class="employer-card">
												<div class="employer-card-top">
													<div class="employer-number"><i class="fa fa-female"></i></div>
													<div class="employer-main">
														<div class="employer-title-row">
															<h3>Child Name</h3>
														</div>
														<p class="employer-subtitle">
															Son / Daughter
														</p>
													</div>

													<div class="employer-actions">
														<button class="action-icon" onclick="editEmployer(this)">
															<i class="fa fa-pencil"></i>
														</button>

														<button class="action-icon" onclick="deleteEmployer(this)">
															<i class="fa fa-trash"></i>
														</button>
													</div>
												</div>

												<div class="employer-details">
													<div class="employer-detail">
														<span>Relationship</span>
														<strong> Son / Daughter </strong>
													</div>

													<div class="employer-detail">
														<span>PAN</span>
														<strong> Not Available </strong>
													</div>

													<div class="employer-detail">
														<span>Aadhaar</span>
														<strong>XXXX-XXXX-XXXX</strong>
													</div>

													<div class="employer-detail">
														<span>Tax Dependent</span>
														<strong> Yes </strong>
													</div>
												</div>												
											  </div>											 
											 </div>											 
											</div>                            
										</div>
									</div>

									<!-- =======================  SUB STEP 6 : Accounts Access  ======================= -->

									<div id="AccountsAccess" class="tab-content">
										<div class="card">
											<div class="crd_under_datas">
											 <div class="bothss">
											  <div class="content-header">
												<h2>Important Accounts & Access</h2>
												<p>Maintain important tax, investment and financial account connections.</p>
											  </div>	
											  
											  <button class="action-button open-modal" data-modal="AddImportantAccount">
												<i class="fa fa-plus"></i>
												Add Account
											  </button>
											 </div>
											 
											 
											 <div class="security-note">
												<i class="fa fa-shield"></i>
												<div>
													<strong> Security & Privacy </strong>
													<p>
														Never store plain-text passwords in ordinary profile fields. Use secure connections, encrypted credential
														storage or authorised integrations wherever available.
													</p>
												</div>
											</div>

											<div class="account-section">
												<div class="account-category-title">
													<i class="fa fa-university"></i>

													Tax & Government
												</div>

												<div class="account-card">
													<div class="account-icon">
														<i class="fa fa-file-text"></i>
													</div>

													<div class="account-main">
														<h3>Income Tax e-Filing</h3>

														<p>Tax return, notices, AIS/TIS and taxpayer services</p>
													</div>

													<div class="account-meta">
														<span>Last Verified</span>

														<strong> 13-Aug-2026 </strong>
													</div>

													<span class="badge badge-green"> ● Connected </span>

													<button class="connect-btn">Manage</button>
												</div>

												<div class="account-card">
													<div class="account-icon">
														<i class="fa fa-microchip"></i>
													</div>

													<div class="account-main">
														<h3>TRACES</h3>

														<p>TDS, Form 16 and tax credit related information</p>
													</div>

													<div class="account-meta">
														<span>Last Verified</span>

														<strong> 13-Aug-2026 </strong>
													</div>

													<span class="badge badge-green"> ● Connected </span>

													<button class="connect-btn">Manage</button>
												</div>

												<div class="account-card">
													<div class="account-icon">
														<i class="fa fa-percent"></i>
													</div>

													<div class="account-main">
														<h3>GST Portal</h3>

														<p>GST registration, returns and business tax information</p>
													</div>

													<div class="account-meta">
														<span>GSTIN</span>

														<strong> •••••••••• </strong>
													</div>

													<span class="badge badge-yellow"> Needs Review </span>

													<button class="connect-btn">Connect</button>
												</div>

												<div class="account-category-title">
													<i class="fa fa-line-chart"></i>

													Investment Accounts
												</div>

												<div class="account-card">
													<div class="account-icon">
														<i class="fa fa-bar-chart"></i>														
													</div>

													<div class="account-main">
														<h3>Zerodha</h3>

														<p>Demat / Trading Account — Capital Gains</p>
													</div>

													<div class="account-meta">
														<span>Tax Use</span>

														<strong> Capital Gains </strong>
													</div>

													<span class="badge badge-green"> ● Added </span>

													<button class="connect-btn">Manage</button>
												</div>

												<div class="account-card">
													<div class="account-icon">
														<i class="fa fa-line-chart"></i>
													</div>

													<div class="account-main">
														<h3>Angel One</h3>

														<p>Demat / Trading Account — Capital Gains</p>
													</div>

													<div class="account-meta">
														<span>Tax Use</span>

														<strong> Capital Gains </strong>
													</div>

													<span class="badge badge-green"> ● Added </span>

													<button class="connect-btn">Manage</button>
												</div>

												<div class="account-category-title">
													<i class="fa fa-tasks"></i>

													Other Financial Accounts
												</div>

												<div class="account-card">
													<div class="account-icon">
														<i class="fa fa-database"></i>
													</div>

													<div class="account-main">
														<h3>Mutual Fund / Investment Platform</h3>

														<p>Mutual funds, investments and capital gains</p>
													</div>

													<div class="account-meta">
														<span>Tax Use</span>

														<strong> Capital Gains </strong>
													</div>

													<span class="badge badge-gray"> Not Added </span>

													<button class="connect-btn">Add</button>
												</div>
											</div>

											 
											</div>
										</div>
									</div>

                                    <!-- =======================  SUB STEP 7 : Property Register  ======================= -->

									<div id="PropertyRegister" class="tab-content">
										<div class="card">
											<div class="crd_under_datas">
											 <div class="bothss">
											  <div class="content-header">
												<h2>Property Register</h2>
												<p>Maintain your permanent property master records and use them across different Financial Years.</p>
											  </div>	
											  
											  <button class="action-button open-modal" data-modal="AddProperty">
												<i class="fa fa-plus"></i>
												Add Property
											  </button>
											 </div>
											 
											 
											 <div class="security-note">
												<i class="fa fa-shield"></i>
												<div>
													<strong> Your Permanent Property Master </strong>
													<p>Properties are maintained here as permanent master records. During ITR filing, TaxMate will allow you to select the relevant property for the Financial Year instead of creating it again.
													</p>
												</div>
											 </div>

											 <div class="account-section">
												<div class="stats">
												  <div class="stat"><div class="sl">Total Properties</div><div class="sv" id="total">3</div></div>
												  <div class="stat"><div class="sl">Self Occupied</div><div class="sv" id="self">1</div></div>
												  <div class="stat"><div class="sl">Let Out</div><div class="sv" id="let">1</div></div>
												  <div class="stat"><div class="sl">Other / Vacant</div><div class="sv" id="other">1</div></div>
												 </div>
											 </div>
											 
											 <div class="cardboooxs">
												<div class="chead">
												  <h2>Property Register</h2>
												  <p>One permanent record per property. Reusable for future ITR years.</p>
												</div>
												<div class="wrap">
													<table>
														<thead>
															<tr>
																<th>S. No.</th>
																<th>Property ID</th>
																<th>Property Name</th>
																<th>Address / City</th>
																<th>Type</th>
																<th>Ownership</th>
																<th>Current Status</th>
																<th>Permanent Document</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody id="rows">
															<tr data-type="self">
																<td>1</td>
																<td class="pid">P001</td>
																<td><b>Flat-1</b></td>
																<td>Noida</td>
																<td>Residential</td>
																<td>100%</td>
																<td><span class="badge g">● Self Occupied</span></td>
																<td>
																	<span class="doc">✓ Available</span>
																	<button class="view" onclick="viewDoc('P001')">View</button>
																</td>
																<td>
																	<div class="actions">
																		<button class="icon" onclick="edit('P001')">✎</button
																		><button class="icon" onclick="del(this)">⌫</button>
																	</div>
																</td>
															</tr>
															<tr data-type="let">
																<td>2</td>
																<td class="pid">P002</td>
																<td><b>Flat-2</b></td>
																<td>Gurugram</td>
																<td>Residential</td>
																<td>50%</td>
																<td><span class="badge blue">● Let Out</span></td>
																<td>
																	<span class="doc">✓ Available</span>
																	<button class="view" onclick="viewDoc('P002')">View</button>
																</td>
																<td>
																	<div class="actions">
																		<button class="icon" onclick="edit('P002')">✎</button
																		><button class="icon" onclick="del(this)">⌫</button>
																	</div>
																</td>
															</tr>
															<tr data-type="other">
																<td>3</td>
																<td class="pid">P003</td>
																<td><b>Plot</b></td>
																<td>Jaipur</td>
																<td>Land</td>
																<td>100%</td>
																<td><span class="badge yellow">● Vacant Land</span></td>
																<td>
																	<span class="doc">✓ Available</span>
																	<button class="view" onclick="viewDoc('P003')">View</button>
																</td>
																<td>
																	<div class="actions">
																		<button class="icon" onclick="edit('P003')">✎</button
																		><button class="icon" onclick="del(this)">⌫</button>
																	</div>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
												
												
												<div class="security-note notflexx">
													<div><span class="ic">💡</span> <strong>Permanent vs FY-specific:</strong></div>
													<p>Property details stay here. Rent, rent receipts, municipal taxes,
													vacancy, loan interest and other FY-specific information will be maintained inside Step 2 for that Financial
													Year.
													</p>
											    </div>
												
											 </div>											 
											</div>
										</div>
									</div>

								</div>
							
						    </div>
							
							<!-- ======================= BOTTOM ACTIONS ======================= -->
							<div class="bottom-actions">
								<div class="left-actions">
									<button class="action-btn clickshowdata"data-target=".cover_areea">← Previous Step</button>
								</div>

								<div class="right-actions">
									<button class="action-btn">Save Progress</button>

									<button class="action-btn">Save & Exit</button>

									<button class="action-btn primary-btn">Complete Step 2 ✓</button>
								</div>
							</div>
						</div>
					  </div>
					<!=======  End House Property Continue ===========> 

				  
				    <!=======  Salary Income ===========>
					  <div class="SalaryIncome" style="display:none;">
						<div class="taxmate-wrapper">
							
							<div class="over_contenttts">
							 <div class="step-flow">
								<div class="steps">
									<div class="flow-step active" onclick="showMessage('You are already on Salary Income.')">
										<div class="flow-circle">01</div>
										<div class="flow-label">Salary<br />Income</div>
									</div>

									<div class="flow-step" onclick="openStep(2)">
										<div class="flow-circle">02</div>
										<div class="flow-label">House<br />Property</div>
									</div>

									<div class="flow-step" onclick="openStep(3)">
										<div class="flow-circle">03</div>
										<div class="flow-label">Capital<br />Gains</div>
									</div>

									<div class="flow-step" onclick="openStep(4)">
										<div class="flow-circle">04</div>
										<div class="flow-label">Business /<br />Professional</div>
									</div>

									<div class="flow-step" onclick="openStep(5)">
										<div class="flow-circle">05</div>
										<div class="flow-label">Other<br />Sources</div>
									</div>

									<div class="flow-step" onclick="openStep(6)">
										<div class="flow-circle">06</div>
										<div class="flow-label">Deductions &<br />Tax Planning</div>
									</div>

									<div class="flow-step" onclick="openStep(7)">
										<div class="flow-circle">07</div>
										<div class="flow-label">TDS /<br />TCS</div>
									</div>

									<div class="flow-step" onclick="openStep(8)">
										<div class="flow-circle">08</div>
										<div class="flow-label">Review &<br />ITR</div>
									</div>

									<div class="flow-step" onclick="openStep(9)">
										<div class="flow-circle">09</div>
										<div class="flow-label">Tax<br />Summary</div>
									</div>
								</div>
							 </div>

							 <div class="step-header">
								<div class="step-title-area">
									<div class="step-number">01</div>

									<div class="step-title">
										<h1>Salary Income</h1>
										<p>Add and verify your salary income details from Form 16, AIS and other documents.</p>
									</div>
								</div>

								<div class="header-actions">
								   <div class="data_sh_no">
									<button class="help-btn">ⓘ Need Help?</button>
									<button class="video-help" onclick="openVideoHelp()" title="Watch Video Help">▶</button>
								   </div>	

								   <div class="data_sh_no1">	
									<div class="progress-area">
										<div class="progress-label">
											<span>Step Progress</span>
											<strong>100%</strong>
										</div>
										<div class="progress-bar">
											<div class="progress-fill"></div>
										</div>
									</div>

									<button class="dashboard-btn" onclick="goDashboard()">Go to Dashboard →</button>
								   </div>	
								</div>
							</div>
							
							 
							 <div class="sub-tabs">
								<button class="sub-tab active" onclick="openTab(event,'incomeDetails')">Income Details</button>
								<button class="sub-tab" onclick="openTab(event,'exemptions')">Exemptions</button>
								<button class="sub-tab" onclick="openTab(event,'allowances')">Allowances</button>
								<button class="sub-tab" onclick="openTab(event,'form16')">Form 16 & AIS Summary</button>
								<button class="sub-tab" onclick="openTab(event,'crossVerification')">Cross Verification</button>
								<button class="sub-tab" onclick="openTab(event,'taxComputation')">Tax Computation</button>
							 </div>


							 <div class="content-layout">
								<div class="main-content">
								    <!-- ======================= SUB STEP 1 : INCOME DETAILS ======================= -->
									<div id="incomeDetails" class="tab-content active">
										<div class="card">
											<div class="card-header">
												<div>
													<h2>Employer Details</h2>
													<p>Employer information is automatically taken from Personal Profile.</p>
												</div>

												<div>
													<button class="edit-btn">✎ Edit Employer</button>
													<button class="add-btn">＋ Add Employer</button>
												</div>
											</div>

											<div class="card-body">
												<div class="employer-box">
													<div class="employer-top">
														<div>
															<span class="employer-name"> Indian Oil Corporation Limited </span>

															<span class="badge"> Current Employer </span>

															<div style="font-size: 9px; color: #7d8b9b; margin-top: 4px">
																Chief Manager • Panipat, PNCP
															</div>
														</div>
													</div>

													<div class="employer-grid">
														<div class="info-cell">
															<div class="info-label">Employment Period</div>
															<div class="info-value">01-Apr-2025 → Present</div>
														</div>

														<div class="info-cell">
															<div class="info-label">Employee Code</div>
															<div class="info-value">IOCLXYZ1226</div>
														</div>

														<div class="info-cell">
															<div class="info-label">Employer PAN / TAN</div>
															<div class="info-value">XXXXXXXX</div>
														</div>

														<div class="info-cell">
															<div class="info-label">Form 16</div>
															<div class="info-value" style="color: #09945c">● Uploaded</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<!-- SALARY COMPOSITION -->
										<div class="card">
											<div class="card-header">
												<div>
													<h2>Salary Income Composition</h2>
													<p>Salary components captured from Form 16, Salary Slips, AIS and other sources.</p>
												</div>

												<button class="add-btn">＋ Add Salary Component</button>
											</div>

											<div class="card-body">
												<table class="data-table">
													<thead>
														<tr>
															<th>S.No.</th>
															<th>Salary Component</th>
															<th>Source</th>
															<th class="amount">Amount (₹)</th>
														</tr>
													</thead>

													<tbody>
														<tr>
															<td>1</td>
															<td>Basic Pay</td>
															<td>Form 16 Part B</td>
															<td class="amount">15,80,041.68</td>
														</tr>

														<tr>
															<td>2</td>
															<td>Dearness Allowance / Variable DA</td>
															<td>Form 16 Part B</td>
															<td class="amount">8,01,776.23</td>
														</tr>

														<tr>
															<td>3</td>
															<td>Bonus / Performance Pay</td>
															<td>Form 16</td>
															<td class="amount">3,61,491.00</td>
														</tr>

														<tr>
															<td>4</td>
															<td>Leave Encashment</td>
															<td>Form 16</td>
															<td class="amount">2,38,296.12</td>
														</tr>

														<tr>
															<td>5</td>
															<td>Other Allowances</td>
															<td>Form 16</td>
															<td class="amount">2,95,754.21</td>
														</tr>

														<tr>
															<td>6</td>
															<td>Other Reimbursement</td>
															<td>Salary Records</td>
															<td class="amount">68,076.40</td>
														</tr>

														<tr>
															<td>7</td>
															<td>Arrears from Previous Year(s)</td>
															<td>Form 16</td>
															<td class="amount">-4,450.80</td>
														</tr>

														<tr>
															<td>8</td>
															<td>Employer NPS Contribution</td>
															<td>Form 16 / NPS</td>
															<td class="amount">2,02,454.00</td>
														</tr>

														<tr>
															<td>9</td>
															<td>Cafeteria Allowance</td>
															<td>Salary Records</td>
															<td class="amount">1,02,843.90</td>
														</tr>

														<tr class="total-row">
															<td colspan="3">Gross Emoluments</td>
															<td class="amount">₹39,94,981.89</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>

										<!-- PERQUISITES -->
										<div class="card">
											<div class="card-header">
												<div>
													<h2>Perquisites</h2>
													<p>Perquisites reported in Form 12BA / employer records.</p>
												</div>

												<button class="add-btn">＋ Add Perquisite</button>
											</div>

											<div class="card-body">
												<table class="data-table">
													<thead>
														<tr>
															<th>S.No.</th>
															<th>Perquisite</th>
															<th>Source</th>
															<th class="amount">Amount (₹)</th>
														</tr>
													</thead>

													<tbody>
														<tr>
															<td>1</td>
															<td>Accommodation</td>
															<td>Form 12BA</td>
															<td class="amount">1,58,948.73</td>
														</tr>

														<tr>
															<td>2</td>
															<td>Cars / Other Automotive</td>
															<td>Form 12BA</td>
															<td class="amount">1,781.57</td>
														</tr>

														<tr>
															<td>3</td>
															<td>Gas / Electricity / Water</td>
															<td>Form 12BA</td>
															<td class="amount">20,726.00</td>
														</tr>

														<tr>
															<td>4</td>
															<td>Interest Free / Concessional Loans</td>
															<td>Form 12BA</td>
															<td class="amount">1,32,250.73</td>
														</tr>

														<tr>
															<td>5</td>
															<td>Use of Movable Assets by Employees</td>
															<td>Form 12BA</td>
															<td class="amount">35,000.04</td>
														</tr>

														<tr class="total-row">
															<td colspan="3">Total Perquisites</td>
															<td class="amount">₹3,48,707.07</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>

									<!-- ======================= SUB STEP 2 : EXEMPTIONS ======================= -->

									<div id="exemptions" class="tab-content">
										<div class="card">
											<div class="card-header">
												<div>
													<h2>Salary Exemptions</h2>
													<p>Review exemptions applicable to salary income.</p>
												</div>
												<button class="add-btn">＋ Add Exemption</button>
											</div>

											<div class="card-body">
												<table class="data-table">
													<thead>
														<tr>
															<th>S.No.</th>
															<th>Exemption</th>
															<th>Source</th>
															<th class="amount">Amount (₹)</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>1</td>
															<td>House Rent Allowance (HRA)</td>
															<td>Form 16 / Salary Records</td>
															<td class="amount">0.00</td>
														</tr>

														<tr>
															<td>2</td>
															<td>Leave Travel Allowance (LTA)</td>
															<td>Form 16</td>
															<td class="amount">0.00</td>
														</tr>

														<tr>
															<td>3</td>
															<td>Leave Encashment</td>
															<td>Form 16</td>
															<td class="amount">0.00</td>
														</tr>

														<tr class="total-row">
															<td colspan="3">Total Exemptions</td>
															<td class="amount">₹0.00</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>

									<!-- ======================= SUB STEP 3 : ALLOWANCES ======================= -->

									<div id="allowances" class="tab-content">
										<div class="card">
											<div class="card-header">
												<div>
													<h2>Allowances & Salary Benefits</h2>
													<p>Review taxable and potentially exempt salary allowances.</p>
												</div>
												<button class="add-btn">＋ Add Allowance</button>
											</div>
											<div class="card-body">
												<table class="data-table">
													<thead>
														<tr>
															<th>S.No.</th>
															<th>Allowance</th>
															<th>Tax Treatment</th>
															<th class="amount">Amount (₹)</th>
														</tr>
													</thead>

													<tbody>
														<tr>
															<td>1</td>
															<td>Basic Pay</td>
															<td>Taxable</td>
															<td class="amount">15,80,041.68</td>
														</tr>

														<tr>
															<td>2</td>
															<td>Dearness Allowance</td>
															<td>Taxable</td>
															<td class="amount">8,01,776.23</td>
														</tr>

														<tr>
															<td>3</td>
															<td>Bonus / Performance Pay</td>
															<td>Taxable</td>
															<td class="amount">3,61,491.00</td>
														</tr>

														<tr>
															<td>4</td>
															<td>Other Allowances</td>
															<td>Review Required</td>
															<td class="amount">2,95,754.21</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>

									<!-- ======================= SUB STEP 4 : FORM 16 & AIS ======================= -->

									<div id="form16" class="tab-content">
										<div class="card">
											<div class="card-header">
												<div>
													<h2>Form 16 & AIS Salary Summary</h2>
													<p>Compare salary information received from different sources.</p>
												</div>
											</div>

											<div class="card-body">
												<table class="data-table">
													<thead>
														<tr>
															<th>Particular</th>
															<th class="amount">Form 16</th>
															<th class="amount">AIS</th>
															<th class="amount">Salary Records</th>
														</tr>
													</thead>

													<tbody>
														<tr>
															<td>Gross Salary</td>
															<td class="amount">₹15,80,042</td>
															<td class="amount">₹15,80,042</td>
															<td class="amount">₹15,80,042</td>
														</tr>

														<tr>
															<td>TDS on Salary</td>
															<td class="amount">₹2,84,500</td>
															<td class="amount">₹2,84,500</td>
															<td class="amount">₹2,84,500</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>

									<!-- ======================= SUB STEP 5 : CROSS VERIFICATION ======================= -->

									<div id="crossVerification" class="tab-content">
										<div class="card">
											<div class="card-header">
												<div>
													<h2>Cross Verification</h2>
													<p>
														Verify salary figures across Form 16, salary computation, AIS and other available
														sources.
													</p>
												</div>
												<span class="badge">✓ Verified</span>
											</div>

											<div class="card-body">
												<table class="data-table verify-table">
													<thead>
														<tr>
															<th>Particular</th>
															<th>Form 16</th>
															<th>Salary Computation</th>
															<th>AIS</th>
															<th>Other Source</th>
															<th>Difference</th>
															<th>Status</th>
														</tr>
													</thead>

													<tbody>
														<tr>
															<td>Gross Salary</td>

															<td>₹15,80,042</td>

															<td>₹15,80,042</td>

															<td>₹15,80,042</td>

															<td>₹15,80,042</td>

															<td class="difference-zero">₹0</td>

															<td class="match">✓ Match</td>
														</tr>

														<tr>
															<td>TDS</td>

															<td>₹2,84,500</td>

															<td>₹2,84,500</td>

															<td>₹2,84,500</td>

															<td>₹2,84,500</td>

															<td class="difference-zero">₹0</td>

															<td class="match">✓ Match</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>

									<!-- =======================  SUB STEP 6 : TAX COMPUTATION  ======================= -->

									<div id="taxComputation" class="tab-content">
										<div class="card">
											<div class="card-header">
												<div>
													<h2>Salary Tax Computation</h2>
													<p>Final salary income computation before moving to the next filing step.</p>
												</div>
											</div>

											<div class="card-body">
												<table class="data-table">
													<tbody>
														<tr>
															<td>Gross Salary</td>
															<td class="amount">₹15,80,042</td>
														</tr>

														<tr>
															<td>Less: Standard Deduction</td>
															<td class="amount">₹75,000</td>
														</tr>

														<tr class="total-row">
															<td>Income Chargeable Under Salary</td>
															<td class="amount">₹15,05,042</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>

								<!-- =======================  RIGHT SIDEBAR  ======================= -->

								<div class="side-content">
									<div class="card status-card">
										<div class="card-header">
											<h2>Verification Status</h2>
										</div>

										<div class="card-body">
											<div class="status-icon">✓</div>
											<div class="status-title">Salary Verified</div>

											<div class="status-text">Available salary sources are matching.</div>
										</div>
									</div>

									<!-- QUICK SUMMARY -->

									<div class="card">
										<div class="card-header">
											<h2>Quick Summary</h2>
										</div>
										<div class="card-body">
											<div class="summary-row">
												<span>Gross Salary</span>
												<strong>₹15,80,042</strong>
											</div>
											<div class="summary-row">
												<span>Exemptions</span>
												<strong>₹0</strong>
											</div>
											<div class="summary-row">
												<span>Salary Deduction</span>
												<strong>₹75,000</strong>
											</div>
											<div class="summary-row">
												<span>Taxable Salary</span>
												<strong>₹15,05,042</strong>
											</div>
											<div class="estimated">
												<span>Estimated Tax</span>
												<span>₹1,12,450</span>
											</div>
										</div>
									</div>

									<!-- DOCUMENTS -->

									<div class="card">
										<div class="card-header">
											<h2>Documents</h2>
										</div>
										<div class="card-body">
											<div class="doc-row">
												<span>Form 16</span>
												<span class="uploaded">Uploaded</span>
											</div>
											<div class="doc-row">
												<span>Form 12BA</span>
												<span class="uploaded">Uploaded</span>
											</div>
											<div class="doc-row">
												<span>AIS Salary Section</span>
												<span class="uploaded">Uploaded</span>
											</div>
											<div class="doc-row">
												<span>Salary Slip</span>
												<span class="pending">Optional</span>
											</div>
										</div>
									</div>
								</div>
							 </div>
							
						    </div>
							
							
							<!-- ======================= BOTTOM ACTIONS ======================= -->
							<div class="bottom-actions">
								<div class="left-actions">
									<button class="action-btn clickshowdata"data-target=".cover_areea">← Previous Step</button>
								</div>

								<div class="right-actions">
									<button class="action-btn">Save Progress</button>

									<button class="action-btn">Save & Exit</button>

									<button class="action-btn success-btn">✓ Step Completed</button>

									<button class="action-btn primary-btn clickshowdata" data-target=".HouseProperty">Continue to Step 2 →</button>
								</div>
							</div>
						</div>
					  </div>
					<!=======  End Salary Income ===========>  
					
					<!=======  House Property ===========>
				      <div class="HouseProperty" style="display: none">
					    <div class="taxmate-wrapper">
						  <div class="over_contenttts">
							<div class="step-flow">
								<div class="steps">
									<div class="flow-step completed" onclick="showMessage('You are already on Salary Income.')">
										<div class="flow-circle">01</div>
										<div class="flow-label">Salary<br />Income</div>
									</div>

									<div class="flow-step active" onclick="openStep(2)">
										<div class="flow-circle">02</div>
										<div class="flow-label">House<br />Property</div>
									</div>

									<div class="flow-step" onclick="openStep(3)">
										<div class="flow-circle">03</div>
										<div class="flow-label">Capital<br />Gains</div>
									</div>

									<div class="flow-step" onclick="openStep(4)">
										<div class="flow-circle">04</div>
										<div class="flow-label">Business /<br />Professional</div>
									</div>

									<div class="flow-step" onclick="openStep(5)">
										<div class="flow-circle">05</div>
										<div class="flow-label">Other<br />Sources</div>
									</div>

									<div class="flow-step" onclick="openStep(6)">
										<div class="flow-circle">06</div>
										<div class="flow-label">Deductions &<br />Tax Planning</div>
									</div>

									<div class="flow-step" onclick="openStep(7)">
										<div class="flow-circle">07</div>
										<div class="flow-label">TDS /<br />TCS</div>
									</div>

									<div class="flow-step" onclick="openStep(8)">
										<div class="flow-circle">08</div>
										<div class="flow-label">Review &<br />ITR</div>
									</div>

									<div class="flow-step" onclick="openStep(9)">
										<div class="flow-circle">09</div>
										<div class="flow-label">Tax<br />Summary</div>
									</div>
								</div>
							</div>
							
							<div class="step-header">
								<div class="step-title-area">
									<div class="step-number">02</div>

									<div class="step-title">
										<h1>Step 2 Overview</h1>
										<p>Complete the seven sub-steps in any order. You can save your work and return later.</p>
									</div>
								</div>

								<div class="header-actions">
								   <div class="data_sh_no">
									<button class="help-btn">ⓘ Need Help?</button>
									<button class="video-help" onclick="openVideoHelp()" title="Watch Video Help">▶</button>
								   </div>	

								   <div class="data_sh_no1">	
									<div class="progress-area">
										<div class="progress-label">
											<span>Step Progress</span>
											<strong>22%</strong>
										</div>
										<div class="progress-bar">
											<div class="progress-fill" style="width:22%; background:#0ca564;"></div>
										</div>
									</div>

									<button class="dashboard-btn" onclick="goDashboard()">Go to Dashboard →</button>
								   </div>	
								</div>
							</div>
							
							
							<div class="al_data_mnges">				

							<!-- QUICK SUMMARY -->
							<div class="summary-grid">
								<div class="metric">
									<div class="label">Properties Selected</div>
									<div class="value">3</div>
								</div>
								<div class="metric">
									<div class="label">Self-Occupied</div>
									<div class="value">1</div>
								</div>
								<div class="metric">
									<div class="label">Let-Out</div>
									<div class="value">1</div>
								</div>
								<div class="metric">
									<div class="label">Vacant / Other</div>
									<div class="value">1</div>
								</div>
								<div class="metric green">
									<div class="label">Current House Property Income</div>
									<div class="value">₹0</div>
								</div>
							</div>

							<!-- SUBSTEP CARDS -->
							<section class="section-head">
								<div>
									<h2>House Property Filing Journey</h2>
									<p>Open any sub-step directly. Completion of one sub-step does not lock the others.</p>
								</div>
							</section>

							<section class="card-grid">
								<article class="sub-card complete">
									<div class="card-top">
										<div class="badge-no">01</div>
										<span class="status">✓ Completed</span>
									</div>
									<div class="card-icon">⌂</div>
									<div class="card-title">Property Selection</div>
									<div class="card-desc">
										Select the properties applicable to this financial year from your permanent Property Register.
									</div>
									<div class="card-bottom">
										<div class="mini-progress">
											<div class="bar"><span style="width: 100%"></span></div>
											<small>100% complete</small>
										</div>
										<button class="open" onclick="openSubstep(1)">View →</button>
									</div>
								</article>

								<article class="sub-card progress">
									<div class="card-top">
										<div class="badge-no">02</div>
										<span class="status">● In Progress</span>
									</div>
									<div class="card-icon">₹</div>
									<div class="card-title">Rental Income</div>
									<div class="card-desc">
										Enter realised rent, months rented, vacancy and unrealised rent for each applicable property.
									</div>
									<div class="card-bottom">
										<div class="mini-progress">
											<div class="bar"><span style="width: 70%; background:#e7a900;"></span></div>
											<small>70% complete</small>
										</div>
										<button class="open primary" onclick="openSubstep(2)">Continue →</button>
									</div>
								</article>

								<article class="sub-card pending">
									<div class="card-top">
										<div class="badge-no">03</div>
										<span class="status">Not Started</span>
									</div>
									<div class="card-icon">▣</div>
									<div class="card-title">Municipal Taxes</div>
									<div class="card-desc">
										Record municipal and property taxes actually paid during the financial year with supporting proof.
									</div>
									<div class="card-bottom">
										<div class="mini-progress">
											<div class="bar"><span style="width: 0%"></span></div>
											<small>0% complete</small>
										</div>
										<button class="open" onclick="openSubstep(3)">Open →</button>
									</div>
								</article>

								<article class="sub-card pending">
									<div class="card-top">
										<div class="badge-no">04</div>
										<span class="status">Not Started</span>
									</div>
									<div class="card-icon">⌂</div>
									<div class="card-title">Home Loan &amp; Interest</div>
									<div class="card-desc">
										Capture loan details, interest certificate, interest paid and eligible principal deductions.
									</div>
									<div class="card-bottom">
										<div class="mini-progress">
											<div class="bar"><span style="width: 0%"></span></div>
											<small>0% complete</small>
										</div>
										<button class="open" onclick="openSubstep(4)">Open →</button>
									</div>
								</article>

								<article class="sub-card pending">
									<div class="card-top">
										<div class="badge-no">05</div>
										<span class="status">Not Started</span>
									</div>
									<div class="card-icon">▤</div>
									<div class="card-title">Property Computation</div>
									<div class="card-desc">
										Automatically calculate NAV, standard deduction, loan interest and income or loss property-wise.
									</div>
									<div class="card-bottom">
										<div class="mini-progress">
											<div class="bar"><span style="width: 0%"></span></div>
											<small>0% complete</small>
										</div>
										<button class="open" onclick="openSubstep(5)">Open →</button>
									</div>
								</article>

								<article class="sub-card pending">
									<div class="card-top">
										<div class="badge-no">06</div>
										<span class="status">Not Started</span>
									</div>
									<div class="card-icon">✓</div>
									<div class="card-title">Cross Verification</div>
									<div class="card-desc">
										Compare property figures across documents, entered data and computed values before moving to the summary.
									</div>
									<div class="card-bottom">
										<div class="mini-progress">
											<div class="bar"><span style="width: 0%"></span></div>
											<small>0% complete</small>
										</div>
										<button class="open" onclick="openSubstep(6)">Open →</button>
									</div>
								</article>

								<article class="sub-card pending">
									<div class="card-top">
										<div class="badge-no">07</div>
										<span class="status">Not Started</span>
									</div>
									<div class="card-icon">▤</div>
									<div class="card-title">Summary</div>
									<div class="card-desc">
										Review all properties, total income or loss and the final amount that will flow into Tax Computation.
									</div>
									<div class="card-bottom">
										<div class="mini-progress">
											<div class="bar"><span style="width: 0%"></span></div>
											<small>0% complete</small>
										</div>
										<button class="open" onclick="openSubstep(7)">Open →</button>
									</div>
								</article>
							</section>

							<!-- PROPERTY SNAPSHOT -->
							<section class="section-head">
								<div>
									<h2>Property Snapshot</h2>
									<p>Live view of properties selected for FY 2026–27.</p>
								</div>
								<button class="btn" onclick="openRegister()">View Property Register →</button>
							</section>

							<div class="panel">
								<div class="table-wrap">
									<table>
										<thead>
											<tr>
												<th>S. No.</th>
												<th>Property</th>
												<th>Type</th>
												<th>Ownership</th>
												<th>Status</th>
												<th class="amount">Rent Considered</th>
												<th>Progress</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td><strong>P001 – My Home, Noida</strong></td>
												<td>Residential</td>
												<td>100%</td>
												<td><span class="tag green">Self Occupied</span></td>
												<td class="amount">—</td>
												<td><span class="tag green">Selected</span></td>
											</tr>
											<tr>
												<td>2</td>
												<td><strong>P002 – Flat 2, Gurugram</strong></td>
												<td>Residential</td>
												<td>50%</td>
												<td><span class="tag blue">Let Out</span></td>
												<td class="amount">₹1,20,000</td>
												<td><span class="tag amber">In Progress</span></td>
											</tr>
											<tr>
												<td>3</td>
												<td><strong>P003 – Plot, Jaipur</strong></td>
												<td>Land</td>
												<td>100%</td>
												<td><span class="tag amber">Vacant Land</span></td>
												<td class="amount">—</td>
												<td><span class="tag green">Selected</span></td>
											</tr>
											<tr class="total">
												<td colspan="5">Total Rent Considered for Computation</td>
												<td class="amount">₹1,20,000</td>
												<td>—</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>

							<!-- FY DOCUMENT REMINDER -->
							<section class="section-head">
								<div>
									<h2>FY-Specific Documents</h2>
									<p>Documents required for this financial year are maintained inside the relevant House Property step.</p>
								</div>
							</section>

							<div class="summary-grid" style="grid-template-columns: repeat(4, 1fr)">
								<div class="metric">
									<div class="label">Rent Agreement</div>
									<div class="value" style="font-size: 13px; color: var(--green)">Available</div>
								</div>
								<div class="metric">
									<div class="label">Rent Receipts</div>
									<div class="value" style="font-size: 13px; color: var(--green)">Available</div>
								</div>
								<div class="metric">
									<div class="label">Municipal Tax Receipts</div>
									<div class="value" style="font-size: 13px; color: #b57c00">Pending</div>
								</div>
								<div class="metric">
									<div class="label">Interest Certificate</div>
									<div class="value" style="font-size: 13px; color: #b57c00">Pending</div>
								</div>
							</div>
							</div>
							
							<!-- ======================= BOTTOM ACTIONS ======================= -->
							<div class="bottom-actions">
								<div class="left-actions">
									<button class="action-btn clickshowdata"data-target=".SalaryIncome">← Previous Step</button>
								</div>

								<div class="right-actions">
									<button class="action-btn">Save Progress</button>
									<button class="action-btn">Save & Exit</button>
									<button class="action-btn primary-btn clickshowdata" data-target=".HousePropertycontinue">Continue →</button>
								</div>
							</div>
						 
   
						 </div>
					    </div>
					  </div>
                    <!=======  End House Property ===========>


 					<!=======  House Property Continue ===========>
					  <div class="HousePropertycontinue" style="display:none;">
						<div class="taxmate-wrapper">							
							<div class="over_contenttts">
							  <div class="step-flow">
								<div class="steps">
									<div class="flow-step completed" onclick="showMessage('You are already on Salary Income.')">
										<div class="flow-circle">01</div>
										<div class="flow-label">Salary<br />Income</div>
									</div>

									<div class="flow-step active" onclick="openStep(2)">
										<div class="flow-circle">02</div>
										<div class="flow-label">House<br />Property</div>
									</div>

									<div class="flow-step" onclick="openStep(3)">
										<div class="flow-circle">03</div>
										<div class="flow-label">Capital<br />Gains</div>
									</div>

									<div class="flow-step" onclick="openStep(4)">
										<div class="flow-circle">04</div>
										<div class="flow-label">Business /<br />Professional</div>
									</div>

									<div class="flow-step" onclick="openStep(5)">
										<div class="flow-circle">05</div>
										<div class="flow-label">Other<br />Sources</div>
									</div>

									<div class="flow-step" onclick="openStep(6)">
										<div class="flow-circle">06</div>
										<div class="flow-label">Deductions &<br />Tax Planning</div>
									</div>

									<div class="flow-step" onclick="openStep(7)">
										<div class="flow-circle">07</div>
										<div class="flow-label">TDS /<br />TCS</div>
									</div>

									<div class="flow-step" onclick="openStep(8)">
										<div class="flow-circle">08</div>
										<div class="flow-label">Review &<br />ITR</div>
									</div>

									<div class="flow-step" onclick="openStep(9)">
										<div class="flow-circle">09</div>
										<div class="flow-label">Tax<br />Summary</div>
									</div>
								</div>
							  </div>
							  <div class="step-header">
								<div class="step-title-area">
									<div class="step-number">02</div>

									<div class="step-title">
										<h1>Step 2 Overview</h1>
										<p>Complete the seven sub-steps in any order. You can save your work and return later.</p>
									</div>
								</div>

								<div class="header-actions">
								   <div class="data_sh_no">
									<button class="help-btn">ⓘ Need Help?</button>
									<button class="video-help" onclick="openVideoHelp()" title="Watch Video Help">▶</button>
								   </div>	

								   <div class="data_sh_no1">	
									<div class="progress-area">
										<div class="progress-label">
											<span>Step Progress</span>
											<strong>22%</strong>
										</div>
										<div class="progress-bar">
											<div class="progress-fill" style="width:22%; background:#0ca564;"></div>
										</div>
									</div>

									<button class="dashboard-btn" onclick="goDashboard()">Go to Dashboard →</button>
								   </div>	
								</div>
							</div>
							

							  <div class="sub-tabs">
								<button class="sub-tab active" onclick="openTab(event,'PropertySelection')">01 Property Selection</button>
								<button class="sub-tab" onclick="openTab(event,'RentalIncome')">02 Rental Income</button>
								<button class="sub-tab" onclick="openTab(event,'MunicipalTaxes')">03 Municipal Taxes</button>
								<button class="sub-tab" onclick="openTab(event,'NetAnnualValue')">04 Net Annual Value</button>
								<button class="sub-tab" onclick="openTab(event,'StandardDeduction')">05 Standard Deduction</button>
								<button class="sub-tab" onclick="openTab(event,'HomeLoanInterest')">06 Home Loan Interest</button>
								<button class="sub-tab" onclick="openTab(event,'PropertySummary')">07 Property Summary</button>								
							  </div>

                              <div class="al_data_mngess">
								    <!-- ======================= SUB STEP 1 : Property Selection ======================= -->
									<div id="PropertySelection" class="tab-content active">
										<div class="card">
											<section class="panel">
												<div class="notice">
													<b>FY 2026–27 Property Selection</b><br />
													Properties are maintained permanently in <b>My Profile → G. Property Register</b>. Select the properties
													relevant to this Financial Year here. Do not recreate the permanent property record.
												</div>
												<div class="grid2">
													<div class="card">
														<div class="card-head">
															<div>
																<h2>Properties to Consider for FY 2026–27</h2>
																<p>Select one or more properties from your permanent Property Register.</p>
															</div>
															<button class="btn primary small" onclick="openPropertyModal()">＋ Add / Manage</button>
														</div>
														<div class="card-body">
															<table>
																<thead>
																	<tr>
																		<th style="width: 35px">Use</th>
																		<th>Property</th>
																		<th>Type</th>
																		<th>Ownership</th>
																		<th>Status</th>
																		<th>FY Treatment</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td><input type="checkbox" checked="" /></td>
																		<td><b>P001 — Flat-1</b><br /><span style="color: #7a899d">Noida</span></td>
																		<td>Residential</td>
																		<td>100%</td>
																		<td><span class="badge green">Self Occupied</span></td>
																		<td>Selected</td>
																	</tr>
																	<tr>
																		<td><input type="checkbox" checked="" /></td>
																		<td><b>P002 — Flat-2</b><br /><span style="color: #7a899d">Gurugram</span></td>
																		<td>Residential</td>
																		<td>50%</td>
																		<td><span class="badge blue">Let Out</span></td>
																		<td>Selected</td>
																	</tr>
																	<tr>
																		<td><input type="checkbox" /></td>
																		<td><b>P003 — Plot</b><br /><span style="color: #7a899d">Jaipur</span></td>
																		<td>Land</td>
																		<td>100%</td>
																		<td><span class="badge yellow">Vacant Land</span></td>
																		<td>Not selected</td>
																	</tr>
																</tbody>
															</table>
															<div class="notice success" style="margin: 10px 0 0">
																✓ Two properties are selected for this year's House Property computation. Their permanent master
																details remain unchanged.
															</div>
														</div>
													</div>
													<div>
														<div class="card summary-card">
															<div class="card-head"><h2>Selected Properties</h2></div>
															<div class="card-body">
																<div class="metric"><span>Properties selected</span><strong>2</strong></div>
																<div class="metric"><span>Self occupied</span><strong>1</strong></div>
																<div class="metric"><span>Let out</span><strong>1</strong></div>
																<div class="metric"><span>Co-owned property</span><strong>1</strong></div>
															</div>
														</div>
														<div class="notice">
															💡 FY-specific rent, taxes, loan interest and documents will be entered only for the selected property
															and FY.
														</div>
													</div>
												</div>
											</section>
										</div>
									</div>

									<!-- ======================= SUB STEP 2 : Rental Income ======================= -->

									<div id="RentalIncome" class="tab-content">
										<div class="card">
											<section class="panel">
												<div class="notice">
													<b>Rental Income</b><br />Enter actual rent information for each let-out property. TaxMate calculates gross
													realised rent, vacancy loss and net rent automatically.
												</div>
												<div class="card">
													<div class="card-head">
														<div>
															<h2>P002 — Flat-2, Gurugram</h2>
															<p>Ownership: 50% · Current status: Let Out</p>
														</div>
														<span class="badge blue">Let Out</span>
													</div>
													<div class="card-body">
														<div class="formgrid">
															<div><label>Monthly Rent (₹)</label><input value="30000" id="rent" /></div>
															<div><label>Months Rented</label><input value="8" id="months" type="number" min="0" max="12" /></div>
															<div><label>Vacant Months</label><input value="4" id="vacant" type="number" min="0" max="12" /></div>
															<div><label>Unrealised Rent (₹)</label><input value="0" id="unrealised" /></div>
															<div><label>Rent Received / Realised (₹)</label><input value="240000" id="realised" /></div>
															<div><label>Vacancy Loss (₹)</label><input value="120000" id="vacloss" /></div>
														</div>
														<div class="formula">Gross Annual Rent = Monthly Rent × Months Rented</div>
														<div class="formula">
															Net Rent before Municipal Tax = Gross Annual Rent − Unrealised Rent − Vacancy Loss
														</div>
														<table>
															<thead>
																<tr>
																	<th>Particular</th>
																	<th>Calculation / Source</th>
																	<th class="right">Amount (₹)</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>Monthly Rent</td>
																	<td>Rent Agreement / Rent Receipts</td>
																	<td class="right">30,000</td>
																</tr>
																<tr>
																	<td>Months Rented</td>
																	<td>FY 2026–27</td>
																	<td class="right">8</td>
																</tr>
																<tr>
																	<td>Gross Annual Rent</td>
																	<td>30,000 × 8</td>
																	<td class="right amount">2,40,000</td>
																</tr>
																<tr>
																	<td>Less: Unrealised Rent</td>
																	<td>As eligible under applicable rules</td>
																	<td class="right">0</td>
																</tr>
																<tr>
																	<td>Less: Vacancy Loss</td>
																	<td>4 months vacancy</td>
																	<td class="right">1,20,000</td>
																</tr>
																<tr>
																	<td><b>Net Rent</b></td>
																	<td></td>
																	<td class="right amount">1,20,000</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<div class="notice warn">
													⚠ Vacancy loss and unrealised rent should be supported by the relevant facts/documents. TaxMate should not
													automatically treat every unpaid amount as deductible.
												</div>
											</section>
										</div>
									</div>

									<!-- ======================= SUB STEP 3 : Municipal Taxes ======================= -->

									<div id="MunicipalTaxes" class="tab-content">
										<div class="card">
											<section class="panel">
											   <div class="notice">
											     <b>Municipal / Local Taxes Paid</b><br>
											     Only FY-specific taxes actually paid and eligible for deduction should be entered here. Upload or link the supporting receipt.
											    </div>
												<div class="card">
													<div class="card-head">
														<div>
															<h2>Taxes for P002 — Flat-2</h2>
															<p>FY 2026–27 tax payment records</p>
														</div>
														<button class="btn primary small" onclick="addTax()">＋ Add Tax</button>
													</div>
													<div class="card-body">
														<table id="taxTable">
															<thead>
																<tr>
																	<th>S.No.</th>
																	<th>Tax / Authority</th>
																	<th>Date Paid</th>
																	<th>Receipt / Proof</th>
																	<th class="right">Amount (₹)</th>
																	<th></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>1</td>
																	<td>Municipalities taxes</td>
																	<td>05-Dec-2026</td>
																	<td><span class="badge green">Uploaded</span></td>
																	<td class="right">3,000</td>
																	<td><button class="view v_w" onclick="alert('Demo: View receipt')">View</button></td>
																</tr>
																<tr>
																	<td>2</td>
																	<td>State Government taxes</td>
																	<td>07-Mar-2027</td>
																	<td><span class="badge green">Uploaded</span></td>
																	<td class="right">300</td>
																	<td><button class="view v_w" onclick="alert('Demo: View receipt')">View</button></td>
																</tr>
																<tr>
																	<td>3</td>
																	<td>Municipalities taxes</td>
																	<td>25-Mar-2027</td>
																	<td><span class="badge green">Uploaded</span></td>
																	<td class="right">750</td>
																	<td><button class="view v_w" onclick="alert('Demo: View receipt')">View</button></td>
																</tr>
															</tbody>
															<tfoot>
																<tr>
																	<th colspan="4">Gross Taxes Paid in FY 2026–27</th>
																	<th class="right">4,050</th>
																	<th></th>
																</tr>
															</tfoot>
														</table>
													</div>
												</div>

												<div class="card">
													<div class="card-head">
														<h2>Property-wise Tax Register</h2>
														<p>Useful when multiple properties have separate municipal tax payments.</p>
													</div>
													<div class="card-body">
														<table>
															<thead>
																<tr>
																	<th>Property</th>
																	<th>Ownership</th>
																	<th>Taxes Paid</th>
																	<th>Proof</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td><b>P001 — Flat-1</b></td>
																	<td>100%</td>
																	<td>₹0</td>
																	<td>—</td>
																</tr>
																<tr>
																	<td><b>P002 — Flat-2</b></td>
																	<td>50%</td>
																	<td>₹4,050</td>
																	<td><span class="badge green">3 receipts</span></td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
											</section>
										</div>
									</div>

									<!-- ======================= SUB STEP 4 : NetAnnual Value ======================= -->

									<div id="NetAnnualValue" class="tab-content">
										<div class="card">
											<section class="panel">
											  <div class="notice"><b>Net Annual Value (NAV)</b><br>TaxMate brings together the rental income and eligible municipal taxes to calculate the Net Annual Value for each property.</div>
											  <div class="grid2">
												<div class="card">
												  <div class="card-head"><h2>P002 — Net Annual Value</h2><span class="badge green">Auto Calculated</span></div>
												  <div class="card-body">
													<table>
													  <tbody><tr><td>Gross Annual Rent</td><td class="right">₹2,40,000</td></tr>
													  <tr><td>Less: Unrealised Rent</td><td class="right">₹0</td></tr>
													  <tr><td>Less: Vacancy Loss</td><td class="right">₹1,20,000</td></tr>
													  <tr><td><b>Gross Rent after Vacancy / Unrealised Rent</b></td><td class="right amount">₹1,20,000</td></tr>
													  <tr><td>Less: Municipal Taxes actually paid</td><td class="right">₹4,050</td></tr>
													  <tr><td><b>Net Annual Value</b></td><td class="right amount">₹1,15,950</td></tr>
													</tbody></table>
													<div class="formula">NAV = Eligible Gross Rent − Municipal Taxes actually paid during the FY</div>
												  </div>
												</div>
												<div>
												  <div class="card summary-card"><div class="card-head"><h2>FY 2026–27 NAV Summary</h2></div><div class="card-body">
													<div class="metric"><span>P001 — Self Occupied</span><strong>₹0*</strong></div>
													<div class="metric"><span>P002 — Let Out</span><strong>₹1,15,950</strong></div>
													<div class="metric"><span>Total NAV</span><strong>₹1,15,950</strong></div>
												  </div></div>
												  <div class="notice">* Self-occupied treatment is handled according to the selected property status and applicable tax regime/rules.</div>
												</div>
											  </div>
											</section>
										</div>
									</div>

									<!-- ======================= SUB STEP 5 : CROSS Standard Deduction ======================= -->

									<div id="StandardDeduction" class="tab-content">
										<div class="card">
											<section class="panel">
											  <div class="notice"><b>Standard Deduction</b><br>TaxMate calculates the applicable standard deduction from the Net Annual Value automatically. The user should not manually enter the deduction amount.</div>
											  <div class="card">
												<div class="card-head"><div><h2>Standard Deduction — P002</h2><p>Calculated from Net Annual Value</p></div><span class="badge green">Auto</span></div>
												<div class="card-body">
												  <table>
													<thead><tr><th>Particular</th><th class="right">Amount (₹)</th></tr></thead>
													<tbody>
													  <tr><td>Net Annual Value</td><td class="right">1,15,950</td></tr>
													  <tr><td>Applicable Standard Deduction</td><td class="right">30%</td></tr>
													  <tr><td><b>Standard Deduction</b></td><td class="right amount">34,785</td></tr>
													  <tr><td><b>NAV after Standard Deduction</b></td><td class="right amount">81,165</td></tr>
													</tbody>
												  </table>
												  <div class="formula">Standard Deduction = Applicable % × Net Annual Value</div>
												  <div class="notice success">✓ No bills or proof are required for the standard deduction itself. The underlying property income calculation remains traceable to the source documents.</div>
												</div>
											  </div>
											</section>
										</div>
									</div>

									<!-- =======================  SUB STEP 6 : Home Loan Interest  ======================= -->

									<div id="HomeLoanInterest" class="tab-content">
										<div class="card">
											<section class="panel">
											  <div class="notice"><b>Home Loan Interest</b><br>Enter the property loan details from the bank / financial institution's Interest Certificate. TaxMate should use interest certified for the relevant FY, not the total EMI.</div>
											  <div class="card">
												<div class="card-head"><div><h2>Loan Details — P002</h2><p>FY-specific interest certificate</p></div><button class="btn primary small" onclick="alert('Demo: Add loan')">＋ Add Loan</button></div>
												<div class="card-body">
												  <div class="formgrid">
													<div><label>Lender / Organisation</label><input value="Example Bank Ltd."></div>
													<div><label>Loan Account</label><input value="XXXXXX1234"></div>
													<div><label>Interest Certificate</label><button class="btn" style="width:100%;height:34px" onclick="alert('Demo: View Interest Certificate')">✓ View Certificate</button></div>
													<div><label>Interest Paid in FY (₹)</label><input value="3000"></div>
													<div><label>Principal Paid in FY (₹)</label><input value="1500"></div>
													<div><label>Property linked</label><select><option>P002 — Flat-2</option><option>P001 — Flat-1</option></select></div>
												  </div>
												  <div style="height:10px"></div>
												  <table>
													<thead><tr><th>Particular</th><th>Certificate / Source</th><th class="right">Amount (₹)</th><th>TaxMate Treatment</th></tr></thead>
													<tbody>
													  <tr><td>Interest Paid</td><td>Interest Certificate</td><td class="right">3,000</td><td><span class="badge green">Eligible subject to rules</span></td></tr>
													  <tr><td>Principal Paid</td><td>Interest / Loan Certificate</td><td class="right">1,500</td><td><span class="badge blue">80C / applicable section</span></td></tr>
													  <tr><td>Eligible under Section 24</td><td>Auto</td><td class="right">1,500</td><td><span class="badge green">Auto</span></td></tr>
													  <tr><td>Eligible under Section 80C</td><td>Auto</td><td class="right">1,500</td><td><span class="badge green">Auto</span></td></tr>
													</tbody>
												  </table>
												  <div class="notice warn" style="margin-top:10px">⚠ The final eligible amount should be determined by TaxMate's tax-rule engine based on property use, loan purpose, ownership, dates, tax regime and other applicable conditions.</div>
												</div>
											  </div>
											</section>
										</div>
									</div>
									
									<!-- =======================  SUB STEP 7 : Property Summary  ======================= -->
									
									<div id="PropertySummary" class="tab-content">
										<div class="card">
											 <section class="panel active">
											  <div class="notice"><b>Property-wise Final Summary</b><br>This is the final output of Step 2. Each property is calculated separately, then the eligible income/loss is aggregated and passed to the Tax Computation engine.</div>
											  <div class="card">
												<div class="card-head"><div><h2>House Property Computation — FY 2026–27</h2><p>Property-wise calculation and final House Property income / loss</p></div><span class="badge green">Ready for Computation</span></div>
												<div class="card-body">
												  <div class="wrap">
													<table>
													  <thead>
														<tr>
														  <th>Property</th><th>Status</th><th>Ownership</th><th class="right">NAV (₹)</th>
														  <th class="right">Standard Ded. (₹)</th><th class="right">Interest (₹)</th><th class="right">Income / (Loss) (₹)</th>
														</tr>
													  </thead>
													  <tbody>
														<tr>
														  <td><b>P001 — Flat-1</b><br><span style="color:#7b8ba0">Noida</span></td>
														  <td><span class="badge green">Self Occupied</span></td><td>100%</td>
														  <td class="right">0</td><td class="right">0</td><td class="right">0</td><td class="right amount">0</td>
														</tr>
														<tr>
														  <td><b>P002 — Flat-2</b><br><span style="color:#7b8ba0">Gurugram</span></td>
														  <td><span class="badge blue">Let Out</span></td><td>50%</td>
														  <td class="right">1,15,950</td><td class="right">34,785</td><td class="right">1,500*</td><td class="right amount">79,665*</td>
														</tr>
														<tr>
														  <th colspan="3">Total House Property Income / (Loss)</th><th class="right">1,15,950</th><th class="right">34,785</th><th class="right">1,500*</th><th class="right amount">79,665*</th>
														</tr>
													  </tbody>
													</table>
												  </div>
												  <div class="notice" style="margin-top:11px">*Illustrative values in this prototype. In the live engine, ownership share and all applicable statutory limits/treatments will be applied automatically.</div>
												</div>
											  </div>

											  <div class="grid2">
												<div class="card">
												  <div class="card-head"><h2>Documents &amp; Verification</h2></div>
												  <div class="card-body">
													<div class="doc"><div><div class="name">Rent Agreement — P002</div><div class="src">FY 2026–27 · Linked document</div></div><button class="view" onclick="alert('Demo: Open document')">View</button></div>
													<div class="doc"><div><div class="name">Rent Receipts — P002</div><div class="src">FY 2026–27 · 8 receipts</div></div><button class="view" onclick="alert('Demo: Open receipts')">View</button></div>
													<div class="doc"><div><div class="name">Municipal Tax Receipts — P002</div><div class="src">FY 2026–27 · 3 receipts</div></div><button class="view" onclick="alert('Demo: Open receipts')">View</button></div>
													<div class="doc"><div><div class="name">Interest Certificate — P002</div><div class="src">FY 2026–27 · Bank certificate</div></div><button class="view" onclick="alert('Demo: Open certificate')">View</button></div>
												  </div>
												</div>
												<div>
												  <div class="card summary-card"><div class="card-head"><h2>Final Flow</h2></div><div class="card-body">
													<div class="metric"><span>Property-wise calculation</span><strong class="check">✓ Done</strong></div>
													<div class="metric"><span>Documents checked</span><strong class="check">✓ Ready</strong></div>
													<div class="metric"><span>House Property Income</span><strong>₹79,665*</strong></div>
													<div class="metric"><span>Sent to Tax Computation</span><strong class="check">✓ Yes</strong></div>
												  </div></div>
												</div>
											  </div>
											</section>
										</div>
									</div>
								
								</div>
							
						    </div>
							
							<!-- ======================= BOTTOM ACTIONS ======================= -->
							<div class="bottom-actions">
								<div class="left-actions">
									<button class="action-btn clickshowdata"data-target=".HouseProperty">← Previous Step</button>
								</div>

								<div class="right-actions">
									<button class="action-btn">Save Progress</button>

									<button class="action-btn">Save & Exit</button>

									<button class="action-btn primary-btn">Complete Step 2 ✓</button>
								</div>
							</div>
						</div>
					  </div>
					<!=======  End House Property Continue ===========> 
				  </div>
                  

                  
				  
                </div>
            </div>
        </div>
    </div>
</section>

 
 
 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> <!-- Owl Carousel JS --> <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script> 
 
 
<script>
 $(document).ready(function () {

    $(".quick-title").on("click", function () {

        $(this).toggleClass("active");

        $(".quick-actions").slideToggle(300);

    });

});
</script> 
 
<script>
let modeValue = "up";

function mode(x) {
    modeValue = x;
    document.getElementById("up").style.display = x === "up" ? "block" : "none";
    document.getElementById("link").style.display = x === "link" ? "block" : "none";
    document.getElementById("upTab").classList.toggle("active", x === "up");
    document.getElementById("linkTab").classList.toggle("active", x === "link");
    planChanged();
}
function planChanged() {
    let free = document.getElementById("plan").value === "free";
    document.getElementById("file").disabled = free;
    document.getElementById("upTab").style.opacity = free ? 0.55 : 1;
}
function save() {
    let n = document.getElementById("name").value.trim(),
        a = document.getElementById("address").value.trim(),
        c = document.getElementById("city").value.trim(),
        o = +document.getElementById("own").value;
    if (!n || !a || !c || o < 1 || o > 100) return alert("Please complete the required property details.");
    if (modeValue === "up" && document.getElementById("plan").value === "free")
        return alert("Free users can add the permanent document through a URL / Google Drive link.");
    if (modeValue === "link" && !document.getElementById("url").value.trim())
        return alert("Please enter the permanent property document URL.");
    alert(
        "Demo: Property saved. In the live TaxMate application the next Property ID will be generated automatically."
    );
    closeModal();
}
function edit(id) {
    document.getElementById("mt").textContent = "Edit Property — " + id;
    document.getElementById("name").value = id === "P001" ? "Flat-1" : id === "P002" ? "Flat-2" : "Plot";
    document.getElementById("city").value = id === "P001" ? "Noida" : id === "P002" ? "Gurugram" : "Jaipur";
    document.getElementById("own").value = id === "P002" ? 50 : 100;
    openModal();
    mode("link");
}
function del(b) {
    if (confirm("Remove this property from the Property Register?")) {
        b.closest("tr").remove();
        renumber();
    }
}
function renumber() {
    document.querySelectorAll("#rows tr").forEach((r, i) => (r.cells[0].textContent = i + 1));
    document.getElementById("total").textContent = document.querySelectorAll("#rows tr").length;
    document.getElementById("self").textContent = document.querySelectorAll("[data-type=self]").length;
    document.getElementById("let").textContent = document.querySelectorAll("[data-type=let]").length;
    document.getElementById("other").textContent = document.querySelectorAll("[data-type=other]").length;
}
function viewDoc(id) {
    alert("Demo: Open permanent document for " + id + ". The live version will open the stored file or URL.");
}

</script>

<script>
$(document).ready(function () {
    $("#addMore").on("click", function (e) {
        e.preventDefault();
        let html = `
            <div class="upload">
                <div class="document-remove">
                    <button type="button" class="remove-document">×</button>
                </div>

                <div class="bothss">
                    <input type="text" id="url" name="" placeholder="Paste Google Drive / OneDrive / document URL" />
                    <input type="text" id="url" name="" placeholder="Sale Deed of Flat 2002" />
                </div>
                <div class="sm_mtr_texttx">
                    ✓ Document links are available for Free and Paid users.
                </div>
            </div>
        `;
        $(".mulipal").append(html);
    });


    // Remove added document
    $(document).on("click", ".remove-document", function (e) {
        e.preventDefault();
        $(this).closest(".upload").remove();
    });
});

$(document).ready(function () {
    $("#addMores").on("click", function (e) {
        e.preventDefault();
        let html = `
            <div class="upload">
                <div class="document-remove">
                    <button type="button" class="remove-document">×</button>
                </div>

                <div class="bothss">
                    <input id="file" type="file" accept=".pdf,.jpg,.jpeg,.png" disabled="">
					<input type="text" id="" name="" placeholder="Enter name of the Document" />
                </div>
                <div class="sm_mtr_texttx1">
                    ✓ Document links are available for Free and Paid users.
                </div>
            </div>
        `;
        $(".multiple_file").append(html);
    });


    // Remove added document
    $(document).on("click", ".remove-document", function (e) {
        e.preventDefault();
        $(this).closest(".upload").remove();
    });
});
</script>
 

 
 <script>
$(document).ready(function () {

    // Open modal
    $(".open-modal").on("click", function () {

        const modalId = $(this).data("modal");

        $("#" + modalId).addClass("show");

        $("body").css("overflow", "hidden");
    });


    // Close modal
    $(".close-modal").on("click", function () {

        const modalId = $(this).data("modal");

        $("#" + modalId).removeClass("show");

        $("body").css("overflow", "");
    });


    // Click outside modal
    $(".modal-overlay").on("click", function (e) {

        if ($(e.target).is(".modal-overlay")) {

            $(this).removeClass("show");

            $("body").css("overflow", "");
        }
    });


    // ESC key
    $(document).on("keydown", function (e) {

        if (e.key === "Escape") {

            $(".modal-overlay.show").removeClass("show");

            $("body").css("overflow", "");
        }
    });

});
 </script>
 
 
 <script>
$(document).ready(function () {
    $(".clickshowdata").on("click", function () {
        // Cover hide
        $(".cover_areea").hide();
        // Main div show
        $(".new_show_div").fadeIn(300);
        // Sabhi content hide
        $(".new_show_div > div").hide();
        // Clicked button ka target
        var target = $(this).data("target");
        // Sirf selected div show
        $(target).fadeIn(300);
    });
});
 </script>
 
 
 
 
 <script>

/* =========================================================
   SUB-STEP / TAB NAVIGATION
   ========================================================= */

function openTab(event, tabId) {

    // Hide all tab contents
    const contents = document.querySelectorAll('.tab-content');

    contents.forEach(function (content) {
        content.classList.remove('active');
    });

    // Remove active from all tabs
    const tabs = document.querySelectorAll('.sub-tab');

    tabs.forEach(function (tab) {
        tab.classList.remove('active');
    });

    // Add active to clicked tab
    event.currentTarget.classList.add('active');

    // Show selected content
    const selected = document.getElementById(tabId);

    if (selected) {
        selected.classList.add('active');
    }
}


/* =========================================================
   STEP NAVIGATION
   ========================================================= */

function openStep(stepNumber){

    if(stepNumber === 1){
        return;
    }

    alert(
        "Step " + stepNumber +
        " will open here when its design is added."
    );
}


/* =========================================================
   VIDEO HELP
   ========================================================= */

function openVideoHelp(){

    alert(
        "Salary Income – Video Help\n\n" +
        "Your developer can replace this action with the " +
        "YouTube/video modal or embedded TaxMate help video."
    );

}


/* =========================================================
   DASHBOARD
   ========================================================= */

function goDashboard(){

    alert(
        "Go to TaxMate Dashboard"
    );

}


/* =========================================================
   MESSAGE
   ========================================================= */

function showMessage(message){
    alert(message);
}

</script>
 
 
 <script>        $(document).ready(function () {            $(".news-slider").owlCarousel({                loop: true,                margin: 0,                nav: true,                dots: false,                autoplay: true,                autoplayTimeout: 4000,                autoplayHoverPause: true,                smartSpeed: 600,                responsive: {                    0: {                        items: 1                    },                    576: {                        items: 1                    },                    992: {                        items: 1                    },                    1200: {                        items: 1                    }                }            });        });    </script>			<script>		$(document).ready(function () {			$(".mobile_menu_btn").on("click", function () {				if ($(window).width() <= 767) {					$(".side_menusses").toggleClass("menu_open");					$(this).find("i").toggleClass("fa-bars fa-times");				}			});		});





$(document).ready(function () {            
  $(".previous-years").owlCarousel({                
     loop: true,                
	 margin: 0,                
	 nav: false,                
	 dots: false,                
	 autoplay: true,                
	 autoplayTimeout: 4000,                
	 autoplayHoverPause: true,                
	 smartSpeed: 600,                
	 responsive: {                    
	 0: {                        
	    items: 1                    
	    },                    
	 576: {                        
	    items: 1                    
	      },                    
	 992: {                        
	    items: 1                    
	      },                    
	 1200: {                        
	    items: 1                    
	       }                
	 } 
  });       
});    
</script>			
	 

@endsection
@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
@php
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
@endphp
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <!-- <div class="row">
        <div class="col-md-12">
            <h2 class="text-center mb-3">Welcome To 1CRAPP {{ Auth()->user()->getRoleNames()[0] }} Dashboard!</h2>
        </div>
    </div> -->
    <!-- Content Row -->
    <div class="row">
        @if(auth()->user()->role_id == 1)
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Agents</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ DB::table('agents')->where('role_id', 2)->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Users</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ DB::table('users')->where('type', 1)->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Revenue
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> ₹0.00</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-rupee fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Active Plans</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ DB::table('agents')->whereDate('valid_upto', '>=', \Carbon\Carbon::today())->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if(auth()->user()->role_id != 1)
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-sm-12 mb-4">
            <div class="card shadow">
                <div class="card-body bg-primary text-light">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <!-- <ul class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ul> -->
                        <!-- Carousel Items -->
                        <div class="carousel-inner">
                            <!-- Item 1 -->
                            @foreach($communities as $key=>$community)
                            <div class="carousel-item @if($key ==0) active @endif">
                                <div class="community-card text-center">
                                    <div class="community-icon">
                                        <i class="fa {{ $community->icon }}"></i>
                                    </div>
                                    <h6 style="font-weight:900;">{{ Str::limit($community->title, 25) }}</h6>
                                    <small>
                                        {{ Str::limit($community->content, 80) }}
                                    </small><br>
                                    <a href="{{ $community->btn_link }}" target="_blank" class="btn btn-sm btn-light">
                                        {{ $community->btn_text }}
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!-- Controls -->
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Info
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> </div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-rupee fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <!-- <div class="card shadow h-100">
                    <div class="card-body"> -->
            @if($adb_setting->demo_link_enable == 1)
                @if($adb_setting->demo_link)
                    @if($adb_setting->media_type == 2)
                        {!! $adb_setting->demo_link !!}
                    @else
                        @if(Str::contains($adb_setting->demo_link, 'youtube.com') || Str::contains($adb_setting->demo_link, 'youtu.be'))
                        <iframe width="100%" src="{{ $adb_setting->demo_link }}" frameborder="0" allowfullscreen> </iframe>
                        @elseif(in_array(pathinfo($adb_setting->demo_link, PATHINFO_EXTENSION), ['jpg','jpeg','png','gif']))
                            <img src="{{ $adb_setting->demo_link }}" class="img-fluid">
                        @elseif(in_array(pathinfo($adb_setting->demo_link, PATHINFO_EXTENSION), ['mp4','webm']))
                            <video width="100%" controls><source src="{{ $adb_setting->demo_link }}"></video>
                        @endif
                    @endif
                @endif
            @endif
            <!-- </div>
                </div> -->
        </div>
        @endif
        @if(auth()->user()->role_id == 1)
        <div class="col-xl-12 col-md-12 mb-4">
            @else
            <div class="col-xl-6 col-md-12 mb-4">
                @endif
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4>User Analytics</h4>
                            <select id="filterType" class="form-control" style="width: 200px;">
                                <option value="7days">Last 7 Days</option>
                                <option value="1month">1 Month</option>
                                <option value="6months" selected>6 Months</option>
                                <option value="1year">1 Year</option>
                            </select>
                        </div>
                        <canvas id="usersChart" height="100"></canvas>
                    </div>
                </div>
            </div>
            @if(auth()->user()->role_id != 1)
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-50 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Appointment Booked
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">10 </div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-50 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Users
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ DB::table('users')->where(['agent_id'=> auth()->id(), 'type'=>1])->count() }} </div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Recent Gift Caimpaign
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ DB::table('users')->where('agent_id', auth()->id())->count() }} </div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-image fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Alerts
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ DB::table('users')->where('agent_id', auth()->id())->count() }} </div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-bell fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Revenue
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">₹0.00 </div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-money fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Active Plans
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">0</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-warning fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if(auth()->user()->role_id == 1)
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="text-center">Top Agents</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="text-center">Alerts</h4>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-xl-12 col-md-12 mb-4">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <h6>Quick Actions</h6>
                        <div class="d-flex align-items-center mb-4">
                            @if(auth()->user()->role_id == 1)
                            <a href="{{ route('agent.create') }}" class="btn btn-primary ml-2"><i class="fas fa-plus"></i> Add Agent <i class="fas fa-external-link-alt"></i></a>
                            @endif
                            <a href="javascript:void(0)" class="btn btn-primary ml-2">View Reports <i class="fas fa-external-link-alt"></i></a>
                            <a href="{{ route('notification.create') }}" class="btn btn-primary ml-2"><i class="fas fa-send"></i> Send Notification <i class="fas fa-external-link-alt"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let usersChart;
        function loadChart(type = '6months') {
            $.ajax({
                url: "{{ route('dashboard.user.graph') }}",
                type: "GET",
                data: {
                    type: type
                },
                success: function(response) {
                    const ctx = document.getElementById('usersChart').getContext('2d');
                    if (usersChart) {
                        usersChart.destroy();
                    }
                    usersChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: response.labels,
                            datasets: [{
                                label: 'Users',
                                data: response.data,
                                borderWidth: 2,
                                tension: 0.3,
                                fill: false
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    display: true
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                }
            });
        }
        // Initial Load
        loadChart();
        // Filter Change
        $('#filterType').change(function() {
            loadChart($(this).val());
        });
    </script>
    @endsection
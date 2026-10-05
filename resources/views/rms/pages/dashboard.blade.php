@extends('rms.layout.app')
@section('content')
<div class="row g-4">
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card stat">
            <div class="float-icon bg-g-dark"><i class="bi bi-wallet2"></i></div>
            <div class="body"><small>Today's Money</small>
                <h4>$53k</h4>
            </div>
            <div class="foot"><span class="up">+55%</span> than last week</div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card stat">
            <div class="float-icon bg-g-pink"><i class="bi bi-person-fill"></i></div>
            <div class="body"><small>Today's Users</small>
                <h4>2,300</h4>
            </div>
            <div class="foot"><span class="up">+3%</span> than last month</div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card stat">
            <div class="float-icon bg-g-green"><i class="bi bi-people-fill"></i></div>
            <div class="body"><small>New Clients</small>
                <h4>3,462</h4>
            </div>
            <div class="foot"><span class="down">-2%</span> than yesterday</div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card stat">
            <div class="float-icon bg-g-blue"><i class="bi bi-bag-fill"></i></div>
            <div class="body"><small>Sales</small>
                <h4>$103,430</h4>
            </div>
            <div class="foot"><span class="up">+5%</span> than yesterday</div>
        </div>
    </div>
</div>

<div class="row g-4 mt-1">
    <div class="col-12 col-lg-6 col-xl-4">
        <div class="card chart-card">
            <div class="chart-box bg-g-pink"><canvas id="chartViews"></canvas></div>
            <div class="info">
                <h6>Website Views</h6>
                <p>Last campaign performance</p>
            </div>
            <div class="foot"><i class="bi bi-clock me-1"></i>campaign sent 2 days ago</div>
        </div>
    </div>
    <div class="col-12 col-lg-6 col-xl-4">
        <div class="card chart-card">
            <div class="chart-box bg-g-green"><canvas id="chartSales"></canvas></div>
            <div class="info">
                <h6>Daily Sales</h6>
                <p><b>(+15%)</b> increase in today sales.</p>
            </div>
            <div class="foot"><i class="bi bi-clock me-1"></i>updated 4 min ago</div>
        </div>
    </div>
    <div class="col-12 col-xl-4">
        <div class="card chart-card">
            <div class="chart-box bg-g-dark"><canvas id="chartTasks"></canvas></div>
            <div class="info">
                <h6>Completed Tasks</h6>
                <p>Last campaign performance</p>
            </div>
            <div class="foot"><i class="bi bi-clock me-1"></i>just updated</div>
        </div>
    </div>
</div>

<div class="card tcard mt-5">
    <div class="card-head bg-g-blue">
        <h6>Recent orders</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-m mb-0">
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Customer</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#1042</td>
                        <td>Aarav Mehta</td>
                        <td>$320.00</td>
                        <td><span class="badge-s bg-g-green">Paid</span></td>
                    </tr>
                    <tr>
                        <td>#1041</td>
                        <td>Neha Kapoor</td>
                        <td>$89.50</td>
                        <td><span class="badge-s bg-g-blue">Shipped</span></td>
                    </tr>
                    <tr>
                        <td>#1040</td>
                        <td>Rohan Das</td>
                        <td>$1,240.00</td>
                        <td><span class="badge-s bg-g-pink">Pending</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
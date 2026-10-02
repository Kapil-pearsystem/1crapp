@extends('rms.layouts.app')
@section('content')
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
@endsection
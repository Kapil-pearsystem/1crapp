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

@endsection
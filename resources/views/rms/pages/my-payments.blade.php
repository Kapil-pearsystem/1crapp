@extends('rms.layout.app')
@section('content')
@php
    $statusLabels = [
        0 => 'Pending Request',
        1 => 'Request Sent',
        2 => 'Partially Paid',
        3 => 'Fully Paid',
        4 => 'Overdue',
        5 => 'Cancelled',
    ];
    $statusColors = [
        0 => 'bg-g-dark',
        1 => 'bg-g-blue',
        2 => 'bg-g-orange',
        3 => 'bg-g-green',
        4 => 'bg-g-pink',
        5 => 'bg-g-grey',
    ];
@endphp
<div class="card tcard">
    <div class="card-head bg-g-pink">
        <h6>My Payments</h6>
        <small class="opacity-75">View your rent payment requests, outstanding amounts and completed payments.</small>
    </div>
    <div class="card-body">
        {{-- Tabs --}}
        <ul class="nav nav-underline pay-tabs mb-3" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="tab-requests" data-bs-toggle="tab" data-bs-target="#pane-requests" type="button" role="tab">
                    Payment Requests
                    @if($requestLists->total() > 0)<span class="badge-s bg-g-pink ms-1">{{ $requestLists->total() }}</span>@endif
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab-completed" data-bs-toggle="tab" data-bs-target="#pane-completed" type="button" role="tab">
                    Completed
                    @if($completedLists->total() > 0)<span class="badge-s bg-g-green ms-1">{{ $completedLists->total() }}</span>@endif
                </button>
            </li>
        </ul>
        <div class="tab-content">
            {{-- ================= PAYMENT REQUESTS ================= --}}
            <div class="tab-pane fade show active" id="pane-requests" role="tabpanel">
                @forelse($requestLists as $list)
                    @php
                        $elApplicable = $list->shop ? $list->shop->electricity_applicable : 0;
                        $dueDate = $list->shop ? $list->shop->due_day : null;
                        if ($elApplicable) {
                            $electricityAmount = $list->electricity ? (float) $list->electricity->electricity_cost : 0;
                        }else{
                            $electricityAmount = 0;
                        }
                        $status = (int) $list->status;
                        $gross_due = max(0, (float) $list->basic_rent + (float) $list->cleaning_cost + $electricityAmount);
                        $penaltyAmount = max(0, (float) $gross_due - (float) $list->paid_amount);
                        if ($isPenaltyOverride) {
                            $penalty = 0;
                        } else {
                            $penalty = calculateRentPenalty($penaltyAmount, $dueDate, $penaltySettings, $list->collection_year, $list->collection_month);
                        }
                        $gross_due += $penalty;
                        $outstanding = max(0, (float) $gross_due - (float) $list->paid_amount);
                    @endphp
                    <div class="pay-item">
                        <div class="d-flex justify-content-between align-items-start gap-2">
                            <div>
                                <div class="pay-month">
                                    {{ date('F', mktime(0, 0, 0, $list->collection_month, 1)) }} {{ $list->collection_year }}
                                </div>
                                <small class="text-secondary">Request created: {{ date('d M, Y', strtotime($list->created_at)) }}</small>
                            </div>
                            <span class="badge-s {{ $penalty > 0 ? 'bg-danger' : 'bg-g-grey' }}">{{ $penalty > 0 ? 'Pending' : 'No Penalty' }}</span>
                        </div>
                        <div class="row g-2 mt-2">
                            <div class="col-6 col-lg-3"><div class="pay-detail"><span>Basic Rent</span><strong>₹{{ number_format((float) $list->basic_rent, 2) }}</strong></div></div>
                            <div class="col-6 col-lg-3"><div class="pay-detail"><span>Maintenance</span><strong>₹{{ number_format((float) $list->cleaning_cost ?? 0, 2) }}</strong></div></div>
                            <div class="col-6 col-lg-3"><div class="pay-detail"><span>Electricity Bill</span><strong>₹{{ number_format($electricityAmount, 2) }}</strong></div></div>
                            <div class="col-6 col-lg-3"><div class="pay-detail"><span>Penalty</span><strong>₹{{ number_format((float) $penalty ?? 0, 2) }}</strong></div></div>
                            <div class="col-6 col-lg-3"><div class="pay-detail"><span>Gross Due</span><strong class="text-primary">₹{{ number_format((float) $gross_due, 2) }}</strong></div></div>
                            <div class="col-6 col-lg-3"><div class="pay-detail"><span>Paid</span><strong class="up">₹{{ number_format((float) $list->paid_amount, 2) }}</strong></div></div>
                            <div class="col-6 col-lg-3"><div class="pay-detail"><span>Outstanding</span><strong class="{{ $outstanding > 0 ? 'down' : '' }}">₹{{ number_format($outstanding, 2) }}</strong></div></div>
                            <div class="col-6 col-lg-3"><div class="pay-detail"><span>Payment Status</span><strong>{{ $statusLabels[$status] ?? '-' }}</strong></div></div>
                        </div>
                        @if(in_array($status, [0, 1, 2, 4]) && $outstanding > 0)
                            <div class="text-end mt-3">
                                    <button type="button" class="btn btn-sm btn-outline-secondary js-payment-history"
                                            data-id="{{ $list->id }}">
                                        <i class="bi bi-clock-history me-1"></i>Payment History
                                    </button>
                                <button type="button" class="btn btn-gradient js-pay-btn"
                                        data-id="{{ $list->id }}"
                                        data-year="{{ $list->collection_year }}"
                                        data-month="{{ $list->collection_month }}"
                                        data-rent="{{ $gross_due }}"
                                        data-due="{{ !empty($dueDate) ? date('d F Y', strtotime($list->collection_year . '-' . str_pad($list->collection_month, 2, '0', STR_PAD_LEFT) . '-' . str_pad($dueDate, 2, '0', STR_PAD_LEFT))) : '-' }}"
                                        data-outstanding="{{ $outstanding }}">
                                    <i class="bi bi-plus-lg me-1"></i>Add Payment
                                </button>
                            </div>
                        @elseif($status === 5)
                            <div class="text-end mt-3 small down">This payment request has been cancelled.</div>
                        @endif
                    </div>
                @empty
                    <div class="pay-empty"><i class="bi bi-inbox fs-3 d-block mb-1"></i>No payment requests found.</div>
                @endforelse
                @if($requestLists->hasPages())
                    <div class="mt-3 d-flex justify-content-end">
                        {{ $requestLists->fragment('requests')->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
            {{-- ================= COMPLETED ================= --}}
            <div class="tab-pane fade" id="pane-completed" role="tabpanel">
                @forelse($completedLists as $list)
                    <div class="pay-item">
                        <div class="d-flex justify-content-between align-items-start gap-2">
                            <div>
                                <div class="pay-month">
                                    {{ date('F', mktime(0, 0, 0, $list->collection_month, 1)) }} {{ $list->collection_year }}
                                </div>
                                <small class="text-secondary">
                                    Payment completed: {{ $list->updated_at ? date('d M, Y', strtotime($list->updated_at)) : '-' }}
                                </small>
                            </div>
                            <span class="badge-s bg-g-green">Fully Paid</span>
                        </div>
                        <div class="row g-2 mt-2">
                            <div class="col-6 col-lg-3"><div class="pay-detail"><span>Total Amount</span><strong>₹{{ number_format((float) $list->gross_due, 2) }}</strong></div></div>
                            <div class="col-6 col-lg-3"><div class="pay-detail"><span>Paid Amount</span><strong class="up">₹{{ number_format((float) $list->paid_amount, 2) }}</strong></div></div>
                            <div class="col-6 col-lg-3"><div class="pay-detail"><span>Payment Mode</span><strong>{{ $list->payment_mode ?: '-' }}</strong></div></div>
                            <div class="col-6 col-lg-3"><div class="pay-detail"><span>Reference</span><strong class="text-break">{{ $list->reference_number ?: '-' }}</strong></div></div>
                        </div>
                        @if(!empty($list->receipt))
                            <div class="text-end mt-3">
                                <a href="{{ $list->receipt }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                                    <i class="bi bi-receipt me-1"></i>View Receipt
                                </a>
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="pay-empty"><i class="bi bi-inbox fs-3 d-block mb-1"></i>No completed payments found.</div>
                @endforelse
                @if($completedLists->hasPages())
                    <div class="mt-3 d-flex justify-content-end">
                        {{ $completedLists->fragment('completed')->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>
        {{-- Verification note --}}
        <div class="pay-note mt-4">
            <i class="bi bi-info-circle-fill me-2"></i>
            <span><b>Payment verification:</b> Submitting a payment does not automatically mean the payment is approved.
            The property administrator must verify the submitted payment and proof.</span>
        </div>
    </div>
</div>
{{-- ================= RENT PAYMENT WIZARD MODAL ================= --}}
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable pay-dialog" id="payDialog">
        <form method="POST" action="{{ route('rms.save-rent') }}" enctype="multipart/form-data" id="rentForm" class="modal-content">
            @csrf
            <input type="hidden" name="collection_id" id="payment_collection_id">
            {{-- ============ STEP 1: CHOOSE METHOD ============ --}}
            <div class="pay-step" data-step="1">
                <div class="modal-header border-0 pb-0">
                    <div>
                        <h5 class="modal-title fw-bold" id="paymentModalTitle">Make Rent Payment</h5>
                        <small class="text-secondary">How would you like to make your rent payment?</small>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <button type="button" class="pay-option w-100 text-start" data-method="online">
                                <div class="pay-option-title"><i class="bi bi-credit-card-2-front me-2"></i>Online Payment</div>
                                <small>Pay using UPI, QR Code or Bank Transfer.</small>
                            </button>
                        </div>
                        <div class="col-sm-6">
                            <button type="button" class="pay-option w-100 text-start" data-method="offline">
                                <div class="pay-option-title"><i class="bi bi-receipt me-2"></i>Offline Payment</div>
                                <small>I will make the payment offline and submit the payment details.</small>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light w-100" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
            {{-- ============ STEP 2: ACCOUNT DETAILS ============ --}}
            <div class="pay-step d-none" data-step="2">
                <div class="modal-header border-0 pb-0">
                    <div>
                        <h5 class="modal-title fw-bold">Make Rent Payment</h5>
                        <small class="text-secondary">Please complete your rent payment using the details below before submitting your payment proof.</small>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="pay-summary mb-3">
                        <div><small>Rent Month</small><strong id="sumMonth">-</strong></div>
                        <div><small>Total Rent Amount</small><strong id="sumRent">₹0</strong></div>
                        <div><small>Due Date</small><strong id="sumDue">-</strong></div>
                        <div class="total"><small>Total Payable</small><strong id="sumTotal">₹0</strong></div>
                    </div>
                    @if(!$account)
                        <div class="alert alert-danger mb-0">
                            Payment account details are not available. Please contact your agent.
                        </div>
                    @else
                    <div class="row g-3">
                        {{-- ============ UPI ============ --}}
                        @if(!empty($account->upi_id) || !empty($account->barcode_file))
                        <div class="{{ !empty($account->account_no) ? 'col-lg-6' : 'col-12' }}">
                            <div class="pay-card h-100">
                                <h6 class="fw-bold">Pay Using UPI</h6>
                                <small class="text-secondary d-block mb-3">
                                    Scan the QR code with any UPI app (Google Pay, PhonePe, Paytm, BHIM, etc.)
                                </small>
                                <div class="qr-row">
                                    @if(!empty($account->barcode_file))
                                        <img id="upiQr"
                                            src="{{ $account->barcode_file }}"
                                            alt="UPI QR"
                                            width="140" height="140"
                                            class="border rounded p-1"
                                            onerror="this.style.display='none'">
                                    @endif
                                    <div class="flex-grow-1">
                                        @if(!empty($account->upi_id))
                                            <small class="text-secondary fw-semibold">
                                                UPI ID @if(!empty($account->upi_name)) ({{ $account->upi_name }}) @endif
                                            </small>
                                            <div class="input-group input-group-sm mb-2">
                                                <input type="text" class="form-control" id="upiId"
                                                    value="{{ $account->upi_id }}" readonly>
                                                <button type="button" class="btn btn-outline-primary copy-btn"
                                                        data-copy-target="#upiId">Copy</button>
                                            </div>
                                            <a href="#" id="openUpiApp"
                                            data-payee="{{ $account->account_holder_name }}"
                                            class="btn btn-primary btn-sm w-100">
                                                <i class="bi bi-send-fill me-1"></i> Open UPI App
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        {{-- ============ BANK TRANSFER ============ --}}
                        @if(!empty($account->account_no))
                        <div class="{{ (!empty($account->upi_id) || !empty($account->barcode_file)) ? 'col-lg-6' : 'col-12' }}">
                            <div class="pay-card h-100">
                                <h6 class="fw-bold">Bank Transfer</h6>
                                <small class="text-secondary d-block mb-3">
                                    You can also pay via bank transfer using the details below.
                                </small>
                                <div class="bank-list">
                                    @foreach([
                                        'bankAccName' => ['Account Name',   $account->account_holder_name],
                                        'bankName'    => ['Bank Name',      $account->bank_name],
                                        'bankAccNo'   => ['Account Number', $account->account_no],
                                        'bankIfsc'    => ['IFSC Code',      $account->ifsc_code],
                                        'bankAccType' => ['Account Type',   ucfirst($account->account_type ?? '')],
                                    ] as $id => [$label, $value])
                                        @if(!empty($value))
                                            <div class="bank-row">
                                                <span class="lbl">{{ $label }}</span>
                                                <span class="val" id="{{ $id }}">{{ $value }}</span>
                                                <button type="button" class="btn btn-outline-primary btn-sm copy-btn"
                                                        data-copy-target="#{{ $id }}">Copy</button>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    @endif
                    <div class="pay-note mt-3">
                        <b><i class="bi bi-info-circle me-1"></i> Payment Instructions</b>
                        <ol class="mb-0 mt-2 ps-3">
                            <li>Please pay the exact amount as mentioned above.</li>
                            <li>After successful payment, click <b>“I Have Made the Payment”</b> and upload your transaction/reference number and payment proof.</li>
                            <li>Your payment will be verified by the administrator.</li>
                        </ol>
                    </div>
                    <div class="alert alert-warning py-2 mt-3 mb-0 small">
                        <i class="bi bi-exclamation-triangle-fill me-1"></i>
                        Your payment is not automatically verified. Submit proof for administrator verification.
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light" data-pay-back>Back</button>
                    <button type="button" class="btn btn-gradient" data-pay-next>I Have Made the Payment <i class="bi bi-arrow-right ms-1"></i></button>
                </div>
            </div>
            {{-- ============ STEP 3: EXISTING FORM ============ --}}
            <div class="pay-step d-none" data-step="3">
                <div class="modal-header border-0 pb-0">
                    <div>
                        <h5 class="modal-title fw-bold">Add Rent Payment</h5>
                        <small class="text-secondary">Add payment against your rent request.</small>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="outstanding-box mb-3">
                        <span>Outstanding Amount</span>
                        <strong id="outstandingAmount">₹0.00</strong>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Rent Month</label>
                            <div class="d-flex gap-2">
                                @php
                                    $currentYear = now()->year;
                                    $months = [1=>'January',2=>'February',3=>'March',4=>'April',5=>'May',6=>'June',
                                               7=>'July',8=>'August',9=>'September',10=>'October',11=>'November',12=>'December'];
                                @endphp
                                <select name="collection_year" id="edit_collection_year" class="form-select" required disabled>
                                    @for($year = $currentYear + 1; $year >= $currentYear - 5; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                                <select name="collection_month" id="edit_collection_month" class="form-select" required disabled>
                                    @foreach($months as $num => $name)
                                        <option value="{{ $num }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="payDate">Payment Date *</label>
                            <input id="payDate" name="payment_date" type="date" class="form-control" value="{{ now()->format('Y-m-d') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="payAmount">Amount Paid *</label>
                            <input id="payAmount" name="paid_amount" type="number" step="0.01" min="0.01" class="form-control" placeholder="Enter amount" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="payMode">Payment Mode *</label>
                            <select id="payMode" name="payment_mode" class="form-select" required>
                                <option value="">Select</option>
                                <option value="UPI">UPI</option>
                                <option value="Bank Transfer">Bank Transfer</option>
                                <option value="Cash">Cash</option>
                                <option value="Cheque">Cheque</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="payRef">Transaction / UTR / Reference Number</label>
                            <input id="payRef" name="reference_number" class="form-control" placeholder="Enter reference number">
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="payProof">Payment Proof / Screenshot *</label>
                            <input id="payProof" name="receipt" type="file" class="form-control" accept=".jpg,.jpeg,.png,.pdf">
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="payRemarks">Remarks</label>
                            <textarea id="payRemarks" name="remarks" rows="3" class="form-control" placeholder="Optional remarks"></textarea>
                        </div>
                    </div>
                    <div class="pay-note mt-3">
                        <i class="bi bi-lock-fill me-2"></i>
                        <span><b>Payment submission:</b> Your payment will be submitted for administrator verification.
                        If the payment is rejected, you may submit the payment again.</span>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light" data-pay-back>Back</button>
                    <button type="submit" class="btn btn-gradient" id="submitPaymentBtn">Submit Payment</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="paymentHistoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title mb-1">Payment History</h5>
                    <small class="text-secondary" id="historyMonth"></small>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="historyLoading" class="text-center py-4">
                    <div class="spinner-border spinner-border-sm me-2"></div>
                    Loading payment history...
                </div>
                <div id="historyEmpty" class="pay-empty d-none">
                    <i class="bi bi-receipt fs-3 d-block mb-1"></i>
                    No payment history found.
                </div>
                <div id="historyContent" class="d-none">
                    <div class="row g-2 mb-3">
                        <div class="col-6 col-md-3">
                            <div class="pay-detail">
                                <span>Total Due</span>
                                <strong id="historyTotalDue">₹0.00</strong>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="pay-detail">
                                <span>Paid</span>
                                <strong class="up" id="historyPaid">₹0.00</strong>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="pay-detail">
                                <span>Pending</span>
                                <strong id="historyPending">₹0.00</strong>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="pay-detail">
                                <span>Outstanding</span>
                                <strong class="down" id="historyOutstanding">₹0.00</strong>
                            </div>
                        </div>
                    </div>
                    <div id="paymentHistoryList"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Open modal
    const paymentModalEl = document.getElementById('paymentModal');
    const MONTHS = ['January','February','March','April','May','June','July','August','September','October','November','December'];
    document.addEventListener('click', function (e) {
        const btn = e.target.closest('.js-pay-btn');
        if (!btn) return;
        const d = btn.dataset;
        document.getElementById('edit_collection_year').value  = d.year;
        document.getElementById('edit_collection_month').value = d.month;
        fillPaymentSummary({
            collectionId: d.id,
            month: MONTHS[Number(d.month) - 1],
            year: d.year,
            rent: d.rent,
            dueDate: d.due,
            outstanding: d.outstanding
        });
        bootstrap.Modal.getOrCreateInstance(paymentModalEl).show();
    });
    // Keep the right tab open after pagination (#requests / #completed)
    if (location.hash === '#completed') {
        bootstrap.Tab.getOrCreateInstance(document.getElementById('tab-completed')).show();
    }
    function buildFormData(form) {
        const fd = new FormData(form);
        // disabled fields are skipped by FormData, so add them manually
        fd.set('collection_year',  document.getElementById('edit_collection_year').value);
        fd.set('collection_month', document.getElementById('edit_collection_month').value);
        return fd;
    }
    // Submit payment
    document.getElementById('rentForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const form = this;
        const submitBtn = document.getElementById('submitPaymentBtn');
        const originalText = submitBtn.innerHTML;
        if (!document.getElementById('payment_collection_id').value) {
            alert('Payment request not found.');
            return;
        }
        if (!document.getElementById('payAmount').value || Number(document.getElementById('payAmount').value) <= 0) {
            alert('Please enter a valid payment amount.');
            return;
        }
        if (!document.getElementById('payMode').value) {
            alert('Please select payment mode.');
            return;
        }
        if (!document.getElementById('payProof').files.length) {
            alert('Please upload payment proof.');
            return;
        }
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Submitting...';
        form.classList.add('payment-loading');
        fetch(form.action, {
            method: 'POST',
            body: buildFormData(form),
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(async response => {
            let data;
            try {
                data = await response.json();
            } catch (error) {
                throw {
                    status: response.status,
                    data: {
                        message: 'Invalid server response.'
                    }
                };
            }
            if (!response.ok) {
                throw {
                    status: response.status,
                    data: data
                };
            }
            return data;
        })
        .then(data => {
            if (data.status) {
                bootstrap.Modal.getInstance(paymentModalEl)?.hide();
                alert(data.message || 'Payment submitted successfully.');
                window.location.reload();
            } else {
                alert(data.message || 'Unable to submit payment.');
            }
        })
        .catch(error => {
            if (error.status === 422 && error.data?.errors) {
                alert(Object.values(error.data.errors).flat().join('\n'));
            } else if (error.status === 401) {
                alert(error.data?.message || 'Your tenant session has expired. Please login again.');
                window.location.reload();
            } else if (error.data?.message) {
                alert(error.data.message);
            } else {
                alert('Something went wrong. Please try again.');
            }
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
            form.classList.remove('payment-loading');
        });
    });
    (function () {
        const modalEl = document.getElementById('paymentModal');
        const dialog  = document.getElementById('payDialog');
        const steps   = modalEl.querySelectorAll('.pay-step');
        let method = null; // 'online' | 'offline'
        function goTo(n) {
            steps.forEach(s => s.classList.toggle('d-none', s.dataset.step != n));
            dialog.classList.toggle('pay-wide', n == 2);
        }
        // Step 1: pick method
        modalEl.querySelectorAll('.pay-option').forEach(btn => {
            btn.addEventListener('click', () => {
                method = btn.dataset.method;
                if (method === 'online') {
                    goTo(2);
                } else {
                    goTo(3);
                }
            });
        });
        // Step 2 -> 3
        modalEl.querySelector('[data-pay-next]').addEventListener('click', () => {
            document.getElementById('payMode').value = 'UPI'; // sensible default for online
            goTo(3);
        });
        // Back from step 2 -> 1, from step 3 -> 2 (online) or 1 (offline)
        modalEl.querySelectorAll('[data-pay-back]').forEach(btn => {
            btn.addEventListener('click', () => {
                const current = btn.closest('.pay-step').dataset.step;
                goTo(current == 3 && method === 'online' ? 2 : 1);
            });
        });
        // Always start at step 1 when the modal opens
        modalEl.addEventListener('show.bs.modal', () => { method = null; goTo(1); });
        // Copy buttons
        modalEl.querySelectorAll('.copy-btn').forEach(btn => {
            btn.addEventListener('click', async () => {
                const el = document.querySelector(btn.dataset.copyTarget);
                const text = (el.value ?? el.textContent).trim();
                try { await navigator.clipboard.writeText(text); } catch (e) {}
                const old = btn.textContent;
                btn.textContent = 'Copied';
                setTimeout(() => btn.textContent = old, 1200);
            });
        });
        // disabled selects are NOT submitted by the browser, so enable them just before submit
        document.getElementById('rentForm').addEventListener('submit', () => {
            ['edit_collection_year', 'edit_collection_month'].forEach(id => {
                document.getElementById(id).disabled = false;
            });
        });
        // Call this from wherever you currently open the modal
        window.fillPaymentSummary = function ({ collectionId, month, year, rent, dueDate, outstanding }) {
            const inr = v => '₹' + Number(v).toLocaleString('en-IN');
            // alert('fillPaymentSummary called with: ' + JSON.stringify({ collectionId, month, year, rent, dueDate, outstanding }));
            document.getElementById('payment_collection_id').value = collectionId;
            document.getElementById('sumMonth').textContent = month + ' ' + year;
            document.getElementById('sumRent').textContent  = inr(rent);
            document.getElementById('sumDue').textContent   = dueDate;
            document.getElementById('sumTotal').textContent = inr(outstanding);
            document.getElementById('outstandingAmount').textContent = '₹' + Number(outstanding).toFixed(2);
            document.getElementById('payAmount').value = outstanding;
            // const upi = document.getElementById('upiId').value;
            // document.getElementById('openUpiApp').href =
            //     `upi://pay?pa=${encodeURIComponent(upi)}&am=${outstanding}&cu=INR&tn=${encodeURIComponent('Rent ' + month + ' ' + year)}`;
            const upiEl = document.getElementById('upiId');
            const upiBtn = document.getElementById('openUpiApp');
            if (upiEl && upiBtn) {
                const params = new URLSearchParams({
                    pa: upiEl.value.trim(),
                    pn: upiBtn.dataset.payee || '',
                    am: Number(outstanding).toFixed(2),
                    cu: 'INR',
                    tn: `Rent ${month} ${year}`
                });
                upiBtn.href = 'upi://pay?' + params.toString();
            }
        };
    })();
</script>
<script>
    document.addEventListener('click', function(e) {
    const btn = e.target.closest('.js-payment-history');
    if (!btn) return;
    loadPaymentHistory(btn.dataset.id);
});
function loadPaymentHistory(collectionId) {
    const modalEl = document.getElementById('paymentHistoryModal');
    const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
    const loading = document.getElementById('historyLoading');
    const empty = document.getElementById('historyEmpty');
    const content = document.getElementById('historyContent');
    const list = document.getElementById('paymentHistoryList');
    loading.classList.remove('d-none');
    empty.classList.add('d-none');
    content.classList.add('d-none');
    list.innerHTML = '';
    modal.show();
    fetch("{{ url('/rms/my-payments') }}/" + collectionId + "/history", {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(async response => {
        const data = await response.json();
        if (!response.ok) {
            throw {
                status: response.status,
                data: data
            };
        }
        return data;
    })
    .then(data => {
        loading.classList.add('d-none');
        if (!data.status || !data.payments || !data.payments.length) {
            empty.classList.remove('d-none');
            return;
        }
        content.classList.remove('d-none');
        let approved = 0;
        let pending = 0;
        data.payments.forEach(payment => {
            const amount = Number(payment.payment_amount || 0);
            if (Number(payment.approval_status) === 1) {
                approved += amount;
            }
            if (Number(payment.approval_status) === 0) {
                pending += amount;
            }
        });
        const totalDue = Number(data.collection?.gross_due || 0);
        const penalty = Number(data.collection?.penalty || 0);
        const outstanding = Number(data.collection?.outstanding || 0);

        document.getElementById('historyTotalDue').textContent = money(totalDue);
        document.getElementById('historyPaid').textContent = money(approved);
        document.getElementById('historyPending').textContent = money(pending);
        document.getElementById('historyOutstanding').textContent = money(outstanding);
        document.getElementById('paymentHistoryList').innerHTML = data.payments.map((payment, index) => {
            return paymentHistoryItem(payment, index);
        }).join('');
    })
    .catch(error => {
        loading.classList.add('d-none');
        if (error.status === 401) {
            alert(error.data?.message || 'Your session has expired.');
            window.location.reload();
            return;
        }
        list.innerHTML = '<div class="alert alert-danger mb-0">Unable to load payment history.</div>';
        content.classList.remove('d-none');
    });
}
function money(value) {
    return '₹' + Number(value || 0).toLocaleString('en-IN', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
}
function paymentHistoryItem(payment, index) {
    const status = Number(payment.approval_status);
    let statusText = 'Pending Approval';
    let statusClass = 'bg-warning text-dark';
    if (status === 1) {
        statusText = 'Approved';
        statusClass = 'bg-success';
    } else if (status === 2) {
        statusText = 'Rejected';
        statusClass = 'bg-danger';
    }
    const paymentDate = payment.payment_date
        ? formatHistoryDate(payment.payment_date)
        : '-';
    const createdDate = payment.created_at
        ? formatHistoryDate(payment.created_at)
        : '-';
    let proofHtml = '';
    if (payment.payment_proof) {
        proofHtml = `
            <a href="/${payment.payment_proof}" target="_blank" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-file-earmark-text me-1"></i>View Proof
            </a>
        `;
    }
    let rejectionHtml = '';
    if (status === 2 && payment.rejection_reason) {
        rejectionHtml = `
            <div class="small text-danger mt-2">
                <strong>Rejection Reason:</strong> ${escapeHtml(payment.rejection_reason)}
            </div>
        `;
    }
    return `
        <div class="border rounded-3 p-3 mb-2">
            <div class="d-flex justify-content-between align-items-start gap-2">
                <div>
                    <div class="fw-semibold">
                        Payment #${payment.id}
                    </div>
                    <small class="text-secondary">
                        Payment Date: ${paymentDate}
                    </small>
                </div>
                <span class="badge ${statusClass}">
                    ${statusText}
                </span>
            </div>
            <div class="row g-2 mt-2">
                <div class="col-6 col-md-3">
                    <div class="pay-detail">
                        <span>Amount</span>
                        <strong>${money(payment.payment_amount)}</strong>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="pay-detail">
                        <span>Payment Mode</span>
                        <strong>${escapeHtml(payment.payment_mode || '-')}</strong>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="pay-detail">
                        <span>Reference</span>
                        <strong class="text-break">${escapeHtml(payment.reference_number || '-')}</strong>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="pay-detail">
                        <span>Submitted</span>
                        <strong>${createdDate}</strong>
                    </div>
                </div>
            </div>
            ${payment.remarks ? `
                <div class="small text-secondary mt-2">
                    <strong>Remarks:</strong> ${escapeHtml(payment.remarks)}
                </div>
            ` : ''}
            ${rejectionHtml}
            ${proofHtml ? `
                <div class="text-end mt-3">
                    ${proofHtml}
                </div>
            ` : ''}
        </div>
    `;
}
function formatHistoryDate(date) {
    const d = new Date(date);
    if (isNaN(d.getTime())) {
        return date;
    }
    return d.toLocaleDateString('en-IN', {
        day: '2-digit',
        month: 'short',
        year: 'numeric'
    });
}
function escapeHtml(value) {
    return String(value ?? '')
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#039;');
}
</script>
@endsection
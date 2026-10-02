@extends('rms.layouts.app')
@section('content')
<style>
    .payment-tabs {
        display: flex;
        gap: 4px;
        border-bottom: 1px solid #dfe7ed;
        margin-top: 15px;
    }
    .payment-tab {
        border: 0;
        background: transparent;
        padding: 10px 16px;
        font-size: 11px;
        font-weight: 600;
        color: #718096;
        cursor: pointer;
        border-bottom: 2px solid transparent;
    }
    .payment-tab:hover {
        color: #245b89;
    }
    .payment-tab.active {
        color: #245b89;
        border-bottom: 2px solid #245b89;
    }
    .payment-tab-content {
        display: none;
        padding-top: 15px;
    }
    .payment-tab-content.active {
        display: block;
    }
    .payment-request-card {
        border: 1px solid #e4eaf0;
        border-radius: 6px;
        padding: 14px;
        margin-bottom: 10px;
        background: #fff;
    }
    .payment-request-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
    }
    .payment-request-month {
        font-weight: 600;
        color: #245b89;
        font-size: 12px;
    }
    .payment-request-subtitle {
        font-size: 9px;
        color: #8190a0;
        margin-top: 3px;
    }
    .payment-request-details {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 10px;
        margin-top: 12px;
    }
    .payment-request-detail {
        padding: 9px;
        border: 1px solid #edf1f4;
        border-radius: 5px;
        background: #fafcfd;
    }
    .payment-request-detail span {
        display: block;
        font-size: 9px;
        color: #8190a0;
    }
    .payment-request-detail strong {
        display: block;
        margin-top: 4px;
        font-size: 12px;
        color: #26384a;
    }
    .payment-request-actions {
        margin-top: 12px;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 8px;
    }
    .payment-request-actions .btn {
        font-size: 10px;
        padding: 7px 12px;
    }
    .status-tag {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 9px;
        font-weight: 600;
        white-space: nowrap;
    }
    .status-pending {
        background: #fff3cd;
        color: #856404;
    }
    .status-request {
        background: #cfe2ff;
        color: #084298;
    }
    .status-partial {
        background: #cff4fc;
        color: #055160;
    }
    .status-paid {
        background: #d1e7dd;
        color: #0f5132;
    }
    .status-overdue {
        background: #f8d7da;
        color: #842029;
    }
    .status-cancelled {
        background: #e2e3e5;
        color: #41464b;
    }
    .payment-empty {
        padding: 30px 15px;
        text-align: center;
        border: 1px dashed #d7e0e8;
        border-radius: 6px;
        color: #8190a0;
        font-size: 11px;
        background: #fafcfd;
    }
    .payment-note {
        margin-top: 15px;
        padding: 10px 12px;
        background: #fffaf0;
        border: 1px solid #f0dfae;
        border-left: 3px solid #e4aa22;
        border-radius: 5px;
        color: #627487;
        font-size: 10px;
        line-height: 1.5;
    }
    /*
     * MODAL
     */
    .payment-modal {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(15, 23, 42, 0.45);
        align-items: center;
        justify-content: center;
        z-index: 9999;
        padding: 15px;
    }
    .payment-modal.show {
        display: flex;
    }
    .payment-modal-box {
        width: min(560px, 95vw);
        max-height: 92vh;
        overflow-y: auto;
        background: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.18);
    }
    .payment-modal-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 15px;
        margin-bottom: 15px;
    }
    .payment-modal-header h3 {
        margin: 0;
        color: #174d80;
        font-size: 15px;
    }
    .payment-modal-sub {
        font-size: 10px;
        color: #718096;
        margin: 4px 0 0;
    }
    .payment-modal-close {
        border: 0;
        background: transparent;
        font-size: 22px;
        line-height: 20px;
        color: #718096;
        cursor: pointer;
    }
    .payment-modal-close:hover {
        color: #222;
    }
    .payment-form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }
    .payment-form-group {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }
    .payment-form-group.full {
        grid-column: 1 / -1;
    }
    .payment-form-group label {
        font-size: 9px;
        font-weight: 600;
        color: #52687d;
    }
    .payment-form-group input,
    .payment-form-group select,
    .payment-form-group textarea {
        width: 100%;
        box-sizing: border-box;
        border: 1px solid #d7e0e8;
        border-radius: 5px;
        padding: 8px 9px;
        font-size: 11px;
        background: #fff;
    }
    .payment-form-group input:focus,
    .payment-form-group select:focus,
    .payment-form-group textarea:focus {
        outline: none;
        border-color: #6da5d5;
    }
    .payment-form-group textarea {
        min-height: 70px;
        resize: vertical;
    }
    .payment-month-row {
        display: flex;
        gap: 8px;
    }
    .payment-month-row select {
        flex: 1;
    }
    .outstanding-box {
        padding: 10px 12px;
        border-radius: 5px;
        background: #f5f9fc;
        border: 1px solid #dfe8ef;
        margin-bottom: 12px;
    }
    .outstanding-box span {
        display: block;
        font-size: 9px;
        color: #718096;
    }
    .outstanding-box strong {
        display: block;
        font-size: 17px;
        color: #245b89;
        margin-top: 3px;
    }
    .payment-lock-box {
        margin-top: 12px;
        padding: 10px 12px;
        background: #f6f9fb;
        border: 1px solid #dfe7ed;
        border-radius: 5px;
        color: #627487;
        font-size: 9px;
        line-height: 1.5;
    }
    .payment-modal-actions {
        display: flex;
        justify-content: flex-end;
        gap: 8px;
        margin-top: 15px;
    }
    .payment-modal-actions .btn {
        font-size: 10px;
        padding: 8px 13px;
    }
    .payment-loading {
        opacity: 0.6;
        pointer-events: none;
    }
    /*
     * RESPONSIVE
     */
    @media(max-width: 700px) {
        .payment-request-details {
            grid-template-columns: 1fr 1fr;
        }
        .payment-form-grid {
            grid-template-columns: 1fr;
        }
        .payment-form-group.full {
            grid-column: auto;
        }
    }
    @media(max-width: 480px) {
        .payment-tabs {
            overflow-x: auto;
        }
        .payment-tab {
            white-space: nowrap;
        }
        .payment-request-header {
            align-items: flex-start;
        }
        .payment-request-details {
            grid-template-columns: 1fr;
        }
    }
</style>
@php
    $statusLabels = [
        0 => 'Pending Request',
        1 => 'Request Sent',
        2 => 'Partially Paid',
        3 => 'Fully Paid',
        4 => 'Overdue',
        5 => 'Cancelled',
    ];
@endphp
<section id="payments" class="screen active">
    <div class="card page-card">
        {{-- ===================================================== --}}
        {{-- PAGE HEADER --}}
        {{-- ===================================================== --}}
        <div class="page-title">
            My Payments
        </div>
        <div class="page-sub">
            View your rent payment requests, outstanding amounts and completed payments.
        </div>
        {{-- ===================================================== --}}
        {{-- TABS --}}
        {{-- ===================================================== --}}
        <div class="payment-tabs">
            <button type="button"
                    class="payment-tab active"
                    onclick="showPaymentTab('requests', this)">
                Payment Requests
                @if($requestLists->total() > 0)
                    ({{ $requestLists->total() }})
                @endif
            </button>
            <button type="button"
                    class="payment-tab"
                    onclick="showPaymentTab('completed', this)">
                Completed
                @if($completedLists->total() > 0)
                    ({{ $completedLists->total() }})
                @endif
            </button>
        </div>
        {{-- ===================================================== --}}
        {{-- PAYMENT REQUESTS TAB --}}
        {{-- ===================================================== --}}
        <div id="paymentTabRequests"
             class="payment-tab-content active">
            @forelse($requestLists as $list)
                @php
                    $status = (int) $list->status;
                    $statusClass = match($status) {
                        0 => 'status-pending',
                        1 => 'status-request',
                        2 => 'status-partial',
                        4 => 'status-overdue',
                        5 => 'status-cancelled',
                        default => '',
                    };
                    $outstanding = max(
                        0,
                        (float) $list->gross_due -
                        (float) $list->paid_amount
                    );
                @endphp
                <div class="payment-request-card">
                    {{-- HEADER --}}
                    <div class="payment-request-header">
                        <div>
                            <div class="payment-request-month">
                                {{ date(
                                    'F',
                                    mktime(
                                        0,
                                        0,
                                        0,
                                        $list->collection_month,
                                        1
                                    )
                                ) }}
                                {{ $list->collection_year }}
                            </div>
                            <div class="payment-request-subtitle">
                                Request created:
                                {{ date('d M, Y', strtotime($list->created_at)) }}
                            </div>
                        </div>
                        <span class="status-tag {{ $statusClass }}">
                            {{ $statusLabels[$status] ?? 'Unknown' }}
                        </span>
                    </div>
                    {{-- DETAILS --}}
                    <div class="payment-request-details">
                        <div class="payment-request-detail">
                            <span>Total Due</span>
                            <strong>
                                ₹{{ number_format((float) $list->gross_due, 2) }}
                            </strong>
                        </div>
                        <div class="payment-request-detail">
                            <span>Paid</span>
                            <strong>
                                ₹{{ number_format((float) $list->paid_amount, 2) }}
                            </strong>
                        </div>
                        <div class="payment-request-detail">
                            <span>Outstanding</span>
                            <strong>
                                ₹{{ number_format($outstanding, 2) }}
                            </strong>
                        </div>
                        <div class="payment-request-detail">
                            <span>Payment Status</span>
                            <strong>
                                {{ $statusLabels[$status] ?? '-' }}
                            </strong>
                        </div>
                    </div>
                    {{-- ACTIONS --}}
                    @if(in_array($status, [0, 1, 2, 4]) && $outstanding > 0)
                        <div class="payment-request-actions">
                            <button type="button"
                                    class="btn primary"
                                    onclick="openPayment(
                                        {{ $list->id }},
                                        {{ $list->collection_year }},
                                        {{ $list->collection_month }},
                                        {{ $outstanding }}
                                    )">
                                + Add Payment
                            </button>
                        </div>
                    @elseif($status === 5)
                        <div class="payment-request-actions">
                            <span style="
                                font-size:9px;
                                color:#842029;
                            ">
                                This payment request has been cancelled.
                            </span>
                        </div>
                    @endif
                </div>
            @empty
                <div class="payment-empty">
                    No payment requests found.
                </div>
            @endforelse
            {{-- ================================================= --}}
            {{-- REQUEST PAGINATION --}}
            {{-- ================================================= --}}
            @if($requestLists->hasPages())
                <div class="custom-pagination">
                    {{-- PREVIOUS --}}
                    @if($requestLists->onFirstPage())
                        <span class="page-btn disabled">
                            ‹
                        </span>
                    @else
                        <a href="{{ $requestLists->previousPageUrl() }}"
                           class="page-btn">
                            ‹
                        </a>
                    @endif
                    {{-- PAGE NUMBERS --}}
                    @foreach(
                        $requestLists->getUrlRange(
                            max(
                                1,
                                $requestLists->currentPage() - 2
                            ),
                            min(
                                $requestLists->lastPage(),
                                $requestLists->currentPage() + 2
                            )
                        ) as $page => $url
                    )
                        @if($page == $requestLists->currentPage())
                            <span class="page-btn active">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                               class="page-btn">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                    {{-- NEXT --}}
                    @if($requestLists->hasMorePages())
                        <a href="{{ $requestLists->nextPageUrl() }}"
                           class="page-btn">
                            ›
                        </a>
                    @else
                        <span class="page-btn disabled">
                            ›
                        </span>
                    @endif
                </div>
            @endif
        </div>
        {{-- ===================================================== --}}
        {{-- COMPLETED TAB --}}
        {{-- ===================================================== --}}
        <div id="paymentTabCompleted"
             class="payment-tab-content">
            @forelse($completedLists as $list)
                <div class="payment-request-card">
                    {{-- HEADER --}}
                    <div class="payment-request-header">
                        <div>
                            <div class="payment-request-month">
                                {{ date(
                                    'F',
                                    mktime(
                                        0,
                                        0,
                                        0,
                                        $list->collection_month,
                                        1
                                    )
                                ) }}
                                {{ $list->collection_year }}
                            </div>
                            <div class="payment-request-subtitle">
                                Payment completed:
                                {{ $list->updated_at
                                    ? date(
                                        'd M, Y',
                                        strtotime($list->updated_at)
                                    )
                                    : '-'
                                }}
                            </div>
                        </div>
                        <span class="status-tag status-paid">
                            Fully Paid
                        </span>
                    </div>
                    {{-- DETAILS --}}
                    <div class="payment-request-details">
                        <div class="payment-request-detail">
                            <span>Total Amount</span>
                            <strong>
                                ₹{{ number_format((float) $list->gross_due, 2) }}
                            </strong>
                        </div>
                        <div class="payment-request-detail">
                            <span>Paid Amount</span>
                            <strong>
                                ₹{{ number_format((float) $list->paid_amount, 2) }}
                            </strong>
                        </div>
                        <div class="payment-request-detail">
                            <span>Payment Mode</span>
                            <strong>
                                {{ $list->payment_mode ?: '-' }}
                            </strong>
                        </div>
                        <div class="payment-request-detail">
                            <span>Reference</span>
                            <strong>
                                {{ $list->reference_number ?: '-' }}
                            </strong>
                        </div>
                    </div>
                    {{-- RECEIPT --}}
                    @if(!empty($list->receipt))
                        <div class="payment-request-actions">
                            <a href="{{ $list->receipt }}"
                               target="_blank"
                               class="btn">
                                View Receipt
                            </a>
                        </div>
                    @endif
                </div>
            @empty
                <div class="payment-empty">
                    No completed payments found.
                </div>
            @endforelse
            {{-- ================================================= --}}
            {{-- COMPLETED PAGINATION --}}
            {{-- ================================================= --}}
            @if($completedLists->hasPages())
                <div class="custom-pagination">
                    {{-- PREVIOUS --}}
                    @if($completedLists->onFirstPage())
                        <span class="page-btn disabled">
                            ‹
                        </span>
                    @else
                        <a href="{{ $completedLists->previousPageUrl() }}"
                           class="page-btn">
                            ‹
                        </a>
                    @endif
                    {{-- PAGE NUMBERS --}}
                    @foreach(
                        $completedLists->getUrlRange(
                            max(
                                1,
                                $completedLists->currentPage() - 2
                            ),
                            min(
                                $completedLists->lastPage(),
                                $completedLists->currentPage() + 2
                            )
                        ) as $page => $url
                    )
                        @if($page == $completedLists->currentPage())
                            <span class="page-btn active">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                               class="page-btn">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                    {{-- NEXT --}}
                    @if($completedLists->hasMorePages())
                        <a href="{{ $completedLists->nextPageUrl() }}"
                           class="page-btn">
                            ›
                        </a>
                    @else
                        <span class="page-btn disabled">
                            ›
                        </span>
                    @endif
                </div>
            @endif
        </div>
        {{-- ===================================================== --}}
        {{-- VERIFICATION NOTE --}}
        {{-- ===================================================== --}}
        <div class="payment-note">
            <b>Payment verification:</b>
            Submitting a payment does not automatically mean the payment
            is approved. The property administrator must verify the
            submitted payment and proof.
        </div>
    </div>
</section>
{{-- ============================================================= --}}
{{-- ADD PAYMENT MODAL --}}
{{-- ============================================================= --}}
<div class="payment-modal"
     id="paymentModal">
    <form method="POST"
          action="{{ route('rms.save-rent') }}"
          enctype="multipart/form-data"
          id="rentForm">
        @csrf
        {{-- Existing rent collection request --}}
        <input type="hidden"
               name="collection_id"
               id="payment_collection_id">
        <div class="payment-modal-box">
            {{-- HEADER --}}
            <div class="payment-modal-header">
                <div>
                    <h3>
                        Add Rent Payment
                    </h3>
                    <p class="payment-modal-sub">
                        Add payment against your rent request.
                    </p>
                </div>
                <button type="button"
                        class="payment-modal-close"
                        onclick="closePayment()">
                    ×
                </button>
            </div>
            {{-- OUTSTANDING --}}
            <div class="outstanding-box">
                <span>
                    Outstanding Amount
                </span>
                <strong id="outstandingAmount">
                    ₹0.00
                </strong>
            </div>
            {{-- FORM --}}
            <div class="payment-form-grid">
                {{-- RENT MONTH --}}
                <div class="payment-form-group">
                    <label>
                        Rent Month
                    </label>
                    <div class="payment-month-row">
                        <select name="collection_year"
                                id="edit_collection_year"
                                required disabled>
                            @php
                                $currentYear = now()->year;
                                $startYear = $currentYear - 5;
                                $endYear = $currentYear + 1;
                            @endphp
                            @for(
                                $year = $endYear;
                                $year >= $startYear;
                                $year--
                            )
                                <option value="{{ $year }}">
                                    {{ $year }}
                                </option>
                            @endfor
                        </select>
                        <select name="collection_month"
                                id="edit_collection_month"
                                required disabled>
                            @php
                                $months = [
                                    1 => 'January',
                                    2 => 'February',
                                    3 => 'March',
                                    4 => 'April',
                                    5 => 'May',
                                    6 => 'June',
                                    7 => 'July',
                                    8 => 'August',
                                    9 => 'September',
                                    10 => 'October',
                                    11 => 'November',
                                    12 => 'December'
                                ];
                            @endphp
                            @foreach($months as $num => $name)
                                <option value="{{ $num }}">
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{-- PAYMENT DATE --}}
                <div class="payment-form-group">
                    <label>
                        Payment Date *
                    </label>
                    <input id="payDate"
                           name="payment_date"
                           type="date"
                           value="{{ now()->format('Y-m-d') }}"
                           readonly>
                </div>
                {{-- AMOUNT --}}
                <div class="payment-form-group">
                    <label>
                        Amount Paid *
                    </label>
                    <input id="payAmount"
                           name="paid_amount"
                           type="number"
                           step="0.01"
                           min="0.01"
                           placeholder="Enter amount"
                           required>
                </div>
                {{-- PAYMENT MODE --}}
                <div class="payment-form-group">
                    <label>
                        Payment Mode *
                    </label>
                    <select id="payMode"
                            name="payment_mode"
                            required>
                        <option value="">
                            Select
                        </option>
                        <option value="UPI">
                            UPI
                        </option>
                        <option value="Bank Transfer">
                            Bank Transfer
                        </option>
                        <option value="Cash">
                            Cash
                        </option>
                        <option value="Cheque">
                            Cheque
                        </option>
                        <option value="Other">
                            Other
                        </option>
                    </select>
                </div>
                {{-- REFERENCE --}}
                <div class="payment-form-group full">
                    <label>
                        Transaction / UTR / Reference Number
                    </label>
                    <input id="payRef"
                           name="reference_number"
                           placeholder="Enter reference number">
                </div>
                {{-- RECEIPT --}}
                <div class="payment-form-group full">
                    <label>
                        Payment Proof / Screenshot *
                    </label>
                    <input id="payProof"
                           name="receipt"
                           type="file"
                           accept=".jpg,.jpeg,.png,.pdf">
                </div>
                {{-- REMARKS --}}
                <div class="payment-form-group full">
                    <label>
                        Remarks
                    </label>
                    <textarea id="payRemarks"
                              name="remarks"
                              placeholder="Optional remarks"></textarea>
                </div>
            </div>
            {{-- LOCK INFO --}}
            <div class="payment-lock-box">
                🔒 <b>Payment submission:</b>
                Your payment will be submitted for administrator
                verification. If the payment is rejected, you may
                submit the payment again.
            </div>
            {{-- ACTIONS --}}
            <div class="payment-modal-actions">
                <button type="button"
                        class="btn"
                        onclick="closePayment()">
                    Cancel
                </button>
                <button type="submit"
                        class="btn primary"
                        id="submitPaymentBtn">
                    Submit Payment
                </button>
            </div>
        </div>
    </form>
</div>
<script>
    /*
     * ============================================================
     * TABS
     * ============================================================
     */
    function showPaymentTab(tab, button) {
        document
            .querySelectorAll('.payment-tab')
            .forEach(function (item) {
                item.classList.remove('active');
            });
        document
            .querySelectorAll('.payment-tab-content')
            .forEach(function (item) {
                item.classList.remove('active');
            });
        button.classList.add('active');
        if (tab === 'requests') {
            document
                .getElementById('paymentTabRequests')
                .classList.add('active');
        }
        if (tab === 'completed') {
            document
                .getElementById('paymentTabCompleted')
                .classList.add('active');
        }
    }
    /*
     * ============================================================
     * OPEN PAYMENT MODAL
     * ============================================================
     */
    function openPayment(
        collectionId,
        year,
        month,
        outstanding
    ) {
        document
            .getElementById('payment_collection_id')
            .value = collectionId;
        document
            .getElementById('edit_collection_year')
            .value = year;
        document
            .getElementById('edit_collection_month')
            .value = month;
        document
            .getElementById('payAmount')
            .value = '';
        // document
        //     .getElementById('payAmount')
        //     .max = outstanding;
        document
            .getElementById('outstandingAmount')
            .textContent =
                '₹' +
                Number(outstanding).toLocaleString(
                    'en-IN',
                    {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }
                );
        document
            .getElementById('paymentModal')
            .classList.add('show');
        document.body.style.overflow = 'hidden';
    }
    /*
     * ============================================================
     * CLOSE MODAL
     * ============================================================
     */
    function closePayment() {
        document
            .getElementById('paymentModal')
            .classList.remove('show');
        document.body.style.overflow = '';
    }
    /*
     * ============================================================
     * CLOSE WHEN CLICKING OUTSIDE MODAL
     * ============================================================
     */
    document
        .getElementById('paymentModal')
        .addEventListener('click', function (e) {
            if (e.target === this) {
                closePayment();
            }
        });
    /*
     * ============================================================
     * ESCAPE KEY
     * ============================================================
     */
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closePayment();
        }
    });
    /*
     * ============================================================
     * PREVENT OVER PAYMENT
     * ============================================================
     */
    // document
    //     .getElementById('payAmount')
    //     .addEventListener('input', function () {
    //         const max =
    //             parseFloat(this.max || 0);
    //         const value =
    //             parseFloat(this.value || 0);
    //         if (max > 0 && value > max) {
    //             this.value = max;
    //         }
    //     });
    /*
     * ============================================================
     * PAYMENT FORM SUBMIT
     * ============================================================
     */
    document
        .getElementById('rentForm')
        .addEventListener('submit', function (e) {
            e.preventDefault();
            const form = this;
            const submitBtn =
                document.getElementById('submitPaymentBtn');
            const formData =
                new FormData(form);
            submitBtn.disabled = true;
            submitBtn.textContent =
                'Submitting...';
            form.classList.add(
                'payment-loading'
            );
            fetch(
                form.action,
                {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                }
            )
            .then(async function (response) {
                let data;
                try {
                    data = await response.json();
                } catch (e) {
                    throw {
                        status: response.status,
                        data: {
                            message:
                                'Invalid server response.'
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
            .then(function (data) {
                if (data.status) {
                    closePayment();
                    window.location.reload();
                } else {
                    alert(
                        data.message ||
                        'Something went wrong.'
                    );
                }
            })
            .catch(function (err) {
                if (
                    err.status === 422 &&
                    err.data &&
                    err.data.errors
                ) {
                    const messages =
                        Object
                            .values(err.data.errors)
                            .flat()
                            .join('\n');
                    alert(messages);
                }
                else if (
                    err.data &&
                    err.data.message
                ) {
                    alert(err.data.message);
                }
                else {
                    alert(
                        'Something went wrong. Please try again.'
                    );
                }
            })
            .finally(function () {
                submitBtn.disabled = false;
                submitBtn.textContent =
                    'Submit Payment';
                form.classList.remove(
                    'payment-loading'
                );
            });
        });
</script>
@endsection
@foreach($plans as $plan)
@php
$payment_fees = $plan->monthly_price * 100;
$active_permissions = DB::table('tbl_plan_permission')
->where('plan_id', $plan->id)
->pluck('permission')
->toArray();
$activeModules = collect($active_permissions)
->map(fn($p) => explode('/', $p)[0])
->unique()
->toArray();
$sortedFeatures = $features->sortByDesc(function ($feature) use ($activeModules) {
return in_array(strtolower($feature->f_key), $activeModules);
});
@endphp
<div class="col-lg-4">
    <div class="plan-card">
        <div class="ribbon-wrap">
            <div class="ribbon">Become an Agent</div>
        </div>
        <h4>{{ $plan->title }}</h4>
        <h5 class="bill-text">Billed Monthly</h5>
        <p class="redss">
            
        </p>
        <div class="plan-price" data-discount="{{ $plan->discount }}" data-monthly="{{ $plan->monthly_price }}">
            ₹{{ $plan->monthly_price }}
            <span class="prc_per_month">/month</span>
        </div>
        <hr>
        <ul class="list-unstyled">
            @foreach($sortedFeatures as $feature)
            @php
            $isActive = in_array(strtolower($feature->f_key), $activeModules);
            @endphp
            <li class="mb-2">
                <i class="fa fa-{{ $isActive ? 'check text-success' : 'times text-danger' }}"></i>
                {{ $feature->title }}
            </li>
            @endforeach
        </ul>
        <form action="{{ route('upgrade-plan') }}" method="POST">
            @csrf
            <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
            <input type="hidden" name="razorpay_order_id" id="razorpay_order_id">
            <input type="hidden" name="razorpay_signature" id="razorpay_signature">
            <input type="hidden" id="order_id" value="">
            <input type="hidden" name="plan_id" value="{{ $plan->id }}">
            <input type="hidden" name="plan_type" class="plan-type" value="2">
            <input type="hidden" name="amount" class="razorpay-amount" value="{{ $payment_fees }}">
        
            <div class="str_bnt_area">
                <a href="javascript:void(0)" @if($active_agent_plan && $plan->monthly_price <= $active_agent_plan->monthly_price &&  \Carbon\Carbon::parse($agent->valid_upto)->isFuture()) onclick="downgradePlan('{{ $plan->title }}')" @else onclick="paynow(this)" @endif>
                    @if($have_any_plan == 2) Upgrade @else Sign Up @endif For {{ $plan->title }}
                </a>
            </div>
        </form>
    </div>
</div>
@endforeach
@foreach($cdb_plans as $c_plan)
@php
$payment_fees = $c_plan->monthly_price * 100;
$active_permissions = DB::table('cdb_plan_features')
->where([
'plan_id'=> $c_plan->id,
'agent_id'=> app('currentAgent')->id
])
->pluck('permission')
->toArray();
$activeCDBModules = collect($active_permissions)
->map(fn($p) => explode('/', $p)[0])
->unique()
->toArray();
$sortedFeatures = $c_feature->sortByDesc(function ($feature) use ($activeCDBModules) {
return in_array(strtolower($feature->path), $activeCDBModules);
});
@endphp
<style>
.ribbon {
    background: #1c5299;
}
</style>
<div class="col-lg-4">
    <div class="plan-card">
        <div class="ribbon-wrap">
            <div class="ribbon">Become a Customer</div>
        </div>
        <h4>{{ $c_plan->title }}</h4>
        <h5 class="bill-text">Billed Monthly</h5>
        <p class="redss">
            (Save Rs.{{ $c_plan->monthly_price*12 - $c_plan->yearly_price }}/ Year)
        </p>
        <div class="plan-price" data-discount="{{ $c_plan->discount }}" data-monthly="{{ $c_plan->monthly_price }}"
            data-quarterly="{{ $c_plan->monthly_price*3 }}"
            data-half_yearly="{{ $c_plan->monthly_price*6 }}"
            data-yearly="{{ $c_plan->monthly_price*12 }}">
            ₹{{ $c_plan->monthly_price }}
            <span class="prc_per_month">/month</span>
        </div>
        
        <hr>
        <ul class="list-unstyled">
            @foreach($sortedFeatures as $feature)
            @php
            $isActive = in_array(strtolower($feature->path), $activeCDBModules);
            @endphp
            <li class="mb-2">
                <i class="fa fa-{{ $isActive ? 'check text-success' : 'times text-danger' }}"></i>
                {{ $feature->title }}
            </li>
            @endforeach
        </ul>
        <form action="{{ route('upgrade-cdb-plan') }}" method="POST">
            @csrf
            <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
            <input type="hidden" name="razorpay_order_id" id="razorpay_order_id">
            <input type="hidden" name="razorpay_signature" id="razorpay_signature">
            <input type="hidden" id="order_id" value="">
            <input type="hidden" name="plan_id" value="{{ $c_plan->id }}">
            <input type="hidden" name="plan_type" class="plan-type" value="2">
            <input type="hidden" name="amount" class="razorpay-amount" value="{{ $payment_fees }}">
        
            <div class="str_bnt_area">
                 <a href="javascript:void(0)" @if($active_user_plan && $c_plan->monthly_price <= optional($active_user_plan)->monthly_price &&  \Carbon\Carbon::parse($user->valid_upto)->isFuture()) onclick="downgradePlan('{{ $c_plan->title }}')" @else onclick="paynow(this)" @endif>
                    @if($have_cdb_plan == 1) Upgrade @else Sign Up @endif For {{ $c_plan->title }}
                </a>
            </div>
        </form>
    </div>
</div>
@endforeach
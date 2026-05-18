@if(app('currentAgent')->id != 8)
<div class="ftr_content text-center " style="background-color:#000000;">
    @php
    $branding = DB::table('branding_setting')->select('logo', 'message')->where('user_id', 8)->first();
    @endphp
    <div class="lgo">
        @if($branding && $branding->logo)
        <a href="{{ url('/') }}"><img class="logo" src="{{ $branding->logo }}" alt="Logo" /></a>
        @endif
    </div>
    @if($branding)
    <div class="menu_ftrr text-light">
        {{ $branding->message }}
    </div>
    <div class="crt_arar mt-0">
        <button class="btn btn-danger">Get it now</button>
        <!-- <a href="javascript:void(0);" class="gt_it_nnw" data-toggle="modal" data-target="#sub_m_al_frms">Get it now</a> -->
    </div>
    @endif
</div>
@endif
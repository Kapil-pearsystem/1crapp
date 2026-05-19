@if(app('currentAgent')->id != 8)
<div class="ftr_content text-center " style="background-color:#000000;">
    @php
    $branding = DB::table('branding_setting')->select('*')->where('user_id', 8)->first();
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
        @if($branding && $branding->btn_enable == 1)
            <a href="{{ $branding->btn_link }}" @if($branding->btn_new_tab == 1) target="_blank" @endif><button class="btn " style="background-color:{{ $branding->btn_bg_color }}; color:{{ $branding->btn_text_color }};">{{ $branding->btn_title }}</button></a>
        @endif
    </div>
    @endif
</div>
@endif
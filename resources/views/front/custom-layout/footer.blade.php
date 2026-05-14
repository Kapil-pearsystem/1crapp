@php 
    use Illuminate\Support\Facades\DB;
    $f_menus = DB::table('tbl_custommenu')->where(['type'=> 2, 'parent_id'=> null])->where('created_by', app('currentAgent')->id)->get();
    $layouts = DB::table('tbl_customlayout')->where('created_by', app('currentAgent')->id)->first();
@endphp
<section class="ftr_new_other">
    <div class="container">
        <div class="ftr_content">
            <div class="lgo">
                @if($layouts && $layouts->logo)
                    <a href="{{ url('/') }}"><img class="logo" src="{{ $layouts->logo }}" alt="Logo" /></a>
                @endif
            </div>

            <div class="menu_ftrr">
                @foreach($f_menus as $fmenu)
                    <a href="{{ $fmenu->page_url }}"  @if($fmenu->open_new_tab == 1) target="_blank" @endif>{{ $fmenu->title }}</a>
                @endforeach
                <!-- <a href="javascript:void(0);">DMCA Policy</a>
                <a href="javascript:void(0);">Earnings Disclaimer</a>
                <a href="javascript:void(0);">Privacy Policy</a>
                <a href="javascript:void(0);">Terms & Conditions</a> -->
            </div>

            <div class="crt_arar mt-0 mb-4">
                @if($layouts && $layouts->copyright_text)
                    {{ $layouts->copyright_text }}
                @endif
            </div>
            @php 
            $branding = DB::table('branding_setting')->select('logo', 'message')->where('user_id', 8)->first();
            @endphp
            @if($branding)
            <div class="crt_arar">
                <img class="logo" src="{{ $branding->logo }}" alt="Logo" /> {{ $branding->message }}
            </div>
            @endif


        </div>
    </div>
</section>


{!! DB::table('adb_dashboard')
    ->where('created_by', app('currentAgent')->id)
    ->where('chatbot_code_enable', 1)
    ->value('chatbot_code') !!}
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js"></script>
<!--  -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script>
<script src="{{ url('home/js/menu_js.js')}}"></script>
<script src="{{ url('home/js/responsive.js')}}"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/echarts/5.2.2/echarts.min.js'></script>
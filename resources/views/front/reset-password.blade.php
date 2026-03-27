@include('front.layouts.header_new')


<body class="bg_whit"> <!--PEN HEADER--> <div class="container-fluid px-0">
    <div class="login-container">
    <div class="onboarding flu_lnth col-md-7 text-center">
    <div class="slide-content">
        <div class="medilss_areaaa">
        <div class="lgo_areaa"><img width="100" src="{{ url('') }}/img/lg_logo.png" alt="Logo" /></div>
        <h2 class="txt_hdns">Property Analysis, Simplified</h2>
        <embed src="{{ url('') }}/img/big_buck_bunny_720p_1mb.mp4">
        <div class="cnts_fildsss">
        <p><img src="{{ url('') }}/img/graph.png" alt="" /> Analyze any investment property in
            seconds</p>
            <p><img src="{{ url('') }}/img/cals.png" alt="" /> Calculate cash flow, profit, cap rates,
            ROI and dozens of other metrics</p>
        <p><img src="{{ url('') }}/img/price.png" alt="" /> Look up recent sales and rental comps
        </p>
        <p><img src="{{ url('') }}/img/serc.png" alt="" /> Compare properties and find the best real
            estate deals</p>
            </div>
    </div>
    </div>
    </div>
    <div class="login-form flu_lnth col-md-5 justify-content-center d-flex">
        <div class="medls_araeass">
            <div class="login-form-inner">
                <h3>Reset password</h3>

                <form action="{{route('reset_password')}}" method="post">
                    @csrf
                    <div class="forms_reass">
                        <p class="mr_txttx passd">An otp code has been sent to
                            <?php echo str_pad(substr($resetData['email'], 3), strlen($resetData['email']), '*', STR_PAD_LEFT);?>,
                            kindly
                            enter
                            thecode below to reset your password
                        </p>
                        <input type="hidden" value="<?=$resetData['token']; ?>" name="token" />
                        <div class="login-form-group" id="both_matchss">
                            <input type="text" placeholder="" maxlength="1" name="one[]" class="lg_frms" id=""
                                required="#" />
                            <input type="text" placeholder="" maxlength="1" name="one[]" class="lg_frms" id=""
                                required="#" />
                            <input type="text" placeholder="" maxlength="1" name="one[]" class="lg_frms" id=""
                                required="#" />
                            <input type="text" placeholder="" maxlength="1" name="one[]" class="lg_frms" id=""
                                required="#" />
                            <input type="text" placeholder="" maxlength="1" name="one[]" class="lg_frms" id=""
                                required="#" />
                        </div>

                        <div class="lgoss"><button type="submit" value="Reset password" class="lgo_singup">Reset
                                password</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>
    </div>
    <!-- partial -->

    </div>

    @include('front.layouts.footer_new')
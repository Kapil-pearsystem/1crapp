<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>signup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel='stylesheet' href="{{ url('') }}/css/stylenew.css">
</head>

<body class="bg_whit">
    <!--PEN HEADER-->
    <div class="container-fluid px-0">
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
                                ROI and dozens
                                of other
                                metrics</p>
                            <p><img src="{{ url('') }}/img/price.png" alt="" /> Look up recent sales and rental comps
                            </p>
                            <p><img src="{{ url('') }}/img/serc.png" alt="" /> Compare properties and find the best real
                                estate deals
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="login-form flu_lnth col-md-5 justify-content-center d-flex">
                <div class="medls_araeass">
                    <div class="login-form-inner">
                        <h3>Register Now. It's Free!</h3>
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        @if (session('fail'))
                        <div class="alert alert-danger">
                            {{ session('fail') }}
                        </div>
                        @endif
                        <form action="{{route('register')}}" method="post" onsubmit="return validateb11()" name="f4"
                            id="myForm">
                            @csrf
                            <div class="forms_reass">
                                <div class="login-form-group">
                                    <input type="text" placeholder="User Name/ ID Or Email" class="lg_frms" name="email"
                                        id="email" />
                                    <span id="email" class="err" style="color:red"></span>
                                </div>
                                <div class="login-form-group">
                                    <input autocomplete="off" type="text" placeholder="Password" name="password"
                                        class="lg_frms" id="pwd" />

                                    <span id="password" class="err" style="color:red"></span>
                                </div>

                                <div class="login-form-group with_both">
                                    <input autocomplete="off" type="text" placeholder="Referral Code/ Affiliate Link"
                                        class="lg_frms" id="pwd" />
                                    <span class="quess" tooltip="Hi" flow="down"><i
                                            class="fa fa-question-circle-o"></i></span>
                                </div>


                                <div class="lgoss">
                                    <button type="submit" value="Register me now" class="lgo_singup">Register me
                                        now!</button>
                                </div>


                                <div class="lgoss_1">
                                    <span class="mgssd"><img src="{{ url('') }}/img/without.PNG" alt="" /></span>
                                    <a href="#" class="lgo_psdsss">Register now wothout password</a>
                                    <span class="quess" tooltip="Hi" flow="down"><i
                                            class="fa fa-question-circle-o"></i></span>
                                </div>
                                <div class="lgo_with">
                                    <div class="or_width"><span class="orss">Or</span></div>
                                    <div class="soclls_ico">
                                        <h6>Register now without password</h6>
                                        <a href="javascript:void(0);" class="glgllo"><img class="gloool"
                                                src="{{ url('') }}/img/goolge_sm.png" alt="" />Google</a>
                                        <a href="javascript:void(0);" class="fblgoo"><img class="fboo"
                                                src="{{ url('') }}/img/face_bks.png" alt="" />Facebook</a>
                                    </div>
                                    <p class="clr">By signingup, you agree to our <a href="javascript:void(0);">terms of
                                            use</a> and <a href="javascript:void(0);">privacy policy</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- partial -->
    <script type="text/javascript">
    function validateb11() {
        var email = document.f4.email.value;
        var password = document.f4.password.value;

        var emailRegx =
            /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        var status = true;
        $('.err').html('');

        if (email == "") {
            document.getElementById("email").innerHTML =
                " Please enter email";
            status = false;
        } else if (emailRegx.test(String(email).toLowerCase()) == false) {
            document.getElementById("email").innerHTML =
                "Please Enter valid email address";
            status = false;
        }

        if (password == "") {
            document.getElementById("password").innerHTML =
                " Please Enter Password";
            status = false;
        }

        return status;
    }
    </script>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!--  -->
    <script src="{{ url('') }}/js/responsivenew.js"></script>
    <!-- start new add -->

    <script>
    $("#search-icon").click(function() {
        $(".nav").toggleClass("search");
        $(".nav").toggleClass("no-search");
        $(".search-input").toggleClass("search-active");
    });

    $('.menu-toggle').click(function() {
        $(".nav").toggleClass("mobile-nav");
        $(this).toggleClass("is-active");
    });
    </script>
</body>

</html>
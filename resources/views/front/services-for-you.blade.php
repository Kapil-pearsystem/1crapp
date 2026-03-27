@include('web.common.header')

<!---- Your Property Inspection Now Made Easy! ----->
<div class="modal fade" id="veioo_criteria" role="dialog">
    <div class="modal-dialog modal-lg" id="cent_screenss">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Your Property Inspection Now Made Easy!</h4>
            </div>
            <div class="modal-body">
                <div class="vid_araeass">
    <ul>
        <!-- Bullets injected here dynamically -->
    </ul>
</div>

<div class="veooo_araeaea">
    <iframe width="100%" height="auto" src="" frameborder="0" allowfullscreen></iframe>
</div>

<div class="payu_bntt">
    <a href="javascript:void(0);" data-toggle="modal" data-target="#enqryyees" data-dismiss="modal">YOffer Me The Latest Update & Property Inspection Report From Your Expert Team !</a>
</div>

            </div>
        </div>
    </div>
</div>
<!---- End Your Property Inspection Now Made Easy! ----->

<!-- Enquire Now -->
<div class="modal fade alss_frmss" id="enqryyees" role="dialog">
    <div class="modal-dialog" id="cent_screenss">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Enquire Now</h4>
                
                <div id="enquiry-success" class="alert alert-success" style="display:none;"></div>
            </div>
            <div class="modal-body">
                <form id="enquiry-form" method="POST">
    @csrf
    <input type="hidden" name="product_id" id="modal_product_id">
    <input type="hidden" name="product_inspection_id" id="modal_product_inspection_id">

    <div class="form-group">
        <input type="text" name="first_name" placeholder="First Name" class="inputt_frm" required />
    </div>

    <div class="form-group">
        <input type="text" name="last_name" placeholder="Last Name" class="inputt_frm" required />
    </div>

    <div class="form-group">
        <input type="email" name="email" placeholder="Email ID" class="inputt_frm" required />
    </div>

    <div class="form-group">
        <select name="cdo_id" class="inputt_frm" required>
            <option value="">Select Company/Organisation</option>
            @foreach($cdos as $cdo)
                <option value="{{ $cdo->id }}">{{ $cdo->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <input type="text" name="phone" placeholder="Phone No" class="inputt_frm" required />
    </div>

    <div class="form-group">
        <input type="text" name="brief_requirement" placeholder="Brief of your requirement (optional)" class="inputt_frm" />
    </div>

    <div class="form-group">
        <textarea name="message" rows="4" placeholder="Message" class="inputt_frm"></textarea>
    </div>

    <div class="form-group">
        <button type="submit" class="inputt_frm">YES! I WISH TO APPLY NOW</button>
    </div>
</form>



            </div>
        </div>
    </div>
</div>
<!-- End Enquire Now -->

<style>
.makr_plc_lst .lgo_partss {
    width: 160px;
    height: 128px;
    overflow: hidden;
    text-align: center;
}

.alls_tabsst.serv_for_y.ser_fr_y .frm_bothss {
    display: inline-block;
    width: 100%;
}
</style>


    <!--PEN HEADER-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 mb-5">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="lsting_proprty text-center mb-4">
                            <h3>PSU'S PROPERTY MARKET</h3>
                            <p>As Sson Market Place Tab Isopened Please Open a Video With Message That Can Easily Be
                                Cloised This Should Be Opeed in Pop Up.</p>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-lg-8 col-12">
                        <div class="makr_plc_lst">
                            <h4>Now Buy & sell Your Property with 100% Confidence. & Love</h4>
                            <div class="row">
                                <div class="col-lg-3 col-3">
                                    <div class="lgo_partss"><img src="https://1crapp.com/home/img/verif_lgoo.jpg"
                                            alt=""></div>
                                </div>

                                <div class="col-lg-6 col-6">
                                    <div class="md_areaa_cntts">
                                        <h5>PSU PROPERTY MARKET - PPM</h5>
                                        <p>IS</p>
                                        <span>YOUR FOR YOU BY YOUR'S</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-3">
                                    <div class="lgo_partss"><img src="https://1crapp.com/home/img/sat_lgoo.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-12">
                                    <div class="alls_tabsst serv_for_y ser_fr_y">
                                        <form action="">
                                            <div class="frm_bothss">
                                                <ul>
                                                    <li>
                                                        <div class="filsts_srch">
                                                            <select class="tb_bxxes" name="category_id" id="category-select">
    <option value="">Select Category</option>
    @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
</select>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="filsts_srch">
                                                            <i class="fa fa-inr"></i>
                                                            <select class="tb_bxxes" name="discount_range" id="discount-select">
    <option value="">Discount Update</option>
    @for($i = 10; $i <= 100; $i += 10)
        <option value="{{ $i-10 }}-{{ $i }}">{{ $i-10 }}% - {{ $i }}%</option>
    @endfor
</select>

                                                        </div>
                                                    </li>
                                                    <li>
                                                        <button type="submit" valign="submit" class="submmt"><i
                                                                class="fa fa-search"></i> <span
                                                                class="textxtx">Search</span></button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-12">
                        <div class="owl-carousel owl-theme" id="sliderssmain">
                            <!----- Slider Item ---->
                            <div class="item">
                                <img src="img/propertys.jpg" alt="" />
                            </div>
                            <!----- End Slider Item ---->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12 col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered borddr_mngss mideels" id="products-table">
    <tbody>
        <!-- Products will load here -->
    </tbody>
</table>
                </div>
            </div>
        </div>
    </div>


@include('front.layouts.footer')


    <script>
    CountDownTimer('04/31/2024 06:0 AM', 'countdown');

    function CountDownTimer(dt, id) {
        var end = new Date(dt);

        var _second = 1000;
        var _minute = _second * 60;
        var _hour = _minute * 60;
        var _day = _hour * 24;
        var timer;

        function showRemaining() {
            var now = new Date();
            var distance = end - now;
            if (distance < 0) {

                clearInterval(timer);
                document.getElementById(id).innerHTML = 'EXPIRED!';

                return;
            }
            var days = Math.floor(distance / _day);
            var hours = Math.floor((distance % _day) / _hour);
            var minutes = Math.floor((distance % _hour) / _minute);
            var seconds = Math.floor((distance % _minute) / _second);

            document.getElementById(id).innerHTML = '<p>' + days + '<span class="managss">Day</span></p>';
            document.getElementById(id).innerHTML += '<p>' + hours + '<span class="managss">Hour</span></p>';
            document.getElementById(id).innerHTML += '<p>' + minutes + '<span class="managss">Min</span></p>';
            document.getElementById(id).innerHTML += '<p>' + seconds + '<span class="managss">Sec</span></p>';
        }

        timer = setInterval(showRemaining, 1000);
    }
    </script>


    <script>
    var owl = $('#sliderssmain');
    owl.owlCarousel({
        margin: 0,
        dots: true,
        loop: true,
        nav: true,
        navText: [],
        autoplay: true,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            },
            1200: {
                items: 1
            }
        }
    });
    </script>

    <script>
    $('.tab-link').click(function() {
        var tabID = $(this).attr('data-tab');
        $(this).addClass('active').siblings().removeClass('active');
        $('#tab-' + tabID).addClass('active').siblings().removeClass('active');
    });
    </script>


    <script src="js/responsive.js"></script>
    <script>
    function funcToggle() {
        $(".cont").toggleClass('hidden');
    };
    </script>

    <script>
    $(function() {
        $('#language-wrapper').hover(
            function() {
                $('.language-text').fadeIn();
            },
            function() {
                $('.language-text').fadeOut();
            }
        );
    });
    </script>

    <!-- start new add -->
    <script>
    $(document).ready(function() {

        $("#extend").click(function(e) {
            e.preventDefault();
            $("#extend-field").append(
                '<div class="row p-3 justify-content-end"><div class="col-5 d-flex px-0"><input class="multisteps-form__input form-control" type="number" placeholder="10" value="10"><button class="btn rbtn px-4 text-muted">%</button></div> <div class="col-5"><h6 class="font-weight-bold d-flex">in years:-&nbsp;<input type="text" name="number[]" placeholder="Ex. 5,10, 12-14" class="form-control total_amount"></h6></div><a class="remove-extend-field"><button type="button" name="remove" class="btn btn-danger">X</button></a></div>'
            )
        });

        $("#extend-field").on("click", ".remove-extend-field", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
        });


    });
    // 1
    $(document).ready(function() {

        $("#extend1").click(function(e) {
            e.preventDefault();
            $("#extend-field1").append(
                '<div class="row p-3 justify-content-end"><div class="col-5 d-flex px-0"><input class="multisteps-form__input form-control" type="number" placeholder="10" value="10"><button class="btn rbtn px-4 text-muted">%</button></div> <div class="col-5"><h6 class="font-weight-bold d-flex">in years:-&nbsp;<input type="text" name="number[]" placeholder="Ex. 5,10, 12-14" class="form-control total_amount"></h6></div><a class="remove-extend-field"><button type="button" name="remove" class="btn btn-danger">X</button></a></div>'
            )
        });

        $("#extend-field1").on("click", ".remove-extend-field", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
        });


    });
    // 2
    $(document).ready(function() {

        $("#extend2").click(function(e) {
            e.preventDefault();
            $("#extend-field2").append(
                '<div class="row p-3 justify-content-end"><div class="col-5 d-flex px-0"><input class="multisteps-form__input form-control" type="number" placeholder="10" value="10"><button class="btn rbtn px-4 text-muted">%</button></div> <div class="col-5"><h6 class="font-weight-bold d-flex">in years:-&nbsp;<input type="text" name="number[]" placeholder="Ex. 5,10, 12-14" class="form-control total_amount"></h6></div><a class="remove-extend-field"><button type="button" name="remove" class="btn btn-danger">X</button></a></div>'
            )
        });

        $("#extend-field2").on("click", ".remove-extend-field", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
        });


    });
    // 3
    $(document).ready(function() {

        $("#extend3").click(function(e) {
            e.preventDefault();
            $("#extend-field3").append(
                '<div class="row p-3 justify-content-end"><div class="col-5 d-flex px-0"><input class="multisteps-form__input form-control" type="number" placeholder="10" value="10"><button class="btn rbtn px-4 text-muted">%</button></div> <div class="col-5"><h6 class="font-weight-bold d-flex">in years:-&nbsp;<input type="text" name="number[]" placeholder="Ex. 5,10, 12-14" class="form-control total_amount"></h6></div><a class="remove-extend-field"><button type="button" name="remove" class="btn btn-danger">X</button></a></div>'
            )
        });

        $("#extend-field3").on("click", ".remove-extend-field", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
        });


    });
    </script>

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
    <script>
function fetchProducts() {
    var category = $('#category-select').val();
    var discount = $('#discount-select').val();

    $.ajax({
        url: "{{ route('fetch.products') }}",
        type: 'GET',
        data: { category_id: category, discount_range: discount },
        success: function(products) {
            var list = products.data || products; // handle both array or object response
            var html = '';
            if(list.length > 0){
                $.each(list, function(i, product){
                    html += '<tr>';
                    html += '<td align="center" valign="middle">' + product.id + '</td>';
                    html += '<td align="center" valign="middle">' + product.prod_name + '</td>';
                    html += '<td align="center" valign="middle">' + (product.category ? product.category.name : '-') + '</td>'; // category name
                    html += '<td align="center" valign="middle"><span class="dut_prss">Rs.' + product.prod_price + '</span> Rs.' + (product.discount_price ?? '-') + '</td>';
                    // html += '<td align="center" valign="middle"><img src="img/75_pursentts.png" alt="" /></td>'; // replace with dynamic if needed
                    // html += '<td align="center" valign="middle"><div id="countdown" class="als_contss"></div></td>'; // optional countdown
                    html += '<td align="center" valign="middle">';
                    html += '<a href="javascript:void(0);" onclick="setProductId(' + product.id + ')" class="btn btn-sm btn-primary btn-learn-more" data-toggle="modal" data-target="#veioo_criteria" data-product="' + product.id + '">Learn More</a>';
                    html += '</td>';
                    html += '<td align="center" valign="middle">';
                    html += '<div class="shr_blg_liststs" onclick="shareOnWhatsApp()"><i class="fa fa-share-alt"></i> <span class="block_manag">Share with Anyone & Earn</span></div>';
                    html += '</td>';
                    html += '</tr>';
                });
            } else {
                html = '<tr><td colspan="8" class="text-center">No products found</td></tr>';
            }
            $('#products-table tbody').html(html);
        },
        error: function(err){
            console.log(err);
        }
    });
}

// Trigger AJAX on select change
$('#category-select, #discount-select').on('change', fetchProducts);

// Load products on page load
$(document).ready(fetchProducts);
</script>
<script>
    // Dynamic modal content
$(document).on('click', '.btn-learn-more', function() {
    var productId = $(this).data('product');

    // Clear previous content
    $('#veioo_criteria .vid_araeass ul').empty();
    $('#veioo_criteria .veooo_araeaea iframe').attr('src', '');
    $('#veioo_criteria .payu_bntt a').attr('href', 'javascript:void(0);');

    $.ajax({
        url: "{{ route('fetch.inspection') }}",
        type: 'GET',
        data: { product_id: productId },
        success: function(data) {
            if(data) {
                // Build bullets dynamically
                var bullets = '';
                for(var i=1; i<=6; i++){
                    if(data['bullet'+i]){
                        bullets += '<li><i class="fa fa-check-circle"></i> ' + data['bullet'+i] + '</li>';
                    }
                }
                $('#veioo_criteria .vid_araeass ul').html(bullets);

                // Embed YouTube video
                if(data.youtube_embed_link){
                    $('#veioo_criteria .veooo_araeaea iframe').attr('src', data.youtube_embed_link);
                }

                // Update modal title
                if(data.title){
                    $('#veioo_criteria .modal-title').text(data.title);
                }

                // Update CTA link if needed
                if(data.title_link){
                    $('#veioo_criteria .payu_bntt a').attr('href', data.title_link);
                }
            } else {
                $('#veioo_criteria .vid_araeass ul').html('<li>No inspection found</li>');
            }
        },
        error: function(err){
            console.log(err);
            $('#veioo_criteria .vid_araeass ul').html('<li>Error fetching inspection</li>');
        }
    });
});

</script>
<script>
//     $(document).on('click', '.btn-learn-more', function() {
//     var productId = $(this).data('product');

//     // hidden fields set karo
//     $('#modal_product_id').val(productId);

//     // AJAX se inspection id fetch karo
//     $.ajax({
//         url: "{{ route('fetch.inspection') }}",
//         type: 'GET',
//         data: { product_id: productId },
//         success: function(data) {
//             if(data && data.id){
//                 $('#modal_product_inspection_id').val(data.id);
//             }
//         }
//     });
// });
function setProductId(id){
    $('#modal_product_inspection_id').val(id);
    $('#modal_product_id').val(id);
}
$('#enquiry-form').on('submit', function(e) {
    e.preventDefault();

    var formData = $(this).serialize(); // form data collect

    $.ajax({
        url: "{{ route('enquiry.submit') }}",
        type: 'POST',
        data: formData,
        success: function(response) {
            $('#enquiry-success').text('Enquiry submitted successfully!').show();
            $('#enquiry-form')[0].reset(); // form reset
            $('#enqryyees').modal('hide'); // modal close
            
            setTimeout(function () {
                closeAllModals();
            }, 5000);
        },
        error: function(xhr) {
            var errors = xhr.responseJSON.errors;
            var errorText = '';
            if(errors){
                $.each(errors, function(key, value){
                    errorText += value + "\n";
                });
            } else {
                errorText = 'Something went wrong!';
            }
            alert(errorText);
        }
    });
});



</script>

<script>
function shareOnWhatsApp() {
    var url = window.location.href;
    var message = "Check out this property: ";
    var whatsappUrl = "https://wa.me/?text=" + encodeURIComponent(message + url);
    window.open(whatsappUrl, '_blank');
}
</script>


<script>
function closeAllModals() {
    document.querySelectorAll('.close').forEach(function (modalEl) {
        const instance = bootstrap.Modal.getInstance(modalEl);
        if (instance) {
            instance.hide();
        }
    });
}
</script>




















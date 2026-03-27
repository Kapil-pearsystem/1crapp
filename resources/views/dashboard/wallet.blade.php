@include('front.layouts.user-header')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
  .modal {
    text-align: center;
    padding: 0 !important;
  }

  .modal:before {
    content: '';
    display: inline-block;
    height: 100%;
    vertical-align: middle;
    margin-right: -4px; /* Adjusts for inline-block spacing */
  }

  .modal-dialog {
    display: inline-block;
    text-align: left;
    vertical-align: middle;
  }
  .tab-pane {
    display: none;
    }
.tab-pane.active {
    display: block;
}
.lnk_s_bntt a.bntss.blue_bg {
  padding:
10px 22px 7px 30px;
  position: relative;
}
.badge.badge-light {
    color: #1c5299;
    background-color: white;
    float: right;
    margin: 2px 0px 0px 16px;
}
</style>
@php
    $activeTab = request()->has('affiliate_page') ? 'affiliate' :
                 (request()->has('commission_page') ? 'commission' : 'welcome');
@endphp

<section class="dash_board_pages mt">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                @include('dashboard.includes.sidebar')
            </div>
            <div class="col-lg-9">
                <div class="binng_araes">
                     <h4>Wallet Balance <span>₹. {{ $user_data->walletBalance }}</span></h4>
                    <div class="lnk_s_bntt text-center">
                        <a href="javascript:void(0);" class="bntss blue_bg tab-btn {{ $activeTab == 'welcome' ? 'active' : '' }}" data-target="#welcome">Welcome Bonus <span class="badge badge-light" >₹{{ $sum_data['welcome_total']??0.00; }}</span></a>
                        <a href="javascript:void(0);" class="bntss blue_bg tab-btn {{ $activeTab == 'affiliate' ? 'active' : '' }}" data-target="#affiliate">Affiliate Bonus <span class="badge badge-light" >₹{{ $sum_data['affiliate_total']??0.00; }}</span></a>
                        <a href="javascript:void(0);" class="bntss blue_bg tab-btn {{ $activeTab == 'commission' ? 'active' : '' }}" data-target="#commission">Commission Bonus <span class="badge badge-light" >₹{{ $sum_data['commission_total']??0.00; }}</span></a>
                    </div>
                    
                    <div class="tbl_liststs tab-content">
                        <div class="tab-pane {{ $activeTab == 'welcome' ? 'active' : '' }}" id="welcome">
                            <h4>Welcome Bonus Transaction Details</h4>
                            @include('dashboard.bonus-table', ['lists' => $welcome_bonus, 'type' => 'welcome'])
                        </div>
                        <div class="tab-pane {{ $activeTab == 'affiliate' ? 'active' : '' }}" id="affiliate">
                            <h4>Affiliate Bonus Transaction Details</h4>
                            @include('dashboard.bonus-table', ['lists' => $affiliate_bonus, 'type' => 'affiliate'])
                        </div>
                        <div class="tab-pane {{ $activeTab == 'commission' ? 'active' : '' }}" id="commission">
                            <h4>Commission Bonus Transaction Details</h4>
                            @include('dashboard.bonus-table', ['lists' => $commission_bonus, 'type' => 'commission'])
                        </div>
                    </div>


                </div>
            </div>


        </div>
    </div>
</section>

<div class="modal" id="downlineModal" tabindex="-1" role="dialog" aria-labelledby="downlineModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="downlineModalLabel">Referred User Details</h4>
      </div>
      <div class="modal-body">
        <p><strong>Member ID:</strong> <span id="d_memberid"></span></p>
        <p><strong>Name:</strong> <span id="d_name"></span></p>
        <p><strong>Email:</strong> <span id="d_email"></span></p>
        <p><strong>Mobile:</strong> <span id="d_mobile"></span></p>
        <!--<p><strong>Wallet Balance:</strong> ₹<span id="d_balance"></span></p>-->
      </div>
    </div>
  </div>
</div>
@include('front.layouts.footer')


<script>
    $(document).ready(function () {
        $('.tab-btn').click(function () {
            var target = $(this).data('target');

            // Button active styling
            $('.tab-btn').removeClass('active');
            $(this).addClass('active');

            // Tab pane switching
            $('.tab-pane').removeClass('active').removeClass('show');
            $(target).addClass('active').addClass('show');
        });
    });


    // downline
 function downline_user_details(data) {
    if (typeof data === "string") {
        data = JSON.parse(data); // Convert JSON string to JS object
    }
    $('#d_memberid').text(data.memberid);
    $('#d_name').text(data.name);
    $('#d_email').text(data.email);
    $('#d_mobile').text(data.mobile);
    // $('#d_balance').text(data.walletBalance);

    $('#downlineModal').modal('show');
}
$('.modal-close').click(function(){
    $('#downlineModal').modal('hide');
});
</script>
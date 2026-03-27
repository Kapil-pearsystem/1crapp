@extends('layouts.app')

@section('title', 'Agents List')

@section('content')
@if(!$setting && Auth::user()->role_id==2)
<div id="modalOverlay">
    <div class="modalPopup">
        <span class="icoo"><i class="fa fa-exclamation"></i></span>
        <h1>Contact your administrator to availability service.</h1>
        <button class="buttonStyle" id="button">Contact Us</button>
    </div>
</div>
@endif

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">@hasrole('Agent') Referral Setting @endrole @hasrole('Master Admin') Affiliate Commission Setting @endrole</h1>
    </div>


    {{-- Alert Messages --}}
    @include('common.alert')

    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('rc-management.setting.update') }}">
            @csrf
            <div class="card-body">
                <div class="form-group row">

                    @if(Auth()->user()->role_id==1)

                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0 addsss">
                        <span style="color: red;">*</span>Commission Value
                        <input type="text" id="" placeholder="2" name="level1_perc" value="{{ @$setting->level1_perc }}" class="form-control form-control-user" required="" />
                        <span class="prssennt">%</span>
                    </div>

                    <input type="hidden" id="" placeholder="2" name="level2_perc" value="1" class="form-control form-control-user" required="" />
                    <input type="hidden" id="" placeholder="2" name="level3_perc" value="1" class="form-control form-control-user" required="" />
                    @else

                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0 addsss">
                        <span style="color: red;">*</span> Welcome Bonus.
                        <input type="text" id="" placeholder="100" name="welcome_bonus" value="{{ @$setting->welcome_bonus }}" class="form-control form-control-user" required="" />
                        <!-- <span class="prssennt">₹</span> -->
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0 addsss">
                        <span style="color: red;">*</span> Reward Points per Ref.
                        <input type="text" id="" placeholder="100" name="referral_points" value="{{ @$setting->referral_points }}" class="form-control form-control-user" required="" />

                    </div>
                    <div class="col-12"></div>
                    <!--<div class="col-sm-4 mb-3 mt-3 mb-sm-0 addsss">-->
                    <!--    <span style="color: red;">*</span>Level 1 @if(Auth()->user()->role_id==1) Commission @else Referral User @endif-->
                    <!--    <input type="text" id="" placeholder="2" name="level1_perc" value="{{ @$setting->level1_perc }}" class="form-control form-control-user" required="" />-->
                    <!--    <span class="prssennt">%</span>-->
                    <!--</div>-->

                    <!--<div class="col-sm-4 mb-3 mt-3 mb-sm-0 addsss">-->
                    <!--    <span style="color: red;">*</span>Level 2 @if(Auth()->user()->role_id==1) Commission @else Referral User @endif-->
                    <!--    <input type="text" id="" placeholder="6" name="level2_perc" value="{{ @$setting->level2_perc }}" class="form-control form-control-user" required="" />-->
                    <!--    <span class="prssennt">%</span>-->
                    <!--</div>-->

                    <!--<div class="col-sm-4 mb-3 mt-3 mb-sm-0 addsss">-->
                    <!--    <span style="color: red;">*</span>Level 3 @if(Auth()->user()->role_id==1) Commission @else Referral User @endif-->
                    <!--    <input type="text" id="" placeholder="8" name="level3_perc" value="{{ @$setting->level3_perc }}" class="form-control form-control-user" required="" />-->
                    <!--    <span class="prssennt">%</span>-->
                    <!--</div>-->
                    @endif

                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">Save</button>
                <a href="{{ route('affiliateearning.afrewardlisting') }}" class="btn btn-primary float-right mr-3 mb-3">Cancel</a>
            </div>
        </form>
    </div>
</div>




@endsection

@section('scripts')

@endsection
	

	@foreach($subscription_plan as $list)
	 <!---- List ----->
		 <div class="als_list_pricess">
    		  <h4>{{ $list->title }}</h4>
    		  <p>{{ $list->sub_title }}</p> 
    		  
    		  <h2>₹{{ $list->monthly_price }}</h2>
    		  <!--
    		  <div class="str_bnt_area"><a href="javascript:void(0);">Start Free Trial</a></div>-->
    		   <form action="{{ route('billing.upgrade') }}" method="POST" >
                    @csrf 
                    <script src="https://checkout.razorpay.com/v1/checkout.js"
                            data-key="{{ env('RAZORPAY_KEY') }}"
                            data-amount="{{ $list->monthly_price }} * 100"
                            data-buttontext="Buy Now"
                            data-name="1CRAPP"
                            data-description="{{ $list->title }}||{{ $list->id }}"
                            data-image="{{ url('admin/img/logo.png') }}"
                            data-prefill.name="{{ Auth()->user()->first_name; }}"
                            data-prefill.email="{{ Auth()->user()->email; }}"
                            data-notes.plan="{{ $list->id }}"
                            data-theme.color="#4e73df">
                    </script>
                    <input type="submit" value="Buy Now" class="razorpay-payment-button">
                </form>
    		  
    		  <div class="data_listst" style="text-align:left; max-height:200px; overflow-y:auto; overflow-x:hidden;">

    		   <ul>
    		       @foreach($plan_feature as $list2)
    		    <li>{{ $list2->title }}</li> 
    		    @endforeach
    		   </ul>
    		  </div>
		 </div>
		 <!---- End List ----->
					 
@endforeach				 
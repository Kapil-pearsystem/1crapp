@include('front.layouts.header')


<style>
    #successModal .modal-lg {
      width: auto;
      max-width: fit-content;
    }
</style>
   
<!--PEN HEADER-->
<div class="container mt-5">
<div class="row">

@include('front.layouts.sidebar')

<div class="col-12 col-sm-8">
    <div class="">

        @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif
        @if(Session::has('error'))
        <div class="alert alert-danger">
            {{Session::get('error')}}
        </div>
        @endif
     
        <h3 class="d-flex justify-content-between text-primary align-items-center mb-1">New Rental Property 
        <div class="d-flex justify-content-end"><a class="header__btn btn" href="#" title="" target="_blank">Start over</a>
        <button class="btn btn-primary px-4" type="button" title="">Save</button></div></h3> 

</div>
<div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item text-primary"><a href="#">Rental</a></li>
      <li class="breadcrumb-item active" aria-current="page">New Property</li>
    </ol>
  </div>
  <!--  -->

<!--PEN CONTENT     -->
<div class="content">
  <!--content inner-->
  <div class="content__inner">
      <!--content title-->
      <h5  class="text-primary text-uppercase">Property Worksheet</h5>
      <p class="">Enter as much information as you have about this Property. <a  class="text-primary" href="#">View tutorial<i class="fa fa-external-link ml-2"></i></a></p>
      <!--animations form-->
   
      <!--content title-->
      
  
    <div class="overflow-hidden">
      <!--multisteps-form-->
      <div class="multisteps-form">
        <!--progress bar-->
        <div class="row">
          <div class="col-12 col-lg-12 my-4">
            <div class="multisteps-form__progress">
              <button class="multisteps-form__progress-btn js-active" type="button" title="Property Description">Property Description</button>
              <button class="multisteps-form__progress-btn" type="button" title="Address">Book & Finance & Payments</button>
              <button class="multisteps-form__progress-btn" type="button" title="Address">Possesion & Improment</button>
              <button class="multisteps-form__progress-btn" type="button" title="Address">Rentout & Opearte</button>
              <button class="multisteps-form__progress-btn" type="button" title="Order Info">Refinace & Case Out</button>
              <button class="multisteps-form__progress-btn" type="button" title="Comments">Sell</button>
            </div>
          </div>
        </div>
        <!--form panels-->
        <div class="row">
          <div class="col-12 col-lg-12">
            <form class="multisteps-form__form">
              <!--single form panel-->
              <div class="multisteps-form__panel  rounded  js-active" data-animation="slideHorz">
                <div class="multisteps-form__content shadow p-sm-4 px-4 pb-4">
                  <div class="form-row mt-4 align-items-center">
                    <div class="col-12 col-sm-4">
                 <h6 class="font-weight-bold">Property Name:-</h6>
                    </div>
                    <div class="col-12 col-sm-8">
                        <input class="multisteps-form__input form-control" type="text" placeholder="New Rental" value="New Rental">
                      </div>
                      <div class="col-12 col-sm-4 mt-4 mt-sm-0">
                        <h6 class="font-weight-bold">Short Description:-</h6>
                           </div>
                    <div class="col-12 col-sm-8 mt-sm-4">
                        <textarea class="multisteps-form__textarea form-control" placeholder="Add a description...."></textarea>
                        <p class="text-muted mt-2 mb-5">Add a short description of this Property to display in its report.</p>
                    </div>
                    <div class="col-12 col-sm-4">
                        <h6 class="font-weight-bold">Tags & Labels:-</h6>
                           </div>
                    <div class="col-12 col-sm-8">
                      <input class="multisteps-form__input form-control" type="text" placeholder="Add a tag..."/>
                      <p class="text-muted mt-2">Add tags to help you categorize  this Property, track its status and quickly find it later.</p>

                    </div>
                  </div>
                  
                </div>
                <h6  class="text-primary text-uppercase mb-3 mt-5">Address</h6>
                <div class="multisteps-form__content shadow p-4">
                    <div class="form-row mt-4 align-items-center">
                        <div class="col-6">
                            <div class="row align-items-center">
                      <div class="col-12 col-sm-4">
                   <h6 class="font-weight-bold">Street Address:-</h6>
                      </div>
                      <div class="col-12 col-sm-8">
                          <input class="multisteps-form__input form-control" type="text" placeholder="ex. 123 main street"/>
                        </div>
                    </div>
                    </div>
                    <div class="col-6">
                        <div class="row align-items-center ml-3">
                  <div class="col-12 col-sm-4">
               <h6 class="font-weight-bold">City:-</h6>
                  </div>
                  <div class="col-12 col-sm-8">
                      <input class="multisteps-form__input form-control" type="text" placeholder="ex. Atlanta"/>
                    </div>
                </div>
                </div>
                <div class="col-6 mt-4">
                    <div class="row align-items-center">
              <div class="col-12 col-sm-4">
           <h6 class="font-weight-bold">State/Region:-</h6>
              </div>
              <div class="col-12 col-sm-8">
                  <input class="multisteps-form__input form-control" type="text" placeholder="ex. GA"/>
                </div>
            </div>
            </div> 
            <div class="col-6 mt-4">
                <div class="row align-items-center ml-3">
          <div class="col-12 col-sm-4">
       <h6 class="font-weight-bold">ZIP/Postal Code:-</h6>
          </div>
          <div class="col-12 col-sm-8">
              <input class="multisteps-form__input form-control" type="text" placeholder="ex. 30311"/>
            </div>
        </div>
        </div>
                    
                  </div>
              </div> 
              <h6  class="text-primary text-uppercase mb-3 mt-5">Description</h6>
              <div class="multisteps-form__content shadow p-4">
                <div class="form-row mt-4 align-items-center">
                  <div class="col-12 col-sm-4">
               <h6 class="font-weight-bold">Property type:-</h6>
                  </div>
                  <div class="col-12 col-sm-8">
                    <select class="multisteps-form__select form-control">
                        <option selected="selected"></option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                      </select>
                      <p class="text-muted mt-2">Select a Property type to enable more specific analysis tools.</p>

                    </div>
                    <div class="col-6">
                        <div class="row align-items-center">
                  <div class="col-12 col-sm-4">
               <h6 class="font-weight-bold">Bedrooms:-</h6>
                  </div>
                  <div class="col-12 col-sm-8">
                    <select class="multisteps-form__select form-control">
                        <option selected="selected"></option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                      </select>
                    </div>
                </div>
                </div>
                <div class="col-6">
                    <div class="row align-items-center ml-3">
              <div class="col-12 col-sm-4">
           <h6 class="font-weight-bold">Bathrooms:-</h6>
              </div>
              <div class="col-12 col-sm-8">
                <select class="multisteps-form__select form-control">
                    <option selected="selected"></option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                  </select>
                </div>
            </div>
            </div>

                  <div class="col-12 col-sm-4 mt-5">
                      <h6 class="font-weight-bold">Square Footage:-</h6>
                         </div>

                  <div class="col-12 col-sm-8 mt-sm-5">
                    <input class="multisteps-form__input form-control" type="text" placeholder=""/>
                  </div>
                  <div class="col-12 col-sm-4 mt-4">
                    <h6 class="font-weight-bold">Year Built:-</h6>
                       </div>

                <div class="col-12 col-sm-8 mt-sm-4">
                  <input class="multisteps-form__input form-control" type="text" placeholder=""/>
                </div>
                <div class="col-12 col-sm-4 mt-4">
                    <h6 class="font-weight-bold">Parking:-</h6>
                       </div>
                       <div class="col-12 col-sm-8 mt-sm-4">
                         <select class="multisteps-form__select form-control">
                             <option selected="selected"></option>
                             <option>1</option>
                             <option>2</option>
                             <option>3</option>
                             <option>4</option>
                           </select>     
                         </div>
                         <div class="col-12 col-sm-4 mt-5">
                            <h6 class="font-weight-bold">Lot size:-</h6>
                               </div>
      
                        <div class="col-12 col-sm-8 mt-sm-5 d-flex">
                       
                          <input class="multisteps-form__input form-control" type="text" placeholder=""/><button class="btn rbtn px-4 text-muted">Square feet</button>
                     
                        </div>
                        <div class="col-12 col-sm-4 mt-5">
                            <h6 class="font-weight-bold">Zoning:-</h6>
                               </div>
      
                        <div class="col-12 col-sm-8 mt-sm-5">
                          <input class="multisteps-form__input form-control" type="text" placeholder=""/>
                        </div>
                        <div class="col-12 col-sm-4 mt-5">
                            <h6 class="font-weight-bold">MLS Number:-</h6>
                               </div>
                            
                        <div class="col-12 col-sm-8 mt-sm-5">
                          <input class="multisteps-form__input form-control" type="text" placeholder=""/>
                        </div>

                </div>
                
              </div>
              <h6  class="text-primary text-uppercase mb-3 mt-5">Notes</h6>
              <div class="multisteps-form__content shadow p-4">
              <div class="form-row">
                <textarea rows="20" cols="5" class="multisteps-form__textarea form-control" placeholder="Add your notes..."></textarea>
              </div>
              </div>
              <div class="button-row d-flex my-4">
                <button class="btn btn-primary ml-auto js-btn-next px-4" type="button" title="Next">Next</button>
              </div>
              </div>
              <!--single form panel-->
              <div class="multisteps-form__panel rounded " data-animation="slideHorz">
                <h6  class="text-primary text-uppercase mb-3 mt-5">Wholesale Purchase</h6>
                <p class="text-muted mt-2 mb-3">Use this section to customize the purchase price and closing costs you will pay as the wholesaler.</p>

                <div class="multisteps-form__content shadow p-sm-4 px-4 pb-4">
                    <div class="form-row mt-4 align-items-center">
                      <div class="col-12 col-sm-4">
                   <h6 class="font-weight-bold">Purchase Price:-</h6>
                      </div>
                      <div class="col-12 col-sm-8">
                          <input class="multisteps-form__input form-control" type="text" placeholder="₹ 0" value="₹ 0">
                        </div>
                        </div>
                        <div class="form-row mt-4">
                          <!--  -->
                          <div class="col-12 col-sm-4">
                            <h6 class="font-weight-bold">Closing Costs:-</h6>
                               </div>
                          <div class="col-12 col-sm-5 d-flex">
                                           
                            <input class="multisteps-form__input form-control" type="number" placeholder="3" value="3"><button class="btn rbtn px-4 text-muted">% of Price</button>
                       
                          </div>
                          <div class="col-12 col-sm-3 d-flex">
                                           
                    <button class="btn rbtn px-4 text-muted">$ &nbsp;&nbsp;Itemize</button>
                       
                          </div>
                            <!--  -->
                        </div>
                        <div class="form-row mt-3 align-items-center">
                        <div class="col-12 col-sm-4 mt-4 mt-sm-0">
                          <h6 class="font-weight-bold">Investor Strategy:-</h6>
                             </div>
                      <div class="col-12 col-sm-8 mt-sm-4">
                        <select class="multisteps-form__select form-control">
                          <option selected="selected">Flip</option>
                          <option>Rental</option>
                          <option>BRRRRs</option>
                    
                        </select>                          <p class="text-muted mt-2 mb-3">Select which type of investor you're wholesaling this property to.</p>
                      </div>
                    </div>
                    </div>
                <h6  class="text-primary text-uppercase mb-3 mt-5">Investor Purchase (Flip)</h6>
                <p class="text-muted mt-2 mb-3">Use the following sections to customize the property purchase from the investor's perspective.</p>

                <div class="multisteps-form__content shadow p-sm-4 px-4 pb-4">
                    <div class="form-row mt-4 align-items-center">
                      <div class="col-12 col-sm-4">
                   <h6 class="font-weight-bold">Purchase Price:-</h6>
                      </div>
                      <div class="col-12 col-sm-8">
                          <input class="multisteps-form__input form-control" type="text" placeholder="₹ 0" value="₹ 0">
                        </div>
                        <div class="col-12 col-sm-4 mt-4 mt-sm-0">
                          <h6 class="font-weight-bold">After Repair Value:-</h6>
                             </div>
                      <div class="col-12 col-sm-8 mt-sm-4">
                        <input class="multisteps-form__input form-control" type="text" placeholder="₹ 0" value="₹ 0">
                          <p class="text-muted mt-2 mb-3">If no repair are necessary, the after repair value is the same as the current market value.</p>
                      </div>
                    </div>
                    </div>

                    <h6  class="text-primary text-uppercase mb-3 mt-5">Financing <span class="text-capitalize">(Purchase)</span></h6>
                    <div class="multisteps-form__content shadow p-sm-4 px-4 pb-4">
              
                <div class="multisteps-form__content">
                  <div class="form-row mt-4">
                    <div class="col-12 col-sm-10">
                      <h6>Use Financing</h6>
                      <p class="text-muted mt-2 mb-3">If no repair are necessary, the after repair value is the same as the current market value.</p>

                      </div>
                    

                      <div class="col-12 col-sm-2">
                          <div class="toggle-button-cover">
                            <div class="button-cover">
                              <div class="button b2" id="button-16">
                                <input type="checkbox" class="checkbox" />
                                <div class="knobs"></div>
                                <div class="layer"></div>
                              </div>
                            </div>
                          </div>
                     </div>
                      
                       
                      
                
         

                    
                  </div>
                  
                </div>
              </div>
<!-- now -->
<div class="multisteps-form__content shadow p-sm-4 px-4 pb-4 mt-4">
  <div class="form-row mt-4">
    <div class="col-12 col-sm-4 mt-4">
      <h6 class="font-weight-bold">Loan Label:-</h6>
         </div>

  <div class="col-12 col-sm-8 mt-sm-4">
    <input class="multisteps-form__input form-control" type="text" placeholder="" fdprocessedid="xrvkdc">
    <p class="text-muted mt-2 mb-3">Enter an optional label to help you identify this loan.</p>

  </div>
  <div class="col-12 col-sm-4 mt-4">
      <h6 class="font-weight-bold">Financing Of:-</h6>
         </div>
         <div class="col-12 col-sm-8 mt-sm-4">
           <select class="multisteps-form__select form-control" fdprocessedid="h0u8w">
               <option selected="selected">Purchase Price</option>
               <option>Rehab Costs</option>
               <option>Price and Rehab Costs</option>
               <option>After Repair Value (ARV)</option>
               <option>Custom Amount</option>
             </select>  
             <p class="text-muted mt-2 mb-3">Select what is being financed by this loan. You can also enter a custom loan amount manually.</p>
           </div>
           <div class="col-12 col-sm-4 mt-5">
              <h6 class="font-weight-bold">Price Financing:-</h6>
                 </div>

          <div class="col-12 col-sm-8 mt-sm-5 ">
         <div class="d-flex">
            <input class="multisteps-form__input form-control" type="number" placeholder="80" value="80" fdprocessedid="wmpxjy"><button class="btn rbtn px-4 text-muted" fdprocessedid="p1moq">%</button>
          </div>
          <small class="justify-content-end d-flex">20% Down Payment</small>
          <p class="text-muted mt-2 mb-3">Enter the down payment on the purchase price, or the percentage financed. Click label to toggle inputs.</p>

          </div>
         
  </div>
<hr>
<!--start tabs -->
<div class="form-row mt-4">
  <div class="col-12 col-sm-4 mt-4">
    <h6 class="font-weight-bold">Loan Type:-</h6>
       </div>

<div class="col-12 col-sm-8 mt-sm-4">
 
<div id="exTab1" class="">	
<ul class="nav nav-pills">
<li class="active">
<a href="#1a" data-toggle="tab">Amortizing</a>
</li>
<li class=""><a href="#2a" data-toggle="tab">Interest-Only</a>
</li>
</ul>
<!--data  -->


<!-- end data -->

</div>
 

</div>
</div>

<div class="tab-content clearfix">
<div class="tab-pane active" id="1a">
<!-- start content -->
<div class="col-12 col-sm-4 mt-5">
<h6 class="font-weight-bold">Interest Rate:-</h6>
</div>

<div class="col-12 col-sm-8 mt-sm-5 ">
<div class="d-flex">
<input class="multisteps-form__input form-control" type="number" placeholder="5" value="5" fdprocessedid="s2ryii"><button class="btn rbtn px-4 text-muted" fdprocessedid="g7owxc">%</button>
</div>
<details>
<summary class="text-primary">Customize Compounding</summary>
<div class="col-12 col-sm-4 mt-4">
<h6 class="font-weight-bold">Compound Interval:-</h6>
</div>
<div class="col-12 col-sm-8 mt-sm-4">
<select class="multisteps-form__select form-control" fdprocessedid="4otrbx">
 <option selected="selected">1 Month</option>
 <option>3 Month</option>
 <option>6 Month</option>

</select>  
</div>
</details>
</div>
<hr>
<div class="col-12 col-sm-4 mt-5">
<h6 class="font-weight-bold">Loan Term:-</h6>
</div>

<div class="col-12 col-sm-8 mt-sm-5 ">
<div class="d-flex">
<input class="multisteps-form__input form-control" type="number" placeholder="30" value="30" fdprocessedid="55wkeq"><button class="btn rbtn px-4 text-muted" fdprocessedid="zytgwv">Years</button>
</div>
<details>
<summary class="text-primary"> Customize Amortization</summary>
<div class="col-12 col-sm-4 mt-4">
<h6 class="font-weight-bold">Amortization Period:-</h6>
</div>
<div class="col-12 col-sm-8 mt-sm-4">
<input class="multisteps-form__input form-control" type="number" placeholder="30" value="30" fdprocessedid="byl2nz"><button class="btn rbtn px-4 text-muted" fdprocessedid="htuom">Years</button>

</div>
</details>
</div>

<!-- last -->
<div class="form-row mt-4">

<div class="col-12 col-sm-10">
<h6>Mortgage Insurance (PMI)</h6>
<p class="text-muted mt-2 mb-3">Enable to add private mortgage insurance payments for this loan.</p>

</div>


<div class="col-12 col-sm-2">
<div class="toggle-button-cover">
<div class="button-cover">
<div class="button b2" id="button-16">
  <input type="checkbox" class="checkbox">
  <div class="knobs"></div>
  <div class="layer"></div>
</div>
</div>
</div>
</div>







</div>
<!-- end content -->
</div>
<div class="tab-pane" id="2a">
<div class="col-12 col-sm-4 mt-5">
<h6 class="font-weight-bold">Interest Rate:-</h6>
</div>

<div class="col-12 col-sm-8 mt-sm-5 ">
<div class="d-flex">
<input class="multisteps-form__input form-control" type="number" placeholder="5" value="5"><button class="btn rbtn px-4 text-muted">%</button>
</div>

</div>
<hr>
<div class="col-12 col-sm-4 mt-5">
<h6 class="font-weight-bold">Loan Term:-</h6>
</div>

<div class="col-12 col-sm-8 mt-sm-5 ">
<div class="d-flex">
<input class="multisteps-form__input form-control" type="number" placeholder="30" value="30"><button class="btn rbtn px-4 text-muted">Years</button>
</div>
<p class="text-muted mt-2">Leave blank to pay off this loan when you sell this property.</p>
</div>    </div>

</div>
<!-- end tabs -->

  </div>


              <div class="multisteps-form__content shadow mt-4">
                <div class="multisteps-form__content">
                  <!--  -->
                   
<section id="accordion">
  <div class="tab">
    <input type="radio" name="accordion-2" id="rd1">
    <label for="rd1" class="tab__label">Add a Loan</label>
    <div class="tab__content">
      <div class="multisteps-form__content shadow p-sm-4 px-4 pb-4 mt-4">
        <div class="form-row mt-4">
          <div class="col-12 col-sm-4 mt-4">
            <h6 class="font-weight-bold">Loan Label:-</h6>
               </div>
      
        <div class="col-12 col-sm-8 mt-sm-4">
          <input class="multisteps-form__input form-control" type="text" placeholder="" fdprocessedid="xrvkdc">
          <p class="text-muted mt-2 mb-3">Enter an optional label to help you identify this loan.</p>
      
        </div>
        <div class="col-12 col-sm-4 mt-4">
            <h6 class="font-weight-bold">Financing Of:-</h6>
               </div>
               <div class="col-12 col-sm-8 mt-sm-4">
                 <select class="multisteps-form__select form-control" fdprocessedid="h0u8w">
                     <option selected="selected">Purchase Price</option>
                     <option>Rehab Costs</option>
                     <option>Price and Rehab Costs</option>
                     <option>After Repair Value (ARV)</option>
                     <option>Custom Amount</option>
                   </select>  
                   <p class="text-muted mt-2 mb-3">Select what is being financed by this loan. You can also enter a custom loan amount manually.</p>
                 </div>
                 <div class="col-12 col-sm-4 mt-5">
                    <h6 class="font-weight-bold">Price Financing:-</h6>
                       </div>
      
                <div class="col-12 col-sm-8 mt-sm-5 ">
               <div class="d-flex">
                  <input class="multisteps-form__input form-control" type="number" placeholder="80" value="80" fdprocessedid="wmpxjy"><button class="btn rbtn px-4 text-muted" fdprocessedid="p1moq">%</button>
                </div>
                <small class="justify-content-end d-flex">20% Down Payment</small>
                <p class="text-muted mt-2 mb-3">Enter the down payment on the purchase price, or the percentage financed. Click label to toggle inputs.</p>
      
                </div>
               
        </div>
      <hr>
      <!--start tabs -->
      <div class="form-row mt-4">
        <div class="col-12 col-sm-4 mt-4">
          <h6 class="font-weight-bold">Loan Type:-</h6>
             </div>
      
      <div class="col-12 col-sm-8 mt-sm-4">
       
      <div id="exTab1" class="">	
      <ul class="nav nav-pills">
      <li class="active">
      <a href="#1a" data-toggle="tab">Amortizing</a>
      </li>
      <li class=""><a href="#2a" data-toggle="tab">Interest-Only</a>
      </li>
      </ul>
      <!--data  -->
      
      
      <!-- end data -->
      
      </div>
       
      
      </div>
      </div>
      
      <div class="tab-content clearfix">
      <div class="tab-pane active" id="1a">
      <!-- start content -->
      <div class="col-12 col-sm-4 mt-5">
      <h6 class="font-weight-bold">Interest Rate:-</h6>
      </div>
      
      <div class="col-12 col-sm-8 mt-sm-5 ">
      <div class="d-flex">
      <input class="multisteps-form__input form-control" type="number" placeholder="5" value="5" fdprocessedid="s2ryii"><button class="btn rbtn px-4 text-muted" fdprocessedid="g7owxc">%</button>
      </div>
      <details>
      <summary class="text-primary">Customize Compounding</summary>
      <div class="col-12 col-sm-4 mt-4">
      <h6 class="font-weight-bold">Compound Interval:-</h6>
      </div>
      <div class="col-12 col-sm-8 mt-sm-4">
      <select class="multisteps-form__select form-control" fdprocessedid="4otrbx">
       <option selected="selected">1 Month</option>
       <option>3 Month</option>
       <option>6 Month</option>
      
      </select>  
      </div>
      </details>
      </div>
      <hr>
      <div class="col-12 col-sm-4 mt-5">
      <h6 class="font-weight-bold">Loan Term:-</h6>
      </div>
      
      <div class="col-12 col-sm-8 mt-sm-5 ">
      <div class="d-flex">
      <input class="multisteps-form__input form-control" type="number" placeholder="30" value="30" fdprocessedid="55wkeq"><button class="btn rbtn px-4 text-muted" fdprocessedid="zytgwv">Years</button>
      </div>
      <details>
      <summary class="text-primary"> Customize Amortization</summary>
      <div class="col-12 col-sm-4 mt-4">
      <h6 class="font-weight-bold">Amortization Period:-</h6>
      </div>
      <div class="col-12 col-sm-8 mt-sm-4">
        <div class="d-flex">
      <input class="multisteps-form__input form-control" type="number" placeholder="30" value="30"><button class="btn rbtn px-4 text-muted">Years</button>
    </div>
      </div>
      </details>
      </div>
      
      <!-- last -->
      <div class="form-row mt-4">
      
      <div class="col-12 col-sm-10">
      <h6>Mortgage Insurance (PMI)</h6>
      <p class="text-muted mt-2 mb-3">Enable to add private mortgage insurance payments for this loan.</p>
      
      </div>
      
      
      <div class="col-12 col-sm-2">
      <div class="toggle-button-cover">
      <div class="button-cover">
      <div class="button b2" id="button-16">
        <input type="checkbox" class="checkbox">
        <div class="knobs"></div>
        <div class="layer"></div>
      </div>
      </div>
      </div>
      </div>
      
      
      
      
      
      
      
      </div>
      <!-- end content -->
      </div>
      <div class="tab-pane" id="2a">
      <div class="col-12 col-sm-4 mt-5">
      <h6 class="font-weight-bold">Interest Rate:-</h6>
      </div>
      
      <div class="col-12 col-sm-8 mt-sm-5 ">
      <div class="d-flex">
      <input class="multisteps-form__input form-control" type="number" placeholder="5" value="5"><button class="btn rbtn px-4 text-muted">%</button>
      </div>
      
      </div>
      <hr>
      <div class="col-12 col-sm-4 mt-5">
      <h6 class="font-weight-bold">Loan Term:-</h6>
      </div>
      
      <div class="col-12 col-sm-8 mt-sm-5 ">
      <div class="d-flex">
      <input class="multisteps-form__input form-control" type="number" placeholder="30" value="30"><button class="btn rbtn px-4 text-muted">Years</button>
      </div>
      <p class="text-muted mt-2">Leave blank to pay off this loan when you sell this property.</p>
      </div>    </div>
      
      </div>
      <!-- end tabs -->
        </div>
    </div>
  </div>
  <div class="tab">
    <input type="radio" name="accordion-2" id="rd3">
    <label for="rd3" class="tab__close">Close open tab &times;</label>
  </div>
</section>

                    <!--  -->
                </div>
              
              </div>
              <p class="text-muted mt-2 mb-3">You can add loan points, underwriting fees and other lender costs on the <a class="text-primary" href="#">purchase costs worksheet.</a>
              </p>


          
  <h6 class="text-primary text-uppercase mb-3 mt-5">PURCHASE COSTS</h6>
  <div class="multisteps-form__content shadow p-sm-4 px-4 pb-4 mt-4">
    <div class="multisteps-form__content">
      <div class="form-row mt-4">
      <!--  -->
      <div class="col-12 col-sm-4">
        <h6 class="font-weight-bold">Total:-</h6>
           </div>
      <div class="col-12 col-sm-5 d-flex">
                       
        <input class="multisteps-form__input form-control" type="number" placeholder="3" value="3"><button class="btn rbtn px-4 text-muted" >% of Price</button>
   
      </div>
      <div class="col-12 col-sm-3 d-flex">
                       
<button class="btn rbtn px-4 text-muted" >$ &nbsp;&nbsp;Itemize</button>
   
      </div>
        <!--  -->
    </div>
  
  </div>
              </div>
     
                   <!--start button  -->
  <div class="button-row d-flex mt-4">
    <button class="btn btn-primary js-btn-prev" type="button" title="Prev" fdprocessedid="vmxv2k">Prev</button>
    <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next" fdprocessedid="3twg06">Next</button>
  </div>
  </div>
              <!--single form panel-->
                <!--single form panel3-->
                <div class="multisteps-form__panel shadow p-4 rounded " data-animation="slideHorz">
                    <h3 class="multisteps-form__title">Your Address</h3>
                    <div class="multisteps-form__content">
                      <div class="form-row mt-4">
                        <div class="col">
                          <input class="multisteps-form__input form-control" type="text" placeholder="Address 1"/>
                        </div>
                      </div>
                      <div class="form-row mt-4">
                        <div class="col">
                          <input class="multisteps-form__input form-control" type="text" placeholder="Address 2"/>
                        </div>
                      </div>
                      <div class="form-row mt-4">
                        <div class="col-12 col-sm-6">
                          <input class="multisteps-form__input form-control" type="text" placeholder="City"/>
                        </div>
                        <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                          <select class="multisteps-form__select form-control">
                            <option selected="selected">State...</option>
                            <option>...</option>
                          </select>
                        </div>
                        <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                          <input class="multisteps-form__input form-control" type="text" placeholder="Zip"/>
                        </div>
                      </div>
                      <div class="button-row d-flex mt-4">
                        <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                        <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                      </div>
                    </div>
                  </div>
                  <!--single form panel-->
                    <!--single form panel4-->
              <div class="multisteps-form__panel rounded " data-animation="slideHorz">
             <h6 class="text-primary text-uppercase my-3">RENTAL INCOME</h6>
                <div class="multisteps-form__content shadow p-4 ">
                    <div class="form-row mt-4">
                    <!--  -->
                    <div class="col-12 col-sm-4">
                      <h6 class="font-weight-bold">Gross Rent:-</h6>
                         </div>
                    <div class="col-12 col-sm-8 d-flex">
                                     
                      <input class="multisteps-form__input form-control" type="number" placeholder="$ 0" value="$ 0">
                      <div class="dropdown">
                        <button class="btn rbtn dropdown-toggle text-muted" type="button" data-toggle="dropdown">Per Month</button>
                        <ul class="dropdown-menu">
                          <li><a href="#">Per Day</a></li>
                          <li><a href="#">Per Week</a></li>
                          <li><a href="#">Per Month</a></li>
                          <li><a href="#">Per Quarter</a></li>
                          <li><a href="#">Per Year</a></li>
                        
                        </ul>
                      </div>
         
                 
                    </div>
                
                      <!--  -->
                  </div>
                  <hr>
                  <div class="form-row mt-4">
                    <!--  -->
                    <div class="col-12 col-sm-4">
                      <h6 class="font-weight-bold">Vacancy Rate:-</h6>
                         </div>
                    <div class="col-12 col-sm-8">
                                     <div class="d-flex">
                      <input class="multisteps-form__input form-control" type="number" placeholder="10" value="10"><button class="btn rbtn px-4 text-muted">%</button>
                    </div>
                 
                <!--start new add  -->
                <form method="post" action="#" name="form">
                  <a type="button" name="add" id="extend" class="text-primary add">+ Add Year-Specific Value</a>
                  <div id="extend-field"></div>
                </form>

                <!--end new add  -->
                </div>
                      <!--end add  -->
                  </div>
            <hr>
            <div class="form-row mt-4">
              <!--  -->
              <div class="col-12 col-sm-4">
                <h6 class="font-weight-bold">Other Income:-</h6>
                   </div>
              <div class="col-12 col-sm-5 d-flex">
                               
                <input class="multisteps-form__input form-control" type="number" placeholder="$ 0" value="$ 0"> <button class="btn rbtn px-4 text-muted">Per Month</button>
           
              </div>
              <div class="col-12 col-sm-3 d-flex">
                               
        <button class="btn rbtn px-4 text-muted"><i class="fa fa-money mr-2" aria-hidden="true"></i>Itemize</button>
           
              </div>
                <!--  -->
            </div>
                  
                </div>
                <h6 class="text-primary text-uppercase mb-3 mt-5">OPERATING EXPENSES</h6>
                <div class="multisteps-form__content shadow p-4 ">
                
            <div class="form-row mt-4">
              <!--  -->
              <div class="col-12 col-sm-4">
                <h6 class="font-weight-bold">Other Income:-</h6>
                   </div>
              <div class="col-12 col-sm-5 d-flex">
                                <p class="">$ 0 Per Month</p>
           
              </div>
              <div class="col-12 col-sm-3 d-flex">
                               
        <button class="btn rbtn px-4 text-muted"><i class="fa fa-credit-card mr-2" aria-hidden="true"></i>Edit</button>
           
              </div>
                <!--  -->
            </div>
                  
                </div>
                <div class="button-row d-flex mt-4">
                  <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                  <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                </div>
              </div>
              <!--single form panel-->
              <div class="multisteps-form__panel rounded " data-animation="slideHorz">
                <h6 class="text-primary text-uppercase my-3">LONG-TERM PROJECTIONS</h6>
                   <div class="multisteps-form__content shadow p-4 ">
                       <div class="form-row mt-4">
                       <!--  -->
                       <div class="col-12 col-sm-4">
                         <h6 class="font-weight-bold">Appreciation:-</h6>
                            </div>
                       <div class="col-12 col-sm-8">
                        <div class="d-flex">
                         <input class="multisteps-form__input form-control" type="number" placeholder="3" value="3">
                
                           <button class="btn rbtn text-muted" type="button">% Per Year</button>
                  </div>
            
                      <!--start new add  -->
                   <form method="post" action="#" name="form">
                    <a type="button" name="add" id="extend1" class="text-primary add">+ Add Year-Specific Value</a>
                    <div id="extend-field1"></div>
                  </form>
  
                  <!--end new add  -->
                       </div>
                   
                         <!--  -->
                     </div>
                     <hr>
                     <div class="form-row mt-4">
                       <!--  -->
                       <div class="col-12 col-sm-4">
                         <h6 class="font-weight-bold">Income Increase:-</h6>
                            </div>
                       <div class="col-12 col-sm-8">
                                        <div class="d-flex">
                         <input class="multisteps-form__input form-control" type="number" placeholder="2" value="2"><button class="btn rbtn px-4 text-muted">% Per Year</button>
                       </div>
                    
                   <!--start new add  -->
                   <form method="post" action="#" name="form">
                     <a type="button" name="add" id="extend2" class="text-primary add">+ Add Year-Specific Value</a>
                     <div id="extend-field2"></div>
                   </form>
   
                   <!--end new add  -->
                   </div>
                         <!--end add  -->
                     </div>
                     <hr>
                     <div class="form-row mt-4">
                       <!--  -->
                       <div class="col-12 col-sm-4">
                         <h6 class="font-weight-bold">Expense Increase:-</h6>
                            </div>
                       <div class="col-12 col-sm-8">
                                        <div class="d-flex">
                         <input class="multisteps-form__input form-control" type="number" placeholder="2" value="2"><button class="btn rbtn px-4 text-muted">% Per Year</button>
                       </div>
                    
                   <!--start new add  -->
                   <form method="post" action="#" name="form">
                     <a type="button" name="add" id="extend3" class="text-primary add">+ Add Year-Specific Value</a>
                     <div id="extend-field3"></div>
                   </form>
   
                   <!--end new add  -->
                   </div>
                         <!--end add  -->
                     </div>
               <hr>
               <div class="form-row mt-4">
                <!--  -->
                <div class="col-12 col-sm-4">
                  <h6 class="font-weight-bold">Selling Costs:-</h6>
                     </div>
                <div class="col-12 col-sm-8">
                                 <div class="d-flex">
                  <input class="multisteps-form__input form-control" type="number" placeholder="6" value="6"><button class="btn rbtn px-4 text-muted">% of Sales Price</button>
                </div>
             
            </div>
                  <!--end add  -->
              </div>
                     
                   </div>
                   <h6 class="text-primary text-uppercase mb-3 mt-5">DEPRECIATION</h6>
                   <div class="multisteps-form__content shadow p-4 ">
                   
                    <div class="form-row mt-4">
                      <div class="col-12 col-sm-10">
                        <h6>Add Depreciation Deduction</h6>
                        <p class="text-muted mt-2 mb-3">Enable to include the depreciation tax deduction in the buy & hold projections. Disable to exclude it.</p>
  
                        </div>
                      
  
                        <div class="col-12 col-sm-2">
                            <div class="toggle-button-cover">
                              <div class="button-cover">
                                <div class="button b2" id="button-16">
                                  <input type="checkbox" class="checkbox">
                                  <div class="knobs"></div>
                                  <div class="layer"></div>
                                </div>
                              </div>
                            </div>
                       </div>
                        
                         
                        
                  
           
  
                      
                    </div>
                     <hr>
                     <div class="form-row mt-4">
                      <!--  -->
                      <div class="col-12 col-sm-4">
                        <h6 class="font-weight-bold">Depreciation Period:-</h6>
                           </div>
                      <div class="col-12 col-sm-8">
                                       <div class="d-flex">
                        <input class="multisteps-form__input form-control" type="number" placeholder="27.5" value="27.5"><button class="btn rbtn px-4 text-muted">Years</button>
                      </div>
                   
                  </div>
                        <!--end add  -->
                    </div>
                    <hr>
                    <div class="form-row mt-4 align-items-center">
                     
                        <div class="col-12 col-sm-4 mt-4 mt-sm-0">
                          <h6 class="font-weight-bold">Land Value:-</h6>
                             </div>
                      <div class="col-12 col-sm-8 mt-sm-4">
                        <input class="multisteps-form__input form-control" type="text" placeholder="$ 0" value="$ 0">
                          <p class="text-muted mt-2 mb-3">Enter the land value of this property to improve the accuracy of the depreciation deduction.</p>
                      </div>
                    </div>
                   </div>
                   <div class="button-row d-flex mt-4">
                     <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                     <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                   </div>
                 </div>
              <!--single form panel-->
              <div class="multisteps-form__panel shadow p-4 rounded " data-animation="slideHorz">
                <h3 class="multisteps-form__title">Additional Comments</h3>
                <div class="multisteps-form__content">
                  <div class="form-row mt-4">
                    <textarea class="multisteps-form__textarea form-control" placeholder="Additional Comments and Requirements"></textarea>
                  </div>
                  <div class="button-row d-flex mt-4">
                    <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                    <button class="btn btn-success ml-auto" type="button" title="Send">Send</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
 <!-- end start full details -->
</div>
</div>
<!-- partial -->


<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content alert alert-success">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="text-align: right;">
          <span aria-hidden="true">&times;</span>
        </button>
        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
        </svg>
        @if(Session::has('success'))
            {{Session::get('success')}}
        @endif
    </div>
  </div>
</div>

<script>
    // success modal
    @if(Session::has('success'))
    function load(){
        $('#successModal').modal('show');
    }
    window.onload = load;
    @endif
</script>

@include('front.layouts.footer')
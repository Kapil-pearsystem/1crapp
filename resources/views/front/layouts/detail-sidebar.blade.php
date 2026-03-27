<?php
   $imgurl = url('img/property-placeholder.png');
    if(isset($MainProperty->imageVideo)){
        $imageideos = explode(',', $MainProperty->imageVideo);
        if(count($imageideos)>0){
            $imgurl= url('img') . '/' . $imageideos[0];
        }
    }
 ?>
 <style>
    .propty_item_liststs .croosss {
    z-index: 1;
    position: absolute;
    bottom: 1px;
    right: 1px;
    background: #f00;
    padding: 0px 5px;
    color: #fff;
    font-weight: 200;
    border-radius: 20px;
    cursor: pointer;
}
.propty_item_liststs {

    display: inline-block;
    width: 100%;
    max-height: 620px;
    min-height: 100px;
    overflow: auto;
    z-index: 100;
    overflow-y: auto;
    background-color: #fff;
    border: 1px solid rgba(207,219,226,.5);
    border-radius: 4px!important;
    -webkit-box-shadow: 0 4px 12px rgb(0 0 0 / 5%);
    -moz-box-shadow: 0 4px 12px rgba(0,0,0,.05);
    box-shadow: 0 4px 12px rgb(0 0 0 / 5%);
}
.lists_tablssts .unddrlstt h6 {
    font-weight: normal;
    font-size: 14px;
    line-height: 34px;
    margin: 0px;
}
.managess_cnts {
    width: 75%;
    float: left;
    line-height: 22px;
}

.contensss_list {
    display: inline-block;
    width: 100%;
    padding: 10px;
}

.propty_item_liststs .are_bxxx {
    position: absolute;
    background: transparent;
    width: 25px;
    height: 25px;
    z-index: 1;
    border-radius: 0px 50px 50px 50px;
    left: 10px;
    top: -4px;
}

.contensss_list .copyyy_txt .clicckshowd ul {

    list-style: none;
    padding: 0;
    margin: 0;
    border-bottom: #ddd solid 1px;
}

.contensss_list .copyyy_txt .clicckshowd ul li:hover a {
    text-decoration: none;
}

.contensss_list .copyyy_txt .clicckshowd ul li:hover {
    background: #eee;
    text-decoration: none;
}
.contensss_list .copyyy_txt .clicckshowd ul li {
    margin-bottom: 3px;
    padding: 3px 10px;
}

 </style>
<div class="col-lg-3">
            <div class="propty_item_liststs">
                <div class="are_bxxx">
                    <div class="croosss" id="language-wrapper">
                        <i class="fa fa-times language-title"></i>

                    </div>
                </div>
                <div class="mgs_areaa">
                    <img src="{{ $imgurl }}" alt="" />
                    <span class="reltalls">{{ $MainProperty->prop_type }}</span>
                </div>
                <div class="contensss_list">
                    <div class="copyyy_txt">
                        <h5 class="onclicks">
                            {{ $MainProperty->prop_name }} <span class="dots_clicks"><i class="fa fa-caret-down"></i></span>
                        </h5>
                        <div class="clicckshowd">
                            <h5><a href="javascript:void(0);">Share Report</a></h5>
                            <ul>
                                <li><a href="javascript:void(0);">Compare</a></li>
                                <li><a href="javascript:void(0);">Copy</a></li>
                                <li><a href="javascript:void(0);">Copy Address</a></li>
                                <li><a href="javascript:void(0);">Move to BRRRRs</a></li>
                                <li><a href="javascript:void(0);">Move to Flips</a></li>
                                <li><a href="javascript:void(0);">Move to Wholesale</a></li>
                                <li><a href="javascript:void(0);">Archive</a></li>
                                <li><a href="javascript:void(0);">Save as Template</a></li>
                            </ul>
                            <p class="dltts"><a href="javascript:void(0);">Delete</a></p>
                        </div>
                    </div>

                    <div class="und_cntss_listst">
                        <p>{{ $MainProperty->prop_street }}</p>
                        <p>{{ $MainProperty->prop_add_city }}, {{ $MainProperty->prop_add_state }}, {{ $MainProperty->prop_zip }}</p>
                       <!--  <p>
                            <span class="area_contss">4 <span class="brss">BR</span> <span class="slesss">/</span> 4 BA <span class="slesss">/</span> </span>
                        </p> -->
                        <p class="pricss_lstts">
                            <span class="blue bold">₹{{ number_format($MainProperty->prop_purchasePrice) }} </span> <!-- <span class="red"><span class="bold">-233.5%</span> Cap Rate </span> -->
                        </p>
                    </div>
                    <div class="propety_lststs">
                        <ul>

                            <li>
                                <a href="{{ route('properties.description', ['category' => str_replace('_', '-', $MainProperty->prop_parent_type),'id' => base64_encode($MainProperty->prop_id)]) }}">
                                    <span class="i_conss"><i class="fa fa-home"></i></span> Property Description
                                </a>
                            </li>
                            <?php /*
                            <li>
                                <a href="{{ route('properties.worksheet', ['category' => str_replace('_', '-', $MainProperty->prop_parent_type),'id' => base64_encode($MainProperty->prop_id)]) }}">
                                    <span class="i_conss"><i class="fa fa-pencil"></i></span> Purchase Worksheet
                                </a>
                            </li>
                            */ ?>
                            <li>
                                <a href="{{ route('properties.edit.book-finance-payment',['id' => base64_encode($MainProperty->prop_id)]) }}">
                                    <span class="i_conss"><i class="fa fa-pencil"></i></span> Purchase Worksheet
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('properties.photos', ['category' => str_replace('_', '-', $MainProperty->prop_parent_type),'id' => base64_encode($MainProperty->prop_id)]) }}">
                                    <span class="i_conss"><i class="fa fa-picture-o"></i></span> Photos
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('properties.map', ['category' => str_replace('_', '-', $MainProperty->prop_parent_type),'id' => base64_encode($MainProperty->prop_id)]) }}">
                                    <span class="i_conss"><i class="fa fa-map-marker"></i></span> Map
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="propety_lststs">
                        <p>ANALYSIS</p>
                        <ul>
                            <li>
                                <a href="{{ route('property.summary', ['category' => str_replace('_', '-', $MainProperty->prop_parent_type),'id' => base64_encode($MainProperty->prop_id)]) }}">
                                    <span class="i_conss"><i class="fa fa-pie-chart"></i></span> Property Analysis
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('properties.projection', ['category' => str_replace('_', '-', $MainProperty->prop_parent_type),'id' => base64_encode($MainProperty->prop_id)]) }}">
                                    <span class="i_conss"><i class="fa fa-bar-chart"></i></span> Property Projections
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="propety_lststs">
                        <p>RESEARCH</p>
                        <ul>
                            <li>
                                <a href="{{ route('properties.recent-sales-comps', ['category' => str_replace('_', '-', $MainProperty->prop_parent_type),'id' => base64_encode($MainProperty->prop_id)]) }}">
                                    <span class="i_conss"><i class="fa fa-usd"></i></span> Sales Comps &amp; ARV
                                </a>
                            </li>
                            <li>

                                <a href="{{ route('properties.recent-comps-rent', ['category' => str_replace('_', '-', $MainProperty->prop_parent_type),'id' => base64_encode($MainProperty->prop_id)]) }}">
                                    <span class="i_conss"><i class="fa fa-key"></i></span> Rental Comps &amp; Rent
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('property.compare.index') }}">
                                    <span class="i_conss"><i class="fa fa-exchange"></i></span> Compare Properties
                                </a>
                            </li>
                            <?php /*
                            <li>
                                <a href="javascript:void(0);">
                                    <span class="i_conss"><i class="fa fa-files-o"></i></span> Records &amp; Listings
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <span class="i_conss"><i class="fa fa-user"></i></span> Owner Lookup
                                </a>
                            </li>
                            */ ?>
                        </ul>
                    </div>

                    <div class="propety_lststs">
                        <p>TOOLS</p>
                        <ul>
                           <!--  <li>
                                <a href="javascript:void(0);">
                                    <span class="i_conss"><i class="fa fa-calendar"></i></span> Offer Calculator
                                </a>
                            </li> -->
                            <li>
                            <a href="{{ route('properties.reports-and-sharing', ['category' => str_replace('_', '-', $MainProperty->prop_parent_type),'id' => base64_encode($MainProperty->prop_id)]) }}">
                                    <span class="i_conss"><i class="fa fa-file-text"></i></span> Reports &amp; Sharing
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('properties.termsheet', ['category' => str_replace('_', '-', $MainProperty->prop_parent_type),'id' => base64_encode($MainProperty->prop_id)]) }}">
                                    <span class="i_conss"><i class="fa fa-file-text"></i></span>{{ strtoupper(implode('', array_map(fn($w) => $w[0], explode('-', $MainProperty->prop_parent_type)))) }} Term-Sheet 
                                </a>
                            </li>


                           <!--  <li>
                                <a href="javascript:void(0);">
                                    <span class="i_conss"><i class="fa fa-university"></i></span> Find Local Lenders
                                </a>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>

        </div>

